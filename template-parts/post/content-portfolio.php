<?php
/**
 * @package topmebel.
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
    <div class="uk-flex uk-grid-small uk-flex-wrap uk-child-width-1-3 uk-margin" uk-lightbox>
		<?php
		if ( ! empty( types_render_field( 'photos', array() ) ) ):
			$images = explode( " ", types_render_field( "photos", array(
				'size' => 'full',
				'url'  => true
			) ) );
			foreach ( $images as $image ):
				?>
                <div>
                    <div class="portfolio-item">
                        <div class="uk-cover-container">
                            <canvas height="270"></canvas>
                            <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" uk-cover>
                            <a href="<?php echo $image; ?>" class="overlay-link">
                                <div class="uk-position-cover">
                                    <div class="uk-position-center">
                                        <span uk-icon="icon: search; ratio: 5"></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
			<?php
			endforeach;
		endif;
		?>
    </div>
</article><!-- #post-## -->


