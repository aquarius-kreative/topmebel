<?php
/**
 * @package topmebel
 * created by akweb
 */
?>

<div>
    <div class="tm-product uk-card-hover uk-position-relative">
        <div class="uk-cover-container">
            <canvas width="400" height="300"></canvas>
			<?php if ( has_post_thumbnail( $post ) ): ?>
                <img src="<?php echo get_the_post_thumbnail_url( $post, 'large' ); ?>" alt="<?php the_title(); ?>"
                     uk-cover>
			<?php else: ?>
                <img src="<?php echo get_template_directory_uri() . '/src/img/image.png'; ?>"
                     alt="<?php the_title(); ?>" uk-cover>
			<?php endif; ?>
        </div>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="">
            <div class="tm-product-head">
                <h3 class="uk-h6"><?php the_title(); ?></h3>
                <p class="uk-margin-remove"><?php echo types_render_field( "price", array() ); ?></p>
            </div>
        </a>
        <a href="#product-<?php the_ID(); ?>" uk-toggle class="tm-product-more uk-position-center">Подробнее</a>
    </div>
    <div id="product-<?php the_ID(); ?>" class="uk-flex-top uk-modal-container" uk-modal>
        <div class="uk-modal-dialog uk-margin-auto-vertical">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header uk-light uk-modal-body tm-background-red">
                <h3 class="uk-margin-remove">
					<?php echo get_the_term_list( $post->ID, 'catalogs', '', ', ' ); ?>
                </h3>
                <h4 class="uk-margin-remove"><?php the_title();
					echo ' ' . types_render_field( "price", array() ); ?></h4>
            </div>
            <div class="uk-flex uk-flex-wrap uk-grid-small" uk-grid>
                <div class="uk-width-3-4 uk-modal-body">
                    <div class="uk-margin-auto" uk-slideshow="ratio: 4:3; animation: fade" style="max-width: 600px;">

                        <div class="uk-position-relative uk-visible-toggle uk-light">
                            <ul class="uk-slideshow-items">
                                <li class="uk-text-center">
                                    <img src="<?php echo get_the_post_thumbnail_url( $post, 'full' ); ?>"
                                         class="tm-product-thumb">
                                </li>
								<?php
								if ( ! empty( types_render_field( 'images', array() ) ) ):
									$images = explode( " ", types_render_field( "images", array(
										'size' => 'full',
										'url'  => true
									) ) );
									foreach ( $images as $image ):
										?>
                                        <li class="uk-text-center">
                                            <img src="<?php echo $image; ?>" class="tm-product-thumb">
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
                <div class="uk-width-1-4 uk-modal-body uk-overflow-auto" style="height: 600px">
					<?php the_content(); ?>
                </div>
            </div>
            <div class="uk-modal-footer uk-margin-top tm-product-modal-footer tm-background-blue">
                <p class="uk-margin uk-text-center">
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
    </div>
	<?php
	get_template_part( 'template-parts/modal/product', 'feed' );
	?>
</div>



