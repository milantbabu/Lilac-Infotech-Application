 // Preloader active code
$(window).on('load', function () {
    
    $('#loader').fadeOut('slow', function () {
        $(this).remove();
    });
});


$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
