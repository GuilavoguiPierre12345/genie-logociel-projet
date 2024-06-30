<div class="container">
    <div class="row my-4">
        <h1 class="h1 text-center">AJOUT D'UN ETUDIANT</h1>
    </div>
    <form action="" method="POST" class="form row">
        <div class="col col-md-6">
            <div class="my-5 row">
                <div class="col md-3">
                    <label for="matricule" class="form-label h4">Matricule : </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="matricule" id="matricule" class="form-control <?= isset($erreurs['matricule']) ? 'is-invalid' : '' ?> " placeholder="matricule de l'étudiant" value="<?= isset($matricule) ? $matricule : null ?>">
                    <div class="invalid-feedback"> <?= $erreurs['matricule'] ?> </div>
                </div>
            </div>

            <div class="my-5 row">
                <div class="col md-3">
                    <label for="nom" class="form-label h4">Nom : </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="nom" id="nom" class="form-control <?= isset($erreurs['nom']) ? 'is-invalid' : '' ?>" placeholder="nom de l'étudiant" value="<?= isset($nom) ? $nom : null ?>">
                    <div class="invalid-feedback"> <?= $erreurs['nom'] ?> </div>
                </div>
            </div>

            <div class="my-5 row">
                <div class="col md-3">
                    <label for="prenom" class="form-label h4">Prénom : </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="prenom" id="prenom" class="form-control <?= isset($erreurs['prenom']) ? 'is-invalid' : '' ?>" placeholder="prénom de l'étudiant" value="<?= isset($prenom) ? $prenom : null ?>">
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
                        <option value="F">Féminin</option>
                    </select>
                    <div class="invalid-feedback"> <?= $erreurs['genre'] ?> </div>
                </div>
            </div>

        </div>

        <div class="col col-md-6">
            <div class="my-5 row">
                <div class="col md-3">
                    <label for="promotion" class="form-label h4">Promotion : </label>
                </div>
                <div class="col-md-9">
                    <input type="number" min="1" name="promotion" id="promotion" class="form-control <?= isset($erreurs['promotion']) ? 'is-invalid' : '' ?>" value="<?= isset($promotion) ? $promotion : null ?>">
                    <div class="invalid-feedback"> <?= $erreurs['promotion'] ?> </div>
                </div>
            </div>

            <div class="my-5 row">
                <div class="col md-3">
                    <label for="niveau" class="form-label h4">Niveau : </label>
                </div>
                <div class="col-md-9">
                    <select name="niveau" id="niveau" class="form-control <?= isset($erreurs['niveau']) ? 'is-invalid' : '' ?>">
                        <option value="1">Licence 1</option>
                        <option value="2">Licence 2</option>
                        <option value="3" selected>Licence 3</option>
                        <option value="4">Licence 4</option>
                    </select>
                    <div class="invalid-feedback"> <?= $erreurs['niveau'] ?> </div>
                </div>
            </div>

            <div class="my-5 row">
                <div class="col md-3">
                    <label for="adresse" class="form-label h4">Adresse : </label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="adresse" id="adresse" value="Telico" class="form-control <?= isset($erreurs['adresse']) ? 'is-invalid' : '' ?>" value="<?= isset($adresse) ? $adresse : null ?>">
                    <div class="invalid-feedback"> <?= $erreurs['adresse'] ?> </div>
                </div>
            </div>

            <div class="my-5 row">
                <div class="col md-3">
                    <label for="telephone" class="form-label h4">Telephone : </label>
                </div>
                <div class="col-md-9">
                    <input type="tel" name="telephone" id="telephone" class="form-control <?= isset($erreurs['telephone']) ? 'is-invalid' : '' ?>" placeholder="Ex: 621627214" value="<?= isset($telephone) ? $telephone : null ?>">
                    <div class="invalid-feedback"> <?= $erreurs['telephone'] ?> </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col col-xs-1 offset-md-9 offset-xs-9">
                <button type="reset" class="btn btn-danger btn-lg w-100">Annuler</button>
            </div>
            <div class="col col-xs-1 ms-3">
                <button type="submit" class="btn btn-success btn-lg w-100">Valider</button>
            </div>
        </div>
    </form>
    <?php if (isset($message)) : ?>
        <div class="alert alert-warning text-center h3 my-4"><?= $message ?></div>
    <?php endif ?>
</div>