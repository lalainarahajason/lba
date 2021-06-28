<?php

get_header();

if ( have_posts() ){

the_post();
	$pageTitle = get_field('page-title', $post->ID);
?>
				
		<!-- Main -->
		<div id="main">
			
		
		<?php
		
			// display hero section
			get_template_part('sections/hero_section'); 
		
		?>
			<!-- Main Content --> 
			<div id="main-content">
				<?php if(is_home() || is_front_page()) : ?>
					<div class='page-title-wrapper'>
				<?php endif; ?>
				<?php if($pageTitle) : echo $pageTitle; endif;  ?>
				<?php if(is_home() || is_front_page()) : ?>
					</div>
				<?php endif; ?>
				<?php echo do_shortcode('[LeboSwiper]'); ?>
				<div id="main-page-content">
					
					<?php
							the_content();
							
							/* wp_link_pages( array(
												'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lebotheme' ),
												'after'  => '</div>',
										) );*/
					?>
												
					
					
				</div>
				<?php
		
					// display hero section
					//get_template_part('sections/page_navigation_section'); 
		
				?>
			</div>
			<!--/Main Content-->
		</div>
        <!--/Main -->
<?php
			
}
	
get_footer();

?>