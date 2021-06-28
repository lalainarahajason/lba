<?php
/**
 * Created by Clapat.
 * Date: 31/08/19
 * Time: 5:51 AM
 */

// Featured images support
add_theme_support( 'post-thumbnails', array( 'post', 'lebotheme_portfolio' ) ); 
// Automatic feed links support
add_theme_support( 'automatic-feed-links' );
// title
add_theme_support( 'title-tag' );
// image wide or full alignment
add_theme_support( 'align-wide' );
// support for responsive embeds
add_theme_support( 'responsive-embeds' );
// editor styles
add_theme_support( 'editor-styles' );

add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

/**
 * Allow svg to be uploaded
 * 
 */
function wpc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');
?>