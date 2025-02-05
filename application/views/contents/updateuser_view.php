	 
          <script src="<?= base_url()?>js/components_buttons.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>

          <script src="<?= base_url()?>global_assets/js/demo_pages/charts/google/pies/pie_3d.js"></script>
	<script src="<?= base_url()?>global_assets/js/demo_pages/charts/google/pies/3d_exploded.js"></script>     
<div class="order-2 order-md-2 col" >


						
						<!-- Sticky -->
						<div class="card  " id="profileinfo">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >Update User</h5> 
								
								
							</div>

							<div class="card-body">
							<form  action="../../register/update_user_account">
                                                            
								
                                                            
                                                            
                                                            <div class="row">
                                                                <div class="col-1">
                                                                     <label for="uid">User ID</label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                           
                                                                                <input required id="uid" readonly type="number" class="form-control" name="id" value="<?= $userdata[0]->id ?>" />
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="username">Username</label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                            
                                                                                <input required id="username" type="text" class="form-control" name="username" value="<?= $userdata[0]->username?>" />
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="password">Password <small>(Leave it blank to retain original password)</small></label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                            
                                                                            <input  id="password" type="password" class="form-control" name="password" placeholder="Password (Optional)" />
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="user_level">User Level</label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                            
                                                                                <select name="user_level" id="user_level"  class="form-control">
                                                                                    <option  <?= $userdata[0]->user_level=="administrator"?"selected":"";   ?> value="administrator">ADMINISTRATOR</option>
                                                                                    <option <?= $userdata[0]->user_level=="hei"?"selected":"";   ?> value="hei">HEI</option>
                                                                                    <option <?= $userdata[0]->user_level=="ched_staff"?"selected":"";   ?> value="ched_staff">CHED</option>
                                                                                </select>
                                                                                
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                      <label for="name">Complete Name</label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                          
                                                                            <input required id="name" type="text" class="form-control" name="name" value="<?= $userdata[0]->name?>" />
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col">
                                                                     <label for="email">User Email Address</label>  
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                             
                                                                            <input required id="email" type="email" class="form-control" name="email" value="<?= $userdata[0]->email?>" />
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-envelop5 text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                             
                                                                
                                                            </div>
                                                            <div class="row">
                                                                  <div class="col">
                                                                        <label for="status">User Status</label>
                                                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                                                          
                                                                                <select name="status" class="form-control">
                                                                                    <option  <?= $userdata[0]->status=="active"?"selected":"";   ?> value="active">Active</option>
                                                                                    <option  <?= $userdata[0]->status=="inactive"?"selected":"";   ?> value="inactive">Inactive</option>
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
                                                                                    <option  <?= $userdata[0]->change_pass=="1"?"selected":"";   ?> value="1">Yes</option>
                                                                                    <option  <?= $userdata[0]->change_pass=="0"?"selected":"";   ?> value="0">No</option>
                                                                                   </select>
                                                                                
                                                                                <div class="form-control-feedback">
                                                                                        <i class="icon-user-lock text-muted"></i>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                             
                                                                
                                                            </div>
                                                            <div class="row">
                                                                
                                                                <div class="col">
                                                                    
                                                                    <button class="btn btn-lg btn-success">Update User</button>
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                          
							</form>
							</div>
						</div>
                                                
					</div>
            
            
   