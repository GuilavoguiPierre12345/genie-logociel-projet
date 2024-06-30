<?php
//  header('Content-Type : application/json');

require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Partenaire.php');

$listepartenaire = afficherPartenaire();

if(!empty($_POST['suppr'])){
    $cle = checkinput($_POST['cle']) ;
    supprimerPartenaire($cle);
}
// le formulaire de la liste des évènements
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'listePartenaire.php');
