<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
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
        $managerdata = array('manager_id', 'email', 'manager_logged_in');
        $this->session->unset_userdata($managerdata);
        redirect('manager-admin/login');
    }
}