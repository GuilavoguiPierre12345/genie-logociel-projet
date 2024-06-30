<?php

require_once('database.php');

function selection_1_cle($table,$colonne)
{
    $request = "SELECT DISTINCT $colonne FROM $table";
    $statement = Database::connexion()->prepare($request);
    $statement->execute();

    return $elements = $statement->fetchAll();
}

// selectionne un élément avec critère 
function selection_1_critere($table,$colonne,$critere)
{
    $request = "SELECT $colonne FROM $table WHERE $colonne='$critere'";
    try {
        $statement = Database::connexion()->prepare($request);
        $statement->execute();
        return $resultat = $statement->fetchAll();
    } catch (PDOException $e) {
        die("Erreur lors de la selection avec un seule critère : ".$e->getMessage());
    }
}
// selectionne une colonne en fonction de la valeur d'une autre colonne
function selection_2_critere($table,$colonne1,$colonne2,$critere)
{
    $request = "SELECT $colonne1 FROM $table WHERE $colonne2='$critere'";
    try {
        $statement = Database::connexion()->prepare($request);
        $statement->execute();
        $resultat = $statement->fetchAll();
        return $resultat;
    } catch (PDOException $e) {
        die("Erreur lors de la selection avec un seule critère : ".$e->getMessage());
    }
}

// mise à jour des informations de l'admin
function updatelogin($login,$mdp,$id){
    $request = "UPDATE administrateur SET login=:user, motdepasse=:mdp WHERE identifiant=:id";
    try {
        $statement = Database::connexion()->prepare($request);
        $params['user']=$login;
        $params['mdp']=$mdp;
        $params['id']=$id;
        $statement ->execute($params);
    } catch (PDOException $e) {
        die("Erreur au niveau de la mise à jour de l'admin : ".$e->getMessage());
    }
    
    Database::deconnexion();
}
// mise à jour des informations d'indication de mot de passe
function updateindicateur($ind1,$ind2,$ind3,$id){
    $request = "UPDATE administrateur SET indicateur1=:ind1, indicateur2=:ind2, indicateur3=:ind3 WHERE identifiant=:id";
    try {
        $statement = Database::connexion()->prepare($request);
        $params['ind1']=$ind1;
        $params['ind2']=$ind2;
        $params['ind3']=$ind3;
        $params['id']=$id;
        $statement ->execute($params);
    } catch (PDOException $e) {
        die("Erreur au niveau de la mise à jour des indicateurs : ".$e->getMessage());
    }

    Database::deconnexion();
}

// ajout d'un nouveau admin
function addnewadmin($login,$psw,$droit)
{
    $request = "INSERT INTO administrateur(login,droit,motdepasse) 
                VALUES(:l,:d,:mdp)";
    $params['l'] = $login;
    $params['d'] = $droit;
    $params['mdp'] = $psw;
    
    try{
        $statement = Database::connexion()->prepare($request);
        $statement->execute($params);
    }catch (PDOException $e) {
        die("Erreur au niveau de l'ajout d'un nouveau admin : ".$e->getMessage());
    }

    Database::deconnexion();
}