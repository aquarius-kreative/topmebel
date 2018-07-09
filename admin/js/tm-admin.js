jQuery(document).ready(function ($) {
    let mediaUploader;

    $('#select-slides').on('click', function (e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Выберите изображение для слайдера',
            button: {
                text: 'Выбрать'
            },
            multiple: true
        });

        mediaUploader.on('select', function () {
            let attachments = mediaUploader.state().get('selection').toJSON();
            $('#slides').val(attachments.map(a => a.id));
        })

        mediaUploader.on('open', function () {
            let selection = mediaUploader.state().get('selection');
            let ids = $('#slides').val().split(',');
            ids.map(id => {
                let attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add( attachment ? [ attachment ] : [] );
            });
        })

        mediaUploader.open();
    })
});