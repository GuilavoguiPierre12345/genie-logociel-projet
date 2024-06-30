<?php

require_once('Person.php');
require_once('database.php');
/**
 * cette classe represente un enseignant 
 * @param $matricule : le matricule de l'enseignant
 * @param $nom : son nom 
 * @param $prenom : son prénom
 * @param $genre : le sexe (M|F)
 * @param $telephone : son contact téléphonique
 * @param array $matieres : les matières qu'il enseigne
 * 
 * @return void
 */
class Enseignant extends Person
{
    private $matricule;
    private $matieres;

    public function __construct($matricule,$nom,$prenom,$genre,$telephone,$matieres)
    {
        parent::__construct($nom,$prenom,$genre,$telephone);
        $this->matricule = $matricule;
        $this->matieres = $matieres;
    }

    /**
     * Get the value of matieres
     */ 
    public function getMatieres()
    {
        return $this->matieres;
    }

    /**
     * Set the value of matieres
     *
     * @return  self
     */ 
    public function setMatieres($matieres)
    {
        $this->matieres = $matieres;

        return $this;
    }

    /**
     * Get the value of matricule
     */ 
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @return  self
     */ 
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }


    // les opérations CRUD sur l'enseignant

    // OPERATION D'AJOUT 
    public function ajouterEnseignant()
    {
        $request = "INSERT INTO enseignant(matricule,nom,prenom,genre,telephone,matieres) 
                    VALUES (:matricule,:nom,:prenom,:genre,:tel,:matieres)";
        $params =[
            'matricule'=>$this->matricule,
            'nom'=>$this->nom,
            'prenom'=>$this->prenom,
            'genre'=>$this->genre,
            'tel'=>$this->telephone,
            'matieres'=>implode(',',$this->matieres)
        ];

       try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
       } catch (PDOException $e) {
            die("Erreur lors de l'ajout de l'enseignant  :".$e->getMessage());
        }
        Database::deconnexion();
    }

    /**
     * la liste des matières occupées déjà par les enseignants
     */
    public function matiere_occupes()
    {
        $params = [];
        $request = "SELECT matieres FROM enseignant";
        
        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
        } catch (PDOException $e) {
            die("Erreur lors de l'affichage des matière deja occupe par les enseignant".$e->getMessage());
        }
        $resultat = $statement->fetchAll();
        return $resultat;
    }

    // OPERATION D'AFFICHAGE
    public function afficherEnseignant($search = null):array
    {   
        $request = "SELECT * FROM enseignant";
        $params =[];
        if($search!=null){
            $request .= " WHERE matricule= :mat";
            $params['mat']= $search;
        }

        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
            $enseignants = $statement->fetchAll();
            return $enseignants;
        } catch (PDOException $e) {
            die('Erreur lors de l\'affichage  des enseignants :'.$e->getMessage());
        }

        Database::deconnexion();
    }

    /**
     * cette méthode permet d'affiher les enseignants par matricule
     * @param $matricule : est le matricule de l'enseignant cible
     */
    public function afficherEnseignantEnFonctionDeMatricule($matricule)
    {
        $params = [];
        $request = "SELECT nom,prenom,genre,telephone,matieres
                    FROM enseignant
                    WHERE matricule=:matricule";
        $params = [
            'matricule' => $matricule
        ];

        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
            $enseignant = $statement ->fetchAll();
            return $enseignant;
        } catch (PDOException $e) {
            die('Erreur lors de l\'affichage de l\'enseignant en fonction de son matricule' . $e->getMessage());
        }
    }

    public function updateEnseignant($matricule, $nom, $prenom, $genre, $telephone,$matieres)
    {
        $params = [];
        $request = "UPDATE enseignant SET nom=:nom,prenom=:prenom,genre=:genre,
                    telephone=:tel,matieres=:matieres
                    WHERE matricule=:matricule";

        $params = [
            'matricule' => $matricule,
            'nom' => $nom,
            'prenom' => $prenom,
            'genre' => $genre,
            'tel' => $telephone,
            'matieres' => implode(',',$matieres)
        ];

        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
        } catch (PDOException $e) {
            die('Erreur lors de la modification de l\'enseignant :' . $e->getMessage());
        }
    }

    // OPERATION DE SUPPRESSION
    public function deleteEnseignant(string $matricule):void
    {
        $params = [];
        $request = "DELETE FROM enseignant WHERE matricule=:mat";
        try {
            $statement = Database::connexion()->prepare($request);
            $params['mat']= $matricule;
            $statement->execute($params);
        } catch (PDOException $e) {
            die('Erreur de suppression :'.$e->getMessage());
        } 

        Database::deconnexion();
    }

}
