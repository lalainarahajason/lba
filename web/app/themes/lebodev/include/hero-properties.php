<?php

if ( ! class_exists( 'lebothemeHeroProperties' ) ) {

	class lebothemeHeroProperties
	{
		public $enabled;
		public $caption_title;
		public $caption_subtitle;
		public $position;
		public $opacity;
		public $image;
		public $foreground;
		public $video;
		public $video_webm;
		public $video_mp4;
		public $scroll_down_caption;
		public $project_info;

		public function __construct(){

			$this->enabled = false;
			$this->caption_title = "";
			$this->caption_subtitle = "";
			$this->enable_horizontal_move = false;
			$this->position = esc_attr("fixed-onscrol");
			$this->image = true;
			$this->foreground= esc_attr('light-content');
			$this->text_alignment = "";
			$this->video = false;
			$this->video_webm = "";
			$this->video_mp4 = "";
			$this->scroll_down_caption = "";
			$this->project_info = "";
		}

		public function getProperties( $post_type ){

			if( $post_type == 'lebotheme_portfolio' ){

				$this->enabled 			= true; // in portfolio projects hero is always enabled and the hero image will be displayed in showcase slider
				$this->caption_title	= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-hero-caption-title' );
				$this->caption_subtitle = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-hero-caption-subtitle' );
				$this->position 		= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-hero-position' );
				$this->foreground 		= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-bknd-color' );
				$this->image		 	= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-hero-img' );
				$this->video 			= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-video' );
				$this->video_webm 		= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-video-webm' );
				$this->video_mp4 		= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-video-mp4' );
				$this->scroll_down_caption = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-hero-scroll-caption' );
				$this->project_info 	= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-portfolio-hero-project-info' );

			} else if( $post_type == 'post' ){

				$this->enabled = true; // the hero section is always enabled in case of blog posts, displaying post title and categories
				$this->caption_title 	= get_the_title();
				$this->caption_subtitle	= lebotheme_blog_post_hero_caption();
				$this->position 		= esc_attr("parallax-onscroll");
				$this->foreground 		= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-blog-bknd-color' );
				$this->image		 	= null;

			} else if( !empty( $post_type ) ){

				$this->enabled 			= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-enable-hero' );
				$this->caption_title	= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-hero-caption-title' );
				$this->caption_subtitle = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-hero-caption-subtitle' );
				$this->enable_horizontal_move = lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-hero-enable-horizontal-move' );
				$this->position 		= esc_attr("parallax-onscroll");
				$this->foreground 		= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-bknd-color' );
				$this->image		 	= null;

			}
		}

	}
}

$lebotheme_hero_properties = new lebothemeHeroProperties();

?>
