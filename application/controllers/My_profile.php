<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') != TRUE)
        {
            redirect('login');
        }
        $this->load->model('Profile');
        $this->load->model('User');
    }
	public function index()
	{   
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->User->get_user_on_id($user_id);
        $this->load->view('user-dashboard/include/header');
        $this->load->view('user-dashboard/profile',$data);
        $this->load->view('user-dashboard/include/footer');
	}
    
    public function update_profile()
    {
        $user_id = $this->session->userdata('user_id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        
        $data = array(
                    'first_name' => $this->db->escape_str($first_name),
                    'last_name' => $this->db->escape_str($last_name),
                    'email' => $this->db->escape_str($email)
                );
        $data = $this->security->xss_clean($data);
        if($this->User->update($data,$user_id))
        {
            $this->session->set_flashdata('alert_msg','<div class="alert alert-success">Your profile updated successfully.</div>');
            redirect('my_profile');
        }else{
            $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
            redirect('my_profile');
        }
    }
    
    public function update_password()
    {
        $user_id = $this->session->userdata('user_id');
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $this->db->where('id',$user_id);
        $query = $this->db->get('users');
        $user = $query->row();
        
        if($this->bcrypt->check_password($current_password, $user->password))
        {
            $data = array(
                    'password' => $this->bcrypt->hash_password($new_password),
                );
            if($this->User->update($data,$user_id))
            {
                $this->session->set_flashdata('alert_msg','<div class="alert alert-success">Your password updated successfully.</div>');
                redirect('my_profile');
            }else{
                $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
                redirect('my_profile');
            }
        }else{
            $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Your current password is wrong!</div>');
            redirect('my_profile');
        }
    }
}