( function( $ ) {  

$( "#menuBttn" ).on("click",function() {
  
   $("ul").toggle("slow"); 
   $("nav").toggleClass('open');
  
  
});

} )( jQuery );