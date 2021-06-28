<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<?php wp_head(); ?>
	<?php $show = false; ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php if(is_front_page() && $show) : ?>
		<div class="lebostudio-navigation-wrapper position-absolute">
			<div class="swiper-button-prev"><img src="<?php echo get_template_directory_uri(); ?>/images/fleche-gauche.svg" ></div>
			<div class="swiper-button-next"><img src="<?php echo get_template_directory_uri(); ?>/images/fleche-droite.svg" ></div>
		</div>
	<?php endif; ?>
	<div id="lbs-main">
    <?php if( lebotheme_get_theme_options('clapat_lebotheme_enable_preloader') ){ ?>
		<!-- Preloader -->
        <div class="preloader-wrap" data-firstline="<?php echo esc_attr( lebotheme_get_theme_options('clapat_lebotheme_preloader_hover_first_line') ); ?>" data-secondline="<?php echo esc_attr( lebotheme_get_theme_options('clapat_lebotheme_preloader_hover_second_line') ); ?>">
            <div class="outer">
                <div class="inner">
                    <div class="preloader-marquee-mask">
                        <div class="preloader-marquee-wrapper">
                            <div class="preloader-marquee" data-text="<?php echo esc_attr( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?> <?php echo esc_attr( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?> <?php echo esc_attr( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?>">
								<?php echo wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?> <?php echo wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?> <?php echo wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?>
							</div>
                        </div>
                    </div>
                    
                    <div class="preloader-marquee-wrapper stroked">
                        <div class="preloader-marquee" data-text="<?php echo esc_attr( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?> <?php echo esc_attr( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?> <?php echo esc_attr( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?>">
							<?php echo wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?> <?php echo wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?> <?php echo wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_preloader_text') ); ?>
						</div>
                    </div>
                    
                    <div class="percentage-wrapper"><div class="percentage" id="precent"></div></div>
                    <div class="trackbar">
                        <div class="loadbar"></div>
                    </div>                     
                </div>
            </div>
        </div>
        <!--/Preloader -->
  <?php } ?>
		
		<!--Cd-main-content -->
		<div class="cd-index cd-main-content">
			
		<?php
		$lebotheme_bknd_color = lebotheme_get_theme_options( 'clapat_lebotheme_default_page_bknd_type' );
		if( is_singular( 'lebotheme_portfolio' ) ){
	
			$lebotheme_bknd_color = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-bknd-color' );
			
		}
		else if( is_singular( 'post' ) ){
	
			$lebotheme_bknd_color = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-blog-bknd-color' );
			
		}
		else if( is_404() ){
			
			$lebotheme_bknd_color = lebotheme_get_theme_options( 'clapat_lebotheme_error_page_bknd_type' );
			
		}
		else if( is_page() ){
	
			$lebotheme_bknd_color = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-bknd-color' );

		}
		
		?>
	
		<?php if( is_page_template( 'blog-page.php' ) || is_home() || is_archive() || is_search() ){ ?>
			<!-- Page Content -->
			<div id="page-content" class="blog-template <?php if( !lebotheme_get_theme_options( 'clapat_lebotheme_enable_magic_cursor' ) ){ echo " magic-cursor-disabled"; } ?>">
		<?php } else { ?>
			<!-- Page Content -->
			<div id="page-content" class="<?php echo sanitize_html_class( $lebotheme_bknd_color ); if( !lebotheme_get_theme_options( 'clapat_lebotheme_enable_magic_cursor' ) ){ echo " magic-cursor-disabled"; } ?>">
		<?php } ?>
		
			<?php 
				// display header section
				get_template_part('sections/header_section'); 
				
				echo "<div class='breadcrumbs-wrapper mt-4 mt-sm-0 pt-4 pt-sm-0'>";
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
				}		
				echo "</div>";
			?>

