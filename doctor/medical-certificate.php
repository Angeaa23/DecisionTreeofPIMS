<?php
set_time_limit(0);
include('include/config.php');
$vid=$_GET['viewid'];
$val=mysqli_query($con,"select * from tblpatient where id = '$vid'");
while ($row_val=mysqli_fetch_array($val)) {
	$patname = $row_val['PatientName'];
	$patcivil = $row_val['PatientCivil'];
	$patgender = (($row_val['PatientGender'] == "Male") ? "Mr." : (($row_val['PatientGender'] == "Female" && $row_val['PatientCivil'] == "Married" || $row_val['PatientCivil'] == "Widowed" || $row_val['PatientCivil'] == "Separated" || $row_val['PatientCivil'] == "Divorced") ? "Mrs." : "Ms."));
}

$val=mysqli_query($con,"select * from tblmedicalhistory where PatientID = '$vid'");
while ($row_val=mysqli_fetch_array($val)) {
	$patage = $row_val['PatientAge'];
	$patmedhis = $row_val['MedHistory'];
	$patcreation = $row_val['CreationDate'];
}

$var = $patage;
$str = preg_replace('/\W\w+\s*(\W*)$/', '$1', $var);

$val=mysqli_query($con,"select * from settings where id = 1");
while ($row_val=mysqli_fetch_array($val)) {
	$address = $row_val['Address'];
	$doctor = $row_val['Doctor'];
}

require_once 'tcpdf/tcpdf.php';

// set timezone
date_default_timezone_set('America/New_York');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Darby May Arazo');
$pdf->SetTitle('Medical Certificate');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->setPrintHeader(false);
$pdf->SetMargins(25, 25, 25);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// set font
$pdf->SetFont('times', '', 10, '', false);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->AddPage('P', 'A4');

$html = '<head>
<style>
	p {
		font-size: 14px;
	}
</style>
<head>
<p style="text-align:center;">Republic of the Philippines<br>
Province of Quezon<br>
Regional Health Office No. 4-A<br>
Office of the Municipal Health Officer<br>'
. $address . '</p>
<p></p>
<p></p>

<h1 style="text-align:center;font-size:30px;">MEDICAL CERTIFICATE</h1>

<p></p>
<p></p>
<p></p>

<p style="text-align:justify;"><b>To Whom It May Concern:</b><br>

<br style="text-indent:12.7mm;">This is to certify that ' . $patgender . ' ' . $patname . ', <span style="text-transform:lowercase;">' . $patcivil . '</span>, 

' . $str . ' of age, consulted to me this ' . date('jS \d\a\y \of F, Y', strtotime($patcreation)). '.<br>
<br>
<b>IMPRESSION:</b>
<br>' . $patmedhis . '<br>

<br style="text-indent:12.7mm;">Issued upon request of the interested party this ' . date('jS \d\a\y \of F, Y') . ' at ' . $address . '.

<br>
<br>
<br>
<br>
<br>
</p>

<p style="text-align:right;"><b><span style="text-transform:uppercase;">' . $doctor . '</span> R.N., M.D., FPAMS</b></p>
<p style="text-indent:82mm;line-height:-1.2">Municipal Health Officer</p>
<p style="text-indent:87mm;line-height:-1.2">' . $address . '</p>
<p style="text-indent:85mm;line-height:-1.2">License No. 0066463</p>

';

		
		
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);

// draw png image
$pdf->Image('../images/agd-logo.png', 20, 28, 25, '', 'PNG', '', 'T', false, 300, 'R', false, false, 0, false, false, false);
$pdf->Image('../images/logo.png', 20, 28, 25, '', 'PNG', '', 'T', false, 300, 'L', false, false, 0, false, false, false);
$pdf->Image('../images/signature.png', 97, 187, '', 18, 'PNG', '', 'B', false, 300, '', false, false, 0, false, false, false);

// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// restore full opacity
$pdf->SetAlpha(1);

$pdf->writeHTMLCell(0, 0, 25, 25, $html, 0, 1, 0, true, '', true);
$pdf->Output('medical-certificate.pdf', 'I');
?>