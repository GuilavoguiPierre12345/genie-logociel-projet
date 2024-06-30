<?php

require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'selection.php');
$liste_des_matieres = selection_1_cle('matiere','libellematiere');

// controle des informations pour l'affichage de la fiche de note
if (isset($_POST['choix_valide'])) {
    $valide = true;
    $matier = $_POST['matiere'];
    if (empty($matier)) {
        $erreur['matiere'] = "choix obligatoire";
        $valide = false;
    }
    $semestre = $_POST['semestre'];
    if (empty($semestre)) {
        $erreur['semestre'] = "choix obligatoire";
        $valide = false;
    }
    $promotion = $_POST['promotion'];
    if (empty($promotion)) {
        $erreur['promotion'] = "choix obligatoire";
        $valide = false;
    }
    if ($promotion <= 14) {
        $erreur['promotion'] = 'numéro de promotion invalide (>=15)';
        $valide = false;
    }

}
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'demandeInfoFicheNote.php');
?>
<div class="row">
<a target="_blank" href="../Admin/Controllers/etats/ficheNote.php" class="m-3 w-auto btn btn-outline-info">Imprimer fiche note</a>
</div>
