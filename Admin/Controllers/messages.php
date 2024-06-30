<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Messages.php');

if(isset($_POST['typemessage']) && isset($_POST['prenom_nom']) && isset($_POST['adresse_email']) && 
    isset($_POST['contenu_message']) && isset($_POST['envoyer']))
{
    var_dump($_POST);die;
    $valide = true;

    $type_message = htmlspecialchars(trim($_POST['typemessage']));
    if(empty($type_message)){
        $valide = false;
        exit(json_encode([false, "Erreur sur le type de message"]));
    }

    $nom_prenom = htmlspecialchars(trim($_POST['prenom_nom']));
    if(empty($nom_prenom)){
        $valide = false;
        exit(json_encode([false,"Erreur champ obligatoire"]));
    }

    $adresse_email = htmlspecialchars(trim($_POST['adresse_email']));
    if(empty($adresse_email)){
        $valide = false;
        exit(json_encode([false, "Erreur adresse email obligatoire"]));
    }

    $contenu_message = htmlspecialchars(trim($_POST['contenu_message']));
    if(empty($contenu_message)){
        $valide = false;
        exit(json_encode([false, "Erreur veuillez saisir un contenu"]));
    }

    if($valide){
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
        addhistorique($l,'Ajout message');
        ajoutMessage($type_message,$nom_prenom,$adresse_email,$contenu_message);
        exit(json_encode([true,$type_message." envoyé avec succès"]));
    }
}