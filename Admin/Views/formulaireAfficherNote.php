<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-6">
            <p class="h2">Institut Supérieur de Technologie de Mamou</p>
            <p class="h2">Département : Genie Informatique</p>
            <p class="h3">Semestre : <?= isset($semestre) ? $semestre : '' ?> </p>
            <p class="h3">Promotion : <?= isset($promotion) ? $promotion : '' ?> </p>
        </div>
        <div class="col-6">
            <p class="h3 text-center">Année Universitaire : <?= $annee_universitaire ?></p>
        </div>
    </div>
    <div class="row">
        <form action="../Admin/Controllers/etats/ficheNote.php" method="POST">
            <input type="hidden" name="semestre" value="<?= isset($semestre) ? $semestre : '' ?> ">
            <input type="hidden" name="matiere" value="<?= isset($matier) ? $matier : '' ?> ">
            <input type="hidden" name="promotion" value="<?= isset($promotion) ? $promotion : '' ?> ">

            <a target="_blank" href="../Controllers/etats/ficheNote.php" class="w-auto my-2 btn btn-info btn-lg">
                <input type="submit" value="imprimer" class="form-control">
            </a>
        </form>
    </div>
    <div class="row border border-5 my-2">
        <div class="col text-center">
            <h2 class="h5">Fiche de notes : <?= isset($matier) ? $matier : '' ?> </h2>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th colspan="5"></th>
                        <th class="text-center h5">0.25</th>
                        <th></th>
                        <th class="text-center h5">0.35</th>
                        <th></th>
                        <th class="text-center h5">0.4</th>
                        <th colspan="3"></th>

                    </tr>
                    <tr>
                        <th>N°</th>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Notes1</th>
                        <th>Notes1</th>
                        <th>Notes2</th>
                        <th>Notes2</th>
                        <th>EF</th>
                        <th>EF</th>
                        <th>Moy Gle</th>
                        <th>Note Lit*</th>
                        <th>Observation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; if(isset($fiche_note)) :
                    foreach ($fiche_note as $ligne) : ?>
                        <tr>
                            <td> <?= $i ?> </td>
                            <td> <?= $ligne->matricule ?> </td>
                            <td><?= $ligne->nom ?></td>
                            <td><?= $ligne->prenom ?></td>
                            <td class="text-center h5 <?= $ligne->note1 ==0 ? 'bg-danger bg-opacity-25': '' ?>"><?= $ligne->note1 ?></td>
                            <td class="text-center h5 <?= ($ligne->note1)*0.25 == 0 ? 'bg-danger bg-opacity-25': '' ?>"> <?= ($ligne->note1)*0.25 ?> </td>

                            <td class="text-center h5 <?= $ligne->note2 ==0 ?'bg-danger bg-opacity-25': '' ?>"><?= $ligne->note2 ?> </td>
                            <td class="text-center h5 <?= ($ligne->note2)*0.35 == 0 ? 'bg-danger bg-opacity-25': '' ?>"> <?= ($ligne->note2)*0.35 ?> </td>

                            <td class="text-center h5 <?= $ligne->note3 ==0 ?'bg-danger bg-opacity-25': '' ?>"><?= $ligne->note3 ?> </td>
                            <td class="text-center h5 <?= ($ligne->note3)*0.4 == 0 ? 'bg-danger bg-opacity-25': '' ?>"> <?= ($ligne->note3)*0.4 ?> </td>

                            <td class="text-center h5 <?= moyenneGle_Obs($ligne->note1,$ligne->note2,$ligne->note3,'moy') ==0 ? 'bg-danger bg-opacity-25': '' ?>"><?= moyenneGle_Obs($ligne->note1,$ligne->note2,$ligne->note3,'moy') ?></td>

                            <td class="text-center"> <?= moyenneGle_Obs($ligne->note1,$ligne->note2,$ligne->note3,'lit') ?> </td>

                            <td class="text-center h5 <?= moyenneGle_Obs($ligne->note1,$ligne->note2,$ligne->note3,'obs') ==0 ? 'bg-danger bg-opacity-25': '' ?>"><?= moyenneGle_Obs($ligne->note1,$ligne->note2,$ligne->note3,'obs') ?></td>
                        </tr>
                    <?php $i++;
                    endforeach; endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div><!-- le pied de page -->
<div class="container mt-5">
    <div class="row text-center">
        <hr>
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>

    </div>
</div>
