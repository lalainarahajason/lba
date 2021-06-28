<?php
/*
Plugin Name: Colega Functionality Plugin
Plugin URI: http://themeforest.net/user/ClaPat/portfolio
Description: Shortcodes and Custom Post Types for Colega WordPress Themes
Version: 1.0
Author: Clapat
Author URI: http://themeforest.net/user/ClaPat/
*/

if( !defined('COLEGA_SHORTCODES_DIR_URL') ) define('COLEGA_SHORTCODES_DIR_URL', plugin_dir_url(__FILE__));
if( !defined('COLEGA_SHORTCODES_DIR') ) define('COLEGA_SHORTCODES_DIR', plugin_dir_path(__FILE__));

// metaboxes
require_once( COLEGA_SHORTCODES_DIR . '/metaboxes/init.php' );

// load plugin's text domain
add_action( 'plugins_loaded', 'colega_shortcodes_load_textdomain' );
function colega_shortcodes_load_textdomain() {
    load_plugin_textdomain( 'clapat_colega_plugin_text_domain', false, dirname( plugin_basename( __FILE__ ) ) . '/include/langs' );
}

// custom post types
require_once( COLEGA_SHORTCODES_DIR . '/include/custom-post-types-config.php' );

// colega shortcodes
require_once( COLEGA_SHORTCODES_DIR . '/include/shortcodes.php' );

?>