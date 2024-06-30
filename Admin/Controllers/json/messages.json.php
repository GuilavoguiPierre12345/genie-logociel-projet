<?php
header("Access-Control-Allow-Origin: *"); // Lever de restriction securitaire sur l'origine de la requete
header("Access-Control-Allow-Headers: *"); // Lever de restriction securitaire sur les entetes
header("Content-type: application/json"); // Modifier le type de flux de sortie en format JSON

require_once(dirname(__DIR__,2).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'contacts.php');

if(isset($_POST) && !empty($_POST))
{
    if(count($_POST) === 2)
        exit(json_encode([false,"Veuillez choisir le type de message !"]));
    else
    {
        $identite = htmlentities($_POST['prenom_nom'],ENT_QUOTES);
        $message = htmlentities($_POST['contenu_message'],ENT_QUOTES);
        $typemessage = htmlentities($_POST['typemessage'],ENT_QUOTES);
        if(empty($identite) || empty($message) || empty($typemessage))
            exit(json_encode([false,"Tout les champs sont obligatoire pour l'envoi d'un message !"]));
        else{
            // appel de la fonction d'ajout de suggestion
            ajoutsuggession($typemessage,$message,$identite);
            exit(json_encode([true,"Votre message a bien été envoyé à l'Admin, merci pour votre suggession !"]));
        }
    }
}