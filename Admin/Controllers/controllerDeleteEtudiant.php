<?php
    if (!empty($matricule_cible)) {
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'controlDoublon.php');
        $nombre_enregistrement = selectionne_1_champs('session','etudiant','etudiant',$matricule_cible);
        // var_dump(count($nombre_enregistrement));
        if(count($nombre_enregistrement) >1)
        {
            require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Sesion.php');
            $ession_supprimer = new Sesion(null,null,null);
            $ession_supprimer ->deleteSession($matricule_cible,$session_cible);
        }elseif(count($nombre_enregistrement) == 1){
            require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Etudiant.php');
            require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
            $etudiant_supprimer = new Etudiant(null,null,null,null,null,null,null);
            $etudiant_supprimer ->deleteEtudiant($matricule_cible);
            addhistorique($l,'Supprimer Etudiant');
        }
        $message = 'Suppression valide !';
        // die;
        require_once(__DIR__.DIRECTORY_SEPARATOR.'controllerListeEtudiant.php');
    } else
        $message = "Erreur de suppression de l'Etudiant !!";