<?php

require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'generateSession.php');
$annee_universitaire = $sessionCourante->generateSession(); //la session universitaire en cours

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'selection.php');

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Etudiant.php');
$promotions = selection_1_cle('etudiant', 'promotion');

$etudiant = new Etudiant(null, null, null, null, null, null, null, null);

$recherche = null; $promot =15; 
if(isset($_POST['recherche'])){
    $recherche = checkinput($_POST['recherche']);
}

if(isset($_POST['promot']) && !isset($_POST['recherche'])){
    $promot = (int)checkinput($_POST['promot']);
}

if(isset($_POST['annee'])){
    $annee_universitaire = checkinput($_POST['annee']);
}

$etudiants = $etudiant->afficherEtudiants($promot,$annee_universitaire,$recherche);


$sessions = selection_1_cle('session', 'annee');
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'listeEtudiant.php');
// appelle de la vue pour permetre de lancer
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . 'controllerDeleteEtudiant.php');
