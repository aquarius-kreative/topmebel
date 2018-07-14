<?php
/**
 * @package topmebel.
 */

?>
<div class="uk-card uk-card-default uk-grid-collapse uk-margin" uk-grid>
	<?php if ( '' !== get_the_post_thumbnail() ): ?>
        <div class="uk-card-media-left uk-cover-container uk-width-1-3">
            <img src="<?php echo get_the_post_thumbnail_url( $post, 'medium' ); ?>" uk-cover>
            <canvas width="300" height="300"></canvas>
        </div>
	<?php endif; ?>
    <div class="uk-width-expand">
        <div class="uk-card-header uk-light tm-background-red uk-padding-small">
            <h3 class="uk-card-title">
                <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><?php the_title(); ?></a>
            </h3>
        </div>
        <div class="uk-card-body uk-padding-small">
            <p>
				<?php wp_trim_excerpt( the_excerpt() ); ?>
            </p>
        </div>
        <div class="uk-card-footer uk-light tm-background-blue uk-padding-small uk-text-right">
            <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="uk-button uk-button-text">Читать
                далее...</a>
        </div>
    </div>
</div>

