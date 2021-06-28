<?php 

// Register Custom Post Type
function realisations() {

	$labels = array(
		'name'                  => _x( 'realisations', 'Post Type General Name', 'lebostudio' ),
		'singular_name'         => _x( 'realisation', 'Post Type Singular Name', 'lebostudio' ),
		'menu_name'             => __( 'Réalisations', 'lebostudio' ),
		'name_admin_bar'        => __( 'Post Type', 'lebostudio' ),
		'archives'              => __( 'Item Archives', 'lebostudio' ),
		'attributes'            => __( 'Item Attributes', 'lebostudio' ),
		'parent_item_colon'     => __( 'Parent Item:', 'lebostudio' ),
		'all_items'             => __( 'All Items', 'lebostudio' ),
		'add_new_item'          => __( 'Add New Item', 'lebostudio' ),
		'add_new'               => __( 'Add New', 'lebostudio' ),
		'new_item'              => __( 'New Item', 'lebostudio' ),
		'edit_item'             => __( 'Edit Item', 'lebostudio' ),
		'update_item'           => __( 'Update Item', 'lebostudio' ),
		'view_item'             => __( 'View Item', 'lebostudio' ),
		'view_items'            => __( 'View Items', 'lebostudio' ),
		'search_items'          => __( 'Search Item', 'lebostudio' ),
		'not_found'             => __( 'Not found', 'lebostudio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lebostudio' ),
		'featured_image'        => __( 'Featured Image', 'lebostudio' ),
		'set_featured_image'    => __( 'Set featured image', 'lebostudio' ),
		'remove_featured_image' => __( 'Remove featured image', 'lebostudio' ),
		'use_featured_image'    => __( 'Use as featured image', 'lebostudio' ),
		'insert_into_item'      => __( 'Insert into item', 'lebostudio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'lebostudio' ),
		'items_list'            => __( 'Items list', 'lebostudio' ),
		'items_list_navigation' => __( 'Items list navigation', 'lebostudio' ),
		'filter_items_list'     => __( 'Filter items list', 'lebostudio' ),
	);
	$args = array(
		'label'                 => __( 'realisation', 'lebostudio' ),
		'description'           => __( 'Post Type Description', 'lebostudio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'realisations' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_rest' 			=> true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
        'capability_type'       => 'page',
	);
	register_post_type( 'realisations', $args );

}
add_action( 'init', 'realisations', 0 );


// Register Custom Taxonomy
function Categories() {

	$labels = array(
		'name'                       => _x( 'realisations', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'realisation', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Categories', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'realisations', array( 'realisations' ), $args );

}
add_action( 'init', 'Categories', 0 );

function custom_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'custom_theme_setup' );