<?php
/**
 * @package topmebel.
 */

function topmebel_navigations() {
	register_nav_menus( array(
			'header_menu' => 'Меню в шапке',
			'mobile_menu' => 'Мобильное меню'
		)
	);
}

add_action( 'after_setup_theme', 'topmebel_navigations' );