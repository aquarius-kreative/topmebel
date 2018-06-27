<?php
/**
 * @package topmebel.
 */
?>
<footer class="tm-footer uk-padding uk-padding-remove-horizontal">
    <div class="uk-container">
        <div class="uk-flex uk-flex-wrap uk-flex-middle uk-child-width-1-3">
            <div>
                <div class="uk-card uk-card-small uk-card-body">
                    <a href="<?php echo site_url(); ?>" class="uk-navbar-item tm-logo"
                       title="<?php echo bloginfo( 'name' ); ?>">
						<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
						if ( has_custom_logo() ) {
							echo '<img src="' . esc_url( $logo[0] ) . '">';
						} else {
							echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
						}
						?>
                    </a>
                </div>
            </div>
            <div>
                <div class="uk-card uk-text-center uk-light uk-card-small uk-card-body">
					<?php if ( ! empty( get_option( 'address' ) ) ): ?>
                        <p>
                            <span class="tm-icon tmi-location-pin"></span>
							<?php echo get_option( 'address' ); ?>
                        </p>
					<?php endif; ?>
					<?php if ( ! empty( get_option( 'phone1' ) ) ): ?>
                        <p class="uk-margin-remove">
                            <a href="tel:<?php echo get_option( 'phone1' ); ?>" style="color: white;">
								<?php echo get_option( 'phone1' ); ?>
                            </a>
                        </p>
					<?php endif; ?>
					<?php if ( ! empty( get_option( 'phone2' ) ) ): ?>
                        <p class="uk-margin-remove">
                            <a href="tel:<?php echo get_option( 'phone2' ); ?>" style="color: white;">
								<?php echo get_option( 'phone2' ); ?>
                            </a>
                        </p>
					<?php endif; ?>
					<?php if ( ! empty( get_option( 'phone3' ) ) ): ?>
                        <p class="uk-margin-remove">
                            <a href="tel:<?php echo get_option( 'phone3' ); ?>" style="color: white;">
								<?php echo get_option( 'phone3' ); ?>
                            </a>
                        </p>
					<?php endif; ?>
                </div>
            </div>
            <div>
                <div class="uk-flex uk-flex-center uk-grid-small">
                    <div>
                        <a href="">
                            <object data="<?php echo get_template_directory_uri() . '/src/img/vk.svg' ?>"
                                    type="image/svg+xml" height="55">

                            </object>
                        </a>
                    </div>
                    <div>
                        <object data="<?php echo get_template_directory_uri() . '/src/img/ok.svg' ?>"
                                type="image/svg+xml" height="55">

                        </object>
                    </div>
                    <div>
                        <object data="<?php echo get_template_directory_uri() . '/src/img/insta.svg' ?>"
                                type="image/svg+xml" height="55">

                        </object>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>