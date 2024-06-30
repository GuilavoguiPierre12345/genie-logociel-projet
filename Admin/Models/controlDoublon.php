<?php

require_once('database.php');

function isExist_with_1_key($colonne,$tableCible,$key):bool
{
    $request = "SELECT $colonne FROM $tableCible WHERE $colonne=:matricule";
    $param['matricule']= $key;

    $statement = Database::connexion()->prepare($request);
    $statement->execute($param);

    $nombre = $statement->rowCount();
    $exist = ($nombre!=0) ? true : false;
    
    return $exist;
}

function isExist_with_2_keys($colonne1,$colonne2,$tableCible,$key1,$key2):bool
{
    $request = "SELECT $colonne1,$colonne2 FROM $tableCible WHERE $colonne1=:col1 AND $colonne2=:col2";
    $params['col1']= $key1;
    $params['col2']= $key2;

    $statement = Database::connexion()->prepare($request);
    $statement->execute($params);

    $nombre = $statement->rowCount();
    $exist = ($nombre!=0) ? true : false;
    
    return $exist;
}

/**
 * cette fonction permet d'afficher juste une colonne d'une table
 * @param $table : le nom de la table 
 * @param $champ : le champ cible 
 * @param $key : l'identifiant de l'élément dans $table
 * @param $cible : la valeur de l'ienditifant pour la selection
 */
function selectionne_1_champs($table,$champ,$key,$cible)
{
    $param = [];
    $request = "SELECT $champ FROM $table WHERE $key=:cible";
    $param['cible'] = $cible;

    try {
       $statement = Database::connexion()->prepare($request);
       $statement->execute($param);

       $element = $statement->fetchAll();
       return $element;
    } catch (PDOException $e) {
       die('Erreur lors de l\'affichage de l\'element');
    }
}

// contrôle de l'existance d'une fiche de note pour une matière dans un semestre et une session universitaire
function isFicheNoteExiste($matiere,$semestre,$session_universitaire)
{
    $request = "SELECT matiere,semestre,session FROM note WHERE note.matiere=:matiere AND session=:session AND semestre=:semestre";
    $params['matiere'] = $matiere;
    $params['session'] = $session_universitaire;
    $params['semestre'] = $semestre;

    try {
       $statement = Database::connexion()->prepare($request);
       $statement ->execute($params);
        $resultat = $statement->rowCount();
       if($resultat ==0)
            return true;
        if($resultat >0)
            return false;
        
    } catch (PDOException $e) {
        die("Erreur au niveau du contrôle de l'existance d'une fiche de note: ".$e->getMessage());
    }
}