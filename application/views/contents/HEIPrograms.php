

<!-- Page content -->
        <script type="text/javascript">
        $(document).ready(function(){
            
            $('div.page-content').scrollspy({ target: '.sidebar' });
         
    $("#programdatatable").DataTable();
    
    
    $('.datayear_change').change(function(){
        
        var value = $(this).val();
        window.location.replace("<?= base_url() ?>hei/view_programs/<?= $insticode ?>/"+value)
        
    })
    
         
        })
        

        </script>
           <?php  $history_size = sizeof($profile_details)-1 ?>
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
								<h5 class="card-title" >Institution Profile
                                                                </h5> 
							    
							</div>

							<div class="card-body">
                                                            
    <div class="row">
    <div class="col-6">
            <ul class="list list-unstyled mb-0">
                <li>Institution Code: <span class="font-weight-semibold"><?= $profile_details[$history_size]->instcode ?></span></li>
                <li>Institution Name: <span class="font-weight-semibold"><?= $profile_details[$history_size]->instname ?></span></li>
                <li>Form of Ownership: <span class="font-weight-semibold"><?= $profile_details[$history_size]->instformownership ?></span></li>
                <li>Institution Type: <span class="font-weight-semibold"><?= $profile_details[$history_size]->insttype ?></span></li>
                <li>Institution Type 2: <span class="font-weight-semibold"><?= $profile_details[$history_size]->insttype2 ?></span></li>
                <li>HEI Type: <span class="font-weight-semibold"><?= $profile_details[$history_size]->heitype ?></span></li>
                <li>Street: <span class="font-weight-semibold"><?= $profile_details[$history_size]->street ?></span></li>
                <li>Municipality: <span class="font-weight-semibold"><?= $profile_details[$history_size]->municipality ?></span></li>
                <li>Province 1: <span class="font-weight-semibold"> <?= $profile_details[$history_size]->province1 ?></span></li>
                <li>Province 2: <span class="font-weight-semibold">   <?= $profile_details[$history_size]->province2 ?></span></li>
                <li>Region: <span class="font-weight-semibold">   <?= $profile_details[$history_size]->region ?></span></li>
                <li>Postal Code:  <span class="font-weight-semibold">    <?= $profile_details[$history_size]->postalcode ?></span></li>
                <li>Institution Telephone: <span class="font-weight-semibold"> <?= $profile_details[$history_size]->insttel ?></span></li>
                <li>Institution Fax:  <span class="font-weight-semibold">  <?= $profile_details[$history_size]->instfax ?></span></li>
                <li>Telephone (Head): <span class="font-weight-semibold"> <?= $profile_details[$history_size]->insttelhead ?></span></li>
                <li>Email: <span class="font-weight-semibold">   <?= $profile_details[$history_size]->email ?></span></li>
               
            </ul>    
        </div>                                                
                                                            
    <div class="col-6">
            <ul class="list list-unstyled mb-0">
           <li>Website: <span class="font-weight-semibold"> <?= $profile_details[$history_size]->website ?></span></li>
                <li>Established Year: <span class="font-weight-semibold">  <?= $profile_details[$history_size]->established ?></span></li>
                <li>SEC Registration: <span class="font-weight-semibold"> <?= $profile_details[$history_size]->sec ?></span></li>
                <li>Year Approved: <span class="font-weight-semibold"> <?= $profile_details[$history_size]->yearapproved ?></span></li>
                <li>Converted to College Year: <span class="font-weight-semibold"> <?= $profile_details[$history_size]->tocollege ?></span></li>
                <li>Converted to University Year: <span class="font-weight-semibold"> <?= $profile_details[$history_size]->touniversity ?></span></li>
                <li>Title of Head: <span class="font-weight-semibold"><?= $profile_details[$history_size]->titlehead ?></span></li>
                <li>Institution Head:  <span class="font-weight-semibold"><?= $profile_details[$history_size]->insthead ?></span></li>
                <li>Highest Education (Head): <span class="font-weight-semibold"> <?= $profile_details[$history_size]->highesteduchead ?></span></li>
                <li>Latitude: <span class="font-weight-semibold"><?= $profile_details[$history_size]->latitude ?></span></li>
                <li>Longitude: <span class="font-weight-semibold"> <?= $profile_details[$history_size]->longtitude ?></span></li>
                <li>HEI Status: <span class="font-weight-semibold"> <?= $profile_details[$history_size]->hei_status ?> </span></li>
                <li>Remarks: <span class="font-weight-semibold"> <?= $profile_details[$history_size]->hei_remarks ?></span></li>
            </ul> 
        <br/>
        <br/>
        <br/>
        <a href="<?= base_url() ?>hei/view_profile/<?= $insticode?>"
            class="btn btn-success btn-lg"> Update Institution</a>
        </div>                                                
        </div>                                                   
                                                            
                                           
         
                
          
              
        
               
           
          
           
                                                            
							</div>
						</div>
						
                                                
                                                <div class="card  " id="institution_programs">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >Program Offerings
                                                                </h5> 
								
						
                                                                
							</div>

							<div class="card-body">
                                                            
                                                          
                                                      <div class="row">
                                                      <div class="col-10">
                                                          <div class="row">
                                                              
                                                              <div class="col-2">
                                                                  <label>Data Year:</label>
                                                                  <select class="form-control datayear_change">
                                                                      <?php 
                                                                        foreach($schoolyear as $v){
                                                                            echo "<option ".($v->data_year==$selectedSY?"selected":"")." value='$v->data_year'>$v->data_year</option>";
                                                                            
                                                                        }
                                                                      
                                                                      ?>
                                                                  </select>
                                                              </div>
                                                              
                                                          </div>
                                                          
                                                                        <table id="programdatatable"  >
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>Data Year</th>
                                                                                    <th>Program Level</th>
                                                                                    <th>Program Name</th>
                                                                                    <th>Major</th>
                                                                                    <th>Discipline</th>
                                                                                    <th>Program Status</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                            
                                                                                  <?php 
                                                            
                                                            
                                                        foreach($program_offerings as $key => $v){
                                                            
                                                            
                                                                echo "<tr>";
                                                                echo "<td>".($key+1)."</td>";
                                                                echo "<td>".$v->datayear."</td>";
                                                                echo "<td>".$v->programlevel."</td>";
                                                                echo "<td>".$v->mainprogram."</td>";
                                                                echo "<td>".$v->major."</td>";
                                                                echo "<td>".$v->discipline2."</td>";
                                                                echo "<td>".$v->pstatuscode."</td>";
                                                                echo "<td>"
                                                             
                                                                . "<a class='btn btn-link icon-folder-open' href='".base_url()."hei/program_details/$v->programid' ></a>"
                                                                        . "</td>";
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                            
                                                                            </tbody>
                                                                        </table>
                                                            
                                                            
							</div>
							</div>
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
