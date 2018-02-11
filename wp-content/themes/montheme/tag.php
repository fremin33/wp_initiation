<!-- =========================================================================
==================================PAGES DES TAGS==============================
========================================================================= -->
<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <!-- Affiche le tag sans link -->
            <p class="lead">Archives des articles avec l'étiquette <?php single_tag_title() ?></p>
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
