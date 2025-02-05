/* ------------------------------------------------------------------------------
 *
 *  # Steps wizard
 *
 *  Demo JS code for form_wizard.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var FormWizard = function() {


    //
    // Setup module components
    //

    // Wizard
    var _componentWizard = function() {
        if (!$().steps) {
            console.warn('Warning - steps.min.js is not loaded.');
            return;
        }

      


        //
        // Wizard with validation
        //

        // Stop function if validation is missing
        if (!$().validate) {
            console.warn('Warning - validate.min.js is not loaded.');
            return;
        }

        // Show form
        var form = $('.steps-validation').show();


        // Initialize wizard
        $('.steps-validation').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
            },
            transitionEffect: 'fade',
            autoFocus: true,
            onStepChanging: function (event, currentIndex, newIndex) {
               

                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    
                    
                    
                    
                    return true;
                    
                }

                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {

                    // To remove error styles
                    form.find('.body:eq(' + newIndex + ') label.error').remove();
                    form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
                }
                
                
                

                form.validate().settings.ignore = ':disabled,:hidden';
              
                
               return form.valid()
                
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ':disabled';
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                alert('Submitted!');
            },
            onStepChanged: function (event, currentIndex,newIndex) {
             
      
                        
                    var elemen  =$(this).find('fieldset').eq(currentIndex);
                   var r = sendUpdate("hei/updateElseAdd",elemen)
                   console.log(r)
               
                   
               //  $(this).find('fieldset').eq(currentIndex).updateData("hei/updateElseAdd","POST");


        
            }
        });



    
  async function sendUpdate(action,fieldset) {
  var method = "POST";
 var url = 'http://'+window.location.hostname+'/sas/'+action;
 var form = $("<form action='"+action+"' method='"+method+"'></form>")
  form.append(fieldset[0])
 
 $.ajax({
                    method: method,
                    url: url,
                    data: new FormData(form[0]),
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
        }
                    
                   
                  });
                  
              
 
       return true;
  }
    














        // Initialize validation
        $('.steps-validation').validate({
            ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
            errorClass: 'validation-invalid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },

            // Different components require proper error label placement
            errorPlacement: function(error, element) {

                // Unstyled checkboxes, radios
                if (element.parents().hasClass('form-check')) {
                    error.appendTo( element.parents('.form-check').parent() );
                }

                // Input with icons and Select2
                else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
                    error.appendTo( element.parent() );
                }

                // Input group, styled file input
                else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
                    error.appendTo( element.parent().parent() );
                }

                // Other elements
                else {
                    error.insertAfter(element);
                }
            },
            rules: {
                email: {
                    email: true
                }
            }
        });
    };

    // Uniform
    var _componentUniform = function() {
        if (!$().uniform) {
            console.warn('Warning - uniform.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.form-input-styled').uniform({
            fileButtonClass: 'action btn bg-blue'
        });
    };

    // Select2 select
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        var $select = $('.form-control-select2').select2({
            minimumResultsForSearch: Infinity,
            width: '100%'
        });

        // Trigger value change when selection is made
        $select.on('change', function() {
            $(this).trigger('blur');
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentWizard();
            _componentUniform();
            _componentSelect2();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    FormWizard.init();
});
