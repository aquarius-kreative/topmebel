<?php
/**
 * @package topmebel.
 */
?>
<footer class="tm-footer uk-light uk-padding uk-padding-remove-horizontal">
    <div class="uk-container">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
            <div class="uk-flex uk-flex-wrap uk-child-width-1-3">
				<?php dynamic_sidebar( 'footer' ); ?>
            </div>
		<?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>