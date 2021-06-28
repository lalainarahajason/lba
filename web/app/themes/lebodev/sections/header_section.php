<?php
// retrieve the path to the logo displayed in the menu bar
$lebotheme_logo = lebotheme_get_theme_options( 'clapat_lebotheme_logo' );
$lebotheme_logo_path = esc_url( $lebotheme_logo );
if( !$lebotheme_logo_path ){
    $lebotheme_logo_path = get_template_directory_uri() . "/images/logo.png";
}

$lebotheme_logo_light = lebotheme_get_theme_options( 'clapat_lebotheme_logo_light' );
$lebotheme_logo_light_path = esc_url( $lebotheme_logo_light );
if( !$lebotheme_logo_light_path ){
    $lebotheme_logo_light_path = get_template_directory_uri() . "/images/logo-white.png";
}

?>
		
		
		<div id="content-scroll">

		<!-- Header -->
        <header class="<?php if( lebotheme_get_theme_options( 'clapat_lebotheme_enable_fullscreen_menu' ) ){ echo "fullscreen-menu"; } else { echo "classic-menu"; } ?>">
            <div id="header-container">
	
				<!-- Logo -->
				<div id="logo" class="hide-ball disable-drag">
					<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					?>
					<a class="ajax-link poppins" data-type="page-transition" href="<?php echo esc_url( get_home_url() ); ?>">
						<?php if(isset($image[0])) : ?>
							<img src="<?php echo $image[0]; ?>" alt="Lebostudio" />
						<?php endif; ?>
					</a>
				</div>
				<!--/Logo -->             
				<div class='blur-body'></div>
				<?php

				get_template_part('sections/menu_section');

				?>
		
				<!-- Menu Burger -->
                <div class="button-wrap right menu disable-drag">
                    <div class="icon-wrapper parallax-wrap" style="transform:matrix(1, 0, 0, 1, 0, 0)!important">
                        <div class="button-icon parallax-element">
                            <div id="burger-wrapper">
                                <div id="menu-burger">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-text sticky right"><span data-hover="<?php echo esc_attr( lebotheme_get_theme_options('clapat_lebotheme_menu_btn_caption') ); ?>"><?php echo wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_menu_btn_caption') ); ?></span></div>
                </div>
                <!--/Menu Burger -->
        
				<?php if( is_page_template( 'blog-page.php' ) || is_home() || is_archive() || is_search() || is_singular( 'post' ) ){
					if( !is_tax('portfolio_category') ){
				?>
				<div id="open-sidebar-nav"><i class="fa fa-arrow-left"></i></div>
				<?php 
					}
				}
				?>
            </div>
        </header>
        <!--/Header -->