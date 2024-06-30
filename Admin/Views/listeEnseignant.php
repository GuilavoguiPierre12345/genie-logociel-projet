<div class="container">
    <h1 class="text-center my-4 text-decoration-underline"> Liste des Enseignants </h1>

    <div class="row">
        <div class="mb-2 col-sm-5">
            <form action="" class="form row" method="POST">
                <div class="form-group input-group-lg my-2 col-md-10">
                    <input type="text" value="<?= isset($recherche) ? $recherche : null ?>" class="form-control" name="recherche" placeholder="Rechercher selon votre choix">
                </div>
                <button type="submit" class="btn btn-primary btn-md col-md-2">
                    <img width="30" src="../bootstrap/icons/search.svg" alt="recherche" title="recherche">
                </button>
            </form>
        </div>
        <div class="col-sm-5 mb-2">
            <a target="_blank" href="../Admin/Controllers/etats/listeEnseignant.php" class="btn btn-primary btn-md col-md-2 btn-lg">
                <img width="20" src="../bootstrap/icons/server.svg" alt="imprimer" title="imprimer">Imprimer
            </a>
        </div>
    </div>

    <?php if (count($enseignants) === 0 && isset($recherche)) : ?>
        <div class="alert alert-info text-center h2 my-5">AUCUNE REPONSE DEFINIE POUR VOTRE RECHERCHE !</div>
    <?php elseif (count($enseignants) === 0) : ?>
        <div class="alert alert-info text-center h2 my-5">LA LISTE EST VIDE, CLIQUER SUR LE BOUTON CI-DESSOUS POUR AJOUTER !!</div>
        <a href="?action=ajoutEnseignant" class="btn btn-primary col-3 w-25">
            <img width="20" src="../bootstrap/icons/plus-circle.svg" alt="add button" title="add button">
            Ajouter
        </a>
    <?php else : ?>
        <div class="table-responsive">
            <table class="table table-bordered  table-hover">
                <thead>
                    <tr class="text-center table-primary h5">
                        <th class="">N°</th>
                        <th class="col-1">Matricule</th>
                        <th class="col-2">Nom</th>
                        <th class="col-2">Prénom</th>
                        <th class="">Genre</th>
                        <th class="">Telephone</th>
                        <th class="col-3">Matieres</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody><?php $i = 1 ?>
                    <?php foreach ($enseignants as $enseignant) : ?>
                        <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td class="text-center"><?= $enseignant->matricule ?></td>
                            <td class=""><?= $enseignant->nom ?></td>
                            <td class=""><?= $enseignant->prenom ?></td>
                            <td class="text-center"><?= $enseignant->genre ?></td>
                            <td class="text-center"><?= $enseignant->telephone ?></td>
                            <td class="text-center"><?= $enseignant->matieres ?></td>
                            <td>
                            <?php if($d===1) : ?>
                                <a href="?action=updateEnseignant_<?= $enseignant->matricule ?>" class="btn btn-info">
                                    <img width="20" src="../bootstrap/icons/pencil.svg" alt="update button" title="update button">
                                </a>
                                <a href="?action=deleteEnseignant_<?= $enseignant->matricule ?>" class="btn btn-danger">
                                    <img width="20" src="../bootstrap/icons/trash.svg" alt="delete button" title="delete button">
                                </a>
                            <?php endif ?>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="bg-dark totalEnseignant">
                            <h4 class="h3 text-center">Total : <?= count($enseignants) == 1 ? count($enseignants) . ' Enseignant' : count($enseignants) . ' Enseignants' ?> </h4>
                        </td>
                        <td class="text-end col-3" colspan="5">
                            <a href="?action=ajoutEnseignant" class="btn btn-primary col-3 w-25">
                                <img width="20" src="../bootstrap/icons/plus-circle.svg" alt="add button" title="add button">
                                Ajouter
                            </a>

                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php endif ?>
    <?php if (isset($message)) : ?>
        <div class="alert alert-warning text-center h3 my-4"><?= $message ?></div>
    <?php endif ?>
</div>
<div class="container mt-5">
    <div class="row text-center">
        <hr>
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>

    </div>
</div>