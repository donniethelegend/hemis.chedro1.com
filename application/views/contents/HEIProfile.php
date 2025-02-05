
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


						
						<!-- Sticky -->
						<div class="card  " id="profileinfo">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >Institution Profile
                                                                </h5> 
								
							
                                                                        
                                                                 <?php // var_dump($hei_list); ?>
                                                            
                                                                
							</div>

							<div class="card-body">
                                                            
                                                   
                                                                        
       <form class="form-horizontal">
           <div class="row">
           <div class="col-1">
               <?php  $history_size = sizeof($profile_details)-1 ?>
            <div class="form-group">
                <label for="instcode">Institution Code</label>
                <input type="text" readonly class="form-control" id="instcode" value="<?= $profile_details[$history_size]->instcode ?>" name="instcode">
            </div>
            </div>
          
           <div class="col-11">
            <div class="form-group">
                <label for="instname">Institution Name</label>
                <input type="text" class="form-control" id="instname" value="<?= $profile_details[$history_size]->instname ?>" name="instname">
            </div>
            </div>
         
            </div>

              <div class="row">
           <div class="col-3">
            <div class="form-group">
                <label for="instformownership">Form of Ownership</label>
                <input type="text" class="form-control" id="instformownership"  value="<?= $profile_details[$history_size]->instformownership ?>" name="instformownership">
            </div>
            </div>
  <div class="col-3">
            <div class="form-group">
                <label for="insttype">Institution Type</label>
                <input type="text" class="form-control" id="insttype" value="<?= $profile_details[$history_size]->insttype ?>" name="insttype">
            </div>
            </div>
  <div class="col-3">
            <div class="form-group">
                <label for="insttype2">Institution Type 2</label>
                <input type="text" class="form-control" id="insttype2" value="<?= $profile_details[$history_size]->insttype2 ?>" name="insttype2">
            </div>
            </div>
                    <div class="col-1">    
               <div class="form-group">
                <label for="heitype">HEI Type</label>
                <input type="text" class="form-control" id="heitype" value="<?= $profile_details[$history_size]->heitype ?>" name="heitype">
            </div>
            </div>
            </div>

           
     <div class="row">
           <div class="col-3">        
            <div class="form-group">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street" value="<?= $profile_details[$history_size]->street ?>"  name="street">
            </div>
            </div>
          
  <div class="col-2">        
         
            <div class="form-group">
                <label for="municipality">Municipality</label>
                <input type="text" class="form-control" id="municipality"  value="<?= $profile_details[$history_size]->municipality ?>" name="municipality">
            </div>
            </div>
  <div class="col-2">  
            <div class="form-group">
                <label for="province1">Province 1</label>
                <input type="text" class="form-control" id="province1" value="<?= $profile_details[$history_size]->province1 ?>" name="province1">
            </div>
            </div>
  <div class="col-2">  
            <div class="form-group">
                <label for="province2">Province 2</label>
                <input type="text" class="form-control" id="province2" value="<?= $profile_details[$history_size]->province2 ?>" name="province2">
            </div>
            </div>
             <div class="col-2"> 

            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" class="form-control" id="region" value="<?= $profile_details[$history_size]->region ?>" name="region">
            </div>
            </div>
         
   <div class="col-1"> 
            <div class="form-group">
                <label for="postalcode">Postal Code</label>
                <input type="text" class="form-control" id="postalcode"  value="<?= $profile_details[$history_size]->postalcode ?>"  name="postalcode">
            </div>
            </div>
            </div>

           
           
           
          <div class="row">
           <div class="col-2">    
           
            <div class="form-group">
                <label for="insttel">Institution Telephone</label>
                <input type="text" class="form-control" id="insttel"  value="<?= $profile_details[$history_size]->insttel ?>"  name="insttel">
            </div>
            </div>

                <div class="col-2">   
            <div class="form-group">
                <label for="instfax">Institution Fax</label>
                <input type="text" class="form-control" id="instfax"  value="<?= $profile_details[$history_size]->instfax ?>" name="instfax">
            </div>
            </div>
        
           
           
            <div class="col-2">  
            <div class="form-group">
                <label for="insttelhead">Telephone (Head)</label>
                <input type="text" class="form-control" id="insttelhead" value="<?= $profile_details[$history_size]->insttelhead ?>"  name="insttelhead">
            </div>
            </div>
           

            <div class="col-3">  
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"  value="<?= $profile_details[$history_size]->email ?>"  name="email">
            </div>
            </div>
           
            <div class="col-3">  
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" value="<?= $profile_details[$history_size]->website ?>" name="website">
            </div>
            </div>
            </div>

           
           
           
            <div class="row">
           <div class="col-2">   
            <div class="form-group">
                <label for="established">Established Year</label>
                <input type="text" class="form-control" id="established"  value="<?= $profile_details[$history_size]->established ?>"  name="established">
            </div>
            </div>
            <div class="col-3">   
            <div class="form-group">
                <label for="sec">SEC Registration</label>
                <input type="text" class="form-control" id="sec"  value="<?= $profile_details[$history_size]->sec ?>"  name="sec">
            </div>
            </div>
         
   <div class="col-2">   
            <div class="form-group">
                <label for="yearapproved">Year Approved</label>
                <input type="text" class="form-control" id="yearapproved"  value="<?= $profile_details[$history_size]->yearapproved ?>"  name="yearapproved">
            </div>
            </div>
     
           <div class="col-2">   
           
            <div class="form-group">
                <label for="tocollege">Converted to College Year</label>
                <input type="text" class="form-control" id="tocollege"  value="<?= $profile_details[$history_size]->tocollege ?>"  name="tocollege">
            </div>
            </div>

                   
                       <div class="col-2">   
            <div class="form-group">
                <label for="touniversity">Converted to University Year</label>
                <input type="text" class="form-control" id="touniversity" value="<?= $profile_details[$history_size]->touniversity ?>" name="touniversity">
            </div>
            </div>
            </div>

           
           
            <div class="row">
           <div class="col-2">
                  <div class="form-group">
                <label for="titlehead">Title of Head</label>
                <input type="text" class="form-control" id="titlehead" value="<?= $profile_details[$history_size]->titlehead ?>" name="titlehead">
            </div>
           </div>
           <div class="col-3"> 
            <div class="form-group">
                <label for="insthead">Institution Head</label>
                <input type="text" class="form-control" id="insthead" value="<?= $profile_details[$history_size]->insthead ?>" name="insthead">
            </div>
            </div>
            <div class="col-3">
                 <div class="form-group">
                <label for="highesteduchead">Highest Education (Head)</label>
                <input type="text" class="form-control" id="highesteduchead" value="<?= $profile_details[$history_size]->highesteduchead ?>" name="highesteduchead">
            </div>

            </div>
            </div>

         
   <div class="row">
           <div class="col-2">
           
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" id="latitude" value="<?= $profile_details[$history_size]->latitude ?>" name="latitude">
            </div>
            </div>
 <div class="col-2">
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" id="longitude" value="<?= $profile_details[$history_size]->longtitude ?>" name="longtitude">
            </div>
            </div>
            </div>

                   
   <div class="row">
           <div class="col-1">

            <div class="form-group">
                <label for="hei_status">HEI Status</label>
                <input type="text" class="form-control" id="hei_status" value="<?= $profile_details[$history_size]->hei_status ?>" name="hei_status">
            </div>
            </div>
       
           <div class="col-11">
            <div class="form-group">
                <label for="hei_remarks">Remarks</label>
                <input type="text" class="form-control" id="hei_remarks"  value="<?= $profile_details[$history_size]->hei_remarks ?>" name="hei_remarks">
            </div>
            </div>
            </div>
   <div class="row">
           <div class="col-1">

            <div class="form-group">
            <button type="submit" class="btn btn-primary "><span class="icon-floppy-disk"></span>&nbsp;&nbsp;Save Profile</button>
            </div>
            </div>
            </div>
        </form>
                                                            
            <div class="row">                                                   
            <div class="col-3">                                                   
            <div class="form-group">
                
            <a type="button" href="<?= base_url() ?>hei/view_programs/<?= $insticode?>" class="btn btn-success "><span class="icon-books"></span>&nbsp;&nbsp;View Programs</a>
            <a type="button" href="<?= base_url() ?>hei/view_enrollments/<?= $insticode?>" class="btn btn-success "><span class="icon-graduation"></span>&nbsp;&nbsp;View Enrollments</a>
                                                            
							</div>
							</div>
							</div>
							</div>
						</div>
						<div class="card  " id="profileinfo">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >Update History
                                                                </h5> 
								
							
                                                                        
                                                                 <?php // var_dump($hei_list); ?>
                                                            
                                                                
							</div>

							<div class="card-body">
                                                            
                                                      
                                                                        <table  style="width:50%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>UII</th>
                                                                                    <th>Institution Name</th>
                                                                                    <th>Type</th>
                                                                                    <th>Status</th>
                                                                                    <th>Date Updated</th>
                                                                                </tr>
                                                                            </thead>
                                                                            
                                                                            <tbody>
                                                                                <?php
                                                                                foreach($profile_details as $v){
                                                                                    echo "<tr>
                                                                                    <td>$v->heid</td>
                                                                                    <td>$v->instcode</td>
                                                                                    <td>$v->instname</td>
                                                                                    <td>$v->heitype</td>
                                                                                    <td>$v->hei_status</td>
                                                                                    <td>$v->date_added</td>
                                                                                </tr>";
                                                                                    
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
