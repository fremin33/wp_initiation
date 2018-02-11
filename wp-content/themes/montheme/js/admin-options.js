// =========================================================================
// =======================DOC READY POUR JQUERY============================
// =========================================================================
jQuery(document).ready(function ($) {

    // Permet d'utiliser l'uploader de média de wordpress
    frame = wp.media({
        title: 'Sélectionner un média',
        button: {
            text: 'Utiliser ce média'
        },
        multiple: false // true pour pouvoir sélectionner plusieurs images
    });
    // ouvre fram.open au click de btn_img_01
    $('#btn_img_01').click(function (e) {
        e.preventDefault();
        frame.open(); // ouvre l'uploader de média
    })

    // affiche l'objet de l'image sélectionné
    frame.on('select', function () {
        var objImg = frame.state().get('selection').first().toJSON();
        console.log(objImg);
        let monUrl = objImg.sizes.full.url;
        $('#img_preview_01').attr('src', monUrl);
        $('input#ff_image_url_01').attr('value', monUrl);
        $('input#ff_image_01').attr('value', monUrl);
    })
});