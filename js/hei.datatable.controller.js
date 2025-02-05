var table; 
 $.removeCookie('itemsselected');
$(document).ajaxComplete(function(event,xhr,settings) {



//update remarks  field here
if(settings.url=="student/save_remarks"){
    if(typeof xhr.responseJSON.updatefield!="undefined")
    {
       
$("p#"+xhr.responseJSON.updatefield.id).text(xhr.responseJSON.updatefield.remarks);

    }

}
});


$(document).on('click','.add_file_input',function(){
    console.log( $(this).parent('.input_group').after('div.row'))
    $(this).parent('.input_group').after('div.row').after('<div class="row"><div class="col-md-3"> <select class="form-control" name="type" >\n\
                                                                                <option value="Payment Document">Payment Document</option>\n\
                                                                                <option value="ATM Photocopy">ATM Photocopy</option>\n\
                                                                                <option value="ID">Identification Card</option>\n\
                                                                                <option value="Grades">Grades</option>\n\
                                                                                <option value="Enrollment Document">Enrollment Document</option>\n\
                                                                            </select>\n\
                                                                        </div>\n\
                                                                             <div class="col-md">\n\
                                                                                <input id="files" type="file" class="file-input" multiple="multiple" data-fouc>\n\
                                                                        </div>\n\
                                                                        </div>');
    
})
$(document).on('click','[name="checkall"]',function(){
if($(this).is(':checked')){
    
    
    
      
    $('.datatable-js').find('.rowstudent').prop('checked',true);
    
var selectedValues = $('.datatable-js').find('.rowstudent:checked').map(function () {
  return $(this).val();
}).get();


var jsonCookie ;
var mergedArray ;
if(typeof $.cookie('itemsselected') != 'undefined'){
 jsonCookie = JSON.parse($.cookie('itemsselected'));
}
if
(jsonCookie){
 mergedArray = selectedValues.concat(jsonCookie).filter(function (item, index, self) {
  return self.indexOf(item) === index;
});
}else{
    mergedArray = selectedValues;
}

console.log(mergedArray)

 var jsonResult = JSON.stringify(mergedArray);

$.cookie('itemsselected',jsonResult)




}
else{
    
     
    
$('.datatable-js').find('.rowstudent').prop('checked',false);
    
    var deselectedValues = $('.datatable-js').find('.rowstudent:not(:checked)').map(function () {
  return $(this).val();
}).get();
    
  
    var jsonCookie ;
var remainvalues ;
if(typeof $.cookie('itemsselected') != 'undefined'){
 jsonCookie = JSON.parse($.cookie('itemsselected'));
}


if(jsonCookie){
remainvalues = deselectedValues.filter(function (item) {
  return !jsonCookie.includes(item);
});
}

console.log(remainvalues)
    
}
})


 
  function getAllCheckedCheckboxes() {
        var checkedCheckboxes = [];

        // Iterate through all rows
       table[0].rows().nodes().each(function (row) {
            var checkbox = $(row).find('input[type="checkbox"]:checked');
            if (checkbox.length > 0) {
                checkedCheckboxes.push(checkbox.val());
            }
        });

        return checkedCheckboxes;
    }

    // Example of how to use the function
    $(document).on('click','.updatebatch',function () {
 console.log(table[0]);
    });





                var load_student =function(){
                   
                    
                    var _load = function(){
                        
          $.ajax({
                                dataType: "json",
                                url: 'student/showall/dataset',
                                "cache": true,
                                headers: {
                                "Cache-Control": "max-age=300"
                                },
                                success: function(xhr){
                                 table =   $('.datatable-js').dataTable({
                                              stateSave: true,
                                              data:xhr,
                                             order: [[4, 'desc']],
                                              columnDefs: [
                                                {
                                                    targets: 0, // Target the first column (index 0)
                                                    orderable: false, // Disable sorting for the first column
                                                }
                                            ]
                                          });
                                          
                                   
                                      
                                          }
                                

                              });
                              
                          
                                            $('.datatable-js').on('page.dt', function () { 
                                          
                                                  
                                          
                                                                                             console.log($(this).find('.rowstudent:not(:checked)').length)
                                          
                                                $('[name="checkall"]').prop('checked',false) 
                                                
                                            
                                            });
                                            
                                            
                                     $('.datatable-js').on('search.dt', function () { $('[name="checkall"]').prop('checked',false)  });
                
                


     
                }
                
                    
               
                    var _reload = function(){
                        $.removeCookie('itemsselected');
                          $('.datatable-js').dataTable().fnDestroy()
                            $.ajax({
                                dataType: "json",
                                url: 'student/showall/dataset',
                                 "cache": true,
                                headers: {
                                "Cache-Control": "max-age=300"
                                },
                                success: function(xhr){
                                 table =   $('.datatable-js').dataTable({
                                              stateSave: true,
                                              data:xhr,
                                              order: [[3, 'desc']],
                                            
                                              columnDefs: [
                                            {
                                                targets: 0, // Target the first column (index 0)
                                                orderable: false // Disable sorting for the first column
                                            }
                                        ]
                                             
                                    });
                                     $('.datatable-js').on('page.dt', function () { $('[name="checkall"]').prop('checked',false)  });
                                     $('.datatable-js').on('search.dt', function () { $('[name="checkall"]').prop('checked',false)  });
                
                                          }
                                

                              });


     
                }
            return {
        init: function() {
           _load();
          
        },
        refresh: function(){
          _reload();
        }
    }
                
                }();
      
       
      
document.addEventListener('DOMContentLoaded', function() {
  load_student.init();

});


