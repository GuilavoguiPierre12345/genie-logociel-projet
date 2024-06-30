<div class="container">
    <div class="row my-4">
        <h1 class="h1 text-center">MISE A JOUR DES INFORMATIONS DE L'ETUDIANT : <i class="text-info"> <?= $matricule?> </i> </h1>
    </div>
    <form action="" method="POST" class="form row">
        <div class="col col-md-6">
            <div class="my-5 row">
                <div class="col md-3">
                    <label for="nom" class="form-label h4">Nom : </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="nom" id="nom" class="form-control <?= isset($erreurs['nom']) ? 'is-invalid' : '' ?>" placeholder="nom de l'étudiant" value="<?= $etudiant_cible[0]->nom ?? null ?>">
                    <div class="invalid-feedback"> <?= $erreurs['nom'] ?> </div>
                </div>
            </div>

            <div class="my-5 row">
                <div class="col md-3">
                    <label for="prenom" class="form-label h4">Prénom : </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="prenom" id="prenom" class="form-control <?= isset($erreurs['prenom']) ? 'is-invalid' : '' ?>" placeholder="prénom de l'étudiant" value="<?= $etudiant_cible[0]->prenom ?? null ?>">
                    <div class="invalid-feedback"> <?= $erreurs['prenom'] ?> </div>
                </div>
            </div>

            <div class="my-5 row">
                <div class="col md-3">
                    <label for="genre" class="form-label h4 is-invalid">Genre : </label>
                </div>
                <div class="col-md-9">
                    <select name="genre" id="genre" class="form-control <?= isset($erreurs['genre']) ? 'is-invalid' : '' ?> ">
                        <option value="M" selected>Masculin</option>
                        <?php if($etudiant_cible[0]->genre ==='F') : ?>
                            <option value="F" selected>Féminin</option>
                        <?php endif ?>
                    </select>
                    <div class="invalid-feedback"> <?= $erreurs['genre'] ?> </div>
                </div>
            </div>

        </div>

        <div class="col col-md-6">

            <div class="my-5 row">
                <div class="col md-3">
                    <label for="adresse" class="form-label h4">Adresse : </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="adresse" id="adresse" value="Telico" class="form-control <?= isset($erreurs['adresse']) ? 'is-invalid' : '' ?>" value="<?= $etudiant_cible[0]->adresse ?? null ?>">
                    <div class="invalid-feedback"> <?= $erreurs['adresse'] ?> </div>
                </div>
            </div>

            <div class="my-5 row">
                <div class="col md-3">
                    <label for="telephone" class="form-label h4">Telephone : </label>
                </div>
                <div class="col-md-9">
                    <input type="tel" name="telephone" id="telephone" class="form-control <?= isset($erreurs['telephone']) ? 'is-invalid' : '' ?>" placeholder="Ex: 621627214" value="<?= $etudiant_cible[0]->telephone ?? null ?>">
                    <div class="invalid-feedback"> <?= $erreurs['telephone'] ?> </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col col-xs-1 offset-md-7 offset-xs-7 mt-2">
                <button type="reset" class=" btn btn-danger btn-lg w-100">Annuler</button>
            </div>
            <div class="col col-xs-4 ms-3 mt-2">
                <button type="submit" class="btn btn-success btn-lg w-100">Valider la modification</button>
            </div>
        </div>
    </form>
    <?php if (isset($message)) : ?>
        <div class="alert alert-warning text-center h3 my-4"><?= $message ?></div>
    <?php endif ?>
</div>