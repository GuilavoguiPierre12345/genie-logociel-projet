<div class="container">
    <!-- formulaire de renseignement pour l'affichage de la fiche de note -->
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

    <div class="row">
        <div class="row border border-5 my-2">
            <div class="col">
                <h2 class="h5">Fiche de notes : <?= isset($matier) ? $matier : '' ?> </h2>
            </div>
            <div class="col">
                <h3 class="h5">Semestre : <?= isset($semestre) ? $semestre : '' ?> </h3>
            </div>
            <div class="col">
                <h3 class="h5">Promotion : <?= isset($promotion) ? $promotion : '' ?> </h3>
            </div>
        </div>
        <?php if (isset($fiche_note) && !empty($fiche_note)) : ?>
        <form action="" method="POST" class="form row">
            <!-- les paramètres de validation de la fiche de note -->
            <input type="hidden" name="mat" value="<?= isset($matier) ? $matier : '' ?>">
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
                        
                            foreach ($fiche_note as $ligne) : ?>
                                <tr class="text-center h6">
                                    <td> <?= $i ?> </td>
                                    <td class=""> <?= $ligne->matricule ?> <input type="hidden" name="les_matricules[]" value="<?= $ligne->matricule ?>"> </td>
                                    <td> <?= $ligne->nom ?> </td>
                                    <td> <?= $ligne->prenom ?> </td>
                                    <td>
                                        <input type="number" name="note1[]" min="0.00" max="10.00" value="<?= $ligne->note1 ?>" class="form-control text-center">
                                    </td>
                                    <td>
                                        <input type="number" name="note2[]" min="0.00" max="10.00" value="<?= $ligne->note2 ?>" class="form-control text-center">
                                    </td>
                                    <td>
                                        <input type="number" name="note3[]" min="0.00" max="10.00" value="<?= $ligne->note3 ?>" class="form-control w-auto text-center">
                                    </td>
                                </tr>
                        <?php $i++;
                            endforeach;?>
                    </tbody>
                </table>
            </div>
            <input type="submit" name="valider" value="Valider les modifications" class="btn btn-success btn-lg w-auto">
        </form>
        <?php else : ?>
            <div class="text-center h3 bg-warning my-4 p-5">
                Désolé 🙏🏻🙏🏽, aucune fiche de note élaborer en <?= isset($matier) ? $matier : '' ?> ==> 
                Semestre <?= isset($semestre) ? $semestre : '' ?> ==> Promotion : <?= isset($promotion) ? $promotion : '' ?> !
            </div>
        <?php endif ?>
    </div>
</div>
<!-- le pied de page -->
<div class="container mt-5">
    <div class="row text-center">
        <hr>
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>

    </div>
</div>