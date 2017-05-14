<?php 
    defined('BASEPATH') or exit('No direct access allowed!');
    
    class Instant_report extends CI_Controller
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
            $this->load->model('Food_log');
        }
        
        public function index()
        {
            $report_time = $this->uri->segment(3);
            $user_id = $this->uri->segment(4);
            $report_date_new = strtotime($this->uri->segment(5));
            
            $data['profile'] = $this->Profile->get_profile_on_id($user_id);
            
            $data['food_first'] = $this->Food_log->get_food_log1($user_id, $report_time, $report_date_new);
            $data['total_val'] = $this->Food_log->get_food_total_val($user_id, $report_date_new);
            
            $this->load->view('manager-admin/include/header');
            $this->load->view('manager-admin/instant-report', $data);
        }
    }