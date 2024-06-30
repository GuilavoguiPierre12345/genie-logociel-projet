<?php
header("Access-Control-Allow-Origin: *"); // Lever de restriction securitaire sur l'origine de la requete
header("Access-Control-Allow-Headers: *"); // Lever de restriction securitaire sur les entetes
header("Content-type: application/json"); // Modifier le type de flux de sortie en format JSON

require_once(dirname(__DIR__,2).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Note.php');
$note = new Note(null,null,null,null,null,null,null,null);

print json_encode($note ->fichenote(),JSON_PRETTY_PRINT);
