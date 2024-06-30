<?php

require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'generateSession.php');
$annee_universitaire = $sessionCourante->generateSession(); //la session universitaire en cours

// aide pour le calcul de la moyenne Gle, la moyenne Lit et l'observation
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'helpCalculNote.php');


require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Note.php');
$note = new Note(null,null,null,null,null,null,null,null);

// la liste des matières 
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'selection.php');
$liste_des_matieres = selection_1_cle('matiere','libellematiere');

// controle des informations pour l'affichage de la fiche de note
if(isset($_POST['choix_valide'])){
    $valide = true;
    $matier = $_POST['matiere'];
    if(empty($matier)){
        $erreur['matiere'] = "choix obligatoire";
        $valide = false;
    }
    $semestre = $_POST['semestre'];
    if(empty($semestre)){
        $erreur['semestre'] = "choix obligatoire";
        $valide = false;
    }
    $promotion = $_POST['promotion'];
    if(empty($promotion)){
        $erreur['promotion'] = "choix obligatoire";
        $valide = false;
    }
    if($promotion<=14){
        $erreur['promotion']='numéro de promotion invalide (>=15)';
        $valide = false;
    }

    if($valide){
        // la liste des étudiants en fonction de la promotion et de l'année universitaire
        $fiche_note = $note ->afficherNote_min($matier,$semestre,$promotion,$annee_universitaire); 
    }
}
// les informations sur la fiche de note à afficher
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'demandeInfoFicheNote.php');

// la fiche de note 
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'formulaireAfficherNote.php');

