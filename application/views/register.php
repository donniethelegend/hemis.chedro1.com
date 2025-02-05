<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Registration form -->
				<form class="login-form" action="./register/adduser">
					<div class="card mb-0">
						<div class="card-body">
                                                            
								
                                                            
                                                            
                                                           
                                                            
                                                                <div class="col">
                                                                    <label for="username">Username</label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                            
                                                                            <input placeholder="Username (Required)" required id="username" type="text" class="form-control" name="username"  />
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="password">Password </label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                            
                                                                            <input required id="password" type="password" class="form-control" name="password" placeholder="Password (Required)" />
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="user_level">User Level</label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                            
                                                                                <select name="user_level" id="user_level"  class="form-control">
                                                                                    <option   value="administrator">ADMINISTRATOR</option>
                                                                                    <option  value="hei">HEI</option>
                                                                                    <option value="ched_staff">CHED</option>
                                                                                    
                                                                                </select>
                                                                                
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                
                                                         
                                                                <div class="col">
                                                                      <label for="name">Complete Name</label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                          
                                                                            <input required id="name" placeholder="Complete name (Required)" type="text" class="form-control" name="name"  />
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col">
                                                                     <label for="email">User Email Address</label>  
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                             
                                                                            <input placeholder="Email Address (Required)" required id="email" type="email" class="form-control" name="email"  />
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-envelop5 text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                             
                                                                
                                                           
                                                                  <div class="col">
                                                                        <label for="status">User Status</label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                          
                                                                                <select name="status" class="form-control">
                                                                                    <option  selected value="active">Active</option>
                                                                                    <option value="inactive">Inactive</option>
                                                                                   </select>
                                                                                
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                  <div class="col">
                                                                          <label for="change_pass">Change of Password Required?</label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                        
                                                                            
                                                                                <select name="change_pass" id="change_pass"  class="form-control">
                                                                                    <option selected value="1">Yes</option>
                                                                                    <option  value="0">No</option>
                                                                                   </select>
                                                                                
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                             
                                                           
                                                            

						

							<button type="submit" class="btn bg-teal-400 btn-block">Register <i class="icon-circle-right2 ml-2"></i></button>
						</div>
					</div>
				</form>
				<!-- /registration form -->

			</div>
			<!-- /content area -->



		</div>
		<!-- /main content -->

	</div>