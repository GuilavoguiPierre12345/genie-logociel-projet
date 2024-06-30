<div class="container">
    <div class="row col-sm-10 mx-auto">
        <div class="form">
            <p class="text-center mt-3"><strong class="h3">AJOUT D'UN EVENEMENT</strong></p>
            <!-- le message de succes si l'ajout s'es effectuer avec succes -->
            <?php if(isset($message_succes)) : ?>
                <h4 class="alert alert-success"><?= $message_succes ?></h4>
            <?php endif ?>
            <!--  ******************* fin message ************************ -->
            <div class="shadow-lg p-3 my-3 bg-body rounded">
                <form class="col-sm-10 mx-auto" action="" method="POST" enctype="multipart/form-data">
                    <!-- titre -->
                    <div class="form-group mb-2">
                        <label for="titre" class="form-label h4">Titre <span class="text-danger">*</span> : </label>
                        <input type="text" value="<?= isset($titre) ? $titre : '' ?>" name="titre" id="titre" class="form-control-lg input-lg form-control <?=isset($erreur_titre)?'is-invalid':''?>" placeholder="titre de la pub">
                        <span class="h6 alert text-danger"> <?= isset($erreur_titre) ?$erreur_titre:''?> </span>
                    </div>
                    <!-- resumer -->
                    <div class="form-group mb-2">
                        <label for="resumer" class="form-label h4">Resumer <span class="text-danger">*</span> : </label>
                        <input type="text" value="<?= isset($resumer) ? $resumer : '' ?>" name="resumer" id="resumer" class="form-control form-control-lg input-lg <?=isset($erreur_resumer)?'is-invalid':''?>" placeholder="resumer de la pub">
                        <span class="h6 alert text-danger"> <?= isset($erreur_resumer) ?$erreur_resumer:''?> </span>
                    </div>
                    <!-- lien photo -->
                    <div class="form-group mb-2">
                        <label for="lien_photo" class="form-label h4">Lien photo <span class="text-danger">*</span> : </label>
                        <input type="file" name="lien_photo" id="lien_photo" class="form-control form-control-lg input-lg <?=isset($erreur_lien)?'is-invalid':''?>">
                        <span class="h6 alert text-danger"> <?= isset($erreur_lien) ?$erreur_lien:''?> </span>
                    </div>
                    <!-- contenu -->
                    <div class="form-group mb-2">
                        <label for="contenu" class="form-label h4"> Contenu <span class="text-danger">*</span> : </label>
                        <textarea name="contenu" id="contenu" cols="30" rows="10" class="form-control form-control-lg input-lg <?=isset($erreur_contenu)?'is-invalid':''?>" placeholder="le contenu de la pub"> <?= isset($contenu) ? $contenu : '' ?> </textarea>
                        <span class="h6 alert text-danger"> <?= isset($erreur_) ?$erreur_contenu:''?> </span>
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