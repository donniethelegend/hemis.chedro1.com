<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountmanager extends CI_Controller {

    
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
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="accounting"||$data['userlevel']=="management"))
                    {
                 $data['userlist'] = $this->user_model->getAll();
                   
                   $this->load->view('account_module',$data);
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
	public function updateuser_page($updateid = null)
	{
            $this->load->model('user_model');
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		$this->load->view('page_comp/head_banner',$data);
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="accounting"||$data['userlevel']=="management"))
                    {
                 $data['userdata'] = $this->user_model->getUserdata($updateid);
                 $data['loadview'] = "updateuser_view";
                
                 
                 
                   $this->load->view('account_module',$data);
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
