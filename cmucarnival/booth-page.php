<?php /* Template Name: booth-page*/ 

get_header();  
require("banner.php");
?>  

<section class="top-content"> 
	<div class="row"> 
		<div class="col-sm-12"> 
			<div class="wrapper"> 
				<div class="top-content-items">

			<?php 
			if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();  
		
				the_content();
	
	
				} 
			}else{ 
	
			} 
		
?>   			</div>
			</div>
		</div>
	</div>
</section> 

	<!--display categories associated with page  -->
	<section class="events">   
		<div class="row"> 
			<div class="events-hold col-sm-12">
					<div class="wrapper events-wrapper">  

						<?php  
						
					$query = new WP_Query( array( 'category_name' => 'booth-post') );   
					
					if ( $query->have_posts() ) { 

						$boxNum = 0;  
					  while ( $query->have_posts() ) { 
							$query->the_post();  
							
								if($boxNum < 1){ 
								
								
								?> 
								<div class="row">
								<div class="col-sm-6 event-text-hold">  
									<div class="left-text"> 
									
									<?php  
									
									 the_title('<h2 class="left-text-header">','</h2>'); 
									  the_content(); ?>
									</div>
								</div>  
								
								<div class="col-sm-6 event-image-hold">  
									<div class="right-image">   
									
										<?php  
										if ( has_post_thumbnail() ) {
						
											the_post_thumbnail();   
											
											
										}else{}
											?>
											
									
									</div> 
								</div>
							</div>
						<?php 
						
							$boxNum++;
						}elseif($boxNum == 1){  

								
								?> 
								
								<div class="row">
								<div class="col-sm-6 event-image-hold">  
									<div class="left-image">   
									
										<?php  
										if ( has_post_thumbnail() ) {
						
											the_post_thumbnail();   
											
											
										}else{}
											?>
											
									
									</div> 
								</div> 
									<div class="col-sm-6 event-text-hold">  
									<div class="right-text"> 
									
									<?php  
									
									the_title('<h2 class="right-text-header">','</h2>'); 
									the_content(); ?>
									</div>
								</div> 
								</div>
							<?php 	
						
							$boxNum = 0;
						}else{ 
						
						}
						
						}   
						
					  }else{ 
					
						echo "No post to display";
					
					}
								
						?>
								
				</div>	
            </div>
		</div>		
	</section>
</main> 

<?php get_footer();?>