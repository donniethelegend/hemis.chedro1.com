<?php

class Checks_model extends CI_Model {

     function __construct() {
     parent::__construct();
              $this->db = $this->load->database("default",true);
    }

        
     
        
        
 
      public function update_status($cid = false,$status=false)
        {
      $this->db->trans_begin();
           $this->db->set('status', $status);
            $this->db->where('id', $cid);
            $this->db->update('checks_submission');

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
      public function update_remarks($cid = false,$remarks=false)
        {
      $this->db->trans_begin();
           $this->db->set('remarks', $remarks);
            $this->db->where('id', $cid);
            $this->db->update('checks_submission');

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
      public function getchecksids($id = false)
        {
        
        $result = $this->db->query("SELECT (SELECT GROUP_CONCAT(cs.id )FROM checks_submission AS cs WHERE cs.instcode = ss.`instcode` 
AND cs.form_name = ss.`form_name` AND cs.schoolyear = ss.`schoolyear` )
 AS ids FROM `checks_submission` AS ss WHERE ss.id  = $id ");
 
        
        
        return $result->result_object();
          
          
            
	}
      public function get_rowdata($id = false)
        {
        
        $result = $this->db->query("SELECT p.* FROM `checks_submission` p WHERE p.`id` = $id ");
 
        
        
        return $result->result_object();
          
          
            
	}
      public function get_listofheisubmitted()
        {
        
        $result = $this->db->query("SELECT p.* FROM `checks_submission`");
 
        
        
        return $result->result_object();
          
          
            
	}
      public function getform_status($insticode = false, $sy = false,$form = false)
        {
        
        $result = $this->db->query("SELECT p.*
FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY instcode, form_name
) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE p.`instcode` = '$insticode'
AND  p.`schoolyear` = '$sy'
AND  p.form_name = '$form';");
 
        
        
        return $result->result_object();
          
          
            
	}
      public function getsubmission_status($insticode = false, $sy = false)
        {
        
        $result = $this->db->query("SELECT p.*
                            FROM `hei_submission` p
                            WHERE p.`insticode` = '$insticode'
                            AND  p.`schoolyear` = '$sy'");
 
        
        
        return $result->result_object();
          
          
            
	}
      public function updateheisubstat($data2 = false)
        {
        if($data2){
            
            
        $this->db->trans_begin();
            $this->db->delete('hei_submission', array("insticode"=>$data2["insticode"]));
            $this->db->insert('hei_submission', $data2);

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
       
          
            
	}
        
        
      public function getforms_status($insticode = false, $sy = false)
        {
        
        $result = $this->db->query("SELECT p.*
FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY instcode, form_name
) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE p.`instcode` = '$insticode'
AND  p.`schoolyear` = '$sy';");
 
        
        
        return $result->result_object();
          
          
            
	}
      public function getAllforms_status($sy = false)
        {
        
        $result = $this->db->query("	

SELECT p.`form_name`, 
	grouped_p.heitype2,
	(select count(`a_institution_profile`.`heid`) from `a_institution_profile` where `a_institution_profile`.`hei_status` = 'ACTIVE' and `a_institution_profile`.`heitype` = grouped_p.heitype2) as heicount,
    COUNT(p.status) AS `total`,
    COUNT(IF(p.`status` = 'PENDING', 1, NULL)) AS pending,
    COUNT(IF(p.`status` = 'DISAPPROVED', 1, NULL)) AS disapproved,
    COUNT(IF(p.`status` = 'APPROVED', 1, NULL)) AS approved
FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear, (SELECT a1.`heitype` FROM `a_institution_profile` AS a1 WHERE a1.`instcode` = checks_submission.`instcode` AND a1.hei_status = 'ACTIVE') as heitype2
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY  instcode,form_name ,(SELECT a1.`heitype` FROM `a_institution_profile` AS a1 WHERE a1.`instcode` = checks_submission.`instcode` AND a1.hei_status = 'ACTIVE')

) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE  p.`schoolyear` = '$sy'
group by p.`form_name`,grouped_p.heitype2 "
                . "order by grouped_p.heitype2 , p.`form_name`");
 
        
        
        return $result->result_object();
          
          
            
	}
      public function getChecksCount_bydate($sy = false)
        {
        
        $result = $this->db->query('select  DATE(uploaded_date) as date, count(id) as value from checks_submission where DATE(uploaded_date) LIKE "%'.$sy.'%"  group by uploaded_date');
 
        
        
        return $result->result_object();
          
          
            
	}
      public function getAll_formB($sy = false)
        {
        
        $result = $this->db->query("SELECT p.*,
            (select a_institution_profile.`instname` from a_institution_profile where a_institution_profile.`instcode` = p.`instcode` limit 1) as heiname,
            (select a_institution_profile.`heitype` from a_institution_profile where a_institution_profile.`instcode` = p.`instcode` limit 1) as heitype

FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY instcode, form_name
) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE p.`schoolyear` = '$sy'
AND  p.form_name = 'NONSUC-e-Forms-B-C' OR p.form_name = 'SUC-NF-FORM-B'");
        
        
        return $result->result_object();
          
          
            
	}
   
      public function getAll_formA($sy = false)
        {
        
        $result = $this->db->query("SELECT p.*,(select a_institution_profile.`instname` from a_institution_profile where a_institution_profile.`instcode` = p.`instcode` limit 1) as heiname

FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY instcode, form_name
) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE p.`schoolyear` = '$sy'
AND  p.form_name = 'NONSUC-e-Forms-A' OR p.form_name = 'SUC-NF-Forms-A'");
        
        
        return $result->result_object();
          
          
            
	}
   
        
      public function getAll_formE1($sy = false)
        {
        
        $result = $this->db->query("SELECT p.*,(select a_institution_profile.`instname` from a_institution_profile where a_institution_profile.`instcode` = p.`instcode` limit 1) as heiname

FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY instcode, form_name
) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE p.`schoolyear` = '$sy'
AND   p.form_name = 'SUC-NF-FORM-E1'");
        
        
        return $result->result_object();
          
          
            
	}
      public function getAll_formE2($sy = false)
        {
        
        $result = $this->db->query("SELECT p.*,(select a_institution_profile.`instname` from a_institution_profile where a_institution_profile.`instcode` = p.`instcode` limit 1) as heiname

FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY instcode, form_name
) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE p.`schoolyear` = '$sy'
AND   p.form_name = 'SUC-NF-FORM-E2'");
        
        
        return $result->result_object();
          
          
            
	}
      public function getAll_formE5($sy = false)
        {
        
        $result = $this->db->query("SELECT p.*,(select a_institution_profile.`instname` from a_institution_profile where a_institution_profile.`instcode` = p.`instcode` limit 1) as heiname

FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY instcode, form_name
) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE p.`schoolyear` = '$sy'
AND   p.form_name = 'NONSUC-Form-E5-Faculty-Form'");
        
        
        return $result->result_object();
          
          
            
	}
      public function getAll_formGH($sy = false)
        {
        
        $result = $this->db->query("SELECT p.*,(select a_institution_profile.`instname` from a_institution_profile where a_institution_profile.`instcode` = p.`instcode` limit 1) as heiname

FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY instcode, form_name
) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE p.`schoolyear` = '$sy'
AND   p.form_name = 'SUC-NF-FORM-GH'");
        
        
        return $result->result_object();
          
          
            
	}
      public function getAll_formResearchExtension($sy = false)
        {
        
        $result = $this->db->query("SELECT p.*,(select a_institution_profile.`instname` from a_institution_profile where a_institution_profile.`instcode` = p.`instcode` limit 1) as heiname

FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY instcode, form_name
) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE p.`schoolyear` = '$sy'
AND   p.form_name = 'NONSUC-e-Research' or p.form_name = 'SUC-NF-Research-Extension-Forms'");
        
        
        return $result->result_object();
          
          
            
	}
      public function getAll_formPRCGraduates($sy = false)
        {
        
        $result = $this->db->query("SELECT p.*,(select a_institution_profile.`instname` from a_institution_profile where a_institution_profile.`instcode` = p.`instcode` limit 1) as heiname

FROM `checks_submission` p
INNER JOIN (
    SELECT form_name, MAX(id) AS latestid,schoolyear
    FROM `checks_submission`
    WHERE checks_submission.`schoolyear` = '$sy'
    GROUP BY instcode, form_name
) grouped_p ON p.form_name = grouped_p.form_name AND p.id = grouped_p.latestid 
WHERE p.`schoolyear` = '$sy'
AND   p.form_name = 'NONSUC-PRC-List-of-Graduates' or p.form_name = 'SUC-PRC-List-of-Graduates'");
        
        
        return $result->result_object();
          
          
            
	}
   
        


        

	
}
