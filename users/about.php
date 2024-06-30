<!-- l'entête de page -->
<?php require_once('header.php') ?>
<!-- ---fin de l'entête de la page -->

<div class="container">
    <!-- le code de la navigation -->
    <?php require_once('navigation.php') ?>
    <div class="row mb-4">
        <h2 class="title text-center mt-4 h1 text-decoration-underline">Corps professoral</h2>
    </div>
    <div id="equipe" class="row text-center mx-4">
        <!-- mise à jour avec du json -->
    </div>
    <!-- la section historique et localisation -->
    <div class="row">
        <div class="col-sm-6 shadow p-3 my-3 bg-body rounded">
            <h2 class="text-center text-decoration-underline">Historique</h2>
            <p class="h4"> L’Institut Supérieur de Technologie de Mamou en sa tête Dr Hamidou BARRY a été créer le 25 Janvier 2004, officiellement inauguré par un arrêté du 25 Aout 2004, dans le cadre d’une politique de décentralisation des Institutions d’Enseignements Supérieurs(IES) en République de Guinée. La première promotion arrive à la rentrée 2008, avec un effectif de 106 étudiants. L’Institut forme à présent environ deux cent (200) étudiants par an. </p>
        </div>
        <div class="col-sm-6 shadow p-3 my-3 bg-body rounded">
            <h2 class="text-center text-decoration-underline">Situation géographique</h2>
            <div class="d-flex justify-content-center">
                <img src="images/localisation.jpg" width="250" height="250" class="" alt="la photo de la localisation du département">
            </div>
        </div>
    </div>

    <div class="row">
        <h2 class="card-title mb-4 h1 text-center">Latest news & events</h2>
        <div id="lastnews" class="row">
            <div class="col-sm-4 mx-auto shadow p-3 my-3 bg-body rounded" style="width: 18rem;">
                <h4 class="">Nom de la publication</h4>
                <div class="card-body">
                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus consequuntur iusto beatae enim odit distinctio rem, doloremque architecto quaerat asperiores? Officiis autem cupiditate mollitia ullam suscipit aut eveniet expedita quis.</p>
                    <a href="#" class="btn btn-outline-info">lire plus...</a>
                </div>
            </div>
            <div class="col-sm-4 mx-auto shadow p-3 my-3 bg-body rounded" style="width: 18rem;">
                <h4 class="">Nom de la publication</h4>
                <div class="card-body">
                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus consequuntur iusto beatae enim odit distinctio rem, doloremque architecto quaerat asperiores? Officiis autem cupiditate mollitia ullam suscipit aut eveniet expedita quis.</p>
                    <a href="#" class="btn btn-outline-info">lire plus...</a>
                </div>
            </div>
            <div class="col-sm-4 mx-auto shadow p-3 my-3 bg-body rounded" style="width: 18rem;">
                <h4 class="">Nom de la publication</h4>
                <div class="card-body">
                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus consequuntur iusto beatae enim odit distinctio rem, doloremque architecto quaerat asperiores? Officiis autem cupiditate mollitia ullam suscipit aut eveniet expedita quis.</p>
                    <a href="#" class="btn btn-outline-info">lire plus...</a>
                </div>
            </div>
            <div class="col-sm-4 mx-auto shadow p-3 my-3 bg-body rounded" style="width: 18rem;">
                <h4 class="">Nom de la publication</h4>
                <div class="card-body">
                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus consequuntur iusto beatae enim odit distinctio rem, doloremque architecto quaerat asperiores? Officiis autem cupiditate mollitia ullam suscipit aut eveniet expedita quis.</p>
                    <a href="#" class="btn btn-outline-info">lire plus...</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- le pied de page -->
<?php require_once('footer.php') ?>

<script>
    var url_base = "http://localhost/glg3/Admin/Controllers/json/";
    // var url_base = "http://192.168.43.100:8080/glg3/Admin/Controllers/json/";
    $(document).ready(() => {
        $.ajax({
            url: url_base + "professeurs.json.php",
            type: "GET",
            data: null,
            success: (resultat) => {
                var equipe = $('#equipe');
                equipe.html("");

                var i = 0;
                for (let index = 0; index < resultat.length; index++) {
                    var div = "";
                    div += `
                    <div class="card  shadow p-3 m-2 bg-body rounded" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="image non disponible">
                        <div class="card-body">
                            <h5 class="card-title"> ${resultat[index].nom.toUpperCase()} ${resultat[index].prenom.toUpperCase()} </h5>
                            <p class="card-text">
                                <h5><strong>Matiere(s)</strong> : ${resultat[index].matieres} </h5>
                                <h5><strong>Genre : </strong> ${resultat[index].genre} </h5>
                                <h5><strong>Telephone : </strong> ${resultat[index].telephone} </h5>
                            </p>
                        </div>
                    </div>
                    `;
                    equipe.append(div);
                }
            }
        })
    })
</script>

<!-- les derniers news -->
<script>
    var url_base = "http://localhost/glg3/Admin/Controllers/json/";
    // var url_base = "http://192.168.43.100:8080/glg3/Admin/Controllers/json/";
    $(document).ready(() => {
        $.ajax({
            url: url_base + "actualite.json.php",
            type: "GET",
            data: null,
            success: (resultat) => {
                var lastnews = $('#lastnews');
                lastnews.html("");

                var j = resultat.length - 1;
                for (let i = 0; i < resultat.length; i++) {
                    var news = "";
                    if (i < 4) {
                        news += `
                        <div style=" width:18rem;" class="col-sm-3 shadow p-3 m-3 bg-body rounded border-info border-end border-start">
                            <div class="">
                                <img class=" w-100" width="250" height="200" src="photosPub/${ resultat[j].nomphoto }" alt="la photo de la pub n°${ resultat[j].idnews } ">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"> ${ resultat[j].titre } </h5>
                                <p class="card-text"> ${ resultat[j].resumer }... </p>
                                <h6 class="h5">Date : ${ resultat[j].datedepub } </h6>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lireplus${ resultat[j].idnews }" data-bs-whatever="@mdo">Lire plus</button>
                            </div>
                        </div>
                        `;

                        var modal = "";
                        modal += `
                        <div class="modal fade" id="lireplus${ resultat[j].idnews }" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h1 class="modal-title fs-5 h3" id="exampleModalLabel">Contenu de la publication</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div id="details_pub" class="modal-body h4">
                                        ${ resultat[j].contenu }
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                        lastnews.append(news,modal);
                        j--;
                    }
                }
            }
        })
    })
</script>