<?php
/**
 * Created by Clapat.
 * Date: 02/06/20
 * Time: 7:26 AM
 */

if ( ! function_exists( 'lebotheme_load_scripts' ) ){

    function lebotheme_load_scripts() {

        // Register css files
        wp_enqueue_style( 'lebotheme-showcase', get_template_directory_uri() . '/css/showcase.css' );
		
		wp_enqueue_style( 'lebotheme-hero', get_template_directory_uri() . '/css/hero.css' );
		
        wp_enqueue_style( 'lebotheme-portfolio', get_template_directory_uri() . '/css/portfolio.css' );
		
		wp_enqueue_style( 'lebotheme-blog', get_template_directory_uri() . '/css/blog.css' );

		wp_enqueue_style( 'lebotheme-shortcodes', get_template_directory_uri() . '/css/shortcodes.css' );

		wp_enqueue_style( 'lebotheme-assets', get_template_directory_uri() . '/css/assets.css' );
		
		wp_enqueue_style( 'lebotheme-theme', get_stylesheet_uri(), array('lebotheme-showcase', 'lebotheme-hero', 'lebotheme-portfolio', 'lebotheme-blog', 'lebotheme-shortcodes', 'lebotheme-assets') );
		
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

		// enqueue standard font style
		$lebotheme_main_font_url  = '';
		$lebotheme_secondary_font_url = '';
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'lebotheme') ) {
			$lebotheme_main_font_url = add_query_arg( 'family', urlencode( 'Poppins:300,400,500,600,700' ), "//fonts.googleapis.com/css" );
			$lebotheme_secondary_font_url = add_query_arg( 'family', urlencode( 'Oswald:400,700' ), "//fonts.googleapis.com/css" );
		}
		wp_enqueue_style( 'lebotheme-main-font', $lebotheme_main_font_url, array(), '1.0.0' );
		wp_enqueue_style( 'lebotheme-secondary-font', $lebotheme_secondary_font_url, array(), '1.0.0' );

        // enqueue scripts
        if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		// Register scripts
        wp_enqueue_script(
            'modernizr',
            get_template_directory_uri() . '/js/modernizr.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'jquery-flexnav',
            get_template_directory_uri() . '/js/jquery.flexnav.min.js',
            array('jquery'),
            false,
            true
        );

		wp_enqueue_script(
            'jquery-waitforimages',
            get_template_directory_uri() . '/js/jquery.waitforimages.js',
            array('jquery'),
            false,
            true
        );

		wp_enqueue_script(
            'appear',
            get_template_directory_uri() . '/js/appear.js',
            array('jquery'),
            false,
            true
        );

		wp_enqueue_script(
            'jquery-magnific-popup',
            get_template_directory_uri() . '/js/jquery.magnific-popup.min.js',
            array('jquery'),
            false,
            true
        );

		wp_enqueue_script(
            'jquery-justifiedgallery',
            get_template_directory_uri() . '/js/jquery.justifiedGallery.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'isotope-pkgd',
            get_template_directory_uri() . '/js/isotope.pkgd.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'packery-mode-pkd',
            get_template_directory_uri() . '/js/packery-mode.pkgd.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'images-loaded-pkd',
            get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'three',
            get_template_directory_uri() . '/js/three.min.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'fitthumbs',
            get_template_directory_uri() . '/js/fitthumbs.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
          'jquery-scrollto',
          get_template_directory_uri() . '/js/jquery.scrollto.min.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
          'smooth-scroll',
          get_template_directory_uri() . '/js/smooth-scroll.min.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
          'smooth-scroll-drag',
          get_template_directory_uri() . '/js/smooth-scroll-drag.min.js',
          array('jquery'),
          false,
          true
        );

        wp_enqueue_script(
          'tweenmax',
          get_template_directory_uri() . '/js/tweenmax.min.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
            'css-rule-plugin',
            get_template_directory_uri() . '/js/cssruleplugin.min.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'ease-pack',
            get_template_directory_uri() . '/js/easepack.min.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'scroll-magic',
            get_template_directory_uri() . '/js/scrollmagic.min.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'animation-gsap',
            get_template_directory_uri() . '/js/animation.gsap.min.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'draggable',
            get_template_directory_uri() . '/js/draggable.min.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
          'swiper',
          get_template_directory_uri() . '/js/swiper.min.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
          'js-socials',
          get_template_directory_uri() . '/js/jssocials.min.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
          'grid-to-fullscreen',
          get_template_directory_uri() . '/js/gridtofullscreen.min.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
          'smooth-scrollbar',
          get_template_directory_uri() . '/js/smooth-scrollbar.min.js',
          array('jquery'),
          false,
          true
        );

        wp_enqueue_script(
			'lebotheme-scripts',
            get_template_directory_uri() . '/js/scripts.js',
            array('jquery'),
            false,
            true
        );
		
        wp_enqueue_script(
			'lebotheme-split',
            get_template_directory_uri() . '/js/splitting.js',
            array('jquery'),
            false,
            true
        );
		
		wp_localize_script( 'lebotheme-scripts',
                    'ClapatlebothemeThemeOptions',
                    array( "enable_ajax" 		=> lebotheme_get_theme_options('clapat_lebotheme_enable_ajax'),
							"enable_preloader" 	=> lebotheme_get_theme_options('clapat_lebotheme_enable_preloader'),
							"share_social_network_list" 	=> lebotheme_get_theme_options('clapat_lebotheme_portfolio_share_social_networks') )
					);

		wp_localize_script( 'lebotheme-scripts',
							'ClapatMapOptions',
							array(  "map_marker_image"  => esc_js( esc_url ( lebotheme_get_theme_options("clapat_lebotheme_map_marker") ) ),
									"map_address"       => lebotheme_get_theme_options('clapat_lebotheme_map_address'),
									"map_zoom"    		=> lebotheme_get_theme_options('clapat_lebotheme_map_zoom'),
									"marker_title"  	=> lebotheme_get_theme_options('clapat_lebotheme_map_company_name'),
									"marker_text"  		=> lebotheme_get_theme_options('clapat_lebotheme_map_company_info'),
									"map_type" 			=> lebotheme_get_theme_options('clapat_lebotheme_map_type'),
									"map_api_key"		=> lebotheme_get_theme_options('clapat_lebotheme_map_api_key') ) );
    }

}

add_action('wp_enqueue_scripts', 'lebotheme_load_scripts');

if ( ! function_exists( 'lebotheme_admin_load_scripts' ) ){

    function lebotheme_admin_load_scripts() {
		
		// enqueue standard font style
		$lebotheme_main_font_url  = '';
		$lebotheme_secondary_font_url = '';
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'lebotheme') ) {
			$lebotheme_main_font_url = add_query_arg( 'family', urlencode( 'Poppins:300,400,600,700' ), "//fonts.googleapis.com/css" );
			$lebotheme_secondary_font_url = add_query_arg( 'family', urlencode( 'Oswald:400,700' ), "//fonts.googleapis.com/css" );
		}
		wp_enqueue_style( 'lebotheme-main-font', $lebotheme_main_font_url, array(), '1.0.0' );
		wp_enqueue_style( 'lebotheme-secondary-font', $lebotheme_secondary_font_url, array(), '1.0.0' );
	}
}
add_action('admin_enqueue_scripts', 'lebotheme_admin_load_scripts');