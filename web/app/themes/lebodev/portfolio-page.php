<?php
/*
Template name: Portfolio Template
*/
get_header();

if ( have_posts() ){

the_post();

$lebotheme_portfolio_tax_query = null;
$lebotheme_portfolio_category_filter	= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-portfolio-filter-category' );

$lebotheme_array_terms = null;
if( !empty( $lebotheme_portfolio_category_filter ) ){
	
	$lebotheme_array_terms = explode( ",", $lebotheme_portfolio_category_filter );
	$lebotheme_portfolio_tax_query = array(
										array(
											'taxonomy' 	=> 'portfolio_category',
											'field'		=> 'slug',
											'terms'		=> $lebotheme_array_terms,
											),
									);
}
?>
				
		<!-- Main -->
		<div id="main">
		
			<?php
		
			// display hero section
			get_template_part('sections/hero_section'); 
		
			?>
			
			<!-- Main Content -->
			<div id="main-content">
				<div id="main-page-content">
				
					<!-- Portfolio Wrap -->
					<div id="itemsWrapperLinks" class="portfolio-wrap">                
						<!-- Portfolio Columns -->
						<div id="itemsWrapper" class="portfolio scattered-grid <?php if( !lebotheme_get_theme_options('clapat_lebotheme_enable_ajax') ){ echo 'thumb-no-ajax'; } ?>">
						<?php

							$lebotheme_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$lebotheme_args = array(
										'post_type' => 'lebotheme_portfolio',
										'paged' => $lebotheme_paged,
										'tax_query' => $lebotheme_portfolio_tax_query,
										'posts_per_page' => 1000,
										 );

							$lebotheme_portfolio = new WP_Query( $lebotheme_args );
							
							$lebotheme_current_item_count = 1;

							while( $lebotheme_portfolio->have_posts() ){

								$lebotheme_portfolio->the_post();
								
								set_query_var('lebotheme_query_var_item_count', $lebotheme_current_item_count);

								get_template_part('sections/portfolio_section_item');
								
								$lebotheme_current_item_count++;
								
							}
							
							wp_reset_postdata();
						?>
						</div>
					</div>
					<!--/Portfolio -->
					
				</div>
                <!--/Main Page Content -->
				
				<?php
		
					// display hero section
					get_template_part('sections/page_navigation_section'); 
		
				?>
			</div>
			<!-- /Main Content -->
		</div>
        <!--/Main -->
<?php
			
}
	
get_footer();

?>