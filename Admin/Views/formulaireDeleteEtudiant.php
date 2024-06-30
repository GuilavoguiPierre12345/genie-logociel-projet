<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewssubject" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->

<div class="modal fade" id="deletesubject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Nouvelle matiere</h1> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="col-form-label form-control h2 text-center alert alert-danger">Voulez-vous supprimer cet etudiant ??</label>
                        <input type="hidden" name="etudiant_matricule" value="<?= $etudiant->matricule ?>">
                        <input type="hidden" name="session_supprimer" value="">
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" value="Supprimer" class="btn btn-danger btn-lg col-6">
                        <!-- <input type="reset" value="Annuler" class="btn btn-info btn-lg col-4"> -->
                    </div>
                </form>
                <?php if (isset($message)) : ?>
                    <div class="alert alert-warning text-center h3 my-4"><?= $message ?></div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>