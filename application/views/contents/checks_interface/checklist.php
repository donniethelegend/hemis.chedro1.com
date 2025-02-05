


<?php if(!isset($_GET['sy'])|| $_GET['sy']==""){
     redirect(base_url()."checks");
} ?>


<script>
    $(document).ready(function() {
        $('#hei_list_dt').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('SSPChecks/get_data').'?sy='.$_GET['sy'] ?>",
                "type": "GET"
            },
            "columnDefs": [
                { "visible": false, "targets": 5 },  // Hide the 4th column (index 3)
                { "orderData": [5], "targets": 5 }   // Use hidden column (instcode) to sort
            ],
            "order": [
                [ 4, 'desc' ]
                
               
                
            ]  // Default sort by hidden column in descending order
        });
    });
</script>

<div class="table-responsive">
    
     <table id="hei_list_dt" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>seq.</th>
                                                                                    <th>UII</th>
                                                                                    <th style="width: 30%">Institution Name</th>
                                                                                    <th>Type</th>
                                                                                    <th>eForms</th>
                                                                                    <th>date</th>
                                                                             
                                                                                </tr>
                                                                            </thead>
                                                                        </table>
    
</div>

