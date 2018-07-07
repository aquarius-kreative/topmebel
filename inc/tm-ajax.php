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
		parse_str( $_POST['data'], $data );
		$to = get_option('emails');
		if (empty($to))
			$to = 'haritonov.aka@gmail.com';
		$data = array_map('esc_attr', $data);
		$message = "<h3>Контакты</h3>
		<ul>
		<li>Имя: ${data['client_name']}</li>
		<li>Телефон: ${data['client_phone']}</li>
		<li>Email: ${data['client_email']}</li>
		</ul>
		<h4>Сообщение:</h4>
		<p>${data['client_message']}</p>
		<hr>
		<p>Топ Мебель - Мебель на заказ в г.Темрюке</p>
		<p><a href='https://top-meb.ru'>https://top-meb.ru</a></p>";

		wp_mail( $to, 'Обратная связь Топ Мебель', $message );

		// не забываем завершать PHP
		wp_die();
	}
}
