<?php
// ce fichier contient le contrôle des matieres libres
require_once(__DIR__.DIRECTORY_SEPARATOR.'controllerMatiereLibre.php');


$erreurs = [];
if (isset($_POST) && !empty($_POST)) {
    $matricule = checkinput($_POST['matricule']);
    if (strlen($matricule) < 10 || empty($matricule)) {
        $erreurs['matricule'] = 'Matricule invalide';
        $success = false;
    }

    $nom = checkinput($_POST['nom']);
    if (empty($nom)) {
        $erreurs['nom'] = 'Champ obligatoire !!';
        $success = false;
    }

    $prenom = checkinput($_POST['prenom']);
    if (empty($prenom)) {
        $erreurs['prenom'] = 'Champ obligatoire';
        $success = false;
    }

    $genre = checkinput($_POST['genre']);
    if (empty($genre)) {
        $erreurs['genre'] = 'Champ obligatoire';
        $success = false;
    }

    $telephone = checkinput($_POST['telephone']);
    if (empty($telephone)) {
        $erreurs['telephone'] = 'Veuilez entrer un numéro de téléphone';
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

    if (!isset($success)) {
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'controlDoublon.php');
        $doublon = isExist_with_1_key('matricule', 'enseignant', $matricule);
        if ($doublon) {
            $message = "Risque de doublon, cet Enseignant est déjà enregistrer !!";
            $erreurs['matricule'] = "Ce matricule existe !!";
        } else {
            $enseignant = new Enseignant($matricule, $nom, $prenom, $genre, $telephone, $matieres);
            $enseignant->ajouterEnseignant();
            $message = "Enregistrement effectuer avec succès";
            $matricule = $nom = $prenom = $telephone = '';
            addhistorique($l,'Ajout enseignant');
        }
    } else
        $message = "Il y a une erreur dans le formulaire";
}
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'formulaireAjoutEnseignant.php');
?>
