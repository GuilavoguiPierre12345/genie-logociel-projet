<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Emploi.php');
$emploi = new Emploi(null,null,null,null,null);

require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'demandeLicence.php');
if(isset($_POST['numero_licence'])){
    $licence = (int)checkinput($_POST['numero_licence']);
    $emploi_licence = $emploi -> afficheEmploi($licence);

    require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'emploiParLicence.php');

}