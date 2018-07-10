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
    <div class="uk-card">
        <div class="uk-card-header uk-light tm-background-red">
            <h3 class="uk-card-title"><?php echo 'Цена ' . types_render_field( "price", array() ); ?></h3>
        </div>
        <div class="uk-card-body">
            <div class="uk-flex uk-flex-wrap uk-grid-small" uk-grid>
                <div class="uk-width-3-4">
                    <div class="uk-margin-auto" uk-slideshow="min-height: 400; max-height: 600; animation: fade"
                         style="max-width: 600px;">

                        <div class="uk-position-relative uk-visible-toggle uk-light">
                            <ul class="uk-slideshow-items">
                                <li>
                                    <img src="<?php echo get_the_post_thumbnail_url( $post, 'full' ); ?>" uk-cover>
                                </li>
								<?php
								if ( ! empty( types_render_field( 'images', array() ) ) ):
									$images = explode( " ", types_render_field( "images", array(
										'size' => 'full',
										'url'  => true
									) ) );
									foreach ( $images as $image ):
										?>
                                        <li>
                                            <img src="<?php echo $image; ?>" uk-cover>
                                        </li>
									<?php
									endforeach;
								endif;
								?>
                            </ul>
                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                               uk-slidenav-previous uk-slideshow-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                               uk-slidenav-next
                               uk-slideshow-item="next"></a>
                        </div>

                        <div class="uk-margin-small-top">
                            <ul class="uk-thumbnav">
                                <li uk-slideshow-item="0"><a href="#" class="uk-cover-container">
                                        <canvas width="100" height="100"></canvas>
                                        <img
                                                src="<?php echo get_the_post_thumbnail_url( $post, 'small' ); ?>"
                                                uk-cover>
                                    </a>
                                </li>
								<?php
								if ( ! empty( types_render_field( 'images', array() ) ) ):
									foreach ( $images as $index => $image ):
										?>
                                        <li uk-slideshow-item="<?php echo ++ $index; ?>">
                                            <a href="#" class="uk-cover-container">
                                                <canvas width="100" height="100"></canvas>
                                                <img src="<?php echo $image; ?>" uk-cover>
                                            </a>
                                        </li>
									<?php
									endforeach;
								endif;
								?>
                            </ul>
                        </div>

                    </div>

                </div>
                <div class="uk-width-1-4 tm-background-blue uk-light uk-modal-body">
					<?php the_content(); ?>
                </div>
            </div>
        </div>
        <div class="uk-card-footer tm-background-blue">
            <p uk-margin>
                <button uk-toggle="target: #modal-designer-<?php the_ID(); ?>"
                        class="uk-button tm-background-red uk-button-danger uk-button-default">
                    Связаться с дизайнером
                </button>
                <button uk-toggle="target: #modal-callback-<?php the_ID(); ?>"
                        class="uk-button tm-background-red uk-button-danger uk-button-default">
                    Заказать обратный звонок
                </button>
                <button uk-toggle="target: #modal-price-<?php the_ID(); ?>"
                        class="uk-button tm-background-red uk-button-danger uk-button-default">
                    Рассчитать стоимость
                </button>
            </p>
        </div>
    </div>
	<?php
	get_template_part( 'template-parts/modal/product', 'feed' );
	?>
</article><!-- #post-## -->

