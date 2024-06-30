<?php
require_once('database.php');

function ajoutContact($contact)
{
    $request = "INSERT INTO contacts(contact) VALUE(:contact)";
    $params['contact'] = $contact;
    try {
        $statement = Database::connexion()->prepare($request);
        $statement->execute($params);
    } catch (PDOException $e) {
        die('Erreur ajout de contact :'.$e->getMessage());
    }
    Database::deconnexion();
}

// afficher contact 
function afficheContact()
{
    $request = "SELECT * FROM contacts";
    try {
        $statement = Database::connexion()->prepare($request);
        $statement->execute();
        return $resultat = $statement->fetchAll();
    } catch (PDOException $e) {
        die('Erreur affiche de contact :'.$e->getMessage());
    }
    Database::deconnexion();
}

// la fonction de suppression d'un contact
function deleteContact($cle)
{
    $request = "DELETE FROM contacts WHERE id=:cle";
    $params['cle'] = $cle;

    try {
        $statement = Database::connexion()->prepare($request);
        $statement->execute($params);
    } catch (PDOException $e) {
        die('Erreur suppression de contact :'.$e->getMessage());
    }
    Database::deconnexion();
}

// la fonction de l'ajout d'une suggestion
function ajoutsuggession($type,$msg,$identite)
{
    $request = "INSERT INTO suggession(typemessage,message,identite)
                VALUES(:t,:m,:i)";
    $params['t']=$type;
    $params['m']=$msg;
    $params['i']=$identite;

    try {
        $statement = Database::connexion()->prepare($request);
        $statement->execute($params);
    } catch (PDOException $e) {
        die("Erreur l'ors de l'ajout d'une suggession :".$e->getMessage());
    }
}
// affichage des suggessions 
function affichesuggession()
{
    $request = "SELECT * FROM suggession";
    try {
        $statement = Database::connexion()->prepare($request);
        $statement->execute();
        $resultat = $statement->fetchAll();
        return $resultat;
    } catch (PDOException $e) {
        die("Erreur l'ors de l'affichage des suggessions : ".$e->getMessage());
    }
}

// la fonction de suppression d'une suggession
function deletesuggession($id)
{
    $request = "DELETE FROM suggession WHERE id=:id";
    $params['id']=$id;
    try {
        $statement = Database::connexion()->prepare($request);
        $statement->execute($params);
    } catch (PDOException $e) {
        die("Erreur l'ors de la suppression de suggession :".$e->getMessage());
    }
}