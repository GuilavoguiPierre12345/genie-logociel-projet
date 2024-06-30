<?php
// cette fonction permet de controler les valeur saisie pour la sécurité contre les injections SQL
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'filtre_donnee_tableau.php');


require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Emploi.php');
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Matiere.php');
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Enseignant.php');

$enseignant = new Enseignant(null, null, null, null, null, null);
$liste_enseignant = $enseignant->afficherEnseignant();

$matiere = new Matiere(null, null, null);

if (
    isset($_POST['jours']) && isset($_POST['heures']) && isset($_POST['matieres'])
    && isset($_POST['enseignants']) && isset($_POST['licence'])
) {
    $success = true;

    $jours = $_POST['jours'];
    $jours = filter_array($jours);

    $heures = $_POST['heures'];
    $heures = filter_array($heures);

    $matieres = $_POST['matieres'];
    $matieres = filter_array($matieres);

    $licences = $_POST['licence'];
    $licences = filter_array($licences);
    if ($licences[0] == '') {
        $success = false;
        $message_erreur = "Erreur veuillez valider le choix d'une licence !";
    }
    $profs = $_POST['enseignants'];
    $profs = filter_array($profs);

    // vérification de l'existance d'un emploi pour une licence
    $emp = new Emploi(null, null, null, null, null);
    $temoin_emploi_existe = $emp->is_exist_emploi($licences[0]);
    if ($temoin_emploi_existe) {
        $success = false;
        $message_erreur = 'Désolé un emploi existe déjà pour la licence : ' . $licences[0] . ' voir la modification emploi !';
    }

        // controle de doublon dans l'emploi du temps
        for ($i = 0; $i < count($jours) - 1; $i++) {
            if(!empty($heures[$i]) && $matieres[$i]!='vide' && $profs[$i]!='empty')
            {
                if (($heures[$i] == $heures[$i+1]) && ($matieres[$i] == $matieres[$i+1] && ($profs[$i] == $profs[$i+1]))
                ) {
                    $success = false;
                    $message_erreur = "Désolé il y a doublon d'information dans votre emploi !";
                    break;
                }
            }
        }

        for ($k = 0; $k < count($jours); $k++) {
            if ($matieres[$k] == 'vide' && $profs[$k] != 'empty') {
                $success = false;
                $message_erreur = "Il y a une erreur dans votre emploi du temps !";
                break;
            }

            if ((empty($heures[$k]) && $matieres[$k] != 'vide') ||
                (empty($heures[$k]) && $profs[$k] != 'empty')
            ) {
                $success = false;
                $message_erreur = "Il y a une erreur dans votre emploi du temps !";
                break;
            }
        }

    if ($success) {
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
        for ($i = 0; $i < count($jours); $i++) {
            $jour = $jours[$i];
            $heure = $heures[$i];
            $subjet = $matieres[$i];
            $num_licence = $licences[$i];
            $prof = $profs[$i];
            $emploi = new Emploi($jour, $heure, $subjet, $prof, $num_licence);
            $emploi->elaborerEmploi();
        }
        addhistorique($l,'Elaborer emploi');
        $message_success = "Emploi valider avec succèss !";
    }
}

require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'demandeLicence.php');
if (isset($_POST['numero_licence']) && !empty($_POST['numero_licence'])) {
    $licence = (int)checkinput($_POST['numero_licence']);
    if ($licence == 1) {
        $liste_matiere = $matiere->matiere_par_semestre(1, 2);
    }
    if ($licence == 2) {
        $liste_matiere = $matiere->matiere_par_semestre(3, 4);
    }
    if ($licence == 3) {
        $liste_matiere = $matiere->matiere_par_semestre(5, 6);
    }
    if ($licence == 4) {
        $liste_matiere = $matiere->matiere_par_semestre(7, 8);
    }
}
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'formulaireEmploi.php');
