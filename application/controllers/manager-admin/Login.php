<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('manager_logged_in') == TRUE)
        {
            redirect('manager-admin');
        }
    }
    
    public function index()
    {
        $this->load->view('manager-admin/login');
    }
    
    public function process()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->db->where('email',$email);
        $query = $this->db->get('manager');
        if($query->num_rows() > 0)
        {
            $manager = $query->row();
            if ($this->bcrypt->check_password($password, $manager->password)){
                 $newdata = array(
					'manager_id'    => $manager->id,
					'email'      => $manager->email,
					'manager_logged_in'  => TRUE
				);
				$this->session->set_userdata($newdata);
                redirect('manager-admin');
            }else{
                $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Your password is incorrect!</div>');
                redirect('manager-admin/login');
            }
        }else{
            $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Your email is not found!</div>');
            redirect('manager-admin/login');
        }
    }
}