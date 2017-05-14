<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class How_to_use extends CI_Controller {
    public function index()
	{
        $this->load->view('include/header');
		$this->load->view('how-to-use');
        $this->load->view('include/footer');
	}
}
