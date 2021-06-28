<?php

if( !function_exists('lebotheme_render_footer_social_links' ) )
{
	function lebotheme_render_footer_social_links(){

		global $lebotheme_social_links_icons;
		$lebotheme_social_links = "";
		for( $idx = 1; $idx <= lebotheme_MAX_SOCIAL_LINKS; $idx++ ){

			$social_name = lebotheme_get_theme_options( 'clapat_lebotheme_footer_social_' . $idx );
			$social_url  = lebotheme_get_theme_options( 'clapat_lebotheme_footer_social_url_' . $idx );

			if( $social_url ){

				if( lebotheme_get_theme_options( 'clapat_lebotheme_social_links_icons' ) ){
					
					$lebotheme_social_links .= '<li><span class="parallax-wrap"><a class="parallax-element" href="' . esc_url( $social_url ) . '" target="_blank"><i class="fa fa-'. esc_attr( $lebotheme_social_links_icons[ $social_name ] ) . '"></i></a></span></li>';
				}
				else {
					
					$lebotheme_social_links .= '<li><span class="parallax-wrap"><a class="parallax-element" href="' . esc_url( $social_url ) . '" target="_blank">' . wp_kses_post( $social_name ) . '</a></span></li>';
				}

			}

		}
		
		if( !empty( $lebotheme_social_links ) ){
?>
						<div class="socials-wrap disable-drag">            	
							<div class="socials-icon"><i class="fa fa-share-alt" aria-hidden="true"></i></div>
							<div class="socials-text"><?php echo wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_footer_social_links_prefix') ); ?></div>
							<ul class="socials">
								<?php echo wp_kses_post( $lebotheme_social_links ); ?>
							</ul>
						</div>
<?php			
		
		}

	}
}

lebotheme_render_footer_social_links();

?>
