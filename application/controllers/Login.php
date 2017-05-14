<?php
defined('BASEPATH') OR exit('No direct script access allowed');
This is functions test
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') == TRUE)
        {
            redirect('dashboard');
        }
    }
	public function index()
	{
        $this->load->view('include/header');
		$this->load->view('login');
        $this->load->view('include/footer');
	}
    
    public function process()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->db->where(array('email' => $email));
        $this->db->order_by('id','DESC');
        $query = $this->db->get('users');
        $query->num_rows();
        if($query->num_rows() > 0)
        {
            $user = $query->row();
            if ($this->bcrypt->check_password($password, $user->password))
            {
                $newdata = array(
					'user_id'    => $user->id,
					'first_name' => $user->first_name,
					'last_name'  => $user->last_name,
					'email'      => $user->email,
					'logged_in'  => TRUE
				);
				$this->session->set_userdata($newdata);
                if($user->steps_completed == 0)
                {
                    redirect('dashboard/profile1');
                }else if($user->steps_completed == 1)
                {
                    redirect('dashboard/profile2');
                }else{
                    redirect('dashboard');
                }
            }
            else
            {
                $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Your password is incorrect!</div>');
                redirect('login');
            } 
        }else{
            $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Your email is not found!</div>');
            redirect('login');
        }
    }
}
