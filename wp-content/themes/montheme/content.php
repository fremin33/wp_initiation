<!-- =========================================================================
==========================PAGE DES IMPORTS=================================
========================================================================= -->
<div class="row">
    <div class="col-md-2">
        <a href="<?php the_permalink(); ?>" class="">
            <?= the_post_thumbnail('thumbnail', ['class' => 'img-responsive img-thumbnail']) ?>
        </a>
    </div>
    <!-- col-md-2 -->
    <div class="col-md-10">
        <h1>
            <a href="<?php the_permalink(); ?>" class="">
                <?= the_title(); ?>
            </a>
        </h1>
        <p>
            <p>Publié le
                <?php the_date() ?>, dans la categorie
                <?= the_category(', ') ?>
                avec les étiquettes <?php the_tags(' ', ', ')?>
            </p>
            <?= the_excerpt(); ?>
        </p>
    </div>
    <!-- col-md-10 -->
</div>
<!-- /row -->

