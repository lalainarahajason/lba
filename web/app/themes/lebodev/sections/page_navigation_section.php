<?php

	$lebotheme_page_nav_enable				= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-enable-navigation' );
	$lebotheme_page_caption_first_line		= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-navigation-caption-first-line' );
	$lebotheme_page_caption_second_line	= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-navigation-caption-second-line' );
	$lebotheme_next_url								= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-navigation-next-url' );
	$lebotheme_next_title_first_row				= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-navigation-next-title' );
	$lebotheme_next_title_second_row		= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-navigation-next-subtitle' );
	
	if( $lebotheme_page_nav_enable ){
?>
				<!-- Page Navigation --> 
                <div id="page-nav">
					<div class="next-page-wrap">
						<div class="next-page-title">
							<div class="inner">                                        
								<div class="page-title-wrapper has-animation">
									<a class="page-title next-ajax-link-page disable-drag" data-type="page-transition" data-firstline="<?php echo esc_attr( $lebotheme_page_caption_first_line ); ?>" data-secondline="<?php echo esc_attr( $lebotheme_page_caption_second_line ); ?>" href="<?php echo esc_url( $lebotheme_next_url	); ?>">
										<h1 class="hero-move-title title-reverse-backward"><span><?php echo wp_kses_post( $lebotheme_next_title_first_row ); ?></span></h1>
										<h1 class="hero-move-title title-reverse-forward"><span><?php echo wp_kses_post( $lebotheme_next_title_second_row ); ?></span></h1>
									</a>
								</div>
							</div>                   
						</div>
					</div>
				</div>      
				<!--/Page Navigation -->
<?php } ?>