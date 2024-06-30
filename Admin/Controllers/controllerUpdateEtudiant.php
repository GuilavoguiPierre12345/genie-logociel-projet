<?php
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Etudiant.php');
$etudiant = new Etudiant(null, null, null, null, null, null, null);
$etudiant_cible = $etudiant ->afficherEtudiantEnFonctionDeMatricule($matricule);

require_once('../resources/controlInput.php');

$erreurs = [];
if (isset($_POST) && !empty($_POST)) {

    $nom = checkinput($_POST['nom']);
    if (empty($nom)) {
        $erreurs['nom'] = 'Veuillez saisir un nom !!';
        $success = false;
    }

    $prenom = checkinput($_POST['prenom']);
    if (empty($prenom)) {
        $erreurs['prenom'] = 'Veuillez saisir un prénom';
        $success = false;
    }

    $genre = checkinput($_POST['genre']);
    if (empty($genre)) {
        $erreurs['genre'] = 'Veuillez choisir le genre';
        $success = false;
    }

    $adresse = checkinput($_POST['adresse']);
    if (empty($adresse)) {
        $erreurs['adresse'] = 'Adresse est obligatoire';
        $success = false;
    }

    $telephone = (int)checkinput($_POST['telephone']);
    if (empty($telephone) && $telephone == 0) {
        $erreurs['telephone'] = 'Veuilez entrer votre numéro de téléphone';
        $success = false;
    }

    // cette partie appel la méthode updateEtudiant pour la modification
    if (!isset($success)) {
        $etudiant->updateEtudiant($matricule,$nom,$prenom,$genre,$adresse,$telephone);
        $etudiant_cible = $etudiant ->afficherEtudiantEnFonctionDeMatricule($matricule);
        $message = "Modification effectuée avec succès";
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
        addhistorique($l,'Update Etudiant');
    }else
        $message = "Il y a une erreur dans votre formulaire";
} 

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'formulaireUpdateEtudiant.php');
