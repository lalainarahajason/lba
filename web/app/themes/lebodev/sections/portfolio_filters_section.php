			<!-- Filters Overlay -->
			<div id="filters-overlay">                
                <div id="close-filters"></div>
                <div class="outer">
                    <div class="inner">    
                        <ul id="filters">
                            <li class="filters-timeline link"><a id="all" href="#" data-filter="*" class="active hide-ball"><?php echo wp_kses_post( lebotheme_get_theme_options( 'clapat_lebotheme_portfolio_filter_all_caption' ) ); ?></a></li>
                            <?php
							
								// check if the category filter is specified in page options
								$lebotheme_portfolio_category_filter	= lebotheme_get_post_meta( lebotheme_THEME_OPTIONS, get_the_ID(), 'lebotheme-opt-page-portfolio-filter-category' );

								$lebotheme_portfolio_category = null;
								if( !empty( $lebotheme_portfolio_category_filter ) ){
	
									$lebotheme_portfolio_category = array();
									$lebotheme_category_slugs = explode( ",", $lebotheme_portfolio_category_filter );
									foreach( $lebotheme_category_slugs as $lebotheme_category_slug ){
										
										$lebotheme_category_object = get_term_by( 'slug', $lebotheme_category_slug, 'portfolio_category' );
										if( $lebotheme_category_object ){
											
											array_push( $lebotheme_portfolio_category, $lebotheme_category_object );
										}
									}
								}
								else {

									$lebotheme_portfolio_category = get_terms('portfolio_category', array( 'hide_empty' => 0 ));
								}

								if( $lebotheme_portfolio_category ){

									foreach( $lebotheme_portfolio_category as $portfolio_cat ){

							?>
							<li class="filters-timeline link"><a href="#" data-filter=".<?php echo sanitize_title( $portfolio_cat->slug ); ?>" class="hide-ball"><?php echo wp_kses_post( $portfolio_cat->name ); ?></a></li>
							<?php

									}
								}

							?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Filters Overlay -->