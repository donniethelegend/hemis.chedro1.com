<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SSPProgram extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
        $this->load->library('ssp'); // Load the SSP library
        $this->load->helper('url');  
    }

   public function get_data() {
    $sy = base64_decode($this->input->get('sy')); // Get and decode sy parameter

    $this->load->model('checks_model');

    // DB columns to read and send back to DataTables
    $columns = array(
        array('db' => 'programid', 'dt' => 0),
        array('db' => 'instcode', 'dt' => 1),
        array('db' => 'instname', 'dt' => 2),
        array('db' => 'mainprogram', 'dt' => 3),
        array('db' => 'major', 'dt' => 4),
        array('db' => 'programlevel', 'dt' => 5),
        array('db' => 'discipline2', 'dt' => 6),
        array('db' => 'permit', 'dt' => 7),
        array('db' => 'pstatuscode', 'dt' => 8),
        array('db' => 'remarks', 'dt' => 9),
        array('db' => 'programid', 'dt' => 10)  // Buttons column
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
    $baseQuery = "SELECT 
        p.programid,
        p.instcode,
        i.instname,
        p.mainprogram,
        p.major,
        p.programlevel,
        p.discipline2,
        CONCAT(p.authcat, ' ', p.authserial, ' s.', p.authyear) AS permit,
        p.pstatuscode,
        p.remarks
    FROM b_program AS p
    LEFT JOIN a_institution_profile AS i ON i.instcode = p.instcode
    WHERE p.datayear = ? 
    AND i.hei_status = 'ACTIVE' ";

    // Add filtering logic
    if (!empty($searchValue)) {
        $baseQuery .= " AND (
            p.instcode LIKE ? OR 
            p.mainprogram LIKE ? OR 
            i.instname LIKE ? OR 
            p.major LIKE ? OR 
            p.programlevel LIKE ? OR 
            p.discipline2 LIKE ? OR 
            p.pstatuscode LIKE ? OR 
            CONCAT(p.authcat, ' ', p.authserial, ' s.', p.authyear) LIKE ? OR 
            p.remarks LIKE ?  
        )";
        $bindParams = array_merge([$sy], array_fill(0, 9, "%{$searchValue}%"));
    } else {
        $bindParams = [$sy];
    }

    // Add sorting logic
    $baseQuery .= " GROUP BY p.programid ORDER BY " . $orderByColumn . " " . $orderDir . ", i.instname ASC";

    // Add pagination logic
    $baseQuery .= " LIMIT ?, ?";
    $bindParams[] = (int) $start;
    $bindParams[] = (int) $length;

    // Execute the query with bound parameters
    $result = $this->db->query($baseQuery, $bindParams)->result_array();

    // Get the total number of records after filtering
    $filteredQuery = "SELECT COUNT(*) AS count FROM b_program AS p 
                      LEFT JOIN a_institution_profile AS i ON i.instcode = p.instcode 
                      WHERE p.datayear = ? AND i.hei_status = 'ACTIVE'";
    $filteredResult = $this->db->query($filteredQuery, [$sy])->row()->count;

    // Get the total number of records (without filtering)
    $totalQuery = "SELECT COUNT(*) AS count FROM b_program AS p 
                   LEFT JOIN a_institution_profile AS i ON i.instcode = p.instcode 
                   WHERE p.datayear = ? AND i.hei_status = 'ACTIVE' ";
    $totalResult = $this->db->query($totalQuery, [$sy])->row()->count;

    // Prepare the data for DataTables
    $data = [];
    $counter = $start + 1;
    foreach ($result as $row) {
        $data[] = [
            $counter,
            $row['instcode'],
            $row['instname'],
            $row['mainprogram'],
            $row['major'],
            $row['programlevel'],
            $row['discipline2'],
            $row['permit'],
            $row['pstatuscode'],
            $row['remarks'],
            "<a class='btn btn-link' href='" . base_url() . "hei/program_details/" . $row['programid'] . "'>View </a>&nbsp;".
            "<button data-toggle='modal' data-target='#del_prog' class='btn-link btn text-danger' data-pname='".$row['mainprogram']."' data-pid='". $row['programid'] . "'>Delete</button>"
        ];
        $counter++;
    }

    // Prepare the output array
    $output = [
        "draw" => intval($this->input->get('draw')),
        "recordsTotal" => $totalResult,
        "recordsFiltered" => $filteredResult,
        "data" => $data
    ];

    echo json_encode($output);
}

}
