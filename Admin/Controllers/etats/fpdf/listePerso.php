<?php
// inclusion du fichier de lecture pdf
require('fpdf.php');

// Requet pour afficher
require_once'../../../connexion/connexion.php';
  
    $afficheValue=$db->prepare("SELECT * FROM medecin ORDER BY id_medecin desc");
    $afficheValue->execute();
    $afficheValues=$afficheValue->fetch();
         
// creation d'une instance fpdf pour le format 
// p portait et L paysage, mm, milimètre Format A4
$pdf = new FPDF('l','mm','A4');
// Ajouter une  pages 
$pdf->AddPage();
// $pdf->Image(file:'img.jpg', x:10, y:5, w:130, h:20)
// pour donnet une police taile de police

$pdf->SetFont('Arial','B',16);
// Logo
    $pdf->Image('logo.jpg',10,5,30);
    // chaud de ligne 
      $pdf->Ln(18);
// affiche une cellule
      // Couleurs du cadre, du fond et du texte
    // $pdf->SetDrawColor(0,80,180);
    
    // Epaisseur du cadre (1 mm)
    // $pdf->SetLineWidth(1);
    // Titre T TOP, B BOTTO, R right,L lelft


$pdf->ln();
$pdf->cell(10,20, 'LISTE DES MEMBRES DU BUREAU');
$pdf->ln();

$pdf->Cell(40,10,'Nom !', 'LTRB');
$pdf->cell(40,10,'Prenpms !', 'LTRB');
$pdf->cell(40,10,'Sexe !', 'LTRB');
$pdf->cell(40,10,'Telephone !', 'LTRB');
$pdf->cell(40,10,'Adresse !', 'LTRB');
$pdf->cell(40,10,'Fonction !', 'LTRB');
$pdf->ln();

// $value['prenom'];
// $value['sexe'];
// $value['telephone'];
// $value['adresse'];
// $value['fonction'];
   // $nom=$afficheValues['nom'];

// $nom=$afficheValues['nom'];
// $prenom=$afficheValues['prenom'];
// $sexe=$afficheValues['sexe'];
// $telephone=$afficheValues['telephone'];
// $adresse=$afficheValues['adresse'];
// $fonction=$afficheValues['fonction'];


    // $pdf->cell(40 ,10, $nom , 'LTRB');
    // $pdf->cell(40,10, $prenom , 'LTRB');
    // $pdf->cell(40,10, $sexe , 'LTRB');
    // $pdf->cell(40,10, $telephone , 'LTRB');
    // $pdf->cell(40,10, $adresse , 'LTRB');
    // $pdf->cell(40,10, $fonction , 'LTRB');
$nom=$afficheValues['nom'];
$prenom=$afficheValues['prenom'];
$sexe=$afficheValues['sexe'];
$telephone=$afficheValues['telephone'];
$adresse=$afficheValues[    'adresse'];
$fonction=$afficheValues['fonction'];
foreach ($afficheValues as  $value) {
    $pdf->cell(20,10,  $value, 'LTRB');
}

// aller à la ligne
$pdf->Ln();
$pdf->Ln();
// NUMERO DE PAGE
 
// permet de termine et envoiye le document au navigater
$pdf->Output();
?>