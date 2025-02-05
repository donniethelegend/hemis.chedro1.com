
	<!-- Page content -->
        <script type="text/javascript">
        $(document).ready(function(){
            
            $('div.page-content').scrollspy({ target: '.sidebar' });
         
         
    
         
        })
        

        </script>
        
        
                                                            <style>
                                                                /* General table styling */
table.checksform {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    font-size: 9px;
    
}


table.checksform , th, td {
    border: 1px solid #d0d7de; 
}


table.checksform > thead > tr:not(:first-child) > th {
    background-color: #e0e6f8;
    color: #333;
    font-weight: bold;
    text-align: center;
}


table.checksform>tbody td {
    padding: 8px;
    text-align: center; 
    vertical-align: middle;
}
table.checksform>thead td {
    padding: 8px;
    text-align: center; 
    vertical-align: middle;
}


table.checksform>tbody tr:nth-child(even) {
    background-color: #f9fafb;
}


table.checksform>tbody tr:hover {
    background-color: #f0f6ff;
}


table.checksform>tbody td.numeric {
    text-align: right;
}


table.checksform>thead>tr:first-child>th {
border: 1px solid #d0d7de; 
text-align: center;
padding:8px;
}
table.checksform > thead tr:nth-child(2) th {
    font-size: 16px;
    background-color: #d3d3d3;
    text-align: center;
}


table.checksform > thead > tr:not(:first-child)>th[rowspan] {
    vertical-align: middle;
}


table.checksform>tbody td.total {
    font-weight: bold;
    background-color: #eef2ff; 
}


table.checksform>tbody>tr>td.selected {
    background-color: #cce5ff;
    border: 2px solid #007bff;
}


                                                            </style>
	<div class="page-content "   data-spy="scroll" data-target=".sidebar" >

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
                  
			<div class="content " >
                            

				<!-- Inner container -->
				<div class="d-flex w-md-auto align-items-start flex-column flex-md-row" >

				
                                    <div class="order-2 order-md-2 col" style='width: 69%' >


						
						<!-- Sticky -->
                                                <div class="card  " id="profileinfo">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >
                                                                    NON SUC eForms BC  
                                                                    
                                                                    <?php 
                                                                       if ($check_dbrowdata->status === "PENDING") {
                                                                    echo "<b class=bg-primary>FOR VALIDATION</b>";
                                                                } else if ($check_dbrowdata->status === "DISAPPROVED") {
                                                                    echo "<b class=bg-danger>SUBJECT FOR RESUBMISSION</b>";
                                                                } else if ($check_dbrowdata->status === "APPROVED") {
                                                                   echo "<b class=bg-success>VALIDATED</b>";
                                                                }
                                                                    
                                                                    ?>
                                                                    
                                                                </h5> 
								
                                                                      <div class="btn-group">
			                    	<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left dropdown-toggle" data-toggle="dropdown"><b><i class="icon-list-unordered"></i></b> Action</button>
			                    	<div class="dropdown-menu dropdown-menu-right">
										<a href="#" data-toggle="modal" data-target="#modal_validateconsolidate" class="dropdown-item"><i class="icon-stack-check"></i> Consolidate and Mark as Validated</a>
										<a href="#" data-toggle="modal" data-target="#modal_reject"  class="dropdown-item"><i class="icon-warning22"></i> Request for Resubmission</a>
                                                                                <a href="<?= base_url().'eform/'. urlencode(base64_encode($check_dbrowdata->uploaded_file)) ?>" target="_blank"  class="dropdown-item"><i class="icon-download"></i> Download Form</a>
										
									</div>
								</div>
                                                                        
                                                         
                                                                
							</div>

							<div class="card-body">
                                                            
                                                   
                                                                   <h6 id ='heiname'> 
                                                                  
                                                                </h6>
                                                              
                                                                    <script>
                                                                                        $(document).ready(function(){
                                                                                            $.getJSON(site_url()+'Hei/hei_jsondata/' + <?= $check_dbrowdata->instcode ?>, function(data){
                                                                                              $("#heiname").text(data[0].instname)
                                                                                            })
                                                                                        });
                                                                    </script>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
						
							<div  class=" table col-md-12 overflow-auto border-1  content-wrapper "  >
                                                            
                                                   
                                                        

    
    <table class="checksform " >
        <thead >
             <tr>
            <th colspan="1" rowspan="1"></th>
            <th  colspan="1" rowspan="1">A</th>
            <th  colspan="1" rowspan="1">B</th>
            <th  colspan="1" rowspan="1">C</th>
            <th  colspan="1" rowspan="1">D</th>
            <th  colspan="1" rowspan="1">E</th>
            <th  colspan="1" rowspan="1">F</th>
            <th  colspan="1" rowspan="1">G</th>
            <th  colspan="1" rowspan="1">H</th>
            <th  colspan="1" rowspan="1">I</th>
            <th  colspan="1" rowspan="1">J</th>
            <th  colspan="1" rowspan="1">K</th>
            <th  colspan="1" rowspan="1">L</th>
            <th  colspan="1" rowspan="1">M</th>
            <th  colspan="1" rowspan="1">N</th>
            <th  colspan="1" rowspan="1">O</th>
            <th  colspan="1" rowspan="1">P</th>
            <th  colspan="1" rowspan="1">Q</th>
            <th  colspan="1" rowspan="1">R</th>
            <th  colspan="1" rowspan="1">S</th>
            <th  colspan="1" rowspan="1">T</th>
            <th  colspan="1" rowspan="1">U</th>
            <th  colspan="1" rowspan="1">V</th>
            <th  colspan="1" rowspan="1">W</th>
            <th  colspan="1" rowspan="1">X</th>
            <th  colspan="1" rowspan="1">Y</th>
            <th  colspan="1" rowspan="1">Z</th>
            <th  colspan="1" rowspan="1">AA</th>
            <th  colspan="1" rowspan="1">AB</th>
            <th  colspan="1" rowspan="1">AC</th>
            <th  colspan="1" rowspan="1">AD</th>
            <th  colspan="1" rowspan="1">AE</th>
            <th  colspan="1" rowspan="1">AF</th>
            <th  colspan="1" rowspan="1">AG</th>
            <th  colspan="1" rowspan="1">AH</th>
            <th  colspan="1" rowspan="1">AI</th>
            <th  colspan="1" rowspan="1">AJ</th>
            <th  colspan="1" rowspan="1">AK</th>
            <th  colspan="1" rowspan="1">AL</th>
            <th  colspan="1" rowspan="1">AM</th>
            
            </tr>
        <tr >
             <td colspan="1" rowspan="1">1</td>
            <th colspan="39"><?= $form_values[0]['A']?></th>
        </tr>
        <tr >
             <td colspan="1" rowspan="1">2</td>
            <th colspan="39"><?= $form_values[1]['A']?></th>
        </tr>
        <tr >
             <td colspan="1" rowspan="1">3</td>
            <th colspan="39"></th>
        </tr>
        <tr >
             <td colspan="1" rowspan="1">4</td>
            <th colspan="4" rowspan="2"><?= $form_values[3]['A']?></th>
            <th colspan="1" rowspan="4"><?= $form_values[3]['E']?></th>
            <th colspan="2" rowspan="3"><?= $form_values[3]['F']?></th>
            <th colspan="3" rowspan="3"><?= $form_values[3]['H']?></th>
            <th colspan="1" rowspan="4"><?= $form_values[3]['K']?></th>
            <th colspan="2" rowspan="3"><?= $form_values[3]['L']?></th>
            <th colspan="1" rowspan="4"><?= $form_values[3]['N']?></th>
            <th colspan="1" rowspan="4"><?= $form_values[3]['O']?></th>
            <th colspan="1" rowspan="4"><?= $form_values[3]['P']?></th>
            <th colspan="1" rowspan="4"><?= $form_values[3]['Q']?></th>
            <th colspan="19" rowspan="1"><?= $form_values[3]['R']?></th>
            <th colspan="3" rowspan="1"><?= $form_values[3]['AK']?></th>
        </tr>
        <tr>
            <td colspan="1" rowspan="1">5</td>
            <th colspan="19" rowspan="1"><?= $form_values[4]['R']?></th>
            <th colspan="3" rowspan="1"><?= $form_values[4]['AK']?></th>
        </tr>
        <tr>
          <td colspan="1" rowspan="1">6</td>
            <th colspan="1" rowspan="1"><?= $form_values[5]['A']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[5]['B']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[5]['C']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[5]['D']?></th>
            <th colspan="2" rowspan="1"><?= $form_values[5]['R']?></th>
            <th colspan="2" rowspan="1"><?= $form_values[5]['T']?></th>
            <th colspan="2" rowspan="1"><?= $form_values[5]['V']?></th>
            <th colspan="2" rowspan="1"><?= $form_values[5]['X']?></th>
            <th colspan="2" rowspan="1"><?= $form_values[5]['Z']?></th>
            <th colspan="2" rowspan="1"><?= $form_values[5]['AB']?></th>
            <th colspan="2" rowspan="1"><?= $form_values[5]['AD']?></th>
            <th colspan="2" rowspan="1"><?= $form_values[5]['AF']?></th>
            <th colspan="2" rowspan="1"><?= $form_values[5]['AH']?></th>
            <th colspan="1" rowspan="2"><?= $form_values[5]['AJ']?></th>
            <th colspan="1" rowspan="2"><?= $form_values[5]['AK']?></th>
            <th colspan="1" rowspan="2"><?= $form_values[5]['AL']?></th>
            <th colspan="1" rowspan="2"><?= $form_values[5]['AM']?></th>
        </tr>
        <tr>
          <td colspan="1" rowspan="1">7</td>
            <th colspan="4" rowspan="1"><?= $form_values[6]['A']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['F']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['G']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['H']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['I']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['J']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['L']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['M']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['R']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['S']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['T']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['U']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['V']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['W']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['X']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['Y']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['Z']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['AA']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['AB']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['AC']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['AD']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['AE']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['AF']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['AG']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['AH']?></th>
            <th colspan="1" rowspan="1"><?= $form_values[6]['AI']?></th>

        </tr>
        <tr>
          <td colspan="1" rowspan="1">8</td>
            <th colspan="39" rowspan="1"></th>
 

        </tr>
        <tr>
          <td colspan="1" rowspan="1">9</td>
            <th colspan="39" rowspan="1"><?= $form_values[8]['A']?></th>
 

        </tr>
        </thead>
        <tbody>
            <?php 
            
           $startRow = 10;

            foreach($form_values as $index => $row){
                if($index + 1 >= $startRow) { // Since $index starts from 0, we use $index + 1
                    
                      if (count(array_filter($row)) === 0) {
                            continue; // Skip this iteration if the row is empty
                        }
                        
                        if(is_numeric($row['AH'])){
                        $AH =  $row['AH'];
                            if($AH==0){
                            $AH_style ="bg-warning";
                            $AH_tooltip = "data-popup='tooltip' title='The HEI Input is Zero(0), this is system auto calculation.'";
                            $AH = intval($row['R'])+intval($row['T'])+intval($row['V'])+intval($row['X'])+intval($row['Z'])+intval($row['AB'])+intval($row['AD'])+intval($row['AF']);
                            }
                            else{
                            $AH_tooltip = "data-popup='tooltip' title='Its not auto calculated from sheet.'";    
                            $AH_style ="bg-danger"; 
                            }
                        }else{
                            $AH_style = "";
                            $AH = intval($row['R'])+intval($row['T'])+intval($row['V'])+intval($row['X'])+intval($row['Z'])+intval($row['AB'])+intval($row['AD'])+intval($row['AF']);
                            $AH_tooltip = "";
                        }
                        if(is_numeric($row['AI'])){
                        $AI =  $row['AI'];
                            if($AI==0){
                            $AI_style ="bg-warning";
                            $AI_tooltip = "data-popup='tooltip' title='The HEI Input is Zero(0), this is system auto calculation.'";
                            $AI =intval($row['S'])+intval($row['U'])+intval($row['W'])+intval($row['Y'])+intval($row['AA'])+intval($row['AC'])+intval($row['AE'])+intval($row['AG']);
                            }
                            else{
                            $AI_tooltip = "data-popup='tooltip' title='Its not auto calculated from sheet.'";    
                            $AI_style ="bg-danger"; 
                            }
                        }else{
                            $AI_style = "";
                            $AI =intval($row['S'])+intval($row['U'])+intval($row['W'])+intval($row['Y'])+intval($row['AA'])+intval($row['AC'])+intval($row['AE'])+intval($row['AG']);
                            $AI_tooltip = "";
                        }
                        if(is_numeric($row['AJ'])){
                        $AJ =  $row['AJ'];
                            if($AJ==0){
                            $AJ_style ="bg-warning";
                            $AJ_tooltip = "data-popup='tooltip' title='The HEI Input is Zero(0), this is system auto calculation.'";
                            $AJ =intval($AI)+intval($AH);
                            }
                            else{
                            $AJ_tooltip = "data-popup='tooltip' title='Its not auto calculated from sheet.'";    
                            $AJ_style ="bg-danger"; 
                            }
                        }else{
                            $AJ_style = "";
                            $AJ =intval($AI)+intval($AH);
                            $AJ_tooltip = "";
                        }
                        
                        
            ?>     
            <tr>
                <td colspan="1" rowspan="1"><?= ($index+1)?></td>
            <td colspan="1" rowspan="1" class="<?= $row['A']?$row['A']:"bg-danger" ?>"><?= $row['A']?></td>
            <td colspan="1" rowspan="1" class="<?= $row['B']?$row['B']:"bg-danger" ?>"><?= $row['B']?></td>
            <td colspan="1" rowspan="1"><?= $row['C']?></td>
            <td colspan="1" rowspan="1" class="<?php echo  $row['C']?($row['D']?$row['D']:"bg-danger"):"" ?>"><?= $row['D']?></td>
            <td colspan="1" rowspan="1"><?= $row['E']?></td>
            <td colspan="1" rowspan="1"><?= $row['F']?></td>
            <td colspan="1" rowspan="1"><?= $row['G']?></td>
            <td colspan="1" rowspan="1" class="<?= $row['H']?$row['H']:"bg-danger" ?>"><?= $row['H']?></td>
            <td colspan="1" rowspan="1" class="<?= $row['I']?$row['I']:"bg-danger" ?>"><?= $row['I']?></td>
            <td colspan="1" rowspan="1" class="<?= $row['J']?$row['J']:"bg-danger" ?>"><?= $row['J']?></td>
            <td colspan="1" rowspan="1"><?= $row['K']?></td>
            <td colspan="1" rowspan="1"><?= $row['L']?></td>
            <td colspan="1" rowspan="1"><?= $row['M']?></td>
            <td colspan="1" rowspan="1"><?= $row['N']?></td>
            <td colspan="1" rowspan="1"><?= $row['O']?></td>
            <td colspan="1" rowspan="1"><?= $row['P']?></td>
            <td colspan="1" rowspan="1"><?= $row['Q']?></td>
            <td colspan="1" rowspan="1"><?= $row['R']?></td>
            <td colspan="1" rowspan="1"><?= $row['S']?></td>
            <td colspan="1" rowspan="1"><?= $row['T']?></td>
            <td colspan="1" rowspan="1"><?= $row['U']?></td>
            <td colspan="1" rowspan="1"><?= $row['V']?></td>
            <td colspan="1" rowspan="1"><?= $row['W']?></td>
            <td colspan="1" rowspan="1"><?= $row['X']?></td>
            <td colspan="1" rowspan="1"><?= $row['Y']?></td>
            <td colspan="1" rowspan="1"><?= $row['Z']?></td>
            <td colspan="1" rowspan="1"><?= $row['AA']?></td>
            <td colspan="1" rowspan="1"><?= $row['AB']?></td>
            <td colspan="1" rowspan="1"><?= $row['AC']?></td>
            <td colspan="1" rowspan="1"><?= $row['AD']?></td>
            <td colspan="1" rowspan="1"><?= $row['AE']?></td>
            <td colspan="1" rowspan="1"><?= $row['AF']?></td>
            <td colspan="1" rowspan="1"><?= $row['AG']?></td>
            <td colspan="1" rowspan="1" class="<?= $AH_style ?>"><?= $AH ?></td>
            <td colspan="1" rowspan="1" class="<?= $AI_style ?>"><?= $AI ?></td>
            <td colspan="1" rowspan="1" class="<?= $AJ_style ?>"><?= $AJ ?></td>
            <td colspan="1" rowspan="1"><?= $row['AK']?></td>
            <td colspan="1" rowspan="1"><?= $row['AL']?></td>
            <td colspan="1" rowspan="1"><?= intval($row['AK'])+intval($row['AL']) ?></td>
            </tr>
            
             <?php   
            }
            }
            
            
            ?>
        </tbody>
        
        
        
        
    </table>
    
    



                                                            
                                                            
                                                        </div>
                                                 
                                                            
                                                     
                                                   
                                                            
                                                            
                                                       <br/>     
                                                            
                                         <ul class="nav nav-tabs nav-tabs-top border-bottom-0">
                                               <?php
                                                      
                                                      foreach ($sheetnames as $sheetIndex => $sheetName) {
                                                                      
                                                        
                                                                        echo '<li class="nav-item"><a href="'.base_url().'Checks_Attachment/NONSUCeFormsBC/'.$checkid.'/'.$sheetIndex.'" class="nav-link '.($sheetName==$currentsheet?"active":"").'" >'.$sheetName.'</a></li>';
                                                                    
                                                      }
                                                      
                                                      ?>      
                                                           
                                             
                                             
									
									
								</ul>                   
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                       <b> REMARKS:</b>
                                                       <p>
                                                           <?= $check_dbrowdata->remarks?>
                                                       </p>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
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

        
        <div id="modal_reject" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Remarks/Suggestions</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

                                                    <form action="<?= base_url()?>checks/reject_check/<?= urlencode(base64_encode($checkid)) ?>/<?php echo urlencode(base64_encode(base_url(uri_string()))) ?>"
                                                                                                          method="post" >
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>CHECK ID</label>
												<input type="text" name="checkid" readonly value="<?= $checkid?>" class="form-control">
											</div>
											<div class="col-sm-6">
												<label>INSTITUTION ID</label>
												<input type="text" name="checkid" readonly value="<?= $check_dbrowdata->instcode?>" class="form-control">
											</div>

											
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>Remarks/Suggestions</label>
                                                                                                <textarea required style="height: 500px" 
                                                                                                          
                                                                                                          placeholder="Remarks/Suggestions" 
                                                                                                          name="remarks" class="form-control"><?= $check_dbrowdata->remarks?></textarea>
											</div>

											
										</div>
									</div>

									
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" class="btn bg-primary">Submit form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
        
        
        
        
        
        
        <div id="modal_validateconsolidate" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Consolidating Please Wait...</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

                                                    <form action="<?= base_url()?>Checks_Attachment/NONSUCeFormsBC_consolidate/<?= $checkid ?>/<?php echo urlencode(base64_encode(base_url(uri_string()))) ?>"
                                                                                                          method="post" >
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>CHECK ID</label>
												<input type="text" name="checkid" readonly value="<?= $checkid?>" class="form-control">
											</div>
											<div class="col-sm-6">
												<label>INSTITUTION ID</label>
												<input type="text" name="checkid" readonly value="<?= $check_dbrowdata->instcode?>" class="form-control">
											</div>

											
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
											
                                                                                           This process will be consolidate all sheet of this form.
                                                                                           <br/>
                                                                                           Empty Program will not be imported.
                                                                                           
											</div>

											
										</div>
									</div>

									
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn bg-primary">Consolidate Form</button>
								</div>
							</form>
						</div>
					</div>
				</div>