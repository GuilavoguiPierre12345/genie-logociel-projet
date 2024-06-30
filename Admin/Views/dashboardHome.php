<?php if (isset($_SESSION['login']) && isset($_SESSION['id'])) : $d = $_SESSION['droit'] ?>

    <?php
    require_once(__DIR__ . DIRECTORY_SEPARATOR . 'updateRoot.php');

    require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Historique.php');
    $historiques = affichehistorique();
    require_once(__DIR__ . DIRECTORY_SEPARATOR . 'logHistorique.php');


    require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . 'updateroot.php');
    ?>
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-6 offset-sm-1 text-center <?= isset($success) ? 'alert alert-danger' : '' ?> ">
                <?= isset($success) ? $erreur : '' ?>
                <?= isset($updatesuccess) ? $updatesuccess : '' ?>
            </div>
            <div class="col-sm-6 offset-sm-1 text-center <?= isset($valide) ? 'alert alert-danger' : '' ?> ">
                <?= isset($valide) ? $error : '' ?>
                <?= isset($updatevalide) ? $updatevalide : '' ?>
            </div>
            <div class="col-sm-6 offset-sm-1 text-center <?= isset($isValid) ? 'alert alert-danger' : '' ?> ">
                <?= isset($messagesucces) ? $messagesucces : '' ?>
                <?= isset($erreurnewadmin) ? $erreurnewadmin : '' ?>
            </div>

            <div class="col-sm-5 ">
                <a href="Views/elements/chartjs/char.html" class="btn btn-info btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                        <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z" />
                    </svg>
                    
                </a>
                <!-- ce bouton est fait pour lancer une fénêtre modal, il sert à repertorier l'historique des activités -->
                <?php if ($d === 1) : ?>
                    <span class="btn btn-outline-success" title="historique" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                        </svg>
                    </span>
                <?php endif ?>
                <span class="btn btn-outline-info dropdown" type="button">
                    <!-- spinner -->
                    <div class=" spinner-grow text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg>
                    </span>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                </svg>
                                Modifier le root
                            </a>
                        </li>
                        <!-- indicateur de mot de passe -->
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#indicator">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                                Indicateur psw
                            </a>
                        </li>
                        <!-- /fin -->

                        <?php if ($d === 1) : ?>
                            <!-- ajout nouveau user -->
                            <li class="">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addnewuser">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill-add mx-3" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                                    </svg>
                                    Add news user
                                </a>
                            </li>
                            <!-- /fin -->
                        <?php endif ?>
                    </ul>

                </span>

                <!-- message à afficher une fois qu'on clique sur l'icon Admin -->
                <a href="?action=deconnecter">
                    <span class="btn btn-outline-danger" title="Se déconnecter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                    </span>
                </a>

            </div>

        </div>

        <div class="row row-cols-sm-2 p-4 gy-2 mb-2">
            <div class="col">
                <!-- card -->
                <div class="card p-2 shadow-lg m-4 bg-body-tertiary rounded">
                    <br><br>
                    <div class="card-body">
                        <p class="card-text h3"><?= $nombre_etudiant ?> <?= $nombre_etudiant == 1 ? 'Etudiant' : 'Etudiants' ?> enregistré dans la base de donnée
                        </p>
                        <i class="h5">toutes promotions confondues</i>
                    </div>
                    <br><br>
                </div>
            </div>

            <div class="col">
                <!-- card -->
                <div class="card p-2 shadow-lg m-4 bg-body-tertiary rounded">
                    <br><br>
                    <div class="card-body">
                        <p class="card-text h3"> Filles : <?= $nombre_filles ?> </p>
                        <p class="card-text h3"> Garçon : <?= $nombre_garcons ?> </p>
                        <i class="h5">toutes promotions confondues</i>
                    </div>
                    <br><br>
                </div>
            </div>

            <div class="col">
                <!-- card -->
                <div class="card p-2 shadow-lg m-4 bg-body-tertiary rounded">
                    <br><br>
                    <div class="card-body">
                        <p class="card-text h3"> <?= $nombre_matiere ?> <?= $nombre_matiere == 1 ? 'Matiere' : 'Matieres' ?> enregistrée d'abord</p>
                    </div>
                    <br><br>
                </div>
            </div>
            <div class="col">
                <!-- card -->
                <div class="card p-2 shadow-lg m-4 bg-body-tertiary rounded">
                    <br><br>
                    <div class="card-body">
                        <p class="card-text h3"> <?= $nombre_enseignant ?> <?= $nombre_enseignant == 1 ? 'Professeur' : 'Professeurs' ?> enregistré dans la base</p>
                    </div>
                    <br><br>
                </div>
            </div>


        </div>

        <hr>
        <div class="h6">&copy; 2022-2023 Gestion Département, Développé par le G2/groupe3</div>
    </div>

<?php else :
    header('Location:../index.php');
    exit;
endif ?>