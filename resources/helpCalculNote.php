<?php

// la fonction pour calculer la moyenne
function moyenneGle_Obs($note1, $note2, $note3, $type)
{
    $moy = ($note1 + $note2 + $note3) / 3;
     
    if ($type == 'moy')
        // la moyenne Gle
        return number_format($moy,2,'.',' ') ;
    elseif($type == 'obs') {
        // l'observation
        if ($moy >= 8 && $moy <= 10) {
            return 'TRES BIEN';
        } elseif ($moy >= 7 && $moy <= 7.99) {
            return 'BIEN';
        } elseif ($moy >= 6 && $moy <= 6.99) {
            return 'ASSEZ BIEN';
        } else
            return 'PASSABLE';
    }elseif($type =='lit'){
        // la moyenne litérale
        switch($moy){
            case ($moy >= 9 && $moy <= 10) :
                return 'A+';
                break;

            case ($moy >= 8.50 && $moy <= 8.99) :
                return 'A';
                break;
            
            case ($moy >= 8.00 && $moy <= 8.49) :
                return 'A-';
                break;

            case ($moy >= 7.50 && $moy <= 7.99) :
                return 'B+';
                break;

            case ($moy >= 7.25 && $moy <= 7.49) :
                return 'B';
                break;

            case ($moy >= 7.00 && $moy <= 7.24) :
                return 'B-';
                break;

            case ($moy >= 6.50 && $moy <= 6.99) :
                return 'C+';
                break;

            case ($moy >= 6.25 && $moy <= 6.49) :
                return 'C';
                break;
            
            case ($moy >= 6.00 && $moy <= 6.24) :
                return 'C-';
                break;
            
            case ($moy >= 5.67 && $moy <= 5.99) :
                return 'D+';
                break;
            case ($moy >= 5.34 && $moy <= 5.66) :
                return 'D';
                break;

            case ($moy >= 5.00 && $moy <= 5.33) :
                return 'D-';
                break;
            default : return 'E';
        }

        
    }
    
}

// calcul de la moyenne Lit
