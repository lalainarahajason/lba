<?php
/*
Template name: Carousel Template
*/

get_header();

if ( have_posts() ){

the_post();

$lebotheme_page_container_list = array();

$lebotheme_showcase_tax_query = null;
$lebotheme_showcase_category_filter	= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-showcase-filter-category' );

if( !empty( $lebotheme_showcase_category_filter ) ){
	
	$lebotheme_array_terms = explode( ",", $lebotheme_showcase_category_filter );
	$lebotheme_showcase_tax_query = array(
										array(
											'taxonomy' 	=> 'portfolio_category',
											'field'    	=> 'slug',
											'terms'    	=> $lebotheme_array_terms,
										),
									);
}
?>

		<!-- Main -->
		<div id="main">

			<!-- Main Content -->
			<div id="main-content">

				<!-- Showcase Holder -->
				<div id="showcase-carousel-holder" class="disable-drag <?php if( !lebotheme_get_theme_options('clapat_lebotheme_enable_ajax') ) { echo 'thumb-no-ajax'; } ?>"> 
					<div id="itemsWrapperLinks">
                                
						<!-- Showcase Slider -->
						<div id="showcase-slider" class="swiper-container">
							<div id="itemsWrapper" class="swiper-wrapper">
                            <?php

                            $lebotheme_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $lebotheme_args = array(
                                        'post_type' => 'lebotheme_portfolio',
                                        'paged' => $lebotheme_paged,
                                        'tax_query' => $lebotheme_showcase_tax_query,
                                        'posts_per_page' => 1000,
                                         );

                            $lebotheme_portfolio = new WP_Query( $lebotheme_args );

							$lebotheme_slides_count = 1;
							while( $lebotheme_portfolio->have_posts() ){

								$lebotheme_portfolio->the_post();
										
								$lebotheme_showcase_include	= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-showcase-include' );
											
								if( $lebotheme_showcase_include == "yes" ){
											
									$lebotheme_hero_properties = new lebothemeHeroProperties();
									$lebotheme_hero_properties->getProperties( get_post_type( get_the_ID() ) );
												
							?>
												
												<!-- Section Slide -->
												<div class="swiper-slide" data-slide="<?php echo esc_attr( sprintf( "%2d", $lebotheme_slides_count ) ); ?>">                                    
													<div class="img-mask">
														<div class="section-image">
															<img class="item-image grid__item-img" src="<?php echo esc_url( $lebotheme_hero_properties->image['url'] ); ?>" alt="<?php esc_attr_e('Slide Image', 'lebotheme') ?>" />
															<?php if( $lebotheme_hero_properties->video ) { ?>
															<div class="hero-video-wrapper">
																<video loop muted class="bgvid">
																	<?php if( !empty( $lebotheme_hero_properties->video_mp4 ) ) { ?>
																		<source src="<?php echo esc_url( $lebotheme_hero_properties->video_mp4 ); ?>" type="video/mp4">
																		<?php } ?>
																		<?php if( !empty( $lebotheme_hero_properties->video_webm ) ) { ?>
																		<source src="<?php echo esc_url( $lebotheme_hero_properties->video_webm ); ?>" type="video/webm">
																		<?php } ?>
																</video>
															</div>
															<?php } ?>
														</div>                                                
														<img class="grid__item-img grid__item-img--large" src="<?php echo esc_url( $lebotheme_hero_properties->image['url'] ); ?>" alt="<?php esc_attr_e('Slide Image', 'lebotheme') ?>" />
													</div>
													<div class="move-caption">
														<div class="outer">                            
															<div class="inner">                        
																<?php if( lebotheme_get_theme_options('clapat_lebotheme_enable_ajax') ) { ?>
																<div class="move-title" data-swiper-parallax-x="-200%"><span><?php echo wp_kses_post( $lebotheme_hero_properties->caption_title ); ?></span></div>
																<a data-type="page-transition" href="<?php the_permalink(); ?>"></a>
																<?php } else { ?>
																<a data-type="page-transition" href="<?php the_permalink(); ?>">
																	<div class="move-title" data-swiper-parallax-x="-200%"><span><?php echo wp_kses_post( $lebotheme_hero_properties->caption_title ); ?></span></div>
																</a>
																<?php }  ?>
															</div>                            
														</div>
													</div>
													<div class="move-caption stroked">
														<div class="outer">                            
															<div class="inner">                        
																<div class="move-title thumb-link" data-swiper-parallax-x="-200%" data-firstline="<?php echo esc_attr( lebotheme_get_theme_options( 'clapat_lebotheme_view_project_caption_first' ) ); ?>" data-secondline="<?php echo esc_attr( lebotheme_get_theme_options( 'clapat_lebotheme_view_project_caption_second' ) ); ?>"><span><?php echo wp_kses_post( $lebotheme_hero_properties->caption_title ); ?></span></div>
																<div class="subtitle" data-swiper-parallax-x="-60%"><span><?php echo wp_kses_post( $lebotheme_hero_properties->caption_subtitle ); ?></span></div>
															</div>                            
														</div>
													</div>  
												</div>
												<!--/Section Slide -->
												
						<?php
												
									$lebotheme_slides_count++;
								}

							}

                            wp_reset_postdata();
                            
                            ?>
                            </div>								
						</div>
					</div>
				</div>
                <!-- Showcase Holder -->
				
			</div>
			<!-- /Main Content -->

		</div>
        <!--/Main -->

<?php

}

get_footer();

?>
