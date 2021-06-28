<?php
/**
 * UnderStrap modify editor
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'admin_init', 'understrap_wpdocs_theme_add_editor_styles' );

if ( ! function_exists( 'understrap_wpdocs_theme_add_editor_styles' ) ) {
	/**
	 * Registers an editor stylesheet for the theme.
	 */
	function understrap_wpdocs_theme_add_editor_styles() {
		add_editor_style( 'css/custom-editor-style.min.css' );
	}
}

add_filter( 'mce_buttons_2', 'understrap_tiny_mce_style_formats' );

if ( ! function_exists( 'understrap_tiny_mce_style_formats' ) ) {
	/**
	 * Reveals TinyMCE's hidden Style dropdown.
	 *
	 * @param array $buttons Array of Tiny MCE's button ids.
	 * @return array
	 */
	function understrap_tiny_mce_style_formats( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}
}

add_filter( 'tiny_mce_before_init', 'understrap_tiny_mce_before_init' );

if ( ! function_exists( 'understrap_tiny_mce_before_init' ) ) {
	/**
	 * Adds style options to TinyMCE's Style dropdown.
	 *
	 * @param array $settings TinyMCE settings array.
	 * @return array
	 */
	function understrap_tiny_mce_before_init( $settings ) {

		$style_formats = array(
			array(
				'title'    => 'Lead Paragraph',
				'selector' => 'p',
				'classes'  => 'lead',
				'wrapper'  => true,
			),
			array(
				'title'  => 'Small',
				'inline' => 'small',
			),
			array(
				'title'   => 'Blockquote',
				'block'   => 'blockquote',
				'classes' => 'blockquote',
				'wrapper' => true,
			),
			array(
				'title'   => 'Blockquote Footer',
				'block'   => 'footer',
				'classes' => 'blockquote-footer',
				'wrapper' => true,
			),
			array(
				'title'  => 'Font weight 300',
				'selector'   => 'p,h2,h3,h4,h5',
				'classes' => 'font-weight-300',
				'wrapper' => true
			),
			array(
				'title'  => 'Font weight 500',
				'selector'   => 'p,h2,h3,h4,h5',
				'classes' => 'font-weight-500',
				'wrapper' => true
			),
			array(
				'title'  => 'Font weight 600',
				'selector'   => 'p,h2,h3,h4,h5',
				'classes' => 'font-weight-600',
				'wrapper' => true
			),
			array(
				'title'  => 'Silk',
				'selector'   => 'p,h2,h3,h4,h5',
				'classes' => 'silk',
				'wrapper' => true
			),
			array(
				'title'  => 'poppins',
				'selector'   => 'p,h2,h3,h4,h5',
				'classes' => 'poppins',
				'wrapper' => true
			),
			array(
				'title'  => 'Letter spacing 2',
				'selector'   => 'p,h2,h3,h4,h5',
				'classes' => 'letter-spacing-2',
				'wrapper' => true
			),
			array(
				'title'  => 'Letter spacing 3',
				'selector'   => 'p,h2,h3,h4,h5',
				'classes' => 'letter-spacing-3',
				'wrapper' => true
			),
			array(
				'title'  => 'Letter spacing 5',
				'selector'   => 'p,h2,h3,h4,h5',
				'classes' => 'letter-spacing-5',
				'wrapper' => true
			)				
		);

		if ( isset( $settings['style_formats'] ) ) {
			$orig_style_formats = json_decode( $settings['style_formats'], true );
			$style_formats      = array_merge( $orig_style_formats, $style_formats );
		}

		$settings['style_formats'] = wp_json_encode( $style_formats );
		return $settings;
	}
}

function mycustom_change_tinymce_fontsize( $init ) {
    $init['fontsize_formats'] = "12px 14px 16px 18px 20px 24px 30px 32px 50px 60px 70px";
    //$init['fontsize_formats'] = "14pt 18pt";
    return $init;
}
add_filter('tiny_mce_before_init', 'mycustom_change_tinymce_fontsize', 12); //-->somewhat important '12', at least more than 10 to keep your changes;