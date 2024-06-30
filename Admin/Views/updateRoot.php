
<!-- Modal  add new user-->
<div class="modal fade" id="addnewuser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">AJOUT NOUVEAU ADMINISTRATEUR</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe src="" width="0" height="0" name="root" frameborder="0"></iframe>
        <form action="" method="POST" target="<?= isset($succes)?'root':'__'?>">
            <div class="mb-3">
                <label for="newloginadmin" class="form-label">LOGIN : </label>
                <input type="text" class="form-control input-group-lg <?= isset($erreur['newloginadmin'])?'is-invalide':''?>" name="newloginadmin" id="newloginadmin" placeholder="login de l'admin">
                <div class="invalid-feedback"> <?= isset($erreur['newloginadmin'])?$erreur['newloginadmin']:''?> </div>
            </div>
            <div class="mb-3">
                <label for="newpswadmin" class="form-label">MOT DE PASSE : </label>
                <input type="text" class="form-control <?= isset($erreur['newpswadmin'])?'is-invalide':''?> " name="newpswadmin" id="newpswadmin" placeholder="***********">
                <div class="invalid-feedback"> <?= isset($erreur['newpswadmin'])?$erreur['newpswadmin']:''?> </div>
            </div>
            <div class="mb-3">
                <label for="droit" class="form-label">DROIT : </label>
                <select class="form-control <?= isset($erreur['droit'])?'is-invalide':''?> " name="droit" id="droit">
                    <option value="1">droit 1</option>
                    <option value="2">droit 2</option>
                </select>
                <div class="invalid-feedback"> <?= isset($erreur['droit'])?$erreur['droit']:''?> </div>
            </div>
            <div class="mb-3">
                <input type="submit" name="newadmin" class="btn btn-outline-info btn-lg" value="Ajouter nouveau admin">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal update password and login-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">MODIFIER LE LOGIN ET MOT DE PASSE DU ROOT</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe src="" width="0" height="0" name="root" frameborder="0"></iframe>
        <form action="" method="POST" target="<?= isset($succes)?'root':'__'?>">
            <div class="mb-3">
                <label for="login" class="form-label">Nouveau login : </label>
                <input type="text" class="form-control input-group-lg <?= isset($erreur['login'])?'is-invalide':''?>" name="new_login" id="login" placeholder="nouveau login">
                <div class="invalid-feedback"> <?= isset($erreur['login'])?$erreur['login']:''?> </div>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Nouveau mot de pass : </label>
                <input type="text" class="form-control <?= isset($erreur['mdp'])?'is-invalide':''?> " name="new_password" id="new_pwd" placeholder="***********">
                <div class="invalid-feedback"> <?= isset($erreur['mdp'])?$erreur['mdp']:''?> </div>
            </div>
            <div class="mb-3">
                <input type="submit" name="updateroot" class="btn btn-outline-info btn-lg" value="Modifier ✔✔">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal update indicator-->
<div class="modal fade" id="indicator" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">MODIFIER LES INDICATEURS DE MOT DE PASSE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe src="" width="0" height="0" name="root" frameborder="0"></iframe>
        <form action="" method="POST" target="<?= isset($succes)?'root':'__'?>">
            <div class="mb-3">
                <label for="indicateur1" class="form-label">Indicateur 1 : Animal favoris</label>
                <input type="text" class="form-control input-group-lg <?= isset($erreur['indicateur1'])?'is-invalide':''?>" name="indicateur1" id="indicateur1" placeholder="Ex : Le chien">
                <div class="invalid-feedback"> <?= isset($erreur['indicateur1'])?$erreur['indicateur1']:''?> </div>
            </div>
            <div class="mb-3">
                <label for="indicateur2" class="form-label">Indicateur 2 : Sport favoris</label>
                <input type="text" class="form-control <?= isset($erreur['indicateur2'])?'is-invalide':''?> " name="indicateur2" id="indicateur2" placeholder="Ex : Danse">
                <div class="invalid-feedback"> <?= isset($erreur['indicateur2'])?$erreur['indicateur2']:''?> </div>
            </div>
            <div class="mb-3">
                <label for="indicateur3" class="form-label">Indicateur 3 : Joueur favoris</label>
                <input type="text" class="form-control <?= isset($erreur['indicateur3'])?'is-invalide':''?> " name="indicateur3" id="indicateur3" placeholder="Ex: Neymar JR">
                <div class="invalid-feedback"> <?= isset($erreur['indicateur3'])?$erreur['indicateur3']:''?> </div>
            </div>
            <div class="mb-3">
                <input type="submit" name="updateindicateurs" class="btn btn-outline-info btn-lg" value="Modifier ✔✔">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>