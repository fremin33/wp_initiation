<?php 

// sauvegarde les informations sousmis dans la page créer dans l'espace admin
function ff_save_options () {

    // verifie si l'utilisateur à les droits pour publier du contenu
    if (!current_user_can('publish_pages')) {
        wp_die("Vous n'êtes pas autoriser à effectuer cette opération");
    }
    check_admin_referer('ff_options_verify');

    // on récupère les options enregistré précédemment
    $options = get_option('ff_options');

    // sauvegarde la legend
    $options['legend_01'] = sanitize_text_field($_POST['ff_legend_01']);
    // sauvegarde l'image
    $options['image_01_url'] = sanitize_text_field($_POST['ff_image_url_01']);
    // actualise les options avec les nouvelles 
    update_option('ff_options', $options);
    // redirection sur la page admin
    wp_redirect(admin_url('admin.php?page=ff_theme_options&status=1'));
    exit;
}