<?php
/**
 * Created by Clapat.
 * Date: 04/02/19
 * Time: 6:21 AM
 */

// register navigation menus
if ( ! function_exists( 'lebotheme_register_nav_menus' ) ){
	
	function lebotheme_register_nav_menus() {
		
	  register_nav_menus(
		array(
		  'primary-menu' => esc_html__( 'Primary Menu', 'lebotheme')
		)
	  );
	}
}
add_action( 'init', 'lebotheme_register_nav_menus' );
 
// custom excerpt length
if( !function_exists('lebotheme_custom_excerpt_length') ){

    function lebotheme_custom_excerpt_length( $length ) {

        return intval( lebotheme_get_theme_options( 'clapat_lebotheme_blog_excerpt_length' ) );
    }
}

// theme setup
if ( ! function_exists( 'lebotheme_theme_setup' ) ){

    function lebotheme_theme_setup() {

        // Set content width
        if ( ! isset( $content_width ) ) $content_width = 1180;

        // add support for multiple languages
        load_theme_textdomain( 'lebotheme', get_template_directory() . '/languages' );
			
	}

} // lebotheme_theme_setup

/**
 * Tell WordPress to run lebotheme_theme_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'lebotheme_theme_setup' );