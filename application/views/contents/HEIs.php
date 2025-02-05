
	<!-- Page content -->
        <script type="text/javascript">
        $(document).ready(function(){
            
            $('div.page-content').scrollspy({ target: '.sidebar' });
         
         
    
         
        })
        
        $(document).ready(function() {
    $('#hei_list_dt').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo site_url('SSPHemis/get_data') ?>",
            "type": "GET"
        }
        
    });
});
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
								<h5 class="card-title" >HEI List
                                                                </h5> 
								
							
                                                                        
                                                                 <?php // var_dump($hei_list); ?>
                                                            
                                                                
							</div>

							<div class="card-body">
                                                            
                                                                        
                                                                        <table id="hei_list_dt" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>UII</th>
                                                                                    <th>Institution Name</th>
                                                                                    <th>Type</th>
                                                                                    <th>Status</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                        </table>
                                                            
                                                            
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
