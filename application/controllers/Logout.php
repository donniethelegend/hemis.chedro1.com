<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {


	public function index()
	{
              
               ob_start();
             $this->load->driver('cache');
  
             $this->load->library('session');
                    unset($_SESSION['username']);
                    unset($_SESSION['user_level']);
                    unset($_SESSION['id']);
                    unset($_SESSION['email']);
                    unset($_SESSION['password']);
                    unset($_SESSION['userdata']);
                    unset($_SESSION['num']);
                      $this->session->sess_destroy();
                    $this->cache->clean();
                    header('location: ./login')     ;
	}
        
        
	
}
