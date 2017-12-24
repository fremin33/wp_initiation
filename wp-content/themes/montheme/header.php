<!-- =========================================================================
==================================HEADER======================================
========================================================================= -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(is_home()) : ?>
        <meta name="description" content="Vous êtes sur la home page">
    <?php endif ?>
    <?php if(is_front_page()) : ?>
        <meta name="description" content="Vous êtes sur la front page">
    <?php endif ?>
    <?php if(is_single() && !is_front_page()) : ?>
        <meta name="description" content="Vous êtes sur une page <?php the_title() ?>">
    <?php endif ?>
    <?php if(is_category()) : ?>
        <meta name="description" content="Vous êtes sur la page de la categorie <?php single_cat_title()?>">
    <?php endif ?>
    <?php if(is_tag()) : ?>
        <meta name="description" content="Vous êtes sur la page des tags <?php single_tag_title() ?>">
    <?php endif ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                        aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Mon premier thème</a>
                </div><!-- navbar-header -->
                <!-- AJOUTE LE MENU A LAFFICHAGE DE WORDPRESS -->
                <?php wp_nav_menu([
                // Nom du menu donné dans l'interface Wordpress
                'menu' => 'top-menu',
                // Nom donné dans la fonction register nav
                'theme_location' => 'primary',
                // Type du container
                'container' => 'div',
                // Class du container
                'container_class' => 'navbar-collapse collapse',
                'container_id' => 'navbar',
                // Class pour les ul
                'menu_class' => 'nav navbar-nav navbar-right']) ?>
            </div><!-- container -->
        </nav>
    </header>

    <div class="container">
        <div class="jumbotron">
            <?php $options = get_option('ff_options')?>
            <div class="row">
                <div class="col-xs-4">
                    <img src="<?= $options['image_01_url']?>" alt="" class="img-responsive">
                    <p><?= stripslashes($options['legend_01']) ?></p>
                </div><!-- /col-xs-4 -->
                <div class="col-xs-8">
                    <h1>Coucou tous le monde</h1>
                </div><!-- /col-xs-8 -->
            </div><!-- /row -->
        </div><!-- /jumbotron -->
    </div><!-- /container -->