<?php
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Enseignant.php');
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Matiere.php');

$enseignant = new Enseignant(null, null, null, null, null, null);
$matiere = new Matiere(null, null, null);

// controle d'occupation d'une matiere par un professeur
$mats = $matiere->afficherMatiere(); 

$matiere_occupe = $enseignant->matiere_occupes();

if(empty($matiere_occupe)){
    foreach ($mats as $ki => $val) {
        // if(!in_array($val->libellematiere,$liste_matiere_occupe))
         $matiere_libre[] = $val->libellematiere;
     }
}else{
    foreach ($matiere_occupe as $key => $value) {
        $mat_par_enseignant = explode(',', $value->matieres);
        foreach($mat_par_enseignant as $cle => $valeur){
            $liste_matiere_occupe[] = $valeur;
        }
    }

    foreach ($mats as $ki => $val) {
        if(!in_array($val->libellematiere,$liste_matiere_occupe))
         $matiere_libre[] = $val->libellematiere;
     }

}
//======================================================================