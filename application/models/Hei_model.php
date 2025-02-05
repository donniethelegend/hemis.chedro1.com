<?php

class Hei_model extends CI_Model {

     function __construct() {
     parent::__construct();
              $this->db = $this->load->database("default",true);
    }
public function updaterecord($data)
        {
        $this->db->trans_begin();
            $this->db->insert_batch('a_institution_profile', $data);

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
public function addrecord($data)
        {
        $this->db->trans_begin();
            $this->db->insert('a_institution_profile', $data);

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
public function update_hei($data, $where)
{
    $this->db->trans_begin(); // Start a transaction

    // Apply the 'where' clause to specify which record to update
    $this->db->where($where);
    $this->db->update('a_institution_profile', $data);

    // Check the transaction status
    if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback(); // Rollback the transaction on failure
        return false;
    } else {
        $this->db->trans_commit(); // Commit the transaction on success
        return true;
    }
}
        
        
        
        
        
        
       public function record_uploaded_checks($data)
        {
        $this->db->trans_begin();
            $this->db->insert('checks_submission', $data);

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
        
        
        
 
      public function getHEIbyUII()
        {
        
    
        
        $result = $this->db->query("SELECT p.*
FROM `a_institution_profile` p
INNER JOIN (
    SELECT instcode, MAX(heid) AS latestid
    FROM `a_institution_profile`
    GROUP BY instcode
) grouped_p ON p.instcode = grouped_p.instcode AND p.heid = grouped_p.latestid;");
 
        
        
        return $result->result_object();
          
          
            
	}
      public function getCountHEI()
        {
        
    
        
        $result = $this->db->query('select
(select count(instcode) LUC from a_institution_profile where hei_status =  "ACTIVE" and heitype = "LUC") as LUC ,
(select count(instcode) SUC from a_institution_profile where hei_status =  "ACTIVE" and heitype = "SUC") as `SUC_Total` ,
(select count(instcode) SUC from a_institution_profile where hei_status =  "ACTIVE" and heitype = "SUC" and insttype2 like "%SUC Satellite%") as `SUC_Campus`,
(SELECT COUNT(instcode) SUC FROM a_institution_profile WHERE hei_status =  "ACTIVE" AND heitype = "SUC" AND insttype2 like "%SUC Main%") AS `SUC_Main`,
(select count(instcode) Private from a_institution_profile where hei_status =  "ACTIVE" and heitype = "Private") as Private ,
(select count(instcode) total from a_institution_profile where hei_status =  "ACTIVE") as Total');
 
        
        
        return $result->result_object();
          
          
            
	}
    
      public function get_HEI_Profile($uii)
        {
        
    
        
        $result = $this->db->query("SELECT * FROM `a_institution_profile` WHERE instcode = '".$uii."'");
 
        
        
        return $result->result_object();
          
          
            
	}
  
      public function get_HEILatestProfile($uii)
        {
        
    
        
        $result = $this->db->query("SELECT p.*
FROM `a_institution_profile` p
INNER JOIN (
    SELECT instcode, MAX(heid) AS latestid
    FROM `a_institution_profile`
    GROUP BY instcode
) grouped_p ON p.instcode = grouped_p.instcode AND p.heid = grouped_p.latestid
WHERE p.instcode =  '".$uii."'");
 
        
        
        return $result->result_object();
          
          
            
	}
      public function get_ActiveInsticode()
        {
        
    
        
        $result = $this->db->query("SELECT p.instcode
FROM `a_institution_profile` p
INNER JOIN (
    SELECT instcode, MAX(heid) AS latestid
    FROM `a_institution_profile`
    GROUP BY instcode
) grouped_p ON p.instcode = grouped_p.instcode AND p.heid = grouped_p.latestid
WHERE   p.hei_status = 'ACTIVE'");
 
        
        
        return $result->result_object();
          
          
            
	}
      public function get_ActiveHEI()
        {
        
    
        
        $result = $this->db->query("SELECT p.*
FROM `a_institution_profile` p
INNER JOIN (
    SELECT instcode, MAX(heid) AS latestid
    FROM `a_institution_profile`
    GROUP BY instcode
) grouped_p ON p.instcode = grouped_p.instcode AND p.heid = grouped_p.latestid
WHERE   p.hei_status = 'ACTIVE' order by p.instname");
 
        
        
        return $result->result_object();
          
          
            
	}
  
              
        //THIS METHOD IS THE LONG METHOD FOR THE OBJECT CONVERSION
      

        
      
        


        

	
}
