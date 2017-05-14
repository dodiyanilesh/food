<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_and_condition extends CI_Controller {
    public function index()
	{
        $this->load->view('include/header');
		$this->load->view('terms-and-condition');
        $this->load->view('include/footer');
	}
}
