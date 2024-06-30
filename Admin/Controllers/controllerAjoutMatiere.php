<?php
require_once('../resources/controlInput.php');

$erreurs = [];
if (isset($_POST) && !empty($_POST) && !isset($_POST['recherche'])) {
    $codemat = checkinput($_POST['codemat']);
    if (empty($codemat) || strlen($codemat) != 5) {
        $erreurs['codemat'] = 'Code matiere invalide, taille =5 !!';
        $success = false;
    }

    $libellemat = checkinput($_POST['libellemat']);
    if (empty($libellemat)) {
        $erreurs['libellemat'] = 'champ obligatoire !!';
        $success = false;
    }

    $semestremat = (int)checkinput($_POST['semestremat']);
    if (empty($semestremat) || ($semestremat) < 1 || ($semestremat) >8){
        $erreurs['semestremat'] = 'Valeur de la semestre non valide !';
        $success = false;
    }

    if (!isset($success)) {
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'controlDoublon.php');
        $doublon = isExist_with_2_keys('idmatiere','libellematiere', 'matiere', $codemat,$libellemat);
        if ($doublon) {
            $message = "Risque de doublon, cette matière existe !!";
            $erreurs['codemat'] = 'Le code de la matiere existe !!!';
        } else {
            require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
            require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Matiere.php');
            $matiere = new Matiere($codemat, $libellemat, $semestremat);
            $matiere->ajouterMatiere();
            $message = "matière : \"$libellemat\" enregistrer avec succès";
            addhistorique($l,'Ajout matière');
        }
    } else {
        $message = "Il y a une erreur dans votre formulaire d'ajout de matière !!";
    }
}
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'formulaireAjoutMatiere.php');

