
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
        
    ChecksForms.SUC();    
    },500)
    
});



$(document).ajaxComplete(function(event, xhr, settings) {
    if (settings.url.includes("uploadupdate")) {
        // The "uploadupdate" request is completed
        //console.log("AJAX request to 'uploadupdate' has been completed.");

        // You can also check the status of the response
        if (xhr.status === 200) {
            if(xhr.responseJSON.form=="SUC-PRC-List-of-Graduates"){
                ChecksForms.load_SUC_PRC_List_of_Graduates();
            }
            else if(xhr.responseJSON.form=="SUC-NF-Research-Extension-Forms"){
                ChecksForms.load_SUC_NF_Research_Extension_Forms();
            }
            else if(xhr.responseJSON.form=="SUC-NF-FORM-GH"){
                ChecksForms.load_SUC_NF_Forms_GH();
            }
            else if(xhr.responseJSON.form=="SUC-NF-FORM-E2"){
                ChecksForms.load_SUC_NF_Forms_E2();
            }
            else if(xhr.responseJSON.form=="SUC-NF-FORM-E1"){
                ChecksForms.load_SUC_NF_Forms_E1();
            }
            else if(xhr.responseJSON.form=="SUC-NF-FORM-B"){
                ChecksForms.load_SUC_NF_Forms_B();
            }
            else if(xhr.responseJSON.form=="SUC-NF-Forms-A"){
                ChecksForms.load_SUC_NF_Forms_A();
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
                                                                                    <th>Form/Template (<a download href="<?= base_url()?>public/checksforms/SUC-NF-Forms-2024.zip">Download All</a>)</th>
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
                                                                                                            <label class="text-default font-weight-semibold">Form A   &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/SUC-Forms/instcode_SUC-NF-Forms-A.xlsx" ><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a  class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;Institutional and Dean Profile</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=SUC-NF-Forms-A" 
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
                                                                                        
                                                                                        
                                                                                        
                                                                                        
                                                                                           <td><span class="badge bg-warning" id = "SUC-NF-Forms-A_status">No Submission</span></td>
											<td><span class="text-muted"  id = "SUC-NF-Forms-A_remarks">Download the template in column 1</span></td>
											
										
										</tr>
										
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
														<label class="text-default font-weight-semibold">FORM B
                                                                                                                &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/SUC-Forms/instcode_SUC-NF-Forms-B.xlsx" ><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a  class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;Profile of each curricular program in an SUC Campus</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=SUC-NF-FORM-B" 
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
                                                                                           <td><span class="badge bg-warning" id="SUC-NF-Forms-B_status">No Submission</span></td>
											<td><span class="text-muted" id="SUC-NF-Forms-B_remarks">Download the template in column 1</span></td>
											
										
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
														<label class="text-default font-weight-semibold">FORM E1
                                                                                                                 &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/SUC-Forms/instcode_SUC-NF-FORM-E1.xlsx" ><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;SUCS Faculty (Elem/Secondary/Tech/Voc Levels)</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                            
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=SUC-NF-FORM-E1" 
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
                                                                                           <td><span class="badge bg-warning" id = "SUC-NF-FORM-E1_status">No Submission</span></td>
											<td><span class="text-muted" id="SUC-NF-FORM-E1_remarks">Download the template in column 1</span></td>
											
										
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
														<label class="text-default font-weight-semibold">FORM E2
                                                                                                                 &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/SUC-Forms/instcode_SUC-NF-FORM-E2.xlsx"><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a  class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;Profile of each tertiary faculty in an SUC Campus</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=SUC-NF-FORM-E2" 
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
                                                                                           <td><span class="badge bg-warning" id="SUC-NF-FORM-E2_status">No Submission</span></td>
											<td><span class="text-muted" id="SUC-NF-FORM-E2_remarks">Download the template in column 1</span></td>
											
										
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
														<label class="text-default font-weight-semibold">FORM GH
                                                                                                                 &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/SUC-Forms/instcode_SUC-NF-FORM-GH.xlsx"><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a  class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;Allotments/Statement of Expenditures/Statement of Income by campus and function</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=SUC-NF-FORM-GH" 
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
                                                                                           <td><span class="badge bg-warning" id="SUC-NF-FORM-GH_status">No Submission</span></td>
											<td><span class="text-muted" id="SUC-NF-FORM-GH_remarks">Download the template in column 1</span></td>
											
										
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
														<label class="text-default font-weight-semibold">Research Extension Form
                                                                                                                 &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/SUC-Forms/instcode_SUC-NF-Research-Extension-Forms.xlsx"><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a  class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;Referred Publications/Papers Presented/Inventions/Research output as cited by other researcher(s) in journal activities/<br/>List of researchers with outputs and|or awards/ List of recognized extension programs or project</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=SUC-NF-Research-Extension-Forms" 
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
                                                                                           <td><span class="badge bg-warning" id="SUC-NF-Research-Extension-Forms_status">No Submission</span></td>
											<td><span class="text-muted" id="SUC-NF-Research-Extension-Forms_remarks">Download the template in column 1</span></td>
											
										
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3 "  >
                                                                                                            <span style="font-size: 20pt" class="icon-file-spreadsheet bg-success"></span>	
													</div>
                                                                                                    
													<div>
														<label class="text-default font-weight-semibold">PRC List of Graduates
                                                                                                                 &nbsp;&nbsp;&nbsp;<a class="btn-link " download href="<?= base_url()?>public/checksforms/SUC-Forms/instcode_SUC-PRC-List-of-Graduates.xlsx"><span class="icon-download"></span></a></label>
														<div class="text-muted font-size-sm">
                                                                                                                    <a  class=" text-muted  mr-1"><span class="badge badge-mark border-blue"></span>&nbsp;Referred Publications/Papers Presented/Inventions/Research output as cited by other researcher(s) in journal activities/<br/>List of researchers with outputs and|or awards/ List of recognized extension programs or project</a>
															
														</div>
													</div>
												</div>
											</td>
											
                                                                                     
											<td>
                                                                                                    <form class="upload_form_update form-horizontal"
                                                                                                          action="uploadupdate/<?=$_GET['sy']?>?form=SUC-PRC-List-of-Graduates" 
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
                                                                                           <td><span class="badge bg-warning" id="SUC-PRC-List-of-Graduates_status">No Submission</span></td>
											<td><span class="text-muted" id="SUC-PRC-List-of-Graduates_remarks">Download the template in column 1</span></td>
											
										
										</tr>
							
									</tbody>
								</table>
							</div>
<input class="d-none" value="<?=$userlevel=="hei"?$username:null?>" id="instcodess"/>
<input class="d-none" value="<?=$_GET['sy']?>" id="syss"/>
<script src="<?= base_url()?>js/checks.loader.js" type="text/javascript"></script>