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
<header class="tm-header">
	<?php if ( is_front_page() ): ?>
        <div class="uk-position-top uk-position-z-index">
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
					<?php
					wp_nav_menu( [
						'theme_location' => 'header-menu',
						'walker'         => new Header_Menu_Walker(),
					] );
					?>
                    <a href="tel:<?php echo get_option('phone1')?>" uk-icon="icon: receiver; ratio: 1" class="uk-navbar-item tm-front-call"></a>
                </div>

            </nav>
        </div>
	<?php else: ?>
    <div class="tm-header-line">
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

            <div class="uk-navbar-right">
			    <?php
			    wp_nav_menu( [
				    'theme_location' => 'header-menu',
				    'walker'         => new Header_Menu_Walker(),
			    ] );
			    ?>
                <a href="tel:<?php echo get_option('phone1')?>" uk-icon="icon: receiver; ratio: 1" class="uk-navbar-item"></a>
            </div>
        </nav>
    </div>
	<?php endif; ?>
</header>
