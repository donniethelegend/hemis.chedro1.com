<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

    
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
            redirect(base_url()."hei/loadAsOf");
	}
	public function totalTESTDP($date = null)
	{
             
               
            $this->output->set_content_type('application/json');
        
      
             $data = $this->data;
               
                    if($data["islogged"])
                    {
                           $this->load->model('hei_model');
        
              
            $result = $this->hei_model->getTotalTESandTDP($date);
                       $data['dateselected'] = urldecode($date);
                       if($result){
                        $responseData = array(
                            array("Program" => "TES", "Value" => intval($result[0]->TES)),
                            array("Program" => "TDP", "Value" => intval($result[0]->TDP))
                        );
                       }
                       else{
                           $responseData = array(
                            array("Program" => "TES", "Value" => intval(0)),
                            array("Program" => "TDP", "Value" => intval(0))
                        ); 
                       }
                      echo json_encode($responseData);
                  
                    }
               
                  
 
        
    
        }
	public function liquidationAnalytics($date = null)
	{
             
               
            $this->output->set_content_type('application/json');
        
      
             $data = $this->data;
               
                    if($data["islogged"])
                    {
                           $this->load->model('liquidation_model');
        
              
            $result = $this->liquidation_model->getTotalLiquidation($date);
                       $data['dateselected'] = urldecode($date);
                       $responseData = array();
                       foreach($result as $value){
                           $responseData[] = array("Program"=>$value->Description, "Value" => intval($value->total));
                           
                       }
                       
                     
                      echo json_encode($responseData);
                  /* $total = $resul[0]->total +$result[1];
                     $rr = array();
                     
                     foreach($result as $v){
                     $rr[] = array("Description"=>$v->Description,"Total"=>$v->total,"percentage"=>(($v->total/$total)*100));    
                         
                     }
                    
                       
                     
                      echo json_encode($rr);*/
                    }
               
                  
 
        
    
        }
	public function totalTESTDPRelease($date = null)
	{
             
               
            $this->output->set_content_type('application/json');
        
      
             $data = $this->data;
               
                    if($data["islogged"])
                    {
                           $this->load->model('liquidation_model');
        
              
            $result = $this->liquidation_model->getTotalLiquidationTESTDP($date);
                       $data['dateselected'] = urldecode($date);
                  
                     
                      echo json_encode($result);
                    }
               
                  
 
        
    
        }
        
        
        
        
}
