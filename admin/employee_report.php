<?php
require_once('tcpdf/config/lang/ara.php');
require_once('tcpdf/tcpdf.php');
require_once('tcpdf/config/lang/ara.php');
/*class PDF extends FPDF
{
// Page header
function  header1()
{
	// Logo
	$this->Image('fpd/tutorial/logo.png',10,6,30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(30,10,'Title',1,0,'C');
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
}*/
//$pdf=new FPDF();
include 'connect.php';
$tpl='includes/templates/';
$func='includes/function/';
include  $func.'function.php';

//include navbar 

$employeeId=isset($_GET['employeeid'])&& is_numeric($_GET['employeeid'])?intval($_GET['employeeid']):0;
	
	
	$emp=selectfrom('*','employee','WHERE Id',$employeeId);



//start select for deptname

	$dept=selectfrom('name','department','WHERE Id',$emp['department_id']);
	$position=selectfrom('name','employeeposition','WHERE Id',$emp['position_id']);
	$category=selectfrom('name','employeecategory','WHERE Id',$emp['empolyee_category_id']);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 011');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
  
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings


// ---------------------------------------------------------

// set font
$pdf->SetFont('almohanad', '', 12);

// add a page
$pdf->AddPage();

    //Framed title
$pdf->SetTextColor(100, 0, 0, 0);
	
  
   $pdf->Text(140, 0, 'الجمهورية اليمنية');
    $pdf->Text(147, 5, 'جامعة تعز');
    $pdf->Text(140, 10, 'كلية العلوم التطبيقية');
	$pdf->Text(34, 0, 'Republic Of Yemen');
    $pdf->Text(38, 5, 'Taiz University');
    $pdf->Text(34, 10, 'Faculty Of Applied Science');
   $pdf->Ln(10);
   
    //Line break
   
$pdf->Image('tcpdf/images/images.jpg',90,0,30,15);





// ---------------------------------------------------------



$pdf->SetMargins(40,20,30);



$pdf->Ln();
$pdf->SetFillColor(224, 235, 255);
$pdf->Cell(80,8,$emp['first_name'],1,0,'C');
$pdf->Cell(40,8,'الأسم',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['Id'],1,0,'C');
$pdf->Cell(40,8,'الرقم الوظيفي',1,0,'C');
$pdf->Ln();
$pdf->Cell(80,8,$emp['joining_date'],1,0,'C');
$pdf->Cell(40,8,'تاريخ الأنظمام',1,0,'C');
$pdf->Ln();
$pdf->Cell(80,8,$dept['name'],1,0,'C');
$pdf->Cell(40,8,'اسم القسم',1,0,'C');
$pdf->Ln();
$pdf->Cell(80,8,$category['name'],1,0,'C');
$pdf->Cell(40,8,'الفئة',1,0,'C');
$pdf->Ln();
$pdf->Cell(80,8,$position['name'],1,0,'C');
$pdf->Cell(40,8,'الوظيفة',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['qualification'],1,0,'C');
$pdf->Cell(40,8,'المؤهل',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['nationality_id'],1,0,'C');
$pdf->Cell(40,8,'الجنسية',1,0,'C');
$pdf->Ln();
$pdf->Cell(80,8,$emp['email'],1,0,'C');
$pdf->Cell(40,8,'البريد ألألكتروني',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['home_address_line1'],1,0,'C');
$pdf->Cell(40,8,'عنوان لمنزل',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['home_city'],1,0,'C');
$pdf->Cell(40,8,'المدينة',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['home_country'],1,0,'C');
$pdf->Cell(40,8,'البلد',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['office_phone2'],1,0,'C');
$pdf->Cell(40,8,'هاتف المنزل',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['office_address'],1,0,'C');
$pdf->Cell(40,8,'عنوان المكتب',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['fax'],1,0,'C');
$pdf->Cell(40,8,'فاكس',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['office_country'],1,0,'C');
$pdf->Cell(40,8,'البلد',1,0,'C');

$pdf->Ln();
$pdf->Cell(80,8,$emp['office_city'],1,0,'C');
$pdf->Cell(40,8,'المدينة',1,0,'C');
$pdf->output();












?>