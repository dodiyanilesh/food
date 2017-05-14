<?php 
class User extends CI_Model {
    
    private $table = 'users';
    
    public function get_result()
    {
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    
    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }
    
    public function update($data,$user_id)
    {
        $this->db->where('id',$user_id);
        return $this->db->update($this->table,$data);
    }
    
    public function delete($user_id)
    {
        $this->db->where('id',$user_id);
        return $this->db->delete($this->table);
    }
    
    public function get_user_on_id($user_id)
    {
        $this->db->where('id',$user_id);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return FALSE;
        }
    }
}
