

$(document).ready(function(){
    
    var notif = $.cookie('notif')
   if(typeof notif!='undefined'){
       notif = JSON.parse(notif);
       $.notify(notif.message, notif.type);
      $.removeCookie('notif');
   }
    
    
   var formResponse =  $(document).on('submit','form',function(e){
       e.preventDefault();
      
   
        console.log('submit initiated')
        
        
         var method = $(this).attr('method');
         method = typeof method!='undefined'?method:"POST";
         
         var url = $(this).attr('action');
         var form= $(this);
         var formdata= $(this)[0];
        

        
        
                   
          var   request =  $.ajax({
                    method: method,
                    url: url,
                    data: new FormData(formdata),
                    cache: false,
                    contentType: false,
                    processData: false,
                    
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                   // console.log(myXhr)
                    if (myXhr.upload) {

                        myXhr.upload.addEventListener('progress', function(e) {
                            
                            if (e.lengthComputable) {

                               form.find('.progress-bar').removeClass("bg-success");
                             form.find('.progress-bar').html(parseInt(((e.loaded/e.total)*100))+"%");

                            form.find('.progress-bar').css("width",parseInt(((e.loaded/e.total)*100))+"%");
                             form.find('.progress-bar').attr({
                             "aria-valueno": e.loaded,
                             "aria-valuemax": e.total

                              });

                 //  console.log((e.loaded/e.total));
                   
                            }
                        } , false);
                    }
                    return myXhr;
                },
                    beforeSend: function(xhr){  
                 
        
                 var btn =form.find('[type=submit]').prop('disabled',true);
                 $.cookie('btn_txt',btn.text());
                           btn.html('<span class="icon-spinner spinner" role="status" aria-hidden="true"></span>  Loading...') 
                  
                  
                    },
                    error: function(e,status, error){
                        
                          form.find('.progress-bar').html("Error" );
                            form.find('.progress-bar').removeClass("bg-success"); // Change the color to indicate error
                            form.find('.progress-bar').addClass("bg-danger"); // Change the color to indicate error
                            form.find('.progress-bar').css("width", "100%");
                        
                        
                        
                             var btn=  form.find('[type=submit]').removeAttr('disabled');
                             
                                 btn.html($.cookie('btn_txt'))   
                              console.log(e.responseText)
                                 $.notify(error, "error");
                    }
                    
                    
                  });
                
                   request.done(function(xhr){
                   
                               var btn=  form.find('[type=submit]').removeAttr('disabled');
                                btn.html($.cookie('btn_txt'))   
                      
                       
                         
                                if(xhr.redirectto){
                                   
                                $.cookie('notif',JSON.stringify(xhr));
                                
                                window.location.replace(xhr.redirectto);
                                }
                                else{
                              
                           //     $.notify("Done");
                           
                           console.log('if there are error check the return data type in the backend if contenttype is JSON format')
                               $.notify(xhr.message, xhr.type);
                                 
                                }
                           
                       })
                  
                  
              return request;    
        
        
    })
    
    

    
})






















     server =  function(url,data){
        var   request =  $.ajax({
                    method: 'POST',
                    url: url,
                    data: data,
                    cache: false,
      
                    beforeSend: function(xhr){  
                 
//Place a statement before sending here
         
                
                  
                    }, done: function(xhr){
                        
                
                                if(xhr.redirectto){
                                   
                                $.cookie('notif',JSON.stringify(xhr));
                                
                                window.location.replace(xhr.redirectto);
                                }
                                else{
                              
                           //     $.notify("Done");
                           
                           console.log('if there are error check the return data type in the backend if contenttype is JSON format')
                               $.notify(xhr.message, xhr.type);
                                 
                                }
                        
                    }
                    
                    
                  })
                  
                          return request;
        
    }
        

  