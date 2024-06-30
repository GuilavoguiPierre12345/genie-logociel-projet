<?php

require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'generateSession.php');
$annee_universitaire = $sessionCourante->generateSession(); //la session universitaire en cours
require_once('../resources/controlInput.php');

    $erreurs = [];
    if(isset($_POST) && !empty($_POST))
    {

    $matricule = (int)checkinput($_POST['matricule']);
    if(strlen($matricule)!= 10 || empty($matricule)){
        $erreurs['matricule']='Matricule invalide';
        $success = false;
    }

    $nom = checkinput($_POST['nom']);
    if(empty($nom)){
        $erreurs['nom'] = 'Veuillez saisir un nom !!';
        $success = false;
    }

    $prenom = checkinput($_POST['prenom']);
    if(empty($prenom)){
        $erreurs['prenom'] = 'Veuillez saisir un prénom';
        $success = false;
    }

    $genre = checkinput($_POST['genre']);
    if(empty($genre)){
        $erreurs['genre'] = 'Veuillez choisir le genre';
        $success = false;
    }

    (int)$promotion = checkinput($_POST['promotion']);
    if(empty($promotion)){
        $erreurs['promotion'] = 'Veuillez choisir une promotion';
        $success = false;
    }

    $niveau = (int)checkinput($_POST['niveau']);
    if(empty($niveau)){
        $erreurs['niveau'] = 'Veuillez choisir un niveau';
        $success = false;
    }

    $adresse = checkinput($_POST['adresse']);
    if(empty($adresse)){
        $erreurs['adresse'] = 'Adresse est obligatoire';
        $success = false;
    }

    $telephone = checkinput($_POST['telephone']);
    if(empty($telephone) || !is_numeric($telephone)){
        $erreurs['telephone'] = 'Veuilez entrer votre numéro de téléphone valide';
        $success = false;
    }

    if(!isset($success)){    
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'controlDoublon.php');
        // on vérifie si le matricule et la session d'enregistrement existe dans session alors en envoi un message de doublon
        $doublon_1 = isExist_with_2_keys('etudiant','annee','session',$matricule,$annee_universitaire);
        if($doublon_1){
            $message = "Risque de doublon, le matricule : $matricule existe déjà dans la session : $annee_universitaire !!";
        }else{
            require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Etudiant.php');
            require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Sesion.php');
            
            $session = new Sesion($annee_universitaire,$matricule,$niveau);  
            
            // on vérifie si le matricule existe dans la table etudiant alors on crée une nouvelle session avec ce matricule
            $doublon_2 = isExist_with_1_key('matricule','etudiant',$matricule);
            if($doublon_2){
                $session->ajouterSesion(); 
                addhistorique($l,'Ajout etudiant');
            }else{
                $etudiant = new Etudiant($matricule,$nom,$prenom,$genre,$promotion,$adresse,$telephone);
                // $session = new Sesion($annee_universitaire,$matricule);
                $etudiant->ajouterEtudiant();
                $session->ajouterSesion(); 
                addhistorique($l,'Ajout etudiant');
            }
            $message = "Enregistrement effectuer avec succès";
            $matricule=$nom=$prenom=$promotion=$telephone='';
        }
    }else 
        $message = "Il y a une erreur dans votre formulaire";
    
}
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'formulaireAjoutEtudiant.php');