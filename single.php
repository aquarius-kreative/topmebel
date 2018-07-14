<?php
/**
 * @package topmebel
 * created by akweb
 */
get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area uk-margin-top uk-margin-large-bottom">
            <main id="main" class="uk-container" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );


				endwhile; // End of the loop.
				?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();