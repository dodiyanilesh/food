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
            $report_tm = $this->uri->segment(3);
            if($report_tm == "breakfast"){
                $report_time = "Breakfast";
            }else if($report_tm == "lunch"){
                $report_time = "Lunch";
            }else if($report_tm == "dinner"){
                $report_time = "Dinner";
            }else if($report_tm == "amsnack"){
                $report_time = "Morning Snacks";
            }else if("pmsnack"){
                $report_time = "Afternoon Snacks";
            }else if("addsnack"){
                $report_time = "Additional Snacks";
            }
            $user_id = $this->uri->segment(4);
            $report_date_new = strtotime($this->uri->segment(5));
            $data['profile'] = $this->Profile->get_profile_on_id($user_id);
            
            $data['food_first'] = $this->Food_log->get_food_log1($user_id, $report_time, $report_date_new);
            $data['total_val'] = $this->Food_log->get_food_total_val($user_id, $report_date_new);
            
            $this->load->view('manager-admin/include/header');
            $this->load->view('manager-admin/instant-report', $data);
        }
    }