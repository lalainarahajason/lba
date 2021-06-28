				<div class="blog-navigation has-animation">
					<?php
					$big = 999999999; // need an unlikely integer

					$lebotheme_current_query = lebotheme_get_current_query();
					if ( get_query_var( 'paged' ) ) { $lebotheme_current_page = get_query_var( 'paged' ); }
					elseif ( get_query_var( 'page' ) ) { $lebotheme_current_page = get_query_var( 'page' ); }
					else { $lebotheme_current_page = 1; }
					
					$lebotheme_paginate_links = paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'type' => 'list',
						'format' => '?paged=%#%',
						'current' => $lebotheme_current_page,
						'total' => $lebotheme_current_query->max_num_pages,
						'prev_text' => wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_blog_prev_posts_caption') ),
						'next_text' => wp_kses_post( lebotheme_get_theme_options('clapat_lebotheme_blog_next_posts_caption') )
					) );
					
					if( lebotheme_get_theme_options( 'clapat_lebotheme_enable_ajax' ) ){
						
						$lebotheme_paginate_links = str_replace( 'a class="prev page-numbers"', 'a class="prev page-numbers ajax-link" data-type="page-transition"', $lebotheme_paginate_links ); 
						$lebotheme_paginate_links = str_replace( 'a class="page-numbers"', 'a class="page-numbers ajax-link" data-type="page-transition"', $lebotheme_paginate_links ); 
						$lebotheme_paginate_links = str_replace( 'a class="next page-numbers"', 'a class="next page-numbers ajax-link" data-type="page-transition"', $lebotheme_paginate_links ); 
					}
						
					echo wp_kses_post( $lebotheme_paginate_links ); 
					
					?>
				</div>