<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Partenaire.php');

// les contrôles sur l'ajout d'un partenaire dans la base 
    if(!empty($_POST)){
        // récupération des informations dans le formulaire
        $partenairenom                = checkinput($_POST['partenairenom']);
        $partenairepays              = checkinput($_POST['partenairepays']);
        $pas_erreur           = true ;    //par défaut le formulaire est rempli

        // on vérifie les champs s'ils ne sont pas vide
        if(empty($partenairenom)){
            $erreur_nom = "Le nom du partenaire est obligatoire";
            $pas_erreur = false;
        }

        if(empty($partenairepays)){
            $erreur_pays = "Le pays du partenaire est obligatoire";
            $pas_erreur = false;
        }

        // la vérification finale pour l'insertion dans la base de donnée
        if($pas_erreur){
            ajouterPartenaire($partenairenom,$partenairepays);
            $message_succes = "Opération effectuée avec succès !";
            require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
            addhistorique($l,'ajouter un partenaire');
        }
    }

// ///////////////////////// fin du controle ///////////////////////////////

require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'ajoutPartenaire.php');
