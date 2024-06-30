<?php
require_once('database.php');

class Emploi
{
    public $jour;
    public $heure;
    public $matiere;
    public $enseignant;
    public $licence;


    public function __construct($jour,$heure,$matiere,$enseignant,$licence)
    {
        $this->jour = $jour;
        $this->heure = $heure;
        $this->matiere = $matiere;
        $this->enseignant = $enseignant;
        $this->licence = $licence;
    }

    // OPERATIONS DU CRUD 

    //ajout d'un nouveau emploi 
    public function elaborerEmploi()
    {
        $params = [];
        $request = "INSERT INTO emploi(jour,heure,matiere,enseignant,licence) VALUES(:jour,:heure,:matiere,:enseignant,:licence)";
        $params['jour']=$this->jour;
        $params['heure']=$this->heure;
        $params['matiere']=$this->matiere;
        $params['enseignant']=$this->enseignant;
        $params['licence'] = $this->licence;

        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
        } catch (PDOException $e) {
           die("Erreur au niveau de l'élaboration de l'emploi : ".$e->getMessage());
        }
        Database::deconnexion();
    }

    public function updateEmploi($jour,$heure,$matiere,$prof,$licence,$id)
    {
        $params = [];
        $request = "UPDATE emploi SET jour=:jour,heure=:heure,matiere=:matiere,enseignant=:prof
                    WHERE identifiant=:id AND licence=:licence";
        $params['jour'] = $jour;
        $params['heure']= $heure;
        $params['matiere']= $matiere;
        $params['prof'] = $prof;
        $params['licence'] = $licence;
        $params['id'] = $id;

        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
        } catch (PDOException $e) {
            die("Erreur :mise à jour de l'emploi".$e->getMessage());
        }
        Database::deconnexion();
    }

    public function afficheEmploi($licence)
    {
        $request = "SELECT * FROM emploi WHERE licence=:licence";
        $params['licence']=$licence;
        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);

            $resultat = $statement ->fetchAll();
            return $resultat;
        } catch (PDOException $e) {
            die("Erreur lors de l'affichage de l'emploi : ".$e->getMessage());
         }
         Database::deconnexion();
    }

    public function fetchEmploi()
    {
        $request = "SELECT * FROM emploi";
        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute();

            $resultat = $statement ->fetchAll();
            return $resultat;
        } catch (PDOException $e) {
            die("Erreur lors de l'affichage complete de l'emploi : ".$e->getMessage());
         }
         Database::deconnexion();
    }
    
    /**
     * Cette méthode permet de vérifier l'existance d'un emploi de temps 
     * @param $licence : est la licence de vérification
     * 
     * @return bool : elle retourne true si un emploi existe et false sinon
     */
    public function is_exist_emploi($licence) : bool
    {
        $request = "SELECT licence FROM emploi WHERE licence=:licence";
        $params['licence'] = $licence;
        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
            $resultat= $statement->fetchAll();
            if(count($resultat)!=0)
                return true;
            else 
                return false;

        } catch (PDOException $e) {
            die("Erreur pour la vérification de l'existance de l'emploi : ".$e->getMessage());
         }
         Database::deconnexion();
    }
}