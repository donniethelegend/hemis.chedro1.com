	 
          <script src="<?= base_url()?>js/components_buttons.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>

          <script src="<?= base_url()?>global_assets/js/demo_pages/charts/google/pies/pie_3d.js"></script>
	<script src="<?= base_url()?>global_assets/js/demo_pages/charts/google/pies/3d_exploded.js"></script>     
<div class="order-2 order-md-2 col" >


						
						<!-- Sticky -->
						<div class="card  " id="profileinfo">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >Account Manager</h5> 
								
								<div class="header-elements">
                                                                    <div class="list-icons">
                                                                        
                                                                        <a href="#" ><span class="icon-user-plus"></span> Add User</a>
                                                                    </div>
                                                                </div>
							</div>

							<div class="card-body">
                                                            
                                                     
                                                            <form class="form-horizontal">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>Institution Code/Username:</label><?= $mydata->username ?>
                                                                        </div>            
                                                                    </div>
                                                                    </div>
                                                                   <div class="row">
                                                                    <div class="col-2">
                                                                        <div class="form-group">
                                                                            <label>Old Password:</label>
                                                                            <input class="form-control" name="oldpassword" type="password" placeholder="Old Password" />
                                                                            
                                                                         </div>            
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <div class="form-group">
                                                                            <label>New Password:</label>
                                                                            <input class="form-control" name="newpassword" type="password" placeholder="Password" />
                                                                            
                                                                         </div>            
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <div class="form-group">
                                                                            <label>Account Email:</label>
                                                                            <input class="form-control" name="email" type="text" placeholder="Email" value="<?= $mydata->email?>" />
                                                                            
                                                                         </div>            
                                                                    </div>
                                                                </div>
                                                                </form>

								
                                                            
                                                            
                                                            
									
							</div>
						</div>
                                                
						<div class="card  " id="profiledirector">
							<div class="card-header header-elements-inline">
                                                            <h5 class="card-title" >HEMIS Focal Director&nbsp;<small><i>(List the HEMIS Focal contact person / registrar)</i></small></h5> 
								
								<div class="header-elements">
                                                                    <div class="list-icons">
                                                                        
                                                                        <a href="#" onclick="alert('this will be modal');"><span class="icon-user-plus"></span> Add Focal</a>
                                                                    </div>
                                                                </div>
							</div>

							<div class="card-body">
                                                            
                                                    
                                               
									<div class="table-responsive mb-3">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th style="width: 4%;">Id</th>
													<th >Fullname</th>
													<th >Designation</th>
													<th >Email</th>
													<th >Contact No.</th>
													
												</tr>
											</thead>
											<tbody>
                                                                                            
                                                                                        <?php 
                                                   foreach($contactlist as $v){
                                                       
                                                       echo "<tr>";
                                                       echo "<td>".$v->id."</td>";
                                                       echo "<td>".$v->fullname."</td>";
                                                       echo "<td>".$v->designation."</td>";
                                                       echo "<td>".$v->email."</td>";
                                                       echo "<td>".$v->contactno."</td>";
                                                       echo "</tr>";
                                                   }
                                                     ?>
												
												
											</tbody>
										</table>
									</div>
                                                            
                                                            
                                                            
									
							</div>
						</div>
                                                
                                                <!-- Comment here
						<div class="card  " id="checkstatus">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >Check Status</h5>
								<div class="header-elements">
                                                                    <div class="list-icons">
                                                                            <a class="list-icons-item" data-action="collapse"></a>
                                                                    </div>
                                                                </div>
							</div>

							<div class="card-body">

									<div class="table-responsive mb-3">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th style="width: 20%;">Option</th>
													<th style="width: 20%;">Default value</th>
													<th>Description</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><code>parent</code></td>
													<td>closest parent</td>
													<td>The element will be the parent of the sticky item. The dimensions of the parent control when the sticky element bottoms out. Can be a selector</td>
												</tr>
												<tr>
													<td><code>inner_scrolling</code></td>
													<td><code>true</code></td>
													<td>Boolean to enable or disable the ability of the sticky element to scroll independently of the scrollbar when it’s taller than the viewport</td>
												</tr>
												<tr>
													<td><code>sticky_class</code></td>
													<td><code>.is_stuck</code></td>
													<td>The name of the CSS class to apply to elements when they have become stuck</td>
												</tr>
												<tr>
													<td><code>offset_top</code></td>
													<td>N/A</td>
													<td>Offsets the initial sticking position by of number of pixels, can be either negative or positive</td>
												</tr>
												<tr>
													<td><code>spacer</code></td>
													<td>own spacer</td>
													<td>Either a selector to use for the spacer element, or <code>false</code> to disable the spacer. The selector is passed to closest, so you should nest the sticky element within the spacer</td>
												</tr>
												<tr>
													<td><code>bottoming</code></td>
													<td><code>true</code></td>
													<td>Boolean to control whether elements bottom out</td>
												</tr>
												<tr>
													<td><code>recalc_every</code></td>
													<td>Never</td>
													<td>Integer specifying that a recalc should automatically take place between that many ticks. A tick takes place on every scroll event</td>
												</tr>
											</tbody>
										</table>
									</div>
							</div>
						</div>
						<div class="card  " id="announcement">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >Announcement</h5>
								<div class="header-elements">
                                                                    <div class="list-icons">
                                                                            <a class="list-icons-item" data-action="collapse"></a>
                                                                    </div>
                                                                </div>
							</div>

							<div class="card-body">

									<div class="table-responsive mb-3">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th style="width: 20%;">Option</th>
													<th style="width: 20%;">Default value</th>
													<th>Description</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><code>parent</code></td>
													<td>closest parent</td>
													<td>The element will be the parent of the sticky item. The dimensions of the parent control when the sticky element bottoms out. Can be a selector</td>
												</tr>
												<tr>
													<td><code>inner_scrolling</code></td>
													<td><code>true</code></td>
													<td>Boolean to enable or disable the ability of the sticky element to scroll independently of the scrollbar when it’s taller than the viewport</td>
												</tr>
												<tr>
													<td><code>sticky_class</code></td>
													<td><code>.is_stuck</code></td>
													<td>The name of the CSS class to apply to elements when they have become stuck</td>
												</tr>
												<tr>
													<td><code>offset_top</code></td>
													<td>N/A</td>
													<td>Offsets the initial sticking position by of number of pixels, can be either negative or positive</td>
												</tr>
												<tr>
													<td><code>spacer</code></td>
													<td>own spacer</td>
													<td>Either a selector to use for the spacer element, or <code>false</code> to disable the spacer. The selector is passed to closest, so you should nest the sticky element within the spacer</td>
												</tr>
												<tr>
													<td><code>bottoming</code></td>
													<td><code>true</code></td>
													<td>Boolean to control whether elements bottom out</td>
												</tr>
												<tr>
													<td><code>recalc_every</code></td>
													<td>Never</td>
													<td>Integer specifying that a recalc should automatically take place between that many ticks. A tick takes place on every scroll event</td>
												</tr>
											</tbody>
										</table>
									</div>
							</div>
						</div>
						<div class="card  " id="accountsetting">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >Account Settings</h5>
								<div class="header-elements">
                                                                    <div class="list-icons">
                                                                            <a class="list-icons-item" data-action="collapse"></a>
                                                                    </div>
                                                                </div>
							</div>

							<div class="card-body">
<div class="table-responsive mb-3">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th style="width: 20%;">Option</th>
													<th style="width: 20%;">Default value</th>
													<th>Description</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><code>parent</code></td>
													<td>closest parent</td>
													<td>The element will be the parent of the sticky item. The dimensions of the parent control when the sticky element bottoms out. Can be a selector</td>
												</tr>
												<tr>
													<td><code>inner_scrolling</code></td>
													<td><code>true</code></td>
													<td>Boolean to enable or disable the ability of the sticky element to scroll independently of the scrollbar when it’s taller than the viewport</td>
												</tr>
												<tr>
													<td><code>sticky_class</code></td>
													<td><code>.is_stuck</code></td>
													<td>The name of the CSS class to apply to elements when they have become stuck</td>
												</tr>
												<tr>
													<td><code>offset_top</code></td>
													<td>N/A</td>
													<td>Offsets the initial sticking position by of number of pixels, can be either negative or positive</td>
												</tr>
												<tr>
													<td><code>spacer</code></td>
													<td>own spacer</td>
													<td>Either a selector to use for the spacer element, or <code>false</code> to disable the spacer. The selector is passed to closest, so you should nest the sticky element within the spacer</td>
												</tr>
												<tr>
													<td><code>bottoming</code></td>
													<td><code>true</code></td>
													<td>Boolean to control whether elements bottom out</td>
												</tr>
												<tr>
													<td><code>recalc_every</code></td>
													<td>Never</td>
													<td>Integer specifying that a recalc should automatically take place between that many ticks. A tick takes place on every scroll event</td>
												</tr>
											</tbody>
										</table>
									</div>
									
							</div>
						</div>
						<-->
					</div>
            
            
   