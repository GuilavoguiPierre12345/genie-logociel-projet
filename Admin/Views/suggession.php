<div class="container" style="min-height: 70vh;">
    <!-- ajout d'un nouveau contact -->
    <div class="row ">
        <p class="text-center mt-3"><strong class="h1">LISTE DES SUGGESSION UTILISATEUR </strong></p>
        <?php if(isset($suggessions)) : foreach($suggessions as $suggession) : ?>
            <div class="col-sm-6">
                <div class="shadow-lg p-3 my-1 bg-body rounded">
                    <label class="h3"> <?= $suggession->identite ?></label>
                    <label class="h3 text-info"> (<?= $suggession->typemessage ?>)</label>
                    <form class="" action="" method="POST">
                        <input type="hidden" name="id" value="<?= $suggession->id ?>">
                        <input type="submit" name="supprimer" value="suppr" class="btn btn-lg btn-outline-danger">
                    </form>
                    <div class="h5 mt-3">
                        <span> <?= $suggession->message ?> </span>
                    </div>
                </div>
            </div>
        <?php endforeach; endif ?>
    </div>
</div>


<!-- le pied de page -->
<div class="container mt-5">
    <div class="row text-center">
        <hr>
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>

    </div>
</div>
