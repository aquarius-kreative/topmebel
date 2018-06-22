<?php
/**
 * @package topmebel.
 */


function topmebel_theme_support() {
	add_theme_support(
		'post-formats',
		array(
			'gallery'
		)
	);

	add_theme_support( 'title-tag' );
	add_theme_support( 'widgets' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-header',
		array(
			'default-image' => '',
			'width'         => 1920,
			'height'        => 500,
		)
	);

	add_theme_support( 'custom-logo', array(
		'height'      => 75,
		'width'       => 415,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}

add_action( 'after_setup_theme', 'topmebel_theme_support' );