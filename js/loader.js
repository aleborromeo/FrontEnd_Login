window.onload = function(){
    $('#loader').fadeOut();
   // $('body').removeClass('hidden') es para el scrollbar
   setTimeout(function() {
    document.getElementById("#loader").style.display = "none"; 
}, 10000); //
}