
$(document).ajaxComplete(function(event,xhr,settings) {
var indicator = settings.url;
if(indicator.search("/")>0){
var indicator = indicator.split("/");
var len = indicator.length;

indicator = indicator[len-1];
}


//update remarks  field here
if(indicator=="save_remarks"){
    if(typeof xhr.responseJSON.updatefield!="undefined")
    {
       
$("p#"+xhr.responseJSON.updatefield.id).text(xhr.responseJSON.updatefield.remarks);

    }

}

if(indicator=="upload_enrollment"){
    if(typeof xhr.responseJSON.updatefield!="undefined")
    {
load_enrollment.refresh();
load_enrollment.loadpayment();


$('#add_enrollment').collapse('hide')

    }

}
});

function compare(a, b) {
  // Compare the first element of each sub-array
  if (a[0] < b[0]) {
    return -1;
  }
  if (a[0] > b[0]) {
    return 1;
  }
  return 0;
}
$(document).ready(function(){
    
 //  FormValidation.validate('.form-validate-jquery');
       $('#status_tab').on('show.bs.tab',function(e){
                   var a =$(e.relatedTarget);
                    var href = a.attr('href');
                    
                    
                    
                    
                    
                    load_enrollment.loadpayment();
          
                    
                    
                })
                
  
  
  
  
  
  
  
  
  
  
  
  
    $('#add_enrollment').on('shown.bs.collapse',function(){
        
      $(this).find('form')[0].reset()
      $('.form-validate-jquery').validate().resetForm();
    });
    $('#upload_requirements').on('show.bs.modal',function(e){
        $(this).find('form')[0].reset()
        var es = $(e.relatedTarget).data('ls');
        
        
         $(this).find('form').find('#yearlevel').val(es[0])
         $(this).find('form').find('#semlevel').val(es[1])
        
        
        
        
        
      
      $('.form-validate-jquery').validate().resetForm();
    })
    
    
        $('.add_file_input').click(function(){
            
          var count =  $('#add_enrollment').find('input[type="file"]').length;

          var elem =   '<div class="row m-1">\n\
                                                                        <div class="col">\n\
                                                                            <select required class="form-control" name="doctype'+count+'" >\n\
                                                                                              <option selected disabled >Document Type..</option>\n\
                                                                                <option value="Payment Document">Payment Document</option>\n\
                                                                                <option value="ATM Photocopy">ATM Photocopy</option>\n\
                                                                                <option value="ID">Identification Card</option>\n\
                                                                                <option value="Grades">Grades</option>\n\
                                                                                <option value="Enrollment Document">Enrollment Document</option>\n\
                                                                            </select>\n\
                                                                        </div>\n\
                                                                             <div class="col">\n\
                                                                                <input required type="file" name="document'+count+'" class="file-input-newappend"  data-fouc>\n\
                                                                        \n\
                                                                        </div>\n\
                                                                        </div>';
                        
     $(this).parents('.col-md-12').find('.file-elements').append(elem);
     
     
     
      var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: '<i class="icon-arrow-left32"></i>',
            next: '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };


        //
        // Basic example
        //

        $('.file-input-newappend').fileinput({
            browseLabel: 'Browse',
            browseIcon: '<i class="icon-file-plus mr-2"></i>',
          showUpload: false,
            removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
            initialCaption: "No file selected",
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });
})
})











                var load_enrollment =function(){
                   
                    
                    var _load = function(){
                        
                        
                        
                        
          $.ajax({
                                dataType: "json",
                                url: site_url()+'student/show_enrollment/dataset',
                                 "cache": true,
                                headers: {
                                "Cache-Control": "max-age=300"
                                },
                                success: function(xhr){
                                   
                                    $('.enrollment_datatable').dataTable({
                                              stateSave: true,
                                              data:xhr,
                                              columnDefs: []
                                          });
                                          }
                                        
                                

                              });
                              
                              
                              
                              
                              
                              
          $.ajax({
                                dataType: "json",
                                url: site_url()+'student/show_payment/dataset',
                                 "cache": true,
                                headers: {
                                "Cache-Control": "max-age=300"
                                },
                                success: function(xhr){
                                   // $('.payment_datatable').dataTable({
                                  //            stateSave: true,
                                   //           data:xhr,
                                    //          columnDefs: []
                                    //      });
                                           xhr.sort(compare);
                                    
                                          
                                   var table=  $('.payment_datatable').find('tbody').empty();
                                         
                                          $.each(xhr,function(i,v){
                                             
                                              table.append('<tr><td><b>'+v[0]+'<br/>'+v[1]+'</b></td><td>'+v[2]+'</td><td>'+(v[3]==null?"":v[3])+'</td></tr>')
                                              
                                              
                                            
                                              switch(v[0]){
                                                  case "1st Year":
                                                      
                                                      switch(v[1]){
                                                          case "1st Semester":
                                                         $('.first-first').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "2nd Semester":
                                                         $('.first-second').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "Summer":
                                                         $('.first-summer').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                          
                                                      }
                                                      
                                                      
                                                      
                                                      break;
                                                  case "2nd Year":
                                                      
                                                      switch(v[1]){
                                                          case "1st Semester":
                                                         $('.second-first').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "2nd Semester":
                                                         $('.second-second').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "Summer":
                                                         $('.second-summer').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                          
                                                      }
                                                      
                                                      
                                                      
                                                      break;
                                                  case "3rd Year":
                                                      
                                                      switch(v[1]){
                                                          case "1st Semester":
                                                         $('.third-first').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "2nd Semester":
                                                         $('.third-second').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "Summer":
                                                         $('.third-summer').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                          
                                                      }
                                                      
                                                      
                                                      break;
                                                  case "4th Year":
                                                      
                                                   switch(v[1]){
                                                          case "1st Semester":
                                                         $('.fourth-first').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "2nd Semester":
                                                         $('.fourth-second').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "Summer":
                                                         $('.fourth-summer').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                          
                                                      }
                                                      
                                                      
                                                      
                                                      break;
                                                  case "5th Year":
                                                      
                                                      switch(v[1]){
                                                          case "1st Semester":
                                                         $('.fifth-first').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "2nd Semester":
                                                         $('.fifth-second').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "Summer":
                                                         $('.fifth-summer').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                          
                                                      }
                                                      
                                                      
                                                      
                                                      break;
                                              }
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                          })
                                          
                                          
                                          
                                          
                                          
                                          
                                          }
                                










                              });
                              
                              
                              
                              
                              


     
                }
                    var _reload = function(){
                          $('.enrollment_datatable').dataTable().fnDestroy()
                            $.ajax({
                                dataType: "json",
                                url: 'student/show_enrollment/dataset',
                                success: function(xhr){
                                    $('.enrollment_datatable').dataTable({
                                              stateSave: true,
                                              data:xhr,
                                              columnDefs: []
                                          });
                                          }
                                

                              });


     
                }
                    var _reloadPayment = function(){
                          $('.payment_datatable').dataTable().fnDestroy()
                            $.ajax({
                                dataType: "json",
                                url: 'student/show_payment/dataset',
                                success: function(xhr){
                                   // $('.payment_datatable').dataTable({
                                  //            stateSave: true,
                                  //            data:xhr,
                                   //           columnDefs: []
                                   //       });
                                          
                                          
                                                   xhr.sort(compare);
                                    
                                          
                                   var table=  $('.payment_datatable').find('tbody').empty();
                                         
                                          $.each(xhr,function(i,v){
                                             
                                              table.append('<tr><td><b>'+v[0]+'<br/>'+v[1]+'</b></td><td>'+v[2]+'</td><td>'+(v[3]==null?"":v[3])+'</td></tr>')
                                         
                                          
                                            
                                              switch(v[0]){
                                                  case "1st Year":
                                                      
                                                      switch(v[1]){
                                                          case "1st Semester":
                                                         $('.first-first').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "2nd Semester":
                                                         $('.first-second').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "Summer":
                                                         $('.first-summer').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                          
                                                      }
                                                      
                                                      
                                                      
                                                      break;
                                                  case "2nd Year":
                                                      
                                                      switch(v[1]){
                                                          case "1st Semester":
                                                         $('.second-first').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "2nd Semester":
                                                         $('.second-second').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "Summer":
                                                         $('.second-summer').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                          
                                                      }
                                                      
                                                      
                                                      
                                                      break;
                                                  case "3rd Year":
                                                      
                                                      switch(v[1]){
                                                          case "1st Semester":
                                                         $('.third-first').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "2nd Semester":
                                                         $('.third-second').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "Summer":
                                                         $('.third-summer').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                          
                                                      }
                                                      
                                                      
                                                      break;
                                                  case "4th Year":
                                                      
                                                   switch(v[1]){
                                                          case "1st Semester":
                                                         $('.fourth-first').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "2nd Semester":
                                                         $('.fourth-second').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "Summer":
                                                         $('.fourth-summer').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                          
                                                      }
                                                      
                                                      
                                                      
                                                      break;
                                                  case "5th Year":
                                                      
                                                      switch(v[1]){
                                                          case "1st Semester":
                                                         $('.fifth-first').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "2nd Semester":
                                                         $('.fifth-second').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                           case "Summer":
                                                         $('.fifth-summer').html((v[2]!="null"?v[2]+"<br/><p><b>Remarks:</b> "+(v[3]?v[3]:"None")+"</p>":"<label>No Enrollment Submission</label>"));
                                                          break;
                                                          
                                                      }
                                                      
                                                      
                                                      
                                                      break;
                                              }
                                          
                                          
                                          
                                          
                                          
                                          
                                          })
                                          
                                          
                                          }
                                

                              });


     
                }
            return {
        init: function() {
            _load();
          
        },
        refresh: function(){
            _reload();
        },
        loadpayment: function(){
            _reloadPayment();
        }
    }
                
                }();
      
       
                var load_student =function(){
                   
                    
                    var _load = function(){
                        
          $.ajax({
                                dataType: "json",
                                url: 'student/showall/dataset',
                                success: function(xhr){
                                    $('.datatable-js').dataTable({
                                              stateSave: true,
                                              data:xhr,
                                              columnDefs: []
                                          });
                                          }
                                

                              });
                              
                              
                              
                              
                              


     
                }
                    var _reload = function(){
                          $('.datatable-js').dataTable().fnDestroy()
                            $.ajax({
                                dataType: "json",
                                url: 'student/showall/dataset',
                                success: function(xhr){
                                    $('.datatable-js').dataTable({
                                              stateSave: true,
                                              data:xhr,
                                              columnDefs: []
                                          });
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
   load_enrollment.init();
});


