<?php get_header(); ?>

    <section id="home">	
		<div id="main-slider" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#main-slider" data-slide-to="1" class="active"></li>
				<li data-target="#main-slider" data-slide-to="2"></li>
				<li data-target="#main-slider" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner">
                  Carroussel à rendre dynamique							
			</div>
			
			<a class="left carousel-control" href="#main-slider" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#main-slider" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>    	
    </section>
	<!--/#home-->

	<section id="explore">
		<div class="container">
			<div class="row">
				<?php
    $args = array('posts_per_page' => 3);   // je déclare une variable qui contient mon tableau de paramètres (dans notre exemple, simplement les 3 derniers articles)
    $the_query = new WP_Query($args);				// je demande à Wordpress de récupérer la liste des contenus correspondants à mes paramètres
    if ($the_query->have_posts()) :					// S'il y a des contenus à afficher
    while ($the_query->have_posts()) :		// Tant qu'il reste des contenus à afficher
    $the_query->the_post();								// the_post() permet de récupérer le contenu d'un article/page et permet d'utiliser les templates tags (ex: the_title() )
																									// the_post() modifie la variable globale post (ce qui permet l'utilisation des templates tags)
																									
																									// je ferme PHP pour passer en mode HTML				
    ?>																				
						<div class="col-md-4">						
							<p>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?></a>
							</p>
							<h3><?php the_title(); ?></h3>
							<p class="small auteur"> par <?php the_author_posts_link(); ?>, <?php the_time('d F Y'); ?></p>
							<p>
								<?php the_excerpt(); ?>
							</p>
							<p><a href="<?php the_permalink(); ?>" class="btn btn-warning">Lire la suite</a></p>
						</div>
					<?php	
    endwhile;																		// Je ferme mon WHILE
    wp_reset_postdata();								// A la fin du traitement je réinitialise la variable globale post afin de ne pas créer de conflit dans la suite de ma page.
    endif;																	// Je ferme mon IF
    ?>
			</div><!-- .row -->
		
		</div>
	</section><!--/#explore-->

	<section id="event">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-9">
					<div id="event-carousel" class="carousel slide" data-interval="false">
						<h2 class="heading">Les membres de l'équipe</h2>
						<a class="even-control-left" href="#event-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
						<a class="even-control-right" href="#event-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
						<div class="carousel-inner">
							<div class="item">
								<div class="row">
                                    Membres à rendre dynamique								
								</div><!-- .row -->
							</div><!-- .item -->
						</div><!-- .carousel-inner -->
					</div><!-- #event-carousel -->
				</div> <!-- .col-sm-12 -->
				<div class="guitar">
					<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/guitar.png" alt="guitar">
				</div>
			</div>			
		</div>
	</section><!--/#event-->

	<section id="about">
		<div class="guitar2">				
			<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/guitar2.jpg" alt="guitar">
		</div>
		<div class="about-content">	
			<?php $pg = get_post(26); ?>				
			<h2><?= $pg->post_title; ?></h2>
			<p><?= $pg->post_excerpt; ?></p>
			<a href="<?= $pg->guid; ?>" class="btn btn-primary">En savoir plus <i class="fa fa-angle-right"></i></a>				
		</div>
	</section><!--/#about-->
	
	<section id="twitter">
		<div id="twitter-feed" class="carousel slide" data-interval="false">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="text-center carousel-inner center-block">
						Témoignages à rendre dynamique
					</div>
					<a class="twitter-control-left" href="#twitter-feed" data-slide="prev"><i class="fa fa-angle-left"></i></a>
					<a class="twitter-control-right" href="#twitter-feed" data-slide="next"><i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</div>		
	</section><!--/#twitter-feed-->
	
	<section id="sponsor">
		<div id="sponsor-carousel" class="carousel slide" data-interval="false">
			<div class="container">
				<div class="row">
					<div class="col-sm-10">
						<h2>Sponsors</h2>			
						<a class="sponsor-control-left" href="#sponsor-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
						<a class="sponsor-control-right" href="#sponsor-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
						<div class="carousel-inner">
							<div class="item active">
                                Sponsor à rendre dynamique
                                <ul>
							
						        </ul>
                            </div>
						</div>
					</div>
				</div>				
			</div>
			<div class="light">
				<img class="img-responsive" src="<?= get_stylesheet_directory_uri(); ?>/images/light.png" alt="">
			</div>
		</div>
	</section><!--/#sponsor-->

<?php get_footer(); ?>
