<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    public function index()
	{
        $this->load->library('facebook');
        if($this->session->userdata('is_fb') == TRUE)
        {
            $this->session->unset_userdata('login_data');
            $token = $this->session->userdata('access_token');
            $url = 'https://www.facebook.com/logout.php?next='.base_url('login').'&access_token='.$token;
            session_destroy();
            redirect($url);
        }else{
            $this->session->unset_userdata('login_data');
            session_destroy();
            redirect('login');
        }
	}
}
