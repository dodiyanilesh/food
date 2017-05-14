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
        }
        
        public function index()
        {
            $this->load->view('manager-admin/include/header');
            $this->load->view('manager-admin/view-report');
            $this->load->view('manager-admin/include/footer');
        }
    }