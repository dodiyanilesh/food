<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analysts_profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') != TRUE)
        {
            redirect('login');
        }
        $this->load->model('Profile');
        $this->load->model('User');
    }
	public function index()
	{   
        $user_id = $this->session->userdata('user_id');
        $data['profile'] = $this->Profile->get_profile_on_id($user_id);
        $this->load->view('user-dashboard/include/header');
        $this->load->view('user-dashboard/analysts-profile',$data);
        $this->load->view('user-dashboard/include/footer');
	}
    
    public function update_profile()
    {
        $user_id = $this->session->userdata('user_id');
        $whatsapp_no = $this->input->post('whatsapp_no');
        $gender = $this->input->post('gender');
        $age = $this->input->post('age');
        $height = $this->input->post('height');
        $actual_weight = $this->input->post('actual_weight');
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
                    'whatsapp_no' => $whatsapp_no,
                    'gender' => $gender,
                    'age' => $age,
                    'height' => $height,
                    'actual_weight' => $actual_weight,
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
        $data = $this->security->xss_clean($data);
        if($this->Profile->update($data,$user_id))
        {
            $this->session->set_flashdata('alert_msg','<div class="alert alert-success">Your analysts profile updated successfully.</div>');
            redirect('analysts_profile');
        }else{
            $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
            redirect('analysts_profile');
        }
    }
}