<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Choose_your_package extends CI_Controller {
    public function index()
	{
        $this->load->view('include/header');
		$this->load->view('choose-your-package');
        $this->load->view('include/footer');
	}
}
