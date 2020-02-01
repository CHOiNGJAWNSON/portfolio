<?php /* Template Name: single-column */ 

get_header();  
require("banner.php");
?> 

<section class="single-column-content"> 
	<div class="row"> 
		<div class="col-sm-12"> 
			<div class="wrapper"> 
				<div class="single-column-content-items">

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
</main> 

<?php get_footer();?>