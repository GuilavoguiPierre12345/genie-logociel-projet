<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Evenement.php');

$liste_evenement = afficherEvenement();

if(!empty($_POST['suppr'])){
    $cle = checkinput($_POST['cle']) ;
    supprimerEvenement($cle);
}
// le formulaire de la liste des évènements
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'listeEvenement.php');
