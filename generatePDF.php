<?php
  session_start();
            if(!isset($_SESSION['valid'])) {
               header('Location: login.php');
            }
require_once("connect.php");
require('fpdf/fpdf.php');

// code for print Heading of tables
$display_heading = array('id'=>'ID', 'firstname'=> 'First Name', 'lastname'=> 'Last Name','designation'=> 'Designation',);

$result = mysqli_query($conn, "SELECT id,firstname,lastname,designation FROM employee WHERE user_name='".$_SESSION['valid']."'") or die("database error:". mysqli_error($conn));
$header = mysqli_query($conn, "SHOW columns FROM employee");
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo1.png',10,-1,30);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Employee List',1,0,'C');
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

$pdf = new PDF();
//header
$pdf->AddPage();
$pdf->setTitle("Employee List");

#$pdf->setHeader("Employee List");

//foter page
$pdf->AliasNbPages();

foreach($header as $heading) {
    if($heading['Field']!="user_name"){
        $pdf->Cell(48,15,$display_heading[$heading['Field']],1);
        $pdf->SetFont('Arial','B',10);
    }
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column){
	$pdf->SetFont('Arial','I',10);
	$pdf->Cell(48,15,$column,1);
}

}
$pdf->Output();
?>