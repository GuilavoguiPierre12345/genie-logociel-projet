<div class="container">
    <div class="row  mx-auto">
        <p class="text-center mt-3"><strong class="h3">LISTE DES PARTENAIRES</strong></p>
        <br>
        <div class="table-responsive">
            <table class=" table table-bordered table-hover col-sm-10 mx-auto h5">
                <!-- l'entête du tableau -->
                <thead>
                    <tr class="">
                        <th>N°</th>
                        <th class="col-sm-4">Nom partenaire</th>
                        <th class="col-sm-5">Pays partenaire</th>
                        <th class="col-sm-2">Date de partenariat</th>
                        <th class="col-sm-1">Action</th>
                    </tr>
                </thead>
                <!-- le contenu du tableau -->
                <tbody>
                    <?php if (isset($listepartenaire)) : $i = 1;
                        foreach ($listepartenaire as $partenaire) : ?>
                            <tr class="">
                                <td> <?= $i ?> </td>
                                <td> <?= $partenaire->nompartenaire ?> </td>
                                <td> <?= $partenaire->payspartenaire ?> </td>
                                <td> <?= $partenaire->datedepartenariat ?> </td>
                                <td class="">
                                <?php if($d===1) : ?>
                                    <form action="" method="post" class="mx-auto">
                                        <input type="hidden" name="cle" value="<?= $partenaire->idpartenaire ?>">
                                        <input type="submit" name="suppr" value="Suppr" class="btn btn-outline-danger">
                                    </form>
                                <?php endif ?>
                                </td>

                            </tr>
                    <?php $i++;
                        endforeach;
                    endif ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- le pied de page -->
<div class="container mt-5">
    <div class="row text-center">
        <hr>
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>

    </div>
</div>