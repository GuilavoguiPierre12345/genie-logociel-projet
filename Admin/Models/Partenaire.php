<?php
require_once('database.php');

function afficherPartenaire()
{
    $request = "SELECT * FROM partenaire";
    try {
      $statement = Database::connexion()->prepare($request);
      $statement->execute();
      return $resultat = $statement->fetchAll();
    } catch (PDOException $e) {
        die("Erreur pour l'affichage des partenaires : ".$e->getMessage());
    }
}

function ajouterPartenaire($nom_partenaire,$pays_partenaire)
{
    $request = "INSERT INTO partenaire(nompartenaire,payspartenaire) 
                VALUES(:nom,:pays)";

    $params['nom']=$nom_partenaire;
    $params['pays']=$pays_partenaire;

    try {
       $statement = Database::connexion()->prepare($request);
       $statement->execute($params);
    } catch (PDOException $e) {
        die("Erreur pour l'ajout d'un partenaire ".$e->getMessage());
    }
}

function supprimerPartenaire($cle)
{
    $request = "DELETE FROM partenaire WHERE idpartenaire=:cle";
    $params['cle']=$cle;

    try {
       $statement = Database::connexion()->prepare($request);
       $statement->execute($params);
    } catch (PDOException $e) {
        die("Erreur pour la supression d'un partenaire : ".$e->getMessage());
    }
}

Database::deconnexion();