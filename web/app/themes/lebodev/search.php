<?php
/**
 * The template for displaying Search Results pages
*/

get_header();

$lebotheme_blog_layout = lebotheme_get_theme_options( 'clapat_lebotheme_blog_layout' );

?>
		
	
		<!-- Hero Section -->
        <div id="hero">
           <div id="hero-styles">
                <div id="hero-caption">
                    <div class="inner text-align-left">						
						<div class="hero-title"><span><?php echo wp_kses_post( get_search_query() ); ?></span></div>
                        <div class="hero-subtitle"><?php echo wp_kses_post( esc_html__( 'Search Results', 'lebotheme') ); ?></div> 
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

						if( have_posts() ){
						
							while( have_posts() ){

								the_post();

								get_template_part( 'sections/blog_post_section' );

							}
						} else{

							echo '<h4 class="search_results">' . esc_html__('No posts found', 'lebotheme') . '</h4>';

						}

					?>
					
				<!-- /Blog-Content -->
				</div>

				<?php

					lebotheme_pagination();
				?>
			</div>
			<!-- /Blog-->
		</div>
		<!--/Main Content-->
	
<?php

get_footer();

?>