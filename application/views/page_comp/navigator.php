<div class="sidebar-sticky order-1  ">
                                                                               
                                            
                                            
                                            <div class=" d-none sidebar-component sidebar-component-right sidebar-expand-md">
                                                <div class="sidebar-content">
                                                <div class="card">
							<div class="card-body text-center">
								<div class="card-img-actions d-inline-block mb-3">
                                                                    <img class="img-fluid rounded-circle" src="https://i.pinimg.com/736x/5f/40/6a/5f406ab25e8942cbe0da6485afd26b71.jpg" width="170" height="170" alt="">
								</div>
						    		<h6 class="font-weight-semibold mb-0">Administrator</h6>
						    		<span class="d-block text-muted">Welcome Admin</span>
						    	</div>
                                                </div>
                                                </div>
					    </div>
                                            
                                            
                                            <div class="sidebar sidebar-light sidebar-component sidebar-component-right sidebar-expand-md">
							<div class="sidebar-content">
			        			
			        			<!-- Navigation -->
                                                      
								<div class="card">
									<div class="card-header bg-transparent header-elements-inline">
										<span class="text-uppercase font-size-sm font-weight-semibold">Navigation </span> 
										<div class="header-elements">
											<div class="list-icons">
						                		
					                		</div>
				                		</div>
									</div>
                                                        <div class="card-body ">
									 <ul class="nav nav-sidebar" data-nav-type="accordion">
                                                                             <?php
                                                                                if($userlevel=="administrator"||$userlevel=="ched_staff"){
                                                                                
                                                                                ?>
                                                                                
                                                                             
                                                                             <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">CHED MENU</div> <i class="icon-menu" title="Main"></i></li>
                                                                                    <li class="nav-item">
                                                                                            <a href="<?= base_url(); ?>" class="nav-link <?= $controller==""?"active":"" ?>">
                                                                                                    <i class="icon-home4"></i>
                                                                                                
                                                                                                            Dashboard  
                                                                                                
                                                                                            </a>
                                                                                    </li>
										
										<li class="nav-item">
											<a href="<?= base_url(); ?>hei" class="nav-link <?= $controller=='hei'?'active':''   ?>">
												<i class="icon-office"></i>
												HEIs 
											</a>
										</li>
									
										<li class="nav-item ">
											<a href="<?= base_url(); ?>programs" class="nav-link <?= $controller=="programs"?"active":"" ?>">
												<i class="icon-cabinet"></i>
												All Programs
											</a>
										</li>
										<li class="nav-item ">
											<a href="<?= base_url(); ?>programs/permits" class="nav-link <?= $controller=="programs"?"active":"" ?>">
												<i class="icon-drawer"></i>
												Permits and Recognition
											</a>
										</li>
										    <li class="nav-item nav-item-submenu ">
											<a href="#" class="nav-link ">
												<i class="icon-books"></i>
												CHECKS Status
                                                                                                
											</a>
                                                                                       
                                                                                     <ul class="nav nav-group-sub" data-submenu-title="CHECKS Status" >
                                                                                         
                                                                                      <li class="nav-item"><a href="<?= base_url(); ?>checks/status" class="nav-link  "><i class="icon-file-spreadsheet2"></i> by form</a></li>
                                                                                      <li class="nav-item"><a href="<?= base_url(); ?>checks/statusbyhei" class="nav-link  "> <i class="icon-office"></i> by hei</a></li>
                                                                                            


                                                                                        </ul>
                                                                                        
										</li>
										 
                                                                                
                                                                                <?php
                                                                                
                                                                                }
                                                                                
                                                                                
                                                                                if($userlevel=="administrator"){
                                                                                
                                                                                ?>
                                                                                
                                                                                
                                                                                  <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">SETTINGS</div> <i class="icon-menu" title="Main"></i></li>
                                                                           
                                                                                
										<li class="nav-item ">
											<a href="<?= base_url(); ?>accountmanager" class="nav-link">
												<i class="icon-person"></i>
												Account Mgmt.
											</a>
										</li>
										
                                                                                    <?php
                                                                                }
                                                                             
                                                                                if($userlevel=="hei"){
                                                                                  ?> 
                                                                                
                                                                                    <li class="nav-item">
                                                                                            <a href="<?= base_url(); ?>" class="nav-link">
                                                                                                    <i class="icon-home4"></i>
                                                                                                
                                                                                                         Home
                                                                                                
                                                                                            </a>
                                                                                    </li>
                                                                                <?php
                                                                                    
                                                                                    
                                                                                }
                                                                             if($userlevel=="hei"||$userlevel=="administrator"){
                                                                             
                                                                                
                                                                                ?>
                                                                             
                                                                                  <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">SUBMISSION</div> <i class="icon-menu" title="Main"></i></li>
                                                                           
                                                                            
                                                                      
                                                                                
                                                                                
                                                                       <li class="nav-item nav-item-submenu nav-item-open">
                                                                            <a href="#" class="nav-link"><i class="icon-stack"></i> <span>CHECKS</span></a>
                                                                            <ul class="nav nav-group-sub" data-submenu-title="CHECKS" style="display: block;">

                                                                <li class="nav-item nav-item-submenu nav-item-open">
									<a href="<?= base_url(); ?>checks/checkssubmission" class="nav-link">
                                                                        <?php 
                                                                        if($userlevel=="administrator"){
                                                                            echo '<i class="icon-list-unordered"></i>&nbsp;Checklist';
                                                                        }
                                                                        else{
                                                                            echo '<i class="icon-file-upload2"></i>&nbsp;Submission';
                                                                        }
                                                                        ?>  
                                                                        </a>
									<ul class="nav nav-group-sub" style="display: block;">
                                                                            <?php 
                                                                            $yearstart = 2022;
                                                                            $currentyear = date("Y");
                                                                            $selectedyear = isset($_GET['sy'])?$_GET['sy']:null;
                                                                            
                                                                            for($yearstart;$yearstart<=$currentyear;$yearstart++){
                                                                                
                                                                                echo '  <li class="nav-item '.((base64_encode($yearstart."-".($yearstart+1))==$selectedyear?"  nav-item-open ":"")).'"><a href="'.base_url().'checks/checkssubmission?sy='. base64_encode($yearstart."-".($yearstart+1)).'" class="nav-link  ">'.($yearstart."-".($yearstart+1)).'</a></li>';
                                                                            }
                                                                            
                                                                            
                                                                            ?>
                                                                            
                                                                          
                                                                        
                                                                        </ul>
								</li>
								
							</ul>
						</li>
                                                                                
                                                  <?php
                                                                                    
                                                                                    
                                                                                
                                                                             if($userlevel=="hei"||$userlevel=="administrator"){
                                                                             $currentschoolyear = "2024-2025";
                                                                                
                                                                                ?>
                                                                                 <li class="nav-item nav-item-submenu ">
											<a href="#" class="nav-link">
												<i class="icon-books"></i>
												<?= $currentschoolyear ?> RAW Files
                                                                                                
											</a>
                                                                                       
                                                                                     <ul class="nav nav-group-sub" data-submenu-title="CHECKS RAW Files" >
                                                                                         
                                                                                      <li class="nav-item"><a href="<?= base_url(); ?>checks/formA_download/<?= $currentschoolyear ?>" class="nav-link  "><i class="icon-file-spreadsheet2"></i> Form A</a></li>
                                                                                      <li class="nav-item"><a href="<?= base_url(); ?>checks/formB_download/<?= $currentschoolyear ?>" class="nav-link  "><i class="icon-file-spreadsheet2"></i> Form B</a></li>
                                                                                      <li class="nav-item"><a href="<?= base_url(); ?>checks/formE1_download/<?= $currentschoolyear ?>" class="nav-link  "><i class="icon-file-spreadsheet2"></i> Form E1</a></li>
                                                                                      <li class="nav-item"><a href="<?= base_url(); ?>checks/formE2_download/<?= $currentschoolyear ?>" class="nav-link  "><i class="icon-file-spreadsheet2"></i> Form E2</a></li>
                                                                                      <li class="nav-item"><a href="<?= base_url(); ?>checks/formE5_download/<?= $currentschoolyear ?>" class="nav-link  "><i class="icon-file-spreadsheet2"></i> Form E5</a></li>
                                                                                      <li class="nav-item"><a href="<?= base_url(); ?>checks/formGH_download/<?= $currentschoolyear ?>" class="nav-link  "><i class="icon-file-spreadsheet2"></i> Form GH</a></li>
                                                                                      <li class="nav-item"><a href="<?= base_url(); ?>checks/formPRC_download/<?= $currentschoolyear ?>" class="nav-link  "><i class="icon-file-spreadsheet2"></i> PRC List of Graduates</a></li>
                                                                                      <li class="nav-item"><a href="<?= base_url(); ?>checks/formResearchExtension_download/<?= $currentschoolyear ?>" class="nav-link  "><i class="icon-file-spreadsheet2"></i> Research & Extension</a></li>
                                                                                            


                                                                                        </ul>
                                                                                        
										</li>
                                                                                
                                                
                                                
                                                
                                                                                     <?php
                                                                                }
                                                                                }
                                                                                    ?>
										
									</ul>
                                                            
     
                                                            
								
					            </div>
					            </div>
                                                        
                                                  
					            <!-- /navigation -->

				            </div>
			            </div>
                                          
                                        </div>