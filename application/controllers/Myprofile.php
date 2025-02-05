<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myprofile extends CI_Controller {

    
    function __construct() {
        parent::__construct();
        
           $this->load->library('session');
              $this->load->helper('url');  
              
           
              
              
            
              
              
              
              
              
                 if($this->session->has_userdata('username'))
            {
                     
                       if($this->session->changepass=="1"){
                  redirect('changepassword');
            }
                    
                     $appid = $this->session->appid; 
                $this->data=array(
                "appid"=>$appid,
                
                "islogged"=>true,
                "avatar"=> ($this->session->avatar?url_host()."application2023".substr($this->session->avatar, 1):"https://i.pinimg.com/736x/5f/40/6a/5f406ab25e8942cbe0da6485afd26b71.jpg"),
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
              $this->load->model('student_model');
                 $data = $this->data;
            $this->load->view('page_comp/header');
           
              if($data["islogged"]){
           
         $this->load->model("user_model");   
                    $appid = $this->session->appid;
                    $result_details = $this->user_model->grantee_details($appid);
                    
                    $data['grantDetails'] =$result_details;
                    
	
		$this->load->view('page_comp/head_banner',$data);
                
                
                
                
              
                    
                   // $this->load->view('navbar_secondary',$data);
                        $id = $this->session->id;
             
                   if(!$this->student_model->islock($id)){// check inactivity
                         
                    
                    $this->load->view("profile_details", $data);
                   }
                   else{
                       $this->load->view("errors/account_locked");
                   
                   }
                   
                   
                }
                else{
                    redirect('/');
                }
        
                
            
               
		$this->load->view('page_comp/footer');
	}
        
        
        
        
        
}
