<?php

get_header();

if ( have_posts() ){

$lebotheme_blog_layout = lebotheme_get_theme_options( 'clapat_lebotheme_blog_layout' );

if(isset($_GET['test'])) {
	echo "<pre>";
	print_r(array("test" => 1));
	echo "</pre>";
}

?>
	
	<!-- Main -->
	<div id="main">
	
		<!-- Hero Section -->
        <div id="hero">
           <div id="hero-styles" class="parallax-onscroll">
                <div id="hero-caption" class="text-align-center">
                    <div class="inner">
						<div class="scale-wrapper">
							<div class="hero-title"><?php  echo wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_blog_default_title') ); ?></div> 
						</div>
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
					while( have_posts() ){

						the_post();

						get_template_part( 'sections/blog_post_section' );
						
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

}
	
get_footer();

?>