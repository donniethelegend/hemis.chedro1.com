<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

 function __construct() {
        parent::__construct();
        
           $this->load->library('session');
              $this->load->helper('url');  
              
                 if($this->session->has_userdata('username'))
            {
                 $appid = $this->session->appid; 
                $this->data=array(
                "appid"=>$appid,
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
           if($data["islogged"]&& $data['userlevel']=="administrator"){
         
            
          
                $this->load->helper('url');
		$this->load->view('page_comp/header');
		$this->load->view('page_comp/head_banner',$data);
                
		$this->load->view('register');
          
                  
		$this->load->view('page_comp/footer');
	
                   }
            else{
                
              //  $response = array('Unauthorized Access');
                      $this->output
        ->set_header('HTTP/1.1 401 Unauthorized')
        ->set_status_header('401')
        ->set_content_type('text/html')
        ->set_output("<h2>Error Code 401</h2><br/>"
                . "Warning: You are not authorized to access this page. "
                . "<br/>Contact CHED Region 1");
                
            }
                
                
                  }
	public function addUser()
	{
            
            
                  if($this->session->has_userdata('username'))  {
                
            $this->output->set_content_type('application/json');
            $this->load->model("user_model");   
             $data =array(
            
             "password"=> $this->user_model->hash($this->input->post("password")),
             "username"=>$this->input->post("username"),
             "email"=>$this->input->post("email"),
             "name"=>$this->input->post("name"),
             "user_level"=>$this->input->post("user_level"),
             "status"=>$this->input->post("status"),
             "change_pass"=>$this->input->post("change_pass")
            ) ;
             
             
             
             
           if($this->user_model->register($data))
           {
               
               
               
               
        $this->output->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Successfuly Saved!","redirectto"=>'./accountmanager',"url"=>null)));
	}
        else{
            
            
            $this->output->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Failed!","redirectto"=>'./register',"url"=>null)));
        }
            
               }
            else{
                
              //  $response = array('Unauthorized Access');
                      $this->output
        ->set_header('HTTP/1.1 401 Unauthorized')
        ->set_status_header('401')
        ->set_content_type('text/html')
        ->set_output("<h2>Error Code 401</h2><br/>"
                . "Warning: You are not authorized to access this page. "
                . "<br/>Contact CHED Region 1")
        ;
                
            }
            
	}
	public function update_user_account()
	{
            
            
                  if($this->session->has_userdata('username'))
            {
                 $this->output->set_content_type('application/json');
            $this->load->model("user_model");   
        $userid = $this->input->post("id");
            $data =array(
            
             "username"=>$this->input->post("username"),
             "email"=>$this->input->post("email"),
             "name"=>$this->input->post("name"),
             "user_level"=>$this->input->post("user_level"),
             "status"=>$this->input->post("status"),
             "change_pass"=>$this->input->post("change_pass")
            ) ;
        
     
        
             
             if( $this->input->post("password")&&$this->input->post("password")!=null){

                $data['password'] = $this->user_model->hash($this->input->post("password"));
                } 
             
   
  
             
             
                         if($this->user_model->update_account($data,$userid))
                            {

                  

                       //  $this->output->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Successfuly Updated!","redirectto"=>base_url()."accountmanager","url"=>null)));
                         $this->output->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Successfuly Updated!","redirectto"=>false,"url"=>null)));
                         }
                         else{


                             $this->output->set_output(json_encode(array("title"=>"WARNING","type"=>"danger","message"=>"Failed","redirectto"=>false,"url"=>null)));
                         }

	
            
               }
            else{
                
              //  $response = array('Unauthorized Access');
                      $this->output
        ->set_header('HTTP/1.1 401 Unauthorized')
        ->set_status_header('401')
        ->set_content_type('text/html')
        ->set_output("<h2>Error Code 401</h2><br/>"
                . "Warning: You are not authorized to access this page. "
                . "<br/>Contact CHED Region 1")
        ;
                
            }
            
	}
	public function updatepassword()
	{
            
            
                  if($this->session->has_userdata('username'))
            {
                 $this->output->set_content_type('application/json');
            $this->load->model("user_model");   
        $data =array(
            
             "id"=>$this->session->id,
             "user"=>$this->session->username,
             "oldpass"=>$this->user_model->hash($this->input->post("oldpassword")),
             "newpass"=>$this->user_model->hash($this->input->post("password"))
            ) ;
             
             
   
      


             
             
             
                         if($this->user_model->updatepassword($data))
                            {

                        $this->session->set_userdata('changepass', 0);//changed to 0 if succesfully update the password


                         $this->output->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Successfuly Changed!","redirectto"=>'./',"url"=>null)));
                         }
                         else{


                             $this->output->set_output(json_encode(array("title"=>"WARNING","type"=>"danger","message"=>"Wrong Old Password","redirectto"=>false,"url"=>null)));
                         }

	
            
               }
            else{
                
              //  $response = array('Unauthorized Access');
                      $this->output
        ->set_header('HTTP/1.1 401 Unauthorized')
        ->set_status_header('401')
        ->set_content_type('text/html')
        ->set_output("<h2>Error Code 401</h2><br/>"
                . "Warning: You are not authorized to access this page. "
                . "<br/>Contact CHED Region 1")
        ;
                
            }
            
	}

}
