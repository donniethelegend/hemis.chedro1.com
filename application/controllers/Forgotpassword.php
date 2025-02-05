<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {

    
        function __construct() {
        parent::__construct();
        
           $this->load->library('session');
              $this->load->helper('url');  
              
              
              
              
          
              
        }

	public function index()
	{
              
            
             
                 $data=array(
                "islogged"=>false
                );
                $this->load->helper('url');
                 $this->load->library('form_validation');
		$this->load->view('page_comp/header');
		$this->load->view('page_comp/head_banner',$data);
		$this->load->view('forgotpassword');
		$this->load->view('page_comp/footer');
	}
        
        

	public function initiate_reset()
	{
            
               $this->load->library('session');
               
               
            $this->output->set_content_type('application/json');
            $this->load->model("user_model");   
            $this->load->model("system_model");   
             $data =array(
             "email"=>$this->input->post("email")
             //"pass"=>$this->user_model->hash($this->input->post("password"))
            ) ;
             
             
           $result =  $this->user_model->checkemail($data);
           
        
            if($result->result_id->num_rows>0)
            { 
                $this->output->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Password is resetting please wait...","redirectto"=>false,"url"=>null)));
       
                $res = $result->result_object();
                
                
                $data["change_pass"] ="1";
               // $temp_pass = base64_encode("ched".rand(1, 200));
                $temp_pass = $this->user_model->generatePassword();
                
                
                $data["password"]= $this->user_model->hash($temp_pass);
               // $data["password"]= $temp_pass;
                $userid = $res[0]->id;
               
                        if($this->user_model->update_account($data,$userid)){
                             
                           if($this->system_model->send_email($data,$temp_pass)){
                          
                          $this->output->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Successfuly reset.","redirectto"=> './forgotpassword/reset_notif',"url"=>null)));
          }else{
                $this->output->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Email not exist.","redirectto"=>false,"url"=>null)));
      
          }
          }
          
             
                
            }
            else{
                $this->output->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Email does not exist.","redirectto"=>false,"url"=>null)));
            }
            
            
            
	}

        
        
        
        public function  reset_notif(){
        $data=array(
                "islogged"=>false
                );
                
		$this->load->view('page_comp/header');
		$this->load->view('page_comp/head_banner',$data);
		$this->load->view('reset_notif');
	
		$this->load->view('page_comp/footer');
    
    
}
}

