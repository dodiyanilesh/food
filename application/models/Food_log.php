<?php 
    defined('BASEPATH') or die('No direct access allowed!');

    class Food_log extends CI_Model{
        public function get_food_log1($user_id, $report_time, $report_date)
        {
            $report_date = date('Y-m-d 00:00:00',$report_date);
            $this->db->where(array('user_id' => $user_id, 'Meal' => $report_time, 'Date' => $report_date));
            $query = $this->db->get('food_store_1');
            if($query->num_rows() > 0)
            {
                return $query->result();
            }else{
                return FALSE;
            }
        }
        
        public function get_food_total_val($user_id, $report_date)
        {
            $report_date = date('Y-m-d 00:00:00',$report_date);
            $this->db->where(array('user_id' => $user_id, 'Date' => $report_date));
            $query = $this->db->get('food_store_1');
            if($query->num_rows() > 0)
            {
                return $query->result();
            }else{
                return FALSE;
            }
        }
    }
