<?php
/**
 * @package topmebel
 * created by akweb
 */

get_header(); ?>
    <div class="uk-position-relative uk-visible-toggle uk-light"
         uk-slideshow="autoplay: true; autoplay-interval: 3000; pause-on-hover: false; max-height: 790; animation: fade">
        <ul class="uk-slideshow-items">
			<?php
			$slides = esc_attr( get_option( 'slides' ) );
			if ( ! empty( $slides ) ) {
				$ids = explode( ",", $slides );
				foreach ( $ids as $id ) {
					echo '<li><img data-imageid="' . $id . '" src="' . wp_get_attachment_image_url( $id, 'full' ) . '" uk-cover></li>';
				}
			}
			?>
        </ul>
        <div class="tm-header-fog"></div>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
           uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
           uk-slideshow-item="next"></a>

        <div class="uk-position-center">
            <div class="uk-text-center tm-heading">
				<?php // Show the selected frontpage content.
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/page/content', 'front-page' );
					endwhile;
				else :
					get_template_part( 'template-parts/post/content', 'none' );
				endif; ?>
            </div>
        </div>
    </div>
    <div class="tm-frontpage uk-padding uk-padding-remove-horizontal uk-margin-large-bottom">
        <div class="uk-container">
            <div class="uk-card uk-card-small uk-text-center uk-card-body">
				<?php
				if ( function_exists( 'dynamic_sidebar' ) ) {
					dynamic_sidebar( 'front-top-a' );
				}
				?>
            </div>
			<?php
			$catalogs = get_categories( array(
				'parent'     => 0,
				'orderby'    => 'ID',
				'order'      => 'ASC',
				'taxonomy'   => 'catalogs',
				'pad_counts' => true,
			) );
			foreach ( $catalogs as $catalog ):
				?>
                <h3 class="uk-heading-divider"><a href="<?php echo get_category_link( $catalog->term_id ); ?>"
                                                  title="<?php echo $catalog->name; ?> на заказ в Темрюке"><?php echo $catalog->name; ?></a>
                </h3>
                <div class="uk-text-center">
					<?php
					$childs = get_categories( array( 'parent' => $catalog->cat_ID, 'taxonomy' => 'catalogs' ) );
					if ( isset( $childs ) ) {
						echo '<div class="uk-margin uk-flex uk-flex-center uk-flex-wrap uk-grid-small">';
						foreach ( $childs as $child ) {
							echo '<div class="uk-margin-small-bottom"><a class="uk-button uk-button-default" href="' . get_category_link( $child->term_id ) . '" 
							         title="' . $child->name . ' на заказ в Темрюке">' . $child->name . '</a></div>';
						}
						echo '</div>';
					}
					?>
                </div>
                <div class="uk-flex uk-flex-wrap uk-child-width-1-3 uk-grid-small uk-grid-match" uk-grid>
					<?php
					$products = new WP_Query(
						array(
							'posts_per_page' => 6,
							'post_type'      => 'products',
							'order'          => 'ASC',
							'meta_key'       => 'wpcf-top',
							'meta_value_num' => '1',
							'tax_query'      => array(
								array(
									'taxonomy'         => 'catalogs',
									'field'            => 'term_id',
									'terms'            => $catalog->term_id,
									'include_children' => true
								)
							)
						)
					);
					while ( $products->have_posts() ) : $products->the_post();

						get_template_part( 'template-parts/catalog/product', 'view' );

					endwhile; // End of the loop.
					wp_reset_postdata();
					?>
                </div>
                <div class="uk-text-center uk-margin">
                    <a href="<?php echo get_category_link( $catalog->term_id ); ?>"
                       title="<?php echo $catalog->name; ?> на заказ в Темрюке"
                       class="uk-button uk-button-primary"><?php echo $catalog->name; ?> показать все</a>
                </div>
			<?php
			endforeach;
			?>
        </div>
    </div>


<?php get_footer(); ?>