




	<div class="navbar navbar-expand-md navbar-dark 
             " >
            <div class=" p-0 m-0 " >
			
                                                         

                    <a class='btn btn-link p-1'  href='./'>
                        
                        <img src="<?= base_url(); ?>/assets/image/Commission_on_Higher_Education_(CHEd).svg"  style="height: 50px; padding:0px" class=" rounded-circle"  />    
                    
                    </a>
                    
                    
								                              
                    
                    
                     
                                                                
						
		</div>

		<div class="d-md-none">
			
			<button class="navbar-toggler sidebar-mobile-main-toggle" data-toggle="collapse" data-target="#navbar-mobile" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			

                    <a class="navbar-text ml-md-3 mr-md-auto" href="./">
                            
				<div class="media-title font-weight-semibold">Commission on Higher Education Regional Office 1 (Higher Education Management Information System)</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm"></i> &nbsp;Brgy. Sevilla, Govt. Center, San Fernando La Union
								</div>
							       
			</a>

			<ul class="navbar-nav">
				

				

			</ul>
		</div>
	</div>



	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper ">

			<!-- Content area -->
                        
			<div class="content  "  >
                         
                            
                         
                                
                                <?php if(!$islogged){ ?>
                            <div class="row ">
                                
                                
                                <div class="col-md-9 d-none d-sm-block ">
                                  <video style="width: 100%" autoplay muted loop>
                                        <source src="<?= base_url() ?>public/wcVideo.mp4" type="video/mp4">
                                        Your browser does not support the <code>video</code> tag.
                                    </video>
                                  
                                </div>
                            <div class="col-md-3  " >
                                
                                
                                <form  action="<?= base_url()?>login/loadlogin<?= $_SERVER['QUERY_STRING']!=null?"?".$_SERVER['QUERY_STRING']:"" ?>">
					<div class="card  ">
                                            
						<div class="card-header">
                                                      <div class="row ">
							<div class="col ">
								<i class="icon-2x text-slate-300  rounded-round " >
                                                                    <img class="img-fluid" src="<?= base_url(); ?>assets/image/Commission_on_Higher_Education_(CHEd).svg"/></i>
                                                        
                                                </div>
                                                </div>
                                                    
                                                       <div align="center">
                                                        
								<h5 class="mb-0 " >Higher Education Management Information System (HEMIS)</h5>
								<span class="d-block text-muted">Enter your credentials below</span>
							</div>
                                                    
                                                </div>
						<div class="card-body ">
						
                                                    
                                                    <div class="row ">
							<div class="col ">

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name ="username" class="form-control" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>
							</div>
							</div>
                                                    
                                                    <div class="row ">
							<div class="col ">

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							</div>
							</div>
                                                    <div class="row ">
							<div class="col ">
							

							<div class="form-group">
                                                          
								<button type="submit" class="btn btn-primary  btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>
							</div>
							</div>

							
						</div>
					</div>
				</form>
                            
                        </div>
                        </div>
                            
                                <?php } else{
                                    
                                    
                                    echo '	<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1" ><img class="img-fluid" src="'.base_url().'assets/image/Commission_on_Higher_Education_(CHEd).svg"></i>
								<h2 class="mb-0">Hello '.$username.'</h2>
								<span class="d-block text-muted">Welcome to your portal</span>
							</div>

							

							
						</div>
					</div>';
                                    
                                }?>
                            </div>
                        

                           
			</div>
			<!-- /content area -->


		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
