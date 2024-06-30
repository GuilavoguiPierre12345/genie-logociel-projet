<!-- l'entête de page -->
<?php require_once('header.php') ?>
<!-- ---fin de l'entête de la page -->

<div class="container ">
    <!-- le code de la navigation -->
    <?php require_once('navigation.php') ?>

    <div class="row mt-5">
        <div class="col-sm-4 text-center">
            <h2 class="text-center h2 my-4 text-info">Contacts Info</h2>
            <div class="">
                <ul id="listecontact" class="list-group">
                    <!-- remplissage avec javascript -->
                </ul>
            </div>
        </div>

        <div class="col-sm-8">
            <form action="messages.json.php" method="POST">
                <h2 class="text-center h2 my-4 text-info">Formulaire de Contact</h2>
                <div class="form-check form-check-inline input-group-lg">
                    <input class="form-check-input"  type="radio" name="typemessage" id="inlineRadio1" value="temoignages">
                    <label class="form-check-label h3" for="inlineRadio1 ">Témoignages</label>
                </div>
                <div class="form-check form-check-inline ">
                    <input class="form-check-input" type="radio" name="typemessage" id="inlineRadio2" value="messages">
                    <label class="form-check-label h3" for="inlineRadio2">Messages</label>
                </div>

                <div class="mb-3 ">
                    <label for="exampleFormControlInput1" class="form-label h4">Prenoms & Nom</label>
                    <input name="prenom_nom" type="text" class="form-control" id="exampleFormControlInput1" placeholder="guilavogui pierre foromo">
                </div>

                <div class="mb-3 ">
                    <label for="exampleFormControlTextarea1" class="form-labe h4">Message</label>
                    <textarea name="contenu_message" class="form-control textarea" id="exampleFormControlTextarea1" rows="6" placeholder="entrez votre message ici..."></textarea>
                </div>

                <div class="row ">
                    <div class="col-4">
                        <input name="envoyer" value="Envoyer" type="submit" class="btn btn-lg w-100 btn-success">
                    </div>
                    <div class="col-4 mx-2">
                        <input type="reset" value="Annuler" class="btn btn-lg w-100 btn-danger">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- le pied de page -->
<?php require_once('footer.php') ?>

<!-- le script pour l'envoi d'un témoignage ou d'un message -->
<script>
    var url_base = "http://localhost/glg3/Admin/Controllers/json/";
    // var url_base = "http://192.168.43.100:8080/glg3/Admin/Controllers/json/";
    $("form").on("submit", function(e) {
        e.preventDefault();
        var form = $(this);
        var data_ = form.serialize(); // récupérer en série toutes les données du formulaire dans la variable data_
        // console.log(data_);
        $.ajax({
            url: url_base + form.attr("action"),
            type: form.attr("method"),
            data: data_,
            success: function(resultat) {
                if (resultat[0] === false) {
                    alert(resultat[1]);
                } else {
                    if (resultat[0] === true)
                        alert(resultat[1]);
                }
            },
            error: function(error, b, c) {
                console.log(b, c);
            },
        })
    });

    // pour la liste des contacts
    var url_b = "http://localhost/glg3/Admin/Controllers/json/";
    // var url_b = "http://192.168.43.100:8080/glg3/Admin/Controllers/json/";
    $(document).ready(() => {
        $.ajax({
            url: url_b + "listecontact.json.php",
            type: "GET",
            data: null,
            success: (resultat) => {
                var liste = $('#listecontact');
                liste.html("");
                var i = 1;
                for (let index = resultat.length-1; index >=0; index--) {
                    if(i<=5){
                        var item = "";
                        item += ` <a href="tel:${resultat[index].contact}" class="list-group-item h5">${resultat[index].contact}</a>`;
                        liste.append(item);
                    }
                    i++;
                }
            }
        })
    });
</script>