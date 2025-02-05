/* ------------------------------------------------------------------------------
 *
 *  # Fullcalendar basic options
 *
 *  Demo JS code for extra_fullcalendar_views.html and extra_fullcalendar_styling.html pages
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var FullCalendarBasic = function() {


    //
    // Setup module components
    //

    // Basic calendar
    var _componentFullCalendarBasic = function() {
        if (!$().fullCalendar) {
            console.warn('Warning - fullcalendar.min.js is not loaded.');
            return;
        }

        // Add demo events
        // ------------------------------

        // Event colors
        
        var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
        
            var eventsServer = new server('predefined/calendar_scheds');
             eventsServer.done(function(data){
                   
                   $('.fullcalendar-event-colors').fullCalendar({
            header: {
                left: 'prev,next today ',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: yyyy+"-"+mm+"-"+dd,
            editable: false,
            events: data,
            isRTL: $('html').attr('dir') == 'rtl' ? true : false
        });
                  
              }
              )
                                                                                           
        
        
       
        
        
        
        
        
        
        /* this is the format 
        var eventColors = [
         
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2022-11-12T10:30:00',
                end: '2022-11-15T12:30:00',
                color: '#FF7043'
            }
        ];
*/

        // Initialization
        // ------------------------------

    

        // Event colors


    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentFullCalendarBasic();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    FullCalendarBasic.init();
});
