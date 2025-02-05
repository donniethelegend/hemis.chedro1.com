
	<!-- Page content -->
        <script type="text/javascript">
        $(document).ready(function(){
             var aydef = new Date().getFullYear();
             
             setInterval(function(){
                 var val =  $('#ayyyy').val();
                   loadChecksForms(val);
                 
             }, 3000)
             
             
               loadChecksForms((aydef-1)+"-"+(aydef));
               
               
                 $('.acadyear').click(function(){
     var ay = $(this).data('ay');
        
   $('#top10program').find('tbody').html(
                                '<tr><td colspan=4><i class="icon-spinner2 spinner"></i> Loading data...</td></tr>'                    
                                )
         loadChecksForms(ay);
    })
    
    
     var formatNumber =  function(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
    
      function loadChecksForms(ay){
    
    
        $.ajax({
                    method: "POST",
                    url: site_url()+"Dashboard/checksSubmissions/",
                    data: [{name:"ay",value:ay}],
                    cache: false,
                    dataType: "json",
                  
                     success: function(xhr){
                         var tablebody =  $('#top10program').find('tbody').empty();
                         
                         $('.aymuted').find('#ayyyy').val(ay)
                         
                         
                         
                        $.each(xhr,function(i,v){
                            tablebody.append(
                            '<tr>'+
				'<td>'+
					'<div class="d-flex align-items-center">'+
                                       ' <div class="mr-3">'+
                                       ' <span class="btn bg-primary-400 rounded-round btn-icon btn-sm">'+
                                        '        <span class="letter-icon">'+(i+1)+'</span>'+
                                       '             </span>'+
                                      '              </div>'+
                                     '               <div>'+
                                    '                <a  class="text-default font-weight-semibold letter-icon-title">'+v.form_name+' ('+v.heitype2+')</a>'+
                                   
                                  '                  </div>'+
                                 '                   </div>'+
                                '</td>'+
                                                                                '<td>'+
                                                                                        '<span class="text-muted font-size-sm">'+formatNumber(v.pending)+'</span>'+
										'	</td>'+
										'	<td>'+
										'		<span class="text-muted font-size-sm">'+formatNumber(v.approved)+'</span>'+
										'	</td>'+
										
										'	<td>'+
										'		<h6 class="text-muted font-size-sm">'+formatNumber(v.disapproved)+'</h6>'+
										'	</td>'+
										'	<td>'+
										'		<h6 class="font-weight-semibold mb-0">'+formatNumber(v.total)+'/'+v.heicount+' ('+(((v.total/v.heicount)*100).toFixed(2))+'%)</h6>'+
										'	</td>'+
										'</tr>'
                                        )
                            
                        })

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
											<th >FORMS</th>
											<th>Pending</th>
											<th>Approved</th>
											<th>Subject for Resubmission</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
                                                                            
                                                                            
                                                                            
										
                                                                                
                                                                                
                                                                                

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
