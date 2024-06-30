<div class="row ">
        <h1 class="text-center h1 entete-text shadow-lg p-3 mb-3 bg-body rounded">GENIE INFO</h1>
    </div>
    <!-- la navigation  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse h4" id="navbarNavAltMarkup">
                <div class="navbar-nav text-color row-cols-6 w-100">
                    <div class="text-center"><a class="lien nav-link" aria-current="page" href="index.php">Accueil</a></div>
                    <div class="text-center"><a class="lien nav-link" aria-current="page" href="services.php">Services</a></div>
                    <div class="text-center"><a class="lien nav-link" aria-current="page" href="actualite.php">Actualités</a></div>
                    <div class="text-center"><a class="lien nav-link" aria-current="page" href="about.php">A propos</a></div>
                    <div class="text-center"><a class="lien nav-link" aria-current="page" href="contacts.php">Contact</a></div>
                    <div class="text-center"><a class="lien nav-link" aria-current="page" href="fiche_note.php">Fiche de note & Emploi</a></div>
                </div>
            </div>
        </div>
    </nav>
    <!-- ///////////fin de la navigation  -->
    <script>
        // la selection de toutes les balises a
        var liens = document.querySelectorAll('.lien');
        
        liens.forEach(element => {
            element.addEventListener('click', ()=>{
                element.classList.add('cible');               
               console.log(element.getAttribute('href'));
            })
        });
    
    </script>