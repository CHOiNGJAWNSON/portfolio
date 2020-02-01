( function( $ ) {
  wp.customize( 'custom_front_page_text', function( value ) {
    value.bind( function( to ) {
      $( '#front-page-styles.css' ).html( to );
    } );
  } ); 
  wp.customize( 'custom_plugin_css', function( value ) {
    value.bind( function( to ) {
      $( '#custom-plugin-css' ).html( to );
    } );
  } );

} )( jQuery );