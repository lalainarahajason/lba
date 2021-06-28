<?php
// Colega shortcodes definition


function colega_get_image_url( $image_id, $image_url ){
	
	if( !empty( $image_id ) ){
		
		$image_info = wp_get_attachment_image_src( $image_id, 'full' );
		if( $image_info[0] ){
			
			return $image_info[0];
		} 
	}
	
	return $image_url;
}


/* Columns */

//////////////////////////////////////////////////////////////////
// Column one_half shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_half', 'shortcode_one_half');
function shortcode_one_half($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="one_half ' . $class . '">' .do_shortcode($content). '</div>';

}

//////////////////////////////////////////////////////////////////
// Column one_third shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_third', 'shortcode_one_third');
function shortcode_one_third($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="one_third ' . $class . '">' .do_shortcode($content). '</div>';

}

//////////////////////////////////////////////////////////////////
// Column two_third shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('two_third', 'shortcode_two_third');
function shortcode_two_third($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="two_third ' . $class . '">' .do_shortcode($content). '</div>';

}

//////////////////////////////////////////////////////////////////
// Column one_fourth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_fourth', 'shortcode_one_fourth');
function shortcode_one_fourth($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="one_fourth ' . $class . '">' .do_shortcode($content). '</div>';

}

//////////////////////////////////////////////////////////////////
// Column three_fourth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('three_fourth', 'shortcode_three_fourth');
function shortcode_three_fourth($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="three_fourth ' . $class . '">' .do_shortcode($content). '</div>';

}

//////////////////////////////////////////////////////////////////
// Column one fifth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_fifth', 'shortcode_one_fifth');
function shortcode_one_fifth($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="one_fifth ' . $class . '">' .do_shortcode($content). '</div>';

}

add_shortcode('two_fifth', 'shortcode_two_fifth');
function shortcode_two_fifth($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="two_fifth ' . $class . '">' .do_shortcode($content). '</div>';

}

add_shortcode('three_fifth', 'shortcode_three_fifth');
function shortcode_three_fifth($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="three_fifth ' . $class . '">' .do_shortcode($content). '</div>';

}

add_shortcode('four_fifth', 'shortcode_four_fifth');
function shortcode_four_fifth($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="four_fifth ' . $class . '">' .do_shortcode($content). '</div>';

}

//////////////////////////////////////////////////////////////////
// Column one sixth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_sixth', 'shortcode_one_sixth');
function shortcode_one_sixth($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="one_sixth ' . $class . '">' .do_shortcode($content). '</div>';

}

//////////////////////////////////////////////////////////////////
// Column five sixth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('five_sixth', 'shortcode_five_sixth');
function shortcode_five_sixth($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'last' => 'no',
            'text_align' => 'text-align-left'
        ), $atts);

    $class = $atts['text_align'];
    if( $atts['last'] == 'yes' ){

        $class .= ' last';
    }

    return '<div class="five_sixth ' . $class . '">' .do_shortcode($content). '</div>';

}

/* End Columns */


/* Typo Elements */

//////////////////////////////////////////////////////////////////
// Title
//////////////////////////////////////////////////////////////////
add_shortcode('title', 'shortcode_title');
function shortcode_title($atts, $content = null) {

    $atts = shortcode_atts( array(
        'size'   	=> 'h1',
        'underline' => 'no',
		'big'		=> 'no',
		'extra_class_name' => ''
    ), $atts );

    $class_title = '';
    if( $atts['underline'] == 'yes' ){

        $class_title = 'title-has-line';
    }
	if( $atts['big'] == 'yes' ){
		
		$class_title .= ' big-title';
	}
	if( !empty( $atts['extra_class_name'] ) ){
		$class_title .= '  ' .$atts['extra_class_name'];
	}
	if( !empty( $class_title ) ){
		
		$class_title = ' class="' . $class_title . '"';
	}
	
    $html = '';
    $html .= '<'.$atts['size']. $class_title . '>'.do_shortcode($content).'</'.$atts['size'].'>';
    return $html;
}

//////////////////////////////////////////////////////////////////
// Breaking line
//////////////////////////////////////////////////////////////////
add_shortcode('br', 'shortcode_br');
function shortcode_br($atts, $content = null) {

    return '<br />';
}

//////////////////////////////////////////////////////////////////
// Button shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('button', 'shortcode_button');
function shortcode_button($atts, $content = null) {

    $atts = shortcode_atts(array(
                'link'      			=> '',
                'target'    			=> '_blank',
                'type'      			=> 'normal',
				'rounded'      	=> 'yes',
				'hover_caption'	=> '',
				'extra_class_name' => ''
            ), $atts );

    $css_classes = '';
	$link_css_classes = '';
	$transition = '';
    if( $atts['type'] == 'outline' ){
        $css_classes .= ' outline';
    }
	if( $atts['rounded'] == 'yes' ){
        $css_classes .= ' rounded';
    }
	if( $atts['target'] == '_self' ){
        $link_css_classes .= ' ajax-link animation-link';
		$transition = ' data-type="page-transition"';
    }
	if( !empty( $atts['extra_class_name'] ) ){
		$css_classes .= '  ' . $atts['extra_class_name'];
	}
	
	$out  = '<div class="button-box has-animation" data-delay="100">';
	$out  .= '<div class="clapat-button-wrap parallax-wrap hide-ball">';
    $out  .= '<a class="clapat-button parallax-element'  . $link_css_classes . '" href="' . $atts['link'] . '"' . $transition . ' target="' . $atts['target'] . '">';
    $out  .= '<div class="button-border parallax-element-second' . $css_classes . '"><span data-hover="' . esc_attr( $atts['hover_caption'] ) . '">' . do_shortcode($content) . '</span></div>';
    $out  .= '</a>';
	$out  .= '</div>';
	$out  .= '</div>';

	return $out;
}

//////////////////////////////////////////////////////////////////
// Text Link shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('text_link', 'shortcode_text_link');
function shortcode_text_link($atts, $content = null) {

    $atts = shortcode_atts(array(
                'link'      			=> '',
                'target'    			=> '_blank',
                'caption'			=> '',
				'extra_class_name' => ''
            ), $atts );

    $out  = '<div class="button-wrap right disable-drag has-animation" data-delay="350">';
    $out  .= '<div class="icon-wrap parallax-wrap">';
    $out  .= '<div class="button-icon parallax-element">';
    $out  .= '<i class="fa fa-angle-right"></i>';
	$out  .= '</div>';
    $out  .= '</div>';
    $out  .= '<a target="' . esc_attr( $atts['target'] ) . '" href="' . esc_attr( $atts['link'] ) . '">';
	$out  .= '<div class="button-text sticky right"><span data-hover="' . esc_attr( $atts['caption'] ) . '">' . wp_kses_post( $atts['caption'] ) . '</span></div>';
	$out  .= '</a>';
    $out  .= '</div>';

	return $out;
}

//////////////////////////////////////////////////////////////////
// Space Between Buttons
//////////////////////////////////////////////////////////////////
add_shortcode('space_between_buttons', 'shortcode_space_between_buttons');
function shortcode_space_between_buttons($atts, $content = null) {

	return '<span class="space-buttons"></span>';
}

//////////////////////////////////////////////////////////////////
// Marquee Content
//////////////////////////////////////////////////////////////////
add_shortcode('marquee_content', 'shortcode_marquee_content');
function shortcode_marquee_content($atts, $content = null) {

	$atts = shortcode_atts(array(
		'extra_class_name' => ''
    ), $atts );
	
	$out = '<div class="content-marquee-wrapper">';
	$out .= '<div class="content-marquee" data-text="' . esc_attr( $content ) . '">' . wp_kses_post( $content ) . '</div>';
    $out .= '</div>';
	    
    return $out;
}

/* End Typo Elements */


/* Elements */
//////////////////////////////////////////////////////////////////
// Half Background Container
//////////////////////////////////////////////////////////////////
add_shortcode('half_background_container', 'shortcode_half_background_container');
function shortcode_half_background_container( $atts, $content = null ) {

	$atts = shortcode_atts(array(
		'bg-color' => '#141414',
		'bg-type' => 'half-dark-section',
		'extra_class_name' => ''
    ), $atts );
	
	$out = '<div class="row-half-color ' . esc_attr( $atts['bg-type'] ) . '" data-bgcolor="' . esc_attr( $atts['bg-color'] ) . '">' . wp_kses_post( $content ) . '</div>';
	    
    return $out;
}

//////////////////////////////////////////////////////////////////
// Accordion
//////////////////////////////////////////////////////////////////
add_shortcode('accordion', 'shortcode_accordion');
function shortcode_accordion($atts, $content = null) {
	
	$atts = shortcode_atts( array(
    						'extra_class_name' => ''
                            ), $atts );

    $str = '<dl class="accordion ' . $atts['extra_class_name'] . '">';
    $str .= do_shortcode( $content );
    $str .= '</dl>';

    return $str;
}

add_shortcode('accordion_item', 'shortcode_accordion_item');
function shortcode_accordion_item($atts, $content = null) {

    $atts = shortcode_atts(
                array(
                    'title'      => ''
                ), $atts );

    $str = '<dt>';
    $str .= '<span>' . $atts['title'] . '</span>';
    $str .= '<div class="acc-icon-wrap parallax-wrap">';
    $str .= '<div class="acc-button-icon parallax-element">';
    $str .= '<i class="fa fa-angle-down"></i>';
    $str .= '</div>';
    $str .= '</div>';
    $str .= '</dt>';
    $str .= '<dd class="accordion-content">' . do_shortcode( $content ) . '</dd>';

    return $str;
}

//////////////////////////////////////////////////////////////////
// Services
//////////////////////////////////////////////////////////////////
add_shortcode('service', 'shortcode_service');
function shortcode_service($atts, $content = null) {

    $atts = shortcode_atts( array(
                                'title' => '',
                                'icon' => '',
								'extra_class_name' => ''
                            ), $atts );

    $out = '';

	$out .= '<div class="clapat-icon ' . $atts['extra_class_name'] . ' has-animation" data-delay="0">';
    $out .= '<i class="' . $atts['icon'] . '" aria-hidden="true"></i>';
    $out .= '</div>';
	$out .= '<h5 class="has-mask" data-delay="0">' . $atts['title'] . '</h5>';
	
	return $out;
}

//////////////////////////////////////////////////////////////////
// Collage
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_collage', 'shortcode_clapat_collage');
function shortcode_clapat_collage($atts, $content = null) {

	$atts = shortcode_atts( array(
								'extra_class_name' => ''
                            ), $atts );
							
    $str = '<div id="justified-grid" class="' . $atts['extra_class_name'] . '">';
    $str .= do_shortcode( $content );
    $str .= '</div>';

    return $str;
}

add_shortcode('clapat_collage_image', 'shortcode_clapat_collage_image');
function shortcode_clapat_collage_image($atts, $content = null) {

    $atts = shortcode_atts(array(
		'thumb_img_url'	=> '',
    	'thumb_img_id'    => '',
        'img_url'	=> '',
    	'img_id'    => '',
        'alt'       => '',
		'info' => ''
    ), $atts );

    $img_url = colega_get_image_url($atts['img_id'], $atts['img_url']);
	$thumb_img_url = colega_get_image_url($atts['thumb_img_id'], $atts['thumb_img_url']);
    
	$str = '<div class="collage-thumb">';
	$str .= '<a class="image-link" href="' . esc_url( $img_url ) . '">';
    $str .= '<img src="' . esc_url( $thumb_img_url ) . '" alt="' . esc_attr( $atts['alt'] ) . '" />';
	$str .= '<div class="thumb-info"><h6>' . wp_kses_post( $atts['info'] ) . '</h6></div>';
	$str .= '</a>';
    $str .= '</div>';

    return $str;

}

add_shortcode('colega_video', 'shortcode_colega_video');
function shortcode_colega_video($atts, $content = null) {

    $atts = shortcode_atts(array(
		'cover_img_url'	=> '',
		'cover_img_id'	=> '',
    	'webm_url'    => '',
        'mp4_url'	=> '',
		'extra_class_name' => ''
    ), $atts );

    $cover_img_url = colega_get_image_url($atts['cover_img_id'], $atts['cover_img_url']);
	
	$str = '<!-- Video Player -->';
    $str .= '<div class="video-wrapper ' . $atts['extra_class_name'] . '">';
	$str .= '<div class="video-cover" data-src="' . esc_url( $cover_img_url ) . '"></div>';
    $str .= '<video class="bgvid" controls preload="auto" >';
	if( !empty( $atts['webm_url'] ) ){
    $str .= '<source src="' . esc_url( $atts['webm_url'] ) . '" />';
	}
	if( !empty( $atts['mp4_url'] ) ){
    $str .= '<source src="' . esc_url( $atts['mp4_url'] ) . '" />';
	}
    $str .= '</video>';
                            
    $str .= '<div class="control">';
    $str .= '<div class="btmControl">';                        
    $str .= '<div class="progress-bar">';
    $str .= '<div class="progress">';
    $str .= '<span class="bufferBar"></span>';
    $str .= '<span class="timeBar"></span>';
    $str .= '</div>';
    $str .= '</div>';
    $str .= '<div class="video-btns">';
    $str .= '<div class="sound sound2 btn" title="Mute/Unmute sound">';
    $str .= '<i class="fa fa-volume-up" aria-hidden="true"></i>';
    $str .= '<i class="fa fa-volume-off" aria-hidden="true"></i>';
    $str .= '</div>';
    $str .= '<div class="btnFS btn" title="Switch to full screen">';
    $str .= '<i class="fa fa-expand" aria-hidden="true"></i>';
    $str .= '</div>';
    $str .= '</div>';
    $str .= '</div>';
    $str .= '</div>';
                        
    $str .= '</div>';                    
    $str .= '<!--/Video Player -->';

    return $str;

}

/* End Elements */

/* Sliders */

//////////////////////////////////////////////////////////////////
// General Slider
//////////////////////////////////////////////////////////////////
add_shortcode('general_slider', 'shortcode_general_slider');
function shortcode_general_slider($atts, $content = null) {

	$atts = shortcode_atts( array(
								'extra_class_name' => ''
                            ), $atts );

	$str = '<div class="swiper-container content-slider disable-drag' . esc_attr( $atts['extra_class_name'] ) . '" data-delay="0">';
    $str .= '<div class="swiper-wrapper">';
    $str .= do_shortcode( $content ); 
    $str .= '</div>';
    $str .= '<div class="slider-button-next"></div>';
    $str .= '<div class="slider-button-prev"></div>';
    $str .= '</div>';
	
    return $str;
}

add_shortcode('general_slide', 'shortcode_general_slide');
function shortcode_general_slide($atts, $content = null) {

    $atts = shortcode_atts(array(
        'img_url'	=> '',
    	'img_id'    => '',
        'alt'       => '',
    ), $atts );

    $img_url = colega_get_image_url($atts['img_id'], $atts['img_url']);
    
	$str = '<div class="swiper-slide">';
	$str .= '<div class="slide-img">';
	$str .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $atts['alt'] ) . '" />';
    $str .= '</div>';
	$str .= '</div>';

    return $str;
}

//////////////////////////////////////////////////////////////////
// Carousel Slider
//////////////////////////////////////////////////////////////////
add_shortcode('carousel_slider', 'shortcode_carousel_slider');
function shortcode_carousel_slider($atts, $content = null) {

	$atts = shortcode_atts( array(
								'loop' => 'no',
								'extra_class_name' => ''
                            ), $atts );
	
	$class_carousel = 'content-carousel';
	if( $atts['loop'] == 'yes' ){
		
		$class_carousel = 'content-looped-carousel';
	}
		
	$str = '<div class="swiper-container ' . esc_attr( $class_carousel ) . ' disable-drag ' . $atts['extra_class_name'] . '">';
    $str .= '<div class="swiper-wrapper">';
    $str .= do_shortcode( $content );
    $str .= '</div>';
    $str .= '</div>';

    return $str;
}

add_shortcode('carousel_slide', 'shortcode_carousel_slide');
function shortcode_carousel_slide($atts, $content = null) {

    $atts = shortcode_atts(array(
        'img_url'	=> '',
    	'img_id'    => '',
        'alt'       => '',
    ), $atts );

    $img_url = colega_get_image_url($atts['img_id'], $atts['img_url']);
	    
    $str = '<div class="swiper-slide">';
	$str .= '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $atts['alt'] ) . '" />';
    $str .= '</div>';

    return $str;
}
/* End Sliders */

/* Google Map */
add_shortcode('colega_map', 'shortcode_colega_map');
function shortcode_colega_map($atts, $content = null) {

    $str = '<!-- Map -->';
	$str .= '<div class="map-shortcode">';
    $str .= '<div class="map-header"></div>';
    $str .= '<div id="map_canvas"></div>';
    $str .= '</div>';
	$str .= '<!--/Map -->';

    return $str;
}
/* End Google Map */


//////////////////////////////////////////////////////////////////
// Contact Box
//////////////////////////////////////////////////////////////////
add_shortcode('contact_box', 'shortcode_contact_box');
function shortcode_contact_box($atts, $content = null) {

    $atts = shortcode_atts( array(
                                'title' => '',
                                'icon' => '',
								'extra_class_name' => ''
                            ), $atts );

    $out = '';

	$out .= '<div class="clapat-icon ' . $atts['extra_class_name'] . '">';
    $out .= '<i class="fa ' . $atts['icon'] . ' fa-2x" aria-hidden="true"></i>';
	$out .= '</div>';
	$out .= '<h6>' . do_shortcode( $content ) . '</h6>';
    $out .= '<p>' . $atts['title'] . '</p>';
	
	return $out;
	
}

//////////////////////////////////////////////////////////////////
// Popup Image
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_popup_image', 'shortcode_clapat_popup_image');
function shortcode_clapat_popup_image($atts, $content = null) {

    $atts = shortcode_atts(array(
		'thumb_url'	=> '',
    	'thumb_id'  => '',
        'img_url'	=> '',
    	'img_id'    => '',
		'extra_class_name' => ''
    ), $atts );

	$thumb_url = colega_get_image_url($atts['thumb_id'], $atts['thumb_url']);
    $img_url = colega_get_image_url($atts['img_id'], $atts['img_url']);
	
	if( empty( $atts['thumb_id'] ) ){
		$alt_text = "popup image";
	}
	else{
		$alt_text = trim( strip_tags( get_post_meta( $atts['thumb_id'], '_wp_attachment_image_alt', true ) ) );
	}

	$out = '';
    $out .= '<a class="image-link ' . $atts['extra_class_name'] . '" href="' . $img_url . '">';
    $out .= '<img src="' . $thumb_url . '" alt="' . $alt_text . '" />';
    $out .= '</a>';

    return $out;
}

//////////////////////////////////////////////////////////////////
// Captioned Image
//////////////////////////////////////////////////////////////////
add_shortcode('clapat_captioned_image', 'shortcode_clapat_captioned_image');
function shortcode_clapat_captioned_image($atts, $content = null) {

    $atts = shortcode_atts(array(
		'img_url'	=> '',
    	'img_id'    	=> '',
		'alt'			=> '',
		'caption'	=> '',
		'extra_class_name' => ''
    ), $atts );

	$img_url 	= colega_get_image_url($atts['img_id'], $atts['img_url']);
						
	$out = '';
    $out .= '<figure class="wp-block-image ' . $atts['extra_class_name'] . '">';
    $out .= '<img src="' . $img_url . '" alt="' . $atts['alt'] . '" />';
	$out .= '<figcaption>' . $atts['caption'] . '</figcaption>';
    $out .= '</figure>';

    return $out;
}

//////////////////////////////////////////////////////////////////
// Testimonials
//////////////////////////////////////////////////////////////////
add_shortcode('testimonials', 'shortcode_testimonials');
function shortcode_testimonials($atts, $content = null) {

	$atts = shortcode_atts(array(
		'extra_class_name' => ''
    ), $atts );
	
    $out = '<div class="text-carousel ' . $atts['extra_class_name'] . '">';
    $out .= do_shortcode( $content );
    $out .= '</div>';

    return $out;
}

add_shortcode('testimonial', 'shortcode_testimonial');
function shortcode_testimonial($atts, $content = null) {

    $atts = shortcode_atts(array(
        'name' => ''
    ), $atts );


    $out = '';

	$out .= '<div class="text-carousel-item">';
    $out .= '<p>"' . wp_kses_post( $content ) . '"</p>';
    $out .= '<div class="user-review">' . $atts['name'] . '</div>';
    $out .= '</div>';
	
    return $out;
}
// end testimonials

//////////////////////////////////////////////////////////////////
// Clients
//////////////////////////////////////////////////////////////////
add_shortcode('clients', 'shortcode_clients');
function shortcode_clients($atts, $content = null) {

	$atts = shortcode_atts(array(
		'extra_class_name' => ''
    ), $atts );
	
    $out = '<ul class="clients-table ' . $atts['extra_class_name'] . '">';
    $out .= do_shortcode( $content );
    $out .= '</ul>';

    return $out;
}

add_shortcode('client_item', 'shortcode_client_item');
function shortcode_client_item($atts, $content = null) {

    $atts = shortcode_atts(array(
	    'img_url'	=> '',
    	'img_id'    => ''
    ), $atts );

	$img_url 	= colega_get_image_url($atts['img_id'], $atts['img_url']);

	$out = '';
    $out .= '<li class="link">';
    $out .= '<img src="' . $img_url . '" alt="client image" />';
    $out .= '</li>';

    return $out;
	
}
// end testimonials

//////////////////////////////////////////////////////////////////
// Add shortcodes buttons to tinyMCE
//////////////////////////////////////////////////////////////////

add_action('init',          'init_shortcodes_menu');
add_action('admin_init',    'admin_init_shortcodes_menu');
	
function init_shortcodes_menu(){
	
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
        return;
	
	// register the tinyMCE buttons in case visual composer is not installed 
	// otherwise just use the shortcodes from there
    if( function_exists('vc_map') ){
    	
    	return;
    }
        
    if ( get_user_option('rich_editing') == 'true' )
    {
        add_filter( 'mce_external_plugins', 'add_shortcode_plugins' );
        add_filter( 'mce_buttons', 'register_shortcode_menu_buttons' );
    }
}
	
function add_shortcode_plugins( $plugin_array ){
	
    $plugin_array['ColegaShortcodes'] = COLEGA_SHORTCODES_DIR_URL . '/include/shortcodes.js';
    return $plugin_array;
}
	
function register_shortcode_menu_buttons( $buttons ){
	
    array_push( $buttons, "|", 'colega_shortcode_button' );
    return $buttons;
}
	
function admin_init_shortcodes_menu(){
	
    wp_localize_script( 'jquery', 'ShortcodeAttributes', array('shortcode_folder' => COLEGA_SHORTCODES_DIR_URL . '/include' ) );
}