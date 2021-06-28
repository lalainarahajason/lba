<?php

if( !isset( $lebotheme_default_theme_options ) ){
	
	$lebotheme_default_theme_options = array();

	$lebotheme_default_theme_options['clapat_lebotheme_enable_ajax'] = 0;
	$lebotheme_default_theme_options['clapat_lebotheme_enable_smooth_scrolling'] = 0;
	$lebotheme_default_theme_options['clapat_lebotheme_enable_preloader'] = 1;
	$lebotheme_default_theme_options['clapat_lebotheme_preloader_hover_first_line'] = esc_html__( 'Stay', 'lebotheme' );
	$lebotheme_default_theme_options['clapat_lebotheme_preloader_hover_second_line'] = esc_html__( 'Relaxed', 'lebotheme' );
	$lebotheme_default_theme_options['clapat_lebotheme_preloader_text'] = esc_html__( 'Loading lebotheme Website', 'lebotheme' );
	$lebotheme_default_theme_options['clapat_lebotheme_enable_fullscreen_menu'] = 0;
	$lebotheme_default_theme_options['clapat_lebotheme_fullscreen_menu_text'] = "";
	$lebotheme_default_theme_options['clapat_lebotheme_enable_back_to_top'] = 1;
	$lebotheme_default_theme_options['clapat_lebotheme_back_to_top_caption'] = esc_html__( 'Back Top', 'lebotheme' );
	$lebotheme_default_theme_options['clapat_lebotheme_menu_btn_caption'] = esc_html__( 'Menu', 'lebotheme' );
	$lebotheme_default_theme_options['clapat_lebotheme_default_page_bknd_type'] = 'light-content';
	$lebotheme_default_theme_options['clapat_lebotheme_enable_page_title_as_hero'] = 1;
	$lebotheme_default_theme_options['clapat_lebotheme_enable_magic_cursor'] = 0;
	$lebotheme_default_theme_options['clapat_lebotheme_logo'] = esc_url( get_template_directory_uri() . '/images/logo.png' );
	$lebotheme_default_theme_options['clapat_lebotheme_logo_light'] = esc_url( get_template_directory_uri() . '/images/logo-white.png' );
	$lebotheme_default_theme_options['clapat_lebotheme_footer_copyright'] = wp_kses_post( __('2020 Copyright <a target="_blank" href="https://www.clapat.com/themes/lebotheme/">lebotheme Theme</a>.', 'lebotheme') );
	$lebotheme_default_theme_options['clapat_lebotheme_footer_social_links_prefix'] = esc_html__( 'Follow Us', 'lebotheme' );
	$lebotheme_default_theme_options['clapat_lebotheme_social_links_icons'] = 0;
	global $lebotheme_social_links;
	$social_network_ids = array_keys( $lebotheme_social_links );
	for( $idx = 1; $idx <= lebotheme_MAX_SOCIAL_LINKS; $idx++ ){

		$lebotheme_default_theme_options['clapat_lebotheme_footer_social_' . $idx] = 'Fb';
		$lebotheme_default_theme_options['clapat_lebotheme_footer_social_url_' . $idx] = '';
	}
	$lebotheme_default_theme_options['clapat_lebotheme_portfolio_custom_slug'] = '';
	$lebotheme_default_theme_options['clapat_lebotheme_view_project_caption_first'] = esc_html__('View', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_view_project_caption_second'] = esc_html__('Project', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_next_slide_caption'] = esc_html__('Next Slide', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_prev_slide_caption'] = esc_html__('Prev Slide', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_portfolio_next_caption_first_line'] = esc_html__('Next', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_portfolio_next_caption_second_line'] = esc_html__('Project', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_portfolio_filter_all_caption'] = esc_html__('All', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_portfolio_show_filters_caption'] = esc_html__('show filters', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_portfolio_share_social_networks_caption'] = esc_html__('Share Project:', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_portfolio_navigation_order'] = 'forward';
	$lebotheme_default_theme_options['clapat_lebotheme_blog_next_post_caption'] = esc_html__('Next', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_blog_prev_posts_caption'] = esc_html__('Prev', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_blog_next_posts_caption'] = esc_html__('Next', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_blog_default_title'] = esc_html__('Blog', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_map_address'] = esc_html__('775 New York Ave, Brooklyn, Kings, New York 11203', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_map_marker'] = esc_url( get_template_directory_uri() . '/images/marker.png');
	$lebotheme_default_theme_options['clapat_lebotheme_map_zoom'] = 16;
	$lebotheme_default_theme_options['clapat_lebotheme_map_company_name'] = esc_html__('lebotheme', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_map_company_info'] = esc_html__('Here we are. Come to drink a coffee!', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_map_type'] = 'satellite';
	$lebotheme_default_theme_options['clapat_lebotheme_map_api_key'] = '';
	$lebotheme_default_theme_options['clapat_lebotheme_error_title'] = esc_html__('404', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_error_info'] = esc_html__('The page you are looking for could not be found.', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_error_back_button'] = esc_html__('Home Page', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_error_back_button_hover_caption'] = esc_html__('Go Back', 'lebotheme');
	$lebotheme_default_theme_options['clapat_lebotheme_error_back_button_url'] = esc_url( get_home_url() );
	$lebotheme_default_theme_options['clapat_lebotheme_error_page_bknd_type'] = 'light-content';
}

if( !class_exists('Clapat\lebotheme\Metaboxes\Meta_Boxes') ){
	
	$lebotheme_default_meta_options = array (
									"lebotheme-opt-page-bknd-color" =>"light-content", 
									"lebotheme-opt-page-enable-hero" =>"", 
									"lebotheme-opt-page-hero-caption-title" =>"", 
									"lebotheme-opt-page-hero-caption-subtitle" =>"", 
									"lebotheme-opt-page-hero-enable-horizontal-move" => "1",
									"lebotheme-opt-page-enable-navigation" =>"", 
									"lebotheme-opt-page-navigation-caption-first-line" => esc_html__('Next', 'lebotheme'),
									"lebotheme-opt-page-navigation-caption-second-line" => esc_html__('Page', 'lebotheme'),
									"lebotheme-opt-page-navigation-caption-title" =>"", 
									"lebotheme-opt-page-navigation-next-url" =>"", 
									"lebotheme-opt-page-navigation-next-title" =>"", 
									"lebotheme-opt-page-navigation-next-subtitle" =>"", 
									"lebotheme-opt-page-portfolio-mixed-items" =>"", 
									"lebotheme-opt-page-showcase-filter-category" =>"", 
									"lebotheme-opt-blog-bknd-color" =>"light-content", 
									"lebotheme-opt-portfolio-bknd-color" =>"light-content",
									"lebotheme-opt-portfolio-thumbnail-size" =>"normal",
									"lebotheme-opt-portfolio-showcase-include" =>"yes", 
									"lebotheme-opt-portfolio-hero-img" => "", 
									"lebotheme-opt-portfolio-video" =>"", 
									"lebotheme-opt-portfolio-video-webm" =>"", 
									"lebotheme-opt-portfolio-video-mp4" =>"", 
									"lebotheme-opt-portfolio-hero-caption-title" =>"", 
									"lebotheme-opt-portfolio-hero-caption-subtitle" =>"",
									"lebotheme-opt-portfolio-hero-scroll-caption" => esc_html__('Scroll or drag to navigate', 'lebotheme'),
									"lebotheme-opt-portfolio-hero-project-info" => "",
									"lebotheme-opt-portfolio-hero-position" =>"fixed-onscroll", 
								);
}

?>
