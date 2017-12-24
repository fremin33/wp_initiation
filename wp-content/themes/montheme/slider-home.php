<section class="mgb">
    <div class="container">
        <div id="slider_01" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#slider_01" data-slide-to="0" class="active"></li>
                <li data-target="#slider_01" data-slide-to="1"></li>
                <li data-target="#slider_01" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                <img class="" src="<?= get_stylesheet_directory_uri().'/assets/img/slider_01.png'; ?>" alt="">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                <img class="" src="<?= get_stylesheet_directory_uri() . '/assets/img/slider_02.png'; ?>" alt="">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                <img class="" src="<?= get_stylesheet_directory_uri() . '/assets/img/renard.png'; ?>" alt="">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#slider_01" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#slider_01" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div><!-- Fin caroussel -->
    </div><!-- Fin container -->
</section>