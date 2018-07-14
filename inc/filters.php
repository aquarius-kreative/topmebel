<?php
/**
 * @package topmebel.
 */

add_filter( 'get_the_archive_title', function ( $title ) {

	if ( is_category() ) {

		$title = single_cat_title( '', false );

	} elseif ( is_tag() ) {

		$title = single_tag_title( '', false );

	} elseif ( is_author() ) {

		$title = '<span class="vcard">' . get_the_author() . '</span>';

	} elseif ( is_archive() ) {

		$title = single_term_title( '', false );

	} elseif ( is_tax() ) {

		$title = single_term_title( '', false );

	} elseif ( is_post_type_archive() ) {
		if ( is_post_type_archive( 'products' ) ) {
			$title = 'Каталог';
		} else {
			$title = post_type_archive_title( '', false );
		}
	}

	return $title;

} );

//кнопка добавить изображение
add_filter( 'toolset_button_add_repetition_text', 'toolset_button_add_repetition_text', 10, 2 );
function toolset_button_add_repetition_text( $text, $config ) {
	return '+ Добавить';
}

//имя почты
add_filter( 'wp_mail_from_name', 'tm_wp_mail_from_name' );
function tm_wp_mail_from_name( $email_from ) {
	return 'Топ Мебель';
}

add_filter( 'wp_mail_from', 'tm_wp_mail_from' );
function tm_wp_mail_from( $email_address ) {
	return 'info@topmebel-zakaz.ru';
}

add_filter( 'wp_mail_content_type', function ( $content_type ) {
	return "text/html";
} );

add_filter( 'navigation_markup_template', 'tm_navigation_template', 10, 2 );
function tm_navigation_template( $template, $class ) {
	return '<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>      
	';
}

add_filter( 'excerpt_length', 'new_excerpt_length' );
function new_excerpt_length( $length ) {
	return 10;
}

add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ) {
	global $post;
	return ' <a href="' . get_permalink( $post->ID ) . '">...</a>';
}