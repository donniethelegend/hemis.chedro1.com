
<script>
$(document).ready(function(){
    var aydef = new Date().getFullYear();
    $("#ays").html((aydef-1)+"-"+(aydef))
            loadTop10least((aydef-1)+"-"+(aydef)); //default will be load the current year
            loadTop10((aydef-1)+"-"+(aydef)); //default will be load the current year
            heicategory((aydef-1)+"-"+(aydef)); //default will be load the current year
            province((aydef-1)+"-"+(aydef)); //default will be load the current year
            loadprograms(); //default will be load the current year
    $('.acadyear').click(function(){
     var ay = $(this).data('ay');
        

         loadTop10(ay);
    })
    $('.acadyeard').click(function(){
     var ay = $(this).data('ay');
        

         loadTop10least(ay);
    })
    $('.acadyearh').click(function(){
     var ay = $(this).data('ay');
        

         heicategory(ay);
    })
    $('.acadyearp').click(function(){
     var ay = $(this).data('ay');
        

         province(ay);
    })
    $('.acadyearspec').click(function(){
     var ay = $(this).data('ay');

        $("#ays").html(ay)
         var val  = $('.selectprogram').val()
        loadSelectedProgram(ay,val)
    })
    
    $('.selectprogram').on('change', function() {
    // Get the selected option’s value
    var selectedValue = $(this).val();
     var ay = $("#ays").text()
    
       
    loadSelectedProgram(ay,selectedValue)

    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   var formatNumber =  function(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
    
function loadSelectedProgram(ay,val){
    
    
        $.ajax({
                    method: "POST",
                    url: site_url()+"Dashboard/selectedProgram/"+ay,
                    data: {
            program: val  // Send selected value as data
        },
                    cache: false,
                    dataType: "json",
                    beforeSend:
                        function(){
                         
                            $('#programSpectab').find('tbody').html(
                                '<tr><td colspan=4><i class="icon-spinner2 spinner"></i> Loading data...</td></tr>'                    
                                )
                            
                        }
                    ,
                     success: function(xhr){
                         var tablebody =  $('#programSpectab').find('tbody').empty();
                         
                         
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
                                    '                <a  class="text-default font-weight-semibold letter-icon-title">'+v.mainprogram+'</a>'+
                                   
                                  '                  </div>'+
                                 '                   </div>'+
                                '</td>'+
                                '<td>'+
                                        '<span class="text-muted font-size-sm">'+formatNumber(v.emale)+'</span>'+
										'	</td>'+
										'	<td>'+
										'		<span class="text-muted font-size-sm">'+formatNumber(v.efemale)+'</span>'+
										'	</td>'+
										
										'	<td>'+
										'		<h6 class="font-weight-semibold mb-0">'+formatNumber(v.total)+'</h6>'+
										'	</td>'+
										'</tr>'
                                        )
                            
                        })

                    }
            }

                )
    
    }
function province(ay){
    
    
        $.ajax({
                    method: "POST",
                    url: site_url()+"Dashboard/Enrollment_Province/",
                    data: [{name:"ay",value:ay}],
                    cache: false,
                    dataType: "json",
                    beforeSend:
                        function(){
                         
                            $('#byprovince').find('tbody').html(
                                '<tr><td colspan=4><i class="icon-spinner2 spinner"></i> Loading data...</td></tr>'                    
                                )
                            
                        }
                    ,
                     success: function(xhr){
                         var tablebody =  $('#byprovince').find('tbody').empty();
                         
                         $('.aymutedp').text("Academic Year "+ay)
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
                                    '                <a  class="text-default font-weight-semibold letter-icon-title">'+v.province1+'</a>'+
                                   
                                  '                  </div>'+
                                 '                   </div>'+
                                '</td>'+
                                '<td>'+
                                        '<span class="text-muted font-size-sm">'+formatNumber(v.emale)+'</span>'+
										'	</td>'+
										'	<td>'+
										'		<span class="text-muted font-size-sm">'+formatNumber(v.efemale)+'</span>'+
										'	</td>'+
										
										'	<td>'+
										'		<h6 class="font-weight-semibold mb-0">'+formatNumber(v.total)+'</h6>'+
										'	</td>'+
										'</tr>'
                                        )
                            
                        })

                    }
            }

                )
    
    }
function heicategory(ay){
    
    
        $.ajax({
                    method: "POST",
                    url: site_url()+"Dashboard/Enrollment_HEICategory/",
                    data: [{name:"ay",value:ay}],
                    cache: false,
                    dataType: "json",
                    beforeSend:
                        function(){
                         
                            $('#heicategory').find('tbody').html(
                                '<tr><td colspan=4><i class="icon-spinner2 spinner"></i> Loading data...</td></tr>'                    
                                )
                            
                        }
                    ,
                     success: function(xhr){
                         var tablebody =  $('#heicategory').find('tbody').empty();
                         
                         $('.aymutedh').text("Academic Year "+ay)
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
                                    '                <a  class="text-default font-weight-semibold letter-icon-title">'+v.heitype+'</a>'+
                                   
                                  '                  </div>'+
                                 '                   </div>'+
                                '</td>'+
                                '<td>'+
                                        '<span class="text-muted font-size-sm">'+formatNumber(v.emale)+'</span>'+
										'	</td>'+
										'	<td>'+
										'		<span class="text-muted font-size-sm">'+formatNumber(v.efemale)+'</span>'+
										'	</td>'+
										
										'	<td>'+
										'		<h6 class="font-weight-semibold mb-0">'+formatNumber(v.total)+'</h6>'+
										'	</td>'+
										'</tr>'
                                        )
                            
                        })

                    }
            }

                )
    
    }
    
function loadTop10(ay){
    
    
        $.ajax({
                    method: "POST",
                    url: site_url()+"Dashboard/top10_program_public/",
                    data: [{name:"ay",value:ay}],
                    cache: false,
                    dataType: "json",
                    beforeSend:
                        function(){
                         
                            $('#top10program').find('tbody').html(
                                '<tr><td colspan=4><i class="icon-spinner2 spinner"></i> Loading data...</td></tr>'                    
                                )
                            
                        }
                    ,
                     success: function(xhr){
                         var tablebody =  $('#top10program').find('tbody').empty();
                         
                         $('.aymuted').text("Academic Year "+ay)
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
                                    '                <a  class="text-default font-weight-semibold letter-icon-title">'+v.mainprogram+'</a>'+
                                   
                                  '                  </div>'+
                                 '                   </div>'+
                                '</td>'+
                                '<td>'+
                                        '<span class="text-muted font-size-sm">'+formatNumber(v.emale)+'</span>'+
										'	</td>'+
										'	<td>'+
										'		<span class="text-muted font-size-sm">'+formatNumber(v.efemale)+'</span>'+
										'	</td>'+
										
										'	<td>'+
										'		<h6 class="font-weight-semibold mb-0">'+formatNumber(v.total)+'</h6>'+
										'	</td>'+
										'</tr>'
                                        )
                            
                        })

                    }
            }

                )
    
    }
function loadTop10least(ay){
    
    
        $.ajax({
                    method: "POST",
                    url: site_url()+"Dashboard/top10_program_public_least/",
                    data: [{name:"ay",value:ay}],
                    cache: false,
                    dataType: "json",
                    beforeSend:
                        function(){
                         
                            $('#top10programd').find('tbody').html(
                                '<tr><td colspan=4><i class="icon-spinner2 spinner"></i> Loading data...</td></tr>'                    
                                )
                            
                        }
                    ,
                     success: function(xhr){
                         var tablebody =  $('#top10programd').find('tbody').empty();
                         
                         $('.aymutedd').text("Academic Year "+ay)
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
                                    '                <a  class="text-default font-weight-semibold letter-icon-title">'+v.mainprogram+'</a>'+
                                   
                                  '                  </div>'+
                                 '                   </div>'+
                                '</td>'+
                                '<td>'+
                                        '<span class="text-muted font-size-sm">'+formatNumber(v.emale)+'</span>'+
										'	</td>'+
										'	<td>'+
										'		<span class="text-muted font-size-sm">'+formatNumber(v.efemale)+'</span>'+
										'	</td>'+
										
										'	<td>'+
										'		<h6 class="font-weight-semibold mb-0">'+formatNumber(v.total)+'</h6>'+
										'	</td>'+
										'</tr>'
                                        )
                            
                        })

                    }
            }

                )
    
    }
    
   var  programData = [];
function loadprograms(){



$.ajax({
    url: site_url() + "Dashboard/programlist", // Your API endpoint
    dataType: 'json',
    success: function (data) {
        programData = data.map(function(item) {
            return { id: item.mainprogram, text: item.mainprogram };
        });

        // Step 3: Initialize Select2 after data is fetched
        initializeSelect2();
    }
});

     
     
     
    
    }
    
    function initializeSelect2() {
    $('.selectprogram').select2({
        data: programData,
        minimumResultsForSearch: 0, // Set to 0 to ensure searching is enabled
        matcher: function(params, data) {
            if ($.trim(params.term) === '') {
                return data;
            }

            // Remove diacritics from the term and data text
            var term = params.term.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            var text = data.text.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");

            // Check if term is within text
            if (text.indexOf(term) > -1) {
                return data;
            }
            return null;
        }
    });
}
    
    
})


</script>

<div class="row " >
	<div class="col-md-5 " >
            <div class='row'>
                <div class='col-md-12'>
                          
	<div class="card  " >
							<div class="card-header header-elements-inline align-top">
							<div class="header-elements-horizontal">	
							<div class="row">	
                                                            <div class="col">
                                                            <h2 class="card-title" >
                                                              Top 10 Most Subscribed Program 
                                                           
                                                                </h2> 
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                            <div class="text-muted font-size-sm aymuted"> Academic Year 2023-2024</div>
							
                                                        </div>
                                                        </div>
                                                        </div>
                                                        
                                                            <div class="list-icons ml-3 ">
				                		<div class="list-icons-item dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu">
                                                                                            
                                                                                            
												
												
                                                                                                  <?php 
                                                                                                    $yearstart = 2018;
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
        
      
								<table class="table " id="top10program">
									<thead>
										<tr>
											<th class="w-100">Program/Course</th>
											<th>Male</th>
											<th>Female</th>
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
                
            </div>
            <div class='row'>
                <div class='col-md-12'>
                          
	<div class="card  " >
							<div class="card-header header-elements-inline align-top">
							<div class="header-elements-horizontal">	
							<div class="row">	
                                                            <div class="col">
                                                            <h2 class="card-title" >
                                                              Top 10 Least Subscribed Program 
                                                           
                                                                </h2> 
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                            <div class="text-muted font-size-sm aymutedd"> Academic Year 2023-2024</div>
							
                                                        </div>
                                                        </div>
                                                        </div>
                                                        
                                                            <div class="list-icons ml-3 ">
				                		<div class="list-icons-item dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu">
                                                                                            
                                                                                            
												
												
                                                                                                  <?php 
                                                                                                    $yearstart = 2018;
                                                                                                    $currentyear = date("Y");
                                                                                                 
                                                                                                    for($yearstart;$yearstart<=$currentyear;$yearstart++){
                                                                                                        
                                                                                                        echo '<a data-ay="'.$yearstart."-".($yearstart+1)
                                                                                                                .'" class="dropdown-item acadyeard"> '.($yearstart."-".($yearstart+1)).'</a>';
                                                                                                    
                                                                                                    }
                                                                                                    ?>
											</div>
				                		</div>
				                	</div>
                                                                
							</div>

            <div class="card-body p-1">
                    
    <div class="table-responsive">
        
      
								<table class="table " id="top10programd">
									<thead>
										<tr>
											<th class="w-100">Program/Course</th>
											<th>Male</th>
											<th>Female</th>
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
                
            </div>
                                                  
        </div>
        <div class='col-md-7'>
        <div class='row'>
            <div class="col-md-6 " >
	<div class="card h-100 " >
							<div class="card-header header-elements-inline align-top">
							<div class="header-elements-horizontal">	
							<div class="row">	
                                                            <div class="col">
                                                            <h2 class="card-title" >
                                                           Enrollment by Category
                                                           
                                                                </h2> 
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                            <div class="text-muted font-size-sm aymutedh"> Academic Year 2023-2024</div>
							
                                                        </div>
                                                        </div>
                                                        </div>
                                                        
                                                            <div class="list-icons ml-3 ">
				                		<div class="list-icons-item dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu">
                                                                                            
                                                                                            
												
												
                                                                                                  <?php 
                                                                                                    $yearstart = 2018;
                                                                                                    $currentyear = date("Y");
                                                                                                 
                                                                                                    for($yearstart;$yearstart<=$currentyear;$yearstart++){
                                                                                                        
                                                                                                        echo '<a  data-ay="'.$yearstart."-".($yearstart+1)
                                                                                                                .'" class="dropdown-item acadyearh"> '.($yearstart."-".($yearstart+1)).'</a>';
                                                                                                    
                                                                                                    }
                                                                                                    ?>
											</div>
				                		</div>
				                	</div>
                                                                
							</div>

            <div class="card-body p-1">
                    
    <div class="table-responsive">
        
      
								<table class="table " id="heicategory">
									<thead>
										<tr>
											<th class="w-100">HEI Category</th>
											<th>Male</th>
											<th>Female</th>
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
    <div class="col-md-6" >
            <div class="card h-100  " >
							<div class="card-header header-elements-inline align-top">
							<div class="header-elements-horizontal">	
							<div class="row">	
                                                            <div class="col">
                                                            <h2 class="card-title" >
                                                             Enrollment by Province
                                                           
                                                                </h2> 
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                            <div class="text-muted font-size-sm aymutedp"> Academic Year 2023-2024</div>
							
                                                        </div>
                                                        </div>
                                                        </div>
                                                        
                                                            <div class="list-icons ml-3 ">
				                		<div class="list-icons-item dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu">
                                                                                            
                                                                                            
												
												
                                                                                                  <?php 
                                                                                                    $yearstart = 2018;
                                                                                                    $currentyear = date("Y");
                                                                                                 
                                                                                                    for($yearstart;$yearstart<=$currentyear;$yearstart++){
                                                                                                        
                                                                                                        echo '<a data-ay="'.$yearstart."-".($yearstart+1)
                                                                                                                .'" class="dropdown-item acadyearp"> '.($yearstart."-".($yearstart+1)).'</a>';
                                                                                                    
                                                                                                    }
                                                                                                    ?>
											</div>
				                		</div>
				                	</div>
                                                                
							</div>

            <div class="card-body p-1">
                    
    <div class="table-responsive ">
        
      
								<table class="table  " id="byprovince">
									<thead>
										<tr>
											<th class="w-100">Province</th>
											<th>Male</th>
											<th>Female</th>
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
        </div>
            
            
            <div class='row'>
                <div class='col'> &nbsp
            </div>
            </div>
        <div class='row'>
            
            <div class="col-md-12" >
            <script src="<?= base_url()?>global_assets/js/plugins/forms/selects/select2.min.js"></script>


                                                        
        
        <div class="card  " >
							<div class="card-header header-elements-inline align-top">
							<div class="header-elements-horizontal">	
							<div class="row">	
                                                            <div class="col-md">
                                                            <h2 class="card-title" >
                                                              Filtered Program/s
                                                           
                                                                </h2> 
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="text-muted font-size-sm "> Academic Year <label id='ays'>2023-2024</label></div>
							
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                          <select data-placeholder="Filter Program" multiple="multiple" class="form-control  selectprogram" data-fouc>
										
									</select>
							
                                                        </div>
                                                        </div>
                                                        </div>
                                                        
                                                            <div class="list-icons ml-3 ">
				                		<div class="list-icons-item dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu">
                                                                                            
                                                                                            
												
												
                                                                                                  <?php 
                                                                                                    $yearstart = 2018;
                                                                                                    $currentyear = date("Y");
                                                                                                 
                                                                                                    for($yearstart;$yearstart<=$currentyear;$yearstart++){
                                                                                                        
                                                                                                        echo '<a  data-ay="'.$yearstart."-".($yearstart+1)
                                                                                                                .'" class="dropdown-item acadyearspec"> '.($yearstart."-".($yearstart+1)).'</a>';
                                                                                                    
                                                                                                    }
                                                                                                    ?>
											</div>
				                		</div>
				                	</div>
                                                                
							</div>

            <div class="card-body">
                    
    <div class="table-responsive">
        
      
								<table class="table  " id="programSpectab">
									<thead>
										<tr>
											<th class="w-100">Program</th>
											<th>Male</th>
											<th>Female</th>
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
        </div>
        </div>
	
	
        </div>


