<?php

class Programs_model extends CI_Model {

     function __construct() {
     parent::__construct();
              $this->db = $this->load->database("default",true);
    }
public function update($id,$data)
        {
        $this->db->trans_begin();
    $this->db->where('programid', $id);
    $this->db->update('b_program', $data);

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
        
        public function delete($id =false)
        {
        $this->db->trans_begin();
            $this->db->delete('b_program', array('programid'=>$id));

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
        public function insert_b_form($data)
        {
        $this->db->trans_begin();
            $this->db->insert_batch('b_program', $data);

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
        
          public function getCountProgram($datayear)
        {
    
        
        $result = $this->db->query("select
(select count(programid)  from b_program where datayear = '$datayear' and pstatuscode = 'CO') as co,
(select count(programid)  from b_program where datayear = '$datayear' and pstatuscode = 'DO') as do,
(select count(programid)  from b_program where datayear = '$datayear' and pstatuscode = 'PO') as po,
(select count(programid)  from b_program where datayear = '$datayear' and pstatuscode = 'NO') as no,
(SELECT COUNT(programid)  FROM b_program WHERE datayear = '$datayear' and pstatuscode = 'NA') as na");
    
   
        
        return $result->result_object();
          
          
            
	}
          public function AllProgramPermits()
        {
    
        
        $result = $this->db->query("select * from `programs_list` 
left join `a_institution_profile` on  (programs_list.`instcode` = a_institution_profile.`instcode`)");
    
   
        
        return $result->result_object();
          
          
            
	}
          public function getCountProgram_proglevel($datayear,$proglevel)
        {
   
        
        $result = $this->db->query("select
(select count(programid)  from b_program where datayear = '$datayear' and pstatuscode = 'CO' AND `programlevel` = $proglevel) as co,
(select count(programid)  from b_program where datayear = '$datayear' and pstatuscode = 'DO' AND `programlevel` = $proglevel) as do,
(select count(programid)  from b_program where datayear = '$datayear' and pstatuscode = 'PO' AND `programlevel` = $proglevel) as po,
(select count(programid)  from b_program where datayear = '$datayear' and pstatuscode = 'NO' AND `programlevel` = $proglevel) as no,
(SELECT COUNT(programid)  FROM b_program WHERE datayear = '$datayear' and pstatuscode = 'NA'  AND `programlevel` = $proglevel) as na");
    
   
        
        return $result->result_object();
          
          
            
	}
                  public function getCountEnrollment($datayear)
        {
        
    
        
        $result = $this->db->query("select  
sum(
	if(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`)=convert(`emtotal`,unsigned),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
		if(
			`emtotal`=0 or `emtotal` = null ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
			`emtotal`
		)
		
	)
) as `male`,

sum(
	if(
	(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=convert(`eftotal`,unsigned),
		(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		if(
			convert(`eftotal`,unsigned)=0 or convert(`eftotal`,unsigned) = null ,(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			convert(`eftotal`,unsigned)
		)
		
	)
) as `female`
from `b_program`
where datayear = '$datayear' AND programlevel IN (40,50,70,80,90)"); //this is except basic and vocational
 
        
        
        return $result->result_object();
          
          
            
	}
                  public function getSelectedPrograms($values,$datayear)
        {


        $result = $this->db->query('SELECT  
mainprogram,
SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`)=CONVERT(`emtotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
		IF(
			`emtotal`=0 OR `emtotal` = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
			`emtotal`
		)
		
	)
) AS `emale`,

SUM(
	IF(
	(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`eftotal`,UNSIGNED),
		(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`eftotal`,UNSIGNED)=0 OR CONVERT(`eftotal`,UNSIGNED) = NULL ,(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`eftotal`,UNSIGNED)
		)
		
	)
) AS `efemale`,


SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`etotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`etotal`,UNSIGNED)=0 OR CONVERT(`etotal`,UNSIGNED) = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`etotal`,UNSIGNED)
		)
		
	)
) AS `total`







FROM `b_program`

WHERE datayear = "'.$datayear.'" 
AND programlevel = 50
and mainprogram in ('.$values.')

GROUP BY mainprogram
ORDER BY


SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`etotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`etotal`,UNSIGNED)=0 OR CONVERT(`etotal`,UNSIGNED) = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`etotal`,UNSIGNED)
		)
		
	)
) DESC


');
 
        
        
        return $result->result_object();
          
          
            
	}
                  public function getDataYear()
        {
        
    
        
        $result = $this->db->query("select datayear from `b_program` where datayear !='' group by datayear");
 
        
        
        return $result->result_object();
          
          
            
	}
                  public function getPrograms()
        {
        
    
        
        $result = $this->db->query("select mainprogram from `b_program` where programlevel = 50 group by mainprogram
");
 
        
        
        return $result->result_object();
          
          
            
	}
                  public function Province($datayear)
        {
        
    
        
        $result = $this->db->query("SELECT  
a_institution_profile.`province1`,
SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`)=CONVERT(`emtotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
		IF(
			`emtotal`=0 OR `emtotal` = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
			`emtotal`
		)
		
	)
) AS `emale`,

SUM(
	IF(
	(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`eftotal`,UNSIGNED),
		(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`eftotal`,UNSIGNED)=0 OR CONVERT(`eftotal`,UNSIGNED) = NULL ,(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`eftotal`,UNSIGNED)
		)
		
	)
) AS `efemale`,


SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`etotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`etotal`,UNSIGNED)=0 OR CONVERT(`etotal`,UNSIGNED) = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`etotal`,UNSIGNED)
		)
		
	)
) AS `total`







FROM `b_program`
inner join  a_institution_profile on (a_institution_profile.`instcode` = b_program.`instcode`)

WHERE datayear = '$datayear' 
AND programlevel = 50
GROUP BY a_institution_profile.`province1`
ORDER BY


SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`etotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`etotal`,UNSIGNED)=0 OR CONVERT(`etotal`,UNSIGNED) = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`etotal`,UNSIGNED)
		)
		
	)
) DESC


");
 
        
        
        return $result->result_object();
          
          
            
	}
                  public function HEICategory($datayear)
        {
        
    
        
        $result = $this->db->query("SELECT  
a_institution_profile.`heitype`,
SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`)=CONVERT(`emtotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
		IF(
			`emtotal`=0 OR `emtotal` = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
			`emtotal`
		)
		
	)
) AS `emale`,

SUM(
	IF(
	(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`eftotal`,UNSIGNED),
		(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`eftotal`,UNSIGNED)=0 OR CONVERT(`eftotal`,UNSIGNED) = NULL ,(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`eftotal`,UNSIGNED)
		)
		
	)
) AS `efemale`,


SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`etotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`etotal`,UNSIGNED)=0 OR CONVERT(`etotal`,UNSIGNED) = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`etotal`,UNSIGNED)
		)
		
	)
) AS `total`







FROM `b_program`
inner join  a_institution_profile on (a_institution_profile.`instcode` = b_program.`instcode`)

WHERE datayear = '$datayear' 
AND programlevel = 50
GROUP BY a_institution_profile.`heitype`
ORDER BY


SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`etotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`etotal`,UNSIGNED)=0 OR CONVERT(`etotal`,UNSIGNED) = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`etotal`,UNSIGNED)
		)
		
	)
) DESC


");
 
        
        
        return $result->result_object();
          
          
            
	}
                  public function top10ProgramLeast($datayear)
        {
        
    
        
        $result = $this->db->query("SELECT  
mainprogram,
SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`)=CONVERT(`emtotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
		IF(
			`emtotal`=0 OR `emtotal` = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
			`emtotal`
		)
		
	)
) AS `emale`,

SUM(
	IF(
	(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`eftotal`,UNSIGNED),
		(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`eftotal`,UNSIGNED)=0 OR CONVERT(`eftotal`,UNSIGNED) = NULL ,(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`eftotal`,UNSIGNED)
		)
		
	)
) AS `efemale`,


SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`etotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`etotal`,UNSIGNED)=0 OR CONVERT(`etotal`,UNSIGNED) = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`etotal`,UNSIGNED)
		)
		
	)
) AS `total`







FROM `b_program`

WHERE datayear = '$datayear' 
AND programlevel = 50
AND etotal != 0



GROUP BY mainprogram
ORDER BY


SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`etotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`etotal`,UNSIGNED)=0 OR CONVERT(`etotal`,UNSIGNED) = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`etotal`,UNSIGNED)
		)
		
	)
) asc

LIMIT 10
");
 
        
        
        return $result->result_object();
          
          
            
	}
                  public function top10Program($datayear)
        {
        
    
        
        $result = $this->db->query("SELECT  
mainprogram,
SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`)=CONVERT(`emtotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
		IF(
			`emtotal`=0 OR `emtotal` = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
			`emtotal`
		)
		
	)
) AS `emale`,

SUM(
	IF(
	(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`eftotal`,UNSIGNED),
		(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`eftotal`,UNSIGNED)=0 OR CONVERT(`eftotal`,UNSIGNED) = NULL ,(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`eftotal`,UNSIGNED)
		)
		
	)
) AS `efemale`,


SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`etotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`etotal`,UNSIGNED)=0 OR CONVERT(`etotal`,UNSIGNED) = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`etotal`,UNSIGNED)
		)
		
	)
) AS `total`







FROM `b_program`

WHERE datayear = '$datayear' 
AND programlevel = 50
GROUP BY mainprogram
ORDER BY


SUM(
	IF(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=CONVERT(`etotal`,UNSIGNED),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		IF(
			CONVERT(`etotal`,UNSIGNED)=0 OR CONVERT(`etotal`,UNSIGNED) = NULL ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`+
`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			CONVERT(`etotal`,UNSIGNED)
		)
		
	)
) DESC

LIMIT 10
");
 
        
        
        return $result->result_object();
          
          
            
	}
                  public function getCountEnrollment_proglevel($datayear,$proglevel)
        {
        
    
        
        $result = $this->db->query("select  
sum(
	if(
	(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`)=convert(`emtotal`,unsigned),
		(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
		if(
			`emtotal`=0 or `emtotal` = null ,(`newstudm`+`oldstudm`+`secondm`+`thirdm`+`fourthm`+`fifthm`+`sixthm`+`seventhm`),
			`emtotal`
		)
		
	)
) as `male`,

sum(
	if(
	(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`)=convert(`eftotal`,unsigned),
		(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
		if(
			convert(`eftotal`,unsigned)=0 or convert(`eftotal`,unsigned) = null ,(`newstudf`+`oldstudf`+`secondf`+`thirdf`+`fourthf`+`fifthf`+`sixthf`+`seventhf`),
			convert(`eftotal`,unsigned)
		)
		
	)
) as `female`
from `b_program`
where datayear = '$datayear' AND
`programlevel` = $proglevel");
 
        
        
        return $result->result_object();
          
          
            
	}
                  public function getCountGraduate($datayear)
        {
        
    
        
        $result = $this->db->query("select  
                                    sum(gradm) as `male`,
                                    sum(gradf) as `female`
                                    from `b_program`
                                    where datayear = '$datayear' and programlevel in (40,50,70,80,90)");
 
        
        
        return $result->result_object();
          
          
            
	}
                  public function getCountGraduate_proglevel($datayear,$proglevel)
        {
        
    
        
        $result = $this->db->query("select  
                                    sum(gradm) as `male`,
                                    sum(gradf) as `female`
                                    from `b_program`
                                    where datayear = '$datayear' AND
                                    `programlevel` = $proglevel");
 
        
        
        return $result->result_object();
          
          
            
	}
        
        
        
        
        
        
        
        
        
        
        
        public function remove_b_form($checkid)
        {
        $this->db->trans_begin();
            
        $this->db->where('checkid IN ('.$checkid.')', NULL, FALSE);
    $this->db->delete('b_program');

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
        
 
      public function getHEIPrograms($uii,$datayear)
        {
        
    
        
        $result = $this->db->query("SELECT * FROM `b_program` WHERE b_program.`instcode` = $uii AND datayear  = '$datayear'");
 //echo "SELECT * FROM `b_program` WHERE b_program.`instcode` = $uii AND datayear  = '$datayear'";
          
       // $result = $this->db->get_where("b_program", array("instcode"=>$uii,"datayear"=>$datayear));
        
        return $result->result_object();
          
          
            
	}
      public function getProgramDetails($pid)
        {
        
    
        
        $result = $this->db->query("select * from b_program where programid = ".$pid);
   
        return $result->result_object();
          
          
            
	}
    public function validateProgramName($program_name) {
    // Sanitize input and prevent SQL injection using query bindings
    $query = "
        SELECT COUNT(id) as numberProgram
        FROM ref_program_list
        WHERE LOWER(REPLACE(ref_program_list.programname, ' ', '')) = LOWER(REPLACE(?, ' ', ''))
    ";

    // Execute query with bound parameter
    $result = $this->db->query($query, array($program_name));

    // Return the result as an object
    return $result->result_object();
}
    
        
        
        
      public function getLatestSchoolyear()
              
        {
        
    
        
       // $result = $this->db->query("SELECT * FROM `b_program` WHERE b_program.`instcode` = 1005 AND datayear  = "2016-2017"");
 
          
        $result = $this->db->query("select data_year from school_year order by id desc limit 1");
        
        return $result->result_object();
          
          
            
	}
      public function getSchoolYearList()
              
        {
        
    
        
       // $result = $this->db->query("SELECT * FROM `b_program` WHERE b_program.`instcode` = 1005 AND datayear  = "2016-2017"");
 
          
        $result = $this->db->query("select data_year from school_year order by id desc");
        
        return $result->result_object();
          
          
            
	}
        
        
        
        
        
      public function get_HEI_Profile($uii)
        {
        
    
        
        $result = $this->db->query("SELECT * FROM `a_institution_profile` WHERE instcode = ".$uii);
 
        
        
        return $result->result_object();
          
          
            
	}
      public function get_Discipline($mjcode)
        {
        
    
        
     $this->db->select('ref_b_discipline_specific.groupcode, ref_b_discipline_group.discipline_description');
$this->db->from('ref_b_discipline_specific');
$this->db->join('ref_b_discipline_group', 'ref_b_discipline_specific.groupcode = ref_b_discipline_group.groupcode', 'left');
$this->db->where('ref_b_discipline_specific.specificcode', $mjcode);
$query = $this->db->get();



if ($query->num_rows() > 0) {
    return $query->row(); // Fetch a single row as an object
} else {
    return false; // No rows found
}
          
            
	}
  
              
       public function get_all_disciplines() {
        $this->db->select('ref_b_discipline_specific.groupcode, ref_b_discipline_specific.specificdisciplinename, ref_b_discipline_group.discipline_description');
        $this->db->from('ref_b_discipline_specific');
        $this->db->join('ref_b_discipline_group', 'ref_b_discipline_specific.groupcode = ref_b_discipline_group.groupcode', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
      public function get_discipline_by_program($program_name) {
        $program_name_lower = strtolower($program_name);
        
        $this->db->select('ref_b_discipline_specific.groupcode, ref_b_discipline_specific.specificdisciplinename, ref_b_discipline_group.discipline_description');
        $this->db->from('ref_b_discipline_specific');
        $this->db->join('ref_b_discipline_group', 'ref_b_discipline_specific.groupcode = ref_b_discipline_group.groupcode', 'left');
        $this->db->like('LOWER(ref_b_discipline_specific.specificdisciplinename)', $program_name_lower);
        $query = $this->db->get();
        return $query->result_array();
    }


        

	
}
