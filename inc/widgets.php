<?php
/**
 * @package topmebel.
 */

class TM_Social_Link extends WP_Widget {

	/*
	 * создание виджета
	 */
	function __construct() {
		parent::__construct(
			'tm_social_link_widget',
			'Соцсети',
			array( 'description' => 'Позволяет вывести ссылки на социальные сети' )
		);
	}

	/*
	 * фронтэнд виджета
	 */
	public function widget( $args, $instance ) {
		$title      = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)
		$vk_link    = $instance['vk_link'];
		$ok_link    = $instance['ok_link'];
		$insta_link = $instance['insta_link'];

		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
        <div class="uk-card uk-card-small uk-card-body">
            <div class="uk-flex uk-flex-center uk-grid-small">
				<?php if ( ! empty( $vk_link ) ): ?>
                    <div>
                        <a href="<?php echo $vk_link; ?>" title="Вконтакте">
                            <img class="tm-social-icon"
                                 src="<?php echo get_template_directory_uri() . '/src/img/vk.svg' ?>">
                        </a>
                    </div>
				<?php endif; ?>
				<?php if ( ! empty( $ok_link ) ): ?>
                    <div>
                        <a href="<?php echo $ok_link; ?>" title="Одноклассники">
                            <img class="tm-social-icon"
                                 src="<?php echo get_template_directory_uri() . '/src/img/ok.svg' ?>">
                        </a>
                    </div>
				<?php endif; ?>
				<?php if ( ! empty( $insta_link ) ): ?>
                    <div>
                        <a href="<?php echo $insta_link; ?>" title="Instagram">
                            <img class="tm-social-icon"
                                 src="<?php echo get_template_directory_uri() . '/src/img/insta.svg' ?>">
                        </a>
                    </div>
				<?php endif; ?>
            </div>
        </div>
		<?php
		echo $args['after_widget'];
	}

	/*
	 * бэкэнд виджета
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		if ( isset( $instance['vk_link'] ) ) {
			$vk_link = $instance['vk_link'];
		}
		if ( isset( $instance['ok_link'] ) ) {
			$ok_link = $instance['ok_link'];
		}
		if ( isset( $instance['insta_link'] ) ) {
			$insta_link = $instance['insta_link'];
		}
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'vk_link' ); ?>">Вконтакте:</label>
            <input id="<?php echo $this->get_field_id( 'vk_link' ); ?>"
                   name="<?php echo $this->get_field_name( 'vk_link' ); ?>" type="text"
                   value="<?php echo ( $vk_link ) ? esc_attr( $vk_link ) : ''; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'ok_link' ); ?>">Одноклассники:</label>
            <input id="<?php echo $this->get_field_id( 'ok_link' ); ?>"
                   name="<?php echo $this->get_field_name( 'ok_link' ); ?>" type="text"
                   value="<?php echo ( $ok_link ) ? esc_attr( $ok_link ) : ''; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'insta_link' ); ?>">Instagram:</label>
            <input id="<?php echo $this->get_field_id( 'insta_link' ); ?>"
                   name="<?php echo $this->get_field_name( 'insta_link' ); ?>" type="text"
                   value="<?php echo ( $insta_link ) ? esc_attr( $insta_link ) : ''; ?>"/>
        </p>
		<?php
	}

	/*
	 * сохранение настроек виджета
	 */
	public function update( $new_instance, $old_instance ) {
		$instance               = array();
		$instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['vk_link']    = ( ! empty( $new_instance['vk_link'] ) ) ? $new_instance['vk_link'] : '';
		$instance['ok_link']    = ( ! empty( $new_instance['ok_link'] ) ) ? $new_instance['ok_link'] : '';
		$instance['insta_link'] = ( ! empty( $new_instance['insta_link'] ) ) ? $new_instance['insta_link'] : '';

		return $instance;
	}
}

/*
 * регистрация виджета
 */
function tm_social_link_widget_load() {
	register_widget( 'TM_Social_Link' );
}

add_action( 'widgets_init', 'tm_social_link_widget_load' );