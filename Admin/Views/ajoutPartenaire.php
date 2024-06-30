<div class="container">
    <div class="row col-sm-10 mx-auto">
        <div class="form">
            <p class="text-center mt-3"><strong class="h3">Ajout d'un Partenaire</strong></p>
            <!-- le message de succes si l'ajout s'es effectuer avec succes -->
            <?php if(isset($message_succes)) : ?>
                <h4 class="alert alert-success"><?= $message_succes ?></h4>
            <?php endif ?>
            <!--  ******************* fin message ************************ -->
            <div class="shadow-lg p-3 my-3 bg-body rounded">
                <form class="col-sm-10 mx-auto" action="" method="POST" enctype="multipart/form-data">
                    <!-- titre -->
                    <div class="form-group mb-2">
                        <label for="titre" class="form-label h4">Nom partenaire : </label>
                        <input type="text" name="partenairenom" id="titre" class="form-control-lg input-lg form-control <?=isset($erreur_nom)?'is-invalid':''?>" placeholder="titre de la pub">
                        <span class="h6 alert text-danger"> <?= isset($erreur_nom) ?$erreur_nom:''?> </span>
                    </div>
                    <!-- resumer -->
                    <div class="form-group mb-2">
                        <label for="resumer" class="form-label h4">Pays du Partenaire : </label>
                        <input type="text" name="partenairepays" id="resumer" class="form-control form-control-lg input-lg <?=isset($erreur_pays)?'is-invalid':''?>" placeholder="resumer de la pub">
                        <span class="h6 alert text-danger"> <?= isset($erreur_pays) ?$erreur_pays:''?> </span>
                    </div>
                    
                    <div class="form-group mb-2">
                        <input type="submit" value="Ajouter l'évènement" class="btn btn-lg btn-outline-info">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- le pied de page -->
<div class="container mt-5">
    <div class="row text-center">
        <hr>
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>

    </div>
</div>