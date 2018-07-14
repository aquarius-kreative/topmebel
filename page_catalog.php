<?php
/**
 *
 * Template Name: Шаблон каталога
 * @package topmebel.
 *
 */
get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area uk-margin-top uk-margin-large-bottom">
            <main id="main" class="uk-container" role="main">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
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
                        <div class="uk-flex uk-flex-wrap uk-child-width-1-3 uk-grid-small uk-grid-match" uk-grid>
							<?php
							$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
							$args     = array(
								'post_type'      => 'products',
								'order'          => 'ASC',
								'posts_per_page' => 15,
								'paged'          => $paged
							);
							$products = new WP_Query( $args );
							while ( $products->have_posts() ) : $products->the_post();

								get_template_part( 'template-parts/catalog/product', 'view' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
                            <div class="uk-text-center">
								<?php get_the_posts_pagination( array(
									'type'      => 'array',
									'mid_size'  => 2,
									'end_size'  => 2,
									'prev_text' => '<span uk-pagination-previous></span>',
									'next_text' => '<span uk-pagination-next></span>'
								) ); ?>
                            </div>
							<?php
							wp_reset_postdata();
							?>
                        </div>

                    </div>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();