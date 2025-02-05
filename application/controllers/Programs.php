<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller {

    
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
                "controller" => $this->uri->segment(1),
                "method" => $this->uri->segment(2)
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
              $this->load->model('programs_model');
    
          
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
          
                $data['yearlist'] = $this->programs_model->getDataYear();
                   
                   $this->load->view('contents/program',$data);
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
	public function update($programid)
	{
              $this->load->model('user_model');
              $this->load->model('programs_model');
                $datafields = $this->input->post();
          
          
                $data = $this->data;
               
	
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                {
                    if($programid){
                   $result =  $this->programs_model->update($programid,$datafields);
                        if($result){
                            
                            $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(200) 
                            ->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Updated!","redirectto"=>false,"url"=>null)));
                        }
                        else{
                            
                            $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(200) 
                            ->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Failed!","redirectto"=>false,"url"=>null)));
                            
                        }
                    }
                    else{
                        
                            $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(500) 
                            ->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Undefined Program Reference.","redirectto"=>false,"url"=>null)));
                    }
                }
                
                
                }
                     
	}
	public function delete()
	{
              $this->load->model('user_model');
              $this->load->model('programs_model');
              $programid = $this->input->post('programid');
          
          
                $data = $this->data;
               
	
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                {
                    if($programid){
                   $result =  $this->programs_model->delete($programid);
                        if($result){
                            
                            $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(200) 
                            ->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Deleted!","redirectto"=>false,"url"=>null,'action'=>"refresh_table")));
                        }
                        else{
                            
                            $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(200) 
                            ->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Failed!","redirectto"=>false,"url"=>null)));
                            
                        }
                    }
                    else{
                        
                            $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(500) 
                            ->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Undefined Program Reference.","redirectto"=>false,"url"=>null)));
                    }
                }
                
                
                }
                     
	}
	public function permits()
	{
       
            
            $this->load->view('page_comp/header');
            
            
              $this->load->model('user_model');
            $this->load->model('hei_model');
            $this->load->model('programs_model');
     
          
                $data = $this->data;
            
		
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
                $data["programs"] = $this->programs_model->AllProgramPermits();
                   
                   $this->load->view('contents/program_permits',$data);
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
