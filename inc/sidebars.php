<?php
/**
 * @package topmebel.
 */

function topmebel_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Главная: Перед контентом', 'topmebel' ),
		'id'            => 'front-top-a',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="page-title uk-text-center">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Подвал', 'topmebel' ),
		'id'            => 'footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="uk-text-center">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Каталог: Боковое меню', 'topmebel' ),
		'id'            => 'catalog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="uk-text-center">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'topmebel_widgets_init' );