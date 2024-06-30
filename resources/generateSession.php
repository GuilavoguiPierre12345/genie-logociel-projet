<?php

class Generate
{
    /**
     * cette fonction permet de générer la session exemple : 2022-2023
     * @return string $annee_universitaire : qui conrespond à la session courante
     */
    public function generateSession()
    {   
        // la valeur de l'année en cours
        $anneeCourante = (int)(date('Y'));
        // la valeur par défaut de l'année universitaire en cours 
        $mois_univ = (int)(date('n'));

        $annee_universitaire = ($anneeCourante-1) . '-' . ($anneeCourante);
        if($mois_univ >= 10){
            $annee_universitaire = $anneeCourante . '-' . ($anneeCourante+1);
        }
        return $annee_universitaire;
    }
}

$sessionCourante = new Generate();
