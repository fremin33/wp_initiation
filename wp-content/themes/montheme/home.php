<!-- =========================================================================
=============================PAGE LE BLOG=====================================
========================================================================= -->
<?php get_header(); ?>
<div class="container">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <!-- <?php var_dump($post)?> -->
            <!-- Inclut le fichier content.php -->
            <?php get_template_part('content') ?>
        <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>
<!-- /container -->
<?php get_footer() ?>