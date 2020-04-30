<?php

class Login_model extends CI_Model
{

    public function can_login($username,$password)
    {
        $query1="select * from users where user_email='$username' and user_pass='$password'";
        $query=$this->db->query($query1);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
    public function check_login($data)
    {
        $username=$data['user_email'];
        $query2="select * from users where user_email='$username' ";
        $query3=$this->db->query($query2);
        if($query3->num_rows()==1)
        {   
            return false;
        }
        else
        { 
            $this->db->insert('users',$data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        }
        
    }
    public function check_user($username)
    {
        
        $query2="select * from users where user_email='$username' ";
        $query3=$this->db->query($query2);
        if($query3->num_rows()==1)
        {    
            return $query3->result_array();
          
        }
        else
        { 
            
            return false;
            
        }
        
    }
    public function add_emp($data)
    {
        $this->db->insert('employee',$data);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function get_all_emp()
    {
        $query=$this->db->get('employee');
        $all_emp= $query->result_array();
        $data=array('all_emp'=>$all_emp);
        return $data;
    }
    public function edit_emp($emp_id)
    {
        $emp_details = $this->db->get_where('employee', array('emp_id =' => $emp_id))->result();
        $data=array('emp_details'=>$emp_details);
        return $data;
    }
    public function edit_emp_submit($data)
    {
        $this->db->where('emp_id',$this->input->post('edit_id'));
        $this->db->update('employee',$data);
        
        if ($this->db->affected_rows() > 0) 
        {

            return true;
        }
        else
        {
            return false;
        }
        
    }
    public function delete_emp($emp_id)
    {
        $this->db->where('emp_id', $emp_id);
        $this->db->delete('employee');
        if ($this->db->affected_rows() > 0) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

     
}

?>