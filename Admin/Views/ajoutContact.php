<div class="container">
    <!-- ajout d'un nouveau contact -->
    <div class="row ">
        <div class="col-sm-6">
            <p class="text-center mt-3"><strong class="h3">NOUVEAU CONTACTS </strong></p>
            <!-- le message de succes si l'ajout s'es effectuer avec succes -->
            <?php if (isset($message_succes)) : ?>
                <h4 class="alert alert-success"><?= $message_succes ?></h4>
            <?php endif ?>
            <!--  ******************* fin message ************************ -->
            <div class="shadow-lg p-3 my-3 bg-body rounded">
                <form class="col-sm-10 mx-auto" action="" method="POST">
                    <!-- opérateur téléphonique -->
                    <div class="form-group mb-2">
                        <label for="titre" class="form-label h4">Opérateur téléphonique : </label>
                        <select name="operateur" id="titre" class="form-control">
                            <option value=""></option>
                            <option value="Orange">Orange</option>
                            <option value="Areeba">Areeba</option>
                            <option value="Cellcom">Cellcom</option>
                        </select>
                        <span class="h6 alert text-danger"> <?= isset($erreur_operateur) ? $erreur_operateur : '' ?> </span>
                    </div>
                    <!-- le contact -->
                    <div class="form-group mb-2">
                        <label for="contact" class="form-label h4">Pays du Partenaire : </label>
                        <input type="text" name="contact" id="contact" class="form-control form-control-lg input-lg <?= isset($erreur_pays) ? 'is-invalid' : '' ?>" placeholder="ex : 625506385">
                        <span class="h6 alert text-danger"> <?= isset($erreur_contact) ? $erreur_contact : '' ?> </span>
                    </div>

                    <div class="form-group mb-2">
                        <input type="submit" name="ajoutContact" value="Ajouter le contact" class="btn btn-lg btn-outline-info">
                    </div>
                </form>
            </div>
        </div>
        <!-- liste des contacts -->
        <div class="col-sm-6">
            <p class="text-center mt-3"><strong class="h3">LISTE DES CONTACTS </strong></p>
            <div class="table-responsive shadow-lg p-3 my-3 bg-body rounded">
                <?php if (isset($liste_contact) && !empty($liste_contact)) : ?>
                    <table class=" table table-bordered table-hover h5">
                        <!-- l'entête du tableau -->
                        <thead>
                            <tr class=" bg-info">
                                <th>N°</th>
                                <th class="col-sm-3">Contacts </th>
                                <th class="col-sm-4">Date d'ajout </th>
                                <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <!-- le contenu du tableau -->
                        <tbody>
                            <?php $i = 1;
                            foreach ($liste_contact as $contact) : ?>
                                <tr class="">
                                    <td> <?= $i ?> </td>
                                    <td> <?= $contact->contact ?> </td>
                                    <td> <?= $contact->dateajoutcontact ?> </td>
                                    <td class="">
                                        <form action="" method="post" class="mx-auto">
                                            <input type="hidden" name="cle" value="<?= $contact->id ?>">
                                            <input type="submit" name="supprimer" value="Suppr" title="suppression" class="btn btn-outline-danger">
                                        </form>
                                    </td>

                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                <?php elseif (empty($liste_contact)) : ?>
                    <h5 class="text-center alert alert-warning">Liste des contacts vide !</h5>
                <?php endif ?>
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

<!-- le script du choix de contact -->
<script>
    var operateur = document.querySelector('select');
    var contact = document.getElementById('contact');
    var ajoutcontact = document.getElementById('ajoutcontact');


    contact.setAttribute('disabled', 'true');
    operateur.addEventListener('change', () => {
        var valeur = operateur.value;
        if (valeur.length === 0) {
            contact.setAttribute('disabled', 'true');
            contact.value = '';
        } else if (valeur === 'Areeba') {
            contact.removeAttribute('disabled')
            contact.value = 66;
        } else if (valeur === 'Cellcom') {
            contact.removeAttribute('disabled')
            contact.value = 65;
        } else if (valeur === 'Orange') {
            contact.removeAttribute('disabled')
            contact.value = 62;
        }
    })
</script>