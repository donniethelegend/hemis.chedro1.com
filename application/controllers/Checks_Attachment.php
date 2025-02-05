<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(FCPATH.'application/third_party/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Html;
use PhpOffice\PhpSpreadsheet\Exception as PhpSpreadsheetException;
     use PhpOffice\PhpSpreadsheet\Cell\DataType;
     use PhpOffice\PhpSpreadsheet\Shared\Date;


class Checks_Attachment extends CI_Controller {

    private $discipline_arr = null;
    
    
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


    
     public function NONSUCeResearch($checkid = false, $sheet = false) { $this->load->view('page_comp/header');
    
    // Load necessary models
    $this->load->model('user_model');
    $id = $this->session->id;
    
    // Initialize data
    $data = $this->data;
    
    // Check user status
    if (!$this->user_model->check_status($id)) { // Check inactivity
        // Check user is logged in and has appropriate level
        if ($data["islogged"] && in_array($data['userlevel'], ["administrator", "ched_staff", "hei"])) {
            // Load head banner view
            $this->load->view('page_comp/head_banner', $data);
            
            // Load checks_model
            $this->load->model('checks_model');
            
            if ($checkid) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Check if file exists
                if (!file_exists($filePath)) {
                    show_error('Spreadsheet file not found at path: ' . $filePath);
                    return;
                }

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    show_error('Unsupported file format: ' . $fileExtension);
                    return;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    log_message('error', 'Error loading spreadsheet: ' . $e->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                } catch (\TypeError $te) {
                    log_message('error', 'Type error loading spreadsheet: ' . $te->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                }

                // Determine if $sheet is an index or name
                if ($sheet !== false && $sheet !== null) {
                    if (is_numeric($sheet)) {
                        $sheetIndex = (int)$sheet;
                        $sheetObj = $spreadsheet->getSheet($sheetIndex);
                        if (!$sheetObj) {
                            show_error("Sheet with index '{$sheetIndex}' does not exist.");
                            return;
                        }
                    } elseif (is_string($sheet)) {
                        $sheetObj = $spreadsheet->getSheetByName($sheet);
                        if (!$sheetObj) {
                            show_error("Sheet named '{$sheet}' does not exist.");
                            return;
                        }
                    } else {
                        show_error('Invalid sheet identifier provided.');
                        return;
                    }
                } else {
                    // Default to the first sheet
                    $sheetObj = $spreadsheet->getSheet(0);
                   
                    if (!$sheetObj) {
                        show_error('No sheets found in the spreadsheet.');
                        return;
                    }
                }

                // Assign sheet details to $data
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                $data['currentsheet'] = $sheetObj->getTitle();
                $data['sheetnames'] = $spreadsheet->getSheetNames();

                // Manually generate HTML from the sheet data
                $html = '<table border="1" cellpadding="5" cellspacing="0">';
                $highestRow = $sheetObj->getHighestRow();
                $highestColumn = $sheetObj->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
              
                
                
                for ($row = 1; $row <= $highestRow; $row++) {
                    $html .= '<tr>';
                    for ($col = 1; $col <= $highestColumnIndex; $col++) {
                        $cell = $sheetObj->getCellByColumnAndRow($col, $row);
                      
                       $cellStyle = $sheetObj->getStyle($cell->getCoordinate());
                    
                       
   if ($cell !== null) {
    try {
        // Check the data type of the cell
        if ($cell->getDataType() == DataType::TYPE_STRING) {
            $value = $cell->getFormattedValue(); // Handle string cells
        } 
        elseif ($cell->getDataType() == DataType::TYPE_NUMERIC) {
        
                // Handle numeric cells
            
        
                 $value = $cell->getFormattedValue();
                
            
               
                
                
            
        } else {
            // Handle other types or use raw value as fallback
            
        
            $value = $cell->getValue();
           
        }
        
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        log_message('error', 'Error getting formatted value: ' . $e->getMessage());
        $value = $cell->getValue(); // Fallback to raw value
    }
} else {
    $value = ''; // Handle empty cells
}


        // Sanitize the value for HTML output
    //    $value = htmlspecialchars($value);

                        // Start building the cell
                        $cellHtml = '';

                        // Use <th> for the first row (assuming it's the header)
                        if ($row == 1) {
                            $cellHtml .= '<th';
                        } else {
                            $cellHtml .= '<td';
                        }

                        // Get cell style
                        

                        // Retrieve fill color
                        $fill = $cellStyle->getFill();
                        $fillType = $fill->getFillType();
                        $bgColor = '';

                        if ($fillType !== \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE) {
                            $bgColor = $fill->getStartColor()->getRGB();
                            // Apply background color
                            if (!empty($bgColor) && $bgColor !== 'FFFFFF') {
                                $cellHtml .= ' style="background-color:#' . $bgColor . ';"';
                            }
                        }

                        // Retrieve font color
                        $font = $cellStyle->getFont();
                        $fontColor = $font->getColor()->getRGB();
                        if (!empty($fontColor)) {
                            $cellHtml .= ' color="#' . $fontColor . ';"';
                        }

                        // Add the value inside the cell
                        $cellHtml .= '>' . $value . '</' . ($row == 1 ? 'th' : 'td') . '>';
                        $html .= $cellHtml;
                    }
                    $html .= '</tr>';
                }

                $html .= '</table>';

                // Assign the HTML to $data
                $data['spreadsheet_html'] = $html;
                
                // Load the view with the spreadsheet HTML
                $this->load->view('contents/forms_viewer/form_NONSUCeResearch', $data);
            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    
    // Load footer view
    $this->load->view('page_comp/footer');
}
  
     public function SUCPRCListofGraduates($checkid = false, $sheet = false) { $this->load->view('page_comp/header');
    
    // Load necessary models
    $this->load->model('user_model');
    $id = $this->session->id;
    
    // Initialize data
    $data = $this->data;
    
    // Check user status
    if (!$this->user_model->check_status($id)) { // Check inactivity
        // Check user is logged in and has appropriate level
        if ($data["islogged"] && in_array($data['userlevel'], ["administrator", "ched_staff", "hei"])) {
            // Load head banner view
            $this->load->view('page_comp/head_banner', $data);
            
            // Load checks_model
            $this->load->model('checks_model');
            
            if ($checkid) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Check if file exists
                if (!file_exists($filePath)) {
                    show_error('Spreadsheet file not found at path: ' . $filePath);
                    return;
                }

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    show_error('Unsupported file format: ' . $fileExtension);
                    return;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    log_message('error', 'Error loading spreadsheet: ' . $e->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                } catch (\TypeError $te) {
                    log_message('error', 'Type error loading spreadsheet: ' . $te->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                }

                // Determine if $sheet is an index or name
                if ($sheet !== false && $sheet !== null) {
                    if (is_numeric($sheet)) {
                        $sheetIndex = (int)$sheet;
                        $sheetObj = $spreadsheet->getSheet($sheetIndex);
                        if (!$sheetObj) {
                            show_error("Sheet with index '{$sheetIndex}' does not exist.");
                            return;
                        }
                    } elseif (is_string($sheet)) {
                        $sheetObj = $spreadsheet->getSheetByName($sheet);
                        if (!$sheetObj) {
                            show_error("Sheet named '{$sheet}' does not exist.");
                            return;
                        }
                    } else {
                        show_error('Invalid sheet identifier provided.');
                        return;
                    }
                } else {
                    // Default to the first sheet
                    $sheetObj = $spreadsheet->getSheet(0);
                   
                    if (!$sheetObj) {
                        show_error('No sheets found in the spreadsheet.');
                        return;
                    }
                }

                // Assign sheet details to $data
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                $data['currentsheet'] = $sheetObj->getTitle();
                $data['sheetnames'] = $spreadsheet->getSheetNames();

                // Manually generate HTML from the sheet data
                $html = '<table border="1" cellpadding="5" cellspacing="0">';
                $highestRow = $sheetObj->getHighestRow();
                $highestColumn = $sheetObj->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
              
                
                
                for ($row = 1; $row <= $highestRow; $row++) {
                    $html .= '<tr>';
                    for ($col = 1; $col <= $highestColumnIndex; $col++) {
                        $cell = $sheetObj->getCellByColumnAndRow($col, $row);
                      
                       $cellStyle = $sheetObj->getStyle($cell->getCoordinate());
                    
                       
   if ($cell !== null) {
    try {
        // Check the data type of the cell
        if ($cell->getDataType() == DataType::TYPE_STRING) {
            $value = $cell->getFormattedValue(); // Handle string cells
        } 
        elseif ($cell->getDataType() == DataType::TYPE_NUMERIC) {
        
                // Handle numeric cells
            
        
                 $value = $cell->getFormattedValue();
                
            
               
                
                
            
        } else {
            // Handle other types or use raw value as fallback
            
        
            $value = $cell->getValue();
           
        }
        
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        log_message('error', 'Error getting formatted value: ' . $e->getMessage());
        $value = $cell->getValue(); // Fallback to raw value
    }
} else {
    $value = ''; // Handle empty cells
}


        // Sanitize the value for HTML output
    //    $value = htmlspecialchars($value);

                        // Start building the cell
                        $cellHtml = '';

                        // Use <th> for the first row (assuming it's the header)
                        if ($row == 1) {
                            $cellHtml .= '<th';
                        } else {
                            $cellHtml .= '<td';
                        }

                        // Get cell style
                        

                        // Retrieve fill color
                        $fill = $cellStyle->getFill();
                        $fillType = $fill->getFillType();
                        $bgColor = '';

                        if ($fillType !== \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE) {
                            $bgColor = $fill->getStartColor()->getRGB();
                            // Apply background color
                            if (!empty($bgColor) && $bgColor !== 'FFFFFF') {
                                $cellHtml .= ' style="background-color:#' . $bgColor . ';"';
                            }
                        }

                        // Retrieve font color
                        $font = $cellStyle->getFont();
                        $fontColor = $font->getColor()->getRGB();
                        if (!empty($fontColor)) {
                            $cellHtml .= ' color="#' . $fontColor . ';"';
                        }

                        // Add the value inside the cell
                        $cellHtml .= '>' . $value . '</' . ($row == 1 ? 'th' : 'td') . '>';
                        $html .= $cellHtml;
                    }
                    $html .= '</tr>';
                }

                $html .= '</table>';

                // Assign the HTML to $data
                $data['spreadsheet_html'] = $html;
                
                // Load the view with the spreadsheet HTML
                $this->load->view('contents/forms_viewer/form_SUCPRCListofGraduates', $data);
            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    
    // Load footer view
    $this->load->view('page_comp/footer');
}
  
     public function SUCNFResearchExtensionForms($checkid = false, $sheet = false) { $this->load->view('page_comp/header');
    
    // Load necessary models
    $this->load->model('user_model');
    $id = $this->session->id;
    
    // Initialize data
    $data = $this->data;
    
    // Check user status
    if (!$this->user_model->check_status($id)) { // Check inactivity
        // Check user is logged in and has appropriate level
        if ($data["islogged"] && in_array($data['userlevel'], ["administrator", "ched_staff", "hei"])) {
            // Load head banner view
            $this->load->view('page_comp/head_banner', $data);
            
            // Load checks_model
            $this->load->model('checks_model');
            
            if ($checkid) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Check if file exists
                if (!file_exists($filePath)) {
                    show_error('Spreadsheet file not found at path: ' . $filePath);
                    return;
                }

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    show_error('Unsupported file format: ' . $fileExtension);
                    return;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    log_message('error', 'Error loading spreadsheet: ' . $e->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                } catch (\TypeError $te) {
                    log_message('error', 'Type error loading spreadsheet: ' . $te->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                }

                // Determine if $sheet is an index or name
                if ($sheet !== false && $sheet !== null) {
                    if (is_numeric($sheet)) {
                        $sheetIndex = (int)$sheet;
                        $sheetObj = $spreadsheet->getSheet($sheetIndex);
                        if (!$sheetObj) {
                            show_error("Sheet with index '{$sheetIndex}' does not exist.");
                            return;
                        }
                    } elseif (is_string($sheet)) {
                        $sheetObj = $spreadsheet->getSheetByName($sheet);
                        if (!$sheetObj) {
                            show_error("Sheet named '{$sheet}' does not exist.");
                            return;
                        }
                    } else {
                        show_error('Invalid sheet identifier provided.');
                        return;
                    }
                } else {
                    // Default to the first sheet
                    $sheetObj = $spreadsheet->getSheet(0);
                   
                    if (!$sheetObj) {
                        show_error('No sheets found in the spreadsheet.');
                        return;
                    }
                }

                // Assign sheet details to $data
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                $data['currentsheet'] = $sheetObj->getTitle();
                $data['sheetnames'] = $spreadsheet->getSheetNames();

                // Manually generate HTML from the sheet data
                $html = '<table border="1" cellpadding="5" cellspacing="0">';
                $highestRow = $sheetObj->getHighestRow();
                $highestColumn = $sheetObj->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
              
                
                
                for ($row = 1; $row <= $highestRow; $row++) {
                    $html .= '<tr>';
                    for ($col = 1; $col <= $highestColumnIndex; $col++) {
                        $cell = $sheetObj->getCellByColumnAndRow($col, $row);
                      
                       $cellStyle = $sheetObj->getStyle($cell->getCoordinate());
                    
                       
   if ($cell !== null) {
    try {
        // Check the data type of the cell
        if ($cell->getDataType() == DataType::TYPE_STRING) {
            $value = $cell->getFormattedValue(); // Handle string cells
        } 
        elseif ($cell->getDataType() == DataType::TYPE_NUMERIC) {
        
                // Handle numeric cells
            
        
                 $value = $cell->getFormattedValue();
                
            
               
                
                
            
        } else {
            // Handle other types or use raw value as fallback
            
        
            $value = $cell->getValue();
           
        }
        
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        log_message('error', 'Error getting formatted value: ' . $e->getMessage());
        $value = $cell->getValue(); // Fallback to raw value
    }
} else {
    $value = ''; // Handle empty cells
}


        // Sanitize the value for HTML output
    //    $value = htmlspecialchars($value);

                        // Start building the cell
                        $cellHtml = '';

                        // Use <th> for the first row (assuming it's the header)
                        if ($row == 1) {
                            $cellHtml .= '<th';
                        } else {
                            $cellHtml .= '<td';
                        }

                        // Get cell style
                        

                        // Retrieve fill color
                        $fill = $cellStyle->getFill();
                        $fillType = $fill->getFillType();
                        $bgColor = '';

                        if ($fillType !== \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE) {
                            $bgColor = $fill->getStartColor()->getRGB();
                            // Apply background color
                            if (!empty($bgColor) && $bgColor !== 'FFFFFF') {
                                $cellHtml .= ' style="background-color:#' . $bgColor . ';"';
                            }
                        }

                        // Retrieve font color
                        $font = $cellStyle->getFont();
                        $fontColor = $font->getColor()->getRGB();
                        if (!empty($fontColor)) {
                            $cellHtml .= ' color="#' . $fontColor . ';"';
                        }

                        // Add the value inside the cell
                        $cellHtml .= '>' . $value . '</' . ($row == 1 ? 'th' : 'td') . '>';
                        $html .= $cellHtml;
                    }
                    $html .= '</tr>';
                }

                $html .= '</table>';

                // Assign the HTML to $data
                $data['spreadsheet_html'] = $html;
                
                // Load the view with the spreadsheet HTML
                $this->load->view('contents/forms_viewer/form_SUCNFResearchExtensionForms', $data);
            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    
    // Load footer view
    $this->load->view('page_comp/footer');
}
  
    public function SUCNFFORMGH($checkid = false, $sheet = false) {
        $this->load->view('page_comp/header');
    
    // Load necessary models
    $this->load->model('user_model');
    $id = $this->session->id;
    
    // Initialize data
    $data = $this->data;
    
    // Check user status
    if (!$this->user_model->check_status($id)) { // Check inactivity
        // Check user is logged in and has appropriate level
        if ($data["islogged"] && in_array($data['userlevel'], ["administrator", "ched_staff", "hei"])) {
            // Load head banner view
            $this->load->view('page_comp/head_banner', $data);
            
            // Load checks_model
            $this->load->model('checks_model');
            
         if ($checkid) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Check if file exists
                if (!file_exists($filePath)) {
                    show_error('Spreadsheet file not found at path: ' . $filePath);
                    return;
                }

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    show_error('Unsupported file format: ' . $fileExtension);
                    return;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    log_message('error', 'Error loading spreadsheet: ' . $e->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                } catch (\TypeError $te) {
                    log_message('error', 'Type error loading spreadsheet: ' . $te->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                }

                // Determine if $sheet is an index or name
                if ($sheet !== false && $sheet !== null) {
                    if (is_numeric($sheet)) {
                        $sheetIndex = (int)$sheet;
                        $sheetObj = $spreadsheet->getSheet($sheetIndex);
                        if (!$sheetObj) {
                            show_error("Sheet with index '{$sheetIndex}' does not exist.");
                            return;
                        }
                    } elseif (is_string($sheet)) {
                        $sheetObj = $spreadsheet->getSheetByName($sheet);
                        if (!$sheetObj) {
                            show_error("Sheet named '{$sheet}' does not exist.");
                            return;
                        }
                    } else {
                        show_error('Invalid sheet identifier provided.');
                        return;
                    }
                } else {
                    // Default to the first sheet
                    $sheetObj = $spreadsheet->getSheet(0);
                   
                    if (!$sheetObj) {
                        show_error('No sheets found in the spreadsheet.');
                        return;
                    }
                }

                // Assign sheet details to $data
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                $data['currentsheet'] = $sheetObj->getTitle();
                $data['sheetnames'] = $spreadsheet->getSheetNames();

                // Manually generate HTML from the sheet data
                $html = '<table border="1" cellpadding="5" cellspacing="0">';
                $highestRow = $sheetObj->getHighestRow();
                $highestColumn = $sheetObj->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
              
                
                
                for ($row = 1; $row <= $highestRow; $row++) {
                    $html .= '<tr>';
                    for ($col = 1; $col <= $highestColumnIndex; $col++) {
                        $cell = $sheetObj->getCellByColumnAndRow($col, $row);
                      
                       $cellStyle = $sheetObj->getStyle($cell->getCoordinate());
                    
                       
   if ($cell !== null) {
    try {
        // Check the data type of the cell
        if ($cell->getDataType() == DataType::TYPE_STRING) {
            $value = $cell->getFormattedValue(); // Handle string cells
        } 
        elseif ($cell->getDataType() == DataType::TYPE_NUMERIC) {
        
                // Handle numeric cells
            
            if(($col==7||$col==2)&&$row>=8){
                
                $dateValue = Date::excelToDateTimeObject($cell->getValue());
                // Format the date as needed (e.g., 'Y-m-d')
                $value = $dateValue->format('m/d/Y'); // Adjust format as needed
            }
            
            else{
                 $value = $cell->getFormattedValue();
                
            }
               
                
                
            
        } else {
            // Handle other types or use raw value as fallback
            
            if(($col==3||$col==4||$col==5)&&$row>=8){
                $value = "<span class='bg-danger'>".$cell->getValue().'</span>';
            }
            else{
            $value = $cell->getValue();
            }
        }
        
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        log_message('error', 'Error getting formatted value: ' . $e->getMessage());
        $value = $cell->getValue(); // Fallback to raw value
    }
} else {
    $value = ''; // Handle empty cells
}


        // Sanitize the value for HTML output
    //    $value = htmlspecialchars($value);

                        // Start building the cell
                        $cellHtml = '';

                        // Use <th> for the first row (assuming it's the header)
                        if ($row == 1) {
                            $cellHtml .= '<th';
                        } else {
                            $cellHtml .= '<td';
                        }

                        // Get cell style
                        

                        // Retrieve fill color
                        $fill = $cellStyle->getFill();
                        $fillType = $fill->getFillType();
                        $bgColor = '';

                        if ($fillType !== \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE) {
                            $bgColor = $fill->getStartColor()->getRGB();
                            // Apply background color
                            if (!empty($bgColor) && $bgColor !== 'FFFFFF') {
                                $cellHtml .= ' style="background-color:#' . $bgColor . ';"';
                            }
                        }

                        // Retrieve font color
                        $font = $cellStyle->getFont();
                        $fontColor = $font->getColor()->getRGB();
                        if (!empty($fontColor)) {
                            $cellHtml .= ' color="#' . $fontColor . ';"';
                        }

                        // Add the value inside the cell
                        $cellHtml .= '>' . $value . '</' . ($row == 1 ? 'th' : 'td') . '>';
                        $html .= $cellHtml;
                    }
                    $html .= '</tr>';
                }

                $html .= '</table>';

                // Assign the HTML to $data
                $data['spreadsheet_html'] = $html;
                
                // Load the view with the spreadsheet HTML
                $this->load->view('contents/forms_viewer/form_SUCNFFORMGH', $data);
            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    
    // Load footer view
    $this->load->view('page_comp/footer');
}

    
    
     public function SUCNFFORME2($checkid = false, $sheet = false) { $this->load->view('page_comp/header');
    
    // Load necessary models
    $this->load->model('user_model');
    $id = $this->session->id;
    
    // Initialize data
    $data = $this->data;
    
    // Check user status
    if (!$this->user_model->check_status($id)) { // Check inactivity
        // Check user is logged in and has appropriate level
        if ($data["islogged"] && in_array($data['userlevel'], ["administrator", "ched_staff", "hei"])) {
            // Load head banner view
            $this->load->view('page_comp/head_banner', $data);
            
            // Load checks_model
            $this->load->model('checks_model');
            
            if ($checkid) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Check if file exists
                if (!file_exists($filePath)) {
                    show_error('Spreadsheet file not found at path: ' . $filePath);
                    return;
                }

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    show_error('Unsupported file format: ' . $fileExtension);
                    return;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    log_message('error', 'Error loading spreadsheet: ' . $e->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                } catch (\TypeError $te) {
                    log_message('error', 'Type error loading spreadsheet: ' . $te->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                }

                // Determine if $sheet is an index or name
                if ($sheet !== false && $sheet !== null) {
                    if (is_numeric($sheet)) {
                        $sheetIndex = (int)$sheet;
                        $sheetObj = $spreadsheet->getSheet($sheetIndex);
                        if (!$sheetObj) {
                            show_error("Sheet with index '{$sheetIndex}' does not exist.");
                            return;
                        }
                    } elseif (is_string($sheet)) {
                        $sheetObj = $spreadsheet->getSheetByName($sheet);
                        if (!$sheetObj) {
                            show_error("Sheet named '{$sheet}' does not exist.");
                            return;
                        }
                    } else {
                        show_error('Invalid sheet identifier provided.');
                        return;
                    }
                } else {
                    // Default to the first sheet
                    $sheetObj = $spreadsheet->getSheet(0);
                   
                    if (!$sheetObj) {
                        show_error('No sheets found in the spreadsheet.');
                        return;
                    }
                }

                // Assign sheet details to $data
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                $data['currentsheet'] = $sheetObj->getTitle();
                $data['sheetnames'] = $spreadsheet->getSheetNames();

                // Manually generate HTML from the sheet data
                $html = '<table border="1" cellpadding="5" cellspacing="0">';
                $highestRow = $sheetObj->getHighestRow();
                $highestColumn = $sheetObj->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
              
                
                
                for ($row = 1; $row <= $highestRow; $row++) {
                    $html .= '<tr>';
                    for ($col = 1; $col <= $highestColumnIndex; $col++) {
                        $cell = $sheetObj->getCellByColumnAndRow($col, $row);
                      
                       $cellStyle = $sheetObj->getStyle($cell->getCoordinate());
                    
                       
   if ($cell !== null) {
    try {
        // Check the data type of the cell
        if ($cell->getDataType() == DataType::TYPE_STRING) {
            $value = $cell->getFormattedValue(); // Handle string cells
        } 
        elseif ($cell->getDataType() == DataType::TYPE_NUMERIC) {
        
                // Handle numeric cells
            
        
                 $value = $cell->getFormattedValue();
                
            
               
                
                
            
        } else {
            // Handle other types or use raw value as fallback
            
        
            $value = $cell->getValue();
            if (substr($value, 0, 1) === '=') {
    $value = $cell->getFormattedValue();
} else {
    $value = $cell->getValue();
}
        }
        
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        log_message('error', 'Error getting formatted value: ' . $e->getMessage());
        $value = $cell->getValue(); // Fallback to raw value
    }
} else {
    $value = ''; // Handle empty cells
}


        // Sanitize the value for HTML output
    //    $value = htmlspecialchars($value);

                        // Start building the cell
                        $cellHtml = '';

                        // Use <th> for the first row (assuming it's the header)
                        if ($row == 1) {
                            $cellHtml .= '<th';
                        } else {
                            $cellHtml .= '<td';
                        }

                        // Get cell style
                        

                        // Retrieve fill color
                        $fill = $cellStyle->getFill();
                        $fillType = $fill->getFillType();
                        $bgColor = '';

                        if ($fillType !== \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE) {
                            $bgColor = $fill->getStartColor()->getRGB();
                            // Apply background color
                            if (!empty($bgColor) && $bgColor !== 'FFFFFF') {
                                $cellHtml .= ' style="background-color:#' . $bgColor . ';"';
                            }
                        }

                        // Retrieve font color
                        $font = $cellStyle->getFont();
                        $fontColor = $font->getColor()->getRGB();
                        if (!empty($fontColor)) {
                            $cellHtml .= ' color="#' . $fontColor . ';"';
                        }

                        // Add the value inside the cell
                        $cellHtml .= '>' . $value . '</' . ($row == 1 ? 'th' : 'td') . '>';
                        $html .= $cellHtml;
                    }
                    $html .= '</tr>';
                }

                $html .= '</table>';

                // Assign the HTML to $data
                $data['spreadsheet_html'] = $html;
                
                // Load the view with the spreadsheet HTML
                $this->load->view('contents/forms_viewer/form_SUCNFFORME2', $data);
            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    
    // Load footer view
    $this->load->view('page_comp/footer');
}

    
    
     public function SUCNFFORME1($checkid = false, $sheet = false) { $this->load->view('page_comp/header');
    
    // Load necessary models
    $this->load->model('user_model');
    $id = $this->session->id;
    
    // Initialize data
    $data = $this->data;
    
    // Check user status
    if (!$this->user_model->check_status($id)) { // Check inactivity
        // Check user is logged in and has appropriate level
        if ($data["islogged"] && in_array($data['userlevel'], ["administrator", "ched_staff", "hei"])) {
            // Load head banner view
            $this->load->view('page_comp/head_banner', $data);
            
            // Load checks_model
            $this->load->model('checks_model');
            
            if ($checkid) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Check if file exists
                if (!file_exists($filePath)) {
                    show_error('Spreadsheet file not found at path: ' . $filePath);
                    return;
                }

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    show_error('Unsupported file format: ' . $fileExtension);
                    return;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    log_message('error', 'Error loading spreadsheet: ' . $e->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                } catch (\TypeError $te) {
                    log_message('error', 'Type error loading spreadsheet: ' . $te->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                }

                // Determine if $sheet is an index or name
                if ($sheet !== false && $sheet !== null) {
                    if (is_numeric($sheet)) {
                        $sheetIndex = (int)$sheet;
                        $sheetObj = $spreadsheet->getSheet($sheetIndex);
                        if (!$sheetObj) {
                            show_error("Sheet with index '{$sheetIndex}' does not exist.");
                            return;
                        }
                    } elseif (is_string($sheet)) {
                        $sheetObj = $spreadsheet->getSheetByName($sheet);
                        if (!$sheetObj) {
                            show_error("Sheet named '{$sheet}' does not exist.");
                            return;
                        }
                    } else {
                        show_error('Invalid sheet identifier provided.');
                        return;
                    }
                } else {
                    // Default to the first sheet
                    $sheetObj = $spreadsheet->getSheet(0);
                   
                    if (!$sheetObj) {
                        show_error('No sheets found in the spreadsheet.');
                        return;
                    }
                }

                // Assign sheet details to $data
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                $data['currentsheet'] = $sheetObj->getTitle();
                $data['sheetnames'] = $spreadsheet->getSheetNames();

                // Manually generate HTML from the sheet data
                $html = '<table border="1" cellpadding="5" cellspacing="0">';
                $highestRow = $sheetObj->getHighestRow();
                $highestColumn = $sheetObj->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
              
                
                
                for ($row = 1; $row <= $highestRow; $row++) {
                    $html .= '<tr>';
                    for ($col = 1; $col <= $highestColumnIndex; $col++) {
                        $cell = $sheetObj->getCellByColumnAndRow($col, $row);
                      
                       $cellStyle = $sheetObj->getStyle($cell->getCoordinate());
                    
                       
   if ($cell !== null) {
    try {
        // Check the data type of the cell
        if ($cell->getDataType() == DataType::TYPE_STRING) {
            $value = $cell->getFormattedValue(); // Handle string cells
        } 
        elseif ($cell->getDataType() == DataType::TYPE_NUMERIC) {
        
                // Handle numeric cells
            
        
                 $value = $cell->getFormattedValue();
                
            
               
                
                
            
        } else {
            // Handle other types or use raw value as fallback
            
        
            $value = $cell->getValue();
            
        }
        
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        log_message('error', 'Error getting formatted value: ' . $e->getMessage());
        $value = $cell->getValue(); // Fallback to raw value
    }
} else {
    $value = ''; // Handle empty cells
}


        // Sanitize the value for HTML output
    //    $value = htmlspecialchars($value);

                        // Start building the cell
                        $cellHtml = '';

                        // Use <th> for the first row (assuming it's the header)
                        if ($row == 1) {
                            $cellHtml .= '<th';
                        } else {
                            $cellHtml .= '<td';
                        }

                        // Get cell style
                        

                        // Retrieve fill color
                        $fill = $cellStyle->getFill();
                        $fillType = $fill->getFillType();
                        $bgColor = '';

                        if ($fillType !== \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE) {
                            $bgColor = $fill->getStartColor()->getRGB();
                            // Apply background color
                            if (!empty($bgColor) && $bgColor !== 'FFFFFF') {
                                $cellHtml .= ' style="background-color:#' . $bgColor . ';"';
                            }
                        }

                        // Retrieve font color
                        $font = $cellStyle->getFont();
                        $fontColor = $font->getColor()->getRGB();
                        if (!empty($fontColor)) {
                            $cellHtml .= ' color="#' . $fontColor . ';"';
                        }

                        // Add the value inside the cell
                        $cellHtml .= '>' . $value . '</' . ($row == 1 ? 'th' : 'td') . '>';
                        $html .= $cellHtml;
                    }
                    $html .= '</tr>';
                }

                $html .= '</table>';

                // Assign the HTML to $data
                $data['spreadsheet_html'] = $html;
                
                // Load the view with the spreadsheet HTML
                $this->load->view('contents/forms_viewer/form_SUCNFFORME1', $data);
            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    
    // Load footer view
    $this->load->view('page_comp/footer');
}

    
    
 public function SUCNFFormsA($checkid = false, $sheet = false) {
    // Load header view
    $this->load->view('page_comp/header');
    
    // Load necessary models
    $this->load->model('user_model');
    $id = $this->session->id;
    
    // Initialize data
    $data = $this->data;
    
    // Check user status
    if (!$this->user_model->check_status($id)) { // Check inactivity
        // Check user is logged in and has appropriate level
        if ($data["islogged"] && in_array($data['userlevel'], ["administrator", "ched_staff", "hei"])) {
            // Load head banner view
            $this->load->view('page_comp/head_banner', $data);
            
            // Load checks_model
            $this->load->model('checks_model');
            
            if ($checkid) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Check if file exists
                if (!file_exists($filePath)) {
                    show_error('Spreadsheet file not found at path: ' . $filePath);
                    return;
                }

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    show_error('Unsupported file format: ' . $fileExtension);
                    return;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    log_message('error', 'Error loading spreadsheet: ' . $e->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                } catch (\TypeError $te) {
                    log_message('error', 'Type error loading spreadsheet: ' . $te->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                }

                // Determine if $sheet is an index or name
                if ($sheet !== false && $sheet !== null) {
                    if (is_numeric($sheet)) {
                        $sheetIndex = (int)$sheet;
                        $sheetObj = $spreadsheet->getSheet($sheetIndex);
                        if (!$sheetObj) {
                            show_error("Sheet with index '{$sheetIndex}' does not exist.");
                            return;
                        }
                    } elseif (is_string($sheet)) {
                        $sheetObj = $spreadsheet->getSheetByName($sheet);
                        if (!$sheetObj) {
                            show_error("Sheet named '{$sheet}' does not exist.");
                            return;
                        }
                    } else {
                        show_error('Invalid sheet identifier provided.');
                        return;
                    }
                } else {
                    // Default to the first sheet
                    $sheetObj = $spreadsheet->getSheet(0);
                   
                    if (!$sheetObj) {
                        show_error('No sheets found in the spreadsheet.');
                        return;
                    }
                }

                // Assign sheet details to $data
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                $data['currentsheet'] = $sheetObj->getTitle();
                $data['sheetnames'] = $spreadsheet->getSheetNames();

                // Manually generate HTML from the sheet data
                $html = '<table border="1" cellpadding="5" cellspacing="0">';
                $highestRow = $sheetObj->getHighestRow();
                $highestColumn = $sheetObj->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
              
                
                
                for ($row = 1; $row <= $highestRow; $row++) {
                    $html .= '<tr>';
                    for ($col = 1; $col <= $highestColumnIndex; $col++) {
                        $cell = $sheetObj->getCellByColumnAndRow($col, $row);
                      
                       $cellStyle = $sheetObj->getStyle($cell->getCoordinate());
                    
                       
   if ($cell !== null) {
    try {
        // Check the data type of the cell
        if ($cell->getDataType() == DataType::TYPE_STRING) {
            $value = $cell->getFormattedValue(); // Handle string cells
        } 
        elseif ($cell->getDataType() == DataType::TYPE_NUMERIC) {
        
                // Handle numeric cells
            
        
                 $value = $cell->getFormattedValue();
                
            
               
                
                
            
        } else {
            // Handle other types or use raw value as fallback
            
        
            $value = $cell->getValue();
            
        }
        
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        log_message('error', 'Error getting formatted value: ' . $e->getMessage());
        $value = $cell->getValue(); // Fallback to raw value
    }
} else {
    $value = ''; // Handle empty cells
}


        // Sanitize the value for HTML output
    //    $value = htmlspecialchars($value);

                        // Start building the cell
                        $cellHtml = '';

                        // Use <th> for the first row (assuming it's the header)
                        if ($row == 1) {
                            $cellHtml .= '<th';
                        } else {
                            $cellHtml .= '<td';
                        }

                        // Get cell style
                        

                        // Retrieve fill color
                        $fill = $cellStyle->getFill();
                        $fillType = $fill->getFillType();
                        $bgColor = '';

                        if ($fillType !== \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE) {
                            $bgColor = $fill->getStartColor()->getRGB();
                            // Apply background color
                            if (!empty($bgColor) && $bgColor !== 'FFFFFF') {
                                $cellHtml .= ' style="background-color:#' . $bgColor . ';"';
                            }
                        }

                        // Retrieve font color
                        $font = $cellStyle->getFont();
                        $fontColor = $font->getColor()->getRGB();
                        if (!empty($fontColor)) {
                            $cellHtml .= ' color="#' . $fontColor . ';"';
                        }

                        // Add the value inside the cell
                        $cellHtml .= '>' . $value . '</' . ($row == 1 ? 'th' : 'td') . '>';
                        $html .= $cellHtml;
                    }
                    $html .= '</tr>';
                }

                $html .= '</table>';

                // Assign the HTML to $data
                $data['spreadsheet_html'] = $html;
                
                // Load the view with the spreadsheet HTML
                $this->load->view('contents/forms_viewer/form_SUCNFFormsA', $data);
            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    
    // Load footer view
    $this->load->view('page_comp/footer');
}
 public function NONSUCPRCListofGraduates($checkid = false, $sheet = false) {
    // Load header view
    $this->load->view('page_comp/header');
    
    // Load necessary models
    $this->load->model('user_model');
    $id = $this->session->id;
    
    // Initialize data
    $data = $this->data;
    
    // Check user status
    if (!$this->user_model->check_status($id)) { // Check inactivity
        // Check user is logged in and has appropriate level
        if ($data["islogged"] && in_array($data['userlevel'], ["administrator", "ched_staff", "hei"])) {
            // Load head banner view
            $this->load->view('page_comp/head_banner', $data);
            
            // Load checks_model
            $this->load->model('checks_model');
            
            if ($checkid) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Check if file exists
                if (!file_exists($filePath)) {
                    show_error('Spreadsheet file not found at path: ' . $filePath);
                    return;
                }

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    show_error('Unsupported file format: ' . $fileExtension);
                    return;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    log_message('error', 'Error loading spreadsheet: ' . $e->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                } catch (\TypeError $te) {
                    log_message('error', 'Type error loading spreadsheet: ' . $te->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                }

                // Determine if $sheet is an index or name
                if ($sheet !== false && $sheet !== null) {
                    if (is_numeric($sheet)) {
                        $sheetIndex = (int)$sheet;
                        $sheetObj = $spreadsheet->getSheet($sheetIndex);
                        if (!$sheetObj) {
                            show_error("Sheet with index '{$sheetIndex}' does not exist.");
                            return;
                        }
                    } elseif (is_string($sheet)) {
                        $sheetObj = $spreadsheet->getSheetByName($sheet);
                        if (!$sheetObj) {
                            show_error("Sheet named '{$sheet}' does not exist.");
                            return;
                        }
                    } else {
                        show_error('Invalid sheet identifier provided.');
                        return;
                    }
                } else {
                    // Default to the first sheet
                    $sheetObj = $spreadsheet->getSheet(0);
                   
                    if (!$sheetObj) {
                        show_error('No sheets found in the spreadsheet.');
                        return;
                    }
                }

                // Assign sheet details to $data
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                $data['currentsheet'] = $sheetObj->getTitle();
                $data['sheetnames'] = $spreadsheet->getSheetNames();

                // Manually generate HTML from the sheet data
                $html = '<table border="1" cellpadding="5" cellspacing="0">';
                $highestRow = $sheetObj->getHighestRow();
                $highestColumn = $sheetObj->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
              
                
                
                for ($row = 1; $row <= $highestRow; $row++) {
                    $html .= '<tr>';
                    for ($col = 1; $col <= $highestColumnIndex; $col++) {
                        $cell = $sheetObj->getCellByColumnAndRow($col, $row);
                      
                       $cellStyle = $sheetObj->getStyle($cell->getCoordinate());
                    
                       
   if ($cell !== null) {
    try {
        // Check the data type of the cell
        if ($cell->getDataType() == DataType::TYPE_STRING) {
            $value = $cell->getFormattedValue(); // Handle string cells
        } 
        elseif ($cell->getDataType() == DataType::TYPE_NUMERIC) {
        
                // Handle numeric cells
            
            if(($col==7||$col==2)&&$row>=8){
                
                $dateValue = Date::excelToDateTimeObject($cell->getValue());
                // Format the date as needed (e.g., 'Y-m-d')
                $value = $dateValue->format('m/d/Y'); // Adjust format as needed
            }
            
            else{
                 $value = $cell->getFormattedValue();
                
            }
               
                
                
            
        } else {
            // Handle other types or use raw value as fallback
            
            if(($col==3||$col==4||$col==5)&&$row>=8){
                $value = "<span class='bg-danger'>".$cell->getValue().'</span>';
            }
            else{
            $value = $cell->getValue();
            }
        }
        
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        log_message('error', 'Error getting formatted value: ' . $e->getMessage());
        $value = $cell->getValue(); // Fallback to raw value
    }
} else {
    $value = ''; // Handle empty cells
}


        // Sanitize the value for HTML output
    //    $value = htmlspecialchars($value);

                        // Start building the cell
                        $cellHtml = '';

                        // Use <th> for the first row (assuming it's the header)
                        if ($row == 1) {
                            $cellHtml .= '<th';
                        } else {
                            $cellHtml .= '<td';
                        }

                        // Get cell style
                        

                        // Retrieve fill color
                        $fill = $cellStyle->getFill();
                        $fillType = $fill->getFillType();
                        $bgColor = '';

                        if ($fillType !== \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE) {
                            $bgColor = $fill->getStartColor()->getRGB();
                            // Apply background color
                            if (!empty($bgColor) && $bgColor !== 'FFFFFF') {
                                $cellHtml .= ' style="background-color:#' . $bgColor . ';"';
                            }
                        }

                        // Retrieve font color
                        $font = $cellStyle->getFont();
                        $fontColor = $font->getColor()->getRGB();
                        if (!empty($fontColor)) {
                            $cellHtml .= ' color="#' . $fontColor . ';"';
                        }

                        // Add the value inside the cell
                        $cellHtml .= '>' . $value . '</' . ($row == 1 ? 'th' : 'td') . '>';
                        $html .= $cellHtml;
                    }
                    $html .= '</tr>';
                }

                $html .= '</table>';

                // Assign the HTML to $data
                $data['spreadsheet_html'] = $html;
                
                // Load the view with the spreadsheet HTML
                $this->load->view('contents/forms_viewer/form_NONSUCPRCListofGraduates', $data);
            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    
    // Load footer view
    $this->load->view('page_comp/footer');
}
 public function NONSUCFormE5FacultyForm($checkid = false, $sheet = false) {
    // Load header view
    $this->load->view('page_comp/header');
    
    // Load necessary models
    $this->load->model('user_model');
    $id = $this->session->id;
    
    // Initialize data
    $data = $this->data;
    
    // Check user status
    if (!$this->user_model->check_status($id)) { // Check inactivity
        // Check user is logged in and has appropriate level
        if ($data["islogged"] && in_array($data['userlevel'], ["administrator", "ched_staff", "hei"])) {
            // Load head banner view
            $this->load->view('page_comp/head_banner', $data);
            
            // Load checks_model
            $this->load->model('checks_model');
            
            if ($checkid) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Check if file exists
                if (!file_exists($filePath)) {
                    show_error('Spreadsheet file not found at path: ' . $filePath);
                    return;
                }

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    show_error('Unsupported file format: ' . $fileExtension);
                    return;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    log_message('error', 'Error loading spreadsheet: ' . $e->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                } catch (\TypeError $te) {
                    log_message('error', 'Type error loading spreadsheet: ' . $te->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                }

                // Determine if $sheet is an index or name
                if ($sheet !== false && $sheet !== null) {
                    if (is_numeric($sheet)) {
                        $sheetIndex = (int)$sheet;
                        $sheetObj = $spreadsheet->getSheet($sheetIndex);
                        if (!$sheetObj) {
                            show_error("Sheet with index '{$sheetIndex}' does not exist.");
                            return;
                        }
                    } elseif (is_string($sheet)) {
                        $sheetObj = $spreadsheet->getSheetByName($sheet);
                        if (!$sheetObj) {
                            show_error("Sheet named '{$sheet}' does not exist.");
                            return;
                        }
                    } else {
                        show_error('Invalid sheet identifier provided.');
                        return;
                    }
                } else {
                    // Default to the first sheet
                    $sheetObj = $spreadsheet->getSheet(0);
                    if (!$sheetObj) {
                        show_error('No sheets found in the spreadsheet.');
                        return;
                    }
                }

                // Assign sheet details to $data
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                $data['currentsheet'] = $sheetObj->getTitle();
                $data['sheetnames'] = $spreadsheet->getSheetNames();

                // Manually generate HTML from the sheet data
                $html = '<table border="1" cellpadding="5" cellspacing="0">';
                $highestRow = $sheetObj->getHighestRow();
                $highestColumn = $sheetObj->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

                for ($row = 1; $row <= $highestRow; $row++) {
                    $html .= '<tr>';
                    for ($col = 1; $col <= $highestColumnIndex; $col++) {
                        $cell = $sheetObj->getCellByColumnAndRow($col, $row);
                        $value = $cell->getFormattedValue(); // Use getValue() if you prefer raw data
                        $value = htmlspecialchars($value); // Sanitize for HTML output

                        // Start building the cell
                        $cellHtml = '';

                        // Use <th> for the first row (assuming it's the header)
                        if ($row == 1) {
                            $cellHtml .= '<th';
                        } else {
                            $cellHtml .= '<td';
                        }

                        // Get cell style
                        $cellStyle = $sheetObj->getStyle($cell->getCoordinate());

                        // Retrieve fill color
                        $fill = $cellStyle->getFill();
                        $fillType = $fill->getFillType();
                        $bgColor = '';

                        if ($fillType !== \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE) {
                            $bgColor = $fill->getStartColor()->getRGB();
                            // Apply background color
                            if (!empty($bgColor) && $bgColor !== 'FFFFFF') {
                                $cellHtml .= ' style="background-color:#' . $bgColor . ';"';
                            }
                        }

                        // Retrieve font color
                        $font = $cellStyle->getFont();
                        $fontColor = $font->getColor()->getRGB();
                        if (!empty($fontColor)) {
                            $cellHtml .= ' color="#' . $fontColor . ';"';
                        }

                        // Add the value inside the cell
                        $cellHtml .= '>' . $value . '</' . ($row == 1 ? 'th' : 'td') . '>';
                        $html .= $cellHtml;
                    }
                    $html .= '</tr>';
                }

                $html .= '</table>';

                // Assign the HTML to $data
                $data['spreadsheet_html'] = $html;
                
                // Load the view with the spreadsheet HTML
                $this->load->view('contents/forms_viewer/form_NONSUCFormE5FacultyForm', $data);
            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    
    // Load footer view
    $this->load->view('page_comp/footer');
}

 public function NONSUCeFormsA($checkid = false, $sheet = false) {
    // Load header view
    $this->load->view('page_comp/header');
    
    // Load necessary models
    $this->load->model('user_model');
    $id = $this->session->id;
    
    // Initialize data
    $data = $this->data;
    
    // Check user status
    if (!$this->user_model->check_status($id)) { // Check inactivity
        // Check user is logged in and has appropriate level
        if ($data["islogged"] && in_array($data['userlevel'], ["administrator", "ched_staff", "hei"])) {
            // Load head banner view
            $this->load->view('page_comp/head_banner', $data);
            
            // Load checks_model
            $this->load->model('checks_model');
            
            if ($checkid) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Check if file exists
                if (!file_exists($filePath)) {
                    show_error('Spreadsheet file not found at path: ' . $filePath);
                    return;
                }

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    show_error('Unsupported file format: ' . $fileExtension);
                    return;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    log_message('error', 'Error loading spreadsheet: ' . $e->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                } catch (\TypeError $te) {
                    log_message('error', 'Type error loading spreadsheet: ' . $te->getMessage());
                    show_error('There was an error processing your spreadsheet. Please try again later.');
                    return;
                }

                // Determine if $sheet is an index or name
                if ($sheet !== false && $sheet !== null) {
                    if (is_numeric($sheet)) {
                        $sheetIndex = (int)$sheet;
                        $sheetObj = $spreadsheet->getSheet($sheetIndex);
                        if (!$sheetObj) {
                            show_error("Sheet with index '{$sheetIndex}' does not exist.");
                            return;
                        }
                    } elseif (is_string($sheet)) {
                        $sheetObj = $spreadsheet->getSheetByName($sheet);
                        if (!$sheetObj) {
                            show_error("Sheet named '{$sheet}' does not exist.");
                            return;
                        }
                    } else {
                        show_error('Invalid sheet identifier provided.');
                        return;
                    }
                } else {
                    // Default to the first sheet
                    $sheetObj = $spreadsheet->getSheet(0);
                    if (!$sheetObj) {
                        show_error('No sheets found in the spreadsheet.');
                        return;
                    }
                }

                // Assign sheet details to $data
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                $data['currentsheet'] = $sheetObj->getTitle();
                $data['sheetnames'] = $spreadsheet->getSheetNames();

                // Manually generate HTML from the sheet data
                $html = '<table border="1" cellpadding="5" cellspacing="0">';
                $highestRow = $sheetObj->getHighestRow();
                $highestColumn = $sheetObj->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

                for ($row = 1; $row <= $highestRow; $row++) {
                    $html .= '<tr>';
                    for ($col = 1; $col <= $highestColumnIndex; $col++) {
                        $cell = $sheetObj->getCellByColumnAndRow($col, $row);
                        $value = $cell->getFormattedValue(); // Use getValue() if you prefer raw data
                        $value = htmlspecialchars($value); // Sanitize for HTML output

                        // Start building the cell
                        $cellHtml = '';

                        // Use <th> for the first row (assuming it's the header)
                        if ($row == 1) {
                            $cellHtml .= '<th';
                        } else {
                            $cellHtml .= '<td';
                        }

                        // Get cell style
                        $cellStyle = $sheetObj->getStyle($cell->getCoordinate());

                        // Retrieve fill color
                        $fill = $cellStyle->getFill();
                        $fillType = $fill->getFillType();
                        $bgColor = '';

                        if ($fillType !== \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_NONE) {
                            $bgColor = $fill->getStartColor()->getRGB();
                            // Apply background color
                            if (!empty($bgColor) && $bgColor !== 'FFFFFF') {
                                $cellHtml .= ' style="background-color:#' . $bgColor . ';"';
                            }
                        }

                        // Retrieve font color
                        $font = $cellStyle->getFont();
                        $fontColor = $font->getColor()->getRGB();
                        if (!empty($fontColor)) {
                            $cellHtml .= ' color="#' . $fontColor . ';"';
                        }

                        // Add the value inside the cell
                        $cellHtml .= '>' . $value . '</' . ($row == 1 ? 'th' : 'td') . '>';
                        $html .= $cellHtml;
                    }
                    $html .= '</tr>';
                }

                $html .= '</table>';

                // Assign the HTML to $data
                $data['spreadsheet_html'] = $html;
                
                // Load the view with the spreadsheet HTML
                $this->load->view('contents/forms_viewer/form_NONSUCeFORMA', $data);
            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    
    // Load footer view
    $this->load->view('page_comp/footer');
}



    
    
   public function NONSUCeFormsBC($checkid = false, $sheet = false) {
       
       
$this->load->view('page_comp/header');
    $this->load->model('user_model');
    $id = $this->session->id;
    
    $data = $this->data;
    
    if (!$this->user_model->check_status($id)) { // check inactivity
        if ($data["islogged"] && ($data['userlevel'] == "administrator" || $data['userlevel'] == "ched_staff" || $data['userlevel'] == "hei")) {
    $this->load->view('page_comp/head_banner',$data);
            $this->load->model('checks_model');
            if ($checkid ) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    echo 'Unsupported file format: ', $fileExtension;
                    exit;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    echo 'Error loading file: ', $e->getMessage();
                    exit;
                } catch (\TypeError $te) {
                    echo 'Type error: ', $te->getMessage();
                    exit;
                }

                if ($sheet) {
                    $sheetIndex = $sheet;
                } else {
                    $sheetIndex = 0;
                }

                // Get the active sheet
                $sheet = $spreadsheet->getSheet($sheetIndex);
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                  $data['currentsheet'] =$sheet->getTitle();
                  $data['sheetnames'] = $spreadsheet->getSheetNames();
                // Loop through rows and read data
                $highestRow = $sheet->getHighestRow(); // Get the highest row number

                $array_data = [];

        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = [];
            for ($col = 'A'; $col !== 'AN'; $col++) { // Loop until 'AM' (exclusive of 'AN')

                $cell = $sheet->getCell($col . $row);



                    // Get the raw value, including formulas as strings
                    $cellValue = $cell->getValue();
                    
                       if($row>=10&&$col=='A'&&$cellValue!=null){
                    
                        if(!$this->programCheck($cellValue)){
                          
                            $cellValue = "<b class=' bg-warning ' data-popup='tooltip' title='Program name not recognized/Wrong Spelling!' > ".$cellValue."</b>";
                        }
                    
                        }
                       
                    
                    
                         $rowData[$col] =  $cellValue;
          

           

                // Stop the loop when column 'AM' is reached
                if ($col == 'AM') {
                    break;
                }
            }
            
            
            $data['form_values'][] = $rowData;
        }
      
        $this->load->view('contents/forms_viewer/form_NONSUCeFormsBC', $data);

            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    	$this->load->view('page_comp/footer');
}


  public function SUCNFFORMB($checkid = false, $sheet = false) {
       
       
$this->load->view('page_comp/header');
    $this->load->model('user_model');
    $id = $this->session->id;
    
    $data = $this->data;
    
    if (!$this->user_model->check_status($id)) { // check inactivity
        if ($data["islogged"] && ($data['userlevel'] == "administrator" || $data['userlevel'] == "ched_staff" || $data['userlevel'] == "hei")) {
    $this->load->view('page_comp/head_banner',$data);
            $this->load->model('checks_model');
            if ($checkid ) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    echo 'Unsupported file format: ', $fileExtension;
                    exit;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    echo 'Error loading file: ', $e->getMessage();
                    exit;
                } catch (\TypeError $te) {
                    echo 'Type error: ', $te->getMessage();
                    exit;
                }

                if ($sheet) {
                    $sheetIndex = $sheet;
                } else {
                    $sheetIndex = 0;
                }

                // Get the active sheet
                $sheet = $spreadsheet->getSheet($sheetIndex);
                $data['checkid'] = $checkid;
                $data['check_dbrowdata'] = $check_row;
                  $data['currentsheet'] =$sheet->getTitle();
                  $data['sheetnames'] = $spreadsheet->getSheetNames();
                // Loop through rows and read data
                $highestRow = $sheet->getHighestRow(); // Get the highest row number

                $array_data = [];

        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = [];
            for ($col = 'A'; $col !== 'AW'; $col++) { // Loop until 'AM' (exclusive of 'AN')

                $cell = $sheet->getCell($col . $row);



                    // Get the raw value, including formulas as strings
                    $cellValue = $cell->getValue();
                    
                       if($row>=13&&$col=='B'&&$cellValue!=null){
                    
                        if(!$this->programCheck($cellValue)){
                          
                            $cellValue = "<b class=' bg-warning ' data-popup='tooltip' title='Program name not recognized/Wrong Spelling!' > ".$cellValue."</b>";
                        }
                    
                        }
                         $rowData[$col] =  $cellValue;
          

           

                // Stop the loop when column 'AM' is reached
                if ($col == 'AW') {
                    break;
                }
            }
            
            
            $data['form_values'][] = $rowData;
        }
      
        $this->load->view('contents/forms_viewer/form_SUCNFFORMB', $data);

            } else {
                $this->load->view('home', $data);
            }
        } else {
            $this->load->view('home', $data);
        }
    } else {
        $this->load->view('errors/account_locked', $data);
    }
    	$this->load->view('page_comp/footer');
}
 

public function NONSUCeFormsBC_consolidate($checkid = false, $url = false) {
       
       
   $url2 = base64_decode(urldecode($url));
    $this->load->model('user_model');
    $this->load->model('programs_model');
    $this->load->model('checks_model');
    $id = $this->session->id;
    $this->discipline_arr = $this->programs_model->get_all_disciplines();
    $data = $this->data;
    
    if (!$this->user_model->check_status($id)) { // check inactivity
        if ($data["islogged"] && ($data['userlevel'] == "administrator" || $data['userlevel'] == "ched_staff" || $data['userlevel'] == "hei")) {
   
            $this->load->model('checks_model');
            if ($checkid ) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    echo 'Unsupported file format: ', $fileExtension;
                    exit;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    echo 'Error loading file: ', $e->getMessage();
                    exit;
                } catch (\TypeError $te) {
                    echo 'Type error: ', $te->getMessage();
                    exit;
                }

              
                    $sheetIndex = 0;
                    $rows = array();
                    
                $pl = "";
                $program_level = array(
                    'B-C Doctoral'=>'90',
                    'B-C Masters'=>'80',
                    'B-C Post-Baccalaureate'=>'70',
                    'B-C Baccalaureate'=>'50',
                    'B-C Pre-Baccalaureate'=>'40',
                    'B-C VocTech'=>'VocTech',
                    'B-C Basic'=>'Basic'
                    );
               
               $sy =  $check_row->schoolyear;
               $current_date_time = date('Y-m-d H:i:s');
                $sheetnames = $spreadsheet->getSheetNames();
                
                foreach($sheetnames as $key=>$value){
                    if(isset($program_level[$value])){
                    $sheetIndex = $key;
                    $pl = $program_level[$value];
                    $insticode = $check_row->instcode;
                    
                    $sheet = $spreadsheet->getSheet($sheetIndex);
                    
                     $highestRow = $sheet->getHighestRow(); // Get the highest row number
                        $array_data = [];
                    
                    
                    for ($row = 1; $row <= $highestRow; $row++) {
                     
                               if(is_numeric($sheet->getCell('AH' . $row)->getValue())){
                                $AH =  $sheet->getCell('AH' . $row)->getValue();
                              
                                }else{
                                    $AH = 
                                            intval($sheet->getCell('R' . $row)->getValue())+
                                            intval($sheet->getCell('T' . $row)->getValue())+
                                            intval($sheet->getCell('V' . $row)->getValue())+
                                            intval($sheet->getCell('X' . $row)->getValue())+
                                            intval($sheet->getCell('Z' . $row)->getValue())+
                                            intval($sheet->getCell('AB' . $row)->getValue())+
                                            intval($sheet->getCell('AD' . $row)->getValue())+
                                            intval($sheet->getCell('AF' . $row)->getValue());
                                    
                                    
                                }
                               if(is_numeric($sheet->getCell('AI' . $row)->getValue())){
                                $AI =  $sheet->getCell('AI' . $row)->getValue();
                              
                                }else{
                                    $AI = 
                                            intval($sheet->getCell('S' . $row)->getValue())+
                                            intval($sheet->getCell('U' . $row)->getValue())+
                                            intval($sheet->getCell('W' . $row)->getValue())+
                                            intval($sheet->getCell('Y' . $row)->getValue())+
                                            intval($sheet->getCell('AA' . $row)->getValue())+
                                            intval($sheet->getCell('AC' . $row)->getValue())+
                                            intval($sheet->getCell('AE' . $row)->getValue())+
                                            intval($sheet->getCell('AG' . $row)->getValue());
                                    
                                    
                                }
                               if(is_numeric($sheet->getCell('AJ' . $row)->getValue())){
                                $AJ =  $sheet->getCell('AJ' . $row)->getValue();
                              
                                }else{
                                  $AJ =intval($AI)+intval($AH);
                                    
                                    
                                }
                               if(is_numeric($sheet->getCell('AM' . $row)->getValue())){
                                $AM =  $sheet->getCell('AM' . $row)->getValue();
                              
                                }else{
                                  $AM =  intval($sheet->getCell('AK' . $row)->getValue())+
                                            intval($sheet->getCell('AL' . $row)->getValue());
                                    
                                    
                                }
                                
                            

 //$dis_details = $this->programs_model->get_Discipline($sheet->getCell('C' . $row)->getValue());

$resultd = $this->map_program_to_discipline($sheet->getCell('B' . $row)->getValue());
                                // Get the raw value, including formulas as strings
                              
                                   if($row>=10){// reading starts at row 10
                                        //$sheet->getCell('A' . $row)->getValue();
                              $cellA = $sheet->getCell('A' . $row)->getValue();
                                $cellC = $sheet->getCell('C' . $row)->getValue();

                                if (!(empty($cellA) && empty($cellC))) {
                                   
                                
                                      
                                      $rows[]=array(
                                        'checkid'=>$checkid,
                                        'programid'=>null,
                                        'instcode'=>$insticode, 
                                        'supervisor'=>null,
                                        'datayear'=>$sy,
                                        'programlevel'=>$pl,
                                        'mainprogram'=>$sheet->getCell('A' . $row)->getValue(),
                                        'mpcode'=>$sheet->getCell('B' . $row)->getValue(),
                                        'major'=>$sheet->getCell('C' . $row)->getValue(),
                                        'mjcode'=>$sheet->getCell('D' . $row)->getValue(),
                                        
                                        'discipline'=>$resultd?$resultd['groupcode']:null,
                                        'discipline2'=>$resultd?$resultd['discipline_description']:null,
                                       // 'discipline'=>$dis_details->groupcode,
                                       // 'discipline2'=>$dis_details->discipline_description,
                                          
                                        'thesisdisert'=>$sheet->getCell('E' . $row)->getValue(),
                                        'pstatuscode'=>$sheet->getCell('F' . $row)->getValue(), 
                                        'pstatyear'=>$sheet->getCell('G' . $row)->getValue(),
                                        'authcat'=>$sheet->getCell('H' . $row)->getValue(),
                                        'authserial'=>$sheet->getCell('I' . $row)->getValue(),
                                        'authyear'=>$sheet->getCell('J' . $row)->getValue(),
                                        'remarks'=>$sheet->getCell('K' . $row)->getValue(), 
                                        'pmcode'=>$sheet->getCell('L' . $row)->getValue(), 
                                        'pmif'=>$sheet->getCell('M' . $row)->getValue(),
                                        'nlyears'=>$sheet->getCell('N' . $row)->getValue(),
                                        'pcredit'=>$sheet->getCell('O' . $row)->getValue(),
                                        'tuitionperunit'=>$sheet->getCell('P' . $row)->getValue(),
                                        'programfee'=>$sheet->getCell('Q' . $row)->getValue(),
                                        'newstudm'=>$sheet->getCell('R' . $row)->getValue(),
                                        'newstudf'=>$sheet->getCell('S' . $row)->getValue(),
                                        'oldstudm'=>$sheet->getCell('T' . $row)->getValue(),
                                        'oldstudf'=>$sheet->getCell('U' . $row)->getValue(),
                                        'secondm'=>$sheet->getCell('V' . $row)->getValue(), 
                                        'secondf'=>$sheet->getCell('W' . $row)->getValue(), 
                                        'thirdm'=>$sheet->getCell('X' . $row)->getValue(),  
                                        'thirdf'=>$sheet->getCell('Y' . $row)->getValue(),  
                                        'fourthm'=>$sheet->getCell('Z' . $row)->getValue(), 
                                        'fourthf'=>$sheet->getCell('AA' . $row)->getValue(), 
                                        'fifthm'=>$sheet->getCell('AB' . $row)->getValue(),  
                                        'fifthf'=>$sheet->getCell('AC' . $row)->getValue(),  
                                        'sixthm'=>$sheet->getCell('AD' . $row)->getValue(),  
                                        'sixthf'=>$sheet->getCell('AE' . $row)->getValue(),  
                                        'seventhm'=>$sheet->getCell('AF' . $row)->getValue(), 
                                        'seventhf'=>$sheet->getCell('AG' . $row)->getValue(),
                                        'emtotal'=>$AH,
                                        'eftotal'=>$AI,
                                        'etotal'=>$AJ,
                                        'gradm'=>$sheet->getCell('AK' . $row)->getValue(),    
                                        'gradf'=>$sheet->getCell('AL' . $row)->getValue(),
                                        'gtotal'=>$AM,
                                        'date_consolidated'=>$current_date_time);
                                      
                                   

                                    }
                                   }
                          

                       
                    }
                    
                
                    }
                
                }
                
                
                
                
                  $oldcheckstoremove = $this->checks_model->getchecksids($checkid);
              
                  if($this->programs_model->remove_b_form($oldcheckstoremove[0]->ids)){
                    if(
                       $this->programs_model->insert_b_form($rows)
                       &&$this->checks_model->update_status($checkid,"APPROVED")
                       
                       ){
                
                
                    $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"success","type"=>"failed","message"=>"Consolidate Successful!","redirectto"=>$url2,"url"=>null)));
                }
                else{
                    
                                 $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Failed importing, Try Again!","redirectto"=>false,"url"=>null)));
              
                }
               }
               else{
                                 $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Unable to import data. Error: failed cleaning previous data.","redirectto"=>false,"url"=>null)));
              
               }
                
                
         
            } else {
                        $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"No CheckID","redirectto"=>false,"url"=>null)));
              
            }
        } else {
                       $this->output
                ->set_content_type('application/json')
                ->set_status_header(403) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Forbidden","redirectto"=>false,"url"=>null)));
              
        }
    } else {
                $this->output
                ->set_content_type('application/json')
                ->set_status_header(403) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Forbidden","redirectto"=>false,"url"=>null)));
           
    }
    	
}
public function NONSUCeFormsA_consolidate($checkid = false, $url = false) {
       
       
   $url2 = base64_decode(urldecode($url));
    $this->load->model('user_model');
    $this->load->model('programs_model');
    $this->load->model('hei_model');
    $id = $this->session->id;
    $this->discipline_arr = $this->programs_model->get_all_disciplines();
    $data = $this->data;
    
    if (!$this->user_model->check_status($id)) { // check inactivity
        if ($data["islogged"] && ($data['userlevel'] == "administrator" || $data['userlevel'] == "ched_staff" || $data['userlevel'] == "hei")) {
   
            $this->load->model('checks_model');
            if ($checkid ) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];
             

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    echo 'Unsupported file format: ', $fileExtension;
                    exit;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    echo 'Error loading file: ', $e->getMessage();
                    exit;
                } catch (\TypeError $te) {
                    echo 'Type error: ', $te->getMessage();
                    exit;
                }

              
                    $sheetIndex = 0;
                    $rows = null;
$instype = array("CSCU-MAIN"=>"Chartered State College/University (Main)",
                 "CSCU-SAT"=>"Chartered State College/University (Satellite Campus)",
                 "CSI"=>"CHED-Supervised Institution",
                 "LGCU"=> "Local Government College/University",
                    "PSS" => "Private Sectarian Stock",
                    "PSN"=>"Private Sectarian Non-Stock",
                    "PNS"=>"Private Non-Sectarian Stock",
                    "PNN"=>"Private Non-Sectarian Non-Stock",
                    "PSF"=>"Private Sectarian Foundation",
                    "PNF"=>"Private Non-Sectarian Foundation");

               
    
               $current_date_time = date('Y-m-d H:i:s');
               
          
           
                  
               $insticode = $check_row->instcode;
               $hei_row = $this->hei_model->get_HEILatestProfile($insticode)[0];
               
                    
                    $sheet = $spreadsheet->getSheet(0);//First Sheet
                    
                    
                    

                                    // Get the raw value, including formulas as strings
                                    // $sheet->getCell('A' . $row)->getValue();
                                    
                                    $rows=array(
                                        "instcode"=>$insticode,
                                        "instname"=>ucwords(strtolower($sheet->getCell('C4')->getValue())),
                                        "instformownership"=>$sheet->getCell('C5')->getValue(),
                                        "insttype"=>$sheet->getCell('C6')->getValue(),         
                                        "insttype2"=>$sheet->getCell('C5')->getValue()!=null?$instype[$sheet->getCell('C5')->getValue()]:"",        
                                        "street"=>$sheet->getCell('C7')->getValue(),
                                        "municipality"=>$sheet->getCell('C8')->getValue(),
                                        "province1"=>$sheet->getCell('C9')->getValue(),
                                        "province2"=>$sheet->getCell('C9')->getValue(),
                                        "region"=>$sheet->getCell('C10')->getValue(),
                                        "postalcode"=>$sheet->getCell('C11')->getValue(),
                                        "insttel"=>$sheet->getCell('C12')->getValue(),
                                        "instfax"=>$sheet->getCell('C13')->getValue(),
                                        "insttelhead"=>$sheet->getCell('C14')->getValue(),
                                        "email"=>$sheet->getCell('C15')->getValue(),
                                        "website"=>$sheet->getCell('C16')->getValue(),
                                        "established"=>$sheet->getCell('C17')->getValue(),
                                        "sec"=>$sheet->getCell('C18')->getValue(),
                                        "yearapproved"=>$sheet->getCell('C19')->getValue(),
                                        "tocollege"=>$sheet->getCell('C20')->getValue(),
                                        "touniversity"=>$sheet->getCell('C21')->getValue(),
                                        "insthead"=>$sheet->getCell('C22')->getValue(),
                                        "titlehead"=>$sheet->getCell('C23')->getValue(),
                                        "highesteduchead"=>$sheet->getCell('C24')->getValue(),
                                        "latitude"=>$sheet->getCell('C25')->getValue(),
                                        "longtitude"=>$sheet->getCell('C26')->getValue(),
                                        "heitype"=>(strpos($hei_row->heitype, "Private") !== false? "Private":"LUCs"),
                                        "hei_status"=>$hei_row->hei_status,
                                        "hei_remarks"=>$hei_row->hei_remarks,
                                        "date_added"=>$current_date_time
                                    );
                                    
                                    
                                  

                                  if(trim(strtolower($hei_row->instname)) == trim(strtolower($rows['instname']))){
                                      
                                      //update the old record
                                      
                                    
                                 
                                               if(
                                               $this->hei_model->update_hei($rows,array("heid"=>$hei_row->heid))
                                               &&$this->checks_model->update_status($checkid,"APPROVED")

                                               ){
                                                    $this->output
                                                ->set_content_type('application/json')
                                                ->set_status_header(200) 
                                                ->set_output(json_encode(array("title"=>"success","type"=>"failed","message"=>"Consolidate Successful!","redirectto"=>$url2,"url"=>null)));
                                                }
                                                else{

                                                                 $this->output
                                                ->set_content_type('application/json')
                                                ->set_status_header(200) 
                                                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Failed importing, Try Again!","redirectto"=>false,"url"=>null)));

                                                }
                                  }
                                  else{
                                      
                                      //add new record and update the old record from active to inactive
                                      $rows['heid'] = null;
                                              if($this->hei_model->update_hei(array("hei_status"=>"INACTIVE"),array("instcode"=>$hei_row->instcode))){
                                                      
                                              
                                                        if(
                                                        $this->hei_model->addrecord($rows)
                                                        &&$this->checks_model->update_status($checkid,"APPROVED")

                                                        ){
                                                             $this->output
                                                         ->set_content_type('application/json')
                                                         ->set_status_header(200) 
                                                         ->set_output(json_encode(array("title"=>"success","type"=>"failed","message"=>"Consolidate Successful!","redirectto"=>$url2,"url"=>null)));
                                                         }
                                                         else{

                                                                          $this->output
                                                         ->set_content_type('application/json')
                                                         ->set_status_header(200) 
                                                         ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Failed importing, Try Again!","redirectto"=>false,"url"=>null)));

                                                         }

                                              
                                              
                                              }
                                              
                                              
                                              
                                  }
                    
                    
                
                    
                
                /*
                
                  if($this->programs_model->remove_a_form($checkid)){
                    if(
                       $this->programs_model->insert_a_form($rows)
                       &&$this->checks_model->update_status($checkid,"APPROVED")
                       
                       ){
                
                
                    $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"success","type"=>"failed","message"=>"Consolidate Successful!","redirectto"=>$url2,"url"=>null)));
                }
                else{
                    
                                 $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Failed importing, Try Again!","redirectto"=>false,"url"=>null)));
              
                }
               }
               else{
                                 $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Unable to import data. Error: failed cleaning previous data.","redirectto"=>false,"url"=>null)));
              
               }
                
                */
         
            } else {
                        $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"No CheckID","redirectto"=>false,"url"=>null)));
              
            }
        } else {
                       $this->output
                ->set_content_type('application/json')
                ->set_status_header(403) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Forbidden","redirectto"=>false,"url"=>null)));
              
        }
    } else {
                $this->output
                ->set_content_type('application/json')
                ->set_status_header(403) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Forbidden","redirectto"=>false,"url"=>null)));
           
    }
    	
}
    

public function SUCNFFORMB_consolidate($checkid = false, $url = false) {
       
       
   $url2 = base64_decode(urldecode($url));
    $this->load->model('user_model');
    $this->load->model('programs_model');
    
    $id = $this->session->id;
    $this->discipline_arr = $this->programs_model->get_all_disciplines();
    $data = $this->data;
    
    if (!$this->user_model->check_status($id)) { // check inactivity
        if ($data["islogged"] && ($data['userlevel'] == "administrator" || $data['userlevel'] == "ched_staff" || $data['userlevel'] == "hei")) {
   
            $this->load->model('checks_model');
            if ($checkid ) {
                $check_row = $this->checks_model->get_rowdata($checkid)[0];

                // Define the path to your Excel file
                $filePath = FCPATH . ltrim($check_row->uploaded_file, './');

                // Determine file type by extension
                $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                // Load the appropriate reader
                if ($fileExtension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    echo 'Unsupported file format: ', $fileExtension;
                    exit;
                }

                $reader->setReadDataOnly(true); // Temporarily ignore styles if needed

                try {
                    $spreadsheet = $reader->load($filePath);
                } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                    echo 'Error loading file: ', $e->getMessage();
                    exit;
                } catch (\TypeError $te) {
                    echo 'Type error: ', $te->getMessage();
                    exit;
                }

              
                    $sheetIndex = 0;
                    $rows = array();
                    
                $pl = "";
                $program_level = array(
                    'Doctoral'=>'90',
                    'Masters'=>'80',
                    'Post-Baccalaureate'=>'70',
                    'Baccalaureate'=>'50',
                    'Pre-Baccalaureate'=>'40',
                    'VocTech'=>'VocTech',
                    'Basic'=>'Basic'
                    );
               
               $sy =  $check_row->schoolyear;
               $current_date_time = date('Y-m-d H:i:s');
                $sheetnames = $spreadsheet->getSheetNames();
                
                foreach($sheetnames as $key=>$value){
                    if(isset($program_level[$value])){
                    $sheetIndex = $key;
                    $pl = $program_level[$value];
                    $insticode = $check_row->instcode;
                    
                    $sheet = $spreadsheet->getSheet($sheetIndex);
                    
                     $highestRow = $sheet->getHighestRow(); // Get the highest row number
                        $array_data = [];
                    
                    
                    for ($row = 1; $row <= $highestRow; $row++) {
                     
                               if(is_numeric($sheet->getCell('AH' . $row)->getValue())){
                                $AH =  $sheet->getCell('AH' . $row)->getValue();
                              
                                if($AH==0){
                                     $AH = 
                                            intval($sheet->getCell('R' . $row)->getValue())+
                                            intval($sheet->getCell('T' . $row)->getValue())+
                                            intval($sheet->getCell('V' . $row)->getValue())+
                                            intval($sheet->getCell('X' . $row)->getValue())+
                                            intval($sheet->getCell('Z' . $row)->getValue())+
                                            intval($sheet->getCell('AB' . $row)->getValue())+
                                            intval($sheet->getCell('AD' . $row)->getValue())+
                                            intval($sheet->getCell('AF' . $row)->getValue());
                                }
                                
                                }else{
                                    $AH = 
                                            intval($sheet->getCell('R' . $row)->getValue())+
                                            intval($sheet->getCell('T' . $row)->getValue())+
                                            intval($sheet->getCell('V' . $row)->getValue())+
                                            intval($sheet->getCell('X' . $row)->getValue())+
                                            intval($sheet->getCell('Z' . $row)->getValue())+
                                            intval($sheet->getCell('AB' . $row)->getValue())+
                                            intval($sheet->getCell('AD' . $row)->getValue())+
                                            intval($sheet->getCell('AF' . $row)->getValue());
                                    
                                    
                                }
                               if(is_numeric($sheet->getCell('AI' . $row)->getValue())){
                                $AI =  $sheet->getCell('AI' . $row)->getValue();
                                 if($AI==0){
                                      $AI = 
                                            intval($sheet->getCell('S' . $row)->getValue())+
                                            intval($sheet->getCell('U' . $row)->getValue())+
                                            intval($sheet->getCell('W' . $row)->getValue())+
                                            intval($sheet->getCell('Y' . $row)->getValue())+
                                            intval($sheet->getCell('AA' . $row)->getValue())+
                                            intval($sheet->getCell('AC' . $row)->getValue())+
                                            intval($sheet->getCell('AE' . $row)->getValue())+
                                            intval($sheet->getCell('AG' . $row)->getValue());
                                 }
                                }else{
                                    $AI = 
                                            intval($sheet->getCell('S' . $row)->getValue())+
                                            intval($sheet->getCell('U' . $row)->getValue())+
                                            intval($sheet->getCell('W' . $row)->getValue())+
                                            intval($sheet->getCell('Y' . $row)->getValue())+
                                            intval($sheet->getCell('AA' . $row)->getValue())+
                                            intval($sheet->getCell('AC' . $row)->getValue())+
                                            intval($sheet->getCell('AE' . $row)->getValue())+
                                            intval($sheet->getCell('AG' . $row)->getValue());
                                    
                                    
                                }
                               if(is_numeric($sheet->getCell('AJ' . $row)->getValue())){
                                $AJ =  $sheet->getCell('AJ' . $row)->getValue();
                                    if($AJ==0){
                                        $AJ =intval($AI)+intval($AH);
                                    }
                                }else{
                                  $AJ =intval($AI)+intval($AH);
                                    
                                    
                                }
                               if(is_numeric($sheet->getCell('AM' . $row)->getValue())){
                                $AM =  $sheet->getCell('AM' . $row)->getValue();
                                    if($AM==0){
                                    $AM =  intval($sheet->getCell('AK' . $row)->getValue())+
                                           intval($sheet->getCell('AL' . $row)->getValue());
                                    }
                                }else{
                                  $AM =  intval($sheet->getCell('AK' . $row)->getValue())+
                                            intval($sheet->getCell('AL' . $row)->getValue());
                                    
                                    
                                }
                               if(is_numeric($sheet->getCell('AP' . $row)->getValue())){
                                $AP =  $sheet->getCell('AP' . $row)->getValue();
                                    if($AP==0){
                                        $AP =  intval($sheet->getCell('AN' . $row)->getValue())+
                                               intval($sheet->getCell('AO' . $row)->getValue());
                                    }
                                }else{
                                  $AP =  intval($sheet->getCell('AN' . $row)->getValue())+
                                            intval($sheet->getCell('AO' . $row)->getValue());
                                    
                                    
                                }
                               if(is_numeric($sheet->getCell('O' . $row)->getValue())){
                                $O =  $sheet->getCell('O' . $row)->getValue();
                                    if($O==0){
                                        $O =  intval($sheet->getCell('M' . $row)->getValue())+
                                               intval($sheet->getCell('N' . $row)->getValue());
                                    }
                                }else{
                                  $O =  intval($sheet->getCell('M' . $row)->getValue())+
                                            intval($sheet->getCell('N' . $row)->getValue());
                                    
                                    
                                }
                               if(is_numeric($sheet->getCell('AM' . $row)->getValue())){
                                $AM =  $sheet->getCell('AM' . $row)->getValue();
                                    if($AM==0){
                                        $AM =  intval($sheet->getCell('AK' . $row)->getValue())+
                                               intval($sheet->getCell('AL' . $row)->getValue());
                                    }
                                }else{
                                  $AM =  intval($sheet->getCell('AK' . $row)->getValue())+
                                            intval($sheet->getCell('AL' . $row)->getValue());
                                    
                                    
                                }
                                
                            
 
    
    // //enable this if you want to map discipline code base on the program code.
   // $dis_details = $this->programs_model->get_Discipline($sheet->getCell('C' . $row)->getValue());

                                //auto mapping of discipline
                                $resultd = $this->map_program_to_discipline($sheet->getCell('B' . $row)->getValue());

                                // Get the raw value, including formulas as strings
                              
                                   if($row>=13){// reading starts at row 10
                                        //$sheet->getCell('A' . $row)->getValue();
                                $cellA = $sheet->getCell('B' . $row)->getValue();
                                $cellC = $sheet->getCell('D' . $row)->getValue();

                                if (!(empty($cellA) && empty($cellC))) {
                                   
                                
                                      $rows[]=array(
                                          'checkid'=>$checkid,
                                        'programid'=>null,
                                        'instcode'=>$insticode, 
                                        'supervisor'=>null,
                                        'datayear'=>$sy,
                                        'programlevel'=>$pl,
                                        'mainprogram'=>$sheet->getCell('B' . $row)->getValue(),
                                        'mpcode'=>$sheet->getCell('C' . $row)->getValue(),
                                        'major'=>$sheet->getCell('D' . $row)->getValue(),
                                        'mjcode'=>$sheet->getCell('E' . $row)->getValue(),
                                        'discipline'=>$resultd?$resultd['groupcode']:null,
                                        'discipline2'=>$resultd?$resultd['discipline_description']:null,
                                       //enable this if you want to map discipline code base on the program code.
                                     //   'discipline'=>$dis_details->groupcode,
                                       // 'discipline2'=>$dis_details->discipline_description,
                                          
                                        'thesisdisert'=>$sheet->getCell('I' . $row)->getValue(),
                                        'pstatuscode'=>$sheet->getCell('J' . $row)->getValue(), 
                                                                                  
                                        'authcat'=>$sheet->getCell('F' . $row)->getValue(),
                                        'authserial'=>$sheet->getCell('G' . $row)->getValue(),
                                        'authyear'=>$sheet->getCell('H' . $row)->getValue(),
                                          
                                        'remarks'=>$sheet->getCell('AV' . $row)->getValue(), 
                                                                               
                                        'nlyears'=>$sheet->getCell('L' . $row)->getValue(),
                                        
                                        'tuitionperunit'=>$sheet->getCell('P' . $row)->getValue(),
                                        'programfee'=>$sheet->getCell('Q' . $row)->getValue(),
                                        
                                        'newstudm'=>$sheet->getCell('R' . $row)->getValue(),
                                        'newstudf'=>$sheet->getCell('S' . $row)->getValue(),
                                        'oldstudm'=>$sheet->getCell('T' . $row)->getValue(),
                                        'oldstudf'=>$sheet->getCell('U' . $row)->getValue(),
                                        'secondm'=>$sheet->getCell('V' . $row)->getValue(), 
                                        'secondf'=>$sheet->getCell('W' . $row)->getValue(), 
                                        'thirdm'=>$sheet->getCell('X' . $row)->getValue(),  
                                        'thirdf'=>$sheet->getCell('Y' . $row)->getValue(),  
                                        'fourthm'=>$sheet->getCell('Z' . $row)->getValue(), 
                                        'fourthf'=>$sheet->getCell('AA' . $row)->getValue(), 
                                        'fifthm'=>$sheet->getCell('AB' . $row)->getValue(),  
                                        'fifthf'=>$sheet->getCell('AC' . $row)->getValue(),  
                                        'sixthm'=>$sheet->getCell('AD' . $row)->getValue(),  
                                        'sixthf'=>$sheet->getCell('AE' . $row)->getValue(),  
                                        'seventhm'=>$sheet->getCell('AF' . $row)->getValue(), 
                                        'seventhf'=>$sheet->getCell('AG' . $row)->getValue(),
                                        'emtotal'=>$AH,
                                        'eftotal'=>$AI,
                                        'etotal'=>$AJ,
                                        'gradm'=>$sheet->getCell('AN' . $row)->getValue(),    
                                        'gradf'=>$sheet->getCell('AO' . $row)->getValue(),
                                        'gtotal'=>$AP,
                                        'date_consolidated'=>$current_date_time,
                                         
                                          'pcalendar'=>$sheet->getCell('K' . $row)->getValue(),//for SUCS
                                          'punitexcludethesis_lab'=>$sheet->getCell('M' . $row)->getValue(),//for SUCS
                                          'punitexcludethesis_lec'=>$sheet->getCell('N' . $row)->getValue(),//for SUCS
                                          'punitexcludethesis_total'=>$O,//for SUCS
                                          'act_enUnits_lec'=>$sheet->getCell('AK' . $row)->getValue(),//for SUCS
                                          'act_enUnits_lab'=>$sheet->getCell('AL' . $row)->getValue(),//for SUCS
                                          'act_enUnits_total'=>$AM,//for SUCS
                                          'externalFund_scho'=>$sheet->getCell('AQ' . $row)->getValue(),//for SUCS
                                          'SUCFund_grantees'=>$sheet->getCell('AR' . $row)->getValue(),//for SUCS
                                          '4year_ave_gradRate'=>$sheet->getCell('AS' . $row)->getValue(),//for SUCS
                                          'increase_in_enrollment'=>$sheet->getCell('AT' . $row)->getValue(),//for SUCS
                                          'increase_in_graduate'=>$sheet->getCell('AU' . $row)->getValue(),//for SUCS
                                          
                                          
                                          'pcredit'=>null,//for PHEI/LUCs
                                          'pmcode'=>null,//for PHEI/LUCs
                                          'pmif'=>null,//for PHEI/LUCs
                                          'pstatyear'=>null//for PHEI/LUCs
                                          
                                          );
                                      
                                   
                                }
                                    }
                          

                       
                    }
                    
                
                    }
                
                }
                
                $oldcheckstoremove = $this->checks_model->getchecksids($checkid);
                
                
               if($this->programs_model->remove_b_form($oldcheckstoremove[0]->ids)){
                    if(
                       $this->programs_model->insert_b_form($rows)
                       &&$this->checks_model->update_status($checkid,"APPROVED")
                       
                       ){
                
                
                    $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"success","type"=>"failed","message"=>"Consolidate Successful!","redirectto"=>$url2,"url"=>null)));
                }
                else{
                    
                                 $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Failed importing, Try Again!","redirectto"=>false,"url"=>null)));
              
                }
               }
               else{
                                 $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Unable to import data. Error: failed cleaning previous data.","redirectto"=>false,"url"=>null)));
              
               }
               
                
         
            } else {
                        $this->output
                ->set_content_type('application/json')
                ->set_status_header(200) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"No CheckID","redirectto"=>false,"url"=>null)));
              
            }
        } else {
                       $this->output
                ->set_content_type('application/json')
                ->set_status_header(403) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Forbidden","redirectto"=>false,"url"=>null)));
              
        }
    } else {
                $this->output
                ->set_content_type('application/json')
                ->set_status_header(403) 
                ->set_output(json_encode(array("title"=>"danger","type"=>"failed","message"=>"Forbidden","redirectto"=>false,"url"=>null)));
           
    }
    	
}
 

//USE THIS FUNCTION WHEN IMPORTING TO DATABASE or if CONSOLIDATING in DATABASE
    function isRowEmpty($row) {
        foreach ($row as $value) {
            if (!empty($value)) {
                // If a non-empty value is found, return false
                return false;
            }
        }
        // If all values are empty, return true
        return true;
    }

public function programCheck($program) {
    $this->load->model('programs_model');
    
    // Validate program name
    $result = $this->programs_model->validateProgramName($program);
    
    // Check if result is not empty and numberProgram exists
    if (!empty($result) && isset($result[0]->numberProgram) && $result[0]->numberProgram != 0) {
        return true;
    }
    
    return false;
}




    private function map_program_to_discipline($program_name) {
        $program_name_lower = strtolower($program_name);

        // Fetch all disciplines
        $disciplines = $this->discipline_arr;

        $matches = [];

          foreach ($disciplines as $discipline) {
            if (!empty($discipline['specificdisciplinename'])) {
                $specific_discipline_lower = strtolower($discipline['specificdisciplinename']);
                if (strpos($program_name_lower, $specific_discipline_lower) !== false) {
                    $matches[] = $discipline;
                }
            }
        }

        if (count($matches) >= 1) {
            return $matches[0]; // Single match found
        
        } else {
            // No matches found
            return false;
        }
    }


 
      
        
}
