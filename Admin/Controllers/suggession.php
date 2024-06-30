<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'contacts.php');
if(isset($_POST['supprimer']) && !empty($_POST))
{
    $id = htmlentities($_POST['id'],ENT_QUOTES);
    deletesuggession($id);
}

// affichage des suggessions 
$suggessions = affichesuggession();
// le fichier d'affichage de toutes les suggestion 
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'suggession.php');