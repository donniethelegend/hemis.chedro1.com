$(document).ready(function(){
    












$('#student_profile').on('hide.bs.modal',
function(e){
    load_student.refresh();
})
$('#student_profile').on('show.bs.modal',
function(e){
  var data = $(e.relatedTarget);
  var modal = $(this);
  var scholarID = data.data('id')
   $.ajax({
                                dataType: "html",
                                url: 'student/profile/'+scholarID,
                                 beforesend: function(xhr){
                                     modal.find('.modal-body').html("<h4>Loading Data...</h4>")

                                },
                                success: function(xhr){
                                    
                                  
                                        modal.find('.modal-body').html(xhr)
                                          },
                                           error: function(e,status, error)
                                          {
                                              modal.find('.modal-body').html(error)
                                          }

                              });
    
});

function bytesToSize(bytes) {
  
  if (bytes < 1024) {
    return bytes + ' B'; // Less than 1KB, return bytes
  } else if (bytes < 1024 * 1024) {
    return (bytes / 1024).toFixed(2) + ' KB'; // Between 1KB and 1MB, return kilobytes
  } else {
    return (bytes / (1024 * 1024)).toFixed(2) + ' MB'; // Larger than 1MB, return megabytes
  }
}


    $(document).on('click','.download_req',
    function(){
        var previousRow = $(this).parents('tr').prev('tr')
      
            var data =  $(this);
            var button =  $(this);
            var namestudent =  $('.namestudent').text();
            var scholarID = data.data('id');
            var year = data.data('year');
            var sem = data.data('sem');
        
              var  initialText = button.html();
              var  loadingText = '<i class="icon-spinner3 spinner mr-2"></i> Zipping Files...';
                    button.html(loadingText);
                    button.addClass('disabled');
                    button.attr('disabled',true);
   
           $.ajax({
              xhrFields: {
            responseType: 'blob'
            },
            url: '../../student/download_files_inZip/'+scholarID,
            method: "post",
            data: [{name:"yearlevel",value:year},{name:"semester",value:sem}],
            beforesend:function(){
                button.text('\nZipping Files...')
                
            },
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
               
                // Handle progress event
                xhr.onprogress  = function(event) {
                    
               
                //  console.log(bytesToSize(event.loaded));
                  
                button.html('<i class="icon-spinner3 spinner mr-2"></i> '+ bytesToSize(event.loaded) + " Downloaded");
                      
                         
                };

                return xhr;
              },
      
               success: function (data) {
                 
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.href = url;
            a.download = namestudent+ ' Year '+year+ '- Sem '+sem+'.zip';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
            
                                    $.ajax({
                                    dataType: "json",
                                    url: '../../student/update_status_enrollment/',
                                    method: "post",
                                    data: [{name:"yearlevel",value:year},{name:"semester",value:sem},{name:"id",value:scholarID}],
                                    beforesend: function(xhr){
                                        console.log('Updating Status...')
                                     button.html('<i class="icon-spinner3 spinner mr-2"></i> Updating Status...');
                                   
                                    },
                                    success: function(xhr)
                                        {
                                              $.ajax({url: '../../student/clearcompressfolder',
                                                method: "post"})
                                            
                                            
                                            
                                            button.html(initialText);
                                            button.removeClass('disabled');
                                            button.removeAttr('disabled');
                                            
                                      if(xhr.result){
                                          
                                          previousRow.find('td').eq(2).html(xhr.enrollment.status+'<br><small>Verified Date '+xhr.enrollment.date+'</small>')
                                          previousRow.find('td').eq(3).html(xhr.ors.status+'<br><small>Verified Date '+xhr.ors.date+'</small>')
                                      }
                                        },
                                    error: function(e,status, error)
                                        {
                                        console.log(error);
                                        }
                                    });
            
            
            
            
        },
            error: function(e,status, error)
                {
              console.log(error)
                }
            });
    })
    
    
    $(document).on('click','.backtostudprof',
        function(){
            
            var modal =  $('#student_profile')
            var scholarID = $(this).data('id')
            console.log(scholarID)
   $.ajax({
                                dataType: "html",
                                url: 'student/profile/'+scholarID,
                                 beforesend: function(xhr){
                                     modal.find('.modal-body').html("<h4>Loading Data...</h4>")

                                },
                                success: function(xhr){
                                    
                                  
                                        modal.find('.modal-body').html(xhr)
                                          },
                                           error: function(e,status, error)
                                          {
                                              modal.find('.modal-body').html(error)
                                          }

                              });
                              
        });
    $(document).on('click','.grantee_status',
        function(){
            var value = $(this).data("value")
            var scid = $(this).data("scholarid")
         
   $.ajax({
                                dataType: "json",
                                url: 'student/updatestatus_scholar',
                                method: "post",
                                data:[
                               
                                {name:"id",value:scid},
                                {name:"value",value:value}
                            ],
                                 beforesend: function(xhr){
                                   $.notify('Updating...!',"info");

                                },
                                success: function(xhr){
                                    
                                   $.notify('Updated!',"info");
                                   
                                   $('.stat_badge'+scid).removeClass('badge-success')
                                   $('.stat_badge'+scid).removeClass('badge-danger')
                                   $('.stat_badge'+scid).removeClass('badge-warning')
                                   
                                   switch(value){
                                       case "Terminated":
                                           $('.stat_badge'+scid).addClass('badge-danger')
                                           break;
                                       case "Active":
                                            $('.stat_badge'+scid).addClass('badge-success')
                                           break;
                                       case "Hanging":
                                            $('.stat_badge'+scid).addClass('badge-warning')
                                           break;
                                       
                                   }
                                   
                                     $('.stat_badge'+scid).html(value)
                                   
                                   
                                   
                                          },
                                           error: function(e,status, error)
                                          {
                                            $.notify('Failed!',"info");
                                          }

                              });
                              
        });
        
        
        
        
        function getSubstringByDelimiter(str, delimiter, occurrence) {
  const parts = str.split(delimiter);
  
  // Check if the specified occurrence is within valid bounds
  if (occurrence >= 1 && occurrence <= parts.length) {
    return parts[occurrence - 1];
  } else {
    return "Invalid occurrence.";
  }
}
    $(document).on('change','.update_status',
        function(){
            var field = $(this).attr('name');
            var id = $(this).data('targetid');
            var value = $(this).val();

            $.ajax({
                dataType: "html",
                url: window.location.origin+"/"+getSubstringByDelimiter(window.location.href,"/",4)+'/student/updateStatus_ofStatus',
                method: "post",
                data: [
                    {name:"field",value:field},
                    {name:"id",value:id},
                    {name:"value",value:value}
                ],
              
                success: function(xhr)
                    {
                   $.notify('Updated!',"info");
                    },
                error: function(e,status, error)
                    {
                      $.notify('Try Again!');
                    }
                });
    });
    $(document).on('click','.openfolder_student',
        function(){
   
        var modal =  $('#student_profile')
        var data =  $(this);
        var statid = data.data('id');
        var scholarID = data.data('scid');
        var year = data.data('year');
        var sem = data.data('sem');
        $(this).text(' \nClose');
        modal.find('.modal-body').html('<h2>Loading...</h2>')
            $.ajax({
                dataType: "html",
                url: 'student/requirements_options/'+statid,
                method: "post",
                data: [
                    {name:"yearlevel",value:year},
                    {name:"scid",value:scholarID},
                    {name:"semester",value:sem}],
              
                success: function(xhr)
                    {
                    modal.find('.modal-body').html(xhr);
                    },
                error: function(e,status, error)
                    {
                        modal.find('.modal-body').html(error);
                    }
                });
    });
    $(document).on('click','.show_attachment',
        function(){
        $(this).removeClass('show_attachment');
        $(this).addClass('hide_attachment');
        $(this).removeClass('icon-folder2');
        $(this).addClass('icon-folder-open');
        var row =  $(this).parents('tr');
        var data =  $(this);
        var statid = data.data('id');
        var scholarID = data.data('scid');
        var year = data.data('year');
        var sem = data.data('sem');
        

        $(this).text(' \nClose');
         row.after('<tr><td class="bg-primary" colspan="7">Loading...</td> </tr>');
            $.ajax({
                dataType: "html",
                url: '../../student/requirements_options/'+statid,
                method: "post",
                data: [
                      {name:"statid",value:statid},
                      {name:"yearlevel",value:year},
                    {name:"scid",value:scholarID},
                    {name:"semester",value:sem}],
              
                success: function(xhr)
                    {
                  row.next().remove('tr');
                    row.after("<tr><td colspan='7'>"+xhr+"</td></tr>");
                    },
                error: function(e,status, error)
                    {
                    row.after(error);
                    }
                });
    });


    $(document).on('click','.hide_attachment',function(){
        $(this).removeClass('hide_attachment');
        $(this).addClass('show_attachment');
         $(this).addClass('icon-folder2');
        $(this).removeClass('icon-folder-open');
 $(this).text(' \nOpen');
        var row =  $(this).parents('tr');
            row.next().remove('tr');
    });


});