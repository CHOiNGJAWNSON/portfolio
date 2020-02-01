( function( $ ) {  
//live preview of all header and description front page text 
  wp.customize( 'custom_front_page_text1', function( value ) {
    value.bind( function( to ) {
      $( '.agenda-header' ).text( to );
    } );
  } );   
  //header one description live preview 
  wp.customize( 'custom_description1', function( value ) {
    value.bind( function( to ) {
      $( '.agenda-description' ).text( to );
    } );
  } ); 
   
   wp.customize( 'custom_description2', function( value ) {
    value.bind( function( to ) {
      $( '.about-description p' ).text( to );
    } );
  } );  
  
  wp.customize( 'custom_front_page_text3', function( value ) {
    value.bind( function( to ) {
      $( '.traditions-header' ).text( to );
    } );
  } );
  
  wp.customize( 'custom_description3', function( value ) {
    value.bind( function( to ) {
      $( '.traditions-description' ).text( to );
    } );
  } );  
  
  
  //Live preview of all custom colors: header,description, link, and button texts and background 
   
   //custom colors of headers and their description 
   wp.customize( 'custom_colors1', function( value ) {
    value.bind( function( to ) {
      $( '.agenda-header, .agenda-description,.traditions-header, .traditions-description').css({
					color: to
				}); 
		});   
   });
		
	
	wp.customize( 'custom_colors2', function( value ) {
    value.bind( function( to ) {
      $( '.about-header, .about-description, .committee-content').css({
					color: to
				}); 
		});   
   });
	
   
   //custom colors of links that appear in the boxes on front page 
   
   wp.customize( 'title_box_colors', function( value ) {
    value.bind( function( to ) {
      $( '.agenda-title, .tradition-title').css({
					color: to
				}); 
		});   
   });  
  
} )( jQuery );
