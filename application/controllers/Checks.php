<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(FCPATH.'application/third_party/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class Checks extends CI_Controller {

    
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
                 // $data['hei_list']= $this->hei_model->getHEIbyUII();
                
                   
                   $this->load->view('contents/checks',$data);
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
        
  
        
	public function checkssubmission($instcode = false)
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
                     $instcodes = $instcode;
                    if($data['userlevel']=="hei"){
                        
                        $instcodes = $data["username"];
                    }
                   
                    if($instcodes){
                  $data['hei_profile']= $this->hei_model->get_HEILatestProfile($instcodes);
                    }
                    else{
                      $data['hei_profile'] =false;   
                    }
                   
                   $this->load->view('contents/checks_submission',$data);
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
	public function statusbyhei()
	{
            $this->load->model('user_model');
            $this->load->model('hei_model');
          
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
           
             
                  $this->load->view('contents/live_status_hei',$data);
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
	public function formB_download($sy  =false)
	{
            $this->load->model('user_model');
            $this->load->model('hei_model');
            $this->load->model('checks_model');
          
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
                    $data['formb'] =false;
                    if($sy){
                    $data['formb']= $this->checks_model->getAll_formB($sy);
                    }
                    
                   
                   $this->load->view('contents/form_b',$data);
                   
                   
                   
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
	public function formA_download($sy  =false)
	{
            $this->load->model('user_model');
            $this->load->model('hei_model');
            $this->load->model('checks_model');
          
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
                    $data['forma'] =false;
                    if($sy){
                    $data['forma']= $this->checks_model->getAll_formA($sy);
                    }
                    
                   $this->load->view('contents/form_a',$data);
                   
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
        
        
	public function formE1_download($sy  =false)
	{
            $this->load->model('user_model');
            $this->load->model('hei_model');
            $this->load->model('checks_model');
          
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
                    $data['forme1'] =false;
                    if($sy){
                    $data['forme1']= $this->checks_model->getAll_formE1($sy);
                    }
                    
                   $this->load->view('contents/form_E1',$data);
                   
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
        
        
	public function formE5_download($sy  =false)
	{
            $this->load->model('user_model');
            $this->load->model('hei_model');
            $this->load->model('checks_model');
          
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
                    $data['forme5'] =false;
                    if($sy){
                    $data['forme5'] = $this->checks_model->getAll_formE5($sy);
                    }
                    
                   $this->load->view('contents/form_E5',$data);
                   
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
        
        
        
	public function status()
	{
            $this->load->model('user_model');
            $this->load->model('hei_model');
          
          
                $data = $this->data;
               
		$this->load->view('page_comp/header');
		
               
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"))
                    {
                    $this->load->view('page_comp/head_banner',$data);
           
                   
                   $this->load->view('contents/live_status',$data);
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
        
        public function updateSubmissionStatus()
	{
            $this->load->model('user_model');
      
            $this->load->model('checks_model');
          
          
                $data = $this->data;
            
	
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                
                 $data2 = array("insticode" => $this->input->post('instcode'),
                                "schoolyear" => $this->input->post('ssyy'),
                                "remarks" => $this->input->post('remarks'),
                                "iscomplete" => $this->input->post('iscomplete'));
                    
                        if($this->checks_model->updateheisubstat($data2)){
                   $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"success","type"=>"success","message"=>"Updated","redirectto"=>false,"url"=>null)));
               
                   
              
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
        public function checks_formstatus()
	{
            $this->load->model('user_model');
            $this->load->model('hei_model');
            $this->load->model('checks_model');
          
          
                $data = $this->data;
                   $instcodes = false;
                        $sy = false;
                        $formname = false;
	
               $id = $this->session->id;
               
             
             
                   if(!$this->user_model->check_status($id)){// check inactivity
                         
                         
                   
                
                if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
                
                 
                        $instcodes = $this->input->post('instcode');
                        $sy = base64_decode($this->input->post('sy'));
                        $formname = $this->input->post('formname');
                    
                
                    if($instcodes!=null&&$sy!=null&&$formname!=null)
                    {
                        
                $formsta  = $this->checks_model->getform_status($instcodes,$sy,$formname);
                    $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200) 
                    ->set_output(json_encode($formsta));
               
                        
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
	
         public function reject_check($checkid = false,$url=false){
                  $this->load->model('checks_model');
             
                  $data = $this->data;
                  $cid = base64_decode(urldecode($checkid));
                  $url2 = base64_decode(urldecode($url));
                  $remarks = $this->input->post('remarks');
             if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
             {
                 if($remarks!=""){
                
                  if( $this->checks_model->update_status($cid,"DISAPPROVED")){
                        if( $this->checks_model->update_remarks($cid,$remarks)){
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode(array("title"=>"SUCCESS","type"=>"success","message"=>"Updated!","redirectto"=>$url2,"url"=>false)));

                        }
                        else{
                                    $this->output
                                    ->set_content_type('application/json')
                                    ->set_status_header(500)  // HTTP 400 Bad Request
                                    ->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Error in saving to database","redirectto"=>false,"url"=>null)));

                        }
               
                 
                      }
                      else{
              
                       $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)  // HTTP 400 Bad Request
                ->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Error in saving to database","redirectto"=>false,"url"=>null)));
        

                   }
             }
             else{
                       $this->output
                                    ->set_content_type('application/json')
                                    ->set_status_header(500)  // HTTP 400 Bad Request
                                    ->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Remarks/Suggestions is required. Why do you ask for resubmission?","redirectto"=>false,"url"=>null)));

             }
             }
        }
         public function uploadupdate($sy = false){
                  $data = $this->data;
             if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
                    {
        $now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		   $this->load->model('hei_model');
		$current_year = $sy?base64_decode($sy):$now->format('Y');
                $nowmdy = $now->format('Y-m-d h:m');
		
                $id  = $this->session->username; // this is HEI Username must be the institution code
                $form = $this->input->get('form');
                $path_year   = './uploads/checks_forms/'.$current_year.'/'.$id.'/';
            
                
                if(!is_dir($path_year)){                                      
                    mkdir($path_year, 0777, true);
                }
                 $data = array();
               
                 $config['allowed_types'] = 'xlsx|xls';
                 $config['upload_path'] = $path_year;
                 $config['file_name'] = $id.'_'.$form.'_'. date_timestamp_get($now) ;
                 $this->load->library('upload',$config);
                   
                 if($this->upload->do_upload('filetoupdate')){
                       
                 $data =$path_year.$this->upload->data('file_name');
            
                  
                    
                     
                     $data_arr = array('id'=>null,
                         'instcode'=>$id,
                         'form_name'=>$form,
                         'schoolyear'=> base64_decode($sy),
                         'remarks'=>null,
                         'status'=>'PENDING',
                         'uploaded_file'=>$data,
                         'uploaded_date'=>$nowmdy);
                     
                          //start of save to DB
                     if($this->hei_model->record_uploaded_checks($data_arr)){
               
                    $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"SUCCESS","type"=>"success","message"=>"Uploaded!","redirectto"=>false,"url"=>null,'form'=>$form)));
                      
                      }
                      else{
              
                       $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)  // HTTP 400 Bad Request
                ->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>"Error in saving to database","redirectto"=>false,"url"=>null)));
        

                   }
                   
                   //end of save to DB
                 }
                 else{
                          $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)  // HTTP 400 Bad Request
                ->set_output(json_encode(array("title"=>"WARNING","type"=>"warning","message"=>$this->upload->display_errors(),"redirectto"=>false,"url"=>null)));
        
                 
                   //  echo var_dump($this->upload->display_errors());
                 }
                 
                 
            
        }
        }
        
        
        
        
}
