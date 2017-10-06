function don8_media_uploader(e){
    var send_attachment_bkp = wp.media.editor.send.attachment,
        button = jQuery(e);

    wp.media.editor.send.attachment = function(props, attachment){
        jQuery(e).siblings('.don8-media').val(attachment.id);
        jQuery(e).siblings('.don8-preview').attr('src', attachment.url);
        wp.media.editor.send.attachment = send_attachment_bkp;
    }

    wp.media.editor.open(button);
    return false;
}
function don8_media_uploader_remove(e) {
    var parent = jQuery(e).closest('.don8-media-upload');

    parent.find('.don8-preview').attr('src', '');
    parent.find('.don8-media').val('');
}
