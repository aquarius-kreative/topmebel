<?php
/**
 * @package topmebel
 * created by akweb
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header>
        <h1 class="page-title uk-text-center"><?php the_title(); ?></h1>
        <h3 class="uk-margin-remove uk-text-center">
			<?php echo get_the_term_list( $post->ID, 'catalogs', '', ', ' ); ?>
        </h3>
		<?php
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '
                        <p id="breadcrumbs">', '</p>
                        ' );
		}
		?>
    </header>

</article><!-- #post-## -->

