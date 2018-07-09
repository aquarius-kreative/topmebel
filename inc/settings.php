<?php
/**
 * @package topmebel.
 */
function add_theme_menu_item() {
	add_menu_page( "Настройки темы", "Топ Мебель", "manage_options", "topmebel", "topmebel_settings_page", null, 99 );
}

add_action( "admin_menu", "add_theme_menu_item" );

add_action( "admin_init", "display_theme_panel_fields" );
function display_theme_panel_fields() {
	register_setting( "tm-settings-group", "address" );
	register_setting( "tm-settings-group", "phone1" );
	register_setting( "tm-settings-group", "phone2" );
	register_setting( "tm-settings-group", "emails" );
	register_setting( "tm-settings-group", "slides" );

	add_settings_section( 'contacts', 'Контакты', 'tm_contacts_options', 'topmebel-options' );
	add_settings_section( 'slider', 'Слайдер', 'tm_slider_options', 'topmebel-options' );

	add_settings_field( "address", "Адрес", "display_address", "topmebel-options", "contacts" );
	add_settings_field( "phone1", "Телефон #1", "display_phone1", "topmebel-options", "contacts" );
	add_settings_field( "phone2", "Телефон #2", "display_phone2", "topmebel-options", "contacts" );
	add_settings_field( "emails", "Почта для получения писем через запятую.", "display_emails", "topmebel-options", "contacts" );
	add_settings_field( 'slides', 'Изображения', 'display_slider', 'topmebel-options', 'slider' );
}

function tm_contacts_options() {
	echo 'Контактная информация';
}

function tm_slider_options() {
	echo 'Слайдер на главной';
}

function display_slider() {
	$slides = esc_attr( get_option( 'slides' ) );
	echo '<input type="button" class="button button-secondary" id="select-slides" value="Выбрать изображения"/>
          <input type="hidden" name="slides" id="slides" value="' . $slides . '"/><br>';
	if (!empty($slides)) {
		$ids = explode(",", $slides);
		foreach ($ids as $id) {
		  echo wp_get_attachment_image($id, 'thumbnail');
        }
    }
}

function display_address() {
	echo '<input type="text" name="address" id="address" value="' . get_option( 'address' ) . '"/>';
}

function display_phone1() {
	echo '<input type="text" name="phone1" id="phone1" value="' . get_option( 'phone1' ) . '"/>';
}

function display_phone2() {
	echo '<input type="text" name="phone2" id="phone2" value="' . get_option( 'phone2' ) . '"/>';
}

function display_emails() {
	echo '<input type="text" name="emails" id="emails" value="' . get_option( 'emails' ) . '"/>';
}

function topmebel_settings_page() {
	?>
    <div class="wrap">
        <h1>Настройки темы "Топ Мебель"</h1>
        <form method="post" action="options.php">
			<?php
			settings_fields( "tm-settings-group" );
			do_settings_sections( "topmebel-options" );
			submit_button();
			?>
        </form>
    </div>
	<?php
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
}


