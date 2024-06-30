<div class="container">
    <h1 class="text-center my-4 text-decoration-underline"> Liste des matieres du département </h1>

    <div class="mb-4">
        <form action="" class="form row" method="POST">
            <div class="form-group input-group-lg my-2 col-md-10">
                <input type="text" value="<?= isset($recherche) ? $recherche : null?>" class="form-control" name="recherche" placeholder="Rechercher par nom de la matiere ou le numéro d'une semestre">
            </div>
            <button type="submit" class="btn btn-primary btn-md col-md-2">
                <img width="40" src="../bootstrap/icons/search.svg" alt="recherche" title="recherche">
            </button>
        </form>
    </div>
    <?php if(count($matieres) === 0 && isset($recherche)) : ?>
        <div class="alert alert-info text-center h2 my-5">AUCUNE REPONSE DEFINIE POUR VOTRE RECHERCHE !</div>
    <?php elseif(count($matieres) === 0) : ?>
        <div class="alert alert-info text-center h2 my-5">LA LISTE EST VIDE, CLIQUER SUR LE BOUTON CI-DESSOUS POUR AJOUTER !!</div>
        <a href="?action=listeMatiere" class="btn btn-primary col-3 w-25" data-bs-toggle="modal" data-bs-target="#addnewssubject" data-bs-whatever="@getbootstrap">
            <img width="20" src="../bootstrap/icons/plus-circle.svg" alt="add button" title="add button">
            Ajouter
        </a>
    <?php else : ?>
        <div class="row">
            <a target="_blank" href="../Admin/Controllers/etats/listeMatieres.php" class="btn btn-info btn-lg btn-info w-auto my-3">Imprimer la liste</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered  table-hover">
                <thead>
                    <tr class="text-center table-primary h5">
                        <th class="col-1">N°</th>
                        <!-- <th class="col-2">Code Matiere</th> -->
                        <th class="col-2">Nom Matiere</th>
                        <th class="col-1">Semestre</th>
                        <th class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody><?php $i=1?>
                    <?php foreach ($matieres as $matiere) : ?>
                        <tr>
                            <td class="text-center"><?= $i?></td>
                            <!-- <td class="text-center">#<?= $matiere->idmatiere ?></td> -->
                            <td><?= $matiere->libellematiere ?></td>
                            <td class="text-center">Semestre-<?= $matiere->semestre ?></td>
                            <td class="d-flex justify-content-center">
                            <?php if($d===1) : ?> 
                                <a href="?action=deleteMatiere_<?= $matiere->idmatiere ?>" class="btn btn-danger">
                                    <img width="20" src="../bootstrap/icons/trash.svg" alt="delete button" title="delete button">
                                </a>
                            <?php endif ?>
                            </td>
                        </tr>
                    <?php $i++; endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="bg-dark">
                            <h4 class="text-center h4 totalEtudiant">Total : <?= count($matieres) ?> </h4>
                        </td>
                        <td class="text-end col-sm-3" colspan="3">
                            <button type="button" class="btn btn-primary btn-lg col-3" data-bs-toggle="modal" data-bs-target="#addnewssubject" data-bs-whatever="@getbootstrap">
                                <img width="20" src="../bootstrap/icons/plus-circle.svg" alt="add button" title="add button">
                            </button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php endif ?>
    <?php if (isset($message)) : ?>
        <div class="alert alert-warning text-center h3 my-3"><?= $message ?></div>
    <?php endif ?>
</div>
<!-- le pied de page -->
<div class="container mt-5">
    <div class="row text-center">
        <hr>
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>

    </div>
</div>