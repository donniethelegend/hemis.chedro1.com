
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
								<h5 class="card-title" >CHED Electronic Collection & Knowledge System (CHECKS)
                                                                </h5> 
								
							
                                                                        
                                                         
                                                                
							</div>

							<div class="card-body">
                                                            
                                                   WELCOME <?= $hei_profile[0]->instname ?>
                                                   <p>
                                                       As part of our procedures, we kindly remind you to complete all required forms with accurate and thorough information. Providing correct data is essential to ensure the efficiency and quality of our services.
                                                   </p>
                                                   <p>
                                                     For your reference,
                                                     <a href="<?= base_url()?>public/checksforms/ProgramCode-Discipline-Code.xlsx">click here</a>
                                                     to download discipline code.
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
