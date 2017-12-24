<?php 

define('VERSION', '1.0.0');


// =========================================================================
// =======================CHARGEMENT DES STYLES=============================
// =========================================================================
function ff_load_styles () {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), VERSION, 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array('bootstrap-css'), VERSION, 'all');
} // fin ff_load_styles ()
// charge les styles dans les pages de wordpress
add_action('wp_enqueue_scripts', 'ff_load_styles');



// =========================================================================
// =======================CHARGEMENT DES SCRIPTS============================
// =========================================================================
function ff_load_scripts() {
    wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js', array('jquery'), VERSION, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery', 'bootstrap-js'), VERSION, true);
} // fin ff_load_scripts
// charge les scripts dans les pages de wordpress
add_action('wp_enqueue_scripts', 'ff_load_scripts');


// =========================================================================
// ==========================UTILITAIRES====================================
// =========================================================================
function ff_setup () {
// ==========================AJOUT DE FONCTIONNALITE======================== 
    // ajoute image à la une au article
    add_theme_support('post-thumbnails');
    // gestion de la balise title par wordpress
    add_theme_support('title-tag');
    // ajoute l'ajout de menu (possibilité d'ajouter plusieurs menus (secondary => secondaire))
    register_nav_menus(['primary' => 'principal']);

    function my_images_sizes ($sizes) {
        $addsizes = [
            "medium_large" => "Medium large"
        ];
        $newsizes = array_merge($sizes, $addsizes);
        return $newsizes;
    }
    // ajoute la selection de la taille medium large lors de l'upload de l'image
    add_filter('image_size_names_choose', 'my_images_sizes');
    

    // ======================SUPRESSION DE FONCTIONNALITE========================
    // supprime l'affichage de la version de wordpress dans le header
    remove_action('wp_head', 'wp_generator');
    // supprime l'affiche des guillemets à la française (<<>> = "")
    remove_filter('the_content', 'wptexturize');
    


    // ======================CUSTOMS FONCTIONS===================================
    // ajoute la classe active au menu
    add_filter('nav_menu_css_class', 'ff_active_class', 10, 2);
    // remplace les [...] de the_excerpt() par un lien avec lire la suite
    add_filter('excerpt_more', 'ff_replace_text_excerpt');

    
    // ======================ACTIVATION DES OPTIONS===============================
    // active l'ajout d'option dans wordpress (form build-options)
    function ff_active_options() {
        $themeOptions = get_option('ff_options');
        if (!$themeOptions) {
            $options = [
                'image_01_url' => '',
                'legend_01' => ''
            ];
            add_option('options', $options);
        }
    } // fin ff_active_options
    // lance la fonction pour activer les options quand on change de thème
    add_action('after_switch_theme', 'ff_active_options');


    function adminMenu () {
        add_menu_page( 
            // title de la page option
            'Options crée par moi', 
            // nom dans le num de l'espace administrateur dans wordpress
            'Mes options', 
            // droits d'accée à la page (cf role et capability)
            'publish_pages', 
            // slug affiché dans l'url
            'ff_theme_options',
            // 
            'ff_build_options'
        );
        include('includes/build-options-page.php'); // contient la fonction ff_build_options
    } // fin adminMenu
    // ajoute la nouvelle page dans l'espace admin
    add_action('admin_menu', 'adminMenu');

    // créer une zone de widget
    function ff_widget_init(){
        register_sidebar(array(
            'name' => 'Footer Widget Zone',
            // Utiliser pour la zone de sidebar dans le footer
            'id' => 'widgetized-footer',
            'description' => 'widget ajouté dans le footer 4 max',
            'before_widget' => '<div id="%1$s" class="col-xs-3 %2$s"><div class="inside-widget">',
            'after_widget' => '</div></div>',
            'before_title' => '<h2 class="h3 text-center">',
            'after_title' => '</h2>'
        ));
    } // fin ff_widget_init
    // ajoute la gestion des widgets dans wordpress
    add_action('widgets_init', 'ff_widget_init');
} // fin setup
// lance la fonction ff_setup une fois le thème chargé
add_action('after_setup_theme', 'ff_setup');




// =========================================================================
// ==========================CUSTOMS FONCTIONS==============================
// =========================================================================
// ajoute la classe active au li de la navbar
function ff_active_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

// remplace les [...] de the_excerpt() par un lien avec lire la suite
function ff_replace_text_excerpt($more)
{
    global $post;
    return '<a class="more-link" href="' . get_permalink($post->ID) . '"> Lire la suite</a>';
}




// =========================================================================
// ==========================ESPACE ADMINISTRATEUR==========================
// =========================================================================
function ff_admin_init () {
    function ff_load_admin_styles_scripts() {
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), VERSION, 'all');
        wp_enqueue_script('main', get_template_directory_uri() . '/js/admin-options.js', array('jquery'), VERSION, true);

        wp_enqueue_media(); // rend le média uploader de wordpress disponible
    } // fin ff_load_admin_styles_scripts
    
    // charge les styles dans l'interface admin de wordpress
    add_action('admin_enqueue_scripts', 'ff_load_admin_styles_scripts');
    include('includes/save-options-page.php'); // contient la fonction ff_save_options
    // lance l'action saveOptions par admin_post
    add_action('admin_post_saveOptions', 'ff_save_options');
} // fin ff_admin_init

add_action('admin_init', 'ff_admin_init');