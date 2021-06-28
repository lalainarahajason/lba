<?php

add_filter('the_content', 'addIdstoVideos');
function addIdstoVideos($content){
	if(isset($_GET['hajatest']))
	{
		/* echo "<pre>";
		print_r($content);
		echo "</pre>";*/

	}
	return $content;
}

function remove_jquery_migrate_notice() {
    $m= $GLOBALS['wp_scripts']->registered['jquery-migrate'];
    $m->extra['before'][]='temp_jm_logconsole = window.console.log; window.console.log=null;';
    $m->extra['after'][]='window.console.log=temp_jm_logconsole;';
}
add_action( 'init', 'remove_jquery_migrate_notice', 5 );
add_filter( 'show_admin_bar', '__return_false' );
add_filter( 'big_image_size_threshold', '__return_false' );

require_once ( get_template_directory() . '/include/defines.php' );

// Metaboxes
require_once ( get_template_directory() . '/include/metabox-config.php');

// Customizer options
require_once( get_template_directory() . '/include/admin-config.php' );

// Load the default options
require_once( get_template_directory() . '/include/default-theme-options.php' );

function delete_post_type(){
	unregister_post_type( 'colega_portfolio' );
}
add_action('init','delete_post_type', 100);


if( !function_exists('lebotheme_get_theme_options') ){

	function lebotheme_get_theme_options( $option_id ){

		global $lebotheme_default_theme_options;
		
		$default_value = false;
		if ( isset( $lebotheme_default_theme_options ) && isset( $lebotheme_default_theme_options[$option_id] ) ){

			$default_value  = $lebotheme_default_theme_options[$option_id];

		}

		return get_theme_mod( $option_id, $default_value );

	}
}

if( !function_exists('lebotheme_get_post_meta') ){

	function lebotheme_get_post_meta( $opt_name = "", $thePost = array(), $meta_key = "", $def_val = "" ) {

		if( class_exists('Clapat\lebotheme\Metaboxes\Meta_Boxes') ){
			
			return Clapat\lebotheme\Metaboxes\Meta_Boxes::get_metabox_value( $thePost, $meta_key );
		}
		
		return "";
	}
}

if( !function_exists('lebotheme_get_current_query') ){

	function lebotheme_get_current_query(){

		global $lebotheme_posts_query;
		global $wp_query;
		if( $lebotheme_posts_query == null ){
			return $wp_query;
		}
		else{
			return $lebotheme_posts_query;
		}

	}
}

// Hero properties
require_once ( get_template_directory() . '/include/hero-properties.php');
if( !function_exists('lebotheme_get_hero_properties') ){

	function lebotheme_get_hero_properties( $post_type ){

		global $lebotheme_hero_properties;
		if( !isset( $lebotheme_hero_properties ) || ( $lebotheme_hero_properties == null ) ){
			$lebotheme_hero_properties = new lebothemeHeroProperties();
		}
		$lebotheme_hero_properties->getProperties( $post_type );
		return $lebotheme_hero_properties;
	}
}

// Support for automatic plugin installation
require_once(  get_template_directory() . '/components/helper_classes/tgm-plugin-activation/class-tgm-plugin-activation.php');
require_once(  get_template_directory() . '/components/helper_classes/tgm-plugin-activation/required_plugins.php');

// Widgets
require_once(  get_template_directory() . '/components/widgets/widgets.php');

// Util functions
require_once ( get_template_directory() . '/include/util_functions.php');

// Add theme support
require_once ( get_template_directory() . '/include/theme-support-config.php');

// Theme setup
require_once ( get_template_directory() . '/include/setup-config.php');

// Enqueue scripts
require_once ( get_template_directory() . '/include/scripts-config.php');

// Hooks
require_once ( get_template_directory() . '/include/hooks-config.php');

// Blog comments and pagination
require_once ( get_template_directory() . '/include/blog-config.php');

// Visual Composer
if ( function_exists( 'vc_set_as_theme' ) ) {
	require_once ( get_template_directory() . '/include/vc-config.php');
}

// Mobile detect
require_once ( get_template_directory() . '/mobile-detect.php');

// Editor styles
add_editor_style( 'style-editor.css' );

// Array of files to include.
$lebostudio_includes = array(
	//'/mobile-detect.php',
    // Load deprecated functions.
	'/features/acf/blocks-acf.php',
	'/features/lebostudio.php',
	'/features/post_types/realisations.php',
	'/features/post_types/realisations.php',
	'custom-editor.php'
);

// Include files.
foreach ( $lebostudio_includes as $file ) {
	require_once 'include/'. $file;
}
?>
