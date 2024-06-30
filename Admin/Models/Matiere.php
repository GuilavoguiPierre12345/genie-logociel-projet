<?php

require_once('database.php');

/**
 * cette classe construit une nouvelle classe
 * 
 * @param string $libelleMatiere : qui represente le nom de la matiere
 */
class Matiere
{
    public $idmatiere;
    public $libelleMatiere;
    public $semestre;

    public function __construct($idmatiere,$libelle,$semestre)
    {
        $this->idmatiere = $idmatiere;
        $this->libelleMatiere = $libelle;
        $this->semestre = $semestre;
    }

    // les opérations CRUD sur l'enseignant

    // OPERATION D'AJOUT 
    public function ajouterMatiere()
    {
        $params = [];
        $request = "INSERT INTO matiere(idmatiere,libellematiere,semestre) 
                    VALUES (:idmat,:libelle,:semestre)";
        $params =[
            'idmat'=>$this->idmatiere,
            'libelle'=>$this->libelleMatiere,
            'semestre'=>$this->semestre
        ];
            
       try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
       } catch (PDOException $e) {
            die("Erreur lors de l'ajout de la matiere  :".$e->getMessage());
        }
        Database::deconnexion();
    }

    // OPERATION D'AFFICHAGE
    public function afficherMatiere($matiere =null):array
    {
        $request = "SELECT * FROM matiere";
        $params =[];
        if($matiere != null){
            $request .= " WHERE libellematiere LIKE :matiere OR semestre LIKE :matiere";
            $params['matiere'] = '%' . $matiere . '%';
        }
        $request .= " ORDER BY semestre ASC LIMIT 20";

        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
            $matieres = $statement->fetchAll();
            return $matieres;
        } catch (PDOException $e) {
            die('Erreur lors de l\'affichage des matieres :'.$e->getMessage());
        }

      Database::deconnexion();
    }

    //liste des matieres par semestre
    public function matiere_par_semestre(int $num_semestre_1,int $num_semestre_2) : array
    {
        $request = "SELECT libellematiere FROM matiere WHERE semestre=:s1 OR semestre=:s2";
        $params['s1'] = $num_semestre_1;
        $params['s2'] = $num_semestre_2;

        try {
           $statement = Database::connexion()->prepare($request);
           $statement->execute($params);

           $resultat = $statement->fetchAll();
           return $resultat;
        } catch (PDOException $e) {
            die('Erreur lors de l\'affichage de la semestre'.$e->getMessage());
        }
    }
    // OPERATION DE SUPPRESSION
    public function deleteMatiere(string $idmatiere):void
    {
        $params = [];
        $request = "DELETE FROM matiere WHERE idmatiere=:idmatiere";
       
        try {
            $statement = Database::connexion()->prepare($request);
            $params['idmatiere']= $idmatiere;
            $statement->execute($params);
        } catch (PDOException $e) {
            die('Erreur de suppression de la matiere:'.$e->getMessage());
        } 
        Database::deconnexion();
    }

    // OPERATION DE MISE A JOUR
    // public function updateMatiere($idmatiere,$libelle,$semestre)
    // {
    //     $params =[];
    //     $request = "UPDATE matiere SET libellematiere=:libelle, semestre=:semestre WHERE idmatiere=:idmatiere";
    //     $params['idmatiere']=$idmatiere;
    //     $params['libelle']=$libelle;
    //     $params['semestre']=$semestre;
        
    //     $statement = Database::connexion()->prepare($request);
    //     $statement->execute($params);

    //     Database::deconnexion();
    // }
}

