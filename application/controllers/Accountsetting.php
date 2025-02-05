<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountsetting extends CI_Controller {

    
    function __construct() {
        parent::__construct();
        
        
        
           $this->load->library('session');
              $this->load->helper('url');  
              
                 if($this->session->has_userdata('username'))
            {
                     
                  
                           if($this->session->changepass=="1"){
                  redirect('changepassword');
            }
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
            $this->load->model('user_model');
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		$this->load->view('page_comp/head_banner',$data);
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&&$data['userlevel']=="hei")
                    {
                    
                    
                 $mydata= $this->user_model->getUserdata($id);
                 
                 $data['mydata'] = $mydata[0];
                 $data['contactlist'] = $this->user_model->getHEI_Focal($mydata[0]->username);
                   $data['loadview'] = "accountsetting_hei";
                   $this->load->view('account_setting',$data);
                    }
               
        else{
                   $this->load->view('home',$data);
        }
        }   
           else{
                       $this->load->view("errors/account_locked");
                   
                   }     
            
               
		$this->load->view('page_comp/footer');
	}
	
	
        
        
        
        
        
}
