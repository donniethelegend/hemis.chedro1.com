	 
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
                                                                        
                                                                        <a href="<?= base_url()?>register"><span class="icon-user-plus"></span> Add User</a>
                                                                    </div>
                                                                </div>
							</div>

							<div class="card-body">
                                                            
                                                            

									<div class="table-responsive mb-3">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th style="width: 4%;">Id</th>
													<th >Name</th>
													<th >Username</th>
													<th >Email</th>
													<th >Level</th>
													<th >Status</th>
													<th >isReset?</th>
													<th >Action</th>
													
												</tr>
											</thead>
											<tbody>
                                                                                            
                                                                                            <?php 
                                                                                            foreach($userlist as $row){
                                                                                                
                                                                                                echo '<tr>
													<td>'.$row->id.'</td>
													<td>'.$row->name.'</td>
													<td>'.$row->username.'</td>
													<td>'.$row->email.'</td>
													<td>'.$row->user_level.'</td>
													<td>'.$row->status.'</td>
													<td>'.($row->change_pass==0?"Yes":"No").'</td>
													<td><a href="'. base_url().'accountmanager/updateuser_page/'.$row->id.'"><span class="icon-pencil"></span> <a></td>
												</tr>';
                                                                                                
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
            
            
   