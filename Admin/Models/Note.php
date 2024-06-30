<?php

require_once('database.php');
class Note
{
    private $note1;
    private $note2;
    private $note3;
    private $etudiant;
    private $matiere;
    private $session;
    private $promotion;
    private $semestre;

    public function __construct($note1,$note2,$note3,$etudiant,$matiere,$session,$promotion,$semestre)
    {
        $this->note1 = $note1;
        $this->note2 = $note2;
        $this->note3 = $note3;
        $this->etudiant =$etudiant;
        $this->matiere = $matiere;
        $this->session = $session;
        $this->promotion = $promotion;
        $this->semestre = $semestre;
    }

    /**
     * Get the value of note2
     */ 
    public function getNote2()
    {
        return $this->note2;
    }

    /**
     * Set the value of note2
     *
     * @return  self
     */ 
    public function setNote2($note2)
    {
        $this->note2 = $note2;

        return $this;
    }

    /**
     * Get the value of note3
     */ 
    public function getNote3()
    {
        return $this->note3;
    }

    /**
     * Set the value of note3
     *
     * @return  self
     */ 
    public function setNote3($note3)
    {
        $this->note3 = $note3;

        return $this;
    }

    /**
     * Get the value of note1
     */ 
    public function getNote1()
    {
        return $this->note1;
    }

    /**
     * Set the value of note1
     *
     * @return  self
     */ 
    public function setNote1($note1)
    {
        $this->note1 = $note1;

        return $this;
    }

     /**
     * Get the value of matiere
     */ 
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Get the value of etudiant
     */ 
    public function getEtudiant()
    {
        return $this->etudiant;
    }

    // ajouter note
    public function ajouterNote()
    {
        $params =[];
        $request = "INSERT INTO note(note1,note2,note3,etudiant,matiere,session,promotion,semestre) VALUES(:note1,:note2,:note3,:etudiant,:matiere,:session,:promotion,:semestre)";
        $params['note1']=$this->note1;
        $params['note2']=$this->note2;
        $params['note3']=$this->note3;
        $params['etudiant']=$this->etudiant;
        $params['matiere']=$this->matiere;
        $params['session']=$this->session;
        $params['promotion']=$this->promotion;
        $params['semestre']=$this->semestre;
        
        try {
            $statement = Database::connexion()->prepare($request);
            $statement->execute($params);
        } catch (PDOException $e) {
            die("Erreur au niveau du reportage des notes : ".$e->getMessage());
        }

        Database::deconnexion();
    }

    public function afficherNote_min(string $matiere,int $semestre,int $promotion,$session)
    {
        $params =[];
        $request = "SELECT etudiant.matricule,etudiant.nom,etudiant.prenom,note.note1,note.note2,note.note3
                    FROM note,etudiant 
                    WHERE note.etudiant=etudiant.matricule
                    AND note.matiere=:matiere 
                    AND note.promotion=:promo
                    AND note.semestre=:semestre
                    AND note.session =:session
                        ";
        $params['matiere'] = $matiere;
        $params['semestre'] = $semestre;
        $params['promo'] = $promotion;
        $params['session'] = $session;

        try {
            $statement = Database::connexion()->prepare($request);
            $statement ->execute($params);

            $resultat = $statement ->fetchAll() ;
            return $resultat;
        } catch (PDOException $e) {
            die("Erreur au niveau de l'affichage des notes pour la modification: ".$e->getMessage());
        }
        Database::deconnexion();
    }
    // affichage des note sans critère
    public function fichenote()
    {
        $request = "SELECT etudiant.matricule,etudiant.nom,etudiant.prenom,note.note1,note.note2,note.note3,
                    note.session,note.promotion,note.semestre,note.matiere
                    FROM note,etudiant 
                    WHERE note.etudiant=etudiant.matricule
                        ";
        try {
            $statement = Database::connexion()->prepare($request);
            $statement ->execute();

            $resultat = $statement ->fetchAll() ;
            return $resultat;
        } catch (PDOException $e) {
            die("Erreur au niveau de l'affichage des notes sans critère : ".$e->getMessage());
        }
        Database::deconnexion();
    }

    public function updateNote($note1,$note2,$note3,$etudiant, string $matiere,int $semestre,int $promotion,$annee_universitaire)
    {
        // $params =[];
        $request = "UPDATE note SET note1=:note1,note2=:note2,note3=:note3
                    WHERE note.matiere=:matiere 
                    AND note.etudiant=:etudiant
                    AND note.semestre=:semestre
                    AND note.promotion=:promotion
                    AND note.session=:session_univ
        ";
        $params['note1'] = $note1;
        $params['note2'] = $note2;
        $params['note3'] = $note3;
        $params['etudiant'] = $etudiant;
        $params['matiere'] = $matiere;
        $params['semestre'] = $semestre;
        $params['promotion'] = $promotion;
        $params['session_univ'] = $annee_universitaire;

        try {
           $statement = Database::connexion()->prepare($request);
           $statement->execute($params);
        } catch (PDOException $e) {
            die("Erreur au niveau de la modification des notes : ".$e->getMessage());
        }
    }
    
}
