<?php

class User_model extends CI_Model {

    function __construct() {
    
              $this->db = $this->load->database("default",true);
    }

        

	public function hash($password)
        {
            
            $salt_key = "5fcd43b67cf9ebb9ac4dbeb02f27b735";//DonnieGwapo
            return sha1(sha1($password.$salt_key));
            
        }
	public function register($data)
        {
        $this->db->trans_begin();
            $this->db->insert('users', $data);

if ($this->db->trans_status() === FALSE)
{
        $this->db->trans_rollback();
        
        return false;
}
else
{
        $this->db->trans_commit();
        return true;
}
   
          
          
            
	}
        function generatePassword($length = 12) {
    $characters = '0123456789abcdefghijkSGSFGHHDpqrs3452325345tuvwxyzABCDEFGHIsdfsgshJKLMjgkjhjhkjgnfbdNOPQRSTUVWXYZ';
    $password = '';

    // Generate a random password
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, strlen($characters) - 1)];
    }

    return $password;
}
        
        
	public function updatepassword($data)
        {
        $this->db->trans_begin();

            $id = $this->db->query("select id from users where  username = '".$data["user"]."' and password ='".$data["oldpass"]."'")->row();
        
            if($id){
            $this->db->where('id', $id->id);
            $this->db->update('users', array('password'=>$data['newpass'],'change_pass'=>'0'));

            if ($this->db->trans_status() === FALSE)
            {
                    $this->db->trans_rollback();

                    return false;
            }
            else
            {
                    $this->db->trans_commit();
                    return true;
            }
   
          
            }else{
                return false;
            }
            
	}
	public function update_account($data,$id)
        {
        $this->db->trans_begin();

       
            if($id){
            $this->db->where('id', $id);
            $this->db->update('users', $data);

            if ($this->db->trans_status() === FALSE)
            {
                    $this->db->trans_rollback();

                    return false;
            }
            else
            {
                    $this->db->trans_commit();
                    return true;
            }
   
          
            }else{
                return false;
            }
            
	}
        
        
        
        
        
        
	public function checkemail($data)
        {
        

        $result = $this->db->query("SELECT id FROM grantee_user WHERE email = '".$data['email']."'");
        
 
          //  echo "Select  users.* from users where username = '".$data["user"]."' and password ='".$data["pass"]."'";
        return $result;
          
          
            
	}
	public function check_login($data)
        {
        

        $result = $this->db->query("SELECT  users.*   FROM users
            
                 WHERE `status` = 'active' AND username = '".$data["user"]."' AND PASSWORD ='".$data["pass"]."'");
 
          //  echo "Select  users.* from users where username = '".$data["user"]."' and password ='".$data["pass"]."'";
        return $result;
          
          
            
	}
	public function check_status($id = false)
        {
        
          
            $this->db->select('if(users.status="active",0,1) as status');
        
     
            $this->db->where('id',$id);
            
            
            $result = $this->db->get('users');
            
            if ($result->num_rows() == 1) {
                 $row = $result->row(); 
                  return $row->status;
            }
            
	}
	public function getUserdata($id)
        {
        
    
        
        $result = $this->db->query("SELECT * FROM users WHERE id = '".$id."'");
 
        
        
        return $result->result_object();
          
          
            
	}
	public function getAll()
        {
        
    
        
        $result = $this->db->query("SELECT * FROM users");
 
        
        
        return $result->result_object();
          
          
            
	}
	public function getHEI_Focal($instcode = false)
        {
        
  
        $this->db->select("*");
       
    if($instcode){
        $this->db->where("instcode",$instcode);
    } 
    
    $result =$this->db->get("hemis_focalheidirector");
         
        
        return $result->result_object();
          
          
            
	}
        
        
        
        
        
        
        


        

	
}
