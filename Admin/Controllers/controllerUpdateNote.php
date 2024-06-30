<?php
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'generateSession.php');
$annee_universitaire = $sessionCourante->generateSession(); //la session universitaire en cours

require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'selection.php');
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Etudiant.php');
$etudiant = new Etudiant(null,null,null,null,null,null,null);

require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Note.php');
$note = new Note(null,null,null,null,null,null,null,null);

$liste_des_matieres = selection_1_cle('matiere','libellematiere');

if(isset($_POST['valider']) && !empty($_POST['valider']) && isset($_POST['note1'])
    && isset($_POST['note2']) && isset($_POST['note3'])){
    $success = true;
    
    $mat = $_POST['mat'];
    if(empty($mat))
        $success = false;

    $promo = $_POST['promo'];
    if(empty($promo))
        $success = false;

    $semes = $_POST['semes'];
    if(empty($semes))
        $success = false;

    $les_notes1 = $_POST['note1'];
    foreach ($les_notes1 as $n1) {
      if($n1<0 || $n1>10)
      {
        $success = false;
        break;
      }
    }

    $les_notes2 = $_POST['note2'];
    foreach ($les_notes2 as $n2) {
        if($n2<0 || $n2>10)
        {
          $success = false;
          break;
        }
      }

    $les_notes3 = $_POST['note3'];
    foreach ($les_notes3 as $n3) {
        if($n3<0 || $n3>10)
        {
          $success = false;
          break;
        }
      }
    $liste_etudiants = $_POST['les_matricules'];
            
    if($success){
        for ($i=0; $i < count($les_notes1); $i++) { 
            $notes1 = $les_notes1[$i];
            $notes2 = $les_notes2[$i];
            $notes3 = $les_notes3[$i];
            $etudiants = $liste_etudiants[$i];

            $note->updateNote($notes1,$notes2,$notes3,$etudiants,$mat,$semes,$promo,$annee_universitaire);
        }
        require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Historique.php');
        addhistorique($l,'Update note');
        $message_success = 'Modification des notes validée avec succès 👍🏻👍🏻 !';
    }else
        $message_erreur = "Modification imposible 👎🏻👎🏻 vérifier que tout les champs de notes sont remplis !";
}


// controle des informations pour l'affichage de la fiche de note
if(isset($_POST['choix_valide'])){
    $valide = true;
    $matier = $_POST['matiere'];
    if(empty($matier)){
        $erreur['matiere'] = "choix obligatoire";
        $valide = false;
    }
    $semestre = $_POST['semestre'];
    if(empty($semestre)){
        $erreur['semestre'] = "choix obligatoire";
        $valide = false;
    }
    $promotion = $_POST['promotion'];
    if(empty($promotion)){
        $erreur['promotion'] = "choix obligatoire";
        $valide = false;
    }
    if($promotion<=14){
        $erreur['promotion']='numéro de promotion invalide (>=15)';
        $valide = false;
    }

    if($valide){
        // la liste des étudiants en fonction de la promotion et de l'année universitaire
        $fiche_note = $note ->afficherNote_min($matier,$semestre,$promotion,$annee_universitaire); 
    }
}
// les infos à fournir pour l'affichage de la fiche note cible
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'demandeInfoFicheNote.php');


require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'formulaireUpdateNote.php');

