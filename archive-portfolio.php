<?php
/**
 * @package topmebel.
 */
get_header(); ?>

    <div class="wrap">
        <div id="primary" class="uk-margin-top uk-margin-large-bottom">
            <main id="main" class="uk-container" role="main">
                <header class="page-header uk-margin">
                    <h1 class="page-title uk-text-center">Портфолио</h1>
                    <p style="text-align: center;">Фотографии наших работ</p>
					<?php
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '
                        <p id="breadcrumbs">', '</p>
                        ' );
					}
					?>
                </header><!-- .page-header -->
                <br>
                <div class="portfolio-list">
					<?php
					if ( have_posts() ) : ?>
                        <div class="uk-flex uk-flex-wrap uk-child-width-1-3 uk-grid-small" uk-grid>
							<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/portfolio/photo', 'list' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.

							?>
                        </div>
					<?php
					else :

						get_template_part( 'template-parts/post/content', 'none' );

					endif; ?>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
