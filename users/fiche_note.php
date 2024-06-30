<?php require_once('header.php') ?>
<!-- ---fin de l'entête de la page -->
<div class="container">
    <!-- le code de la navigation -->
    <?php require_once('navigation.php') ?>

    <!-- les informations pour l'affichage de la fiche de note -->
    <form id="form" action="" method="" class="row my-3">
        <div class="col-sm-3">
            <label for="matiere" class="h5 form-label">Matiere</label>
            <select name="matiere" id="matiere" class="form-control my-1">
                <!-- le contenu est rempli avec le code javascript -->
            </select>
        </div>
        <div class="col-sm-3">
            <label for="semestre" class="h5 form-label">Semestre</label>
            <select name="semestre" id="semestre" class="form-control my-1">
                <option value="1">semestre1</option>
                <option value="2">semestre2</option>
                <option value="3">semestre3</option>
                <option value="4">semestre4</option>
                <option value="5">semestre5</option>
                <option value="6">semestre6</option>
                <option value="7">semestre7</option>
                <option value="8">semestre8</option>
            </select>
        </div>
        <div class="col-sm-3 my-1">
            <label for="promotion" class="h5 form-label">Promotion</label>
            <input type="number" min="10" placeholder="entrer une promotion" name="promotion" id="promotion" class="form-control">
        </div>
        <div class="col-sm-3 my-1">
            <label for="" class="h5 form-label">Cliquer 👇🏽👇🏽</label>
            <input type="submit" value="Afficher" name="choix_valide" id="" class="form-control btn btn-success">
        </div>
    </form>
</div>

<div class="container-fluid">
    <h1 class="text-center h1">FICHE DE NOTE</h1>
    <div class="row mt-3">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th colspan="5"></th>
                        <th class="text-center h5">0.25</th>
                        <th></th>
                        <th class="text-center h5">0.35</th>
                        <th></th>
                        <th class="text-center h5">0.4</th>
                        <th colspan="3"></th>
                    </tr>
                    <tr>
                        <th>N°</th>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Notes1</th>
                        <th>Notes1</th>
                        <th>Notes2</th>
                        <th>Notes2</th>
                        <th>EF</th>
                        <th>EF</th>
                        <th>Moy Gle</th>
                        <!-- <th>Note Lit*</th> -->
                        <th colspan="2">Observation</th>
                    </tr>
                </thead>
                <tbody id="fiche">
                    <!-- le contenu est remplit avec du javascript -->
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <!-- le formulaire de choix de la licence pour l'affichage de l'emploi du temps -->
    <h1 class="text-center h1 mt-4">EMPLOI DU TEMPS</h1>
    <form id="emploitemps" action="" method="post" class="row d-flex justify-content-center">

        <div class="col-sm-3 my-1">
            <label for="licence" class="h5 form-label">Promotion</label>
            <input type="number" min="1" max="4" placeholder="entrer une licence" name="licence" id="licence" class="form-control">
        </div>
        <div class="col-sm-3 my-1">
            <label for="" class="h5 form-label">Cliquer 👇🏽👇🏽</label>
            <input type="submit" value="Afficher" name="choix_valide" id="" class="form-control btn btn-success">
        </div>
    </form>
    <!-- la table d'affichage de l'emploi -->
    <div class="row mt-3">
        <div class="table-responsive">
            <table class="table table-bordered  table-hover text-center mb-3">
                <thead class="">
                    <th class="col-1 h2">JOURS</th>
                    <th class="col-1 h2">HORAIRES</th>
                    <th class="col-2 h2">MATIERES</th>
                    <th class="col-2 h2">PROFESSEURS</th>
                </thead>
                <tbody id="emploi">

                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .container-fluid {
        min-height: 55vh;
    }
</style>
<!-- le pied de page -->
<?php require_once('footer.php') ?>

<!-- liste des matières  -->
<script>
    var url_base = "http://localhost/glg3/Admin/Controllers/json/";
    // var url_base = "http://192.168.43.100:8080/glg3/Admin/Controllers/json/";
    $(document).ready(() => {
        $.ajax({
            url: url_base + "listematiere.json.php",
            type: "GET",
            data: null,
            success: (resultat) => {
                var select = $('#matiere');
                select.html("");
                for (let index = 0; index < resultat.length; index++) {
                    var option = " ";
                    option += `<option value="${resultat[index].libellematiere}">${resultat[index].libellematiere}</option>`
                    select.append(option);
                }
            }
        });

        var url_b = "http://localhost/glg3/Admin/Controllers/json/";
        // var url_b = "http://192.168.43.100:8080/glg3/Admin/Controllers/json/";

        $("#form").on("submit", function(e) {
            e.preventDefault();
            var $form = $(this);

            var semestre = parseInt($('#semestre').val());
            var matiere = $('#matiere').val();
            var promotion = parseInt($('#promotion').val());
            if (isNaN(promotion)) {
                alert('la promotion est obligatoire');
                $('#promotion').focus();
            } else if (promotion < 12) {
                alert('valeur de promotion invalide : (>=12)');
                $('#promotion').focus();
            }

            console.log(promotion, semestre, matiere.length);
            // la fiche de note en générale
            $.ajax({
                url: url_b + "fichenote.json.php",
                type: "GET",
                data: null,
                success: (res) => {
                    var tbody = $('#fiche');
                    tbody.html("");
                    var j = 1;
                    for (let i = 0; i < res.length; i++) {
                        if (res[i].semestre === semestre && res[i].promotion === promotion &&
                            res[i].matiere.trim() === matiere) {

                            var note = " ";
                            note += `
                            <tr>
                                <td>${j}</td>
                                <td>${res[i].matricule}</td>
                                <td>${res[i].nom}</td>
                                <td>${res[i].prenom}</td>

                                <td class="text-center h5">${res[i].note1}</td>
                                <td class="text-center h5">${(res[i].note1*0.25).toFixed(2)} </td>

                                <td class="text-center h5 ">${res[i].note2}</td>
                                <td class="text-center h5 ">${(res[i].note2*0.35).toFixed(2)}</td>

                                <td class="text-center h5 ">${res[i].note3}</td>
                                <td class="text-center h5 ">${(res[i].note3*0.4).toFixed(2)}</td>

                                <td class="text-center h5 ${moyenneGle_Obs(res[i].note1,res[i].note2,res[i].note3,'moy') === 0 ? 'bg-danger bg-opacity-25' : '' }">${moyenneGle_Obs(res[i].note1,res[i].note2,res[i].note3,'moy')} </td>

                                <td class="text-center h5 ${moyenneGle_Obs(res[i].note1,res[i].note2,res[i].note3,'obs') ==0 ? 'bg-danger bg-opacity-25': ''} ">${moyenneGle_Obs(res[i].note1,res[i].note2,res[i].note3,'obs')}</td>
                            </tr>
                            `;
                            tbody.append(note);
                            j++;
                        }
                    }
                }
            });
        });

        // affichage de l'emploi du temps
        var url_e = "http://localhost/glg3/Admin/Controllers/json/";
        // var url_e = "http://192.168.43.100:8080/glg3/Admin/Controllers/json/";

        $("#emploitemps").on("submit", function(e) {
            e.preventDefault();

            var licence = parseInt($('#licence').val());
            if (isNaN(licence)) {
                alert('veuillez choisir une licence');
                $('#licence').focus();
            }

            console.log(licence);
            // emploi du temps
            $.ajax({
                url: url_b + "emploi.json.php",
                type: "GET",
                data: null,
                success: (res) => {                    
                    var emploi = $('#emploi');
                    emploi.html("");
                    var temoin = true;
                    for (let i = 0; i < res.length; i++) {
                        if (res[i].licence === licence) {
                            
                            var temps = " ";
                            temps += `
                                <tr>
                                    <td class="text-center ${i % 4 == 0 ? 'table-info' : 'bg-dark'} h5"> ${i % 4 == 0 ? res[i].jour : null } </td>
                                    <td class="text-center h5"> ${(res[i].heure).length==0 ? '--' : res[i].heure} </td>
                                    <td class="text-center h5"> ${res[i].matiere !== 'vide' ? res[i].matiere : '--' } </td>
                                    <td class="text-center h5 fst-italic"> ${res[i].enseignant != 'empty' ? res[i].enseignant : '--'}</td>
                                </tr>
                            `;
                            emploi.append(temps);
                        }else
                            temoin = false;
                    }
                    if(!temoin && !isNaN(licence))
                        alert("Désolé pas d'emploi pour la licence "+licence);
                }
            });
        });

    });


    // la fonction pour calculer la moyenne
    function moyenneGle_Obs(note1, note2, note3, type) {
        var moy = parseFloat(((note1 + note2 + note3) / 3).toFixed(2));

        if (type == 'moy')
            // la moyenne Gle
            return moy;
        else if (type == 'obs') {
            // l'observation
            if (moy >= 8 && moy <= 10) {
                return 'TRES BIEN';
            } else if (moy >= 7 && moy <= 7.99) {
                return 'BIEN';
            } else if (moy >= 6 && moy <= 6.99) {
                return 'ASSEZ BIEN';
            } else
                return 'PASSABLE';
        }

    }
</script>