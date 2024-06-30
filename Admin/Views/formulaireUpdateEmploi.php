<div class="container mb-2">
    <div class="text-center h3">MISE A JOUR  EMPLOI DU TEMPS LICENCE :<?= isset($licence)? $licence:'' ?></div>
    <div class="row">
        <?php if(isset($message_success)) : ?>
            <span class="alert alert-success text-center h2"><?= $message_success ?></span>
        <?php elseif(isset($message_erreur)) : ?>
            <span class="alert alert-danger text-center h2"><?= $message_erreur ?></span>
        <?php endif; ?>
        
        <form action="" method="POST">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <th class="col-1">JOURS</th>
                        <th class="col-1">HORAIRE</th>
                        <th class="col-2">MATIERE</th>
                        <th class="col-2">PROFESSEUR</th>
                    </thead>
                    <tbody>
                        
                        <?php if(isset($emploi_licence)) : for($i=0;$i<count($emploi_licence);$i++) : ?>
                            <tr>
                                <td class="text-center h5"><input name="jours[]" readonly type="text" value="<?= $emploi_licence[$i]->jour ?>" class="form-control"></td>
                                <td class="text-center h5"><input name="heures[]" type="text" value="<?= $emploi_licence[$i]->heure ?>" class="form-control"></td>
                                <td class="text-center h5">
                                    <select name="matieres[]" id="" class="form-control text-center">
                                            <option value="vide"></option>
                                        <?php if(isset($liste_matiere)) : foreach ($liste_matiere as $matiere) : ?>
                                            
                                            <option <?= $emploi_licence[$i]->matiere === $matiere->libellematiere ? 'selected' : ''  ?> value="<?= $matiere->libellematiere ?>" > <?= $matiere->libellematiere ?> </option>
                                        <?php endforeach; endif ?>
                                    </select>
                                </td>
                                <td class="text-center h5">
                                    <select name="enseignants[]" id="" class="form-control text-center">
                                                <option value="empty"></option>
                                            <?php if(isset($liste_enseignant)) : foreach ($liste_enseignant as $enseignant) : ?>
                                                
                                                <option <?=$emploi_licence[$i]->enseignant === $enseignant->nom.' '.$enseignant->prenom ? 'selected' :'' ?> value="<?= $enseignant->nom . ' ' . $enseignant->prenom ?>"> <?= $enseignant->nom . ' ' . $enseignant->prenom . ' (' . $enseignant->matieres . ')' ?></option>
                                        <?php endforeach; endif ?>
                                    </select>
                                </td>
                                <input type="hidden" name="licence[]" value="<?= isset($licence)? $licence:'' ?>">
                                <input type="hidden" name="identifiant[]" value="<?= $emploi_licence[$i]->identifiant ?>">
                            </tr>
                        <?php endfor; endif ?>
                    </tbody>
                </table>
            </div>
            <input class="btn btn-info btn-lg w-100" type="submit" value="Cliquer ici pour valider les modifications de votre emploi">
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