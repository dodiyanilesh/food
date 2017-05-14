<?php
    defined('BASEPATH') or exit('No direct access allowed!');
    
    class Users extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('manager_logged_in') != TRUE)
            {
                redirect('manager-admin/login');
            }
            $this->load->model('User');
            $this->load->model('Profile');
        }
        
        public function index()
        {
            $data['users'] = $this->User->get_result();
            $this->load->view('manager-admin/include/header');
            $this->load->view('manager-admin/users',$data);
            $this->load->view('manager-admin/include/footer');
        }
        
        public function add()
        {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $password = $this->bcrypt->hash_password($this->input->post('password'));
            $datetime = date('Y-m-d H:i:s');
            
            $data = array(
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'password' => $password,
                        'created_at' => $datetime
                    );
            $data = $this->security->xss_clean($data);
            if($this->User->insert($data))
            {
                $insert_id = $this->db->insert_id();
                $data_profile = array(
                                'user_id' => $insert_id,
                                'created_at' => $datetime
                            );
                if($this->Profile->insert($data_profile))
                {
                    $this->session->set_flashdata('alert_msg','<div class="alert alert-success">User added successfully.</div>');
                    redirect('manager-admin/users');
                }else{
                    $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
                    redirect('manager-admin/users');
                }
            }else{
                $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
                redirect('manager-admin/users');
            }
        }
        
        public function update_profile()
        {
            $user_id = $this->input->post('user_id');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            if($this->input->post('password') != ""){
                $password = $this->bcrypt->hash_password($this->input->post('password'));
                $user_data = array(
                                'first_name' => $first_name,
                                'last_name' => $last_name,
                                'email' => $email,
                                'password' => $password,
                                'steps_completed' => 2
                            );
            }else{
                $user_data = array(
                                'first_name' => $first_name,
                                'last_name' => $last_name,
                                'email' => $email,
                                'steps_completed' => 2
                            );
            }
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
            if($this->Profile->update($data,$user_id) && $this->User->update($user_data,$user_id))
            {
                $this->session->set_flashdata('alert_msg','<div class="alert alert-success">User profile updated successfully.</div>');
                redirect('manager-admin/users');
            }else{
                $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
                redirect('manager-admin/users');
            }
        }
        
        public function delete_user()
        {
            $user_id = $this->uri->segment(4);
            if($this->Profile->delete($user_id) && $this->User->delete($user_id))
            {
                $this->session->set_flashdata('alert_msg','<div class="alert alert-success">User deleted successfully.</div>');
                redirect('manager-admin/users');
            }else{
                $this->session->set_flashdata('alert_msg','<div class="alert alert-danger">Oh snap! Something error please try again!</div>');
                redirect('manager-admin/users');
            }
        }
    }