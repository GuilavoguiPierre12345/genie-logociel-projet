<div class="container-fluid">
    <h1 class="text-center my-4 text-decoration-underline"> Liste des Etudiants <?= $label ?? '' ?></h1>

    <div class="row">
        <div class="mb-4 col-sm-4">
            <form action="" class="row" method="POST">
                <div class="form-group input-group-lg my-2 col-sm-8">
                    <input type="text" value="<?= isset($recherche) ? $recherche : null ?>" class="form-control" name="recherche" placeholder="Rechercher en fonction du matricule">
                </div>
                <button type="submit" class="btn btn-primary btn-md col-sm-2">
                    <img width="30" src="../bootstrap/icons/search.svg" alt="recherche" title="recherche">
                </button>
            </form>
        </div>
        <div class="col-sm-4">
            <a target="_blank" href="../Admin/Controllers/etats/listeEtudiant.php?promotion=<?= isset($promot) ? $promot : null ?>" type="button" class="btn btn-primary btn-lg mb-2">
                <img width="20" src="../bootstrap/icons/server.svg" alt="imprimer" title="imprimer">Imprimer
            </a>
        </div>

        <div class=" col-sm-4">

            <form action="" class="form row promotion" method="POST">
                <div class="col-sm-4 mb-2">
                    <select name="promot" class="form-control">
                        <?php foreach ($promotions as $promotion) : ?>
                            <option <?php if ($promotion->promotion == 15 && !isset($promot)) echo 'selected';
                                    elseif (isset($promot) && ($promot == $promotion->promotion)) echo 'selected' ?> value="<?= $promotion->promotion; ?>">Promotion-<?= $promotion->promotion; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="col-sm-4 mb-2">
                    <select name="annee" class="form-control">
                        <?php foreach ($sessions as $s) : ?>
                            <option <?php if ($s->annee == '2022-2023' && !isset($annee)) echo 'selected';
                                    elseif (isset($annee) && ($annee == $s->annee)) echo 'selected' ?> value="<?= $s->annee; ?>">Session: <?= $s->annee; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- <script src="../../resources/helper.js"></script> -->
                <input type="submit" value="Afficher" class="btn btn-primary w-25 col-sm-2 mb-2" />
            </form>
        </div>

    </div>
    <?php if (count($etudiants) === 0 && isset($recherche)) : ?>
        <div class="alert alert-info text-center h2 my-5">AUCUNE REPONSE DEFINIE POUR VOTRE RECHERCHE !</div>
    <?php elseif (count($etudiants) === 0) : ?>
        <div class="alert alert-info text-center h2 my-5">LA LISTE EST VIDE, CLIQUER SUR LE BOUTON CI-DESSOUS POUR AJOUTER !!</div>
        <a href="?action=ajoutEtudiant" class="btn btn-primary col-3 w-25">
            <img width="20" src="../bootstrap/icons/plus-circle.svg" alt="add button" title="add button">
            Ajouter
        </a>
    <?php else : ?>


        <div class="table-responsive">
            <table class="table table-bordered  table-hover">
                <thead>
                    <tr class="text-center table-primary h5">
                        <th class=" col-0">N°</th>
                        <th class="col-1">Matricule</th>
                        <th class="col-2">Nom</th>
                        <th class="col-2">Prénom</th>
                        <th class="">Genre</th>
                        <th class="">Niveau</th>
                        <th class="">Promotion</th>
                        <th class="col-1">Adresse</th>
                        <th class="col-1">Telephone</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody> <?php $i = 1 ?>
                    <?php foreach ($etudiants as $etudiant) : ?>
                        <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td class="text-center"><?= $etudiant->matricule ?></td>
                            <td class=""><?= $etudiant->nom ?></td>
                            <td class=""><?= $etudiant->prenom ?></td>
                            <td class="text-center"><?= $etudiant->genre ?></td>
                            <td class="text-center">L- <?= $etudiant->niveau ?></td>
                            <td class="text-center">P-<?= $etudiant->promotion ?></td>
                            <td class=""><?= $etudiant->adresse ?></td>
                            <td class="text-center"><?= $etudiant->telephone ?></td>
                            <td>
                                <?php if ($d === 1) : ?>
                                    <a href="?action=updateEtudiant_<?= $etudiant->matricule ?>" class="btn btn-info">
                                        <img width="20" src="../bootstrap/icons/pencil.svg" alt="update button" title="update button">
                                    </a>
                                    <a href="?action=deleteEtudiant_<?= $etudiant->matricule ?>_<?= $etudiant->annee ?>" class="btn btn-danger">
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
                        <td colspan="2" class="bg-dark totalEtudiant">
                            <h4 class="h3 text-center">Total : <?= count($etudiants) == 1 ? count($etudiants) . ' Etudiant' : count($etudiants) . ' Etudiants' ?> </h4>
                        </td>
                        <td class="text-end col-3" colspan="8">
                            <a href="?action=ajoutEtudiant" class="btn btn-primary btn-lg col-3 w-25">
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
        <hr size="25">
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>

    </div>
</div>