<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="CSS/style_admin.css">

</head>

<body style="background-image: url(img/bg1.jpg);">
    <div class="container mt-3">
        <h1 class="text-center text-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code" viewBox="0 0 16 16">
                <path d="M5.854 4.854a.5.5 0 1 0-.708-.708l-3.5 3.5a.5.5 0 0 0 0 .708l3.5 3.5a.5.5 0 0 0 .708-.708L2.707 8l3.147-3.146zm4.292 0a.5.5 0 0 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708-.708L13.293 8l-3.147-3.146z" />
            </svg>
            GENIE INFORMATIQUE
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
                <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z" />
            </svg>
        </h1>
        <div class="container ">
            <div class="row g-3  d-flex justify-content-center align-items-center">
                <div id="connexion" class="col-sm-6 col-sm-offset-3 shadow-lg p-5 m-5 bg-body-tertiary rounded">
                    <form action="" method="POST" class="form">
                        <div class="mb-3 py-2">
                            <input type="text" name="login" value="<?= isset($login) ? $login : null ?>" id="login" class="<?= isset($erreur['login']) ? 'is-invalid' : '' ?> form-control shadow-lg p-3 my-3 bg-body-tertiary rounded placeholder-wave" placeholder="votre login">
                            <div class="invalid-feedback fs-4"> <?= isset($erreur['login']) ? $erreur['login'] : null ?> </div>
                        </div>

                        <div class="mb-3 py-2">
                            <input type="password" name="password" value="<?= isset($password) ? $password : null ?>" id="mdp" class="<?= isset($erreur['mdp']) ? 'is-invalid' : '' ?> form-control shadow-lg p-3 my-3 bg-body-tertiary rounded placeholder-wave" placeholder="**********">
                            <div class="invalid-feedback fs-4"> <?= isset($erreur['mdp']) ? $erreur['mdp'] : null ?> </div>
                        </div>
                        <div class="mb-3 py-2">
                            <button type="submit" name="connexion" class="mb-3 btn btn-outline-info btn-lg ">Connexion</button>
                            <!-- mot de passe oublié -->
                            <a href="#" class="mb-3 btn btn-outline-warning btn-lg" data-bs-toggle="modal" data-bs-target="#motdepasse">
                                Mot de passe ou login oublié ?
                            </a>
                            <!-- /fin -->
                        </div>
                    </form>
                    <?php if(isset($errorlogin)) : ?>
                        <div class="alert alert-danger text-center h4"><?= $errorlogin ?></div>
                    <?php endif ?>

                    <?php if(isset($errorind)) : ?>
                        <div class="alert alert-danger text-center h4"><?= $errorind ?></div>
                    <?php endif ?>
                    
                </div>
                <!-- indicateur -->

            </div>
        </div>

    </div>
    <div class="container">
        <h2 class="h2 mt-5 text-light text-center alert alert-success text-bg-dark">Cette version du site est une version d'essais donc, nous somme désolé pour des éventuels cas d'erreurs !</h2>
        <h4 class="text-center alert alert-success text-bg-dark">Taux d'évolution : 70% </h4>
    </div>

    <!-- Modal update indicator-->
    <div class="modal fade" id="motdepasse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">CONNEXION AVEC LES INDICATEURS</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="" width="0" height="0" name="root" frameborder="0"></iframe>
                    <form action="" method="POST" target="<?= isset($succes) ? 'root' : '__' ?>">
                        <div class="mb-3">
                            <label for="indicateur1" class="form-label">Animal favoris : </label>
                            <input type="text" class="form-control input-group-lg <?= isset($erreur['indicateur1']) ? 'is-invalide' : '' ?>" name="indicateur1" id="indicateur1" placeholder="Ex : Le chien">
                            <div class="invalid-feedback"> <?= isset($erreur['indicateur1']) ? $erreur['indicateur1'] : '' ?> </div>
                        </div>
                        <div class="mb-3">
                            <label for="indicateur2" class="form-label">Sport favoris : </label>
                            <input type="text" class="form-control <?= isset($erreur['indicateur2']) ? 'is-invalide' : '' ?> " name="indicateur2" id="indicateur2" placeholder="Ex : Danse">
                            <div class="invalid-feedback"> <?= isset($erreur['indicateur2']) ? $erreur['indicateur2'] : '' ?> </div>
                        </div>
                        <div class="mb-3">
                            <label for="indicateur3" class="form-label">Joueur favoris : </label>
                            <input type="text" class="form-control <?= isset($erreur['indicateur3']) ? 'is-invalide' : '' ?> " name="indicateur3" id="indicateur3" placeholder="Ex: Neymar JR">
                            <div class="invalid-feedback"> <?= isset($erreur['indicateur3']) ? $erreur['indicateur3'] : '' ?> </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="updateindicateurs" class="btn btn-outline-info btn-lg" value="Connexion">
                        </div>
                        <span class="text-info text-center h5">NB:une fois la connexion valide, veuillez changé votre login et mot de passe</span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>