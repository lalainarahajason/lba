<?php

// You may replace $redux_opt_name with a string if you wish. If you do so, change loader.php
// as well as all the instances below.
$redux_opt_name = 'clapat_' . lebotheme_THEME_ID . '_theme_options';


if ( !function_exists( "lebotheme_add_metaboxes" ) ){

    function lebotheme_add_metaboxes( $metaboxes ) {

    $metaboxes = array();


    ////////////// Page Options //////////////
    $page_options = array();
    $page_options[] = array(
        'title'         => esc_html__('General', 'lebotheme'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-wrench',
        'desc'          => esc_html__('Options concerning all page templates.', 'lebotheme'),
        'fields'        => array(
			
			array(
                'id'        => 'lebotheme-opt-page-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background color', 'lebotheme'),
				'desc'      => esc_html__('Background color for this page.', 'lebotheme'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('White', 'lebotheme'),
                    'light-content' => esc_html__('Black', 'lebotheme')

                ),
				'default'   => 'light-content',
            ),
			
			/**************************HERO SECTION OPTIONS**************************/
			array(
                'id'        => 'lebotheme-opt-page-enable-hero',
                'type'      => 'switch',
                'title'     => esc_html__('Display Hero Section', 'lebotheme'),
                'desc'      => esc_html__('Enable "hero" section displayed immediately below page header. Showcase and Carousel pages do not have a hero section.', 'lebotheme'),
				'on'       => esc_html__('Yes', 'lebotheme'),
				'off'      => esc_html__('No', 'lebotheme'),
                'default'   => false
            ),

			array(
                'id'        => 'lebotheme-opt-page-hero-caption-title',
                'type'      => 'text',
				'required'  => array( 'lebotheme-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Hero Caption Title - First Row', 'lebotheme'),
                'subtitle'  => esc_html__('The first row of the title displayed over hero section.', 'lebotheme'),
	        ),

			array(
                'id'        => 'lebotheme-opt-page-hero-caption-subtitle',
                'type'      => 'text',
				'required'  => array( 'lebotheme-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Hero Caption Title - Second Row', 'lebotheme'),
                'subtitle'  => esc_html__('Second row of the caption title displayed over hero section.', 'lebotheme'),
			),

			array(
                'id'        => 'lebotheme-opt-page-hero-enable-horizontal-move',
                'type'      => 'switch',
				'required'  => array( 'lebotheme-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Enable Caption Title Horizontal Effect', 'lebotheme'),
                'desc'      => esc_html__('Enables or disables the first and second title lines horizontal move on scroll.', 'lebotheme'),
				'on'       => esc_html__('Yes', 'lebotheme'),
				'off'      => esc_html__('No', 'lebotheme'),
                'default'   => false
            ),
			/**************************END - HERO SECTION OPTIONS**************************/
			
			/**************************PAGE NAVIGATION SECTION OPTIONS**************************/
			array(
                'id'        => 'lebotheme-opt-page-enable-navigation',
                'type'      => 'switch',
                'title'     => esc_html__('Enable Page Navigation Section', 'lebotheme'),
                'desc'      => esc_html__('Enable page navigation section displayed above the footer. Available only in Default, Portfolio and Portfolio Mixed templates.', 'lebotheme'),
				'on'       => esc_html__('Yes', 'lebotheme'),
				'off'      => esc_html__('No', 'lebotheme'),
                'default'   => false
            ),
			
			array(
                'id'        => 'lebotheme-opt-page-navigation-caption-first-line',
                'type'      => 'text',
				'required'  => array( 'lebotheme-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Navigation Caption - First Line', 'lebotheme'),
                'desc'  => esc_html__('Caption displayed when hovering the page navigation - first line.', 'lebotheme'),
				'default' => esc_html__('Next', 'lebotheme'),
	        ),
			
			array(
                'id'        => 'lebotheme-opt-page-navigation-caption-second-line',
                'type'      => 'text',
				'required'  => array( 'lebotheme-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Navigation Caption - Second Line', 'lebotheme'),
                'desc'  => esc_html__('Caption displayed when hovering the page navigation - second line.', 'lebotheme'),
				'default' => esc_html__('Page', 'lebotheme'),
	        ),

			array(
                'id'        => 'lebotheme-opt-page-navigation-next-url',
                'type'      => 'url',
				'required'  => array( 'lebotheme-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Next Page Url', 'lebotheme'),
                'desc'  => esc_html__('The url of the next page in navigation.', 'lebotheme'),
	        ),
			
			array(
                'id'        => 'lebotheme-opt-page-navigation-next-title',
                'type'      => 'text',
				'required'  => array( 'lebotheme-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Next Page Title - First Row', 'lebotheme'),
                'desc'  => esc_html__('The first row title of the next page in navigation. Displayed in two rows with a horizontal moving effect on scroll. For an optimal transition between pages this field is the next page hero title or next page title (if hero is disabled).', 'lebotheme'),
	        ),

			array(
                'id'        => 'lebotheme-opt-page-navigation-next-subtitle',
                'type'      => 'text',
				'required'  => array( 'lebotheme-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Next Page Title - Second Row', 'lebotheme'),
                'desc'  => esc_html__('The second row of the next page title.', 'lebotheme'),
	        ),
			/**************************END - PAGE NAVIGATION SECTION OPTIONS**************************/
        ),
    );

	$page_options[] = array(
        'title'         => esc_html__('Portfolio and Portfolio Mixed Templates', 'lebotheme'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-folder-open',
        'desc'          => esc_html__('Options concerning only Portfolio templates.', 'lebotheme'),
        'fields'        => array(

			array(
                'id'        	=> 'lebotheme-opt-page-portfolio-filter-category',
                'type'      	=> 'text',
				'title'     	=> esc_html__('Category Filter', 'lebotheme'),
                'desc'  		=> esc_html__('Paste here the portfolio category slugs you want to include in the Portfolio or Portfolio Mixed separated by comma. Do not include spaces. For example photography,branding. It will exclude the rest of the categories. The portfolio category slugs can be found in Portfolio -> Categories.', 'lebotheme'),
				'default'  	=> '',
	        ),
			
			array(
                 'id'       => 'lebotheme-opt-page-portfolio-mixed-items',
                 'type'   => 'text',
                 'title'    => esc_html__( 'Maximum Number Of Items In Portfolio Mixed', 'lebotheme' ),
                 'desc' 	=> esc_html__( 'Available only for Portfolio Mixed Template: the maximum number of portfolio items displayed. Leave empty for ALL.', 'lebotheme' )
             ),
			 
			 array(
                 'id'       	=> 'lebotheme-opt-page-portfolio-mixed-content-position',
                 'type'     	=> 'select',
                 'title'    	=> esc_html__( 'Page Content Position', 'lebotheme'),
                 'desc' 		=> esc_html__( 'Available only for Portfolio Mixed Template: page content position in relation with portfolio grid.', 'lebotheme'),
                 'options'   => array(
                    'after' 	=> esc_html__('After Portfolio Grid', 'lebotheme'),
					'before'	=> esc_html__('Before Portfolio Grid', 'lebotheme'),
                 ),
				 'default'	=> true,
            ),
			
		),
	);
		
	$page_options[] = array(
        'title'         => esc_html__('Showcase and Carousel Templates', 'lebotheme'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-folder-open',
        'desc'          => esc_html__('Options concerning only Showcase and Carousel templates.', 'lebotheme'),
        'fields'        => array(

			array(
                'id'        	=> 'lebotheme-opt-page-showcase-filter-category',
                'type'      	=> 'text',
				'title'     	=> esc_html__('Category Filter', 'lebotheme'),
                'desc'  		=> esc_html__('Paste here the portfolio category slugs you want to include in the Showcase slider separated by comma. Do not include spaces. For example photography,branding. It will exclude the rest of the categories. The portfolio category slugs can be found in Portfolio -> Categories.', 'lebotheme'),
				'default'  	=> '',
	        ),
						
        ),

    );
	
	$metaboxes[] = array(
        'id'            => 'clapat_' . lebotheme_THEME_ID . '_page_options',
        'title'         => esc_html__( 'Page Options', 'lebotheme'),
        'post_types'    => array( 'page' ),
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low
        'sidebar'       => false, // enable/disable the sidsebar in the normal/advanced positions
        'sections'      => $page_options,
    );

    $blog_post_options = array();
    $blog_post_options[] = array(

         'icon_class'    => 'icon-large',
         'icon'          => 'el-icon-wrench',
         'fields'        => array(

			array(
                'id'        => 'lebotheme-opt-blog-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background color', 'lebotheme'),
				'desc'      => esc_html__('Background color for this blog post.', 'lebotheme'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('White', 'lebotheme'),
                    'light-content' => esc_html__('Black', 'lebotheme')

                ),
				'default'   => 'light-content',
            ),
				  
          )
        );
			/**************************END - HERO SECTION OPTIONS**************************/

    $metaboxes[] = array(
       'id'            => 'clapat_' . lebotheme_THEME_ID . '_post_options',
       'title'         => esc_html__( 'Post Options', 'lebotheme'),
       'post_types'    => array( 'post' ),
       'position'      => 'normal', // normal, advanced, side
       'priority'      => 'high', // high, core, default, low
       'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
       'sections'      => $blog_post_options,
    );


    $portfolio_options = array();
    $portfolio_options[] = array(

        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-wrench',
        'fields'        => array(

			array(
                'id'        => 'lebotheme-opt-portfolio-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background color', 'lebotheme'),
				'desc'      => esc_html__('Background color for this page.', 'lebotheme'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('White', 'lebotheme'),
                    'light-content' => esc_html__('Black', 'lebotheme')

                ),
				'default'   => 'light-content',
            ),
			
			array(
                'id'        => 'lebotheme-opt-portfolio-thumbnail-size',
                'type'      => 'select',
                'title'     => esc_html__('Thumbnail Size', 'lebotheme'),
                'desc'      => esc_html__('Size of the thumbnail for this item as it appears in portfolio pages. The thumbnail image is the hero image assigned for this item.', 'lebotheme'),
				'options'   => array(
                    'normal' => esc_html__('Normal', 'lebotheme'),
                    'tall' => esc_html__('Tall', 'lebotheme')
                ),
                'default'   => 'normal'
            ),
			
			array(
                'id'        => 'lebotheme-opt-portfolio-showcase-include',
                'type'      => 'select',
                'title'     => esc_html__('Include In Showcase Slider', 'lebotheme'),
                'desc'      => esc_html__('Include this portfolio item in the Showcase slider. The slider is displayed in Showcase page template.', 'lebotheme'),
				'options'   => array(
                    'yes'		=> esc_html__('Include in Showcase', 'lebotheme'),
                    'no'  	=> esc_html__('Exclude from Showcase', 'lebotheme')

                ),
                'default'   => 'yes'
            ),
			
			/**************************HERO SECTION OPTIONS**************************/
			array(
				'id'        => 'lebotheme-opt-portfolio-hero-img',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__('Hero Image', 'lebotheme'),
                'desc'      => esc_html__('Upload hero background image.  The hero image is being displayed in portfolio showcase. Hero section is the header section displayed at the top of the project page.', 'lebotheme'),
                'default'   => array(),
            ),
			
			array(
                'id'        => 'lebotheme-opt-portfolio-video',
                'type'      => 'switch',
				'title'     => esc_html__('Video Hero', 'lebotheme'),
				'desc'   	=> esc_html__('Video displayed as hero section and showcase slide. If you check this option set the Hero Image as the first frame image of the video to avoid flickering!', 'lebotheme'),
                'on'       => esc_html__('Yes', 'lebotheme'),
				'off'      => esc_html__('No', 'lebotheme'),
                'default'   => false
            ),
			
			array(
                'id'        => 'lebotheme-opt-portfolio-video-webm',
                'type'      => 'text',
                'title'     => esc_html__('Webm Video URL', 'lebotheme'),
                'desc'   	=> esc_html__('URL of the showcase slide background webm video. Webm format is previewed in Chrome and Firefox.', 'lebotheme'),
				'required'	=> array('lebotheme-opt-portfolio-video', '=', true),
            ),
			
			array(
                'id'        => 'lebotheme-opt-portfolio-video-mp4',
                'type'      => 'text',
                'title'     => esc_html__('MP4 Video URL', 'lebotheme'),
                'desc'   	=> esc_html__('URL of the showcase slide background MP4 video. MP4 format is previewed in IE, Safari and other browsers.', 'lebotheme'),
                'required'	=> array('lebotheme-opt-portfolio-video', '=', true),
            ),
						
			array(
                'id'        => 'lebotheme-opt-portfolio-hero-caption-title',
                'type'      => 'text',
				'title'     => esc_html__('Hero Caption Title', 'lebotheme'),
                'subtitle'  => esc_html__('Title displayed over hero section. The hero background image is set in the hero image set in preceding option.', 'lebotheme'),
	        ),

			array(
                'id'        => 'lebotheme-opt-portfolio-hero-caption-subtitle',
                'type'      => 'textarea',
				'title'     => esc_html__('Hero Caption Subtitle', 'lebotheme'),
                'subtitle'  => esc_html__('The subtitle displayed over hero section. Enter plain text.', 'lebotheme')
	        ),
			
			array(
                'id'        => 'lebotheme-opt-portfolio-hero-scroll-caption',
                'type'      => 'text',
				'title'     => esc_html__('Scroll Down Caption', 'lebotheme'),
                'desc'  => esc_html__('Scroll down caption displayed to the left of the hero image indicating scrolling down to reveal the content. Leave empty for no scroll down button.', 'lebotheme'),
				'default'   => esc_html__('Scroll or drag to navigate', 'lebotheme'),
	        ),

			array(
                'id'        => 'lebotheme-opt-portfolio-hero-position',
                'type'      => 'select',
                'title'     => esc_html__('Hero Position', 'lebotheme'),
                'desc'      => esc_html__('Position of the "hero" section displayed as page header.', 'lebotheme'),
				'options'   => array(
                    'fixed-onscroll' 	=> esc_html__('Relative', 'lebotheme'),
                    'parallax-onscroll' => esc_html__('Parallax', 'lebotheme')
                ),
                'default'   => 'fixed-onscroll'
            ),
			/**************************END - HERO SECTION OPTIONS**************************/

        ),
    );

    $metaboxes[] = array(
        'id'            => 'clapat_' . lebotheme_THEME_ID . '_portfolio_options',
        'title'         => esc_html__( 'Portfolio Item Options', 'lebotheme'),
        'post_types'    => array( 'lebotheme_portfolio' ),
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low
        'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
        'sections'      => $portfolio_options,
    );

	return $metaboxes;
  }
  
}

if( class_exists('Clapat\lebotheme\Metaboxes\Meta_Boxes') ){

	$metabox_definitions = array();
	$metabox_definitions = lebotheme_add_metaboxes( $metabox_definitions );
	do_action( 'clapat/lebotheme/add_metaboxes', $metabox_definitions );
}