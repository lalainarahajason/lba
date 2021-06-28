<?php

if ( function_exists( 'vc_map' ) ) {
	
vc_map( array(
	'name' => 'Title',
	'base' => 'title',
	'icon' => 'icon-vc-clapat-lebotheme',
	'is_container' => 'true',
	'category' => esc_html__('lebotheme - Typo Elements', 'lebotheme'),
	'description' => esc_html__('Title', 'lebotheme'),
	'admin_enqueue_css' => array( get_template_directory_uri() . '/include/vc-extend.css' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Title Size', 'lebotheme'),
			'description' => '',
			'param_name' => 'size',
			'value' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Has Underline?', 'lebotheme'),
			'description' => esc_html__('If the title is displayed underlined or without underline', 'lebotheme'),
			'param_name' => 'underline',
			'value' => array( 'no', 'yes'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Big Title?', 'lebotheme'),
			'description' => esc_html__('This parameter applies only for H1 headings. If the title is normal or bigger title font size.', 'lebotheme'),
			'param_name' => 'big',
			'value' => array( 'no', 'yes'),
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'lebotheme'),
			'param_name' => 'content',
			'value' => esc_html__('Content goes here', 'lebotheme'),
		),
	)
) );

vc_map( array(
	'name' => 'Button',
	'base' => 'button',
	'icon' => 'icon-vc-clapat-lebotheme',
	'is_container' => 'true',
	'category' => esc_html__('lebotheme - Typo Elements', 'lebotheme'),
	'description' => esc_html__('Button', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Button Link', 'lebotheme'),
			'description' => esc_html__('URL for the button', 'lebotheme'),
			'param_name' => 'link',
			'value' => 'http://',
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Target Window', 'lebotheme'),
			'description' => esc_html__('Button link opens in a new or current window', 'lebotheme'),
			'param_name' => 'target',
			'value' => array( '_blank', '_self'),
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Hover Caption', 'lebotheme'),
			'description' => esc_html__('Caption when hovering the button', 'lebotheme'),
			'param_name' => 'hover_caption',
			'value' => esc_html__('Hover Caption', 'lebotheme'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Button type', 'lebotheme'),
			'description' => '',
			'param_name' => 'type',
			'value' => array( 'normal', 'outline'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Rounded border', 'lebotheme'),
			'description' => '',
			'param_name' => 'rounded',
			'value' => array( 'yes', 'no'),
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Caption', 'lebotheme'),
			'param_name' => 'content',
			'value' => esc_html__('Caption goes here', 'lebotheme'),
		),
		)
) );

vc_map( array(
	'name' => 'Space Between Buttons',
	'base' => 'space_between_buttons',
	'icon' => 'icon-vc-clapat-lebotheme',
	'category' => esc_html__('lebotheme - Typo Elements', 'lebotheme'),
	'description' => esc_html__('Adds a space between two button shortcodes', 'lebotheme'),
	'show_settings_on_create' => false
) );

vc_map( array(
	'name' => 'Text Link',
	'base' => 'text_link',
	'icon' => 'icon-vc-clapat-lebotheme',
	'is_container' => 'false',
	'category' => esc_html__('lebotheme - Typo Elements', 'lebotheme'),
	'description' => esc_html__('Text Link', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Link', 'lebotheme'),
			'description' => esc_html__('URL for the link', 'lebotheme'),
			'param_name' => 'link',
			'value' => 'http://',
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Target Window', 'lebotheme'),
			'description' => esc_html__('Link opens in a new or current window', 'lebotheme'),
			'param_name' => 'target',
			'value' => array( '_blank', '_self'),
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Caption', 'lebotheme'),
			'description' => esc_html__('Caption displayed over the link', 'lebotheme'),
			'param_name' => 'caption',
			'value' => esc_html__('Read More', 'lebotheme'),
		)
		)
) );

vc_map( array(
	'name' => 'Marquee Content',
	'base' => 'marquee_content',
	'icon' => 'icon-vc-clapat-lebotheme',
	'is_container' => 'true',
	'category' => esc_html__('lebotheme - Typo Elements', 'lebotheme'),
	'description' => esc_html__('Marquee Content', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'lebotheme'),
			'param_name' => 'content',
			'value' => esc_html__('Content goes here', 'lebotheme'),
		),
	)
) );

vc_map( array(
	'name' => 'Accordion',
	'base' => 'accordion',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_parent' => array('only' => 'accordion_item'),
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Accordion', 'lebotheme'),
	'content_element' => true,
	'show_settings_on_create' => false,
	"params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_accordion extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Accordion Item',
	'base' => 'accordion_item',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_child' => array('only' => 'accordion' ),
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Accordion Item', 'lebotheme'),
	'content_element' => true,
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Title', 'lebotheme'),
			'description' => '',
			'param_name' => 'title',
			'value' => 'Accordion Item Title',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'lebotheme'),
			'param_name' => 'content',
			'value' => esc_html__('Content goes here', 'lebotheme'),
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_accordion_item extends WPBakeryShortCode {}}

vc_map( array(
	'name' => 'Icon Service',
	'base' => 'service',
	'icon' => 'icon-vc-clapat-lebotheme',
	'is_container' => 'true',
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Service Box', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Icon', 'lebotheme'),
			'description' => esc_html__('Icon displayed within service box. Type in the class of the icon in this edit box. The complete and latest list: http://fortawesome.github.io/Font-Awesome/icons/', 'lebotheme'),
			'param_name' => 'icon',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Service Title', 'lebotheme'),
			'description' => esc_html__('Title of the service', 'lebotheme'),
			'param_name' => 'title',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'lebotheme'),
			'param_name' => 'content',
			'value' => esc_html__('Content goes here', 'lebotheme'),
		),
	)
) );

vc_map( array(
	'name' => 'Contact Info Box',
	'base' => 'contact_box',
	'icon' => 'icon-vc-clapat-lebotheme',
	'is_container' => 'true',
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Contact Info  Box', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Icon', 'lebotheme'),
			'description' => esc_html__('Icon displayed within contact info box. Type in the class of the icon in this edit box. The complete and latest list: http://fortawesome.github.io/Font-Awesome/icons/', 'lebotheme'),
			'param_name' => 'icon',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Title', 'lebotheme'),
			'description' => esc_html__('Title or header of the contact info box', 'lebotheme'),
			'param_name' => 'title',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Contact Info', 'lebotheme'),
			'param_name' => 'content',
			'value' => esc_html__('Contact info goes here', 'lebotheme'),
		),
	)
) );

vc_map( array(
	'name' => 'Map',
	'base' => 'lebotheme_map',
	'icon' => 'icon-vc-clapat-lebotheme',
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Adds a google map with settings from theme options.', 'lebotheme'),
	'show_settings_on_create' => false
) );

vc_map( array(
	'name' => 'Normal Image Slider',
	'base' => 'general_slider',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_parent' => array('only' => 'general_slide'),'category' => esc_html__('lebotheme - Sliders', 'lebotheme'),
	'description' => esc_html__('Normal Image Slider', 'lebotheme'),
	'content_element' => true,
	'show_settings_on_create' =>true,
	"params" => array(
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_general_slider extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Slide',
	'base' => 'general_slide',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_child' => array('only' => 'general_slider' ),'category' => esc_html__('lebotheme - Sliders', 'lebotheme'),
	'description' => esc_html__('Slide', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Slider Image', 'lebotheme'),
			'description' => esc_html__('Image representing this slide', 'lebotheme'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Image ALT', 'lebotheme'),
			'description' => esc_html__('The ALT attribute specifies an alternate text for an image, if the image cannot be displayed', 'lebotheme'),
			'param_name' => 'alt',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_general_slide extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Carousel Image Slider',
	'base' => 'carousel_slider',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_parent' => array('only' => 'carousel_slide'),'category' => esc_html__('lebotheme - Sliders', 'lebotheme'),
	'description' => esc_html__('Carousel Image Slider', 'lebotheme'),
	'content_element' => true,
	'show_settings_on_create' =>true,
	"params" => array(
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_carousel_slider extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Carousel Slide',
	'base' => 'carousel_slide',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_child' => array('only' => 'carousel_slider' ),
	'category' => esc_html__('lebotheme - Sliders', 'lebotheme'),
	'description' => esc_html__('Carousel Slide', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Slider Image', 'lebotheme'),
			'description' => esc_html__('Image representing this slide', 'lebotheme'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Image ALT', 'lebotheme'),
			'description' => esc_html__('The ALT attribute specifies an alternate text for an image, if the image cannot be displayed', 'lebotheme'),
			'param_name' => 'alt',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_carousel_slide extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Image Collage',
	'base' => 'clapat_collage',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_parent' => array('only' => 'clapat_collage_image'),
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Collage with image popup', 'lebotheme'),
	'content_element' => true,
	'show_settings_on_create' => true,
	"params" => array(
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_clapat_collage extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Collage Image',
	'base' => 'clapat_collage_image',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_child' => array('only' => 'clapat_collage' ),
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Collage Image', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Collage Image Thumbnail', 'lebotheme'),
			'description' => esc_html__('Thumbnail image representing this ollage item, included in carousel and linking a high res version.', 'lebotheme'),
			'param_name' => 'thumb_img_id',
			'value' => '',
		),
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Collage Image', 'lebotheme'),
			'description' => esc_html__('Image representing this collage item opening in a popup', 'lebotheme'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Image ALT', 'lebotheme'),
			'description' => esc_html__('The ALT attribute specifies an alternate text for an image, if the image cannot be displayed', 'lebotheme'),
			'param_name' => 'alt',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Collage Image Caption', 'lebotheme'),
			'description' => esc_html__('The caption of this collage item', 'lebotheme'),
			'param_name' => 'info',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_clapat_collage_image extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Popup Image',
	'base' => 'clapat_popup_image',
	'icon' => 'icon-vc-clapat-lebotheme',
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Image Popup', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Zoomed Image', 'lebotheme'),
			'description' => esc_html__('Zoomed image - usually a higher res image', 'lebotheme'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Thumbnail Image', 'lebotheme'),
			'description' => esc_html__('The thumbnail', 'lebotheme'),
			'param_name' => 'thumb_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_clapat_popup_image extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Captioned Image',
	'base' => 'clapat_captioned_image',
	'icon' => 'icon-vc-clapat-lebotheme',
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Captioned Image', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Image', 'lebotheme'),
			'description' => esc_html__('The image', 'lebotheme'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('ALT', 'lebotheme'),
			'description' => esc_html__('ALT attribute.', 'lebotheme'),
			'param_name' => 'alt',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Caption', 'lebotheme'),
			'description' => esc_html__('Image caption.', 'lebotheme'),
			'param_name' => 'caption',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_clapat_captioned_image extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Testimonials',
	'base' => 'testimonials',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_parent' => array('only' => 'testimonial'),
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Testimonials Carousel', 'lebotheme'),
	'content_element' => true,
	'show_settings_on_create' => true,
	"params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_testimonials extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Testimonial',
	'base' => 'testimonial',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_child' => array('only' => 'testimonials' ),
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Testimonial', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Name', 'lebotheme'),
			'description' => esc_html__('Name of the person or company this testimonial belongs to.', 'lebotheme'),
			'param_name' => 'name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __('Content', 'lebotheme'),
			'param_name' => 'content',
			'value' => __('Content goes here', 'lebotheme'),
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_testimonial extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Clients',
	'base' => 'clients',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_parent' => array('only' => 'client_item'),
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Clients List', 'lebotheme'),
	'content_element' => true,
	'show_settings_on_create' => true,
	"params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_clients extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Client',
	'base' => 'client_item',
	'icon' => 'icon-vc-clapat-lebotheme',
	'as_child' => array('only' => 'clients' ),
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Client Logo or Image', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Client Logo or Image', 'lebotheme'),
			'description' => esc_html__('The client logo', 'lebotheme'),
			'param_name' => 'img_id',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_client_item extends WPBakeryShortCode {}}

vc_map( array(
	'name' => 'Video Hosted',
	'base' => 'lebotheme_video',
	'icon' => 'icon-vc-clapat-lebotheme',
	'category' => esc_html__('lebotheme - Elements', 'lebotheme'),
	'description' => esc_html__('Self hosted video', 'lebotheme'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Cover Image', 'lebotheme'),
			'description' => esc_html__('Cover image for still video', 'lebotheme'),
			'param_name' => 'cover_img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Webm URL', 'lebotheme'),
			'description' => esc_html__('URL of the self hosted video in webm format', 'lebotheme'),
			'param_name' => 'webm_url',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Mp4 URL', 'lebotheme'),
			'description' => esc_html__('URL of the self hosted video in mp4 format', 'lebotheme'),
			'param_name' => 'mp4_url',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'lebotheme'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'lebotheme'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_lebotheme_video extends WPBakeryShortCode {}}

} // if vc_map function exists
?>