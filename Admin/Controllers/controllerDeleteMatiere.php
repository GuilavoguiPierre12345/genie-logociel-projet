<?php
require_once(__DIR__.DIRECTORY_SEPARATOR.'controllerMatiereLibre.php');
    if (!empty($matricule_cible)) {
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'controlDoublon.php');
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');

        $matiere_cible = selectionne_1_champs('matiere','libellematiere','idmatiere',$matricule_cible);
        
        if(isset($matiere_cible[0]) && in_array($matiere_cible[0]->libellematiere,$liste_matiere_occupe))
            $message = "Erreur de suppression, cette matière appartient à un professeur !";
        else{
            $matiere ->deleteMatiere($matricule_cible);
            $message = 'Suppression valide !';
            addhistorique($l,'Suppression matière');
        }

        require_once(__DIR__.DIRECTORY_SEPARATOR.'controllerListeMatieres.php');
    } else
        $message = "Erreur de suppression de la matière !";