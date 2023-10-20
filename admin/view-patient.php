<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | View Patients</title>
		<link rel="icon" type="image/x-icon" href="../images/logo.png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Admin | View Patients</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Admin</span>
</li>
<li class="active">
<span>View Patients</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
	<?php
	if (isset($_GET['viewid'])) {
	$vid=$_GET['viewid'];
	$sql=mysqli_query($con,"select * from tblpatient where ID = '$vid'");
	
	while($row=mysqli_fetch_array($sql))
	{
		$patientid = $row['ID'];
	 }
	}
	 ?>
	
	<a style="float:right;bottom:8px;" href="generate-pdf.php?viewid=<?php echo $patientid; ?>" class="btn btn-primary waves-effect waves-light w-lg">Generate PDF</a>
		
<h5 class="over-title margin-bottom-15">View <span class="text-bold">Patients</span></h5>


<?php
		if(isset($_GET['viewid'])){
		   $vid=$_GET['viewid'];
		   $ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
		$cnt=1;
		while ($row=mysqli_fetch_array($ret)) {
									   ?>
		<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		 <tr align="center">
		<td colspan="4" style="font-size:20px;color:blue">
		 Patient Details</td></tr>

		  <tr>
			<th scope>Name</th>
			<td><?php  echo $row['PatientName'];?></td>
			<th scope>Email</th>
			<td><?php  echo $row['PatientEmail'];?></td>
		  </tr>
		  <tr>
			<th scope>Mobile Number</th>
			<td><?php  echo $row['PatientContno'];?></td>
			<th>Address</th>
			<td><?php  echo $row['PatientAdd'];?></td>
		  </tr>
			<tr>
			<th>Gender</th>
			<td><?php  echo $row['PatientGender'];?></td>
			<th>Birth Date</th>
			<td><?php  echo date('F j, Y', strtotime($row['PatientBirthday']));?></td>
		  </tr>
		  
		  <tr>
			<th>Birth Place</th>
			<td><?php  echo $row['PatientBirthplace'];?></td>
			 <th>Civil Status</th>
			<td><?php  echo $row['PatientCivil'];?></td>
		  </tr>
		  
		   <tr>
			<th>Religion</th>
			<td><?php  echo $row['PatientReligion'];?></td>
			 <th>Blood Type</th>
			<td><?php  echo $row['PatientBlood'];?></td>
		  </tr>
		  
		  <tr>
			<th>Mother Name (maiden)</th>
			<td><?php  echo $row['MotherName'];?></td>
			 <th>Mother Birthdate</th>
			<td><?php  echo date('F j, Y', strtotime($row['MotherBirthday']));?></td>
		  </tr>
		  
		  <tr>
			<th>Region</th>
			<td><?php  echo $row['PatientRegion'];?></td>
			 <th>DWSD NHTS Member</th>
			<td><?php  echo $row['DswdMember'];?></td>
		  </tr>
		  
		  <tr>
			<th>Philhealth Member</th>
			<td><?php  echo $row['PhilhealthMember'];?></td>
			 <th>Philhealth Status Type</th>
			<td><?php  echo $row['PhilhealthStatus'];?></td>
		  </tr>

		  <tr>	
			<th>Medical History (if any)</th>
			<td><?php  echo $row['PatientMedhis'];?></td>
			 <th>Reg Date</th>
			<td><?php  echo date('F j, Y, g:i a', strtotime($row['CreationDate']));?></td>
		  </tr>
		 
		<?php }?>
		</table>
		
		<?php
		   $vid=$_GET['viewid'];
		   $ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
		$cnt=1;
		while ($row=mysqli_fetch_array($ret)) {
									   ?>
		<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		  <tr align="center">
		   <th colspan="12" >Vital Signs</th> 
		  </tr>
		  
		  <tr>
			<th scope>Blood Pressure</th>
			<td><?php  echo $row['BloodPressure'];?></td>
			<th scope>BP Measurement Assessment</th>
			<td><?php  echo $row['BpMeasurement'];?></td>
		  </tr>
		  
		  <tr>
			<th scope>Body Temperature</th>
			<td><?php  echo $row['BodyTemperature'];?></td>
			<th scope>Intake of Hypertension Medicine</th>
			<td><?php  echo $row['IntakeMed'];?></td>
		  </tr>
		  
		  <tr>
		    <th scope>Pulse Rate</th>
			<td><?php  echo $row['PulseRate'];?></td>
			<th scope>Administered By</th>
			<td><?php  echo $row['AdministeredBy'];?></td>
		  </tr>
		  <?php }?>
		</table>
		
		<?php  

		$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid' ORDER BY CreationDate DESC");



		 ?>
		<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		  <tr align="center">
		   <th colspan="12" >Consultation History</th> 
		  </tr>
		  <tr>
			<th>#</th>
			<th>Visit Date</th>
			<th>Patient Age</th>
			<th>Weight (kg)</th>
			<th>Height (cm)</th>
			<th>Birth Weight (kg)</th>
			<th>Birth Length (cm)</th>
			<th>Body Mass Index</th>
			<th>BMI Category</th>
			<th>Waist Circumference (in)</th>
			<th>Medical History</th>
			<th>Medical Prescription</th>
		  </tr>
		 </tbody>
	</table>
		<?php  
		$num=mysqli_num_rows($ret);
		if($num>0){
		$cnt=1;
		while ($row=mysqli_fetch_array($ret)) { 
		  ?>
		<tr>
		  <td><?php echo $cnt;?></td>
		  <td><?php  echo date('F j, Y, g:i a', strtotime($row['CreationDate']));?></td>
		  <td><?php  echo $row['PatientAge'];?></td>
		  <td><?php  echo $row['Weight'];?></td>
		  <td><?php  echo $row['Height'];?></td>
		  <td><?php  echo $row['BirthWeight'];?></td>
		  <td><?php  echo $row['BirthLength'];?></td>
		  <td><?php  echo $row['Bmi'];?></td>
		  <td><?php  echo $row['BmiCategory'];?></td>
		  <td><?php  echo $row['WaistCircum'];?></td>
		  <td><?php  echo $row['MedHistory'];?></td>
		  <td><?php  echo $row['MedicalPres'];?></td> 
		</tr>
		<?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="12" style="border:none;border-left: 1px solid #fff; "> No record found</td>

  </tr>
   
<?php } ?>
		</table>
        
		<div class="row">
		
		<?php

		$sql=mysqli_query($con,"select * from tblpatient where ID = '$vid'");
		
		while($row=mysqli_fetch_array($sql))
		{
			$patientid = $row['ID'];
		 }
		}?>
			
		<div class="col-md-12">
		<a style="float:right;" href="medical-certificate.php?viewid=<?php echo $patientid; ?>" class="btn btn-primary waves-effect waves-light w-lg">Medical Certificate</a>
		</div>
		</div>
</div>
</div>
</div>
</div>
</div>
</div>

			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
