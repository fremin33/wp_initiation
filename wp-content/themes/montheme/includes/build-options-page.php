<?php 

function ff_build_options()
{ ?>
<?php $options = get_option('ff_options') ?> <!-- récupère les options -->
 <div class="wrap">
     <div class="container">
         <?php if (isset($_GET['status']) && ($_GET['status'] == 1)) : ?>
            <div class="alert alert-success">Mise à jours effectuée avec succès</div>
         <?php endif ?>
         <div class="jumbotron">
             <h1 class="h2">Paramètre du site</h1>
         </div>
         <form action="admin-post.php" id="form-options" class="form-horizontal" method="post">
             <input type="hidden" name="action" value="saveOptions">
             <?php wp_nonce_field('ff_options_verify') ?>
        <div class="col-xs-12">
            <h1 class="h2">Image du logo en page d'accueil (haut de page)</h1>
            <div class="row">
                <div class="col-lg-5">
                    <img style="margin-top: 20px" id="img_preview_01" src="<?= $options['image_01_url'] ?>" alt="" class="img-responsive img-thumbnail">
                </div>
                <div class="col-lg-6 col-lg-offset-1">
                    <button class="btn btn-primary btn-lg btn-select-img" type="button" id="btn_img_01">Choisir une image pour le blog</button>
                </div>
            </div>
            <div class="form-group">
                <label for="ff_image_01" class="col-sm-2 control-label">Image sauvegardé</label>
                <div class="col-sm-10">
                    <input type="text" style="width: 100%" type="text" name="ff_image_01" id="ff_image_01" value="<?= $options['image_01_url'] ?>" disabled>
                    <input type="hidden"style="width: 100%" type="text" name="ff_image_url_01" id="ff_image_url_01" value="<?= $options['image_01_url'] ?>">
                </div>
            </div>
        </div>




             <div class="col-xs-12">
                 <div class="form-group">
                     <label for="legend_01" class="col-sm-2 control-label">Légende</label>
                     <div class="col-sm-10">
                         <input type="text" id="legend_01" name="ff_legend_01" value="<?= $options['legend_01'] ?>" style="width: 100%">
                     </div>
                 </div>
             </div>
            <div>
                <button id="validator" type="submit" class="btn btn-success btn-lg">Mettre à jours</button>
            </div>


         </form>
     </div>
 </div>
<?php 
} ?> 