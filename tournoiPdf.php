<?php
require("include/connexion.php");
require("fpdf/fpdf.php");
//Exemple : $pdf->Cell(0,10,'Tournois Jeunes',0,1,"C");
//Texte d'une cellule faisant toute la largeur de la page (0)
//Avec une hauteur de 10 mm (10)
//Avec ecris Tournois Jeunes
//Sans bordure (0)
//Avec un retour à la ligne (1)
//Centrée ("C")
if($_GET["categorie"] == 0)
{
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'Tournois Jeunes',"B",1,"C");
    $pdf->SetFont('Arial','B',8);
    $lesTournoisJeunes = $cnx->query("SELECT * FROM tournoi WHERE categorie = 0");
    $lesTournoisJeunes->setFetchMode(PDO::FETCH_OBJ);
    $pdf->Cell(0,20);
    $pdf->Ln();
    $pdf->Cell(70,10,"Nom",1,0,'C');
    $pdf->Cell(40,10,"Club",1,0,'C');
    $pdf->Cell(40,10,"Date",1,0,'C');
    $pdf->Cell(40,10,utf8_decode("Coût"),1,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','',8);
    while($unTournoi = $lesTournoisJeunes->fetch())
    {
        $pdf->Cell(70,10,utf8_decode($unTournoi->tournoi),1,0,'C');
        $pdf->Cell(40,10,utf8_decode($unTournoi->club),1,0,'C');
        $pdf->Cell(40,10,utf8_decode($unTournoi->date),1,0,'C');
        $pdf->Cell(40,10,utf8_decode($unTournoi->inscription),1,0,'C');
        $pdf->Ln();
    }
    $pdf->Output();
    $cnx->closeCursor();
}
else
{

}