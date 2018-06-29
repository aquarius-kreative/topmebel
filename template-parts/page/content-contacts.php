<?php
/**
 * @package topmebel.
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="uk-flex uk-grid-small uk-flex-wrap">
        <div class="uk-width-3-4">
            <header class="entry-header">
		        <?php the_title( '<h1 class="page-title uk-text-center">', '</h1>' ); ?>
            </header><!-- .entry-header -->
            <div class="entry-content">
				<?php
				the_content();
				?>
            </div><!-- .entry-content -->
        </div>
        <div class="uk-width-1-4">
            <form id="tm-feedback" class="">
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend uk-text-center">Форма обратной связи</legend>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_name">Ваше имя</label>
                        <input class="uk-input" type="text" id="client_name" name="client_name" placeholder="Ваше имя" required>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_email">Ваша электронная почта</label>
                        <input class="uk-input" type="email" id="client_email" name="client_email" placeholder="Ваша электронная почта" required>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_phone">Ваш телефон</label>
                        <input class="uk-input" type="text" id="client_phone" name="client_phone" placeholder="Ваш телефон" required>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_message">Сообщение</label>
                        <textarea class="uk-textarea" rows="5" id="client_message" name="client_message" placeholder="Сообщение"></textarea>
                    </div>

                    <div class="uk-margin">
                        <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Отправить</button>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</article><!-- #post-## -->
