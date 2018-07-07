import '../sass/theme.scss';
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

UIkit.use(Icons);

const feedbackForm = $('#tm-feedback');

if (feedbackForm) {
    feedbackForm.on('submit', function (event) {
        event.preventDefault();
        $('button[type=submit]').html(`<div uk-spinner></div>`);
        const data = {
            action: 'tm_feedback',
            nonce_code: tmajax.nonce,
            data: feedbackForm.serialize()
        }
        $.post(tmajax.url, data, function (response) {
            feedbackForm.prepend(`
                <div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>Ваше сообщение отправлено.</p>
                </div>
            `);
            $('button[type=submit]').html('Отправить');
            feedbackForm[0].reset();
        });
    });
}