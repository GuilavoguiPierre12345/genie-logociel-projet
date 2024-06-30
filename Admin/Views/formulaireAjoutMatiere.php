<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewssubject" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->
<div class="modal fade" id="addnewssubject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nouvelle matiere</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <iframe src="" width="0" height="0" name="ajoutmat" frameborder="0"></iframe>
        <form action="" method="POST" target="ajoutmat_">
          
          <div class="mb-3">
            <label for="code_mat" class="col-form-label">Code de la matiere:</label>
            <input type="text" name="codemat" class="form-control <?= isset($erreurs['codemat']) ? 'is-invalid' : '' ?>" id="code_mat" placeholder="Ex :JA001">
            <div class="invalid-feedback"> <?= $erreurs['codemat'] ?> </div>
          </div>

          <div class="mb-3">
            <label for="code_mat" class="col-form-label">Nom de la matiere:</label>
            <input type="text" name="libellemat" class="form-control <?= isset($erreurs['libellemat']) ? 'is-invalid' : '' ?> " id="code_mat" placeholder="Ex :PHP">
            <div class="invalid-feedback"><?= $erreurs['libellemat'] ?></div>
          </div>

          <div class="mb-3">
            <label for="code_mat" class="col-form-label">Semestre correspondante:</label>
            <input type="text" name="semestremat" class="form-control <?= isset($erreurs['semestremat']) ? 'is-invalid' : '' ?> " id="code_mat" placeholder="Ex :Semestre 6">
            <div class="invalid-feedback"> <?= $erreurs['semestremat'] ?> </div>
          </div>

          <div class="mb-3 col-5">
            <input type="submit" value="Valider" class="btn btn-primary btn-lg w-100">
          </div>
        </form>

      </div>
    </div>
    
  </div>
</div>