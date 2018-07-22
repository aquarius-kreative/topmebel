<?php
/**
 * @package topmebel.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
		<?php the_title( '<h1 class="page-title uk-text-center">', '</h1>' ); ?>
    </header><!-- .entry-header -->
    <div class="uk-flex uk-flex-wrap uk-grid">
        <div class="uk-width-3-4">
            <div class="entry-content">
				<?php
				the_content();
				?>
            </div><!-- .entry-content -->
        </div>
        <div class="uk-width-1-4">
			<?php get_sidebar(); ?>
        </div>
    </div>
</article><!-- #post-## -->