<?php
/**
 * Created by Clapat.
 * Date: 08/06/20
 * Time: 11:33 AM
 */

// hero section container properties
$lebotheme_hero_properties = lebotheme_get_hero_properties( get_post_type() );

if( $lebotheme_hero_properties->enabled ){

	get_template_part('sections/hero_section_container');
}
else {
		
?>
		<!-- Hero Section -->
		<div id="hero" <?php if( !lebotheme_get_theme_options( 'clapat_lebotheme_enable_page_title_as_hero' ) ){ echo 'class="hero-hidden"'; } ?>>
			<!--div id="hero-styles">
				<div id="hero-caption" class="parallax-onscroll">
					<div class="inner">
						<h1 class="hero-move-title"><span><?php echo wp_kses_post( get_the_title() ); ?></span></h1>
					</div>
				</div>
			</div-->
		</div>
		<!--/Hero Section -->
		
<?php

}

?>
