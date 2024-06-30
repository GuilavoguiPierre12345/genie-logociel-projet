<?php
// initiation du fichier de lecture en pdf
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'fpdf' . DIRECTORY_SEPARATOR . 'fpdf.php');

require_once(dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Matiere.php');

$pdf = new FPDF('L');
// rendre automatique l'ajout d'une nouvelle page
$pdf->AddPage();
// la police Arial gras taille 16 
$pdf -> SetFont('Times','',16);
    
    // en tête 
  
        $matiere = new Matiere(null, null, null);
        $liste = $matiere ->afficherMatiere();
 
        // le logo
         $pdf -> Image('fpdf/logo.jpeg',120,10,40,40);
        // police Arial gras taille 15
        $pdf -> SetFont('Times','',18);
        // le text d'entête
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
        $pdf -> Cell(250,10,'LISTE DES MATIERES',0,0,'C');

        $pdf -> Ln(15);
        $pdf -> SetFont('Times','',13);
        $pdf -> Cell(30);
        $pdf -> Cell(20,10,utf8_decode('N°'),1,0,'C');
        $pdf -> Cell(70,10,utf8_decode('CODE MATIERE'),1,0,'C');
        $pdf -> Cell(70,10,utf8_decode('LIBELLE MATIERE'),1,0,'C');
        $pdf -> Cell(70,10,utf8_decode('SEMESTRE'),1,0,'C');
        $pdf ->Ln();
      
        // calcul de la largeur du titre de positionement
        // $w = $pdf -> GetStringWidth($liste[0]->matricule)+6;
        // $pdf -> SetX((210-$w)/2);

        $i=1;
        foreach ($liste as $key => $value) {
            $pdf -> Cell(30);
           $pdf -> Cell(20,10,$i,1,0,'C');
           $pdf -> Cell(70,10,$value->idmatiere,1,0,'C');
           $pdf -> Cell(70,10,utf8_decode($value->libellematiere),1,0,'C');
           $pdf -> Cell(70,10,utf8_decode($value->semestre),1,1,'C');

           $i++;
        }
    
    // pied de page
        $pdf ->SetFont('Arial','I',18);
        $pdf ->Cell(180);
        $pdf ->Cell(80,50,'Mamou le '.date('d /n /Y'));
        
        $pdf ->Ln(10);
        $pdf ->Cell(180);
        $pdf ->Cell(80,50,utf8_decode('Le chef de Département'));
        $pdf ->Ln(50);
        $pdf ->Cell(190);
        $pdf -> SetFont('Times','B',16);
        $pdf ->Cell(80,50,utf8_decode('M.Ibrahima TOURE'),);
        // le numéro de la cellule
        // $pdf ->Cell(0,10,'Page: '.$pdf->PageNo().'/{nb}',0,0);

// l'affichage de la page
$pdf->Output();

