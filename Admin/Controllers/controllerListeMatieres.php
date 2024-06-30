<?php
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerAjoutMatiere.php');
    
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Matiere.php');
    $mat = new Matiere(null,null,null);
    $matieres = $mat->afficherMatiere();
    if(isset($_POST['recherche']))
    {
        $recherche = checkinput($_POST['recherche']);
        $matieres = $mat->afficherMatiere($recherche);
    }
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'listeMatieres.php');
