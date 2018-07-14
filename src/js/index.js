import '../sass/theme.scss';
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

UIkit.use(Icons);

jQuery(document).ready(function ($) {
    const feedbackForm = $('#tm-feedback');
    const designerForm = $('#tm-designer-form');

    if (feedbackForm) {
        feedbackForm.on('submit', function (event) {
            event.preventDefault();
            sendMessage(feedbackForm);
        });
    }

    if (designerForm) {
        designerForm.on('submit', function (event) {
            event.preventDefault();
            sendMessage(designerForm);
        });
    }

    function sendMessage(form) {
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
        });
    }
});

