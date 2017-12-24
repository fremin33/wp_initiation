<?php get_header(); ?>

<!-- Fais appel au fichier slider-home.php -->
<?php get_template_part( 'slider', 'home' )?>
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
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
						</a>
					</p>
					<h3>
						<?php the_title(); ?>
					</h3>
					<p class="small auteur"> par
						<?php the_author_posts_link(); ?>,
						<?php the_time('d F Y'); ?>
					</p>
					<p>
						<?php the_excerpt(); ?>
					</p>
					<p>
						<a href="<?php the_permalink(); ?>" class="btn btn-warning">Lire la suite</a>
					</p>
				</div>
				<?php	
    endwhile;																		// Je ferme mon WHILE
    wp_reset_postdata();								// A la fin du traitement je réinitialise la variable globale post afin de ne pas créer de conflit dans la suite de ma page.
    endif;																	// Je ferme mon IF
    ?>
		</div>
		<!-- .row -->

	</div>
</section>
<!--/#explore-->
<!-- Contenu de la page accueil -->
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php endwhile; ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
		<h1 class="text-center"><?= the_title(); ?></h1>
		<?= the_content(); ?>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<!-- Fin contenu de la page accueil -->



<?php get_footer(); ?>