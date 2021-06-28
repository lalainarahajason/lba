<?php

$full_image = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-hero-img' );
$lebotheme_thumbnail_size = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-thumbnail-size' );

if( $full_image && isset( $full_image['url'] ) ){

    $lebotheme_item_classes 	= '';
    $lebotheme_item_categories 	= '';
	$lebotheme_item_cats = get_the_terms($post->ID, 'portfolio_category');
	if($lebotheme_item_cats){

		foreach($lebotheme_item_cats as $item_cat) {
            $lebotheme_item_classes 	.= $item_cat->slug . ' ';
            $lebotheme_item_categories 	.= $item_cat->name . ', ';
        }

		$lebotheme_item_categories = rtrim($lebotheme_item_categories, ', ');

	}
	
	$lebotheme_current_item_count = get_query_var('lebotheme_query_var_item_count');
	
	$item_url = get_the_permalink();

?>
						<div class="item <?php echo esc_attr( $lebotheme_thumbnail_size ); ?> <?php echo esc_attr( $lebotheme_item_classes ); ?> disable-drag" data-item="<?php echo esc_attr( $lebotheme_current_item_count ); ?>">
							<div class="item-parallax enabled">
								<div class="item-appear">
									<div class="item-content">
										<a class="item-wrap ajax-link-project" data-type="page-transition" href="<?php echo esc_url( $item_url ); ?>"><?php if( lebotheme_get_theme_options('clapat_lebotheme_enable_ajax') ){ ?></a><?php } ?>
											<div class="item-wrap-image">
												<img src="<?php echo esc_url( $full_image['url'] ); ?>" class="item-image grid__item-img" alt="<?php esc_attr_e('Slide Image', 'lebotheme') ?>" />
												<?php if( lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-video' ) ){ 
													$lebotheme_video_webm_url = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-video-webm' );
													$lebotheme_video_mp4_url = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-video-mp4' );
												?>
												<div class="hero-video-wrapper">
													<video loop muted class="bgvid">
													<?php if( !empty( $lebotheme_video_mp4_url ) ){ ?>
														<source src="<?php echo esc_url( $lebotheme_video_mp4_url ); ?>" type="video/mp4">
													<?php } ?>
													<?php if( !empty( $lebotheme_video_webm_url ) ){ ?>
														<source src="<?php echo esc_url( $lebotheme_video_webm_url ); ?>" type="video/webm">
													<?php } ?>
													</video>
												</div>
												<?php } ?>
                                            </div>
                                            <img class="grid__item-img grid__item-img--large" src="<?php echo esc_url( $full_image['url'] ); ?>" alt="<?php esc_attr_e('Slide Image', 'lebotheme') ?>" />
										<?php if( !lebotheme_get_theme_options('clapat_lebotheme_enable_ajax') ){ ?></a><?php } ?>
                                    </div>
								</div>
								<div class="item-caption-wrapper">
									<div class="item-caption">
										<h2 class="item-title"><?php the_title(); ?></h2>
										<h4 class="item-cat"><?php echo wp_kses_post( $lebotheme_item_categories ); ?></h4>
									</div>
								</div>
							</div>
						</div>

<?php

}
?>
