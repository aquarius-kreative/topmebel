<?php
/**
 * @package topmebel.
 */

function topmebel_settings_page() {
	?>
    <div class="wrap">
        <h1>Настройки темы "Топ Мебель"</h1>
        <form method="post" action="options.php">
			<?php
			settings_fields( "contacts" );
			do_settings_sections( "topmebel-options" );
			submit_button();
			?>
        </form>
    </div>
	<?php
}

function display_address() {
	?>
    <input type="text" name="address" id="address" value="<?php echo get_option('address'); ?>" />
	<?php
}

function display_phone1() {
	?>
    <input type="text" name="phone1" id="phone1" value="<?php echo get_option('phone1'); ?>" />
	<?php
}

function display_phone2() {
	?>
    <input type="text" name="phone2" id="phone2" value="<?php echo get_option('phone2'); ?>" />
	<?php
}

function display_emails() {
	?>
    <input type="text" name="emails" id="emails" value="<?php echo get_option('emails'); ?>" />
	<?php
}

function display_theme_panel_fields() {
	add_settings_section( 'contacts', 'Контакты', '', 'topmebel-options' );

	add_settings_field( "address", "Адрес", "display_address", "topmebel-options", "contacts" );
	add_settings_field( "phone1", "Телефон #1", "display_phone1", "topmebel-options", "contacts" );
	add_settings_field( "phone2", "Телефон #2", "display_phone2", "topmebel-options", "contacts" );
	add_settings_field( "emails", "Почта для получения писем через запятую.", "display_emails", "topmebel-options", "contacts" );

	register_setting( "contacts", "address" );
	register_setting( "contacts", "phone1" );
	register_setting( "contacts", "phone2" );
	register_setting( "contacts", "emails" );
}

add_action( "admin_init", "display_theme_panel_fields" );

function add_theme_menu_item() {
	add_menu_page( "Настройки темы", "Топ Мебель", "manage_options", "topmebel", "topmebel_settings_page", null, 99 );
}

add_action( "admin_menu", "add_theme_menu_item" );

