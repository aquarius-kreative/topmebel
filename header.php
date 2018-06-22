<?php
/**
 * @package topmebel.
 */
?>
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
        <meta name="theme-color" content="#b23b2f">
    </head>
<body <?php echo body_class(); ?>>
<?php if ( is_front_page() ): ?>
    <header class="tm-header">
        <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="max-height: 790; animation: fade">
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
            <div class="uk-position-top">
                <nav class="uk-navbar-container uk-navbar-transparent uk-container" uk-navbar>

                    <div class="uk-navbar-left">
                        <a href="<?php echo site_url(); ?>" class="uk-navbar-item tm-logo"
                           title="<?php echo bloginfo( 'name' ); ?>">
							<?php
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
							if ( has_custom_logo() ) {
								echo '<img src="' . esc_url( $logo[0] ) . '">';
							} else {
								echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
							}
							?>
                        </a>
                    </div>

                    <div class="uk-navbar-right uk-position-relative">
                        <ul class="uk-navbar-nav tm-header-menu">
                            <li class="uk-active"><a href="#">Главная</a></li>
                            <li>
                                <a href="#">Каталог</a>
                                <div class="uk-navbar-dropdown uk-navbar-dropdown-width-3">
                                    <div class="uk-navbar-dropdown-grid uk-child-width-1-3" uk-grid>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="uk-nav-header">Кухни</li>
                                                <li class="uk-nav-divider"></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="uk-nav-header">Шкафы-купе</li>
                                                <li class="uk-nav-divider"></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="uk-nav-header">Столы и стулья</li>
                                                <li class="uk-nav-divider"></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="uk-nav-header">Кухни</li>
                                                <li class="uk-nav-divider"></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="uk-nav-header">Шкафы-купе</li>
                                                <li class="uk-nav-divider"></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="uk-nav-header">Столы и стулья</li>
                                                <li class="uk-nav-divider"></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                                <li><a href="#">Item</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">Новости</a></li>
                            <li><a href="#">Портфолио</a></li>
                            <li><a href="#">Акции</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </div>

                </nav>
            </div>
            <div class="uk-position-center">
                <div class="uk-text-center tm-heading">
                    <h1 class="">Мебель на заказ</h1>
                    <p>Мы знаем, какой должна быть идеальная мебель.
                        Забудьте о стандартах и шаблонах, только эксклюзивный дизайн, оригинальные решения под запросы и
                        пожелания клиентов.</p>
                </div>
            </div>
        </div>


    </header>
<?php endif; ?>