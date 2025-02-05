<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SSPHemis extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
        $this->load->library('ssp'); // Load the SSP library
            $this->load->helper('url');  
    }

   public function get_data() {
    // DB columns to read and send back to DataTables
    $columns = array(
        array('db' => 'instcode', 'dt' => 0),
        array('db' => 'instname', 'dt' => 1),
        array('db' => 'heitype', 'dt' => 2),
        array('db' => 'hei_status', 'dt' => 3),
          array('db' => 'instcode', 'dt' => 4) // This will be used to create the buttons
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
        SELECT p.instcode, p.instname, p.heitype, p.hei_status
        FROM `a_institution_profile` p
        INNER JOIN (
            SELECT instcode, MAX(heid) as latestid
            FROM `a_institution_profile`
            GROUP BY instcode
        ) grouped_p ON p.instcode = grouped_p.instcode AND p.heid = grouped_p.latestid
    ";

    // Add filtering logic
    if (!empty($searchValue)) {
        $baseQuery .= " WHERE (p.instcode LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                           OR p.instname LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                           OR p.heitype LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                           OR p.hei_status LIKE '%" . $this->db->escape_like_str($searchValue) . "%')";
    }

    // Add sorting logic
    $baseQuery .= " ORDER BY " . $orderByColumn . " " . $orderDir;

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
    ";
    
    if (!empty($searchValue)) {
        $filteredQuery .= " WHERE (p.instcode LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                               OR p.instname LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                               OR p.heitype LIKE '%" . $this->db->escape_like_str($searchValue) . "%'
                               OR p.hei_status LIKE '%" . $this->db->escape_like_str($searchValue) . "%')";
    }

    $filteredResult = $this->db->query($filteredQuery)->row()->count;

    // Get the total number of records (without filtering)
    $totalQuery = "
        SELECT COUNT(*) as count
        FROM `a_institution_profile`
    ";
    $totalResult = $this->db->query($totalQuery)->row()->count;

    // Prepare the data in the format DataTables expects
    $data = array();
    foreach ($result as $row) {
        $data[] = array(
            $row['instcode'],
            $row['instname'],
            $row['heitype'],
            $row['hei_status']
            ,
            '<a href="'.base_url().'hei/view_profile/' . $row['instcode'] . '" class="btn btn-primary btn-sm "><span class="icon-address-book"></span> View Profile</a> 
            <a href="'.base_url().'hei/view_programs/' . $row['instcode'] . '" class="btn btn-success btn-sm "><span class="icon-books"></span> Programs</a> '
        );
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
