<div class="container mb-2">
    <div class="text-center h3">ELABORER EMPLOI DU TEMPS LICENCE :<?= isset($licence) ? $licence :'' ?></div>
    <div class="row">
        <?php if(isset($message_success)) : ?>
            <span class="alert alert-success text-center h2"><?= $message_success ?></span>
        <?php elseif(isset($message_erreur)) : ?>
            <span class="alert alert-danger text-center h2"><?= $message_erreur ?></span>
        <?php endif; ?>
        
        <form action="" method="POST">
            <div class="form table-responsive">
                <table class="table table-border table-hover text-center">
                    <thead>
                        <th class="col-1">JOURS</th>
                        <th class="col-1">HORAIRE</th>
                        <th class="col-2">MATIERE</th>
                        <th class="col-2">PROFESSEUR</th>
                    </thead>
                    <tbody>
                        <?php $jour = ['LUNDI', 'MARDI', 'MERCREDI', 'JEUDI', 'VENDREDI', 'SAMEDI'];
                        for ($i = 1; $i < 7; $i++) : ?>

                            <?php for ($j = 1; $j <= 4; $j++) : ?>
                                <tr>
                                    <td><input type="text" name="jours[]" value="<?= $jour[$i-1] ?>" class="form-control text-center" readonly id=""> </td>
                                    <td><input type="text" name="heures[]" class="form-text form-control" id="" placeholder="ex:08h30-12h30"></td>
                                    <td>
                                        <select name="matieres[]" id="" class="form-control form-text text-center">
                                            <option value="vide"></option>
                                            <?php if(isset($liste_matiere)) foreach ($liste_matiere as $matiere) : ?>
                                                <option value="<?= $matiere->libellematiere ?>"><?= $matiere->libellematiere ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="enseignants[]" id="" class="form-control form-text text-center">
                                            <option value="empty"></option>
                                            <?php foreach ($liste_enseignant as $enseignant) : ?>
                                                <option value="<?= $enseignant->nom . ' ' . $enseignant->prenom ?>"> <?= $enseignant->nom . ' ' . $enseignant->prenom . ' (' . $enseignant->matieres . ')' ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="licence[]" value="<?= isset($licence)? $licence:'' ?>">
                                </tr>
                            <?php endfor ?>
                        <?php endfor ?>
                    </tbody>
                </table>
            </div>
            <input class="btn btn-success btn-lg w-100" type="submit" value="Cliquer ici pour valider votre emploi">
        </form>
    </div>
</div>
