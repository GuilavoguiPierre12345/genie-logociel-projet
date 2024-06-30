<?php
    // ce fichier est utilisé ici pour m'aidé à faire les statistique de base
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'selection.php');
    // le nombre de d'étudiant
    $etudiant = selection_1_cle('etudiant','matricule');
    $nombre_etudiant = count($etudiant);
    // le nombre de fille du département
    $filles = selection_1_critere('etudiant','genre','F');
    $nombre_filles = count($filles);
    // nombre de garçon 
    $garcons = selection_1_critere('etudiant','genre','M');
    $nombre_garcons = count($garcons);
    // le nombre de matière
    $matiere = selection_1_cle('matiere','idmatiere');
    $nombre_matiere = count($matiere);
    // le nombre de professeurs
    $professeur = selection_1_cle('enseignant','matricule');
    $nombre_enseignant = count($professeur);
    
// ////////////////////////// fin des statistiques /////////////////////////////

// controle des valeurs pour le changement de login et psw
if(isset($_POST['updateroot']) && !empty($_POST))
{
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'selection.php');

    $login = htmlentities($_POST['new_login'],ENT_QUOTES);
    if(empty($login)){
        $success = false;
    }
    $password = htmlentities($_POST['new_password'],ENT_QUOTES);
    if(empty($password) || strlen($password)<6){
        $success = false;
    }
   
    if(!isset($success)){
        $updatesuccess = '<span class="alert alert-success h6">Modification effectuée avec succes et prise en compte à la prochaine connexion</span>';
        // $password = crypt($password, '$6$rounds=5000$genieinformatique'); //le $6$rounds=5000$ est le CRYPT-SHA512 et le reste est notre clé de cryptage qui doit etre unique et confidentiel
       updatelogin($login,$password,$_SESSION['id']);
    //    require_once(dirname(__DIR__,2).DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'deconnexion.php');
    }else 
        $erreur = 'Modification invalide, recommencez !';
}

// controle des valeurs pour le changement des indicateurs
if(isset($_POST['updateindicateurs']) && !empty($_POST))
{
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'selection.php');

    $indicateur1 = htmlentities($_POST['indicateur1'],ENT_QUOTES);
    if(empty($indicateur1)){
        $valide = false;
    }
    $indicateur2 = htmlentities($_POST['indicateur2'],ENT_QUOTES);
    if(empty($indicateur2)){
        $valide = false;
    }
    $indicateur3 = htmlentities($_POST['indicateur3'],ENT_QUOTES);
    if(empty($indicateur3)){
        $valide = false;
    }
   
    if(!isset($valide)){
        // $password = crypt($password, '$6$rounds=5000$genieinformatique'); //le $6$rounds=5000$ est le CRYPT-SHA512 et le reste est notre clé de cryptage qui doit etre unique et confidentiel
        updateindicateur($indicateur1,$indicateur2,$indicateur3,$_SESSION['id']);
        $updatevalide = '<span class="alert alert-success h6">Modification effectuée avec succes et prise en compte à la prochaine connexion</span>';
    //    require_once(dirname(__DIR__,2).DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'deconnexion.php');
    }else 
        $error = 'Modification invalide, tous les champs sont obligatoire !';
}

// ajout d'un nouveau administrateur
if(isset($_POST['newadmin']) && !empty($_POST))
{
    $isValid = true;
    $newloginadmin = htmlentities($_POST['newloginadmin'],ENT_QUOTES);
    $newpswadmin = htmlentities($_POST['newpswadmin'],ENT_QUOTES);
    $droit = htmlentities($_POST['droit'],ENT_QUOTES);

    if(empty($newloginadmin) || empty($newpswadmin) || empty($droit)){
        $isValid = false;
        $erreurnewadmin = "Erreur, mot de passe ou login obligatoire";
    }
    
    if($isValid)
    {
        addnewadmin($newloginadmin,$newpswadmin,$droit);
        $messagesucces = 'Admin ajouter avec succès !';
    }

}
// require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'dashboardHome.php');
