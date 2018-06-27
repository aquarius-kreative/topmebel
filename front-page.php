<?php
/**
 * @package topmebel
 * created by akweb
 */

get_header(); ?>
    <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="autoplay: true; max-height: 790; animation: fade">
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
            <div class="uk-flex uk-flex-wrap uk-child-width-1-3 uk-grid-small uk-grid-match" uk-grid>
                <div>
                    <div class="uk-card uk-card-small uk-card-body">
                        <h2 class="tm-title-border">Каталог продукции</h2>
                        <p>Предлагаем шкафы-купе, кухни и спальни, офисную мебель, детские, гордеробные. Любая мебель на
                            заказ в разных дизайнерских вариациях.</p>
                    </div>
                </div>
                <div>
                    <a href="#" class="tm-product uk-card-hover uk-position-relative">
                        <div class="uk-cover-container">
                            <canvas height="300"></canvas>
                            <img src="<?php echo get_template_directory_uri() . '/img/slide.jpg'; ?>" alt="" uk-cover>
                        </div>
                        <div class="tm-product-head">
                            <h3>Кухни</h3>
                            <p class="uk-margin-remove">от 13000 руб/м.п</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="tm-product uk-card-hover uk-position-relative">
                        <div class="uk-cover-container">
                            <canvas height="300"></canvas>
                            <img src="<?php echo get_template_directory_uri() . '/img/slide1.jpg'; ?>" alt="" uk-cover>
                        </div>
                        <div class="tm-product-head">
                            <h3>Шкафы-купе</h3>
                            <p class="uk-margin-remove">от 12000 руб/м.п</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="tm-product uk-card-hover uk-position-relative">
                        <div class="uk-cover-container">
                            <canvas height="300"></canvas>
                            <img src="<?php echo get_template_directory_uri() . '/img/slide.jpg'; ?>" alt="" uk-cover>
                        </div>
                        <div class="tm-product-head">
                            <h3>Кухни</h3>
                            <p class="uk-margin-remove">от 13000 руб/м.п</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="tm-product uk-card-hover uk-position-relative">
                        <div class="uk-cover-container">
                            <canvas height="300"></canvas>
                            <img src="<?php echo get_template_directory_uri() . '/img/slide.jpg'; ?>" alt="" uk-cover>
                        </div>
                        <div class="tm-product-head">
                            <h3>Кухни</h3>
                            <p class="uk-margin-remove">от 13000 руб/м.п</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="tm-product uk-card-hover uk-position-relative">
                        <div class="uk-cover-container">
                            <canvas height="300"></canvas>
                            <img src="<?php echo get_template_directory_uri() . '/img/slide.jpg'; ?>" alt="" uk-cover>
                        </div>
                        <div class="tm-product-head">
                            <h3>Кухни</h3>
                            <p class="uk-margin-remove">от 13000 руб/м.п</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>