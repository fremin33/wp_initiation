<!-- =========================================================================
==========================PAGE DES CATEGORIES=================================
========================================================================= -->
<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <!-- Affiche la categorie sans link -->
            <p class="lead">Archives de la catégorie <?php single_cat_title() ?></p>
        </div>
    </div>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <!-- Inclut le fichier content.php -->
            <?php get_template_part('content') ?>
        <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>
<!-- /container -->
<?php get_footer() ?>
