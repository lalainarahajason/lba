<?php
/**
 * lebotheme Theme Config File
 */

if ( ! function_exists( 'lebotheme_options_config' ) ) {

    function lebotheme_options_config( $wp_customize ){

		$lebotheme_before_default_section = 40; // Before Colors.
		
		/*** General Settings section ***/
		$wp_customize->add_section(
			'general_settings',
			array(
				'title'    => esc_html__( 'General Settings', 'lebotheme' ),
				'priority' => ($lebotheme_before_default_section - 7),
			)
		);
	
		// Enable AJAX
		$wp_customize->add_setting(
			'clapat_lebotheme_enable_ajax',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_enable_ajax',
			array(
				'label'   		=> esc_html__( 'Load Pages With Ajax', 'lebotheme' ),
				'description'  	=> esc_html__( 'When navigates to another page it loads the target content without reloading the current page.', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Smooth Scroll
		$wp_customize->add_setting(
			'clapat_lebotheme_enable_smooth_scrolling',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_enable_smooth_scrolling',
			array(
				'label'   		=> esc_html__( 'Enable Smooth Scrolling', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Preloader
		$wp_customize->add_setting(
			'clapat_lebotheme_enable_preloader',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_enable_preloader',
			array(
				'label'   		=> esc_html__( 'Enable Preloader', 'lebotheme' ),
				'description'  	=> esc_html__( 'Enable preloader mask while the page is loading.', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_lebotheme_preloader_hover_first_line',
			array(
				'default'           	=> esc_html__( 'Stay', 'lebotheme' ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_preloader_hover_first_line',
			array(
				'label'   		=> esc_html__( 'Preloader Hover Text - First Line', 'lebotheme' ),
				'description'	=> esc_html__( 'First line of the view caption displayed on hover in preloader.', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_lebotheme_preloader_hover_second_line',
			array(
				'default'           	=> esc_html__( 'Relaxed', 'lebotheme' ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_preloader_hover_second_line',
			array(
				'label'   		=> esc_html__( 'Preloader Hover Text - Second Line', 'lebotheme' ),
				'description'	=> esc_html__( 'Second line of the view caption displayed on hover in preloader.', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_lebotheme_preloader_text',
			array(
				'default'           		=> esc_html__( 'Loading lebotheme Website', 'lebotheme' ),
				'sanitize_callback' 	=> 'wp_kses_post',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_preloader_text',
			array(
				'label'   			=> esc_html__( 'Preloader text', 'lebotheme' ),
				'description'	=> esc_html__( 'Text displayed while preloader is shown.', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'text',
			)
		);
		
		// Enable Fullscreen Menu
		$wp_customize->add_setting(
			'clapat_lebotheme_enable_fullscreen_menu',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_enable_fullscreen_menu',
			array(
				'label'   		=> esc_html__( 'Enable Fullscreen menu on desktop', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_lebotheme_fullscreen_menu_text',
			array(
				'default'           		=> "",
				'sanitize_callback' 	=> 'wp_kses_post',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_fullscreen_menu_text',
			array(
				'label'   			=> esc_html__( 'Fullscreen menu text', 'lebotheme' ),
				'description'	=> esc_html__( ' Any HTML content in addition to menu items displayed in the fullscreen menu.', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'textarea',
			)
		);
		
		// Menu button caption
		$wp_customize->add_setting(
			'clapat_lebotheme_menu_btn_caption',
			array(
				'default'           	=> esc_html__( 'Menu', 'lebotheme' ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_menu_btn_caption',
			array(
				'label'   		=> esc_html__( 'Menu button caption', 'lebotheme' ),
				'description'	=> esc_html__( 'Text preceding the burger menu button.', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'text',
			)
		);
		
		// Enable Back To Top button
		$wp_customize->add_setting(
			'clapat_lebotheme_enable_back_to_top',
			array(
				'default'          		=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_enable_back_to_top',
			array(
				'label'   		=> esc_html__( 'Enable Back To Top Button', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_lebotheme_back_to_top_caption',
			array(
				'default'          		=> esc_html__( 'Back Top', 'lebotheme' ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_back_to_top_caption',
			array(
				'label'   		=> esc_html__( 'Back To Top Caption', 'lebotheme' ),
				'description'	=> esc_html__( 'Caption displayed next to the back to top button in the footer.', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'text',
			)
		);
		
		// Global background page type
		$wp_customize->add_setting(
			'clapat_lebotheme_default_page_bknd_type',
			array(
				'default'           	=> 'light-content',
				'sanitize_callback' 	=> 'lebotheme_sanitize_default_page_bknd_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_default_page_bknd_type',
			array(
				'label'   		=> esc_html__('Default Background Type', 'lebotheme'),
				'description'	=> esc_html__('Default background type for pages, posts and category pages. The background type set in page options will overwrite this option.', 'lebotheme'),
				'section' 		=> 'general_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'dark-content' => esc_html__('White', 'lebotheme'),
										'light-content' => esc_html__('Black', 'lebotheme') ),
			)
		);
		
		// Enable page title as hero caption
		$wp_customize->add_setting(
			'clapat_lebotheme_enable_page_title_as_hero',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_enable_page_title_as_hero',
			array(
				'label'   		=> esc_html__( 'Display Page Title When Hero Section Is Disabled', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Magic Cursor
		$wp_customize->add_setting(
			'clapat_lebotheme_enable_magic_cursor',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_enable_magic_cursor',
			array(
				'label'   		=> esc_html__( 'Enable Magic Cursor', 'lebotheme' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		/*** End General Settings section ***/
		
		
		/*** Header Settings section ***/

		/* 
		$wp_customize->add_section(
			'header_settings',
			array(
				'title'    => esc_html__( 'Header Settings', 'lebotheme' ),
				'priority' => ($lebotheme_before_default_section - 6),
			)
		);
		
		// Logo (default)
		$wp_customize->add_setting(
			'clapat_lebotheme_logo',
			array(
				'default'           		=> get_template_directory_uri() . '/images/logo.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_lebotheme_logo', 
			array(
				'label'      => esc_html__( 'Header Logo', 'lebotheme' ),
				'description' => esc_html__('Upload your logo to be displayed at the left side of the header menu.', 'lebotheme'),
				'section'    => 'header_settings'
			)
		));
		
		// Logo (light version)
		$wp_customize->add_setting(
			'clapat_lebotheme_logo_light',
			array(
				'default'           	=> get_template_directory_uri() . '/images/logo-white.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_lebotheme_logo_light', 
			array(
				'label'      => esc_html__( 'Header Logo Light', 'lebotheme' ),
				'description' => esc_html__('Light logo displayed on dark backgrounds.', 'lebotheme'),
				'section'    => 'header_settings'
			)
		));*/


		/*** End Header Settings section ***/
		
		
		/*** Footer Settings section ***/
		$wp_customize->add_section(
			'footer_settings',
			array(
				'title'    => esc_html__( 'Footer Settings', 'lebotheme' ),
				'priority' => ($lebotheme_before_default_section - 5),
			)
		);
		
		// Copyright
		$wp_customize->add_setting(
			'clapat_lebotheme_footer_copyright',
			array(
				'default'           	=> wp_kses_post( __('2020 Copyright <a target="_blank" href="https://www.clapat.com/themes/lebotheme/">lebotheme Theme</a>.', 'lebotheme') ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_footer_copyright',
			array(
				'label'   		=> esc_html__( 'Copyright text', 'lebotheme' ),
				'description'	=> esc_html__( 'This is the copyright text displayed in the footer.', 'lebotheme' ),
				'section' 		=> 'footer_settings',
				'type'    		=> 'textarea',
			)
		);
		
		// Social links
		$wp_customize->add_setting(
			'clapat_lebotheme_footer_social_links_prefix',
			array(
				'default'           	=> esc_html__( 'Follow Us', 'lebotheme' ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_footer_social_links_prefix',
			array(
				'label'   		=> esc_html__( 'Social Links Prefix', 'lebotheme' ),
				'description'	=> esc_html__('Text preceding the social links.', 'lebotheme'),
				'section' 		=> 'footer_settings',
				'type'    		=> 'text',
			)
		);
		
		// Social Links Display
		$wp_customize->add_setting(
			'clapat_lebotheme_social_links_icons',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_social_links_icons',
			array(
				'label'   		=> esc_html__( 'Display Social Links As Fontawesome Icons', 'lebotheme' ),
				'description'  	=> esc_html__( 'If unchecked will display the social networks acronyms.', 'lebotheme' ),
				'section' 		=> 'footer_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		global $lebotheme_social_links;
		$social_network_ids = array_keys( $lebotheme_social_links );
		for( $idx = 1; $idx <= lebotheme_MAX_SOCIAL_LINKS; $idx++ ){

			$wp_customize->add_setting(
				'clapat_lebotheme_footer_social_' . $idx,
				array(
					'default'           	=> 'Fb',
					'sanitize_callback' 	=> 'lebotheme_sanitize_social_links',
				)
			);
			
			$wp_customize->add_control(
				'clapat_lebotheme_footer_social_' . $idx,
				array(
					'label'   		=>  esc_html__('Social Network Name ', 'lebotheme' ) . $idx,
					'section' 		=> 'footer_settings',
					'type'    		=> 'select',
					'choices'   	=> $lebotheme_social_links,
				)
			);
			
			$wp_customize->add_setting(
				'clapat_lebotheme_footer_social_url_' . $idx,
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'esc_url_raw',
				)
			);
			
			$wp_customize->add_control(
				'clapat_lebotheme_footer_social_url_' . $idx,
				array(
					'label'   		=>  esc_html__('Social Link URL ', 'lebotheme' ) . $idx,
					'section' 		=> 'footer_settings',
					'type'    		=> 'url',
				)
			);
			
		}
		/*** End Footer Settings section ***/
		
		/*** Portfolio Settings section ***/
		/* $wp_customize->add_section(
			'portfolio_settings',
			array(
				'title'    => esc_html__( 'Portfolio Settings', 'lebotheme' ),
				'priority' => ($lebotheme_before_default_section - 4),
			)
		);
		
		// Custom portfolio slug
		$wp_customize->add_setting(
			'clapat_lebotheme_portfolio_custom_slug',
			array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'lebotheme_sanitize_slug_field',
				'transport'         	=> 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_portfolio_custom_slug',
			array(
				'label'   		=> esc_html__( 'Custom Slug', 'lebotheme' ),
				'description'	=> esc_html__('If you want your portfolio post type to have a custom slug in the url, please enter it here. You will still have to refresh your permalinks after saving this! This is done by going to Settings > Permalinks and clicking save.', 'lebotheme'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// View Project caption
		$wp_customize->add_setting(
			'clapat_lebotheme_view_project_caption_first',
			array(
				'default'           	=> esc_html__( 'View', 'lebotheme' ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_view_project_caption_first',
			array(
				'label'   		=> esc_html__( 'View Project Caption - First Line', 'lebotheme' ),
				'description'	=> esc_html__( 'First line of the view caption displayed on hover in showcase or carousel templates.', 'lebotheme' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_lebotheme_view_project_caption_second',
			array(
				'default'           	=> esc_html__( 'Project', 'lebotheme' ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_view_project_caption_second',
			array(
				'label'   		=> esc_html__( 'View Project Caption - Second Line', 'lebotheme' ),
				'description'	=> esc_html__( 'Second line of the view caption displayed on hover in showcase or carousel templates.', 'lebotheme' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Next & Prev Slide caption
		$wp_customize->add_setting(
			'clapat_lebotheme_next_slide_caption',
			array(
				'default'           	=> esc_html__( 'Next Slide', 'lebotheme' ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_next_slide_caption',
			array(
				'label'   		=> esc_html__( 'Next Slide Caption', 'lebotheme' ),
				'description'	=> esc_html__( 'Caption of the next slide button in showcase or carousel templates.', 'lebotheme' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_lebotheme_prev_slide_caption',
			array(
				'default'           	=> esc_html__( 'Prev Slide', 'lebotheme' ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_prev_slide_caption',
			array(
				'label'   		=> esc_html__( 'Prev Slide Caption', 'lebotheme' ),
				'description'	=> esc_html__( 'Caption of the previous slide button in showcase or carousel templates.', 'lebotheme' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Next Project caption
		$wp_customize->add_setting(
			'clapat_lebotheme_portfolio_next_caption_first_line',
			array(
				'default'           	=> esc_html__('Next', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_portfolio_next_caption_first_line',
			array(
				'label'   		=> esc_html__( 'Next Project Caption - First Line', 'lebotheme' ),
				'description'	=> esc_html__('Caption of the next project in portfolio navigation displayed on hover - on two lines.', 'lebotheme'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_lebotheme_portfolio_next_caption_second_line',
			array(
				'default'           	=> esc_html__('Project', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_portfolio_next_caption_second_line',
			array(
				'label'   		=> esc_html__( 'Next Project Caption - Second Line', 'lebotheme' ),
				'description'	=> esc_html__('Caption of the next project in portfolio navigation displayed on hover - on two lines.', 'lebotheme'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
						
		// 'All' portfolio category caption
		$wp_customize->add_setting(
			'clapat_lebotheme_portfolio_filter_all_caption',
			array(
				'default'           	=> esc_html__('All', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_portfolio_filter_all_caption',
			array(
				'label'   		=> esc_html__('All Category Caption', 'lebotheme'),
				'description'	=> esc_html__('The caption the All category displaying all portfolio items in portfolio page templates.', 'lebotheme'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Portfolio Show Filters caption
		$wp_customize->add_setting(
			'clapat_lebotheme_portfolio_show_filters_caption',
			array(
				'default'           	=> esc_html__('Show Filters', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_portfolio_show_filters_caption',
			array(
				'label'   		=> esc_html__( 'Portfolio Grid - Show Filters Caption', 'lebotheme' ),
				'description'	=> esc_html__('Caption of the Show Filters button displayed in Portfolio Grid layout.', 'lebotheme'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Portfolio Share Social Networks caption
		$wp_customize->add_setting(
			'clapat_lebotheme_portfolio_share_social_networks_caption',
			array(
				'default'           		=> esc_html__('Share Project:', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_portfolio_share_social_networks_caption',
			array(
				'label'   			=> esc_html__( 'Share This Project Caption', 'lebotheme' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);	
		
		// Portfolio Share Social Networks list
		$wp_customize->add_setting(
			'clapat_lebotheme_portfolio_share_social_networks',
			array(
				'default'           		=> '',
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_portfolio_share_social_networks',
			array(
				'label'   		=> esc_html__( 'Share This Project On', 'lebotheme' ),
				'description'	=> esc_html__('This is a list of social networks you can share the project on, displayed at the bottom right of the hero image. Leave this field empty if you do not want to show it. Type in the social lower case social networks names, separated by comma (,). The list of available networks: twitter, facebook, googleplus, linkedin, pinterest, email, stumbleupon, whatsapp, telegram, line, viber, pocket, messenger, vkontakte, rss', 'lebotheme'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);	
			
		// Portfolio navigation order
		$wp_customize->add_setting(
			'clapat_lebotheme_portfolio_navigation_order',
			array(
				'default'           	=> 'forward',
				'sanitize_callback' 	=> 'lebotheme_sanitize_portfolio_navigation_order',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_portfolio_navigation_order',
			array(
				'label'   		=> esc_html__('Portfolio Items Navigation Order', 'lebotheme'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'forward' => esc_html__('Forward in time (next item is newer or loops to the oldest if current item is the newest)', 'lebotheme'),
											  'backward' => esc_html__('Backward in time (next item is older or loops to the newest if current item is the oldest)', 'lebotheme') ),
			)
		);
		*/
		
		/*** End Portfolio Settings section ***/
		
		/*** Blog Settings section ***/
		$wp_customize->add_section(
			'blog_settings',
			array(
				'title'    => esc_html__( 'Blog Settings', 'lebotheme' ),
				'priority' => ($lebotheme_before_default_section - 3),
			)
		);
		
		// Navigation caption
		$wp_customize->add_setting(
			'clapat_lebotheme_blog_next_post_caption',
			array(
				'default'           	=> esc_html__('Next', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_blog_next_post_caption',
			array(
				'label'   		=> esc_html__('Next Post Caption', 'lebotheme'),
				'description'	=> esc_html__('Caption of the button linking to the next single blog post page.', 'lebotheme'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_lebotheme_blog_prev_posts_caption',
			array(
				'default'           	=> esc_html__('Prev', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_blog_prev_posts_caption',
			array(
				'label'   		=> esc_html__('Previous Posts Page Caption', 'lebotheme'),
				'description'	=> esc_html__('Caption of the button linking to the previous blog posts page.', 'lebotheme'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_lebotheme_blog_next_posts_caption',
			array(
				'default'           	=> esc_html__('Next', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_blog_next_posts_caption',
			array(
				'label'   		=> esc_html__('Next Posts Page Caption', 'lebotheme'),
				'description'	=> esc_html__('Caption of the button linking to the next blog posts page.', 'lebotheme'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		// Blog pages default title
		$wp_customize->add_setting(
			'clapat_lebotheme_blog_default_title',
			array(
				'default'           	=> esc_html__('Blog', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_blog_default_title',
			array(
				'label'   		=> esc_html__('Default Posts Page Title', 'lebotheme'),
				'description'	=> esc_html__('Title of the default blog posts page. The default blog posts page is the page displaying blog posts when there is no front page set in Settings -> Reading.', 'lebotheme'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		/*** End Blog Settings section ***/
		
		/*** Map Settings section ***/
		$wp_customize->add_section(
			'map_settings',
			array(
				'title'    => esc_html__( 'Map Settings', 'lebotheme' ),
				'priority' => ($lebotheme_before_default_section - 2),
			)
		);
		
		// Map address
		$wp_customize->add_setting(
			'clapat_lebotheme_map_address',
			array(
				'default'           	=>  esc_html__('775 New York Ave, Brooklyn, Kings, New York 11203', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_map_address',
			array(
				'label'   		=> esc_html__('Google Map Address', 'lebotheme'),
				'description'  	=> esc_html__('Example: 775 New York Ave, Brooklyn, Kings, New York 11203. Or you can enter latitude and longitude for greater precision. Example: 41.40338, 2.17403 (in decimal degrees - DDD)', 'lebotheme'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Map marker image
		$wp_customize->add_setting(
			'clapat_lebotheme_map_marker',
			array(
				'default'           	=> get_template_directory_uri() . '/images/marker.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_lebotheme_map_marker', 
			array(
				'label'      => esc_html__( 'Map Marker', 'lebotheme' ),
				'description' => esc_html__('Please choose an image file for the marker.', 'lebotheme'),
				'section'    => 'map_settings'
			)
		));
		
		// Map zoom
		$wp_customize->add_setting(
			'clapat_lebotheme_map_zoom',
			array(
				'default'           	=> 16,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_map_zoom',
			array(
				'label'   		=> esc_html__( 'Map Zoom Level', 'lebotheme' ),
				'description'  	=> esc_html__('Higher number will be more zoomed in.', 'lebotheme'),
				'section' 		=> 'map_settings',
				'type'    		=> 'number',
				'input_attrs' 	=> array( 'min' => 0, 'max' => 30, 'step'  => 1 )
			)
		);
		
		// Pop-up marker title
		$wp_customize->add_setting(
			'clapat_lebotheme_map_company_name',
			array(
				'default'           	=> esc_html__('lebotheme', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_map_company_name',
			array(
				'label'   		=> esc_html__('Pop-up marker title', 'lebotheme'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Pop-up marker text
		$wp_customize->add_setting(
			'clapat_lebotheme_map_company_info',
			array(
				'default'           	=> esc_html__('Here we are. Come to drink a coffee!', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_map_company_info',
			array(
				'label'   		=> esc_html__('Pop-up marker text', 'lebotheme'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Map type
		$wp_customize->add_setting(
			'clapat_lebotheme_map_type',
			array(
				'default'           	=> 'satellite',
				'sanitize_callback' 	=> 'lebotheme_sanitize_map_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_map_type',
			array(
				'label'   		=> esc_html__('Map Type', 'lebotheme'),
				'description'	=> esc_html__('Set the map type as road map or satellite.', 'lebotheme'),
				'section' 		=> 'map_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'satellite' => esc_html__('Satellite', 'lebotheme'),
										'roadmap' => esc_html__('Roadmap', 'lebotheme') ),
			)
		);
		
		// Google maps API key
		$wp_customize->add_setting(
			'clapat_lebotheme_map_api_key',
			array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_map_api_key',
			array(
				'label'   		=> esc_html__('Google Maps API Key', 'lebotheme'),
				'description'	=> esc_html__('Without it, the map may not be displayed. If you have an api key paste it here. More information on how to obtain a google maps api key: https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key', 'lebotheme'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		/*** End Map Settings section ***/
		
		/*** Error Page section ***/
		$wp_customize->add_section(
			'error_page_settings',
			array(
				'title'    => esc_html__( 'Error Page Settings', 'lebotheme' ),
				'priority' => ($lebotheme_before_default_section - 1),
			)
		);
		
		// Error page title
		$wp_customize->add_setting(
			'clapat_lebotheme_error_title',
			array(
				'default'           	=> esc_html__('404', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_error_title',
			array(
				'label'   		=> esc_html__('Error Page Title', 'lebotheme'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error page info
		$wp_customize->add_setting(
			'clapat_lebotheme_error_info',
			array(
				'default'           	=> esc_html__('The page you are looking for could not be found.', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_error_info',
			array(
				'label'   		=> esc_html__('Error Page Info Text', 'lebotheme'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button
		$wp_customize->add_setting(
			'clapat_lebotheme_error_back_button',
			array(
				'default'           	=> esc_html__('Home Page', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_error_back_button',
			array(
				'label'   		=> esc_html__('Back Button Caption', 'lebotheme'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button - caption on hover
		$wp_customize->add_setting(
			'clapat_lebotheme_error_back_button_hover_caption',
			array(
				'default'           	=> esc_html__('Go Back', 'lebotheme'),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_error_back_button_hover_caption',
			array(
				'label'   		=> esc_html__('Back Button Caption On Hover', 'lebotheme'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button url
		$wp_customize->add_setting(
			'clapat_lebotheme_error_back_button_url',
			array(
				'default'           	=> esc_url( get_home_url() ),
				'sanitize_callback' 	=> 'lebotheme_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_error_back_button_url',
			array(
				'label'   		=> esc_html__('Back Button URL', 'lebotheme'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// 404 page background type
		$wp_customize->add_setting(
			'clapat_lebotheme_error_page_bknd_type',
			array(
				'default'           	=> 'light-content',
				'sanitize_callback' 	=> 'lebotheme_sanitize_error_page_bknd_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_lebotheme_error_page_bknd_type',
			array(
				'label'   		=> esc_html__('Background Type', 'lebotheme'),
				'description'	=> esc_html__('Background type for the 404 error page.', 'lebotheme'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'dark-content' 	=> esc_html__('White', 'lebotheme'),
										'light-content' => esc_html__('Black', 'lebotheme') ),
			)
		);
		/*** End Error Page Settings section ***/
	}

	add_action( 'customize_register', 'lebotheme_options_config' );
}

/**
 * Sanitize a text or textarea field
 *
 * @param string $input - the text
 */
function lebotheme_sanitize_text_field( $input ) {
	
	return wp_kses_post( $input );
}

/**
 * Sanitize a custom slug field
 *
 * @param string $input - the input slug
 */
function lebotheme_sanitize_slug_field( $input ) {
	
	return sanitize_title( $input );
}


/**
 * Sanitize the social network options.
 *
 * @param string $input social network id.
 */
function lebotheme_sanitize_social_links( $input ) {
	
	global $lebotheme_social_links;
	$valid = array_keys( $lebotheme_social_links );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'Fb';
}


/**
 * Sanitize the portfolio navigation order.
 *
 * @param string $input - portfolio navigation order
 */
function lebotheme_sanitize_portfolio_navigation_order( $input ) {
	
	$valid = array( 'forward', 'backward' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'forward';
}

/**
 * Sanitize the map type
 *
 * @param string $input - map type
 */
function lebotheme_sanitize_map_type( $input ) {
	
	$valid = array( 'satellite', 'roadmap' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'satellite';
}

/**
 * Sanitize the global page background type
 *
 * @param string $input - background type
 */
function lebotheme_sanitize_default_page_bknd_type( $input ) {
	
	$valid = array( 'dark-content', 'light-content' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'dark-content';
}

/**
 * Sanitize the error page background type
 *
 * @param string $input - background type
 */
function lebotheme_sanitize_error_page_bknd_type( $input ) {
	
	$valid = array( 'dark-content', 'light-content' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'dark-content';
}

/**
 * Sanitize the blog pages layout type
 *
 * @param string $input - layout type
 */
function lebotheme_sanitize_blog_layout_type( $input ) {
	
	$valid = array( 'blog-minimal-lists', 'blog-thumbnails-grid');
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'blog-normal';
}