<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Evenement.php');

// les contrôles sur l'ajout d'un évènement dans la base 
    if(!empty($_POST)){
        // récupération des informations dans le formulaire
        $titre                = checkinput($_POST['titre']);
        $resumer              = checkinput($_POST['resumer']);
        $contenu              = checkinput($_POST['contenu']);
        $nom_photo            = checkinput($_FILES['lien_photo']['name']);
        $lien_photo           = dirname(__DIR__,2).DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.'photosPub'.DIRECTORY_SEPARATOR.basename($nom_photo);
        $photo_extention      = pathinfo($lien_photo,PATHINFO_EXTENSION);
        $extention_valide     = array('jpg','JPG','jpeg','JPEG','png','PNG');
        $pas_erreur           = true ;    //par défaut le formulaire est rempli
        $image_charger    = false;    //par défaut aucune image n'a été choisi

        // on vérifie les champs s'ils ne sont pas vide
        if(empty($titre)){
            $erreur_titre = "Ce champs ne peut pas être vide";
            $pas_erreur = false;
        }

        if(empty($resumer)){
            $erreur_resumer = "Ce champs ne peut pas être vide";
            $pas_erreur = false;
        }
        if(strlen($resumer)>255){
            $erreur_resumer = "Il sagit d'un resumer, la taille est < 255 !";
            $pas_erreur = false;
        }

        if(empty($contenu)){
            $erreur_contenu = "Ce champs ne peut pas être vide";
            $pas_erreur = false;
        }

        if(empty($lien_photo)){
            $erreur_lien = "Ce champs ne peut pas être vide";
            $pas_erreur = false;
        }else{
            $image_charger = true;
            // vérification des extensions valides pour l'image
            if(!in_array($photo_extention,$extention_valide)){
                    $erreur_lien = "Les fichiers autorises sont: .jpg, .jpeg, .png, .PNG,.JPEG,.JPG";
                    $image_charger = false;
            }
            // vérification de la taille de l'image
            if($_FILES['lien_photo']["size"] > 500000){
                $erreur_lien = "La taille de l'image ne doit pas depasser 500KB";
                $image_charger = false;
            }
            if($image_charger){
                // vérification du chargement de l'image
                if(!move_uploaded_file($_FILES['lien_photo']['tmp_name'],$lien_photo)){
                    $erreur_lien = "Il y a une erreur lors du chargement de l'image";
                    $image_charger = false;
                }
            }
        }
        // la vérification finale pour l'insertion dans la base de donnée
        if($pas_erreur && $image_charger){
            ajouterEvenement($titre,$resumer,$nom_photo,$contenu);
            $message_succes = "Opération effectuée avec succès !";
            require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
            addhistorique($l,'ajout Actualité');
        }
    }

// ///////////////////////// fin du controle ///////////////////////////////

require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'ajoutEvenement.php');
