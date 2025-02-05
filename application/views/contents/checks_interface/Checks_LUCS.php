
<script>
$(document).ready(function(){
    
        $('[name="filetoupdate"]').change(function(){
       
        $(this).parents('form').find('.myprogress').removeClass('d-none').show()
        $(this).hide();
       
        $(this).parents('form').submit();


         })
         
         
         
         
         
       
         
         
         
})


document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function(){
        
    ChecksForms.NONSUC();    
    },500)
    
});



$(document).ajaxComplete(function(event, xhr, settings) {
    if (settings.url.includes("uploadupdate")) {
        // The "uploadupdate" request is completed
        //console.log("AJAX request to 'uploadupdate' has been completed.");

        // You can also check the status of the response
        if (xhr.status === 200) {
            if(xhr.responseJSON.form=="NONSUC-e-Forms-A"){
                ChecksForms.load_NONSUC_e_Forms_A();
            }
            else if(xhr.responseJSON.form=="NONSUC-e-Forms-B-C"){
                ChecksForms.load_NONSUC_e_Forms_B_C();
            }
            else if(xhr.responseJSON.form=="NONSUC-Form-E5-Faculty-Form"){
                ChecksForms.load_NONSUC_Form_E5_Faculty_Form();
            }
            else if(xhr.responseJSON.form=="NONSUC-PRC-List-of-Graduates"){
                ChecksForms.load_NONSUC_PRC_List_of_Graduates();
            }
              else if(xhr.responseJSON.form=="NONSUC-e-Research"){
                ChecksForms.load_NONSUC_e_Research();
            }
            
        } else {
            console.log("Error or failed upload.");
        }
        
        // Perform any other actions based on the completion
    }
});




</script>

<?php if(!isset($_GET['sy'])|| $_GET['sy']==""){
     redirect(base_url()."checks");
} ?>


<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
                                                                                    <th>Form/Template (<a download href="<?= base_url()?>public/checksforms/NONSUC-Forms-2024.zip">Download All</a>)</th>
											<th>Upload Files</th>
											<th>Status</th>
											<th>Remarks/Comments/Suggestions</th>
										
										
										</tr>
									</thead>
									<tbody>
										
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
                                                                                                            <label class="text-default font-weight-semibold">Form A   &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/NONSUC-Forms/instcode_NONSUC-e-Forms-A.xlsx" ><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a  class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;Institutional and Dean Profile</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=NONSUC-e-Forms-A" 
                                                                                                          method="post" 
                                                                                                          enctype="multipart/form-data">
                                                                                                        <div class="row">
                                                                                                              <label  class="btn btn-xs text-success-600" ><span class="icon-file-upload2"></span> Upload/Re-upload File
                                                                                                                <input required type="file" class="d-none"  name="filetoupdate" />      
                                                                                                              </label>
                                                                                                        </div>
                                                                                                        <div class="col-10">
                                                                                                            <div class="progress myprogress d-none mb-3" style="height: 0.7rem; width: 100%">
                                                                                                                <div class="progress-bar progress-bar-striped bg-success" style="width: 0%">
                                                                                                                    <span class="sr-only">0% Complete</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form>                                                                                            
                                                                                        </td>
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                           <td><span class="badge bg-warning" id = "NONSUC-e-Forms-A_status">No Submission</span></td>
											<td><span class="text-muted"  id = "NONSUC-e-Forms-A_remarks">Download the template in column 1</span></td>
											
										
										</tr>
										
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
														<label class="text-default font-weight-semibold">FORM B/C 
                                                                                                                &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/NONSUC-Forms/instcode_NONSUC-e-Forms-B-C.xlsx" ><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a  class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;Curricular Program Profile, Enrolment and Graduates</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=NONSUC-e-Forms-B-C" 
                                                                                                          method="post" 
                                                                                                          enctype="multipart/form-data">
                                                                                                        <div class="row">
                                                                                                              <label  class="btn btn-xs text-success-600" ><span class="icon-file-upload2"></span> Upload/Re-upload File
                                                                                                                <input required type="file" class="d-none"  name="filetoupdate" />      
                                                                                                              </label>
                                                                                                        </div>
                                                                                                        <div class="col-10">
                                                                                                            <div class="progress myprogress d-none mb-3" style="height: 0.7rem; width: 100%">
                                                                                                                <div class="progress-bar progress-bar-striped bg-success" style="width: 0%">
                                                                                                                    <span class="sr-only">0% Complete</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form> 
                                                                                        </td>
                                                                                           <td><span class="badge bg-warning" id="NONSUC-e-Forms-B-C_status">No Submission</span></td>
											<td><span class="text-muted" id="NONSUC-e-Forms-B-C_remarks">Download the template in column 1</span></td>
											
										
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
														<label class="text-default font-weight-semibold">FORM E5
                                                                                                                 &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/NONSUC-Forms/instcode_NONSUC-Form-E5-Faculty-Form.xlsx" ><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;Faculty or Teaching Staff in Higher Education Programs</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                            
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=NONSUC-Form-E5-Faculty-Form" 
                                                                                                          method="post" 
                                                                                                          enctype="multipart/form-data">
                                                                                                        <div class="row">
                                                                                                              <label  class="btn btn-xs text-success-600" ><span class="icon-file-upload2"></span> Upload/Re-upload File
                                                                                                                <input required type="file" class="d-none"  name="filetoupdate" />      
                                                                                                              </label>
                                                                                                        </div>
                                                                                                        <div class="col-10">
                                                                                                            <div class="progress myprogress d-none mb-3" style="height: 0.7rem; width: 100%">
                                                                                                                <div class="progress-bar progress-bar-striped bg-success" style="width: 0%">
                                                                                                                    <span class="sr-only">0% Complete</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form> 
                                                                                        
                                                                                        
                                                                                        </td>
                                                                                           <td><span class="badge bg-warning" id = "NONSUC-Form-E5-Faculty-Form_status">No Submission</span></td>
											<td><span class="text-muted" id="NONSUC-Form-E5-Faculty-Form_remarks">Download the template in column 1</span></td>
											
										
										</tr>
                                                                                <tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
														<label class="text-default font-weight-semibold">Research
                                                                                                                 &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/NONSUC-Forms/instcode_NONSUC-e-Research.xlsx"><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a  class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;List of Research Published</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=NONSUC-e-Research" 
                                                                                                          method="post" 
                                                                                                          enctype="multipart/form-data">
                                                                                                        <div class="row">
                                                                                                              <label  class="btn btn-xs text-success-600" ><span class="icon-file-upload2"></span> Upload/Re-upload File
                                                                                                                <input required type="file" class="d-none"  name="filetoupdate" />      
                                                                                                              </label>
                                                                                                        </div>
                                                                                                        <div class="col-10">
                                                                                                            <div class="progress myprogress d-none mb-3" style="height: 0.7rem; width: 100%">
                                                                                                                <div class="progress-bar progress-bar-striped bg-success" style="width: 0%">
                                                                                                                    <span class="sr-only">0% Complete</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form> 
                                                                                        </td>
                                                                                           <td><span class="badge bg-warning" id="NONSUC-e-Research_status">No Submission</span></td>
											<td><span class="text-muted" id="NONSUC-e-Research_remarks">Download the template in column 1</span></td>
											
										
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
														<label class="text-default font-weight-semibold">PRC List of Graduates
                                                                                                                 &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/NONSUC-Forms/instcode_NONSUC-PRC-List-of-Graduates.xlsx"><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a  class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;List of Graduate students under PRC Programs</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=NONSUC-PRC-List-of-Graduates" 
                                                                                                          method="post" 
                                                                                                          enctype="multipart/form-data">
                                                                                                        <div class="row">
                                                                                                              <label  class="btn btn-xs text-success-600" ><span class="icon-file-upload2"></span> Upload/Re-upload File
                                                                                                                <input required type="file" class="d-none"  name="filetoupdate" />      
                                                                                                              </label>
                                                                                                        </div>
                                                                                                        <div class="col-10">
                                                                                                            <div class="progress myprogress d-none mb-3" style="height: 0.7rem; width: 100%">
                                                                                                                <div class="progress-bar progress-bar-striped bg-success" style="width: 0%">
                                                                                                                    <span class="sr-only">0% Complete</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form> 
                                                                                        </td>
                                                                                           <td><span class="badge bg-warning" id="NONSUC-PRC-List-of-Graduates_status">No Submission</span></td>
											<td><span class="text-muted" id="NONSUC-PRC-List-of-Graduates_remarks">Download the template in column 1</span></td>
											
										
										</tr>
							
									</tbody>
								</table>
							</div>
<input class="d-none" value="<?=$userlevel=="hei"?$username:null?>" id="instcodess"/>
<input class="d-none" value="<?=$_GET['sy']?>" id="syss"/>
<script src="<?= base_url()?>js/checks.loader.js" type="text/javascript"></script>