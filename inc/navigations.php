<?php
/**
 * @package topmebel.
 */

add_action( 'after_setup_theme', 'topmebel_navigations' );
function topmebel_navigations() {
	register_nav_menus( array(
			'header-menu' => 'Меню в шапке',
			'mobile-menu' => 'Мобильное меню',
			'footer-menu' => 'Меню в подвале'
		)
	);
}

add_filter( 'wp_nav_menu_args', 'filter_header_menu_args' );
function filter_header_menu_args( $args ) {
	if ( $args['theme_location'] === 'header-menu' ) {
		$args['container']  = false;
		$args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
		$args['menu_class'] = 'uk-navbar-nav tm-header-menu';
		if (!is_front_page())
			$args['menu_class'] = 'uk-navbar-nav tm-primary-menu';
	}

	return $args;
}

// Изменяем атрибут id у тега li
add_filter( 'nav_menu_item_id', 'filter_header_menu_item_css_id', 10, 4 );
function filter_header_menu_item_css_id( $menu_id, $item, $args, $depth ) {
	return $args->theme_location === 'header-menu' ? '' : $menu_id;
}

// Изменяем атрибут class у тега li
add_filter( 'nav_menu_css_class', 'filter_header_menu_css_classes', 10, 4 );
function filter_header_menu_css_classes( $classes, $item, $args, $depth ) {
	if ( $args->theme_location === 'header-menu' ) {
		$classes = [
//			'menu-node',
//			'menu-node--main_lvl_' . ( $depth + 1 )
		];
		if ( $item->current ) {
			$classes[] = 'uk-active';
		}
	}

	return $classes;
}

// Изменяет класс у вложенного ul
add_filter( 'nav_menu_submenu_css_class', 'filter_nav_menu_submenu_css_class', 10, 3 );
function filter_nav_menu_submenu_css_class( $classes, $args, $depth ) {
	if ( $args->theme_location === 'header-menu' ) {
		$classes = [
			'uk-nav',
			'uk-navbar-dropdown-nav',
		];
	}

	return $classes;
}

class Header_Menu_Walker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent        = str_repeat( $t, $depth );
		$display_depth = ( $depth + 1 );

		// Default class.
		$classes = array( 'sub-menu' );

		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		if ( $display_depth > 1 ) {
			$output .= "{$n}{$indent}<ul class='uk-nav-sub'>{$n}";
		} else {
			$output .= "{$n}{$indent}<div class=\"uk-navbar-dropdown\" uk-dropdown=\"offset: 0; animation: uk-animation-slide-top-small;\"><ul$class_names>{$n}";
		}
	}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent        = str_repeat( $t, $depth );
		$display_depth = ( $depth + 1 );

		if ( $display_depth > 1 ) {
			$output .= "$indent</ul>{$n}";
		} else {
			$output .= "$indent</ul></div>{$n}";
		}
	}

}