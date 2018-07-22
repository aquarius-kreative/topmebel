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
		$to = get_option( 'emails' );
		if ( empty( $to ) ) {
			$to = 'haritonov.aka@gmail.com';
		}
		$data    = array_map( 'esc_attr', $data );
		$message = "<h3>Клиент хочет с вами связаться.</h3>
		<ul>
		<li>Имя: ${data['client_name']}</li>
		<li>Телефон: ${data['client_phone']}</li>
		<li>Email: ${data['client_email']}</li>
		</ul>
		<h4>Сообщение:</h4>
		<p>${data['client_message']}</p>
		<hr>
		<p>Топ Мебель - Мебель на заказ в г.Темрюке</p>
		<p><a href='https://topmebel-zakaz.ru'>https://topmebel-zakaz.ru</a></p>";

		wp_mail( $to, 'Обратная связь Топ Мебель', $message );

		// не забываем завершать PHP
		wp_die();
	}

	add_action( 'wp_ajax_tm_designer', 'tm_designer_callback' );
	add_action( 'wp_ajax_nopriv_tm_designer', 'tm_designer_callback' );
	function tm_designer_callback() {
		// проверяем nonce код, если проверка не пройдена прерываем обработку
		check_ajax_referer( 'myajax-nonce', 'nonce_code' );
		parse_str( $_POST['data'], $data );
		$to = get_option( 'emails' );
		if ( empty( $to ) ) {
			$to = 'haritonov.aka@gmail.com';
		}
		$data    = array_map( 'esc_attr', $data );
		$message = "<h3>Клиент хочет связаться с дизайнером.</h3>
		<p>Клиент смотрел: <a href='${data['product_link']}'>${data['product_name']}</a></p>
		<ul>
		<li>Имя: ${data['client_name']}</li>
		<li>Телефон: ${data['client_phone']}</li>
		<li>Email: ${data['client_email']}</li>
		</ul>
		<h4>Сообщение:</h4>
		<p>${data['client_message']}</p>
		<hr>
		<p>Топ Мебель - Мебель на заказ в г.Темрюке</p>
		<p><a href='https://topmebel-zakaz.ru'>https://topmebel-zakaz.ru</a></p>";

		wp_mail( $to, 'Запрос дизайнера - Топ Мебель', $message );

		// не забываем завершать PHP
		wp_die();
	}

	add_action( 'wp_ajax_tm_call', 'tm_call_callback' );
	add_action( 'wp_ajax_nopriv_tm_call', 'tm_call_callback' );
	function tm_call_callback() {
		// проверяем nonce код, если проверка не пройдена прерываем обработку
		check_ajax_referer( 'myajax-nonce', 'nonce_code' );
		parse_str( $_POST['data'], $data );
		$to = get_option( 'emails' );
		if ( empty( $to ) ) {
			$to = 'haritonov.aka@gmail.com';
		}
		$data    = array_map( 'esc_attr', $data );
		$message = "<h3>Клиент хочет чтобы вы ему перезвонили.</h3>
		<p>Клиент смотрел: <a href='${data['product_link']}'>${data['product_name']}</a></p>
		<ul>
		<li>Имя: ${data['client_name']}</li>
		<li>Телефон: ${data['client_phone']}</li>
		</ul>
		<hr>
		<p>Топ Мебель - Мебель на заказ в г.Темрюке</p>
		<p><a href='https://topmebel-zakaz.ru'>https://topmebel-zakaz.ru</a></p>";

		wp_mail( $to, 'Запрос на обратный звонок - Топ Мебель', $message );

		// не забываем завершать PHP
		wp_die();
	}

	add_action( 'wp_ajax_tm_price', 'tm_price_callback' );
	add_action( 'wp_ajax_nopriv_tm_price', 'tm_price_callback' );
	function tm_price_callback() {
		// проверяем nonce код, если проверка не пройдена прерываем обработку
		check_ajax_referer( 'myajax-nonce', 'nonce_code' );
		parse_str( $_POST['data'], $data );
		$to = get_option( 'emails' );
		if ( empty( $to ) ) {
			$to = 'haritonov.aka@gmail.com';
		}
		$data    = array_map( 'esc_attr', $data );
		$message = "<h3>Клиент желает заказать просчет.</h3>
		<p>Клиент смотрел: <a href='${data['product_link']}'>${data['product_name']}</a></p>
		<ul>
		<li>Имя: ${data['client_name']}</li>
		<li>Телефон: ${data['client_phone']}</li>
		<li>Email: ${data['client_email']}</li>
		</ul>
		<h4>Сообщение:</h4>
		<p>${data['client_message']}</p>
		<hr>
		<p>Топ Мебель - Мебель на заказ в г.Темрюке</p>
		<p><a href='https://topmebel-zakaz.ru'>https://topmebel-zakaz.ru</a></p>";

		wp_mail( $to, 'Запрос рассчета стоимости - Топ Мебель', $message );

		// не забываем завершать PHP
		wp_die();
	}
}
