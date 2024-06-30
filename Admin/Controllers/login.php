<?php session_start();

    require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'database.php');


// la fonction de selection de tous les admins
function administrateur()
{
    $request = "SELECT * FROM administrateur";
    try {
        $statement = Database::connexion()->prepare($request);
        $statement->execute();
        $admin = $statement->fetchAll(PDO::FETCH_OBJ);
        return $admin;
    } catch (PDOException $e) {
        die("Erreur au niveau de la connexion : " . $e->getMessage());
    }
}

if(isset($_POST['connexion']))
{
   
   $admin = administrateur();

    $login = $_POST['login'];
    if(empty($login)){
        $erreur['login'] = 'login incorrect';
    }
    $password = $_POST['password'];
    if(empty($password)){
        $erreur['mdp'] = 'password incorrect';
    }

    for($i=0; $i<count($admin); $i++)
    {
        if(($admin[$i]->login == $login) && ($admin[$i]->motdepasse == $password))
        {
            $_SESSION['login'] =$login;
            $_SESSION['id'] = $admin[$i]->identifiant;
            $_SESSION['droit'] = $admin[$i]->droit;
            $_SERVER['REQUEST_URI'] = "/glg3/Admin/";
            header('Location:'.$_SERVER['REQUEST_URI']);
            exit; 
        }

        if($admin[$i]->login !== $login){
            $erreur['login'] = 'login incorrect';
            $success = false;
        }
        
        // $password = crypt($password, '$6$rounds=5000$genieinformatique'); //le $6$rounds=5000$ est le CRYPT-SHA512 et le reste est notre clé de cryptage qui doit etre unique et confidentiel
        if($admin[$i]->motdepasse !== $password){
            $erreur['mdp'] = 'password incorrect';
            $success = false;
        }
    }
    
}

// les controles pour l'affichage du mot de passe
if(isset($_POST['updateindicateurs']) && !empty($_POST))
{
    $is_valid = true;
    $ind1 = htmlentities($_POST['indicateur1'],ENT_QUOTES);
    $ind2 = htmlentities($_POST['indicateur2'],ENT_QUOTES);
    $ind3 = htmlentities($_POST['indicateur3'],ENT_QUOTES);

    if(empty($ind1) || empty($ind2) || empty($ind3)){
        $is_valid = false;
        $errorind = 'Champs obligatoire !';
    }

    if($is_valid){
        $indicateurs = administrateur();
        for($j=0; $j<count($indicateurs); $j++)
        {
            if($ind1 === $indicateurs[$j]->indicateur1 && 
               $ind2 === $indicateurs[$j]->indicateur2 && 
               $ind3 === $indicateurs[$j]->indicateur3)
               {
                    $_SESSION['login'] =$indicateurs[$j]->login;
                    $_SESSION['id'] = $indicateurs[$j]->identifiant;
                    $_SESSION['droit'] = $admin[$i]->droit;
                    $_SERVER['REQUEST_URI'] = "/glg3/Admin/";
                    header('Location:'.$_SERVER['REQUEST_URI']);
                    exit;
               }else{
                    $errorlogin = 'Nous sommes désolé si vous avez oublié vos indicateurs';
               }
        }
    }
}

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'connexion.php');
