<?php
    if (!empty($matricule_cible)) {
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Enseignant.php');
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
        $supprime_enseignant = new Enseignant(null,null,null,null,null,null);
        $supprime_enseignant ->deleteEnseignant($matricule_cible);
        addhistorique($l,'supprimer enseignant');
        require_once(__DIR__.DIRECTORY_SEPARATOR.'controllerListeEnseignant.php');
    } else
        $message = "Erreur de suppression de l'Enseignant !";