
<div id="modal_updatestatus" class="modal fade show" tabindex="-1" >
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Small modal</h5>
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>

							<div class="modal-body">
							<form action="<?= base_url()?>checks/updateSubmissionStatus" method="post">
                                                            <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Institution Code:</label><input class="form-control readonly" name="instcode" readonly="readonly" required/>
                                                                   
                                                                </div>
                                                                </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>AY:</label><input class="form-control readonly" name="ssyy" readonly="readonly" required/>
                                                                   
                                                                </div>
                                                                </div>
                                                        
                                                        </div>
                                                            <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Status: </label><br/>
                                                                    <label><input type="radio" class="radio" value="nosubmission" name="iscomplete"/>&nbsp;No Submission</label><br/>
                                                                    <label><input type="radio" class="radio" value="incomplete" name="iscomplete"/>&nbsp;Incomplete</label><br/>
                                                                    <label><input type="radio" class="radio" value="complete" name="iscomplete"/>&nbsp;Complete</label>
                                                                    
                                                                </div>
                                                                </div>
                                                        
                                                        </div>
                                                            <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Remarks:</label><textarea class="form-control " name="remarks" ></textarea>
                                                                   
                                                                </div>
                                                                </div>
                                                        
                                                        </div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-primary">Save changes</button>
							</div>
                                                            
						</form>
						</div>
					</div>
				</div>
				</div>
	<!-- Page content -->
        <script type="text/javascript">
        $(document).ready(function(){
            
           
            
            $('#modal_updatestatus').on('show.bs.modal',function(e){
                var s = $(e.relatedTarget );
                var modal = $(this)
                var instcode = s.data('instcode');
                var re = s.data('remarks');
                var ay = $('#ayyyy').val();
                modal.find('[name="instcode"]').val(instcode);
                
            if (s.data('iscomplete') == "complete") {
                modal.find('[name="iscomplete"][value="complete"]').prop("checked", true);
            } else  if (s.data('iscomplete') == "nosubmission") {
                modal.find('[name="iscomplete"][value="nosubmission"]').prop("checked", true); // Update the value accordingly
            
            } else {
                modal.find('[name="iscomplete"][value="incomplete"]').prop("checked", true); // Update the value accordingly
            }
                
                modal.find('[name="ssyy"]').val(ay);
                modal.find('[name="remarks"]').text("");
                modal.find('[name="remarks"]').text(re);
                
                
                
            })
            
             var aydef = new Date().getFullYear();
             
             setInterval(function(){
                 var val =  $('#ayyyy').val();
                   loadChecksForms(val);
                 
             }, 3000)
             
             
               loadChecksForms((aydef-1)+"-"+(aydef));
               
               
                 $('.acadyear').click(function(){
     var ay = $(this).data('ay');
          $('.aymuted').find('#ayyyy').val(ay)
   $('#top10program').find('tbody').html(
                                '<tr><td colspan=4><i class="icon-spinner2 spinner"></i> Loading data...</td></tr>'                    
                                )
         loadChecksForms(ay);
    })
    
    
     var formatNumber =  function(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
    
      function loadChecksForms(ay){
    
    var totalHEI  = 0 ;
    var totalINC  = 0 ;
    var totalC  = 0 ;
    var totalNS  = 0 ;
        $.ajax({
                    method: "POST",
                    url: site_url()+"Dashboard/heiSubmissions/",
                    data: [{name:"ay",value:ay}],
                    cache: false,
                    dataType: "json",
                  
                     success: function(xhr){
                         var tablebody =  $('#top10program').find('tbody').empty();
                         
                       
                         
                         
                         
                        $.each(xhr,function(i,v){
                            totalHEI++
                            if(v.status2=="complete"){
                                totalC++;
                            }
                            if(v.status2=="incomplete"){
                                totalINC++;
                            }
                            if(v.status2=="nosubmission"){
                                totalNS++;
                            }
                            tablebody.append(
                                                                            '<tr>'+
                                                                    '<td>'+v.instcode+'</td>'+
                                                                    '<td>'+v.instname+'</td>'+
                                                                    '<td>'+v.heitype+'</td>'+
                                                                    '<td>'+v.A+'</td>'+
                                                                    '<td>'+v.BBC+'</td>'+
                                                                    '<td>'+v.E1+'</td>'+
                                                                    '<td>'+v.E2+'</td>'+
                                                                    '<td>'+v.E5+'</td>'+
                                                                    '<td>'+v.GH+'</td>'+
                                                                    '<td>'+v.reasearchExtension+'</td>'+
                                                                    '<td>'+v.listofgrad+'</td>'+
                                                                    '<td>'+v.status+'</td>'+
                                                                    '<td>'+v.remarks+'</td>'+
										
										'</tr>'
                                        )
                            
                        })
                        
                        $('.nosubmissionlbl').text(totalNS+" ("+((totalNS/totalHEI)*100).toFixed(2)+"%)")
                        $('.incompletelbl').text(totalINC+" ("+((totalINC/totalHEI)*100).toFixed(2)+"%)")
                        $('.completelbl').text(totalC+" ("+((totalC/totalHEI)*100).toFixed(2)+"%)")
                        $('.totalHEIlbl').text(totalHEI)
                        

                    }
            }

                )
    
    }
      
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
						

						
                                                  
							<div class="card-header header-elements-inline align-top">
							<div class="header-elements-horizontal">	
							<div class="row">	
                                                            <div class="col">
                                                            <h2 class="card-title" >
                                                             CHECKS STATUS
                                                           
                                                                </h2> 
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="text-muted font-size-sm aymuted"> Academic Year <input class="border-0 readonly" id="ayyyy" value="2023-2024"> </div>
							
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="text-muted font-size-sm "> Complete: <label class="completelbl"></label>  </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="text-muted font-size-sm "> Incomplete:  <label class="incompletelbl"></label>  </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="text-muted font-size-sm "> No Submission:<label class="nosubmissionlbl"></label>  </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="text-muted font-size-sm "> Total HEI: <label class="totalHEIlbl"></label> </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        
                                                            <div class="list-icons ml-3 ">
				                		<div class="list-icons-item dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu">
                                                                                            
                                                                                            
												
												
                                                                                                  <?php 
                                                                                                    $yearstart = 2023;
                                                                                                    $currentyear = date("Y");
                                                                                                 
                                                                                                    for($yearstart;$yearstart<=$currentyear;$yearstart++){
                                                                                                        
                                                                                                        echo '<a  data-ay="'.$yearstart."-".($yearstart+1)
                                                                                                                .'" class="dropdown-item acadyear"> '.($yearstart."-".($yearstart+1)).'</a>';
                                                                                                    
                                                                                                    }
                                                                                                    ?>
											</div>
				                		</div>
				                	</div>
                                                                
							</div>

            <div class="card-body p-1">
                    
    <div class="table-responsive">
        
      
								<table class="table  table-sm " id="top10program">
									<thead>
										<tr>
											<th>Instcode</th>
											<th>HEI</th>
											<th>Type</th>
											<th>FORM A</th>
											<th>FORM B/FORM BC</th>
                                                                                        <th>FORM E1</th>
                                                                                        <th>FORM E2</th>
                                                                                        <th>FORM E5</th>
                                                                                        <th>FORM GH</th>
                                                                                        <th>Research/ Extension</th>
                                                                                        <th>PRC List of Graduates</th>
                                                                                        <th>Status</th>
                                                                                        <th>Remarks</th>
											
										</tr>
									</thead>
									<tbody>
                                                                            <tr>
                                                                                <td>Loading Data...</td>
										
											
										</tr>
                                                                   
                                                                            
										
                                                                                
                                                                                
                                                                                

									</tbody>
								</table>
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
