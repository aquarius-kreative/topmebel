<?php
/**
 * @package topmebel.
 */
get_header(); ?>

    <div class="wrap">
        <div id="primary" class="uk-margin-top uk-margin-large-bottom">
            <main id="main" class="uk-container" role="main">
                <header class="page-header">
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
				<?php
				if ( have_posts() ) : ?>
                    <div class="uk-flex uk-flex-wrap uk-child-width-1-2">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/post/content', get_post_format() );

						endwhile;
						?>
                    </div>
                    <div class="uk-text-center">
						<?php the_posts_pagination(
							array(
								'type'      => 'array',
								'mid_size'  => 2,
								'end_size'  => 2,
								'prev_text' => '<span uk-pagination-previous></span>',
								'next_text' => '<span uk-pagination-next></span>'
							)
						); ?>
                    </div>
				<?php

				else :

					get_template_part( 'template-parts/post/content', 'none' );

				endif; ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();