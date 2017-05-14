<?php
    defined('BASEPATH') or exit('No direct access allowed!');
    
    class Edit_user extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('manager_logged_in') != TRUE)
            {
                redirect('manager-admin/login');
            }
            $this->load->model('User');
            $this->load->model('Profile');
        }
        
        public function index()
        {
            $user_id = $this->uri->segment(3);
            $data['user'] = $this->User->get_user_on_id($user_id);
            $data['profile'] = $this->Profile->get_profile_on_id($user_id);
            $this->load->view('manager-admin/include/header');
            $this->load->view('manager-admin/edit-user',$data);
            $this->load->view('manager-admin/include/footer');
        }
    }