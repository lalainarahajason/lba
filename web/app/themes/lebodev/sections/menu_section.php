			<?php
				
				$lebotheme_menu_breakpoint = "1025";
				$lebotheme_menu_additionaL_text = "";
				if( lebotheme_get_theme_options( 'clapat_lebotheme_enable_fullscreen_menu' ) ){
					
					$lebotheme_menu_breakpoint = "10025";
				}
				
				$lebotheme_theme_location = '';
				if( has_nav_menu( 'primary-menu' ) ){
					
					$lebotheme_theme_location = 'primary-menu';
				}
				wp_nav_menu(array(
					'theme_location' => $lebotheme_theme_location,
					'container' 	 => 'nav',
					'items_wrap' 	 => '<div class="nav-height">
						<div class="outer">
							<div class="inner bg-inner-container">
								<!--div class="swiper-container swiper-background-container ">
									<div class="swiper-wrapper">
									</div>
								</div-->
								<ul id="%1$s" data-breakpoint="' . esc_attr( $lebotheme_menu_breakpoint ) . '" class="flexnav %2$s">%3$s</ul></div>' . wp_kses_post( $lebotheme_menu_additionaL_text ) . '</div></div>',
					'walker' => new LeboMenu_Walker()
				));

			?>
