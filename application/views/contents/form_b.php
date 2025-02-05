
  <div id="modal_validateconsolidate" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Consolidating Please Wait...</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

                                                    <form 
                                                                                                          method="post" >
								<div class="modal-body">
									

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

	<!-- Page content -->

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
						

						
                                                  
							<div class="card-header header-elements-inline align-top">
							<div class="header-elements-horizontal">	
							<div class="row">	
                                                            <div class="col">
                                                            <h2 class="card-title" >
                                                             FORM B DOWNLOAD
                                                           
                                                                </h2> 
                                                        </div>
                                                        </div>
                                                   
                                                       
                                                        </div>
                                                        
                                                            <div class="list-icons ml-3 ">
				                		<div class="list-icons-item dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu">
                                                                                            
                                                                                            
												
												
                                                                                                  <?php 
                                                                                                    $yearstart = 2023;
                                                                                                    $currentyear = date("Y");
                                                                                                 
                                                                                                    for($yearstart;$yearstart<=$currentyear;$yearstart++){
                                                                                                        
                                                                                                        echo '<a  href="'.base_url()."checks/formB_download/".$yearstart."-".($yearstart+1)
                                                                                                                .'" class="dropdown-item "> '.($yearstart."-".($yearstart+1)).'</a>';
                                                                                                    
                                                                                                    }
                                                                                                    ?>
											</div>
				                		</div>
				                	</div>
                                                                
							</div>

            <div class="card-body p-1">
                    
    <div class="table-responsive">
        
      
								<table class="table  table-sm " id="top10program">
									<thead>
										<tr>
											<th>Instcode</th>
											<th>HEI</th>
											<th>STATUS</th>
											<th>FORM B/FORM BC</th>
                                                                                        
										</tr>
									</thead>
									<tbody>
                                                                            
                                                                            <?php
                                                                            
                                                                            
                                                                            foreach($formb as $v){
                                                                                
                                                                                echo "<tr>";
                                                                                    echo "<td>";
                                                                                      echo $v->instcode;
                                                                                    echo "</td>";
                                                                                    echo "<td>";
                                                                                      echo $v->heiname;
                                                                                    echo "</td>";
                                                                                    echo "<td>";
                                                                                      echo $v->heitype;
                                                                                    echo "</td>";
                                                                                    echo "<td>";
                                                                                      echo $v->schoolyear;
                                                                                    echo "</td>";
                                                                                    echo "<td>";
                                                                                      echo $v->status=="APPROVED"?"<b class='bg-success'>CONSOLIDATED</b>":"PENDING";
                                                                                    echo "</td>";
                                                                                    echo "<td>";
                                                                                      echo  "<a href='".base_url().'eform/'. urlencode(base64_encode($v->uploaded_file))."' target='_blank'>download</a>";
                                                                                    echo "</td>";
                                                                                    echo "<td>";
                                                                                      echo  '<a href="#" data-toggle="modal" data-instcode="'.$v->instcode.'" data-checkid="'.$v->id.'" data-target="#modal_validateconsolidate" class="dropdown-item"><i class="icon-stack-check"></i> Consolidate</a>';
										
                                                                                      echo "</td>";
                                                                                echo "</tr>";
                                                                                
                                                                            }
                                                                            ?>
										
                                                                                
                                                                                
                                                                                

									</tbody>
								</table>
							</div>

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
        
        <script> 
        $(document).ready(function(){
            
            $("#modal_validateconsolidate").on('show.bs.modal',function(e){
                var element = $(e.relatedTarget)
                var modal = $(this)
               var action = "<?= base_url()?>Checks_Attachment/NONSUCeFormsBC_consolidate/"+(element.data('checkid'))+"/<?php echo urlencode(base64_encode(base_url(uri_string()))) ?>"
            
            modal.find('form').attr("action",action)
            
            })
            
        })
        
        </script>