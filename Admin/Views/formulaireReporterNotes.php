<div class="container">
    <!-- l'entête de la page de fiche de note -->
    <div class="row mt-3">
        <div class="col-6">
            <p class="h2">Institut Supérieur de Technologie de Mamou</p>
            <p class="h2">Département : Genie Informatique</p>
        </div>
        <div class="col-6">
            <p class="h3 text-center">Année Universitaire : <?= $annee_universitaire ?></p>
        </div>
    </div>
    <!-- affichage des messages d'erreur -->
    <?php if (isset($message_success)) : ?>
        <h5 class="alert alert-success text-center"> <?php if (isset($message_success)) echo $message_success ?> </h5>
    <?php endif ?>
    <?php if (isset($message_erreur)) : ?>
        <h5 class="alert alert-danger text-center"> <?php if (isset($message_erreur)) echo $message_erreur ?> </h5>
    <?php endif ?>
    <!-- ////////////// fin message d'erreur ////////////////////// -->

    <div class="row mt-4">
        <div class="row border border-5 my-2">
            <div class="col">
                <h2 class="h5">Fiche de notes : <?=isset($matier) ? $matier : '' ?> </h2>
            </div>
            <div class="col">
                <h3 class="h5">Semestre : <?= isset($semestre) ? $semestre : '' ?> </h3>
            </div>
            <div class="col">
                <h3 class="h5">Promotion : <?= isset($promotion) ? $promotion : '' ?> </h3>
            </div>
        </div>

        <form action="" method="POST" class="form row">
            <!-- les paramètres de validation de la fiche de note -->
            <input type="hidden" name="mat" value="<?= $matier ?>">
            <input type="hidden" name="promo" value="<?= isset($promotion) ? $promotion : '' ?>">
            <input type="hidden" name="semes" value="<?= isset($semestre) ? $semestre : '' ?>">
            <!-- ///////////// fin des paramètres //////////////////////////////// -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center h4">
                            <th class="col-1">N°</th>
                            <th class="col-2">Matricule</th>
                            <th class="col-3">Nom</th>
                            <th class="col-3">Prénoms</th>
                            <th class="col-1">Notes1</th>
                            <th class="col-1">Notes2</th>
                            <th class="col-1">EF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        if (isset($liste_des_etudiants)) :
                            foreach ($liste_des_etudiants as $etudiant) : ?>
                                <tr class="text-center h6">
                                    <td> <?= $i ?> </td>
                                    <!-- reprise de tout les matricule dans un tableau -->
                                    <td class=""> <?= $etudiant->matricule ?> <input type="hidden" name="les_matricules[]" value="<?= $etudiant->matricule ?>"></td>
                                    <td> <?= $etudiant->nom ?> </td>
                                    <td> <?= $etudiant->prenom ?> </td>
                                    <td><input type="number" name="note1[]" min="0.00" max="10" value="" class="form-control"></td>
                                    <td><input type="number" name="note2[]" min="0.00" max="10" value="" class="form-control"></td>
                                    <td><input type="number" name="note3[]" min="0.00" max="10" value="" class="form-control w-auto"></td>
                                </tr>
                        <?php $i++;
                            endforeach;
                        endif ?>
                    </tbody>
                </table>
            </div>
            <input type="submit" name="valider" value="Valider les notes" class="btn btn-success btn-lg col-2 w-auto">
        </form>
    </div>
</div>
<!-- le pied de page -->
<div class="container mt-5">
    <div class="row text-center">
        <hr>
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>

    </div>
</div>