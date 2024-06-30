<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'contacts.php');

// les contrôles sur l'ajout d'un partenaire dans la base 
    if(isset($_POST['ajoutContact']) && isset($_POST['contact']) && !empty($_POST['ajoutContact'])){
        // récupération des informations dans le formulaire
        $contact             = checkinput($_POST['contact']);
        $pas_erreur           = true ;    //par défaut le formulaire est rempli

        // on vérifie les champs s'ils ne sont pas vide
        if(empty($contact) || !is_numeric($contact) || strlen($contact)!==9){
            $erreur_contact = "Ce contact n'est pas valide !";
            $pas_erreur = false;
        }

        // la vérification finale pour l'insertion dans la base de donnée
        if($pas_erreur){
            ajoutContact($contact);
            $message_succes = "contact ajouté avec succès !";
        }
    }

// ///////////////////////// fin du controle ///////////////////////////////

//  la liste des contacts 
$liste_contact = afficheContact();

// supprimer contact 
if(isset($_POST['supprimer']) && !empty($_POST['supprimer']))
{
    $cle = $_POST['cle'];
    deleteContact($cle);
}

//  ////////////////////////////// fin de la liste des contacts /////////////
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'ajoutContact.php');
