
	<!-- Page content -->
        <script type="text/javascript">
        $(document).ready(function(){
            $('div.page-content').scrollspy({ target: '.sidebar' });  
        })
        

        </script>
        
        
                                                            <style>
                                                                /* General table styling */
table.checksform {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    font-size: 9px;
    
}


table.checksform , th, td {
    border: 1px solid #d0d7de; 
}


table.checksform > thead > tr:not(:first-child) > th {
    background-color: #e0e6f8;
    color: #333;
    font-weight: bold;
    text-align: center;
}


table.checksform>tbody td {
    padding: 8px;
    text-align: center; 
    vertical-align: middle;
}
table.checksform>thead td {
    padding: 8px;
    text-align: center; 
    vertical-align: middle;
}


table.checksform>tbody tr:nth-child(even) {
    background-color: #f9fafb;
}


table.checksform>tbody tr:hover {
    background-color: #f0f6ff;
}


table.checksform>tbody td.numeric {
    text-align: right;
}


table.checksform>thead>tr:first-child>th {
border: 1px solid #d0d7de; 
text-align: center;
padding:8px;
}
table.checksform > thead tr:nth-child(2) th {
    font-size: 16px;
    background-color: #d3d3d3;
    text-align: center;
}


table.checksform > thead > tr:not(:first-child)>th[rowspan] {
    vertical-align: middle;
}


table.checksform>tbody td.total {
    font-weight: bold;
    background-color: #eef2ff; 
}


table.checksform>tbody>tr>td.selected {
    background-color: #cce5ff;
    border: 2px solid #007bff;
}


                                                            </style>
	<div class="page-content "   data-spy="scroll" data-target=".sidebar" >

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
                  
			<div class="content " >
                            

				<!-- Inner container -->
				<div class="d-flex w-md-auto align-items-start flex-column flex-md-row" >

				
                                    <div class="order-2 order-md-2 col" >


						
						<!-- Sticky -->
                                                <div class="card  " id="profileinfo">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >
                                                                NON SUC e Research
                                                                    
                                                                    <?php 
                                                                       if ($check_dbrowdata->status === "PENDING") {
                                                                    echo "<b class=bg-primary>FOR VALIDATION</b>";
                                                                } else if ($check_dbrowdata->status === "DISAPPROVED") {
                                                                    echo "<b class=bg-danger>SUBJECT FOR RESUBMISSION</b>";
                                                                } else if ($check_dbrowdata->status === "APPROVED") {
                                                                   echo "<b class=bg-success>VALIDATED</b>";
                                                                }
                                                                    
                                                                    ?>
                                                                    
                                                                </h5> 
								
                                                                      <div class="btn-group">
			                    	<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left dropdown-toggle" data-toggle="dropdown"><b><i class="icon-list-unordered"></i></b> Action</button>
			                    	<div class="dropdown-menu dropdown-menu-right">
										<a href="#" data-toggle="modal" data-target="#modal_validateconsolidate" class="dropdown-item"><i class="icon-stack-check"></i> Consolidate and Mark as Validated</a>
										<a href="#" data-toggle="modal" data-target="#modal_reject"  class="dropdown-item"><i class="icon-warning22"></i> Request for Resubmission</a>
                                                                                <a href="<?= base_url().'eform/'. urlencode(base64_encode($check_dbrowdata->uploaded_file)) ?>" target="_blank"  class="dropdown-item"><i class="icon-download"></i> Download Form</a>
										
									</div>
								</div>
                                                                        
                                                         
                                                                
							</div>

							<div class="card-body">
                                                            
                                                   <h6 id ='heiname'> 
                                                                  
                                                                </h6>
                                                              
                                                                    <script>
                                                                                        $(document).ready(function(){
                                                                                            $.getJSON(site_url()+'Hei/hei_jsondata/' + <?= $check_dbrowdata->instcode ?>, function(data){
                                                                                              $("#heiname").text(data[0].instname)
                                                                                            })
                                                                                        });
                                                                    </script>
                                                                   
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
							<div  class="col-12 overflow-auto border-1 "  style="overflow: auto; height: 700px ; width: 1500px;">
                                                            
                                                   
                                                        

<?= $spreadsheet_html ?>

                                                            
                                                            
                                                        </div>
                                                 
                                                            
                                                     
                                                            
                                                            
                                                            
                                                       <br/>     
                                                            
                                         <ul class="nav nav-tabs nav-tabs-top border-bottom-0">
                                               <?php
                                         
                                               
                                                      foreach ($sheetnames as $sheetIndex => $sheetName) {
                                                                      
                                                     
                                                                        echo '<li class="nav-item"><a href="'.base_url().'Checks_Attachment/SUCNFFORME1/'.$checkid.'/'.$sheetIndex.'" class="nav-link '.($sheetName==$currentsheet?"active":"").'" >'.$sheetName.'</a></li>';
                                                          
                                                                        }
                                                      
                                                      ?>      
                                                           
                                             
                                             
									
									
								</ul>                   
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                       <b> REMARKS:</b>
                                                       <p>
                                                           <?= $check_dbrowdata->remarks?>
                                                       </p>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
							</div>
						</div>
					
					</div>
					<?php $this->load->view("page_comp/navigator"  ); ?>
					<!-- /right sidebar component -->

				</div>
				<!-- /inner container -->

                        </div>
		
			<!-- /content area -->


		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

        
        <div id="modal_reject" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Remarks/Suggestions</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

                                                    <form action="<?= base_url()?>checks/reject_check/<?= urlencode(base64_encode($checkid)) ?>/<?php echo urlencode(base64_encode(base_url(uri_string()))) ?>"
                                                                                                          method="post" >
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>CHECK ID</label>
												<input type="text" name="checkid" readonly value="<?= $checkid?>" class="form-control">
											</div>
											<div class="col-sm-6">
												<label>INSTITUTION ID</label>
												<input type="text" name="checkid" readonly value="<?= $check_dbrowdata->instcode?>" class="form-control">
											</div>

											
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>Remarks/Suggestions</label>
                                                                                                <textarea required style="height: 500px" 
                                                                                                          
                                                                                                          placeholder="Remarks/Suggestions" 
                                                                                                          name="remarks" class="form-control"><?= $check_dbrowdata->remarks?></textarea>
											</div>

											
										</div>
									</div>

									
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" class="btn bg-primary">Submit form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
        
        
        
        
        
        
        <div id="modal_validateconsolidate" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Consolidating Please Wait...</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

                                                    <form action="<?= base_url()?>Checks_Attachment/SUCNFFORMB_consolidate/<?= $checkid ?>/<?php echo urlencode(base64_encode(base_url(uri_string()))) ?>"
                                                                                                          method="post" >
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>CHECK ID</label>
												<input type="text" name="checkid" readonly value="<?= $checkid?>" class="form-control">
											</div>
											<div class="col-sm-6">
												<label>INSTITUTION ID</label>
												<input type="text" name="checkid" readonly value="<?= $check_dbrowdata->instcode?>" class="form-control">
											</div>

											
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
											
                                                                                           This process will be consolidate all sheet of this form.
                                                                                           <br/>
                                                                                           Empty Program will not be imported.
                                                                                           
											</div>

											
										</div>
									</div>

									
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn bg-primary">Consolidate Form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
        
        
       