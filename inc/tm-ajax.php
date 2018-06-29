<?php
/**
 * @package topmebel.
 */

add_action( 'wp_enqueue_scripts', 'tmajax_data', 99 );
function tmajax_data() {

	// Первый параметр 'twentyfifteen-script' означает, что код будет прикреплен к скрипту с ID 'twentyfifteen-script'
	// 'twentyfifteen-script' должен быть добавлен в очередь на вывод, иначе WP не поймет куда вставлять код локализации
	// Заметка: обычно этот код нужно добавлять в functions.php в том месте где подключаются скрипты, после указанного скрипта
	wp_localize_script( 'app-topmebel', 'tmajax',
		array(
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'myajax-nonce' )
		)
	);

}

if ( wp_doing_ajax() ) {
	add_action( 'wp_ajax_tm_feedback', 'tm_feedback_callback' );
	add_action( 'wp_ajax_nopriv_tm_feedback', 'tm_feedback_callback' );
	function tm_feedback_callback() {
		// проверяем nonce код, если проверка не пройдена прерываем обработку
		check_ajax_referer( 'myajax-nonce', 'nonce_code' );
		parse_str($_POST['data'], $data);
		// обрабатываем данные и возвращаем
		echo json_encode($data);

		// не забываем завершать PHP
		wp_die();
	}
}
