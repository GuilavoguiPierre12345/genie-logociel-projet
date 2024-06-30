<?php
require_once('database.php');

// la fonction d'ajout de l'historique des activités
function addhistorique($login,$activite)
{
    $request = "INSERT INTO historiques(login,activite) VALUES(:l,:a)";
    $params['l'] = $login;
    $params['a'] = $activite;

    try{
        $stetament = Database::connexion()->prepare($request);
        $stetament->execute($params);
    }catch(PDOException $e){
        die("Erreur d'ajout de l'historique des activités :".$e->getMessage());
    }

    Database::deconnexion();
}

// fonction d'affichage des activités
function affichehistorique()
{
    $request = "SELECT * FROM historiques";
    try{
        $stetament = Database::connexion()->prepare($request);
        $stetament->execute();
        $resultat = $stetament->fetchAll();
        return $resultat;
    }catch(PDOException $e){
        die('Erreur affichage historique : '.$e->getMessage());
    }

    Database::deconnexion();
}