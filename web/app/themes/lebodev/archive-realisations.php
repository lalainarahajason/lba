<?php

get_header();

if ( have_posts() ){

$lebotheme_blog_layout = lebotheme_get_theme_options( 'clapat_lebotheme_blog_layout' );

?>
	
	<!-- Main -->
	<div id="main">
	
		<!-- Hero Section -->
        <div id="hero">
           <div id="hero-styles" class="parallax-onscroll">
                <div id="hero-caption" class="text-align-center">
                    <div class="inner">
						<div class="scale-wrapper">
                            <!--h4>Réalisations</h4-->
                            <h1 class="text-center">Notre expertise, <br/> au service de vos <strong>projets</strong></h1>
						</div>
                    </div>
                </div>                    
            </div>
		</div>  
		
		
		<!--/Hero Section -->
		<?php 
			$terms = get_terms( array(
				'taxonomy' => 'realisations',
				'hide_empty' => false
			));
		?>	
		<?php if($terms) : ?>
			<!--div class="show-hide-filter">
				<p class="text-center text-uppercase poppins letter-spacing-2 d-flex justify-content-center align-items-center">
					<span class="d-inline-block toggle-filter d-flex justify-content-center align-items-center">
						<span class="d-inine-block open-filter">Filtrer  </span>
						<span class="close-filter ml-1">x</span>
					</span>
				</p>
			</div-->
			<div class="filtre-wrapper" style="height:auto; overflow:hidden">
				<!-- Filtre catégorie -->
				<div class="filtre-container">
					<div class="d-flex flex-wrap justify-content-center filtre-categorie">
						<?php foreach($terms as $term) : 
								$icone = get_field('lebo-icone', $term);
							?>
							<a href="#filtre-content" data-filter="<?php echo $term->slug; ?>" class="filtre-item d-block">
								<?php if($icone) : ?>
									<div class="filtre-icone"><img src="<?php echo $icone; ?>" /></div>
								<?php endif; ?>
								<?php echo $term->name; ?>
							</a>
						<?php endforeach; ?>
					</div>
					<!-- end filtre catégorie -->
				</div>
			</div>
		<?php endif; ?>
    	<!-- Main Content -->
    	<div id="main-content">
			<!-- Blog-->
			<div id="blog" class="<?php echo sanitize_html_class( $lebotheme_blog_layout ); ?>">
				
				<!-- Blog-Content-->
				<div data-fx="1" id="filtre-content" class="d-flex" style="display:flex; flex-wrap:wrap">
				<?php 
						
					// the loop
					while( have_posts() ){

						the_post();
						global $post;
						
						$categories = get_the_terms($post->ID, 'realisations');
						$slug = array();

						if(is_array($categories)) {
							$slug = array_map(function($item){
								$item = $item->slug;
								return $item;
							}, $categories);
						}	
					
                    ?>
                        <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" class="<?php echo implode(' ', $slug); ?> col-12 col-sm-6 post-realisation lebostudio-card d-flex align-items-center">
							<div class="post-content">
								<?php $thumbnail = get_field('vignette_portfolio', $post->ID); ?>
								<img src="<?php echo $thumbnail?>" class="position-relative" /> <!--the_post_thumbnail( 'realisation', array('class' => 'position-absolute')); ?> -->
								<?php the_title( '<h2 class="card-title position-absolute silk d-flex pl-3 pl-sm-4">', '</h2>' ); ?>
							</div>
							<span href="#" class="text-uppercase fill-color position-absolute border-radius-0 btn btn-lg font-weight-600"><span>Découvrir</span></a>
						</a>

                    <?php 
					}
							
				?>
				<!-- /Blog-Content-->
				</div>
				<?php
						
					lebotheme_pagination();

				?>
			</div>
			<!-- /Blog-->
		</div>
		<!--/Main Content-->
	</div>
	<!-- /Main -->

<?php

}
	
get_footer();

?>