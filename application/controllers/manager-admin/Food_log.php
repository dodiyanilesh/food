<?php
    defined('BASEPATH') or exit('No direct access allowed!');
    
    class Food_log extends CI_Controller
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
            $this->load->helper('form');
            $this->load->helper('url');
        }
        
        public function index()
        {
            $this->load->view('manager-admin/include/header');
            $this->load->view('manager-admin/food-log');
            $this->load->view('manager-admin/include/footer');
        }
        
        public function store(){
           $foodProduct =  $this->input->post('food');
           $userId =  $this->input->post('userId');
           $totalpost_Calories =  $this->input->post('totalpost_Calories');
           $totalpost_Protein =  $this->input->post('totalpost_Protein');
           $totalpost_Carbs =  $this->input->post('totalpost_Carbs');
           $totalpost_Fat =  $this->input->post('totalpost_Fat');
           $totalpost_Sodium =  $this->input->post('totalpost_Sodium');

           $totalpost_saturated =  $this->input->post('totalpost_saturated');
           $totalpost_dietary_fiber =  $this->input->post('totalpost_dietary_fiber');
           $totalpost_cholesterol =  $this->input->post('totalpost_cholesterol');
           $totalpost_sugars =  $this->input->post('totalpost_sugars');
           
           $totalpost_vitamin = $this->input->post('totalpost_vitamin');
           $totalpost_calcium = $this->input->post('totalpost_calcium');
           $totalpost_iron = $this->input->post('totalpost_iron');
           $totalpost_trans_fatty_acid = $this->input->post('totalpost_trans_fatty_acid');

           
           $meal =  $this->input->post('meal');
           $date =  $this->input->post('date');

            $firstTable = array(
                        'user_id' => $userId, 
                        'total_protein' => $totalpost_Protein, 
                        'total_carbs ' => $totalpost_Carbs, 
                        'total_fat ' => $totalpost_Fat, 
                        'total_sodium ' => $totalpost_Sodium, 
                        'total_saturated_fat' => $totalpost_saturated,
                        'total_dietary_fiber' => $totalpost_dietary_fiber,
                        'total_cholesterol' =>  $totalpost_cholesterol,
                        'total_sugars' => $totalpost_sugars,
                        'Meal' => $meal, 
                        'Date' => $date, 
                        'tatal_calories ' => $totalpost_Calories,
                        'total_vitamin ' => $totalpost_vitamin,
                        'total_calcium' => $totalpost_calcium,
                        'total_iron' => $totalpost_iron,
                        'total_trans_fatty_acid' => $totalpost_trans_fatty_acid
                );

            $this->db->insert('food_store_1', $firstTable);
            $insert_id = $this->db->insert_id();
            
            $this->db->insert_batch('food_store_2', $foodProduct);
            echo $insert_id = $this->db->insert_id();
            
        }

        public function fetch_food_data(){
            echo "string";
        }
    }
?>    