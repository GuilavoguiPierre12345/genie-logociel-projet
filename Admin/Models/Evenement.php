<?php
require_once('database.php');

function afficherEvenement()
{
    $request = "SELECT * FROM news";
    try {
      $statement = Database::connexion()->prepare($request);
      $statement->execute();
      return $resultat = $statement->fetchAll();
    } catch (PDOException $e) {
        die("Erreur pour l'affichage des evenements : ".$e->getMessage());
    }
}

function ajouterEvenement($titre,$resumer,$nomphoto,$contenu)
{
    $request = "INSERT INTO news(titre,resumer,nomphoto,contenu) 
                VALUES(:titre,:resumer,:nomphoto,:contenu)";

    $params['titre']=$titre;
    $params['resumer']=$resumer;
    $params['nomphoto']=$nomphoto;
    $params['contenu']= $contenu;

    try {
       $statement = Database::connexion()->prepare($request);
       $statement->execute($params);
    } catch (PDOException $e) {
        die("Erreur pour l'ajout d'une pub ".$e->getMessage());
    }
}

function supprimerEvenement($cle)
{
    $request = "DELETE FROM news WHERE idnews=:cle";
    $params['cle']=$cle;

    try {
       $statement = Database::connexion()->prepare($request);
       $statement->execute($params);
    } catch (PDOException $e) {
        die("Erreur pour la supression d'une pub : ".$e->getMessage());
    }
}

Database::deconnexion();