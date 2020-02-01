<?php
/**
 * cmucarnival Theme Customizer
 *
 * @package cmucarnival
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 

 
function cmucarnival_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title',
			'render_callback' => 'cmucarnival_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'cmucarnival_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'cmucarnival_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cmucarnival_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cmucarnival_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cmucarnival_customize_preview_js() {
	wp_enqueue_script( 'cmucarnival-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'cmucarnival_customize_preview_js' ); 

/*


//settings and controls for header description text 

for($i=1;$i<=3;$i++){ 

$wp_customize->add_setting( 'custom_description'. $i, array(
	'default' => '',  
	'transport' => 'postMessage'
) ); 

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_description' . $i, array(
	'label' => 'Description For Section'. $i,  
	'type' => 'textarea',
	'section' => 'custom_text',
	'settings' => 'custom_description'. $i
	
) ) );   
}
//settings and controls for header and description text custom colors 

*/  

//ftn lives on its own. method is apart of a class  

//My own custom features 

function custom_home_page_colors($wp_customize){
  
//adding my custom sections to the customizer

$wp_customize->add_section('custom_image',array(  
 'title' => __('Custom Image','cmucarnival'),   
 'active_callback' => 'is_front_page'
)); 
 
 
 $wp_customize->add_section('custom_text',array(  
 'title' => __('Custom Text','cmucarnival'),   
 'active_callback' => 'is_front_page'
));
 
$wp_customize->add_section('custom_colors',array(  
 'title' => __('Custom Colors','cmucarnival'),   
 'active_callback' => 'is_front_page'
));  



//adding the setting and control for the custom background image  
//set to display for homepage    

$wp_customize->add_setting( 'about_image', array(
	'default' => '',  
	 'transport' => 'refresh'
) ); 


$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image', array(
	'label' => __('Upload an Image','cmucarnival'),  
	'section' => 'custom_image',
	'settings' => 'about_image'
	
) ) );    
 
 /*Adding the settings and controls for custom header and description text for front page */ 
 
 for($i=1;$i<=3;$i++){ 


$wp_customize->add_setting( 'custom_front_page_text'. $i, array(
	'default' => 'Header',  
	 'transport' => 'postMessage'
) ); 

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_front_page_text' . $i, array(
	'label' => 'Header Text For Section'. $i,  
	'type' => 'text',
	'section' => 'custom_text',
	'settings' => 'custom_front_page_text'. $i
	
) ) );   


} 
 
 for($i=1;$i<=3;$i++){ 

$wp_customize->add_setting( 'custom_description'. $i, array(
	'default' => '',  
	'transport' => 'postMessage'
) ); 

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_description' . $i, array(
	'label' => 'Description For Section'. $i,  
	'type' => 'textarea',
	'section' => 'custom_text',
	'settings' => 'custom_description'. $i
	
) ) );   
}
 
 

//adding the custom link text box colors to homepage 

$wp_customize->add_setting('title_box_colors', array(
	'default' => '#ffffff',   
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
) ); 

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_box_colors', array(
	'label' =>  __( 'Header and Sidebar Text Color', 'cmucarnival' ),
	'description' => __( 'Applied to the header on small screens and the sidebar on wide screens.', 'cmucarnival' ),
	'section' => 'custom_colors',
	'settings' => 'title_box_colors'
	
) ) );  


for($i=1;$i<=2;$i++){ 

$wp_customize->add_setting( 'custom_colors'. $i, array(
	'default' => '#ffffff',  
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
) ); 

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_colors' . $i, array(
	'label' => 'Custom Color Section'. $i,  
	'section' => 'custom_colors',
	'settings' => 'custom_colors'. $i
	
) ) ); 
}  
}add_action( 'customize_register', 'custom_home_page_colors' ); 


function my_styles_method() {
	
	wp_enqueue_style( 'front-page-styles', get_template_directory_uri(). '/custom-styles/front-page-styles.css','all' ); 
        $color = get_theme_mod( 'title_box_colors','#ffffff' ); //E.g. #FF0000 
		$textColorOne = get_theme_mod( 'custom_colors1','#ffffff' ); 
		$textColorTwo = get_theme_mod( 'custom_colors2','#000000' ); 
		$textColorThree = get_theme_mod( 'custom_colors3','#ffffff' );  
		
		
		if(!empty($color)){
	
        $custom_css = '
                .agenda-title, .tradition-title{
                        color: '.$color.';
                }';
        wp_add_inline_style( 'front-page-styles', $custom_css ); 
		
		}else{ 
		
		  $color = "#fff"; 
		  wp_add_inline_style( 'front-page-styles', $color );
		} 
		
		if(!empty($textColorOne)){
	
        $add_css = '
                .agenda-header, .agenda-description,.traditions-header, .traditions-description{
                        color: '.$textColorOne.';
                }';
        wp_add_inline_style( 'front-page-styles', $add_css ); 
		
		}else{ 
		
		  $default_color = "#000"; 
		  wp_add_inline_style( 'front-page-styles',$default_color );
		} 
		
		if(!empty($textColorTwo)){
	
        $in_css = '
                .about-header, .about-description,.committee-content {
                        color: '.$textColorTwo.';
                }';
        wp_add_inline_style( 'front-page-styles', $in_css ); 
		
		}else{ 
		
		  $default_color = "#000"; 
		  wp_add_inline_style( 'front-page-styles',$default_color );
		} 	
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );



function cmusite_preview_js() {
  
wp_enqueue_script( 'cmucarnival-customize-preview', get_template_directory_uri() . '/custom-scripts/customize-preview.js', array( 'customize-preview') );
  
}
add_action( 'customize_preview_init', 'cmusite_preview_js' ); 