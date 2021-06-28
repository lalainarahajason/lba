<?php
/**
 * The template for displaying Tag Search Results pages
 */

get_header();

$lebotheme_blog_layout = lebotheme_get_theme_options( 'clapat_lebotheme_blog_layout' );

?>
		
	<!-- Main -->
	<div id="main">
		
		<!-- Hero Section -->
        <div id="hero">
           <div id="hero-styles">
                <div id="hero-caption" class="text-align-center">
                    <div class="inner">
						<div class="hero-title"><?php echo wp_kses_post( single_tag_title('', false) ); ?></div> 
                    </div>
                </div>                    
            </div>
        </div>                      
        <!--/Hero Section -->
		
    	<!-- Main Content -->
    	<div id="main-content">
			<!-- Blog-->
			<div id="blog" class="<?php echo sanitize_html_class( $lebotheme_blog_layout ); ?>">
				<!-- Blog-Content-->
				<div data-fx="1">
				<?php 
						
					// the loop
					if( have_posts() ){
					
						while( have_posts() ){

							the_post();

							get_template_part( 'sections/blog_post_section' );
							
						}
					}
					else {
						
						echo '<h4 class="search_results">' . esc_html__('No posts found with this tag', 'lebotheme') . '</h4>';
					}
				?>
			
				<!-- /Blog-Content-->
				</div>
				<?php
					
				lebotheme_pagination();

				?>
			</div>
			<!-- /Blog-->
		</div>
		<!--/Main Content-->
	</div>
	<!-- /Main -->
<?php

get_footer();

?>