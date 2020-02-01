<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cmucarnival
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<?php 
$pageID = get_the_ID();
?>
<body <?php body_class(); ?>>  
			<?php  
				
				if ( has_post_thumbnail($pageID)) {
				
					$featured_img_url = get_the_post_thumbnail_url($pageID);  

				}else{}
					
				?>

	<div class="container-fluid">  
		<div class="row">   
		
			<!--Setting the banner image for the homepage, if theres a featured image, display it, if not use a default background color --> 
			
					<?php  
				
						if ( has_post_thumbnail($pageID)) {
				
							$featured_img_url = get_the_post_thumbnail_url($pageID);   
						?>
					      <header id="masthead" class="banner-hold col-sm-12" style="background-image:url(<?php echo $featured_img_url ?>);">  
						<?php
						}else{ 
						
						?>
						  <header id="masthead" class="banner-hold col-sm-12" style="background-color:#000;">   
					<?php
					
						}
					
						?>
	
				<div class="row navigation-content">  
					<div class="col-sm-12">
				<nav class="main-navigation">
						<div class="navbar nav" role="navigation">
						<div class="left-nav-menu menu-block">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'left-menu',
				'menu_id'        => 'left-primary',
			) );
			?>   
					</div> 
						<div class="logo-hold menu-block">   
							<div class="logo navbar-brand">
						
							<?php  
							
							if ( function_exists( 'the_custom_logo' ) ) {
    				
								the_custom_logo();
				
							}   
							
							?>  
							</div> 
						</div> 
								
								<button class="mobile-menu-bttn" id="menuBttn">
									<span style="color:#fff;">&#9776 </span>
									</button>
							<div class="mobile-menu">        
								<?php
								
								wp_nav_menu( array(
								'theme_location' => 'left-menu',
									'menu_id'        => 'left-primary',
										) ); 
										
								wp_nav_menu( array(
								'theme_location' => 'right-menu',
								'menu_id'        => 'right-primary',
								) );
										
								?> 
							
							</div>
							<div class="right-nav-menu menu-block">   
							
								<?php
								wp_nav_menu( array(
								'theme_location' => 'right-menu',
								'menu_id'        => 'right-primary',
								) );
								?>  
							
							</div>
				</div>    
			</nav> 
			</div>
			</div><!-- #site-navigation -->  
				<div class="row banner"> 
					<div class="col-sm-12"> 
					
						<?php if ( is_front_page()){ ?>
						
						<div class="banner-content"> 
							 <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			                 <p class="site-description"><?php bloginfo( 'description' ); ?></p>  
								<?php $meta_value=get_post_meta($pageID,'promo-video-link',true); ?> 
								
							 <a class="video-button" href="<?php echo $meta_value; ?>" target="_blank">Check Out This Years Promo Video!</a>
									</div>	
					<?php
				
						}else{  
						
						?> 
						
						 
									<div class="banner-content-single-column"> 
				
									<?php the_title('<h1 class="site-title column-title">','</h1>'); ?> 
							</div>
			                
					<?php			
						}  
				
				?>
					</div> 
				</div>
	</header><!-- #masthead -->

	<main class="main-content col-md-12">
