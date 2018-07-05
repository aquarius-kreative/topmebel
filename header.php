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
<header class="tm-header uk-position-relative">
	<?php if ( is_front_page() ):
		get_template_part( 'template-parts/header/content', 'front-page' );
	else:
		get_template_part( 'template-parts/header/content', 'all-page' );
	endif;
	?>
</header>
