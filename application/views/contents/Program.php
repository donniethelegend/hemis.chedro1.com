

<!-- Page content -->
        <script type="text/javascript">
        $(document).ready(function(){
            
            $('div.page-content').scrollspy({ target: '.sidebar' });

            
         
        })
        
$(document).ready(function() {
    // Get the 'sy' parameter from the URL
   function getSyFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('sy'); // Extract 'sy' from query string
    }
    
    var sy = getSyFromURL();
    // Initialize DataTable
    var table = $('#program_list_dt').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo site_url('SSPProgram/get_data'); ?>",
            "type": "GET",
            "data": function(d) {
                d.sy = sy; // Pass 'sy' parameter dynamically from JavaScript
            }
        },
        "columns": [
            { "data": 0 }, // #
            { "data": 1 }, // UII
            { "data": 2 }, // Institution Name
            { "data": 3 }, // Program Name
            { "data": 4 }, // Program Major
            { "data": 5 }, // Level
            { "data": 6 }, // Discipline
            { "data": 7 }, // Permit
            { "data": 8 }, // Status Code
            { "data": 9 }, // Remarks
            { "data": 10, "orderable": false } // Action (no sorting)
        ],
        "order": [[1, "asc"]], // Default sorting by UII
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]], // Page size options
        "pageLength": 10 // Default page length
    });

    // Change URL and reload the table on button click
    $('.sy_tab').on('click', function() {
    
        var url = $(this).data('href');  // Get the URL from the 'data-href' attribute
        history.pushState(null, "", url);
        // Change the URL using pushState
        sy = getSyFromURL(); // Update 'sy' before reload
        
        // Reload the DataTable
        table.ajax.reload();
    });
   
    

$("#del_prog").on('shown.bs.modal', function(e){
    var ref = $(e.relatedTarget);
    //var row = ref.parents('tr')
    $(this).find('form').find('[name="programid"]').val(ref.data('pid'))
    
   $(this).find('.modal-body').text('You sure to delete prgram named "'+ref.data('pname')+'"')
   
$(document).ajaxComplete(function(event, xhr, settings) {
    var response = xhr.responseJSON;
    
    if(typeof response.action != 'undefined'){
        if(response.action=='refresh_table'){
           // row.remove()
             table.ajax.reload(null, false); // Reload DataTable without resetting pagination
        }
    }
    
});


})
    
    
    
    
    
});

$(document).on('click', '[data-toggle="modal"]', function() {
    
    var targetModal = $(this).data('target');  // Get the target modal ID from the data-target attribute
    $(targetModal).show('toggle');  // Show the modal
});

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
								
                                                                
                                                                	<div class="tab-content">
                                                                    
                                                                     <?php 
                                                                     $sy = isset($_GET['sy'])?$_GET['sy']:"-";
                                                                     
                                                                     foreach($yearlist as $y){ 
                                                                   
                                                                     
								echo '	<div class="tab-pane  '. (base64_encode($y->datayear)==$sy?" show active ":"") .'" id="'.base64_encode($y->datayear).'">'
                                                                        . '<div class="page-title">
									<h5>
										<i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Program</span> - '.$y->datayear.'
										<small class="d-block text-muted">List of Academic Year '.$y->datayear.' Programs</small>
									</h5>
								</div>'
                                                                        . '</div>';
                                                                
                                                                     } ?>
								</div>
                                                                
							</div>

							<div class="card-body">
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            <ul class="nav nav-tabs nav-tabs-highlight">
                                                                
                                                                <?php
                                                                
                                                                
                                                                foreach($yearlist as $y){ ?>
                                                                <li class="nav-item"><a href="#<?= base64_encode($y->datayear) ?>" data-href="<?= base_url()."programs?sy=".base64_encode($y->datayear) ?>" class="sy_tab nav-link <?= base64_encode($y->datayear)==$sy?"active":'' ?>" 
                                                                                                data-toggle="tab"><?= $y->datayear ?></a></li>
									
                                                                <?php } ?>
								</ul>

							
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            

                                                         <table id="program_list_dt" class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>UII</th>
                                                                                    <th>Institution Name</th>
                                                                                    <th>Program Name</th>
                                                                                    <th>Program Major</th>
                                                                                    <th>Level</th>
                                                                                    <th>Discipline</th>
                                                                                    <th>Permit</th>
                                                                                    <th>Status Code</th>
                                                                                    <th>Remarks</th>
                                                                                    
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
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
        <div id="del_prog" class="modal fade " tabindex="-1" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<h6 class="modal-title">Confirm to delete program</h6>
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>
							<div class='modal-body'>
							</div>

							

							<div class="modal-footer">
                                                            <form action='<?= base_url()?>programs/delete'>
                                                                <input class='d-none' name='programid' >
                                                                
								<button type="button" class="btn btn-link" data-dismiss="modal">No</button>
								<button type="submit" class="btn bg-danger">Confirm</button>
                                                            </form>
							</div>
						</div>
					</div>
				</div>
