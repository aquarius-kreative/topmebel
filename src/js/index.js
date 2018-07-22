import '../sass/theme.scss';
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

UIkit.use(Icons);

jQuery(document).ready(function ($) {
    const feedbackForm = $('#tm-feedback');
    const designerForm = $('#tm-designer-form');
    const callForm = $('#tm-call-form');
    const priceForm = $('#tm-price-form');

    if (feedbackForm) {
        feedbackForm.on('submit', function (event) {
            event.preventDefault();
            sendMessage(feedbackForm, false);
        });
    }

    if (designerForm) {
        designerForm.on('submit', function (event) {
            event.preventDefault();
            sendMessage(designerForm, true);
        });
    }

    if (callForm) {
        callForm.on('submit', function (event) {
            event.preventDefault();
            sendMessage(callForm, true);
        });
    }

    if (priceForm) {
        priceForm.on('submit', function (event) {
            event.preventDefault();
            sendMessage(priceForm, true);
        });
    }

    function sendMessage(form, isModal) {
        $('button[type=submit]').html(`<div uk-spinner></div>`);

        const data = {
            action: form.attr('action'),
            nonce_code: tmajax.nonce,
            data: form.serialize()
        }
        $.post(tmajax.url, data, function (response) {
            $('button[type=submit]').html('Отправить');
            form[0].reset();
            UIkit.notification({
                message: 'Сообщение отправлено!',
                status: 'primary',
                pos: 'top-right',
                timeout: 5000
            });
            if (isModal) {
                let modal = $(form).parents('.uk-modal').first()
                UIkit.modal(modal[0]).hide();
            }
        });
    }
});

