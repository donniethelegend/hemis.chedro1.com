
    
    $(document).ready(function(){
       
         
        
        
        
       
   var ajaxProcessResponse =  $(document).on('submit','form',function(e){
           e.preventDefault();

        
     


 

   //   var session =  $.cookie('PHPSESSID');
var redirect = "" ; // extract the redirect variable
         var method = $(this).attr('method');
         method = typeof method!='undefined'?method:"POST";
           var url = 'http://'+window.location.hostname+'/sas/'+$(this).attr('action');
          
                 var form= $(this);
                 var formdata= $(this)[0];
          console.log(formdata)
        var trigger = true;
        /* THIS IS FOR CHECKING VALIDITY 
                   form.find(':input[required]').each(function(i,v){
                       
                
                       if(!v.checkValidity()){
                      
                       $(v).removeClass('is-valid')
                           $(v).addClass('is-invalid')
                        if(trigger)
                          trigger = false; 
                       }
                       else{
                           $(v).removeClass('is-invalid')
                           $(v).addClass('is-valid')
                        
                       }
                      
                   })
                   */
             
                   if(trigger){
                    
                      console.log("Sending data..."+url)
                   
                 //  console.log(new FormData(formdata))
                   
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
                        
                
                     $('.progress-bar').html("Uploading "+parseInt(((e.loaded/e.total)*100))+"%");
                        
                     $('.progress-bar').css("width",parseInt(((e.loaded/e.total)*100))+"%");
                    $('.progress-bar').attr({
                        "aria-valueno": e.loaded,
                        "aria-valuemax": e.total
                             
                      });
                  
                  
                  
                  
                  
                    }
                } , false);
            }
            return myXhr;
        },
                    beforeSend: function(xhr){  
                 
  
         
                  var btn =form.find('[type=submit]').prop('disabled',true);
                           btn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Loading...') 
                  
                  
                    }
                    
                    
                  });
                  
                  request.fail(function(xhr){
             
                  
                    alert("failed");




      
                     var btn=  form.find('[type=submit]').removeAttr('disabled');
       
                           btn.html('Submit') 
              
                      
                  });
                  
                  request.done(function(xhr){
                   
                               var btn=  form.find('[type=submit]').removeAttr('disabled');
       
                           btn.html('Submit') 
               
        
                     
                        
                        if(typeof xhr.redirect != 'undefined'){
                         
                             $.cookie('notif',JSON.stringify(xhr))
                                

                           
                         
                            
                        
                           window.location.replace(xhr.redirect);
                            
                     
                            
                        }
                        else{
                    alert("notification from response here")
}




      
                     var btn=  form.find('[type=submit]').removeAttr('disabled');
       
                           btn.html('Save') 
              
                      
                  });



                        
                    
                    
                
                        
                        
             
           
                 
               return request;
               }
               else{
               return false
               }
           
    });
    });