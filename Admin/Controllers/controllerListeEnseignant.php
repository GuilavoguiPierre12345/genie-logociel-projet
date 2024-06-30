<?php    
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Enseignant.php');
    $enseignant = new Enseignant(null,null,null,null,null,null);
    $enseignants = $enseignant->afficherEnseignant();
    if(isset($_POST['recherche']))
    {
        $recherche = checkinput($_POST['recherche']);
        $enseignants = $enseignant->afficherEnseignant($recherche);
    }
    
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'listeEnseignant.php');
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Matiere.php');
    $matiere = new Matiere(null,null,null);
    $matieres = $matiere->afficherMatiere();


