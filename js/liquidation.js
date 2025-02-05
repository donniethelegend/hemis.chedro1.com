 $(document).ready(function(){
     
     //you can add checklist here
     var requirement_list_checklist = [
         {requirement:"LDDAP & SLIIE"},
         {requirement:"ORIGINAL RECEIPT"},
         {requirement:"ORS"},
         {requirement:"DV"},
         {requirement:"MOA"},
         {requirement:"BILLING STATEMENT (FIRST SEMESTER)"},
         {requirement:"NOTARIZED CERTIFICATION (FIRST SEMESTER)"},
         {requirement:"NOTARIZED MASTERLIST"},
         {requirement:"PEAC GENERATED FILE"},
         {requirement:"FORM 2 TES (FIRST SEMESTER)"},
         {requirement:"TES FORM 1"},
         {requirement:"TES FORM 2"},
         {requirement:"TES FORM 4"},
         {requirement:"TES FORM 5"},
         {requirement:"SUPPORTING DOCUMENTS - ADMINISTRATIVE COST"},
         {requirement:"NARRATIVE REPORT"},
         {requirement:"TES SHARING AGREEEMENT"},
         {requirement:"IDs"},
         {requirement:"1st TERM COR"}
     ]
     
     
     
    $(document).on('show.bs.modal', '#update_view', function (e) {

    // Extracting data attributes from the button that triggered the modal
    var button = $(e.relatedTarget);
    var id = button.data('id');

    // Reference to the modal
    var modal = $(this);

  


    // Make an AJAX request to get the content
    $.get('/UPDPSystem/liquidation/getAnnexD_report/' + id + '/html', function (xhr) {
        
        
        // Update the modal body with the fetched content
        modal.find('.modal-body').html(xhr);
  
    });
});

$('.loadButton').click(function(){
    
   var  yesnoresult = "all";
   var sy = "all";
   var rc = null;
    if($('.dateCOA:checked').length==1){
       yesnoresult = ($('.dateCOA:checked').eq(0).val()) 
    }
    else if($('.dateCOA:checked').length==2){
       yesnoresult = ($('.dateCOA:checked').eq(0).val())+($('.dateCOA:checked').eq(1).val()) 
    }
    else{
        yesnoresult = "nono";
    }
    
    sy = encodeURIComponent($('[name="schoolyear"]').val());
    rc = $('[name="rcoord"]').val();
    
    window.location.href  = "/UPDPSystem/liquidation/report/"+yesnoresult+'/'+sy+'/'+rc; 
    
    
})


$('.print').click(function(){
    
    var printWindow = window.open('', '', 'height=1000,width=2000');
        printWindow.document.write('<html><head><title>TES/TDP Report</title>  <style id="table_style" type="text/css">  body   {  font-family: Arial;  font-size: 10pt; }  table { font-size: 10pt; border: 1px solid #ccc;    border-collapse: collapse; }  table th  {   background-color: #F7F7F7;  color: #333;    font-weight: bold; } table th, table td  {  padding: 5px;  border: 1px solid #ccc; } </style>');
        printWindow.document.write('</head>');
        printWindow.document.write('<body> ');
    var divContents = document.getElementById("annexD_content").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');
 
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    
    
})
     
$('.printLiquidation').click(function(){
    
    var printWindow = window.open('', '', 'height=1000,width=2000');
        printWindow.document.write('<html><head><title>Liquidation Report</title>  <style id="table_style" type="text/css">  body   {  font-family: Arial;  font-size: 10pt; }  table { font-size: 10pt; border: 1px solid #ccc;    border-collapse: collapse; }  table th  {   background-color: #F7F7F7;  color: #333;    font-weight: bold; } table th, table td  {  padding: 5px;  border: 1px solid #ccc; } </style>');
        printWindow.document.write('</head>');
        printWindow.document.write('<body> ');
    var divContents = document.getElementById("idTable").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');
 
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    
    
})
$('.downloadExcell').click(function(){
    // Clone the table to avoid modifying the original
    var clonedTable = $('#idTable').clone();

    // Modify the cloned table (if needed) before exporting
    // For example, you might want to remove some elements or formatting

    // Use the table2excel library to export the table to Excel
    clonedTable.table2excel({
        name: "Liquidation_Report",
        filename: "liquidation_report", // You can specify the filename here
        fileext: ".xlxs" // Specify the file extension (for Excel)
    });
});

     
   
     $(document).on('show.bs.modal','#update_annexd',function(e){
         
         var button = $(e.relatedTarget);
        var imp_agency = button.parents('tr').find('td:eq(1)').text()
        var id = button.data('id');
        var modal = $(this);
        $.get('/UPDPSystem/liquidation/getAnnexD_data/'+id,function(xhr){
            
            
            if(xhr.length>0){
                
                modal.find('.content').empty();
                
                $.each(xhr,function(i,v){
                    
                    
                    modal.find('.content').append('<div class="row"> \n\
                                                                <div class="col"> \n\
                                                                <div class="form-group">\n\
                                                                    <div class="form-check">\n\
										<label class="form-check-label">\n\
                                                                                 <input type="checkbox" class="form-check-input" value="yes" '+(v.isdone=="yes"?"checked":"")+' name="isdone[]"  /> <b>'+v.description+'</b>\n\
										 <input class="d-none " style="outline: none; box-shadow: none" readonly value="'+v.description+'" name="desc[]"/>\n\
                                                             		</label>\n\
                                                                    </div>\n\
                                                                </div>\n\
                                                                </div>\n\
                                                                <div class="col">\n\
                                                                <div class="form-group">\n\
                                                                  <textarea name="remarks[]" class="form-control" placeholder="Remarks...">'+v.remarks+'</textarea>\n\
                                                                </div>\n\
                                                                </div>\n\
                                                            </div>');

                })
            }
            else{
                    modal.find('.content').empty();
                $.each(requirement_list_checklist,function(i,v){
                
                    modal.find('.content').append('<div class="row"> \n\
                                                                <div class="col"> \n\
                                                                <div class="form-group">\n\
                                                                    <div class="form-check">\n\
										<label class="form-check-label">\n\
                                                                                 <input type="checkbox" class="form-check-input" value="yes" name="isdone[]"  /> <b>'+v.requirement+'</b>\n\
										 <input class="d-none " style="outline: none; box-shadow: none" readonly value="'+v.requirement+'" name="desc[]"/>\n\
                                                             		</label>\n\
                                                                    </div>\n\
                                                                </div>\n\
                                                                </div>\n\
                                                                <div class="col">\n\
                                                                <div class="form-group">\n\
                                                                  <textarea name="remarks[]" class="form-control" placeholder="Remarks..."></textarea>\n\
                                                                </div>\n\
                                                                </div>\n\
                                                            </div>');
                    
                })
                      
            }
            
        })
        
         $(this).find('[name="id"]').val(id)
         $(this).find('.modal-title').text(" Annex D Checklist for "+imp_agency)
     })
     
     
       
       $(document).on('change','.update_coa',function(){
    $(this).parent('form').submit();
    
    
       })
       $('[name="dategranted"]').change(function(){
           var dategranted =$(this).val();
           
            // Convert the string to a JavaScript Date object
    var dateObj = new Date(dategranted);

    // Add 90 days to the date
    dateObj.setDate(dateObj.getDate() + 90);

    // Format the result as YYYY-MM-DD
    var duedate = dateObj.toISOString().slice(0, 10);

           
           
           $('[name="duedate"]').val(duedate)
            // Calculate the number of milliseconds between duedate and current date
  var currentDate = new Date();
    var differenceInMs = currentDate - dateObj;

    // Convert milliseconds to days
    var daysDifference = Math.floor(differenceInMs / (1000 * 60 * 60 * 24));

if(daysDifference<=0){
    $('[name="ageoffundtransfer"]').addClass('text-danger')
    $('[name="ageoffundtransfer"]').removeClass('text-success')
}
else{
   $('[name="ageoffundtransfer"]').removeClass('text-danger')  
   $('[name="ageoffundtransfer"]').addClass('text-success')  
}
    $('[name="ageoffundtransfer"]').val(daysDifference);
           
           
       })
       
       
       
       
       
       
       
       
       
       
       
       
       
       
        
         $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        // Filter table rows based on input
        $("table.table tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });
       $(document).on('click','.editrecord',function(){
           
           
                       $('#edit_record').find("[name='id']").val($(this).data('id'));
                       $('#edit_record').find("[name='instcode']").val($(this).data('instcode'));
                       $('#edit_record').find("[name='implementingagency']").val($(this).data('hei_name')).trigger('change');;
                       $('#edit_record').find("[name='type']").val($(this).data('type'));
                       $('#edit_record').find("[name='status']").val($(this).data('status'));
                       $('#edit_record').find("[name='purpose']").val($(this).data('purpose'));
                       $('#edit_record').find("[name='dategranted']").val($(this).data('date_granted'));
                       $('#edit_record').find("[name='unliquitedamount']").val($(this).data('unliquidated_amount'));
                       $('#edit_record').find("[name='duedate']").val($(this).data('duedate_for_liquidation'));
                       $('#edit_record').find("[name='ageoffundtransfer']").val($(this).data('age_of_fundtransfer'));
                       $('#edit_record').find("[name='classification']").val($(this).data('classification'));
                       $('#edit_record').find("[name='datesubmittedtocoa']").val($(this).data('date_submitted_to_coa'));
                       $('#edit_record').find("[name='annexd']").val($(this).data('annex_d'));
                       $('#edit_record').find("[name='semester']").val($(this).data('sem'));
                       $('#edit_record').find("[name='schoolyear']").val($(this).data('year'));
                       $('#edit_record').find("[name='grant']").val($(this).data('grant'));
                       $('#edit_record').find("[name='incharge']").val($(this).data('user_incharge'));
           
           
           
       })
       
       
       
       
       
       
       
       
       
       
$(document).ajaxComplete(function(event,xhr,settings) {
var indicator = settings.url;
if(indicator.search("/")>0){
var indicator = indicator.split("/");
var len = indicator.length;

indicator = indicator[len-1];
}
if(typeof xhr.responseJSON!== "undefined"){

if(xhr.responseJSON.updatefield){
  $('.'+xhr.responseJSON.updatefield).remove()
}


if(xhr.responseJSON.liquitationrecords){
var rowsliq =xhr.responseJSON.liquitationrecords;
var tablerow = $('#idTable').find('tbody').empty();
    
            $.each(rowsliq, function(i, v) {
    // Replace null values with an empty string
    var type = v.type !== null ? v.type : '';
    var heiName = v.hei_name !== null ? v.hei_name : '';
    var status = v.status !== null ? v.status : '';
    var purpose = v.purpose !== null ? v.purpose : '';
    var dateGranted = v.date_granted !== null ? v.date_granted : '';
    var unliquidatedAmount = v.unliquidated_amount !== null ? (parseInt(v.unliquidated_amount == "" ? 0 : v.unliquidated_amount).toLocaleString('en-PH', {
        style: 'currency',
        currency: 'PHP'
    })) : '';
    var duedateForLiquidation = v.duedate_for_liquidation !== null ? v.duedate_for_liquidation : '';
    var ageOfFundtransfer = v.age_of_fundtransfer !== null ? (parseInt(v.age_of_fundtransfer == "" ? 0 : v.age_of_fundtransfer).toLocaleString()) + " Day/s" : '';
    var classification = v.classification !== null ? v.classification : '';
    var dateSubmittedToCoa = v.date_submitted_to_coa !== null ? v.date_submitted_to_coa : '';
    var annexD = v.annex_d !== null ? v.annex_d : '';
    var semYear = (v.sem !== null && v.year !== null) ? v.sem + " " + v.year : '';
    var grant = v.grant !== null ? v.grant : '';
    var userInchargeName = v.user_inchargename !== null ? v.user_inchargename : '';

    tablerow.append("<tr class='row" + v.id + "'>\n\
                            <td>" + type + "</td>\n\
                            <td>" + heiName + "</td>\n\
                            <td>" + status + "</td>\n\
                            <td>" + purpose + "</td>\n\
                            <td>" + dateGranted + "</td>\n\
                            <td>" + unliquidatedAmount + "</td>\n\
                            <td>" + duedateForLiquidation + "</td>\n\
                            <td>" + ageOfFundtransfer + "</td>\n\
                            <td>" + classification + "</td>\n\
                                <td><form action='update_coa'>\n\
                                <input name='id' class=d-none value='" + v.id + "'/>\n\
                                <input name='date_submitted_to_coa' class='form-control input-sm "
                                +(v.date_submitted_to_coa==''?"bg-danger":"bg-primary")
                                +" update_coa'  type='date' value='"+v.date_submitted_to_coa+"'/></form></td>"+
                            "<td >"+
                                "<button data-toggle='modal' data-id='"+ v.id +"' data-target='#update_annexd' class='btn btn-outline-primary  icon-pencil4'> </button>"+
                                "<button data-toggle='modal' data-id='"+ v.id +"' data-target='#update_view' class='btn btn-outline-primary  icon-printer4'> </button>"+
                                "</td>"+                                                                        
                            "<td>" + semYear + "</td>\n\
                            <td>" + grant + "</td>\n\
                            <td>" + userInchargeName + "</td>\n\
                            <td>\n\
                                <button data-id='" + v.id + "' data-type='" + type + "' data-hei_name='" + heiName + "' data-status='" + status + "' data-purpose='" + purpose + "' data-date_granted='" + dateGranted + "' data-unliquidated_amount='" + v.unliquidated_amount + "' data-duedate_for_liquidation='" + duedateForLiquidation + "' data-age_of_fundtransfer='" + v.age_of_fundtransfer + "' data-classification='" + classification + "' data-date_submitted_to_coa='" + dateSubmittedToCoa + "' data-annex_d='" + annexD + "' data-sem='" + v.sem + "' data-year='" + v.year + "' data-grant='" + grant + "' data-user_incharge='" + v.user_incharge + "' data-toggle='modal' data-target='#edit_record' class='btn editrecord btn-outline-primary icon-pencil'></button>\n\
                                <form action='<?=base_url()?>liquidation/deleterecord'>\n\
                                    <input name='id' value='" + v.id + "' class='d-none'/>\n\
                                    <button class='btn btn-outline-danger icon-trash deleterow'></button>\n\
                                </form>\n\
                            </td>\n\
                        </tr>");
});



}
 
 }




});
       
 
       
       
            })
            
            
            
            