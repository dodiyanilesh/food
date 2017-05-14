<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') != TRUE)
        {
            redirect('login');
        }
        $this->load->model('Country_code');
        $this->load->model('Profile');
        $this->load->model('User');
    }
	public function index()
	{
        $this->load->view('user-dashboard/include/header');
        $this->load->view('user-dashboard/membership');
        $this->load->view('user-dashboard/include/footer');
	}
}