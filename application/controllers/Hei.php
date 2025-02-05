<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hei extends CI_Controller {

    
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
            $this->load->model('hei_model');
          
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
                  $data['hei_list']= $this->hei_model->getHEIbyUII();
                
                   
                   $this->load->view('contents/HEIs',$data);
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
	public function view_profile($insticode =false)
	{
            if($insticode){
            
            $this->load->view('page_comp/header');
            
            
              $this->load->model('user_model');
            $this->load->model('hei_model');
          
          
                $data = $this->data;
               $data['insticode'] =  $insticode;
		
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
                  $data['profile_details']= $this->hei_model->get_HEI_Profile($insticode);
                
                   
                   $this->load->view('contents/HEIProfile',$data);
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
            else{
                redirect(base_url()."hei");
                
            }
            
	}
	public function getList()
	
	{
            $this->load->model('user_model');
            $this->load->model('hei_model');
       
          $data = $this->data;
      
	
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                
               
                        
 $datads= $this->hei_model->get_ActiveHEI();
                
                    $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200) 
                    ->set_output(json_encode($datads));
               
              
                    }
               
        else{
                      $this->output
                ->set_content_type('application/json')
                ->set_status_header(403) 
                ->set_output(json_encode(array("title"=>"warning","type"=>"failed","message"=>"Not Authorized","redirectto"=>false,"url"=>null)));
                   
        }
        }   
           else{
                $this->output
                ->set_content_type('application/json')
                ->set_status_header(403) 
                ->set_output(json_encode(array("title"=>"warning","type"=>"failed","message"=>"Not Authorized","redirectto"=>false,"url"=>null)));
                   
                   }     
            
               
	
	}
	public function hei_jsondata($insticode =false)
	
	{
            $this->load->model('user_model');
            $this->load->model('hei_model');
       
          $data = $this->data;
      
	
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                
                    if($insticode)
                    {
                        
 $datads= $this->hei_model->get_HEI_Profile($insticode);
                
                    $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200) 
                    ->set_output(json_encode($datads));
               
                        
                    }
                    else{
                                $this->output
                ->set_content_type('application/json')
                ->set_status_header(500) 
                ->set_output(json_encode(array("title"=>"warning","type"=>"danger","message"=>"No Parameter","redirectto"=>false,"url"=>null)));
            
                    }
                   
              
                    }
               
        else{
                      $this->output
                ->set_content_type('application/json')
                ->set_status_header(403) 
                ->set_output(json_encode(array("title"=>"warning","type"=>"failed","message"=>"Not Authorized","redirectto"=>false,"url"=>null)));
                   
        }
        }   
           else{
                $this->output
                ->set_content_type('application/json')
                ->set_status_header(403) 
                ->set_output(json_encode(array("title"=>"warning","type"=>"failed","message"=>"Not Authorized","redirectto"=>false,"url"=>null)));
                   
                   }     
            
               
	
	}
	public function view_enrollments($insticode =false)
	{
            if($insticode){
            
            $this->load->view('page_comp/header');
            
            
              $this->load->model('user_model');
            $this->load->model('hei_model');
          
          
                $data = $this->data;
               $data['insticode'] =  $insticode;
		
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
                    
                    
                  $data['profile_details']= $this->hei_model->get_HEI_Profile($insticode);
                
                   echo "Load the enrollment list by year here"; 
                   echo "Line 163 Hei file in controller"; 
                  // $this->load->view('contents/HEIEnrollments',$data);
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
            else{
                redirect(base_url()."hei");
                
            }
            
	}
       
        public function view_programs($insticode,$sy = false)
	{
            
            
              $this->load->model('user_model');
            $this->load->model('programs_model');
            $this->load->model('hei_model');
          
          
                $data = $this->data;
               $data['insticode'] =  $insticode;
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
                    $current_sy= $this->programs_model->getLatestSchoolyear()[0]->data_year;
              
                  $data['selectedSY']= $sy?$sy:$current_sy;
                  $data['schoolyear']= $this->programs_model->getSchoolYearList();
                  $data['program_offerings']= $this->programs_model->getHEIPrograms($insticode, $data['selectedSY']);
                  $data['profile_details']= $this->hei_model->get_HEI_Profile($insticode);
                
                   
                   $this->load->view('contents/HEIPrograms',$data);
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
        public function program_details($programid = false)
	{
            
                     if($programid ){
              $this->load->model('user_model');
            $this->load->model('programs_model');
         
          
          
                $data = $this->data;
        
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
             
              
         
 
                  $data['Program']= $this->programs_model->getProgramDetails($programid);
                
                
                   
                   $this->load->view('contents/Program_details',$data);
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
            else{
                redirect(base_url()."hei");
                
            }
	}

        
        public function read()
	{ 
            $this->output->set_content_type('application/json');
              $this->load->model('hei_model');
			$file = $_FILES['file']['tmp_name'];
                        $sy = $this->input->post('schoolyear');
			$handle = fopen($file, "r");
			$c = 0;//
                        $date = date("m-d-Y h:i A");
                        
                        $excel_data_array = array(); 
			while(($row = fgetcsv($handle, 1000, ",")) !== false)
			{
				if($c<>0){
                              
                                    if($row!=""){
                                       $excel_data_array[]  = array(
                                           "instcode" =>substr($row[0], 0, 1)==='0'?substr($row[0], 1):$row[0],
                                           "hei_name" =>$row[1],
                                           "type" =>$row[2],
                                           "pnsl_q" =>$row[3],
                                           "pnsl_v" =>$row[4],
                                           "list_q" =>$row[5],
                                           "list_v" =>$row[6],
                                           "list_d" =>$row[7],
                                           "4ps_q" =>$row[8],
                                           "4ps_v" =>$row[9],
                                           "es_o" =>$row[10],
                                           "es_v" =>$row[11],
                                           "td" =>$row[12],
                                           "td_v" =>$row[13],
                                           "td_d" =>$row[14],
                                           "date_uploaded" =>$date,
                                           "schoolyear" =>$sy
                                           );
                                        
                                    }
                                    
				}
				$c = $c + 1;
			}
                        
                     if($this->hei_model->updaterecord($excel_data_array)){
                         
                     //     redirect(base_url()."hei/loadAsOf");
                         
                       $this->output->set_output(json_encode(array("title"=>"INFO","type"=>"info","message"=>"Successfuly Saved!","redirectto"=>'./loadAsOf',"url"=>null)));
	}
        else{
            
            
            $this->output->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Failed!","redirectto"=>false,"url"=>null)));
        }
				
		
	}
	
        
        
        
        
        
}
