

                var load_student =function(){
                   
                    
                    var _load = function(){
                        
          $.ajax({
                                dataType: "json",
                                url: 'awardmanager/showall/dataset',
                                "cache": true,
                                headers: {
                                "Cache-Control": "max-age=300"
                                },
                                success: function(xhr){
                             $('.datatable-js').dataTable({
                                              stateSave: true,
                                              data:xhr
                                             
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


