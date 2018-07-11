<?php
/**
 * @package topmebel.
 */

get_header();
?>

    <div class="wrap">
        <div id="primary" class="content-area uk-margin-top uk-margin-large-bottom">
            <main id="main" class="uk-container" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', 'portfolio' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
