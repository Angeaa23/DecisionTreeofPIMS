<?php
//error_reporting(0);
set_time_limit(0);
include('include/config.php');
$vid=$_GET['viewid'];
$val=mysqli_query($con,"select * from tblpatient where ID = '$vid'");
while ($row_val=mysqli_fetch_array($val)) {
	$patname = $row_val['PatientName'];
	$patcontno = $row_val['PatientContno'];
	$patemail = $row_val['PatientEmail'];
	$patgender = $row_val['PatientGender'];
	$patadd = $row_val['PatientAdd'];
	$patbirthplace = $row_val['PatientBirthplace'];
	$patbirthday = $row_val['PatientBirthday'];
	$patcivil = $row_val['PatientCivil'];
	$patreligion = $row_val['PatientReligion'];
	$patblood = $row_val['PatientBlood'];
	$mothername = $row_val['MotherName'];
	$motherbirthday = $row_val['MotherBirthday'];
	$philhealthmember = $row_val['PhilhealthMember'];
	$philhealthstatus = $row_val['PhilhealthStatus'];
	$patregion= $row_val['PatientRegion'];
	$dswdmember = $row_val['DswdMember'];
	$bloodpressure = $row_val['BloodPressure'];
	$pulserate = $row_val['PulseRate'];
	$bodytemperature = $row_val['BodyTemperature'];
	$bpmeasurement = $row_val['BpMeasurement'];
	$intakemed = $row_val['IntakeMed'];
	$administeredby = $row_val['AdministeredBy'];
	$patmedhis = $row_val['PatientMedhis'];
	$patdate = $row_val['CreationDate'];
}

$val=mysqli_query($con,"select * from settings where id = 1");
while ($row_val=mysqli_fetch_array($val)) {
	$address = $row_val['Address'];
}

require_once '../tcpdf/tcpdf.php';

// set timezone
date_default_timezone_set('America/New_York');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Darby May Arazo');
$pdf->SetTitle('Patient Details');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set margins
$pdf->SetMargins(15, 15, 15, true);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// set font
$pdf->SetFont('times', '', 12, '', false);

// remove default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->AddPage('P', 'A4');

$html = '
		<head>
			<style>
				th {
					font-weight:bold;
				}
				
				h1 {
					text-align:center;
					text-transform:uppercase;
				}
			</style>
		<head>
		<p style="text-align:center;">Republic of the Philippines<br>
		Department of Health Region 4-A<br>
		Province of Quezon<br>
		Rural Health Unit<br>'
		. $address . '</p>
		<div>
		</div>
		<div>
		<table border="0" class="table table-bordered" cellspacing="0" cellpadding="5">
		 <tr align="center">
		<td colspan="4" style="font-size:18px;font-weight:bold;">
		 Patient Details</td></tr>
		  <tr>
			<th scope></th>
			<td></td>
			<th scope></th>
			<td></td>
		  </tr>
		  <tr>
			<th scope>Name</th>
			<td>' . $patname . '</td>
			<th scope>Email</th>
			<td>' . $patemail . '</td>
		  </tr>
		  <tr>
			<th scope>Mobile Number</th>
			<td>' . $patcontno . '</td>
			<th>Address</th>
			<td>' . $patadd . '</td>
		  </tr>
			<tr>
			<th>Gender</th>
			<td>' . $patgender . '</td>
			<th>Birth Date</th>
			<td>' . date('F j, Y', strtotime($patbirthday)) . '</td>
		  </tr>
		  
		  <tr>
			<th>Birth Place</th>
			<td>' . $patbirthplace . '</td>
			 <th>Civil Status</th>
			<td>' . $patcivil . '</td>
		  </tr>
		  
		   <tr>
			<th>Religion</th>
			<td>' . $patreligion . '</td>
			 <th>Blood Type</th>
			<td>' . $patblood . '</td>
		  </tr>
		  
		  <tr>
			<th>Mother Name(maiden)</th>
			<td>' . $mothername . '</td>
			 <th>Mother Birthdate</th>
			<td>' . date('F j, Y', strtotime($motherbirthday)) . '</td>
		  </tr>
		  
		  <tr>
			<th>Region</th>
			<td>' . $patregion . '</td>
			 <th>DWSD NHTS Member</th>
			<td>' . $dswdmember . '</td>
		  </tr>
		  
		  <tr>
			<th>Philhealth Member</th>
			<td>' . $philhealthmember . '</td>
			 <th>Philhealth Status Type</th>
			<td>' . $philhealthstatus . '</td>
		  </tr>

		  <tr>	
			<th>Medical History(if any)</th>
			<td>' . $patmedhis . '</td>
			 <th>Reg Date</th>
			<td>' . date('F j, Y, g:i a', strtotime($patdate)) . '</td>
		  </tr>
		</table>
		</div>
		
		<div>
		<table border="0" class="table table-bordered" cellspacing="0" cellpadding="4">		  
		<tr align="center">
		   <th colspan="4" align="left" style="font-size:14px;font-weight:bold;">Vital Signs</th> 
		  </tr>
		  
		  <tr>
			<th scope>Blood Pressure</th>
			<td>' . $bloodpressure . '</td>
			<th scope>BP Measurement Assessment</th>
			<td>' . $bpmeasurement . '</td>
		  </tr>
		  
		  <tr>
			<th scope>Body Temperature</th>
			<td>' . $bodytemperature . '</td>
			<th scope>Intake of Hypertension Medicine</th>
			<td>' . $intakemed . '</td>
		  </tr>
		  
		  <tr>
		    <th scope>Pulse Rate</th>
			<td>' . $pulserate . '</td>
			<th scope>Administered By</th>
			<td>' . $administeredby . '</td>
		  </tr>
		</table>
		</div>

	';


// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);

// draw jpeg image
$pdf->Image('../images/agd-logo.png', 20, 20, 25, '', 'PNG', '', 'T', false, 300, 'R', false, false, 0, false, false, false);
$pdf->Image('../images/logo.png', 20, 20, 25, '', 'PNG', '', 'T', false, 300, 'L', false, false, 0, false, false, false);

// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// restore full opacity
$pdf->SetAlpha(1);

$pdf->writeHTMLCell(0, 0, 15, 20, $html, 0, 1, 0, true, '', true);
$pdf->Output('patient-details.pdf', 'I');
?>