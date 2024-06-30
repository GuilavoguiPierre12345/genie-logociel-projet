<?php
require_once(dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'generateSession.php');
$annee_universitaire = $sessionCourante->generateSession(); //la session universitaire en cours

// initiation du fichier de lecture en pdf
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'fpdf' . DIRECTORY_SEPARATOR . 'fpdf.php');

require_once(dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Etudiant.php');
// $etudiant = new Etudiant(null, null, null, null, null, null, null, null);
// $liste = $etudiant ->afficherEtudiants(15,'2022-2023');
$pdf = new FPDF('L');
// rendre automatique l'ajout d'une nouvelle page
$pdf->AddPage();
// la police Arial gras taille 16 
$pdf -> SetFont('Times','',16);
    
    // en tête 
  
        $etudiant = new Etudiant(null, null, null, null, null, null, null, null);
        $promot = 15;
        if(isset($_GET['promotion']) && !empty($_GET['promotion']))
        {
            $promot = htmlentities($_GET['promotion']);
        }
        $liste = $etudiant ->afficherEtudiants($promot,$annee_universitaire);
 
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
        $pdf -> Cell(150,10,'LISTE DES ETUDIANTS PROMOTION :',0,0,'R');
        $pdf -> Cell(10,10,$promot,0,0);

        $pdf -> Ln(15);
        $pdf -> Cell(10,10,utf8_decode('N°'),1,0,'');
        $pdf -> Cell(35,10,utf8_decode('Matricule'),1,0,'');
        $pdf -> Cell(50,10,utf8_decode('Nom'),1,0,'');
        $pdf -> Cell(50,10,utf8_decode('Prénom'),1,0,'');
        $pdf -> Cell(20,10,utf8_decode('Genre'),1,0,'');
        $pdf -> Cell(25,10,utf8_decode('Niveau'),1,0,'');
        $pdf -> Cell(20,10,utf8_decode('Promo'),1,0,'');
        $pdf -> Cell(30,10,utf8_decode('Adresse'),1,0,'');
        $pdf -> Cell(35,10,utf8_decode('Telephone'),1,0,'');
        $pdf ->Ln();
      
        // calcul de la largeur du titre de positionement
        // $w = $pdf -> GetStringWidth($liste[0]->matricule)+6;
        // $pdf -> SetX((210-$w)/2);

        $i=1;
        $pdf -> SetFont('Arial','',14);
        foreach ($liste as $key => $value) {
           $pdf -> Cell(10,10,$i,1,0);
           $pdf -> Cell(35,10,$value->matricule,1,0);
           $pdf -> Cell(50,10,utf8_decode($value->nom),1,0);
           $pdf -> Cell(50,10,utf8_decode($value->prenom),1,0);
           $pdf -> Cell(20,10,$value->genre,1,0,'C');
           $pdf -> Cell(25,10,$value->niveau,1,0,'C');
           $pdf -> Cell(20,10,$value->promotion,1,0,'C');
           $pdf -> Cell(30,10,utf8_encode($value->adresse),1,0,'C');
           $pdf -> Cell(35,10,$value->telephone,1,1);

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

