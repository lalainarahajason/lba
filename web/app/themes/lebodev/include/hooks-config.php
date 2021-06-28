<?php
/**
 * Created by Clapat
 * Date: 26/11/19
 * Time: 11:00 AM
 */

 // Extra classes to the body
if ( ! function_exists( 'lebotheme_body_class' ) ){

	function lebotheme_body_class( $classes ) {

		$classes[] = 'hidden';
		$classes[] = 'hidden-ball';

		if( lebotheme_get_theme_options( 'clapat_lebotheme_enable_smooth_scrolling' ) ){
			
			$classes[] = 'smooth-scroll';
		}
		
		if( !lebotheme_get_theme_options( 'clapat_lebotheme_enable_ajax' ) ){
			
			$classes[] = 'load-no-ajax';
		}
		
		// return the $classes array
		return $classes;
	}
}
add_filter( 'body_class', 'lebotheme_body_class' );

// site/blog title
if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function lebotheme_wp_title() {

		echo wp_title( '|', false, 'right' );

	}
	add_action( 'wp_head', 'lebotheme_wp_title' );
}

if ( ! function_exists( 'lebotheme_menu_classes' ) ){

    function lebotheme_menu_classes(  $classes , $item, $args ){

		$classes[] = 'link';
		if( $item->menu_item_parent == "0" ){
			
			$classes[] = 'menu-timeline';
		}
		if( in_array( 'current-menu-item', $item->classes ) || in_array( 'current-menu-ancestor', $item->classes ) ){

			$classes[] = 'active';
		}
				
		return $classes;
    }

}
if ( ! function_exists( 'lebotheme_menu_link_attributes' ) ){

    function lebotheme_menu_link_attributes(  $atts, $item, $args ){

		$arr_classes = array();
		
		if( !empty($item->classes) ){

			if( !in_array( 'menu-item-type-custom', $item->classes ) && !in_array( 'menu-item-has-children', $item->classes ) ){
				
				// if the menu item is not a custom link
				$atts['data-type'] = 'page-transition';	
				$arr_classes[] = 'ajax-link';
			}
		}
		
		if( !empty($item->classes) ){
			if( in_array( 'current-menu-item', $item->classes ) || in_array( 'current-menu-ancestor', $item->classes ) ){

				$arr_classes[] = 'active';
			}
		}

		if( !empty($item->classes) ){

			if( in_array( 'menu-item-has-children', $item->classes ) ){
				// if the menu item is a parent item, just use an empty <a> tag
				if( isset( $atts['data-type'] ) ){
					$atts['data-type'] = null;
				}
			}
		}
		if( !empty( $arr_classes ) ){

			$atts['class'] = implode( ' ', $arr_classes );
		}

		return $atts;
    }

}
if ( ! function_exists( 'lebotheme_menu_item_title' ) ){

    function lebotheme_menu_item_title(  $title, $item, $args, $depth ){

		if( $depth === 0 ){
			$image = get_field('image', $item);
			
			$t = '<div class="before-span">';
			if($image){
				$t .= '<div style="background-image:url('.$image.')" class="menu-picture"></div>';
			}
			
			$t .= '<span data-hover="' . esc_attr( $title ) . '">' . $title . '</span>';
			$t .= '</div>';
			return $t;
		}
		return $title;
    }

}
// change priority here if there are more important actions associated with the hook
add_action('nav_menu_css_class', 'lebotheme_menu_classes', 10, 3);
add_filter('nav_menu_link_attributes', 'lebotheme_menu_link_attributes', 10, 3 );
add_filter( 'nav_menu_item_title', 'lebotheme_menu_item_title', 10, 4 );
// add_filter( 'wp_nav_menu_items', 'lebotheme_menu_item', 10, 2);

// function lebotheme_menu_item($items, $args){
// 	echo "<pre>";
// 	print_r($items);
// 	echo "</pre>";
// 	return $items;
// }

class LeboMenu_Walker extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
		$class_names = $value = '';
	
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
	
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
	
		// MODIF 1
		// si le lien est vide...
		// ou s'il comment par '#' (ancre)...
		// alors la balise sera un 'span' ou lieu d'un 'a'
		$balise = ( ! empty( $item->url ) && substr( $item->url, 0, 1 ) != '#') ? 'a' : 'span';
	
		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	
		// MODIF 2 : on n'ajout l'URL seulent si c'est un lien
		if( 'a' == $balise )
			$atts['href']   = ! empty( $item->url ) ? $item->url : '';
	
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
	
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$image = get_field('image', $item);
		// MODIF 3 : on remplace 'a' par $balise
		$item_output = $args->before;

		
		$item_output .= "<div class='inline-block'>";

		if( $image ) {
			$item_output .= '<div style="background-image:url('.$image.')" class="menu-picture"></div>';
		}
		
		$item_output .= '<' . $balise . ''. $attributes .'>';
		$item_output .= '<div class="before-span">';
		$item_output .= '<span data-hover="' . esc_attr( $item->title ) . '">' . $item->title . '</span>';
		$item_output .= '</div>';
		//$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</' . $balise . '>';

		$item_output .= "</div>";
		$item_output .= $args->after;
	
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// hooks to add extra classes for next & prev portfolio projects and single blog posts
if ( ! function_exists( 'lebotheme_prev_post_link' ) ){

    function lebotheme_prev_post_link( $output, $format, $link, $post ){

			if( $format == 'lebotheme_portfolio' ){

				$output = '';
				$next_post = $post;

				if( $post ){

					$next_post = $post;
				}
				else{ // could not find the next post so rewind to the oldest one

					$args = array(
							'posts_per_page'	=> 2,
							'order'           => 'DESC',
							'post_type'       => 'lebotheme_portfolio',
						);

					$find_query = new WP_Query( $args );
					if ( $find_query->have_posts() && ($find_query->found_posts > 1) )  {

						$find_query->the_post();

						$next_post = $find_query->post;

					} else {
						// no posts found
					}

					wp_reset_postdata();
				}

				if( $next_post ){

					$lebotheme_hero_image = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, $next_post->ID, 'lebotheme-opt-portfolio-hero-img' );
					$lebotheme_hero_title = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, $next_post->ID, 'lebotheme-opt-portfolio-hero-caption-title' );
					$lebotheme_hero_subtitle = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, $next_post->ID, 'lebotheme-opt-portfolio-hero-caption-subtitle' );
					$lebotheme_nav_class = '';
					if( !lebotheme_get_theme_options('clapat_lebotheme_enable_ajax') ) { $lebotheme_nav_class = ' thumb-no-ajax'; }
					
					$output = '<!-- Project Navigation -->';
                    $output .= '<div id="project-nav" class="app-canvas' . $lebotheme_nav_class . '">';
                    $output .= '<div class="next-project-wrap">';
                    $output .= '<div class="next-project-title">';
                    $output .= '<div class="inner">';
                    $output .= '<div id="itemsWrapperLinks">';
                    $output .= '<div id="itemsWrapper">';
                    $output .= '<div class="item disable-drag active">';
                    $output .= '<div class="item-appear">';
                    $output .= '<div class="item-content">';
                    $output .= '<a class="item-wrap ajax-link-project" data-type="page-transition" href="'. esc_url( get_permalink( $next_post ) ) . '"></a>';
                    $output .= '<div class="item-wrap-image"><img src="' . esc_url( $lebotheme_hero_image['url'] ) . '" class="item-image grid__item-img" data-firstline="' . esc_attr( lebotheme_get_theme_options( 'clapat_lebotheme_portfolio_next_caption_first_line' ) ) . '" data-secondline="' . esc_attr( lebotheme_get_theme_options( 'clapat_lebotheme_portfolio_next_caption_second_line' ) ) .'" alt="' . esc_attr('Next Project Image', 'lebotheme') . '"></div>';
                    $output .= '<img class="grid__item-img grid__item-img--large" src="' . esc_url( $lebotheme_hero_image['url'] ) . '" alt="' . esc_attr('Next Project Image', 'lebotheme') . '" />';
                    $output .= '</div>';
                    $output .= '<div class="item-caption">';
                    $output .= '<h2 class="item-title">' . wp_kses_post( $lebotheme_hero_title ) . '</h2>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';                                      
                    $output .= '<div class="marquee-wrapper">';
                    $output .= '<div class="next-title-marquee" data-text="';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . '">';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . '</div>';
                    $output .= '</div>';
                    $output .= '</div>';                
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
					$output .= '<!--/Project Navigation -->';

				}

			}
			else if(  $format == 'blog-post' ){

				$output = '';
				if( $post ){

					$output = '<div class="post-navigation">';
                    $output .= '<div class="container">';
                    $output .= '<div class="post-next">';
					$output .= wp_kses_post( lebotheme_get_theme_options( 'clapat_lebotheme_blog_next_post_caption' ) );
					$output .= '<div class="post-next-title">';
                    $output .= '<a href="' . get_permalink( $post ) . '" class="ajax-link hide-ball" data-type="page-transition">';
                    $output .= '<span>' . get_the_title( $post ) . '</span>';
					$output .= '</a>';
					$output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';

				}

				return $output;
			}
			else {

				if( $post ){

					$output = get_permalink( $post );
				}
			}

			return $output;
    }

}
if ( ! function_exists( 'lebotheme_next_post_link' ) ){

    function lebotheme_next_post_link( $output, $format, $link, $post ){

			if( $format == 'lebotheme_portfolio' ){

				$output = '';
				$next_post = $post;

				if( $post ){

					$next_post = $post;
				}
				else{ // could not find the next post so rewind to the oldest one

					$args = array(
								'posts_per_page'   => 2,
								'order'            => 'ASC',
								'post_type'        => 'lebotheme_portfolio',
							);

					$find_query = new WP_Query( $args );
					if ( $find_query->have_posts() && ($find_query->found_posts > 1) )  {

						$find_query->the_post();

						$next_post = $find_query->post;

					} else {
						// no posts found
					}

					wp_reset_postdata();
				}

				if( $next_post ){

					$lebotheme_hero_image = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, $next_post->ID, 'lebotheme-opt-portfolio-hero-img' );
					$lebotheme_hero_title = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, $next_post->ID, 'lebotheme-opt-portfolio-hero-caption-title' );
					$lebotheme_hero_subtitle = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, $next_post->ID, 'lebotheme-opt-portfolio-hero-caption-subtitle' );
					$lebotheme_nav_class = '';
					if( !lebotheme_get_theme_options('clapat_lebotheme_enable_ajax') ) { $lebotheme_nav_class = ' thumb-no-ajax'; }
					
					$output = '<!-- Project Navigation -->';
                    $output .= '<div id="project-nav" class="app-canvas' . $lebotheme_nav_class . '">';
                    $output .= '<div class="next-project-wrap">';
                    $output .= '<div class="next-project-title">';
                    $output .= '<div class="inner">';
                    $output .= '<div id="itemsWrapperLinks">';
                    $output .= '<div id="itemsWrapper">';
                    $output .= '<div class="item disable-drag active">';
                    $output .= '<div class="item-appear">';
                    $output .= '<div class="item-content">';
                    $output .= '<a class="item-wrap ajax-link-project" data-type="page-transition" href="'. esc_url( get_permalink( $next_post ) ) . '"></a>';
                    $output .= '<div class="item-wrap-image"><img src="' . esc_url( $lebotheme_hero_image['url'] ) . '" class="item-image grid__item-img" data-firstline="' . esc_attr( lebotheme_get_theme_options( 'clapat_lebotheme_portfolio_next_caption_first_line' ) ) . '" data-secondline="' . esc_attr( lebotheme_get_theme_options( 'clapat_lebotheme_portfolio_next_caption_second_line' ) ) .'" alt="' . esc_attr('Next Project Image', 'lebotheme') . '"></div>';
                    $output .= '<img class="grid__item-img grid__item-img--large" src="' . esc_url( $lebotheme_hero_image['url'] ) .'" alt="' . esc_attr('Next Project Image', 'lebotheme') . '" />';
                    $output .= '</div>';
                    $output .= '<div class="item-caption">';
                    $output .= '<h2 class="item-title">' . wp_kses_post( $lebotheme_hero_title ) . '</h2>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';                                      
                    $output .= '<div class="marquee-wrapper">';
                    $output .= '<div class="next-title-marquee" data-text="';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . ' ';
					$output .= esc_attr( $lebotheme_hero_title ) . '">';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . ' ';
					$output .= wp_kses_post( $lebotheme_hero_title ) . '</div>';
                    $output .= '</div>';
                    $output .= '</div>';                
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
					$output .= '<!--/Project Navigation -->';

				}

			}
			else if( $format == 'blog-post' ){

				// nothing here for the moment
			}
			else {

				if( $post ){

					$output = get_permalink( $post );
				}
			}

		return $output;
	}

}
// change priority here if there are more important actions associated with the hook
add_filter('next_post_link', 'lebotheme_next_post_link', 10, 4);
add_filter('previous_post_link', 'lebotheme_prev_post_link', 10, 4);

// hooks to add extra classes for next & prev blog posts
if ( ! function_exists( 'lebotheme_next_posts_link_attributes' ) ){

	function lebotheme_next_posts_link_attributes(){

		return 'class="ajax-link" data-type="page-transition"';
	}
}
if ( ! function_exists( 'lebotheme_prev_posts_link_attributes' ) ){

	function lebotheme_prev_posts_link_attributes(){

		return 'class="ajax-link" data-type="page-transition"';
	}
}
// change priority here if there are more important actions associated with the hook
add_filter('next_posts_link_attributes', 'lebotheme_next_posts_link_attributes', 10, 4);
add_filter('previous_posts_link_attributes', 'lebotheme_prev_posts_link_attributes', 10, 4);

if ( ! function_exists( 'lebotheme_comment_reply_link' ) ){

	function lebotheme_comment_reply_link($link, $args, $comment, $post){

		return str_replace("class='comment-reply-link", "class='comment-reply-link reply hide-ball", $link);
	}
}
// change priority here if there are more important actions associated with the hook
add_filter('comment_reply_link', 'lebotheme_comment_reply_link', 99, 4);

// category filter
if ( ! function_exists( 'lebotheme_category' ) ){
	
	function lebotheme_category( $thelist, $separator, $parents ){
		
		return str_replace('<a href="', '<a class="ajax-link link" data-type="page-transition" href="', $thelist);
	}
}
add_filter('the_category', 'lebotheme_category', 10, 3);

// tags filter
if ( ! function_exists( 'lebotheme_tags' ) ){
	
	function lebotheme_tags( $tag_list, $before, $sep, $after, $id ){
		
		return str_replace('<a href="', '<a class="ajax-link link" data-type="page-transition" href="', $tag_list);
	}
}
add_filter('the_tags', 'lebotheme_tags', 10, 5);

// search filter
if( !function_exists('lebotheme_searchfilter') ){

    function lebotheme_searchfilter( $query ) {

    	if ( !is_admin() && $query->is_main_query() ) {

    		if ($query->is_search ) {

    			$post_types = get_query_var('post_type');

    			if( empty( $post_types ) ){

            		$query->set('post_type', array('post'));
    			}
        	}

        }

        return $query;

    }
    add_filter('pre_get_posts','lebotheme_searchfilter');

}
