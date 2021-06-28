<?php

get_header();

while ( have_posts() ){

    the_post();

	$lebotheme_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>
	
	<!-- Main -->
	<div id="main">
			
			<!-- Hero Section -->
            <div id="hero" class="post-hero">                    
				<div id="hero-caption">
					<div class="inner">
						<div class="post-article-wrap">                            
							<!--div class="article-head">
								<ul class="entry-meta entry-date">
									<li class="link"><a href="<?php the_permalink(); ?>"><?php the_time('F j, Y'); ?></a></li>
								</ul>
							</div-->
                                                    
                            <div class="article-content">                                
								<div class="post-title"><?php the_title(); ?></div>                                
								<div class="entry-meta entry-categories">
									<ul class="post-categories">
									<?php 
										$lebotheme_categories = get_the_category();
										if ( ! empty( $lebotheme_categories ) ) {
											
											foreach( $lebotheme_categories as $lebotheme_category ) {
												
												echo '<li class="link">';
												echo wp_kses_post( '<a class="ajax-link" data-type="page-transition" href="' . esc_url( get_category_link( $lebotheme_category->term_id ) ) . '" rel="category tag"><span data-hover="' . esc_attr( $lebotheme_category->name ) . '">' . esc_html( $lebotheme_category->name ) . '</span></a>' );
												echo '</li>';
											}
										}
									?>
									</ul>
								</div>
                            </div>                                                                                        
						</div>
                    </div>
                </div>
            </div>                     
            <!--/Hero Section -->   
				
		<!-- Main Content -->
		<div id="main-content" >
			<!-- Post -->
			<div id="post" <?php post_class('post-content'); ?>>
				
				<?php if( $lebotheme_post_image ){ ?>
				<div class="post-image">
					<img src="<?php echo esc_url( $lebotheme_post_image[0] ); ?>" alt="<?php esc_attr_e("Post Image", "lebotheme"); ?>" class="post-thumbnail">
				</div>
				<?php } ?>
				<!-- Post Content -->
				<div id="post-content">
					
					<?php the_content(); ?>
								
					<div class="page-links">
					<?php
						wp_link_pages();
					?>
					</div>
					
				</div>
				<!--/Post Content -->
				
				<!-- Post Meta Data -->
                <div class="post-meta-data">
					<div class="container">
						<?php if ( has_tag() ) {
							
							echo '<ul class="entry-meta entry-tags"><li>' . esc_html__('Tags:', 'lebotheme') .'</li>';
							$lebotheme_tags = get_the_tags();
							if ( ! empty( $lebotheme_tags ) ) {
											
								foreach( $lebotheme_tags as $lebotheme_tag ) {
												
									echo '<li class="link">';
									echo wp_kses_post( '<a class="ajax-link" data-type="page-transition" href="' . esc_url( get_tag_link( $lebotheme_tag->term_id ) ) . '" rel="category tag"><span data-hover="' . esc_attr( $lebotheme_tag->name ) . '">' . esc_html( $lebotheme_tag->name ) . '</span></a>' );
									echo '</li>';
								}
							}
							echo '</ul>';
							
						} ?>
                    </div>
                </div>
                <!--/Post Meta Data -->
				
				<!-- Post Navigation -->
				<?php //previous_post_link( 'blog-post', lebotheme_get_theme_options( 'clapat_lebotheme_blog_next_post_caption' ) ); ?>
				<!--/Post Navigation -->
				
				<?php //comments_template(); ?>
				
			</div>
			<!-- /Post -->
		</div>
		<!-- /Main Content -->
	</div>
	<!-- /Main -->
<?php

}

get_footer();

?>
