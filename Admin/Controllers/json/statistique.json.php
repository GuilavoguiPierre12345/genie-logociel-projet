<?php
header("Access-Control-Allow-Origin: *"); // Lever de restriction securitaire sur l'origine de la requete
header("Access-Control-Allow-Headers: *"); // Lever de restriction securitaire sur les entetes
header("Content-type: application/json"); // Modifier le type de flux de sortie en format JSON

require_once(dirname(__DIR__,2).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Enseignant.php');
require_once(dirname(__DIR__,2).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Matiere.php');
require_once(dirname(__DIR__,2).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Etudiant.php');

// les objets null
$etu = new Etudiant(null,null,null,null,null,null,null);
$ens = new Enseignant(null,null,null,null,null,null);
$mat = new Matiere(null,null,null);

$etudiant = $etu->listeEtudiant();
$enseignant = $ens->afficherEnseignant();
$matiere = $mat->afficherMatiere();

print json_encode([$enseignant,$matiere,$etudiant],JSON_PRETTY_PRINT);