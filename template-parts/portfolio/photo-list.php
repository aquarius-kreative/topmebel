<?php
/**
 * @package topmebel.
 */
?>
<div>
    <div class="portfolio-item">
        <div class="uk-cover-container">
            <canvas height="270"></canvas>
            <img src="<?php echo get_the_post_thumbnail_url( $post, 'full' ); ?>" alt="<?php the_title(); ?>"
                 uk-cover>
            <h3 class="uk-h3 uk-position-center uk-padding-small uk-margin-remove uk-light tm-background-blue"><?php the_title(); ?></h3>
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="overlay-link">
                <div class="uk-overlay-default uk-position-cover">
                    <div class="uk-position-center">
                        <span uk-overlay-icon></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>