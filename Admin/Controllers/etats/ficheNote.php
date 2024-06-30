<?php
require_once(dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'helpCalculNote.php');

require_once(dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'generateSession.php');
$annee_universitaire = $sessionCourante->generateSession(); //la session universitaire en cours

// initiation du fichier de lecture en pdf
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'fpdf' . DIRECTORY_SEPARATOR . 'fpdf.php');

require_once(dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Note.php');

$pdf = new FPDF('L');
// rendre automatique l'ajout d'une nouvelle page
$pdf->AddPage();
// la police Arial gras taille 16 
$pdf -> SetFont('Times','',16);
    
    // mise en forme de l'entête
    
        $note = new Note(null, null, null, null, null, null, null, null);

        if(isset($_POST['matiere']) && isset($_POST['promotion']) && isset($_POST['semestre']))
        {  $valide = true;
            $mat = ($_POST['matiere']);
            $semes = ($_POST['semestre']);
            $promot = ($_POST['promotion']);
            if(strlen($mat)===1){
                $valide=false;
            }
            if(strlen($semes)===1){
                $valide=false;
            }
            if(strlen($promot)===1){
                $valide=false;
            }
            if($valide) {
                $fiche = $note->afficherNote_min($mat,$semes,$promot,$annee_universitaire);
            }
               
            
        }
            // $fiche = $note->afficherNote_min('JAVASCRIPT',1,15,$annee_universitaire);
 
        // le logo
         $pdf -> Image('fpdf/logo.jpeg',120,25,40,40);
        // police Arial gras taille 15
        $pdf -> SetFont('Times','',18);
        // le text d'entête
        $pdf -> Ln(20);
        $pdf -> Cell(90,10,utf8_decode('Institut Supérieur'),0,0,'C');
        $pdf ->Cell(80);
        $pdf -> Cell(90,10,utf8_decode('République de Guinée'),0,0,'C');
        // saut de ligne 
        $pdf -> Ln();
        $pdf -> Cell(90,10,'de',0,0,'C');
        $pdf ->Cell(95);
        $pdf -> SetFont('Times','I',16);
        $pdf -> SetTextColor(255,0,0);
        $pdf -> Cell(20,10,'travail-',0,0);
        $pdf -> SetTextColor(255,255,0);
        $pdf -> Cell(20,10,'justice-',0,0);
        $pdf -> SetTextColor(0,128,0);
        $pdf -> Cell(40,10,'solidarite',0,0);
        $pdf -> SetTextColor(0,0,0);
        $pdf -> SetFont('Times','',18);
        $pdf -> Ln();
        $pdf -> Cell(90,10,'Technologie de Mamou',0,0,'C');
        $pdf ->Cell(80);
        $pdf -> Cell(90,10,'M.E.S.R.S',0,0,'C');
        $pdf -> Ln();
        $pdf -> Cell(90,10,'BC :63/ Email :astourep@gmail.com',0,0,'C');
        $pdf ->Cell(80);
        $pdf -> Cell(80,10,'Tel : 621 22 34 63',0,0,'C');

        $pdf -> Ln(15);
        $pdf ->Cell(80);
        $pdf -> Cell(90,10,'Departement : Genie Informatique',0,0,'C');
        

        $pdf -> Ln(15);
        $pdf -> SetFont('Arial','',12);
        $pdf->Cell(132);
        $pdf -> Cell(15,10,utf8_decode('0.25'),1,0,'');
        $pdf -> Cell(15,10,utf8_decode(''),0,0,'');
        $pdf -> Cell(15,10,utf8_decode('0.35'),1,0,'');
        $pdf -> Cell(15,10,utf8_decode(''),0,0,'');
        $pdf -> Cell(15,10,utf8_decode('0.4'),1,0,'');

        $pdf -> Ln();
        $pdf -> Cell(7,10,utf8_decode('N°'),1,0,'');
        $pdf -> Cell(30,10,utf8_decode('Matricule'),1,0,'');
        $pdf -> Cell(40,10,utf8_decode('Nom'),1,0,'');
        $pdf -> Cell(40,10,utf8_decode('Prénom'),1,0,'');
        $pdf -> Cell(15,10,utf8_decode('Note1'),1,0,'');
        $pdf -> Cell(15,10,utf8_decode('Note1'),1,0,'');
        $pdf -> Cell(15,10,utf8_decode('Note2'),1,0,'');
        $pdf -> Cell(15,10,utf8_decode('Note2'),1,0,'');
        $pdf -> Cell(15,10,utf8_decode('Note3'),1,0,'');
        $pdf -> Cell(15,10,utf8_decode('Note3'),1,0,'');
        $pdf -> Cell(20,10,utf8_decode('Moy Gle'),1,0,'');
        $pdf -> Cell(15,10,utf8_decode('N Lit*'),1,0,'');
        $pdf -> Cell(30,10,utf8_decode('Obs'),1,0,'');
        $pdf ->Ln();
    
    // ########################## fin de la mise en forme #####################

        $i=1;
        if(isset($fiche)):
            foreach ($fiche as $ligne) {
            $pdf -> Cell(7,10,$i,1,0);
            $pdf -> Cell(30,10,$ligne->matricule,1,0);
            $pdf -> Cell(40,10,utf8_decode($ligne->nom),1,0);
            $pdf -> Cell(40,10,utf8_decode($ligne->prenom),1,0);
            $pdf -> Cell(15,10,$ligne->note1,1,0,'C');
            $pdf -> Cell(15,10,$ligne->note1*0.25,1,0,'C');
            $pdf -> Cell(15,10,$ligne->note2,1,0,'C');
            $pdf -> Cell(15,10,$ligne->note2*0.35,1,0,'C');
            $pdf -> Cell(15,10,$ligne->note3,1,0,'C');
            $pdf -> Cell(15,10,$ligne->note3*0.4,1,0,'C');
            $pdf -> Cell(20,10,moyenneGle_Obs($ligne->note1,$ligne->note2,$ligne->note3,'moy'),1,0,'C');
            $pdf -> Cell(15,10,moyenneGle_Obs($ligne->note1,$ligne->note2,$ligne->note3,'lit'),1,0,'C');
            $pdf -> Cell(30,10,moyenneGle_Obs($ligne->note1,$ligne->note2,$ligne->note3,'obs'),1,1,'C');

            $i++;
            }
        endif;
        $pdf ->Ln(10);
    // pied de page
        $pdf ->SetFont('Arial','I',18);
        $pdf ->Cell(180);
        $pdf ->Cell(80,50,'Mamou le '.date('d /n /Y'));

        $pdf ->Ln(10);
        $pdf ->Cell(180);
        $pdf ->Cell(80,50,utf8_decode('Le chef de Département'),0,0);
        $pdf ->Ln(50);
        $pdf ->Cell(190);
        $pdf -> SetFont('Times','B',16);
        $pdf ->Cell(80,50,utf8_decode('M.Ibrahima TOURE'),);
        // le numéro de la cellule
        // $pdf ->Cell(0,10,'Page: '.$pdf->PageNo().'/{nb}',0,0);

// l'affichage de la page
$pdf->Output();

