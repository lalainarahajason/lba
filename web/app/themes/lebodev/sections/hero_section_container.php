<?php
/**
 * Created by Clapat.
 * Date: 29/05/20
 * Time: 1:34 PM
 */
$lebotheme_hero_properties = lebotheme_get_hero_properties( get_post_type() );

$hero_styles = $lebotheme_hero_properties->position;

if( $lebotheme_hero_properties->enabled ){

?>

		<?php if( $lebotheme_hero_properties->image && !empty( $lebotheme_hero_properties->image['url'] ) ){ ?>
		<!-- Hero Section -->
		<div id="hero" class="has-image autoscroll">
			<div id="hero-styles">
				<div id="hero-caption" class="reverse-parallax-onscroll">
					<div class="inner">
						<div class="hero-title"><span><?php echo wp_kses_post( $lebotheme_hero_properties->caption_title ); ?></span></div>
						<div class="hero-subtitle"><?php echo wp_kses_post( $lebotheme_hero_properties->caption_subtitle ); ?></div>
					</div>
				</div>
				<div id="hero-footer">
					<div class="hero-footer-left">
						<div class="button-wrap left disable-drag scroll-down">
							<div class="icon-wrap parallax-wrap">
								<div class="button-icon parallax-element">
									<i class="fa fa-angle-down"></i>
								</div>
							</div>
							<?php if( !empty( $lebotheme_hero_properties->scroll_down_caption ) ){ ?>
							<div class="button-text sticky left"><span data-hover="<?php echo esc_attr( $lebotheme_hero_properties->scroll_down_caption ); ?>"><?php echo wp_kses_post( $lebotheme_hero_properties->scroll_down_caption ); ?></span></div> 
							<?php } ?>
						</div>
					</div>
					<?php  if( lebotheme_get_theme_options( 'clapat_lebotheme_portfolio_share_social_networks' ) ){ ?>
					<div class="hero-footer-right">
						<div id="share" class="page-action-content disable-drag" data-text="<?php echo esc_attr( lebotheme_get_theme_options( 'clapat_lebotheme_portfolio_share_social_networks_caption' ) ); ?>"></div>
					</div>
					<?php } ?>
				</div>                                    
			</div>
		</div>
		<div id="hero-image-wrapper">
			<div id="hero-background-layer" class="parallax-scroll-effect">
				<div id="hero-bg-image" style="background-image:url(<?php echo esc_url( $lebotheme_hero_properties->image['url'] ); ?>)">
				<?php if( $lebotheme_hero_properties->video ){ ?>
					<div class="hero-video-wrapper">
						<video loop muted class="bgvid">
						<?php if( !empty( $lebotheme_hero_properties->video_mp4 ) ){ ?>
							<source src="<?php echo esc_url( $lebotheme_hero_properties->video_mp4 ); ?>" type="video/mp4">
						<?php } ?>
						<?php if( !empty( $lebotheme_hero_properties->video_webm ) ){ ?>
							<source src="<?php echo esc_url( $lebotheme_hero_properties->video_webm ); ?>" type="video/webm">
						<?php } ?>
						</video>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>                        
        <!--/Hero Section -->		
		<?php } else { ?>
		<!-- Hero Section -->
		<div id="hero">
			<div id="hero-styles">
				<div id="hero-caption" class="parallax-onscroll">
					<div class="inner">
						<h1 class="hero-move-title<?php if( $lebotheme_hero_properties->enable_horizontal_move ) echo ' title-backward'; ?>"><span><?php echo wp_kses_post( $lebotheme_hero_properties->caption_title ); ?></span></h1>
						<h1 class="hero-move-title<?php if( $lebotheme_hero_properties->enable_horizontal_move ) echo ' title-forward'; ?>"><span><?php echo wp_kses_post( $lebotheme_hero_properties->caption_subtitle ); ?></span></h1>
					</div>
				</div>
			</div>
		</div>
		<!--/Hero Section -->
		<?php } ?>

<?php
}
?>
