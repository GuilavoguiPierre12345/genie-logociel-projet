<?php
// ce fichier contient le contrôle des matieres libres
require_once(__DIR__.DIRECTORY_SEPARATOR.'controllerMatiereLibre.php');

$enseignant_cible = $enseignant ->afficherEnseignantEnFonctionDeMatricule($matricule);
$matiere_de_Enseignant_cible = explode(',',$enseignant_cible[0]->matieres);

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


    $telephone = (int)checkinput($_POST['telephone']);
    if (empty($telephone) && $telephone == 0) {
        $erreurs['telephone'] = 'Veuilez entrer votre numéro de téléphone';
        $success = false;
    }

    if (isset($_POST['matieres'])) {
        $matieres = ($_POST['matieres']);
        if (empty($matieres)) {
            $erreurs['matieres'] = 'Veuilez choisir au moins une matière !!';
            $success = false;
        }
    } else {
        $erreurs['matieres'] = 'Veuilez choisir au moins une matière !!';
        $success = false;
    }

    // cette partie appel la méthode updateEnseignant pour la modification
    if (!isset($success)) {
        $enseignant->updateEnseignant($matricule,$nom,$prenom,$genre,$telephone,$matieres);
        $enseignant_cible = $enseignant ->afficherEnseignantEnFonctionDeMatricule($matricule);
        $message = "Modification effectuée avec succès";
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
        addhistorique($l,'Update info enseignant');
    }else
        $message = "Il y a une erreur dans votre formulaire";
} 

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'formulaireUpdateEnseignant.php');
