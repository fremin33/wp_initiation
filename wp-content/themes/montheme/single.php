<!-- =========================================================================
============================PAGE DES ARTICLES=================================
========================================================================= -->
<?php get_header(); ?>
<div class="container">
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="row">
        <div class="col-xs-12">
            <?= the_post_thumbnail('thumbnail', ['class' => 'img-responsive img-thumbnail']) ?>
        </div>
        <!-- col-md-2 -->
        <div class="col-xs-12">
            <h1>
                <?= the_title(); ?>
            </h1>

            <p>Publié le <?php the_date() ?>, dans la categorie <?= the_category(', ') ?></p>
            <p>
                <?= the_content(); ?>
            </p>
        </div>
        <!-- col-md-10 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-xs-12">
            <nav>
                <ul>
                    <li class="pull-left"><?php previous_post_link() ?></li>
                    <li class="pull-right"><?php next_post_link() ?></li>
                </ul>
            </nav>
        </div>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>
<!-- /container -->
<?php get_footer() ?>