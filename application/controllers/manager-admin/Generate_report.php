<?php
    defined('BASEPATH') or exit('No direct access allowed!');

    class Generate_report extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('manager_logged_in') != TRUE)
            {
                redirect('manager-admin/login');
            }
            $this->load->model('Profile');
            $this->load->model('User');
            $this->load->model('Food_log');
        }
        public function index()
        {
            $user_id = $this->uri->segment(3);
            $report_date_new = strtotime($this->uri->segment(4));
            $data['profile'] = $this->Profile->get_profile_on_id($user_id);
            $data['user'] = $this->User->get_user_on_id($user_id);
            $data['report_date'] = $this->uri->segment(4);
            $data['food_first'] = $this->Food_log->get_food_total_val($user_id, $report_date_new);
            $data['breakfast'] = $this->Food_log->get_food_log1($user_id, 'Breakfast', $report_date_new);
            $data['lunch'] = $this->Food_log->get_food_log1($user_id, 'Lunch', $report_date_new);
            $data['dinner'] = $this->Food_log->get_food_log1($user_id, 'Dinner', $report_date_new);
            
            $this->load->view('manager-admin/include/header');
            $this->load->view('manager-admin/view-report', $data);
        }
    }