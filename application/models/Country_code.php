<?php 
class Country_code extends CI_Model {
    public function get_all_country_code()
    {   
        $query = $this->db->get('country_code');
        return $query->result();
    }
}