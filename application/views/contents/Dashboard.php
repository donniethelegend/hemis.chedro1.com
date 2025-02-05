
	<!-- Page content -->
        <script type="text/javascript">
        $(document).ready(function(){
            
            $('div.page-content').scrollspy({ target: '.sidebar' });
         
         
    
         
        })
        

        </script>
       
        <script src="<?= base_url(); ?>global_assets/js/demo_pages/dashboard.js"></script>
    	

        
        
	<div class="page-content "   data-spy="scroll" data-target=".sidebar" >

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
                  
			<div class="content " >
                            

				<!-- Inner container -->
				<div class="d-flex w-md-auto align-items-start flex-column flex-md-row" >

				
                                    <div class="order-2 order-md-2 col" >

						
						<!-- Sticky -->
						<div class="card  " id="institution_info">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >
                                                                    Institution Statistics
                                                                </h5> 
								
							
						
                                                                        
                                                         
                                                                
							</div>

							<div class="card-body">
                                                        
                                                        
                                                   
                                                            <div class="row">
                                                                <div class="col-md-2 col-lg-2">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 heicount_stats">
									<div id="campaigns-donut"></div>
									<br/>
                                                                        <div class="ml-3">
										<h1 class="font-weight-semibold align-text-top mb-0 total">---</h1>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="col-md-5 col-lg-5">
                                                                 
                                                                </div>
                                                                <div class="col-md-5 col-lg-5">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-lg-6">
                                                                          
                                                                            <select id="month_freq" class="select-sm form-control">
                                                                                <option <?= (date("m")==1?"selected":'') ?>  value="01">January</option>
                                                                                <option <?= (date("m")==2?"selected":'') ?>  value="02">February</option>
                                                                                <option <?= (date("m")==3?"selected":'') ?>  value="03">March</option>
                                                                                <option <?= (date("m")==4?"selected":'') ?>  value="04">April</option>
                                                                                <option <?= (date("m")==5?"selected":'') ?>  value="05">May</option>
                                                                                <option <?= (date("m")==6?"selected":'') ?>  value="06">June</option>
                                                                                <option <?= (date("m")==7?"selected":'') ?>  value="07">July</option>
                                                                                <option <?= (date("m")==8?"selected":'') ?>  value="08">August</option>
                                                                                <option <?= (date("m")==9?"selected":'') ?>  value="09">September</option>
                                                                                <option <?= (date("m")==10?"selected":'') ?>  value="10">October</option>
                                                                                <option <?= (date("m")==11?"selected":'') ?>  value="11">November</option>
                                                                                <option <?= (date("m")==12?"selected":'') ?> value="12">December</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6 col-lg-6">
                                                                            <select id="year_freq" class="select-sm  form-control">
                                                                                <?php
                                                                             $yearstartf = 2018;
                                                                            $currentyearf = date("Y");
                                                                                    for($currentyearf;$currentyearf>=$yearstartf;$currentyearf--){
                                                                                        echo " <option value='$currentyearf'>$currentyearf</option>";
                                                                                    }
                                                                                
                                                                                ?>
                                                                               
                                                                             
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                      <div class="row">
                                                                        <div class="col-md-12 col-lg-12">
                                                                    <div class="chart" id="checksFrequency"></div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                
                                                              
                                                            </div>
                                                         
                                                            
                                                            
							</div>
						</div>
                                                
                                                
						<!-- Sticky -->
						<div class="card  " id="institution_info">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >
                                                                    Program Statistics
                                                                </h5> 
								
							
									
			                	    <div class="row">
                                                                <div class="">
                                                                        <select id="programyear" class="form-control" >
										
                                                                                
                                                                                 <?php 
                                                                            $yearstart = 2018;
                                                                            $currentyear = date("Y");
                                                                           
                                                                            echo "<option disabled selected>Select AY</option>";
                                                                            for($yearstart;$yearstart<=$currentyear;$yearstart++){
                                                                                
                                                                                echo '  <option value="'.$yearstart."-".($yearstart+1).'" >'.($yearstart."-".($yearstart+1)).'</li>';
                                                                            }
                                                                            
                                                                            
                                                                            ?>
									</select>
                                                                </div>
                                                            </div>
                                                                        
                                                         
                                                                
							</div>

							<div class="card-body">
                                                        
                                                        
                                                  
                                                                <div class="row">
                                                                    <div class="col-md-2 col-lg-2">
                                                                          <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="program"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
                                                                        </div>
                                                                    </div>
                                                               
                                                                <div class="col-md col-lg">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="program_prebac"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="program_bachelor"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="program_postbac"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="program_master"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="program_doctor"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                </div>
                                                                
                                                             
                                                                
                                                                
                                                             
                                                         
                                                            
                                                            
							</div>
						</div>
                                                
                                                
                                                
						<div class="card  " id="enrollment_info">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >
                                                                    Enrollment Statistics
                                                                </h5> 
								
							
									
			                	    <div class="row">
                                                                <div class="">
                                                                        <select id="programyear_en" class="form-control" >
										
                                                                                
                                                                                 <?php 
                                                                            $yearstart = 2018;
                                                                            $currentyear = date("Y");
                                                                           
                                                                            echo "<option disabled selected>Select AY</option>";
                                                                            for($yearstart;$yearstart<=$currentyear;$yearstart++){
                                                                                
                                                                                echo '  <option value="'.$yearstart."-".($yearstart+1).'" >'.($yearstart."-".($yearstart+1)).'</li>';
                                                                            }
                                                                            
                                                                            
                                                                            ?>
									</select>
                                                                </div>
                                                            </div>
                                                                        
                                                         
                                                                
							</div>

							<div class="card-body">
                                                        
                                                        
                                                   
                                                            <div class="row">
                                                          
                                                                
                                                         
                                                                <div class="col-md-2 col-lg-2">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="enrollment"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                     <div class="row">
                                                          
                                                                
                                                         
                                                                <div class="col-md col-lg">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="enrollment_prebac"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="enrollment_bachelor"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="enrollment_postbac"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="enrollment_master"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="enrollment_doctor"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                </div>
                                                            
                                                            
                                                                </div>
                                                                </div>
                                                            
                                                            
                                                                </div>
                                                                
                                                             
                                                                
                                                                
                                                                    </div>
                                                                    </div>
						<div class="card  " id="graduate_info">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >
                                                                    Graduate Statistics
                                                                </h5> 
								
							
									
			                	    <div class="row">
                                                                <div class="">
                                                                        <select id="programyear_gr" class="form-control" >
										
                                                                                
                                                                                 <?php 
                                                                            $yearstart = 2018;
                                                                            $currentyear = date("Y");
                                                                           
                                                                            echo "<option disabled selected>Select AY</option>";
                                                                            for($yearstart;$yearstart<=$currentyear;$yearstart++){
                                                                                
                                                                                echo '  <option value="'.$yearstart."-".($yearstart+1).'" >'.($yearstart."-".($yearstart+1)).'</li>';
                                                                            }
                                                                            
                                                                            
                                                                            ?>
									</select>
                                                                </div>
                                                            </div>
                                                                        
                                                         
                                                                
							</div>

							<div class="card-body">
                                                        
                                                        
                                                   
                                                            <div class="row">
                                                          
                                                                
                                                         
                                                                <div class="col-md-2 col-lg-2">
                                                                    
                                                                      <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="graduate"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
								</div>
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                     <div class="row">
                                                          
                                                                
                                                         
                                                                <div class="col-md col-lg">
                                                                    
                                                                        <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="graduate_prebac"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
                                                                        </div>
                                                                    
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                        <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="graduate_bachelor"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
                                                                        </div>
                                                                    
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                        <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="graduate_postbac"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
                                                                        </div>
                                                                    
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                        <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="graduate_master"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
                                                                        </div>
                                                                    
                                                                </div>
                                                                <div class="col-md col-lg">
                                                                    
                                                                        <div class="d-flex align-items-center mb-3 mb-sm-0 graph">
									<div id="graduate_doctor"></div>
									<br/>
                                                                        <div class="ml-3">
										<h3 class="font-weight-semibold mb-0 total">---</h3>
                                                                                <span class="text-muted description">---</span>
									</div>
                                                                        </div>
                                                                    
                                                                </div>
                                                           
                                                            
                                                                </div>
                                                                </div>
                                                           
                                                            
                                                                </div>
                                                                
                                                             
                                                                
                                                                
                                                                    </div>
                                                                    </div>
						
                                              
                                                
                                                
                                      
                                                
                                                
                                                  <?php 
                                  $this->load->view('public_dashboard');
                                    ?>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
					
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
