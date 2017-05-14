<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends CI_Controller {
    public function index()
	{
        $this->load->view('include/header');
		$this->load->view('privacy');
        $this->load->view('include/footer');
	}
}
