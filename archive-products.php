<?php
/**
 * @package topmebel.
 */
get_header(); ?>

    <div class="wrap">
        <div id="primary" class="uk-margin-top uk-margin-large-bottom">
            <main id="main" class="uk-container" role="main">
                <header class="page-header uk-margin">
                    <h1 class="page-title uk-text-center">Каталог мебели</h1>
                    <p style="text-align: center;">Предлагаем шкафы-купе, кухни и спальни, офисную мебель, детские,
                        гордеробные в Темрюке. <br> Любая мебель на заказ в разных дизайнерских вариациях.</p>
					<?php
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
						<?php
						if ( have_posts() ) : ?>
                            <div class="uk-flex uk-flex-wrap uk-child-width-1-3 uk-grid-small uk-grid-match" uk-grid>
								<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/catalog/product', 'view' );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile; // End of the loop.

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