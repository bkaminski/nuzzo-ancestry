//jQuery no-conflict mode
(function( $ ) {

    $( document ).ready(function() {
    
        // RESPONSIVE CONTROLS
        var $window = $(window);
        function checkWidth() {
    
            if ($window.width() < 976) {
                //do jQuery stuff
                
            };
            if ($window.width() >= 976) {
                //do jQuery stuff
                
            }
        }
        
        checkWidth();
        $(window).resize(checkWidth);
        
        // END RESPONSIVE CONTROL
        });	
    
    
    })( jQuery );