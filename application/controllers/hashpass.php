<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hashpass extends CI_Controller {

    
    function __construct() {
        parent::__construct();
        
           $this->load->library('session');
              $this->load->helper('url');  
              
             
    }

	public function index()
	{ $this->load->model("user_model");   
            
           echo   $this->user_model->hash($this->input->get("password"));
          
	}
	
        
        
}
