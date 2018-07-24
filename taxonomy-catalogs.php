<?php
/**
 * @package topmebel.
 */
get_header(); ?>

    <div class="wrap">
        <div id="primary" class="uk-margin-top uk-margin-large-bottom">
            <main id="main" class="uk-container" role="main">
                <header class="page-header uk-margin">
					<?php
					the_archive_title( '<h1 class="page-title uk-text-center">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description uk-text-center">', '</div>' );
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '
                        <p id="breadcrumbs">', '</p>
                        ' );
					}
					?>
                </header><!-- .page-header -->
                <br>
                <div class="uk-flex uk-flex-wrap uk-grid-small uk-grid-divider" uk-grid>
                    <div class="uk-width-1-5">
						<?php
						wp_nav_menu( [
							'theme_location' => 'catalog-menu',
						] );
						if ( function_exists( 'dynamic_sidebar' ) ) {
							dynamic_sidebar( 'catalog-sidebar' );
						}
						?>
                    </div>
                    <div class="uk-width-expand">
                        <div class="uk-text-center">
							<?php
							$trm    = get_term_by( 'slug', $term, 'catalogs' );
							$childs = get_terms( array(
								'taxonomy'   => 'catalogs',
								'hide_empty' => false,
								'child_of'   => $trm->term_id
							) );
							if ( isset( $childs ) ) {
								echo '<div class="uk-margin uk-flex uk-flex-center uk-flex-wrap uk-grid-small">';
								foreach ( $childs as $child ) {
									echo '<div class="uk-margin-small-bottom"><a class="uk-button uk-button-default" href="' . get_category_link( $child->term_id ) . '" 
							         title="' . $child->name . ' на заказ в Темрюке">' . $child->name . '</a></div>';
								}
								echo '</div>';
							}
							?>
                        </div>
						<?php
						$args     = array(
							'post_type'      => 'products',
							'order'          => 'ASC',
							'posts_per_page' => 30,
							'tax_query'      => array(
								array(
									'taxonomy' => 'catalogs',
									'field'    => 'slug',
									'terms'    => $term
								)
							)
						);
						$products = new WP_Query( $args );
						if ( $products->have_posts() ) : ?>
                            <div class="uk-flex uk-flex-wrap uk-child-width-1-3 uk-grid-small uk-grid-match" uk-grid>
								<?php
								while ( $products->have_posts() ) : $products->the_post();

									get_template_part( 'template-parts/catalog/product', 'view' );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile; // End of the loop.
								wp_reset_postdata();
								?>
                            </div>
                            <div class="uk-text-center">
								<?php the_posts_pagination( array(
									'type'      => 'array',
									'mid_size'  => 2,
									'end_size'  => 2,
									'prev_text' => '<span uk-pagination-previous></span>',
									'next_text' => '<span uk-pagination-next></span>'
								) ); ?>
                            </div>
						<?php

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif; ?>
                    </div>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();