<?php

require_once('database.php');

function ajoutMessage($type_message,$nom_prenom,$adresse_email,$contenu_message)
{
    $request = "INSERT INTO messages(type_message,nom_prenom,adresse_email,contenu_message) 
                VALUES(:type_me,:nom_pr,:adresse_em,:contenu_me)";
    $params['type_me'] = $type_message;
    $params['nom_pr'] = $nom_prenom;
    $params['adresse_em'] = $adresse_email;
    $params['contenu_me'] = $contenu_message;

    try {
        $stetament = Database::connexion()->prepare($request);
        $stetament ->execute($params);
    } catch (PDOException $e) {
        die("Erreur lors de l'ajout d'un messages ou témoignage :".$e->getMessage());
    }
}

function afficherMessage()
{
    $request = "SELECT * FROM messages";
    try {
        $stetament = Database::connexion()->prepare($request);
        $stetament ->execute();
        return $resultat = $stetament ->fetchAll();
    } catch (PDOException $e) {
        die("Erreur lors de l'affichage des messages :".$e->getMessage());
    }
}

function supprimerMessage($cle)
{
    $request = "DELETE FROM messages WHERE id=:cle";
    $params['cle'] = $cle;

    try {
        $stetament = Database::connexion()->prepare($request);
        $stetament ->execute($params);
    } catch (PDOException $e) {
        die("Erreur lors de la suppression des messages :".$e->getMessage());
    }
}

Database::deconnexion();