import '../sass/theme.scss';
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

UIkit.use(Icons);

const feedbackForm = $('#tm-feedback');

if (feedbackForm) {
    feedbackForm.on('submit', function (event) {
        event.preventDefault();
        const data = {
            action: 'tm_feedback',
            nonce_code: tmajax.nonce,
            data: feedbackForm.serialize()
        }
        jQuery.post(tmajax.url, data, function (response) {
            UIkit.notification(response, {status: 'primary'});
            feedbackForm.prepend(`
                <div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>Ваше сообщение отправлено.</p>
                </div>
            `);
            feedbackForm[0].reset();
        });
    });
}