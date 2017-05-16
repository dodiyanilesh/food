<?php 
    function getrandomstring($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function get_login_userdata()
    {
        $ci =& get_instance();
        $user_id = $ci->session->userdata('user_id');
        $ci->db->where('id',$user_id);
        $query = $ci->db->get('users');
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function get_user_profile($user_id)
    {
        $ci =& get_instance();
        $ci->db->where('user_id',$user_id);
        $query = $ci->db->get('profile');
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function check_membership($user_id)
    {
        $ci =& get_instance();
        $ci->db->where(array('user_id'=> $user_id, 'status' => "Authorised"));
        $query = $ci->db->get('membership');
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function check_food_insert($user_id, $report_time, $report_date)
    {
        $ci =& get_instance();
        $report_date = date('Y-m-d 00:00:00',$report_date);
        $ci->db->where(array('user_id' => $user_id, 'Meal' => $report_time, 'Date' => $report_date));
        $query = $ci->db->get('food_store_1');
        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }else{
            return FALSE;
        }
    }

    function get_country_row_on_code($code){
        $ci =& get_instance();
        $code = substr($code, 1);
        $ci->db->where('phonecode', $code);
        $query = $ci->db->get('country_code');
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return FALSE;
        }
    }