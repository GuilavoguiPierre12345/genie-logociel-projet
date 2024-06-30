<div class="container">
    <!-- les choix des critères pour la modification des notes -->
    <form action="" method="POST" class="row mt-3">
        <div class="col-sm-4 mb-2">
            <select name="matiere" class="text-center form-control input-lg <?= isset($erreur['matiere']) ? 'is-invalid' : '' ?>">
                <?php if (isset($liste_des_matieres)) : foreach ($liste_des_matieres as $matiere) : ?>
                        <option value=" <?= $matiere->libellematiere ?> "> <?= $matiere->libellematiere ?></option>
                <?php endforeach;
                endif ?>
            </select>
            <div class="invalid-feedback"><?= isset($erreur['matiere']) ? $erreur['matiere'] : null ?></div>
        </div>
        <div class="col-sm-4 mb-2">
            <select name="semestre" class="text-center form-control input-lg <?= isset($erreur['semestre']) ? 'is-invalid' : '' ?>">
                <?php for ($i = 1; $i < 9; $i++) : ?>
                    <option value="<?= $i ?>"><?= ' Semestre '. $i ?></option>
                <?php endfor ?>
            </select>
            <div class="invalid-feedback"><?= isset($erreur['semestre']) ? $erreur['semestre'] : null ?></div>
        </div>
        <div class="col-sm-4 mb-2">
            <input type="number" name="promotion" min="15" value="<?= isset($promotion) ? $promotion : '' ?>" placeholder="Exemple : 15" class="form-control <?= isset($erreur['promotion']) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback"><?= isset($erreur['promotion']) ? $erreur['promotion'] : null ?></div>
        </div>
        <div class="col-2"><input type="submit" value="Cliquer pour valider" name="choix_valide" class="btn btn-outline-info"></div>
    </form>
</div>