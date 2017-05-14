<?php 
class Profile extends CI_Model {
    
    private $table = 'profile';
    
    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }
    
    public function update($data,$user_id)
    {
        $this->db->where('user_id',$user_id);
        return $this->db->update($this->table,$data);
    }
    
    public function delete($user_id)
    {
        $this->db->where('user_id',$user_id);
        return $this->db->delete($this->table);
    }
    
    public function get_profile_on_id($user_id)
    {
        $this->db->where('user_id',$user_id);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return FALSE;
        }
    }
}