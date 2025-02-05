var ChecksForms = function() {
    var instcode = $('#instcodess').val();
    var sy = $('#syss').val();

    // Helper function to update status element based on response
    var updateStatus = function(reference, status, remarks) {
        $(reference+"_status").removeClass('bg-warning bg-success bg-danger bg-primary');

        if (status === "PENDING") {
            $(reference+"_status").addClass('bg-primary').text("FOR VALIDATION");
        } else if (status === "DISAPPROVED") {
            $(reference+"_status").addClass('bg-danger').text("SUBJECT FOR RESUBMISSION");
        } else if (status === "APPROVED") {
            $(reference+"_status").addClass('bg-success').text("VALIDATED");
              $(reference+"_remarks").parents('tr').find('td').eq(1).html("<span class='icon-thumbs-up3 font-color-teal'></span>");
        } else {
            $(reference+"_status").addClass('bg-warning').text("NO SUBMISSION");
        }
      
   
      $(reference + "_remarks").html("<pre style='border: none; background: none; padding: 0; font-family: Arial, sans-serif;'>" + (remarks != null ? remarks:"") + "</pre>");
        
    };

    var _NONSUC_e_Forms_A = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "NONSUC-e-Forms-A" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#NONSUC-e-Forms-A', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };

    var _NONSUC_e_Forms_B_C = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "NONSUC-e-Forms-B-C" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#NONSUC-e-Forms-B-C', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };

    var _NONSUC_Form_E5_Faculty_Form = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "NONSUC-Form-E5-Faculty-Form" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#NONSUC-Form-E5-Faculty-Form', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };

    var _NONSUC_PRC_List_of_Graduates = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "NONSUC-PRC-List-of-Graduates" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#NONSUC-PRC-List-of-Graduates', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };
    var _NONSUC_e_Research = function() {
     
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "NONSUC-e-Research" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#NONSUC-e-Research', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };


    var _SUC_NF_Forms_A = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "SUC-NF-Forms-A" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#SUC-NF-Forms-A', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };
    var _SUC_NF_Forms_B = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "SUC-NF-FORM-B" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#SUC-NF-Forms-B', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };
    var _SUC_NF_Forms_E1 = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "SUC-NF-FORM-E1" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#SUC-NF-FORM-E1', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };
    var _SUC_NF_Forms_E2 = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "SUC-NF-FORM-E2" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#SUC-NF-FORM-E2', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };
    var _SUC_NF_Forms_GH = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "SUC-NF-FORM-GH" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#SUC-NF-FORM-GH', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };
    var _SUC_NF_Research_Extension_Forms = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "SUC-NF-Research-Extension-Forms" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#SUC-NF-Research-Extension-Forms', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };
    var _SUC_PRC_List_of_Graduates = function() {
        $.ajax({
            method: "POST",
            url: "./checks_formstatus",
            data: [
                { name: "instcode", value: instcode },
                { name: "sy", value: sy },
                { name: "formname", value: "SUC-PRC-List-of-Graduates" }
            ],
            success: function(response) {
                if (Array.isArray(response) && response.length > 0) {
                    updateStatus('#SUC-PRC-List-of-Graduates', response[0].status, response[0].remarks);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    };


    return {
        NONSUC: function() {
            _NONSUC_e_Forms_A();
            _NONSUC_e_Forms_B_C();
            _NONSUC_Form_E5_Faculty_Form();
            _NONSUC_PRC_List_of_Graduates();
            _NONSUC_e_Research();
        },
        SUC: function() {
            _SUC_PRC_List_of_Graduates();
            _SUC_NF_Research_Extension_Forms();
            _SUC_NF_Forms_GH();
            _SUC_NF_Forms_E2();
            _SUC_NF_Forms_E1();
            _SUC_NF_Forms_B();
            _SUC_NF_Forms_A();
        },
        load_NONSUC_e_Forms_A: function() {
            _NONSUC_e_Forms_A();
        }
        ,
        load_NONSUC_e_Forms_B_C: function() {
            _NONSUC_e_Forms_B_C();
        }
        ,
        load_NONSUC_Form_E5_Faculty_Form: function() {
             _NONSUC_Form_E5_Faculty_Form();
        }
        ,
        load_NONSUC_PRC_List_of_Graduates: function() {
            _NONSUC_PRC_List_of_Graduates();
        },
        load_NONSUC_e_Research: function() {
            _NONSUC_e_Research();
        },
            load_SUC_PRC_List_of_Graduates:function(){_SUC_PRC_List_of_Graduates();},
            load_SUC_NF_Research_Extension_Forms:function(){_SUC_NF_Research_Extension_Forms();},
            load_SUC_NF_Forms_GH:function(){_SUC_NF_Forms_GH();},
            load_SUC_NF_Forms_E2:function(){_SUC_NF_Forms_E2();},
            load_SUC_NF_Forms_E1:function(){_SUC_NF_Forms_E1();},
            load_SUC_NF_Forms_B:function(){_SUC_NF_Forms_B();},
            load_SUC_NF_Forms_A:function(){_SUC_NF_Forms_A();}
        
    };
}();


// Initialize module
// ------------------------------

