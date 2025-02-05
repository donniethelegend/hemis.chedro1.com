<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

    
    function __construct() {
        parent::__construct();
        
           $this->load->library('session');
              $this->load->helper('url');  
              
              
              
              
              
                 if($this->session->has_userdata('username'))
            {
                $this->data=array(
                "islogged"=>true,
                "avatar"=> ("https://i.pinimg.com/736x/5f/40/6a/5f406ab25e8942cbe0da6485afd26b71.jpg"),
                "username"=>$this->session->username,
                "userlevel"=>$this->session->userlevel,
                );
            }
            else{
                
                $this->data=array(
                "islogged"=>false);
                
            }
    }

	public function index()
	{
            
                $data = $this->data;
         
		$this->load->view('page_comp/header');
		$this->load->view('page_comp/head_banner',$data);
                
                
                
                $data["temp_pass"]= $this->input->get('temppass');
     
                $this->load->view('changepass',$data);
       
         
                
             
               
		$this->load->view('page_comp/footer');
	}
        
        
        
        
        
}
