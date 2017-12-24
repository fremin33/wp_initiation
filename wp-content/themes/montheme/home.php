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
    <!-- Ajout de la pagination  -->
<?php global $wp_query;
$big = 999999999; // need an unlikely integer
?>
<div class="col-xs-12 ff_pagination"></div>

<?= paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages
));
?>



</div>
<!-- /container -->
<?php get_footer() ?>