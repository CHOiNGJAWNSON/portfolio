<?php  

get_header();   

$mods = get_theme_mods();

?>     


		<section class="agenda-section">   
			<div class="row agenda-content-wrap"> 
				<div class="agenda-content col-sm-12"> 
					<div class="wrapper"> 
					
					<!---Validing header text and description text input before we use it  --> 
					
							<?php 
							
								if(!empty($mods['custom_front_page_text1']) && !empty($mods['custom_description1']) ){ 
								
									$text = $mods['custom_front_page_text1']; 
									$textDescription = $mods['custom_description1'];
								?> 
								
								<h1 class="agenda-header"><?php echo esc_html( $text ); ?></h1> 
								 <div class="agenda-description"><p><?php echo esc_html( $textDescription ); ?></p></div>
								
								<?php 
								}else{ }
							
							     ?>
							
							<div class="row agenda-items">
			
			
							<?php 
				
									$args= array( 
							
								'post_type' => 'page', 
								'post_name__in' => array('events','schedule','webcam') 
								);
							
						
								$the_query = new WP_Query($args); 
					
								if($the_query->have_posts()){ 
					
						
								while($the_query->have_posts()){ 
						
									$the_query->the_post(); 
							
									if(has_post_thumbnail()){ 
							 
									$featured_img_url = get_the_post_thumbnail_url(get_the_ID());  
									$head = get_the_title();  
									
							  
								?>  
								   
								 <div class="agenda-item col-sm-4">  
								  <a href="<?php the_permalink(); ?>" class="agenda-link" style="background-image:url(<?php echo $featured_img_url ?>);">
								     <h3 class="agenda-title"><?php echo esc_html($head); ?></h3>
								   </a>
							      </div> 
							<?php 
							 }else{ }
							 
						  } 
						
							}else{ 
					
								echo 'No post';
							}
							?>
						
					
				</div> 
			</div>
		</div>
	</div> 
</section>  
	
	<section class="about-section">  
		<div class="row"> 
			<div class="col-md-12 about-image" style="background-image:url('<?php echo $mods["about_image"] ?>')">   
					<div class="wrapper wrap">
						<div class="about-content"> 
						
						<!---Validing header text and description text input before we use it  --> 
					
							<?php 
							
								if(!empty($mods['custom_description2'])){ 
								
									$textArea = $mods['custom_description2']; 
									
								?> 
								
								<h1 class="about-header">About</h1>
								<div class="about-description"><p><?php echo esc_html( $textArea ); ?></p></div>  
								
								<?php 
								}else{ }
							
							     ?>
				</div>
			</div> 
			</div>
		</div> 
	</section>

			<section class="traditions-section">   
				<div class="row traditions-content-wrap"> 
					<div class="traditions-content col-sm-12"> 
						<div class="wrapper"> 
			
								<!---Validing header text and description text input before we use it  --> 
					
								<?php 
							
								if(!empty($mods['custom_front_page_text3']) && !empty($mods['custom_description3']) ){ 
								
									$tex = $mods['custom_front_page_text3'];
									$texDescript= $mods['custom_description3'];
								?> 
								
									<h1 class="traditions-header"><?php echo esc_html( $tex ); ?> </h1>  
									<div class="traditions-description"><p><?php echo esc_html( $texDescript ); ?></p></div>
								<?php 
								}else{ }
							
							     ?>
			
							<div class="row traditions-items">
			
			
								<?php 
				
								$args= array( 
							
								'post_type' => 'page', 
								'post_name__in' => array('buggy','booth,','mobot')  
								);
							
						
								$the_query = new WP_Query($args); 
					
								if($the_query->have_posts()){ 
					
						
									while($the_query->have_posts()){ 
						
										$the_query->the_post(); 
							
										if(has_post_thumbnail()){ 
							 
									$featured_img_url = get_the_post_thumbnail_url(get_the_ID());  
										$title = get_the_title();
							  
										?>  
								   
									<div class="traditions-item col-sm-4">  
										<a href="<?php the_permalink(); ?>" class="tradition-link" style="background-image:url(<?php echo $featured_img_url ?>);">
										<h3 class="tradition-title"><?php echo esc_html($title); ?></h3>
										</a>
										</div> 
									<?php 
									}else{ 
							 
										}
							 
							
							
							
								} 
						
							}else{ 
					
							echo 'No post';
							}
							?>
						
					
				</div> 
			</div>
		</div>
	</div> 
</section>  

	<section class="committee-section">  
		<div class="row">  
		
				<?php 
						$que= array( 
						
						'post_type' => 'page', 
						'pagename' => 'commitee' );
							
						
					$new_query = new WP_Query($que); 
					
					if($new_query->have_posts()){ 
					
						
						while($new_query->have_posts()){ 
						
							$new_query->the_post(); 
							
							 if(has_post_thumbnail()){ 
							 
							  $img_url = get_the_post_thumbnail_url(get_the_ID());  
							  
							 }else{}  
							 
							 $header = '<h1>' . get_the_title() . '</h1>'; 
							 $content = get_the_content(); 
							 $bttn = get_the_permalink(get_the_ID());
							 
						} 
					}
							  ?> 
			
			<div class="col-md-12 committee-image" style="background-image:url('<?php echo $img_url; ?>');">   
					<div class="wrapper wrap">
						<div class="committee-content">
						       <?php echo  $header; ?>
						<div class="committee-description"><p><?php echo esc_html($content); ?></p></div>   

				 <a href="<?php echo $bttn;?>" class="committee-button">See Our Team!</a>
				</div>
			</div> 
			</div>
		</div> 
	</section>    
<?php get_footer();?>