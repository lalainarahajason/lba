<?php
/**
 * The template for displaying Category Search Results pages
 */

get_header();

$lebotheme_blog_layout = lebotheme_get_theme_options( 'clapat_lebotheme_blog_layout' );

?>
		
	
		
		<!-- Hero Section -->
        <div id="hero">
           <div id="hero-styles">
                <div id="hero-caption">
                    <div class="inner text-align-left">
						<div class="hero-title"><span><?php echo wp_kses_post( single_cat_title('', false) ); ?></span></div> 
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
					if ( have_posts() ) {
						?>
						<header class="page-header mb-5 pb-5">
							<h4>Réalisations</h4>
							<h1 class="text-center">Notre expertise, <br/> au service de vos <strong>projets</strong></h1>
						</header><!-- .page-header -->
						
						<div class="d-flex flex-wrap">
							<?php
							// Start the loop.
							while ( have_posts() ) {
								the_post();

								get_template_part( 'loop-templates/content', 'realisation' );
							} ?>
						</div>
					<?php 
					} else {
						get_template_part( 'loop-templates/content', 'none' );
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
	
<?php

get_footer();

?>