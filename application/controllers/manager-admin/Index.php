<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
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
        $this->load->view('manager-admin/index');
        $this->load->view('manager-admin/include/footer');
    }
}