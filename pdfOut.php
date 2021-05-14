<?php
/// Powered by Evilnapsis go to http://evilnapsis.com
include "fpdf/fpdf.php";

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();

// Título
$pdf->SetFont('Arial','B',20);    
$posY = 5;
$pdf->setY(12);
$pdf->setX(10);
$pdf->Cell(5,$posY,"PROYECTO ".strtoupper($_GET['nombreProy']));

//Primera columna
$pdf->SetFont('Arial','B',12);    
$pdf->setY(25);$pdf->setX(10);
$pdf->Cell(5,$posY,"Nombre: ");
$pdf->setY(35);$pdf->setX(10);
$pdf->Cell(5,$posY,"Descripcion:");
$pdf->setY(45);$pdf->setX(10);
$pdf->Cell(5,$posY,"Fecha inicio:");
$pdf->setY(55);$pdf->setX(10);
$pdf->Cell(5,$posY,"Presupuesto:");
$pdf->setY(65);$pdf->setX(10);
$pdf->Cell(5,$posY,"Nom. creador:");
$pdf->setY(75);$pdf->setX(10);
$pdf->Cell(5,$posY,"Estado:");

//Segunda columna
$pdf->SetFont('Arial','',13);    
$pdf->setY(25);$pdf->setX(50);
$pdf->Cell(5,$posY,"----");
$pdf->setY(35);$pdf->setX(50);
$pdf->Cell(5,$posY,"----");
$pdf->setY(45);$pdf->setX(50);
$pdf->Cell(5,$posY,"----");
$pdf->setY(55);$pdf->setX(50);
$pdf->Cell(5,$posY,"----");
$pdf->setY(65);$pdf->setX(50);
$pdf->Cell(5,$posY,"----");
$pdf->setY(75);$pdf->setX(50);
$pdf->Cell(5,$posY,"----");

//Tercera columna
$pdf->SetFont('Arial','',11);    
$pdf->setY(25);$pdf->setX(65);
$pdf->Cell(5,$posY,$_GET['nombreProy']);
$pdf->setY(35);$pdf->setX(65);
$pdf->Cell(5,$posY,$_GET['descripProy']);
$pdf->setY(45);$pdf->setX(65);
$pdf->Cell(5,$posY,$_GET['fechaProy']);
$pdf->setY(55);$pdf->setX(65);
$pdf->Cell(5,$posY,$_GET['presupProy']. " EUR");
$pdf->setY(65);$pdf->setX(65);
$pdf->Cell(5,$posY,$_GET['nomCreProy']);
$pdf->setY(75);$pdf->setX(65);
$pdf->Cell(5,$posY,$_GET['estadoProy']);

//Créditos
$pdf->SetFont('Arial','B',10);    
$pdf->setY(95);$pdf->setX(10);
$pdf->Cell(5,$posY,"PROYECTO PERTENECIENTE A WM, INC");
//Imagen logo
$pdf->Image('img/logoPrin1.jpg' , 11 ,103, 62 , 38,'JPG');

//Salida del PDF
$pdf->output();
