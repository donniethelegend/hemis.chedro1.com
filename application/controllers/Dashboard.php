<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    
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


	
     
        public function checksSubmissionFrequency($ym = false){
                  $this->load->model('checks_model');
                 
     
            //   $ay = $this->input->post('ay')   ;
                  if($ym){
                      
               

                      
          
               
                 $count  = $this->checks_model->getChecksCount_bydate($ym);
                          
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode($count));
                  }
                  else{
                      
                          $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(500) 
                                ->set_output("INVALID REQUEST");
                  }
                  
        } 
        
        
        
        
        
        
        public function heiSubmissions(){
                  $this->load->model('checks_model');
                   $this->load->model('hei_model');
               $ay = $this->input->post('ay')   ;
                  if($ay){
                      
                 $heis = $this->hei_model->get_ActiveHEI();     
                      
                      
                      
                      
                 
                      
                      
                      
                        foreach ($heis as $row) {
             
                       
         $formsta  = $this->checks_model->getforms_status( $row->instcode,$ay);
         $heistat  = $this->checks_model->getsubmission_status( $row->instcode,$ay);
    
 

        $btn = array(
            "FORM-A"=>'<span class="icon-cross2 text-danger"></span> ',
            "FORM-B-BC"=>'<span class="icon-cross2 text-danger"></span> ',
            "FORM-E1"=>'<span class="icon-cross2 text-danger"></span> ',
            "FORM-E2"=>'<span class="icon-cross2 text-danger"></span> ',
            "FORM-E5"=>'<span class="icon-cross2 text-danger"></span> ',
            "FORM-GH"=>'<span class="icon-cross2 text-danger"></span> ',
            "Research-Extension"=>'<span class="icon-cross2 text-danger"></span> ',
            "List-of-Graduates"=>'<span class="icon-cross2 text-danger"></span> ',
            );
        
            foreach($formsta as $forms){
                
                
                      
        
                switch($forms->form_name){
                           case "SUC-PRC-List-of-Graduates":
                                $btn['List-of-Graduates'] = '<span class="icon-checkmark4 text-success"></span>';
                            break;
                            case "SUC-NF-Research-Extension-Forms":
                                $btn["Research-Extension"]='<span class="icon-checkmark4 text-success"></span>';
                            break;
                            case "SUC-NF-FORM-GH":
                                $btn["FORM-GH"]= '<span class="icon-checkmark4 text-success"></span>';
                            break;    
                            case "SUC-NF-FORM-E2":
                               $btn['FORM-E2']= '<span class="icon-checkmark4 text-success"></span>';
                            break;
                            case "SUC-NF-FORM-E1":
                                $btn['FORM-E1'] = '<span class="icon-checkmark4 text-success"></span>';
                            break;
                            case "SUC-NF-FORM-B":
                                $btn['FORM-B-BC']='<span class="icon-checkmark4 text-success"></span>';
                            break;    
                            case "SUC-NF-Forms-A":
                                $btn["FORM-A"] = '<span class="icon-checkmark4 text-success"></span>';
                            break;
                            case "NONSUC-e-Forms-A":
                                $btn['FORM-A'] =  '<span class="icon-checkmark4 text-success"></span>';
                            break;    
                            case "NONSUC-e-Forms-B-C":
                                $btn['FORM-B-BC'] = '<span class="icon-checkmark4 text-success"></span>';
                            break;
                            case "NONSUC-Form-E5-Faculty-Form":
                                $btn['FORM-E5'] = '<span class="icon-checkmark4 text-success"></span>';
                            break;
                            case "NONSUC-PRC-List-of-Graduates":
                                $btn['List-of-Graduates'] = '<span class="icon-checkmark4 text-success"></span>';
                            break;
                            case "NONSUC-e-Research":
                                $btn['Research-Extension'] = '<span class="icon-checkmark4 text-success"></span>';
                            break;
                         
                    }
                
               
               
            
        
                
            }
            $sstt = $heistat[0]->iscomplete;
            $stat = "<button class='btn btn-sm btn-danger' data-toggle='modal' data-target='#modal_updatestatus' data-remarks='' data-instcode='".$row->instcode."' data-iscomplete='nosubmission'>no-submission</button>";
            if($heistat){
            $stat = "<button class='btn btn-sm ".($heistat[0]->iscomplete=="complete"?"btn-success":($heistat[0]->iscomplete=="incomplete"?"btn-warning":"btn-danger"))."' data-toggle='modal' data-target='#modal_updatestatus' data-remarks='".$heistat[0]->remarks."' data-instcode='".$row->instcode."' data-iscomplete='".$heistat[0]->iscomplete."'>".$heistat[0]->iscomplete."</button>";    
            }
   
        
        
        $data[] = array(      
            "instcode"=>$row->instcode,
            "instname"=>$row->instname,
            "heitype"=>$row->heitype,
            "A"=>$btn["FORM-A"],
            "BBC"=>$btn["FORM-B-BC"],
            "E1"=>$btn["FORM-E1"],
            "E2"=>$btn["FORM-E2"],
            "E5"=>$btn["FORM-E5"],
            "GH"=>$btn["FORM-GH"],
            "reasearchExtension"=>$btn["Research-Extension"],
            "listofgrad"=>$btn["List-of-Graduates"],
            "status"=>$stat,
            "status2"=>$sstt,
            "remarks"=>$heistat[0]->remarks,
           );

    }

                      
                      
                      
      
                                $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode($data));
                  }
                  else{
                      
                          $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(500) 
                                ->set_output("INVALID REQUEST");
                  }
                  
        } 
        public function checksSubmissions(){
                  $this->load->model('checks_model');
               $ay = $this->input->post('ay')   ;
                  if($ay){
                      
               
               
                 $count  = $this->checks_model->getAllforms_status($ay);
                          
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode($count));
                  }
                  else{
                      
                          $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(500) 
                                ->set_output("INVALID REQUEST");
                  }
                  
        } 
        
        
        
        
        
        
        public function selectedProgram($ay = false){
                  $this->load->model('programs_model');
                  
                  if($ay){
                      
               
                        $selected_values = $this->input->post('program');  // For POST data

    $string = implode('","', array_map(function($item) {
    return   $item;
}, $selected_values));

// Add quotes at the start and end
$string = '"' . $string . '"';
    
               
                 $countEnrollment  = $this->programs_model->getSelectedPrograms($string,$ay);
                          
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode($countEnrollment));
                  }
                  else{
                      
                          $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(500) 
                                ->set_output("INVALID REQUEST");
                  }
                  
        } 
        public function programlist(){
                  $this->load->model('programs_model');
                  
         
                     $countEnrollment  = $this->programs_model->getPrograms();
                             
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode($countEnrollment));
           
        } 
        public function Enrollment_Province(){
                  $this->load->model('programs_model');
                     $y = $this->input->post('ay');
         
                     $countEnrollment  = $this->programs_model->Province($y);
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode($countEnrollment));
           
        } 
        public function Enrollment_HEICategory(){
                  $this->load->model('programs_model');
                     $y = $this->input->post('ay');
         
                     $countEnrollment  = $this->programs_model->HEICategory($y);
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode($countEnrollment));
           
        } 
        public function top10_program_public(){
                  $this->load->model('programs_model');
                     $y = $this->input->post('ay');
         
                     $countEnrollment  = $this->programs_model->top10Program($y);
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode($countEnrollment));
           
        } 
        public function top10_program_public_least(){
                  $this->load->model('programs_model');
                     $y = $this->input->post('ay');
         
                     $countEnrollment  = $this->programs_model->top10ProgramLeast($y);
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode($countEnrollment));
           
        } 
        public function stat_numb_enrollment($y = false){
                  $this->load->model('programs_model');
             
                  $data = $this->data;
                  
                  
                  
             if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei") && $y )
             {
               
                
                     $countEnrollment  = $this->programs_model->getCountEnrollment($y);
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode(
                                        array(
                                            array("category"=>"Male",
                                                "icon"=>'<i class="icon-man mr-2"></i>',
                                                "value"=>$countEnrollment[0]->male,
                                                "html"=>"<li>Value: &nbsp;<span class='font-weight-semibold float-right'>" .number_format(($countEnrollment[0]->male), 0) . "</span></li>",
                                                "color"=>"#1128f5"
                                                ),
                                            array("category"=>"Female",
                                                "icon"=>'<i class="icon-woman mr-2"></i>',
                                                "value"=>$countEnrollment[0]->female,
                                                "html"=>"<li>Value: &nbsp;<span class='font-weight-semibold float-right'>" . number_format(($countEnrollment[0]->female), 0) . "</span></li>",
                                                "color"=>"#eb1aeb"
                                                )
                                            )
                                        ));
             }
             else
             {
             echo "INVALID REQUEST";
             }
        } 
        public function stat_numb_enrollment_proglevel($y = false,$pl = false){
                  $this->load->model('programs_model');
             
                  $data = $this->data;
                  
                  
                  
             if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei") && $y &&$pl)
             {
               
                
                     $countEnrollment  = $this->programs_model->getCountEnrollment_proglevel($y,$pl);
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode(
                                        array(
                                            array("category"=>"Male",
                                                "icon"=>'<i class="icon-man mr-2"></i>',
                                                "value"=>$countEnrollment[0]->male,
                                                "html"=>"<li>Value: &nbsp;<span class='font-weight-semibold float-right'>" .number_format(($countEnrollment[0]->male), 0) . "</span></li>",
                                                "color"=>"#1128f5"
                                                ),
                                            array("category"=>"Female",
                                                "icon"=>'<i class="icon-woman mr-2"></i>',
                                                "value"=>$countEnrollment[0]->female,
                                                "html"=>"<li>Value: &nbsp;<span class='font-weight-semibold float-right'>" . number_format(($countEnrollment[0]->female), 0) . "</span></li>",
                                                "color"=>"#eb1aeb"
                                                )
                                            )
                                        ));
             }
             else
             {
             echo "INVALID REQUEST";
             }
        } 
        public function stat_numb_graduate($y = false){
                  $this->load->model('programs_model');
             
                  $data = $this->data;
                  
                  
                  
             if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei") && $y )
             {
               
                
                     $countEnrollment  = $this->programs_model->getCountGraduate($y);
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode(
                                        array(
                                            array("category"=>"Male",
                                                "icon"=>'<i class="icon-man mr-2"></i>',
                                                "value"=>$countEnrollment[0]->male,
                                                "html"=>"<li>Value: &nbsp;<span class='font-weight-semibold float-right'>" .number_format(($countEnrollment[0]->male), 0) . "</span></li>",
                                                "color"=>"#1128f5"
                                                ),
                                            array("category"=>"Female",
                                                "icon"=>'<i class="icon-woman mr-2"></i>',
                                                "value"=>$countEnrollment[0]->female,
                                                "html"=>"<li>Value: &nbsp;<span class='font-weight-semibold float-right'>" . number_format(($countEnrollment[0]->female), 0) . "</span></li>",
                                                "color"=>"#eb1aeb"
                                                )
                                            )
                                        ));
             }
             else
             {
             echo "INVALID REQUEST";
             }
        } 
        public function stat_numb_graduate_proglevel($y = false,$pl = false){
                  $this->load->model('programs_model');
             
                  $data = $this->data;
                  
                  
                  
             if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei") && $y &&$pl)
             {
               
                
                     $countEnrollment  = $this->programs_model->getCountGraduate_proglevel($y,$pl);
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode(
                                        array(
                                            array("category"=>"Male",
                                                "icon"=>'<i class="icon-man mr-2"></i>',
                                                "value"=>$countEnrollment[0]->male,
                                                "html"=>"<li>Value: &nbsp;<span class='font-weight-semibold float-right'>" .number_format(($countEnrollment[0]->male), 0) . "</span></li>",
                                                "color"=>"#1128f5"
                                                ),
                                            array("category"=>"Female",
                                                "icon"=>'<i class="icon-woman mr-2"></i>',
                                                "value"=>$countEnrollment[0]->female,
                                                "html"=>"<li>Value: &nbsp;<span class='font-weight-semibold float-right'>" . number_format(($countEnrollment[0]->female), 0) . "</span></li>",
                                                "color"=>"#eb1aeb"
                                                )
                                            )
                                        ));
             }
             else
             {
             echo "INVALID REQUEST";
             }
        } 
        public function stat_numb_program($y = false){
                  $this->load->model('programs_model');
             
                  $data = $this->data;
                  
                  
                  
             if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei") && $y )
             {
               
               
                 
                
                     $countProgram  = $this->programs_model->getCountProgram($y);
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode(
                                        array(
                                            array("category"=>"Currently Offered Program",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countProgram[0]->co,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countProgram[0]->co) . "</span></li>",
                                                "color"=>"#4287f5"
                                                ),
                                            array("category"=>"Phased Out Program",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countProgram[0]->po,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countProgram[0]->po) . "</span></li>",
                                                "color"=>"#42f596"
                                                ),
                                            array("category"=>"Discontinued Program",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countProgram[0]->do,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countProgram[0]->do) . "</span></li>",
                                                "color"=>"#f0cd35"
                                                ),
                                            array("category"=>"Not been officially discontinued",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countProgram[0]->no,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countProgram[0]->no) . "</span></li>",
                                                "color"=>"#b135f0"
                                                ),
                                            array("category"=>"Not applicable",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countProgram[0]->na,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countProgram[0]->na) . "</span></li>",
                                                "color"=>"#e64757"
                                                )
                                            )
                                        ));
             }
             else
             {
             echo "INVALID REQUEST";
             }
        } 
        public function stat_numb_program_proglevel($y = false, $pl = false){
                  $this->load->model('programs_model');
             
                  $data = $this->data;
                  
                  
                  
             if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei") && $y &&$pl )
             {
               
               
                 
                
                     $countProgram  = $this->programs_model->getCountProgram_proglevel($y,$pl);
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode(
                                        array(
                                            array("category"=>"Currently Offered Program",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countProgram[0]->co,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countProgram[0]->co) . "</span></li>",
                                                "color"=>"#4287f5"
                                                ),
                                            array("category"=>"Phased Out Program",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countProgram[0]->po,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countProgram[0]->po) . "</span></li>",
                                                "color"=>"#42f596"
                                                ),
                                            array("category"=>"Discontinued Program",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countProgram[0]->do,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countProgram[0]->do) . "</span></li>",
                                                "color"=>"#f0cd35"
                                                ),
                                            array("category"=>"Not been officially discontinued",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countProgram[0]->no,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countProgram[0]->no) . "</span></li>",
                                                "color"=>"#b135f0"
                                                ),
                                            array("category"=>"Not applicable",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countProgram[0]->na,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countProgram[0]->na) . "</span></li>",
                                                "color"=>"#e64757"
                                                )
                                            )
                                        ));
             }
             else
             {
             echo "INVALID REQUEST";
             }
        } 
        public function stat_countHEI(){
                  $this->load->model('hei_model');
             
                  $data = $this->data;
                  
                  
                  
             if($data["islogged"]&& ($data['userlevel']=="administrator"||$data['userlevel']=="ched_staff"||$data['userlevel']=="hei"))
             {
               
                
                     $countHEI  = $this->hei_model->getCountHEI();
                             
                    
                     
                        
                            
                     
                     
                                   $this->output
                                ->set_content_type('application/json')
                                ->set_status_header(200) 
                                ->set_output(json_encode(
                                        array(
                                            array("HEIType"=>"LUC",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countHEI[0]->LUC,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countHEI[0]->LUC) . "</span></li>",
                                                "color"=>"#d49708"
                                                ),
                                            array("HEIType"=>"SUC",
                                                "icon"=>'<i class="icon-city mr-2"></i>',
                                                "value"=>$countHEI[0]->SUC_Total,
                                                "html"=>
                                                "<li>Main: &nbsp;<span class='font-weight-semibold float-right'>" . ($countHEI[0]->SUC_Main) . "</span></li>"
                                                . "<li>Campuses: &nbsp;<span class='font-weight-semibold float-right'>" . ($countHEI[0]->SUC_Campus) . "</span></li>"
                                                . "<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countHEI[0]->SUC_Total) . "</span></li>",
                                                
                                                
                                                "color"=>"#08a4d4"
                                                ),
                                            array("HEIType"=>"Private",
                                                "icon"=>'<i class="icon-office mr-2"></i>',
                                                "value"=>$countHEI[0]->Private,
                                                "html"=>"<li>Total: &nbsp;<span class='font-weight-semibold float-right'>" . ($countHEI[0]->Private) . "</span></li>",
                                                "color"=>"#08d46e"
                                                )
                                            )
                                        
                                        ));

                       
               
                 
                      
                    
           
             }
        } 
        
        
}
