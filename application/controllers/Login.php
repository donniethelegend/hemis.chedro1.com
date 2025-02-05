<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
        function __construct() {
        parent::__construct();
        
           $this->load->library('session');
              $this->load->helper('url');  
              
              
              
              
          
              
        }

	public function index()
	{
              
            
                // Get the session expiration time
                $expiration = $this->config->item('sess_expiration');

                // Get the last activity time from the session data
                $last_activity = $this->session->userdata('last_activity');

                // Check if the session has expired
                if ((time() - $last_activity) > $expiration) {
                    redirect('');
                }
                 $data=array(
                "islogged"=>false
                );
                $this->load->helper('url');
                 $this->load->library('form_validation');
		$this->load->view('page_comp/header');
		//$this->load->view('page_comp/head_banner',$data);
		$this->load->view('login');
		$this->load->view('page_comp/footer');
	}
        
        

	public function loadlogin()
	{
           
            $this->load->library('session');
            $this->output->set_content_type('application/json');
            $this->load->model("user_model");   
             $data =array(
             "user"=>$this->input->post("username"),
             "pass"=>$this->user_model->hash($this->input->post("password"))
            ) ;
             
             
           $result =  $this->user_model->check_login($data);
           
   
            if($result->result_id->num_rows>0)
            {
                
               
         $userdata = array(
             "username"=>$result->result_array()[0]['username'],
             "name"=>$result->result_array()[0]['name'],
             "userlevel"=>$result->result_array()[0]['user_level'],
             "email"=>$result->result_array()[0]['email'],  
             "changepass"=>$result->result_array()[0]['change_pass'],
             "id"=>$result->result_array()[0]['id']
         );
           
         $url = $this->input->get('url');
         if($url!=null){
             
         $redirect_url = $url;
         }
         else
         {
          $redirect_url = base_url();   
         }
            
            
           if($userdata['changepass']=="1"){
                   $redirect_url = "changepassword";
            }
         
                $this->session->set_userdata($userdata);
                
                
                $this->output->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Successfuly Logged In!","redirectto"=>$redirect_url,"url"=>null)));
            }
            else{
                $this->output->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Failed!","redirectto"=>false,"url"=>null)));
            }
            
            
            
	}
}
