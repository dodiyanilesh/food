<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller {
    public function index()
	{
        $this->load->view('include/header');
		$this->load->view('about-us');
        $this->load->view('include/footer');
	}
}
