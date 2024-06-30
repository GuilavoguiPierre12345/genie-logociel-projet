<div class="container">
    <div class="text-center h3">EMPLOI DU TEMPS LICENCE : <?= $licence ?> </div>
    <?php if(isset($emploi_licence)) :  ?>
        <?php if(count($emploi_licence) == 0) :  ?>
            <div class="alert alert-info h1">
                AUCUN EMPLOI N'EXISTE D'ABORD POUR LA LICENCE <?=$licence?> pour l'Elaborer, cliquer sur le bouton de 
                navigation puis sur "GESTION EMPLOI" ensuite sur "Elaborer emploi" et en fin choisir la licence <?=$licence?>
        </div>
        <?php else :?>
            <div class="row">
                <?php if (isset($message_success)) : ?>
                    <span class="alert alert-success text-center h2"><?= $message_success ?></span>
                <?php elseif (isset($message_erreur)) : ?>
                    <span class="alert alert-danger text-center h2"><?= $message_erreur ?></span>
                <?php endif; ?>
                <div class="form table-responsive">
                    <table class="table table-bordered  table-hover text-center mb-3">
                        <thead class="">
                            <th class="col-1 h2">JOURS</th>
                            <th class="col-1 h2">HORAIRES</th>
                            <th class="col-2 h2">MATIERES</th>
                            <th class="col-2 h2">PROFESSEURS</th>
                        </thead>
                        <tbody>
                            <?php for($i=0;$i<count($emploi_licence);$i++) : ?>
                                <tr>
                                    <td class="text-center <?= $i%4==0 ? 'table-info' : 'bg-dark'?>  h5"><?= $i%4==0 ? $emploi_licence[$i]->jour :null ?></td>
                                    <td class="text-center h5"><?= empty($emploi_licence[$i]->heure) ? '--' : $emploi_licence[$i]->heure ?></td>
                                    <td class="text-center h5"><?= $emploi_licence[$i]->matiere != 'vide' ? $emploi_licence[$i]->matiere : ' --' ?></td>
                                    <td class="text-center h5 fst-italic"><?= $emploi_licence[$i]->enseignant != 'empty' ? $emploi_licence[$i]->enseignant : ' --' ?></td>
                                </tr>
                            <?php endfor ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif ?>
    <?php  endif ?>
</div>
<!-- le pied de page -->
<div class="container mt-5">
    <div class="row text-center">
        <hr>
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>

    </div>
</div>