

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


						
					
                                                
                                                <div class="card  " id="program_details">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >Program</h5> 
							</div>

							<div class="card-body">
                                                            
                                                            <script>
                                                            $(document).ready(function(){
                                                                $("#prgrams").DataTable()
                                                                
                                                            })
                                                            </script>
                                                            
                                                            <table id="prgrams" class="table table-hover">
                                                                <thead>
                                                                      <tr>
                                                                      <th>
                                                                        CO DB No.
                                                                    </th>
                                                                    <th>
                                                                        instcode
                                                                    </th>
                                                                    <th>
                                                                        HEI Type
                                                                    </th>
                                                                    <th>
                                                                        instname
                                                                    </th>
                                                                    <th>
                                                                        Degree
                                                                    </th>
                                                                    <th>
                                                                        Program
                                                                    </th>
                                                                    <th>
                                                                        Major
                                                                    </th>
                                                                    <th>
                                                                        Status
                                                                    </th>
                                                                  
                                                                    <th>
                                                                        Remarks
                                                                    </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                    
                                                                    foreach($programs as $p){
                                                                        echo "<tr>";
                                                                        echo "<td>".$p->order_number."</td>";
                                                                        echo "<td>".$p->instcode."</td>";
                                                                        echo "<td>".$p->heitype."</td>";
                                                                        echo "<td>".$p->instname."</td>";
                                                                        echo "<td>".$p->degree_type."</td>";
                                                                        echo "<td>".$p->progname."</td>";
                                                                        echo "<td>".$p->major."</td>";
                                                                        echo "<td>".$p->prog_status."</td>";
                                                                        echo "<td>".$p->prog_remarks."</td>";
                                                                        echo "</tr>";
                                                                        
                                                                        
                                                                    }
                                                                    
                                                                    
                                                                    
                                                                    ?>
                                                                    
                                                                </tbody>
                                                                
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
