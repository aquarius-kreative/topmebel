<?php
/**
 * @package topmebel.
 */
?>

<div>
    <div class="tm-product uk-card-hover uk-position-relative">
        <div class="uk-cover-container">
            <canvas height="270"></canvas>
            <img src="<?php echo get_the_post_thumbnail_url( $post, 'full' ); ?>" alt="<?php the_title(); ?>"
                 uk-cover>
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
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header uk-padding-remove">
                <h3 class="uk-margin-remove"><?php echo get_the_term_list( $post->ID, 'catalogs', '', ', ' ); ?></h3>
                <h4 class="uk-margin-remove"><?php the_title();
					echo ' ' . types_render_field( "price", array() ); ?></h4>
            </div>
            <div class="uk-flex uk-modal-body uk-flex-wrap uk-grid-small uk-grid-divider" uk-grid>
                <div class="uk-width-3-4">
                    <div class="uk-margin-auto" uk-slideshow="min-height: 400; max-height: 600; animation: fade"
                         style="max-width: 600px;">

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
                <div class="uk-width-1-4">
					<?php the_content(); ?>
                </div>
            </div>
            <div class="uk-modal-footer">
                <p uk-margin>
                    <button class="uk-button uk-button-default">Связаться с дизайнером</button>
                    <button class="uk-button uk-button-default">Заказать обратный звонок</button>
                    <button class="uk-button uk-button-default">Рассчитать стоимость</button>
                </p>
            </div>
        </div>
    </div>
</div>


