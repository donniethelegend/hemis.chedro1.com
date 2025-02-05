
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileController extends CI_Controller {

    public function __construct() {
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
    public function index() {
    show_404();
       
    }
        
   public function download($hash)
{
    // Decode the base64-encoded hash and sanitize it
    $file_name = base64_decode(urldecode($hash));

    // Ensure that the user is logged in and authorized to download files
    if (!$this->data["islogged"] || !in_array($this->data['userlevel'], ['administrator', 'ched_staff', 'hei'])) {
        redirect(base_url() . '?url=' . urlencode(current_url())); // Redirect if not authorized
        return;
    }

    // Construct the full file path
    $file_path = FCPATH . ltrim($file_name, './');  // Ensure no leading dots/slashes

    // Verify if the file exists on the server
    if (!file_exists($file_path)) {
        show_404(); // File not found
        return;
    }

    // Get the correct MIME type for the file based on its extension
    $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

    switch ($file_extension) {
        case 'xlsx':
            $mime_type = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            break;
        case 'xls':
            $mime_type = 'application/vnd.ms-excel';
            break;
        default:
            show_404(); // Unsupported file type
            return;
    }

    // Set headers to force the file download
    header('Content-Description: File Transfer');
    header('Content-Type: ' . $mime_type);
    header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_path));

    // Clean the output buffer and serve the file
    ob_clean();
    flush();

    // Output the file content
    readfile($file_path);
    exit;  // Stop script execution after serving the file
}

    
}
 ?>