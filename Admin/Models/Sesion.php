<?php

require_once('database.php');

class Sesion 
{
    private $annee;
    private $etudiant;
    private $niveau_etudiant;
    public function __construct($annee,$etudiant,$niveau_etudiant)
    {
        $this->annee = $annee;
        $this->etudiant = $etudiant;
        $this->niveau_etudiant = $niveau_etudiant;
    }

    /**
     * Get the value of annee
     */ 
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     *
     * @return  self
     */ 
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    // OPERATIONS DE CRUD

    // ajout session 
    public function ajouterSesion()
    {
        $params = [];
        $request = "INSERT INTO session(annee,etudiant,niveau) VALUES(:annee,:etudiant,:niveau)";
        $params =[
            'annee'=> $this->annee,
            'etudiant'=>$this->etudiant,
            'niveau'=> $this->niveau_etudiant
        ];
        $statement = Database::connexion()->prepare($request);
        $statement->execute($params);
    }

    /**
     * cette méthode permet de faire la mise à jour de la table session qui 
     * contient l'année universitaire, le matricule et le niveau de l'etudiant
     */

    /**
     * Cette méthode permet de supprimer une session 
     * @param $matricule_etudiant : le matricule de l'étudiant qu'on veut supprimé la session 
     * @param $session_inuversitaire : la session à supprimer
     * 
     * @return void
     */
    public function deleteSession($matricule_etudiant,$session_universitaire)
    {
        $params = [];
        $request = "DELETE FROM session 
                    WHERE etudiant=:matricule AND annee=:annee";
        $params =[
            'matricule'=>$matricule_etudiant,
            'annee'=>$session_universitaire
        ];

        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
        } catch (PDOException $e) {
            die('Erreur lors de la suppression de l\'etudiant'.$e->getMessage());
        }
    }

    /**
     * Get the value of niveau_etudiant
     */ 
    public function getNiveau_etudiant()
    {
        return $this->niveau_etudiant;
    }

    /**
     * Set the value of niveau_etudiant
     *
     * @return  self
     */ 
    public function setNiveau_etudiant($niveau_etudiant)
    {
        $this->niveau_etudiant = $niveau_etudiant;

        return $this;
    }
}