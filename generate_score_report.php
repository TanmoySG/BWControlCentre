<?php
//include connection file 
include_once("connection.php");
include_once('extlib/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    $this->Image('BWLOGOF190519-2.png',10,10,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Scores',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$display_heading = array('sl'=>'Sl','team_code'=>'Team Code', 'points'=> 'Score');

$result = mysqli_query($db, "SELECT * FROM prelim_point ORDER BY points DESC") or die("database error:". mysqli_error($db));
$header = mysqli_query($db, "SHOW columns FROM prelim_point");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>