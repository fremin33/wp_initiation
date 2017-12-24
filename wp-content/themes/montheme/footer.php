<!-- =========================================================================
==================================FOOTER======================================
========================================================================= -->
<footer>
    <div class="container">
        <div class="row">
            <!-- Si la fonctionnalité side bar est activé tu l'affiche -->
            <?php if (is_active_sidebar('widgetized-footer')) : ?>
                <?php dynamic_sidebar('widgetized-footer')?>
            <?php endif ?>
            <div class="col-xs-12">
                <p class="text-center">
                    Site Crée par Florian Fremin | 2017
                </p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>