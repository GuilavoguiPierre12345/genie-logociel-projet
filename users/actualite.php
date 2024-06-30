<!-- l'entête de page -->
<?php require_once('header.php') ?>
<!-- ---fin de l'entête de la page -->
<div class="container">
    <!-- le code de la navigation -->
    <?php require_once('navigation.php') ?>

    <!-- les sliders -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div id="carouselIndicator" class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div id="carouselInner" class="carousel-inner">
            <div class="carousel-item active">
                <img src="photosPub/54742797--ollection-des-portes-fermees-et-porte-ouverte-isole-sur-un-fond-blanc - Copie.jpg" class="d-block hauteur w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="h1">Bienvenue dans notre monde en ligne</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="photosPub/54742797--ollection-des-portes-fermees-et-porte-ouverte-isole-sur-un-fond-blanc.jpg" class="d-block hauteur w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="h1">Decouvrez ce que notre site a à vous offrir.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="photosPub/FB_IMG_16702575394446094.jpg" class="d-block hauteur w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="h1" Innovation technologique pour un avénir plus intéligent</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="photosPub/FB_IMG_16740633014305717.jpg" class="d-block hauteur w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="h1">Naviguez à travers notre site pour des experiences incroyables .</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- ------------------fin sliders --------------------------------- -->
    <!-- les actualités -->
    <div class="row text-center my-3">
        <h2 class="h1 ">Les Actualités</h2>
        <h5 class="h6">Restez informer sur tout nos évènements et actualités</h5>

    </div>
    <div class="row p-4" id="actualites">
        <!-- les contenus sont renseignés à partir de ajax -->

        <!-- l'insertion du modal avec un clic sur le bouton -->

    </div>
    <!-- ----------------------fin des actualités ------------------------- -->
</div>
<!-- le pied de page -->
<?php require_once('footer.php') ?>

<script>
    var url_base = "http://localhost/glg3/Admin/Controllers/json/";
    // var url_base = "http://192.168.43.100:8080/glg3/Admin/Controllers/json/";
    $(document).ready(() => {
        $.ajax({
            url: url_base + "actualite.json.php",
            type: "GET",
            data: null,
            success: (resultat) => {
                var actu = $('#actualites');
                actu.html("");

                var contenu = $('#details_pub');
                
                var i=0;
                contenu.html("");

                for (let index = 0; index < resultat.length; index++) { 
                    var div = "";
                    div += `
                    <div class="col-sm-3 shadow p-3 my-3 bg-body rounded border-info border-end border-start">
                        <div class="">
                            <img class=" w-100" width="250" height="250" src="photosPub/${ resultat[index].nomphoto }" alt="la photo de la pub n°${ resultat[index].idnews } ">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> ${ resultat[index].titre } </h5>
                            <p class="card-text"> ${ resultat[index].resumer }... </p>
                            <h6 class="h5">Date : ${ resultat[index].datedepub } </h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lireplus${ resultat[index].idnews }" data-bs-whatever="@mdo">Lire plus</button>
                        </div>
                    </div>
                    `;

                    var modal ="";
                    modal += `
                    <div class="modal fade" id="lireplus${ resultat[index].idnews }" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h1 class="modal-title fs-5 h3" id="exampleModalLabel">Contenu de la publication</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div id="details_pub" class="modal-body h4">
                                    ${ resultat[index].contenu }
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                    actu.append(div,modal);
                }
            }
        })
    });
</script>