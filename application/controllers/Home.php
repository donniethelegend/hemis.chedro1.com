<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
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
                "controller" =>$this->uri->segment(1),
                "method" =>$this->uri->segment(2)
                    
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
            $this->load->model('hei_model');
          
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="pts"||$data['userlevel']=="ched_staff"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
                  $data['hei_list']= $this->hei_model->getHEIbyUII();
                
                   
                   $this->load->view('contents/Dashboard',$data);
                    }
                    elseif ($data["islogged"]&&($data['userlevel']=="hei")) {
                          $username = $this->session->username;
               
             
                      $this->load->view('page_comp/head_banner',$data);
                  $data['hei_list']= $this->hei_model->getHEIbyUII();
                
                  $data['hei_profile'] = $this->hei_model->get_HEI_Profile($username);
                   $this->load->view('contents/Dashboard_HEI',$data);
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
