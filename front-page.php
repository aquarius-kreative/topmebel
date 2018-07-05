<?php
/**
 * @package topmebel
 * created by akweb
 */

get_header(); ?>
    <div class="uk-position-relative uk-visible-toggle uk-light"
         uk-slideshow="autoplay: true; max-height: 790; animation: fade">
        <ul class="uk-slideshow-items">
            <li>
                <img src="<?php echo get_template_directory_uri() . '/img/slide.jpg'; ?>" alt="" uk-cover>
            </li>
            <li>
                <img src="<?php echo get_template_directory_uri() . '/img/slide1.jpg'; ?>" alt="" uk-cover>
            </li>
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
            <div class="uk-card uk-card-small uk-text-center uk-margin-bottom uk-card-body">
                <h2 class="page-title uk-text-center">Каталог продукции</h2>
                <p>Предлагаем шкафы-купе, кухни и спальни, офисную мебель, детские, гордеробные. Любая мебель на
                    заказ в разных дизайнерских вариациях.</p>
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
                <h3 class="uk-heading-divider"><?php echo $catalog->name; ?></h3>
                <div class="uk-flex uk-flex-wrap uk-child-width-1-3 uk-grid-small uk-grid-match" uk-grid>
					<?php
					$products = new WP_Query(
						array(
							'posts_per_page' => - 1,
							'post_type'      => 'products',
							'order'          => 'ASC',
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

			<?php
			endforeach;
			?>
        </div>
    </div>


<?php get_footer(); ?>