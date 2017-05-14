<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Profile');
        $this->load->library('facebook');
        if($this->session->userdata('logged_in') == TRUE)
        {
            redirect('dashboard');
        }
    }
    
	public function index()
	{
       if($this->input->get('code') && $this->session->userdata('logged_in') != TRUE)
        {
            $this->load->config('facebook');
            $code = $this->input->get('code');
            $token_url = "https://graph.facebook.com/oauth/access_token?"
            ."client_id=".$this->config->item('appId')."&redirect_uri=".$this->config->item('redirect_uri')."&client_secret=".$this->config->item('secret')."&code=" . $code;

            $response = file_get_contents($token_url);
            $data = json_decode($response);
            $access_token = $data->access_token;
            
            $user_details = "https://graph.facebook.com/me?fields=first_name,last_name,email&access_token=" .$access_token;
            $response = file_get_contents($user_details);
            $response = json_decode($response);
            $datetime = date('Y-m-d H:i:s');
            $this->db->where('fb_id',$response->id);
            $query = $this->db->get('users');
            if($query->num_rows() > 0){
                $login_user = $query->row();
                $newdata = array(
                    'user_id'    => $login_user->id,
                    'first_name' => $login_user->first_name,
                    'last_name'  => $login_user->last_name,
                    'email'      => $login_user->email,
                    'access_token' => $access_token,
                    'is_fb' => TRUE,
                    'logged_in'  => TRUE
                );
                $this->session->set_userdata('login_data',$newdata);
                if($login_user->steps_completed == 0)
                {
                    redirect('dashboard/profile1');
                }else if($login_user->steps_completed == 1)
                {
                    redirect('dashboard/profile2');
                }else{
                    redirect('dashboard');
                }
            }else{
                $data = array(
                            'first_name' => $this->db->escape_str($response->first_name),
                            'last_name' => $this->db->escape_str($response->last_name),
                            'email' => $this->db->escape_str($response->email),
                            'is_fb' => 'y',
                            'fb_id' => $response->id,
                            'is_active' => 'y',
                            'created_at' => $datetime
                        );
                $data = $this->security->xss_clean($data);
                if($this->User->insert($data))
                {
                    $insert_id = $this->db->insert_id();
                    $data_profile = array(
                                'user_id' => $insert_id,
                                'created_at' => $datetime
                            );
                    if($this->Profile->insert($data_profile)){
                        $this->db->where('id',$insert_id);
                        $query = $this->db->get('users');
                        $login_user = $query->row();
                        $newdata = array(
                                        'user_id'    => $login_user->id,
                                        'first_name' => $login_user->first_name,
                                        'last_name'  => $login_user->last_name,
                                        'email'      => $login_user->email,
                                        'access_token' => $access_token,
                                        'is_fb' => TRUE,
                                        'logged_in'  => TRUE
                                    );
                        $this->session->set_userdata($newdata);
                        if($login_user->steps_completed == 0)
                        {
                            redirect('dashboard/profile1');
                        }else if($login_user->steps_completed == 1)
                        {
                            redirect('dashboard/profile2');
                        }else{
                            redirect('dashboard');
                        }
                    }else{
                        $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
                        redirect('signup');
                    }
                }else{
                    $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
                    redirect('signup');
                }
            }
        }else{
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('signup'), 
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->view('include/header');
		$this->load->view('signup',$data);
        $this->load->view('include/footer');
	}
    
    public function process(){
        $activation_key = getrandomstring();
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = $this->bcrypt->hash_password($this->input->post('password'));
        $datetime = date('Y-m-d H:i:s');
        
        $html = '';
        $html.= 'Hello '.$first_name.'<br /><br />';
        $html.= 'Welcome to <a href="'.base_url().'">The Food Analysts</a> to finish your signing up, you just need to confirm that we got your email right.';
        $html.= '<a href="'.base_url('signup/confirm_email?eml='.base64_encode($email).'&token='.$activation_key).'">Click Here</a>';
        
        
        $this->email->from('info@thefoodanalysts.com', 'The Food Analysts'); 
        $this->email->to($email);
        $this->email->subject('Confirm your account!'); 
        $this->email->message('Testing the email class.'); 

        //Send mail 
        //if($this->email->send()){
        if(1 == 1){
            $data = array(
                        'first_name' => $this->db->escape_str($first_name),
                        'last_name' => $this->db->escape_str($last_name),
                        'email' => $this->db->escape_str($email),
                        'activation_key' => $activation_key,
                        'password' => $password,
                        'is_active' => 'n',
                        'created_at' => $datetime
                    );
            $data = $this->security->xss_clean($data);
            if($this->User->insert($data) )
            {
                $insert_id = $this->db->insert_id();
                $data_profile = array(
                                'user_id' => $insert_id,
                                'created_at' => $datetime
                            );
                if($this->Profile->insert($data_profile))
                {
                    $user = $this->User->get_user_on_id($insert_id);
                    $newdata = array(
                        'user_id'    => $user->id,
                        'first_name' => $user->first_name,
                        'last_name'  => $user->last_name,
                        'email'      => $user->email,
                        'logged_in'  => TRUE
                    );
                    $this->session->set_userdata($newdata);
                    //$this->session->set_flashdata('alert_msg','<div class="alert alert-success">Registration Successful. Please check your email.</div>');
                    //$this->session->set_flashdata('alert_msg','<div class="alert alert-success">Registration Successful. Please login.</div>');
                    redirect('dashboard/profile1');
                }else{
                    $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
                    redirect('signup');
                }
            }else{
                $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
                redirect('signup');
            }
        }else{
            $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
            redirect('signup');
        }
    }
    
    public function confirm_email()
    {
        $email = base64_decode($this->input->get('eml'));
        $activation_key = $this->input->get('token');
        
        $this->db->where(array('email' => $email, 'activation_key' => $activation_key));
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            $user = $query->row();
            $data = array(
                            'is_active' => 'y',
                            'activation_key' => ''
                        );
            if($this->User->update($data,$user->id))
            {
                $this->session->set_flashdata('alert_msg','<div class="alert alert-success">Your email address is successfully verified! Please login to access your account!</div>');
                redirect('login');
            }
        }else{
            $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
            redirect('signup');
        }
    }
}
