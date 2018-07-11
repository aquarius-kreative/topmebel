<?php
/**
 * @package topmebel.
 */

function topmebel_load_scripts() {
	wp_deregister_script( 'jquery' );
	wp_enqueue_style( 'style-topmebel', get_template_directory_uri() . '/assets/css/theme.css', array(), '_bld_1531300009022', null );
	wp_enqueue_style( 'tm-icon', get_template_directory_uri() . '/src/fonts/tm-icon/style.css', array(), null, null );
	wp_enqueue_script( 'vendor-topmebel', get_template_directory_uri() . '/assets/js/vendor.topmebel.js', array(), '_bld_1531300009022', true );
	wp_enqueue_script( 'app-topmebel', get_template_directory_uri() . '/assets/js/app.topmebel.js', array(), '_bld_1531300009022', true );
}

add_action( 'wp_enqueue_scripts', 'topmebel_load_scripts' );

function topmebel_admin_load_scripts() {
	wp_register_script('tm-admin', get_template_directory_uri() . '/admin/js/tm-admin.js', array('jquery'), null, true);
	wp_enqueue_script('tm-admin');
}

add_action('admin_enqueue_scripts', 'topmebel_admin_load_scripts');