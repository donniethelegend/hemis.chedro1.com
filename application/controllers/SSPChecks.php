<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SSPChecks extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
        $this->load->library('ssp'); // Load the SSP library
            $this->load->helper('url');  
    }

   public function get_data() {
       $sy = base64_decode($_GET['sy']);
       $this->load->model('checks_model');
    // DB columns to read and send back to DataTables
   $columns = array(
            array('db' => 'instcode', 'dt' => 0),
            array('db' => 'instname', 'dt' => 1),
            array('db' => 'heitype', 'dt' => 2),
            array('db' => 'instcode', 'dt' => 3),  // Buttons column
            array('db' => 'date', 'dt' => 4)      // Hidden date column
        );

    // Capture the DataTables request parameters
    $start = $this->input->get('start');
    $length = $this->input->get('length');
    $searchValue = $this->input->get('search')['value'];
    $orderColumn = $this->input->get('order')[0]['column'];
    $orderDir = $this->input->get('order')[0]['dir'];

    // Map DataTables column index to database columns
    $orderByColumn = $columns[$orderColumn]['db'];

    // Base SQL query
    $baseQuery = "
      SELECT 
    p.instcode, 
    p.instname, 
    p.heitype, 
    (
        SELECT MAX(checks_submission.`uploaded_date`) 
        FROM checks_submission 
        WHERE 
            checks_submission.`instcode` = p.`instcode` 
            AND checks_submission.`status` = 'PENDING'
            AND checks_submission.`schoolyear` = '$sy'
        GROUP BY instcode
    ) AS `date`
FROM `a_institution_profile` p
INNER JOIN (
    SELECT instcode, MAX(heid) AS latestid
    FROM `a_institution_profile`
    GROUP BY instcode
) grouped_p ON p.instcode = grouped_p.instcode AND p.heid = grouped_p.latestid
where 
p.hei_status = 'ACTIVE'

    ";

    // Add filtering logic
    if (!empty($searchValue)) {
        $baseQuery .= " and (p.instcode LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                           OR p.instname LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                           OR p.heitype LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                         )";
    }

    // Add sorting logic
      $baseQuery .= " GROUP BY p.instcode ORDER BY " . $orderByColumn . " " . $orderDir. ", `instname` ASC ";

    // Add pagination logic
    $baseQuery .= " LIMIT " . intval($start) . ", " . intval($length);

    // Execute the query
    $this->load->database();
    $result = $this->db->query($baseQuery)->result_array();

    // Get the total number of records after filtering (for pagination purposes)
    $filteredQuery = "
        SELECT COUNT(*) as count
        FROM `a_institution_profile` p
        INNER JOIN (
            SELECT instcode, MAX(heid) as latestid
            FROM `a_institution_profile`
            GROUP BY instcode
        ) grouped_p ON p.instcode = grouped_p.instcode AND p.heid = grouped_p.latestid
      where 
p.hei_status = 'ACTIVE' 
    ";
    
    if (!empty($searchValue)) {
        $filteredQuery .= " and (p.instcode LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                               OR p.instname LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                               OR p.heitype LIKE '%" . $this->db->escape_like_str($searchValue) . "%')
                               ";
    }

    $filteredResult = $this->db->query($filteredQuery)->row()->count;

    // Get the total number of records (without filtering)
    $totalQuery = "
        SELECT COUNT(*) as count
        FROM `a_institution_profile`
        where 
        hei_status = 'ACTIVE'
    ";
    $totalResult = $this->db->query($totalQuery)->row()->count;

    // Prepare the data in the format DataTables expects
    $data = array();
    $counter = ($start+1);
    foreach ($result as $row) {
        
        
         $formsta  = $this->checks_model->getforms_status( $row['instcode'],$sy);
       $forms_btn = "";
 $date = $row['date']; // Use date from query result

        $sucs_btn = array(
            "SUC-NF-FORM-A"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> Form A</a>',
            "SUC-NF-FORM-B"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> Form B</a>',
            "SUC-NF-FORM-E1"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> Form E1</a>',
            "SUC-NF-FORM-E2"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> Form E2</a>',
            "SUC-NF-FORM-GH"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> Form GH</a>',
            "SUC-NF-Research-Extension-Forms"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> Research Extension</a>',
            "SUC-PRC-List-of-Graduates"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> PRC List of Graduates</a>',
            );
        $nonsucs_btn = array(
            "NONSUC-e-Forms-A"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> Form A</a>',
            "NONSUC-e-Forms-B-C"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> Form B-C</a>',
            "NONSUC-e-Forms-E5"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> Form E5</a>',
            "NONSUC-e-Research"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> Research</a>',
            "NONSUC-PRC-List-of-Graduates"=>'<a href="#" class="btn btn-outline btn-sm "> <span class="icon-file-spreadsheet"></span> PRC List of Graduates</a>'
            )    ;
        
        
            foreach($formsta as $forms){
                
                
                            if ($forms->status == "PENDING") {
                                $color = ' bg-primary';
                             
                            } else if ($forms->status == "DISAPPROVED") {
                                $color = ' bg-danger';
                            } else if ($forms->status === "APPROVED") {
                                $color = ' bg-success';
                            } else {
                                $color = ' bg-warning';
                            }
        
                switch($forms->form_name){
                           case "SUC-PRC-List-of-Graduates":
                                $sucs_btn['SUC-PRC-List-of-Graduates'] = '<a href="'.base_url().'Checks_Attachment/'. ('SUCPRCListofGraduates').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> PRC List of Graduates</a>';
                            break;
                            case "SUC-NF-Research-Extension-Forms":
                                $sucs_btn["SUC-NF-Research-Extension-Forms"]='<a href="'.base_url().'Checks_Attachment/'. ('SUCNFResearchExtensionForms').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> Research Extension</a>';
                            break;
                            case "SUC-NF-FORM-GH":
                                $sucs_btn["SUC-NF-FORM-GH"]= '<a href="'.base_url().'Checks_Attachment/'. ('SUCNFFORMGH').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> Form GH</a>';
                            break;    
                            case "SUC-NF-FORM-E2":
                               $sucs_btn['SUC-NF-FORM-E2']= '<a href="'.base_url().'Checks_Attachment/'. ('SUCNFFORME2').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> Form E2</a>';
                            break;
                            case "SUC-NF-FORM-E1":
                                $sucs_btn['SUC-NF-FORM-E1'] = '<a href="'.base_url().'Checks_Attachment/'. ('SUCNFFORME1').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> Form E1</a>';
                            break;
                            case "SUC-NF-FORM-B":
                                $sucs_btn['SUC-NF-FORM-B']='<a href="'.base_url().'Checks_Attachment/'. ('SUCNFFORMB').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> Form B</a>';
                            break;    
                            case "SUC-NF-Forms-A":
                                $sucs_btn["SUC-NF-FORM-A"] = '<a href="'.base_url().'Checks_Attachment/'. ('SUCNFFormsA').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> Form A</a>';
                            break;
                            case "NONSUC-e-Forms-A":
                                $nonsucs_btn['NONSUC-e-Forms-A'] =  '<a href="'.base_url().'Checks_Attachment/'. ('NONSUCeFormsA').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> Form A</a>';
                            break;    
                            case "NONSUC-e-Forms-B-C":
                                $nonsucs_btn['NONSUC-e-Forms-B-C'] = '<a href="'.base_url().'Checks_Attachment/'. ('NONSUCeFormsBC').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> Form B-C</a>';
                            break;
                            case "NONSUC-Form-E5-Faculty-Form":
                                $nonsucs_btn['NONSUC-e-Forms-E5'] = '<a href="'.base_url().'Checks_Attachment/'. ('NONSUCFormE5FacultyForm').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> Form E5</a>';
                            break;
                            case "NONSUC-PRC-List-of-Graduates":
                                $nonsucs_btn['NONSUC-PRC-List-of-Graduates'] = '<a href="'.base_url().'Checks_Attachment/'. ('NONSUCPRCListofGraduates').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> PRC List of Graduates</a>';
                            break;
                            case "NONSUC-e-Research":
                                $nonsucs_btn['NONSUC-e-Research'] = '<a href="'.base_url().'Checks_Attachment/'. ('NONSUCeResearch').'/' .$forms->id.'/0" class="btn  '.$color.' btn-sm "> <span class="icon-file-spreadsheet"></span> Research</a>';
                            break;
                         
                    }
                
               
               
            
        
                
            }
            
         if($row['heitype'] == "SUC"){
            $forms_btn .=   $sucs_btn["SUC-NF-FORM-A"];       
            $forms_btn .=   $sucs_btn["SUC-NF-FORM-B"];
            $forms_btn .=   $sucs_btn["SUC-NF-FORM-E1"]; 
            $forms_btn .=   $sucs_btn["SUC-NF-FORM-E2"]; 
            $forms_btn .=   $sucs_btn["SUC-NF-FORM-GH"];
            $forms_btn .=   $sucs_btn["SUC-NF-Research-Extension-Forms"];
            $forms_btn .=   $sucs_btn["SUC-PRC-List-of-Graduates"];
                }
                else{
            $forms_btn.= $nonsucs_btn["NONSUC-e-Forms-A"];
            $forms_btn.= $nonsucs_btn["NONSUC-e-Forms-B-C"];
            $forms_btn.= $nonsucs_btn["NONSUC-e-Forms-E5"];
            $forms_btn.= $nonsucs_btn["NONSUC-e-Research"];
            $forms_btn.= $nonsucs_btn["NONSUC-PRC-List-of-Graduates"];
                    
                }
        
        
        $data[] = array(
            $counter,
            $row['instcode'],
            $row['instname'],
            $row['heitype'],
            $forms_btn,
            $date?$date:null);
        $counter++;
    }

    // Prepare the output array
    $output = array(
        "draw" => intval($this->input->get('draw')),
        "recordsTotal" => $totalResult,
        "recordsFiltered" => $filteredResult,
        "data" => $data
    );

    echo json_encode($output);
}   
        
        
        
}
