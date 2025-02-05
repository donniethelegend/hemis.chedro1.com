

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
								<h5 class="card-title" >Program Details</h5> 
							</div>

							<div class="card-body">
                                                            
                                                            <form action='<?= base_url() ?>programs/update/<?= $Program[0]->programid ?>'>                                                            
                                                           
     
     <div class="row">
     <div class="col-9">
     
     
            <div class="row">
            <div class="col-2">                                                           
               <div class="form-group">
                <label for="datayear">Data Year</label>
                <input type="text" class="form-control" readonly id="datayear"  value="<?= $Program[0]->datayear ?>">
            </div>
            </div>
    
            <div class="col-2">
                 <div class="form-group">
                <label for="instcode">Institution Code</label>
                <input type="text" class="form-control" id="instcode" readonly  value="<?= $Program[0]->instcode ?>">
            </div>
            </div>
            <div class="col-4">
                   <div class="form-group">
                <label for="supervisor">Supervisor</label>
                <input type="text" class="form-control" id="supervisor" name="supervisor" value="<?= $Program[0]->supervisor ?>">
            </div>
            </div>
                
                
                
            </div>

           

         

             <div class="row">
                 
            <div class="col-2">    
            <div class="form-group">
                <label for="programlevel">Program Level</label>
                <input type="text" class="form-control" id="programlevel" name="programlevel" value="<?= $Program[0]->programlevel ?>">
            </div>
            </div>
                 
                    <div class="col-2">    
                <div class="form-group">
                    <label for="discipline">Discipline Code</label>
                    <input type="text" class="form-control" id="discipline" name="discipline" value="<?= $Program[0]->discipline ?>">
                </div>
                </div>
            <div class="col-5">    
                    <div class="form-group">
                <label for="discipline2">Discipline Description</label>
                <input type="text" class="form-control" id="discipline2" name="discipline2" value="<?= $Program[0]->discipline2 ?>">
            </div>
                </div>
            </div>
                 
             <div class="row">
                 
        
            <div class="col-1">    
           <div class="form-group">
                <label for="mpcode">MP Code</label>
                <input type="text" class="form-control" id="mpcode" name="mpcode" value="<?= $Program[0]->mpcode ?>">
            </div>
            </div>
                 
                 
            <div class="col-4">    
            <div class="form-group">
                <label for="mainprogram">Main Program</label>
                <input type="text" class="form-control" id="mainprogram" name="mainprogram" value="<?= $Program[0]->mainprogram ?>">
            </div>
            </div>
                 
                 
                 
        
                <div class="col-1">  
                     <div class="form-group">
                            <label for="mjcode">MJ Code</label>
                            <input type="text" class="form-control" id="mjcode" name="mjcode" value="<?= $Program[0]->mjcode ?>">
                        </div>
                </div>
                <div class="col-4">  
                    <div class="form-group">
                        <label for="major">Major</label>
                        <input type="text" class="form-control" id="major" name="major" value="<?= $Program[0]->major ?>">
                    </div>
                </div>
            </div>

      
            

        
    <div class="row">
                 
            <div class="col-2">
            <div class="form-group">
                <label for="thesisdisert">Thesis/Dissertation</label>
                <input type="text" class="form-control" id="thesisdisert" name="thesisdisert" value="<?= $Program[0]->thesisdisert ?>">
            </div>
            </div>
    <div class="col-2">
            <div class="form-group">
                <label for="pstatuscode">Program Status Code</label>
                <input type="text" class="form-control" id="pstatuscode" name="pstatuscode" value="<?= $Program[0]->pstatuscode ?>">
            </div>
            </div>

            <div class="col-2">
            <div class="form-group">
                <label for="pstatyear">Program Stattus Year</label>
                <input type="text" class="form-control" id="pstatyear" name="pstatyear" value="<?= $Program[0]->pstatyear ?>">
            </div>
            </div>
            </div>

     
          <div class="row">
                 
            <div class="col-2">

            <div class="form-group">
                <label for="pmcode">Program Mode</label>
                <input type="text" class="form-control" id="pmcode" name="pmcode" value="<?= $Program[0]->pmcode ?>">
            </div>
            </div>
            <div class="col-2">

            <div class="form-group">
                <label for="pmif">Program Mode (if OT)</label>
                <input type="text" class="form-control" id="pmif" name="pmif" value="<?= $Program[0]->pmif ?>">
            </div>
            </div>
          

            
            <div class="col-2">
            <div class="form-group">
                <label for="nlyears">Normal Length in Years</label>
                <input type="text" class="form-control" id="nlyears" name="nlyears" value="<?= $Program[0]->nlyears ?>">
            </div>
            </div>
            </div>
<div class="row">
                 
            <div class="col-2">

            <div class="form-group">
                <label for="pcredit">Program Credit</label>
                <input type="text" class="form-control" id="pcredit" name="pcredit" value="<?= $Program[0]->pcredit ?>">
            </div>
            </div>

           
                       <div class="col-2">

            <div class="form-group">
                <label for="tuitionperunit">Tuition per Unit</label>
                <input type="text" class="form-control" id="tuitionperunit" name="tuitionperunit" value="<?= $Program[0]->tuitionperunit ?>">
            </div>
            </div>

                       <div class="col-2">

            <div class="form-group">
                <label for="programfee">Program Fee</label>
                <input type="text" class="form-control" id="programfee" name="programfee" value="<?= $Program[0]->programfee ?>">
            </div>
            </div>
       
            </div>
         <div class="row">
                 
            <div class="col-2">
            <div class="form-group">
                <label for="authcat">Legal Basis</label>
                <input type="text" class="form-control" id="authcat" name="authcat" value="<?= $Program[0]->authcat ?>">
            </div>
            </div>

                 
            <div class="col-2">
            <div class="form-group">
                <label for="authserial">Legal Basis No.</label>
                <input type="text" class="form-control" id="authserial" name="authserial" value="<?= $Program[0]->authserial ?>">
            </div>
            </div>
            <div class="col-2">
           <div class="form-group">
                <label for="authyear">Series</label>
                <input type="text" class="form-control" id="authyear" name="authyear" value="<?= $Program[0]->authyear ?>">
            </div>
            </div>
            </div>
         
            <div class="row">
            <div class="col-8">

   <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea  class="form-control" id="remarks" name="remarks" ><?= $Program[0]->remarks ?></textarea>
            </div>
            </div>
            </div>

 </div>
         
           <div class="col-3">
               
                   
                                                                <div class="row">
                                                                       <div class="col-12">
                                                                           <h6>Enrollment Data</h6>
                                                                       </div>
                                                                </div>
                                                                <div class="row">
                                                                    
                                                                    <div class="col-12">
                                                                        
                                                                         <label>New Student</label>
                                                                    <div class="row">
                                                                                         <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Male" name="newstudm" value="<?= $Program[0]->newstudm ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-man"></i>
													</div>
												</div>
                                                                                             
                                                                        </div>
                                                                        <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Female" name="newstudf" value="<?= $Program[0]->newstudf ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-woman"></i>
													</div>
												</div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    </div>
                                                                    </div>
                                                               <div class="row">
                                                                    
                                                                    <div class="col-12">
                                                                        
                                                                         <label>Old Student</label>
                                                                    <div class="row">
                                                                                         <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Male" name="oldstudm" value="<?= $Program[0]->oldstudm ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-man"></i>
													</div>
												</div>
                                                                                             
                                                                        </div>
                                                                        <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Female" name="oldstudf" value="<?= $Program[0]->oldstudf ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-woman"></i>
													</div>
												</div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    </div>
                                                                    </div>
                                                            
                                                             <div class="row">
                                                                    
                                                                    <div class="col-12">
                                                                        
                                                                         <label>Second Year Student</label>
                                                                    <div class="row">
                                                                                         <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Male" name="secondm" value="<?= $Program[0]->secondm ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-man"></i>
													</div>
												</div>
                                                                                             
                                                                        </div>
                                                                        <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Female" name="secondf" value="<?= $Program[0]->secondf ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-woman"></i>
													</div>
												</div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    </div>
                                                                    </div>
               
                                                               
               <div class="row">
                                                                    
                                                                    <div class="col-12">
                                                                        
                                                                         <label>Third Year Student</label>
                                                                    <div class="row">
                                                                                         <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Male" name="thirdm" value="<?= $Program[0]->thirdm ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-man"></i>
													</div>
												</div>
                                                                                             
                                                                        </div>
                                                                        <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Female" name="thirdf" value="<?= $Program[0]->thirdf ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-woman"></i>
													</div>
												</div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    </div>
                                                                    </div>
               <div class="row">
                                                                    
                                                                    <div class="col-12">
                                                                        
                                                                         <label>Fourth Year Student</label>
                                                                    <div class="row">
                                                                                         <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Male" name="fourthm" value="<?= $Program[0]->fourthm ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-man"></i>
													</div>
												</div>
                                                                                             
                                                                        </div>
                                                                        <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Female" name="fourthf" value="<?= $Program[0]->fourthf ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-woman"></i>
													</div>
												</div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    </div>
                                                                    </div>
               <div class="row">
                                                                    
                                                                    <div class="col-12">
                                                                        
                                                                         <label>Fifth Year Student</label>
                                                                    <div class="row">
                                                                                         <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Male" name="fifthm" value="<?= $Program[0]->fifthm ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-man"></i>
													</div>
												</div>
                                                                                             
                                                                        </div>
                                                                        <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Female" name="fifthf" value="<?= $Program[0]->fifthf ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-woman"></i>
													</div>
												</div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    </div>
                                                                    </div>
               <div class="row">
                                                                    
                                                                    <div class="col-12">
                                                                        
                                                                         <label>Sixth Year Student</label>
                                                                    <div class="row">
                                                                                         <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Male" name="sixthm" value="<?= $Program[0]->sixthm ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-man"></i>
													</div>
												</div>
                                                                                             
                                                                        </div>
                                                                        <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Female" name="sixthf" value="<?= $Program[0]->sixthf ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-woman"></i>
													</div>
												</div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    </div>
                                                                    </div>
               <div class="row">
                                                                    
                                                                    <div class="col-12">
                                                                        
                                                                         <label>Seventh Year Student</label>
                                                                    <div class="row">
                                                                                         <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Male" name="seventhm" value="<?= $Program[0]->seventhm ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-man"></i>
													</div>
												</div>
                                                                                             
                                                                        </div>
                                                                        <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Female" name="seventhf" value="<?= $Program[0]->seventhf ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-woman"></i>
													</div>
												</div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    </div>
                                                                    </div>
               
                 <div class="row">
                                                                    
                                                                    <div class="col-12">
                                                                        
                                                                         <label>Graduate</label>
                                                                    <div class="row">
                                                                                         <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Male" name="gradm" value="<?= $Program[0]->gradm ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-man"></i>
													</div>
												</div>
                                                                                             
                                                                        </div>
                                                                        <div class="col-6">
                                                                                                <div class="form-group form-group-feedback form-group-feedback-left">
													<input type="text" class="form-control form-control-sm" placeholder="Female" name="gradf" value="<?= $Program[0]->gradf ?>">
													<div class="form-control-feedback form-control-feedback-sm">
														<i class="icon-woman"></i>
													</div>
												</div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    </div>
                                                                    </div>

                                                            </div>
                                                            </div>
       
                    
                                                     <button type="submit" class="btn btn-primary">
                                                         <span class="icon-floppy-disk"></span>&nbsp;&nbsp;Save Program
                                                     </button>
                                                   </form>
                                                            
                                                            
                                                            
                                                            
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
