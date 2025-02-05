
	<!-- Page content -->
        <script type="text/javascript">
        $(document).ready(function(){
            
            $('div.page-content').scrollspy({ target: '.sidebar' });
         
         
    
         
        })
        

        </script>
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
                                                            
                                                         
                                                            <h5 class="card-title" >CHED Electronic Collection & Knowledge System (CHECKS) <?php if(isset($_GET['sy'])){ echo "<b>".base64_decode($_GET['sy'])."</b>";} ?>
                                                                </h5> 
								
							
                                                                        
                                                         
                                                                
							</div>

							<div class="card-body">
                                                            
                                                   
                                                                        <?php 
                                                                      
                                                                      
                                                                        if(!$hei_profile){
                                                                            
                                                                       
                                                                        $this->load->view("contents/checks_interface/checklist");
                                                                
                                                                            
                                                                        }
                                                                        else{
                                                                              $hei = $hei_profile[0];
                                                                             if(strpos($hei->insttype2, "SUC") !== false)
                                                            {
                                                             $this->load->view("contents/checks_interface/Checks_SUCS"  );
                                                                
                                                            }
                                                            else if(strpos($hei->insttype2, "LUC") !== false){
                                                                
                                                                 $this->load->view("contents/checks_interface/Checks_LUCS"  );
                                                            }
                                                            else{
                                                                
                                                                 $this->load->view("contents/checks_interface/Checks_Private"  );
                                                            }
                                                                        }
                                                                        
                                                                        ?>
                                                
                                                            
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
