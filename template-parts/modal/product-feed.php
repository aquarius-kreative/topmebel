<?php
/**
 * @package topmebel
 * created by akweb
 */
?>

<div id="modal-designer-<?php the_ID(); ?>" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header uk-light uk-modal-body tm-background-red">
            <h3 class="uk-margin-remove">Связаться с дизайнером</h3>
        </div>
        <div class="uk-modal-body">
            <form class="uk-form">
                <fieldset class="uk-fieldset">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_name">Ваше имя</label>
                        <input class="uk-input" type="text" id="client_name" name="client_name"
                               placeholder="Ваше имя" required>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_email">Ваша электронная почта</label>
                        <input class="uk-input" type="email" id="client_email" name="client_email"
                               placeholder="Ваша электронная почта" required>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_phone">Ваш телефон</label>
                        <input class="uk-input" type="text" id="client_phone" name="client_phone"
                               placeholder="Ваш телефон" required>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_message">Сообщение</label>
                        <textarea class="uk-textarea" rows="5" id="client_message" name="client_message"
                                  placeholder="Сообщение"></textarea>
                    </div>

                </fieldset>
            </form>
        </div>
        <div class="uk-modal-footer uk-light tm-background-blue uk-text-right">
            <a class="uk-button tm-background-red uk-button-danger uk-button-default"
               href="#product-<?php the_ID(); ?>" uk-toggle>Назад</a>
            <a class="uk-button uk-button-default">Отправить</a>
        </div>
    </div>
</div>
<div id="modal-callback-<?php the_ID(); ?>" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header uk-light uk-modal-body tm-background-red">
            <h3 class="uk-margin-remove">Заказать обратный звонок</h3>
        </div>
        <div class="uk-modal-body">
            <form class="uk-form">
                <fieldset class="uk-fieldset">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_name">Ваше имя</label>
                        <input class="uk-input" type="text" id="client_name" name="client_name"
                               placeholder="Ваше имя" required>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_phone">Ваш телефон</label>
                        <input class="uk-input" type="text" id="client_phone" name="client_phone"
                               placeholder="Ваш телефон" required>
                    </div>

                </fieldset>
            </form>
        </div>
        <div class="uk-modal-footer uk-light tm-background-blue uk-text-right">
            <a class="uk-button tm-background-red uk-button-danger uk-button-default"
               href="#product-<?php the_ID(); ?>" uk-toggle>Назад</a>
            <a class="uk-button uk-button-default">Отправить</a>
        </div>
    </div>
</div>
<div id="modal-price-<?php the_ID(); ?>" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header uk-light uk-modal-body tm-background-red">
            <h3 class="uk-margin-remove">Рассчитать стоимость</h3>
        </div>
        <div class="uk-modal-body">
            <form class="uk-form">
                <fieldset class="uk-fieldset">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_name">Ваше имя</label>
                        <input class="uk-input" type="text" id="client_name" name="client_name"
                               placeholder="Ваше имя" required>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_email">Ваша электронная почта</label>
                        <input class="uk-input" type="email" id="client_email" name="client_email"
                               placeholder="Ваша электронная почта" required>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_phone">Ваш телефон</label>
                        <input class="uk-input" type="text" id="client_phone" name="client_phone"
                               placeholder="Ваш телефон" required>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="client_message">Сообщение</label>
                        <textarea class="uk-textarea" rows="5" id="client_message" name="client_message"
                                  placeholder="Сообщение"></textarea>
                    </div>

                </fieldset>
            </form>
        </div>
        <div class="uk-modal-footer uk-light tm-background-blue uk-text-right">
            <a class="uk-button tm-background-red uk-button-danger uk-button-default"
               href="#product-<?php the_ID(); ?>" uk-toggle>Назад</a>
            <a class="uk-button uk-button-default">Отправить</a>
        </div>
    </div>
</div>
