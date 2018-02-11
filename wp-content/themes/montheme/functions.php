<?php 

define('VERSION', '1.0.0');


// =========================================================================
// =======================CHARGEMENT DES STYLES=============================
// =========================================================================
function ff_load_styles () {
    wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), VERSION, 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array('bootstrap-css'), VERSION, 'all');
} // fin ff_load_styles ()
// charge les styles dans les pages de wordpress
add_action('wp_enqueue_scripts', 'ff_load_styles');



// =========================================================================
// =======================CHARGEMENT DES SCRIPTS============================
// =========================================================================
function ff_load_scripts() {
    wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), VERSION, true);
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
    // crée format image slider
    add_image_size( 'ff_slider', 1140, 420, true );

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
            'before_widget' => '<div id="%1$s" class="col-xs-12 col-sm-6 col-md-3 %2$s"><div class="inside-widget">',
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

// Ajoute la class img-responsive à toutes les images
function add_img_class($class)
{
    $class .= ' img-responsive'; // bien mettre un espace devant la chaine de caractères
    return $class;
}
add_filter('get_image_tag_class', 'add_img_class');


// =========================================================================
// ==========================CUSTOM POST TYPE===============================
// =========================================================================
function ff_slider_init()
{

    $labels = array(
        'name' => 'Image slider',
        'singular_name' => 'Image accueil',
        'menu_name' => 'Slider',
        'name_admin_bar' => __('Post Type', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'attributes' => __('Item Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'add_new_item' => 'Ajouter une image',
        'add_new' => 'Ajouter une image',
        'new_item' => __('New Item', 'text_domain'),
        'edit_item' => __('Edit Item', 'text_domain'),
        'update_item' => __('Update Item', 'text_domain'),
        'view_item' => __('View Item', 'text_domain'),
        'view_items' => __('View Items', 'text_domain'),
        'search_items' => __('Search Item', 'text_domain'),
        'not_found' => __('Not found', 'text_domain'),
        'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Post Type', 'text_domain'),
        'description' => __('Post Type Description', 'text_domain'),
        'labels' => $labels,
        'supports' => ['title', 'editor', 'page-attributes', 'thumbnail'],
        // 'taxonomies' => array('category', 'post_tag'),
        'menu_icon' => get_stylesheet_directory() . '/assets/img/slider.png',
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'page',
    );
    register_post_type('ff_slider', $args);

}
add_action('init', 'ff_slider_init', 0); /* Ajoute un espace slider à l'interface wp */

/* Ajout de deux colonnes dans le custom post type slider */
add_filter( 'manage_edit-ff_slider_columns', 'ff_col_change'); // change le nom des colonnes
function ff_col_change ($columns) {
    $columns['ff_slider_image_order'] = "ordre";
    $columns['ff_slider_image'] = 'image affiché';
    return $columns;
}
add_action( 'manage_ff_slider_posts_custom_column', 'ff_content_show', 10, 2);
function ff_content_show($column, $post_id) {
    global $post;
    if ($column == 'ff_slider_image') {
        echo the_post_thumbnail([100,100]);
    }
    if ($column == 'ff_slider_image_order') {
        echo $post->menu_order;
    }
}

// trie les élements par leurs ordre dans le Custom post type slider
function ff_change_slides_order ($query) {
    global $post_type, $pagenow;
    if ($pagenow == 'edit.php' && $post_type == 'ff_slider') {
        $query->query_vars['orderby'] = 'menu_order';
        $query->query_vars['order'] = 'asc';
    }
}
add_action( 'pre_get_posts', 'ff_change_slides_order');