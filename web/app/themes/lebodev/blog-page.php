<?php
/*
Template name: Blog Template
*/
get_header();

while ( have_posts() ){

the_post();

$lebotheme_blog_layout = lebotheme_get_theme_options( 'clapat_lebotheme_blog_layout' );

?>
			
	
	<?php 
		
		// display hero section, if any
		get_template_part('sections/hero_section'); 
		
	?>
		<!-- Main Content -->
    	<div id="main-content">
			<!-- Blog-->
			<div id="blog" class="<?php echo sanitize_html_class( $lebotheme_blog_layout ); ?>">
				<!-- Blog-Content-->
				<div data-fx="1">
				<?php 
						
					$lebotheme_paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					
					$lebotheme_args = array(
						'post_type' => 'post',
						'paged' => $lebotheme_paged
					);
					$lebotheme_posts_query = new WP_Query( $lebotheme_args );

					// the loop
					while( $lebotheme_posts_query->have_posts() ){

						$lebotheme_posts_query->the_post();

						get_template_part( 'sections/blog_post_section' );
						
					}
							
				?>
				</div>
				<!-- /Blog-Content -->
					
				<?php
						
					lebotheme_pagination( $lebotheme_posts_query );

					wp_reset_postdata();
				?>
			</div>
			<!-- /Blog-->
		</div>
		<!--/Main Content-->
	
<?php

}
	
get_footer();

?>
