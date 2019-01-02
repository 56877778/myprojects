<?php
$pageTitle='تقرير بدرجات مادة نظري  ';


include "init.php";
session_start();
if(isset($_SESSION['username']))

{
  $pdf= new FPDF();
  $pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('FPDF tutorial');
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(50,60,100);
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(50,60,100);
$pdf->AddPage('P');
$pdf->SetDisplayMode(real,'default');
$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');
$pdf->Link(10, 20, 33,33, 'http://www.fpdf.org/');
$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(100,10,'FPDF Tutorial',1,0,'C',0);
$pdf->SetXY(10,50);
$pdf->SetFontSize(10);
$pdf->Write(5,'Congratulations! You have generated a PDF. ');
$pdf->Output('example1.pdf','I');



//$stmt_test=$con->prepare("SELECT * FROM examscore WHERE exam_id=?  ");
//$stmt_test->execute(array($examId));
//$exam_found=$stmt_test->FetchAll();
//  $count=$stmt_test->rowCount();

?>

<?php

include  $tpl.'footer.php';
}
?>
