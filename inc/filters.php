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

		$title = single_tag_title( '', false );

	}

	return $title;

} );

//кнопка добавить изображение
add_filter('toolset_button_add_repetition_text', 'toolset_button_add_repetition_text', 10, 2);
function toolset_button_add_repetition_text($text, $config)
{
	return '+ Добавить';
}

//имя почты
add_filter( 'wp_mail_from_name', 'tm_wp_mail_from_name' );
function tm_wp_mail_from_name( $email_from ){
	return 'Топ Мебель';
}

add_filter( 'wp_mail_from', 'tm_wp_mail_from' );
function tm_wp_mail_from( $email_address ){
	return 'info@top-meb.ru';
}

add_filter( 'wp_mail_content_type', function($content_type){
	return "text/html";
});