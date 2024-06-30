<?php session_start();
//  les informations de la session
$l = $_SESSION['login'];
$d = $_SESSION['droit'];


$request_uri = (explode('=',$_SERVER['REQUEST_URI']));
if(isset($request_uri[1]) && $request_uri[1]==='deconnecter'){
    require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'deconnexion.php');
    header('Location:'.$_SERVER['REQUEST_URI']);
}

if(isset($_SESSION['login'])) :
    // ================================== LE HEADER =============================================
    require_once(__DIR__.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'header.php');

// ==================Le controleurs des valeurs saisies par l'utilisateur===============
require_once('../resources/controlInput.php');

if(isset($request_uri[1])){
    $cible = explode('_',$request_uri[1]);
    switch($cible[0])
    {
        
        case 'home' : require_once('Views/dashboardHome.php');
            break;

        case 'ajoutEtudiant' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerAjoutEtudiant.php');
            break;

        case 'ajoutEnseignant' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerAjoutEnseignant.php');
            break;

        case 'listeEtudiant' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerListeEtudiant.php');
            break;

        case 'listeEnseignant' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerListeEnseignant.php');
            break;

        case 'listeMatieres' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerListeMatieres.php');
            break;

        case 'deleteEtudiant' :
                $matricule_cible = $session_cible='';
                if(isset($cible[1]))
                     $matricule_cible = $cible[1];
                if(isset($cible[2]))
                     $session_cible = $cible[2];
                               
                require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerDeleteEtudiant.php');
            break;
        
        case 'deleteEnseignant' :
            $matricule_cible = '';
                if(isset($cible[1]))
                     $matricule_cible = $cible[1];
                               
                require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerDeleteEnseignant.php');
            break;
        
        case 'deleteMatiere' :
            $matricule_cible = '';
                if(isset($cible[1]))
                     $matricule_cible = $cible[1];
                               
                require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerDeleteMatiere.php');
            break;

        case 'updateEtudiant' :
            $matricule ='';
            if(isset($cible[1]))
                $matricule = $cible[1];
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerUpdateEtudiant.php');
            break;
        
        case 'updateEnseignant' :
            $matricule ='';
            if(isset($cible[1]))
                $matricule = $cible[1];
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerUpdateEnseignant.php');
            break;
        
        case 'elaborerEmploi' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerEmploi.php');
            break;
        
        case 'afficheEmploi' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerEmploiAffiche.php');
            break;

        case 'updateEmploi' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerUpdateEmploi.php');
            break;
        
        case 'reporterNotes' : 
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerNotes.php');
            break;
        
        case 'updateNotes' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerUpdateNote.php');
            break;
        
        case 'afficherNotes' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'ficheNote.php');
            break;

        case 'ajoutEvenement' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerEvenement.php');
            break;

        case 'listeEvenement' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerListeEvenement.php');
            break;

        case 'partenaires' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerListePartenaire.php');
            break;

        case 'ajoutpartenaires' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerPartenaire.php');
            break;

        case 'contacts' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'controllerContacts.php');
            break;

        case 'suggession' :
            require_once(__DIR__.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'suggession.php');
            break;

        default :  require_once('Views/dashboardHome.php');      
    }
}else
    require_once('Views/dashboardHome.php');

// ========================== LE FOOTER ===========================================
require_once(__DIR__.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'elements'.DIRECTORY_SEPARATOR.'footer.php');
// else :
//     require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'deconnexion.php');
endif;
?>
