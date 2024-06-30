<?php
require_once('Person.php');
require_once('database.php');
/**
 * cette classe fait la structure d'un etudiant
 */
class Etudiant extends Person
{


    // le attributs personel à la classe Etudiant
    private $matricule;
    public $promotion;
    public $adresse;
    // private $niveau;

    // variable qui pemert de faire la connexion avec la base de donnée

    // le constructeur de la classe 
    public function __construct($matricule, $nom, $prenom, $genre, $promotion, $adresse, $telephone)
    {
        parent::__construct($nom, $prenom, $genre, $telephone); //le constructeur parent de cette classe
        $this->matricule = $matricule;
        $this->promotion = $promotion;
        $this->adresse = $adresse;
        // $this->niveau = $niveau;
    }

    /**
     * cette méthode permet d'ajouter un etudiant dans la base de données
     * 
     * @return void : elle ne retourne rien comme valeur
     */
    public function ajouterEtudiant()
    {
        $request = "INSERT INTO etudiant(matricule,nom,prenom,genre,promotion,adresse,telephone) 
                    VALUES (:matricule,:nom,:prenom,:genre,:promotion,:adresse,:tel)";
        $params = [
            'matricule' => $this->matricule,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'genre' => $this->genre,
            'promotion' => (int)($this->promotion),
            'adresse' => $this->adresse,
            'tel' => $this->telephone
        ];

        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
        } catch (PDOException $e) {
            die("Erreur lors de l'ajout d'un etudiant :" . $e->getMessage());
        }
        Database::deconnexion();
    }

    /**
     * méthode permettant d'afficher la liste de touts les etudiants
     */
    public function afficherEtudiants(int $p,string $annee_univ, $recherche=null): array
    {
        
        $params = [];
        $request = "SELECT matricule,nom,prenom,genre,promotion,session.niveau,session.annee,adresse,telephone
                    FROM etudiant INNER JOIN session ON etudiant.matricule=session.etudiant";

        $request .= " WHERE session.annee=:annee AND etudiant.promotion=:promotion";
        $params['promotion'] = $p;
        $params['annee'] = $annee_univ;

        if($recherche != null){
            $request .= " AND etudiant.matricule=:recherche";
            $params['recherche'] = $recherche;
        }

        // $request .= " LIMIT 20";


        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
            $etudiants = $statement->fetchAll();
            return $etudiants;
        } catch (PDOException $e) {
            die('Erreur lors de l\'affichage :' . $e->getMessage());
        }

        Database::deconnexion();
    }

    // liste des etudiants sans critères
    public function listeEtudiant()
    {
        $request = "SELECT * FROM etudiant";
        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute();
            $res = $statement->fetchAll();
            return $res;
        } catch (PDOException $e) {
            die("Erreur d'affichage de la liste complete");
        }
    }

    /**
     * cette méthode affiche uniquement un etudiant en fonction du matricule passer en paramètre
     * @param $matricule : qui est le matricule de l'etudiant
     * 
     * @return array : les renseignements de l'etudiant cible 
     */
    public function afficherEtudiantEnFonctionDeMatricule($matricule)
    {
        $params = [];
        $request = "SELECT nom,prenom,genre,adresse,telephone
                    FROM etudiant
                    WHERE matricule=:matricule";
        $params = [
            'matricule' => $matricule
        ];

        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
            $etudiant = $statement->fetchAll();
            return $etudiant;
        } catch (PDOException $e) {
            die('Erreur lors de l\'affichage de l\'etudiant en fonction de son matricule' . $e->getMessage());
        }
    }

    public function deleteEtudiant($matricule): void
    {
        $params = [];
        $request = "DELETE FROM etudiant WHERE matricule=:mat";
        try {
            $statement = Database::connexion()->prepare($request);
            $params['mat'] = $matricule;
            $statement->execute($params);
        } catch (PDOException $e) {
            die('Erreur de suppression :' . $e->getMessage());
        }

        Database::deconnexion();
    }

    /**
     * cette méthode permet de faire la mise à jour des information d'un Etudiant
     * elle prend en paramètre les nouvelles valeurs
     */
    public function updateEtudiant($matricule, $nom, $prenom, $genre, $adresse, $telephone)
    {
        $params = [];
        $request = "UPDATE etudiant SET nom=:nom,prenom=:prenom,genre=:genre,
                    adresse=:adresse,telephone=:tel
                    WHERE matricule=:matricule";

        $params = [
            'matricule' => $matricule,
            'nom' => $nom,
            'prenom' => $prenom,
            'genre' => $genre,
            'adresse' => $adresse,
            'tel' => $telephone
        ];

        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
        } catch (PDOException $e) {
            die('Erreur lors de la modification de l\'etudiant :' . $e->getMessage());
        }
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
}
