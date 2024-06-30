<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button> -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 h3" id="exampleModalLabel">Historique des activités</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">User Login</th>
                            <th scope="col">Date heure de connexion</th>
                            <th scope="col">Activités</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; if(isset($historiques)) :  foreach($historiques as $historique) :?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?= $historique->login ?></td>
                            <td><?= $historique->dateheure ?></td>
                            <td><?= $historique->activite ?></td>
                        </tr>
                        <?php $i++; endforeach; endif ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="modal-footer bg-info">
                <h4 class="text-center h2 ">Cette partie est encore statique !</h4>
            </div> -->
        </div>
    </div>
</div>