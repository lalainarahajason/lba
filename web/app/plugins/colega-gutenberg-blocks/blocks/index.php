<?php

defined( 'ABSPATH' ) || exit;

/**
 * Load all translations for our plugin from the MO file.
*/
add_action( 'init', 'colega_gutenberg_load_textdomain' );

function colega_gutenberg_load_textdomain() {
	load_plugin_textdomain( 'colega-gutenberg', false, basename( __DIR__ ) . '/languages' );
}

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * Passes translations to JavaScript.
 */
function colega_gutenberg_register_blocks() {

	if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return;
	}

	wp_register_script(
		'colega-gutenberg',
		plugins_url( 'blocks.js', __FILE__ ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-block-editor', 'wp-components' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'blocks.js' )
	);

	wp_register_style(
		'colega-gutenberg-editor',
		plugins_url( 'editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
	);

	wp_register_style(
		'colega-gutenberg',
		plugins_url( 'style.css', __FILE__ ),
		array( ),
		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
	);

	register_block_type( 'colega-gutenberg/colega-blocks', array(
		'editor_script' => 'colega-gutenberg',
		'editor_style' => 'colega-gutenberg-editor'
	) );

}
add_action( 'init', 'colega_gutenberg_register_blocks' );

// register custom Colega category
function colega_gutenberg_block_categories( $categories, $post ) {
    
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'colega-block-category',
                'title' => __( 'Colega Blocks', 'colega-gutenberg' )
            ),
        )
    );
}
add_filter( 'block_categories', 'colega_gutenberg_block_categories', 10, 2 );
