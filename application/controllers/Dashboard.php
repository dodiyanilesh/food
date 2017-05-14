<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
        $this->load->view('user-dashboard/dashboard');
        $this->load->view('user-dashboard/include/footer');
	}
    public function profile1()
    {
        $data['country_codes'] = $this->Country_code->get_all_country_code();
        $user_id = $this->session->userdata('user_id');
        $data['profile'] = $this->Profile->get_profile_on_id($user_id);
        $this->load->view('include/header');
        $this->load->view('dashboard/profile1',$data);
        $this->load->view('include/footer');
    }
    
    public function profile1_process()
    {
        $user_id = $this->session->userdata('user_id');
        $whatsapp_no = $this->input->post('country_code').' '.$this->input->post('whatsapp_no');
        $gender = $this->input->post('gender');
        $age = $this->input->post('age');
        $height = $this->input->post('height');
        $actual_weight = $this->input->post('actual_weight');
        $datetime = date('Y-m-d H:i:s');
        $ip = $this->input->ip_address();
        
        $data = array(
                    'user_id' => $user_id,
                    'whatsapp_no' => $whatsapp_no,
                    'gender' => $gender,
                    'age' => $age,
                    'height' => $height,
                    'actual_weight' => $actual_weight,
                    'created_at' => $datetime,
                    'ip_address' => $ip
                );
        if($this->Profile->update($data,$user_id))
        {
            $profile_id = $this->db->insert_id();
            $data_user = array('steps_completed' => '1');
            if($this->User->update($data_user,$user_id))
            {
                redirect('dashboard/profile2');
            }
        }else{
            $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
            redirect('login');
        }
    }
    
    public function profile2()
    {
        $user_id = $this->session->userdata('user_id');
        $data['profile'] = $this->Profile->get_profile_on_id($user_id);
        $this->load->view('include/header');
        $this->load->view('dashboard/profile2',$data);
        $this->load->view('include/footer');
    }
    
    public function profile2_process()
    {
        $user_id = $this->session->userdata('user_id');
        $how_active = $this->input->post('how_active');
        $no_ex_inweek = $this->input->post('no_ex_inweek');
        $goals = $this->input->post('goals');
        $vegiterian = $this->input->post('vegiterian');
        $lactose = $this->input->post('lactose');
        $gluten = $this->input->post('gluten');
        $alcohol = $this->input->post('alcohol');
        $diabetic = $this->input->post('diabetic');
        $heart_problem = $this->input->post('heart_problem');
        $cholesterol_problem = $this->input->post('cholesterol_problem');
        $high_blood_pressure = $this->input->post('high_blood_pressure');
        $datetime = date('Y-m-d H:i:s');
        
        $data = array(
                    'how_active' => $how_active,
                    'no_ex_inweek' => $no_ex_inweek,
                    'goals' => $goals,
                    'vegiterian' => $vegiterian,  
                    'lactose' => $lactose,
                    'gluten' => $gluten,
                    'alcohol' => $alcohol,
                    'diabetic' => $diabetic,
                    'heart_problem' => $heart_problem,
                    'cholesterol_problem' => $cholesterol_problem,
                    'high_blood_pressure' => $high_blood_pressure,
                    'updated_at' => $datetime,
                );
        
        if($this->Profile->update($data,$user_id))
        {
            $user_id = $this->session->userdata('user_id');
            $data_user = array('steps_completed' => '2');
            if($this->User->update($data_user,$user_id))
            {
                redirect('dashboard');
            }
        }else{
            $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
            redirect('login');
        }
    }
}