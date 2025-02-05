



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
				

				

				<li class="nav-item dropdown dropdown-user">
                                    
                                    
                                    <?php
                                    
                                    if(isset($username)&&$islogged){ 
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        ?>
                                   
                                    
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                                            <img src="<?= $avatar?>" class="rounded-circle" alt="">
						<span><?= $username ?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
                                            
                                            
                                      
                                           
						<a href="<?= base_url() ?>accountsetting" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                                                <a href="<?= base_url() ?>logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                                                
                                                
                                                
					</div>
                                    
                                    
                                    <?php } else {
                                        ?>
                                    <a href="<?= base_url() ?>login" class="navbar-nav-link btn-link " >
                                          
						<span class='mi-directions-walk'> &nbsp;&nbsp;Sign in</span>
					</a>
                                    <?php
                                        
                                    } ?>
                                    
                                    
				</li>
			</ul>
		</div>
	</div>
