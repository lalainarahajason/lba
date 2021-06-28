<?php

// more widgets in the (near) future...

// Register widgetized locations
if(  !function_exists('lebotheme_widgets_init') ){

    function lebotheme_widgets_init(){

		$args = array( 'name'          	=> esc_html__( 'Blog Sidebar', 'lebotheme' ),
								'id'           	=> 'lebotheme-blog-sidebar',
								'description'  	=> '',
								'class'        	=> '',
								'before_widget'	=> '<div id="%1$s" class="widget lebotheme-sidebar-widget %2$s">',
								'after_widget'  => '</div>',
								'before_title'  => '<h5 class="widgettitle lebotheme-widgettitle">',
								'after_title'   => '</h5>' );
		
		register_sidebar( $args );
        
    }
}

add_action( 'widgets_init', 'lebotheme_widgets_init' );

?>