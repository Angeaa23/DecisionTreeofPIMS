<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	
	$eid=$_GET['editid'];
	$patname=ucwords($_POST['patname']);
	$patcontact=$_POST['patcontact'];
	$patemail=$_POST['patemail'];
	$gender=$_POST['gender'];
	$pataddress=ucwords($_POST['pataddress']);
	$patbirthday=$_POST['patbirthday'];
	$patbirthplace=ucwords($_POST['patbirthplace']);
	$patcivil=$_POST['patcivil'];
	$patreligion=ucwords($_POST['patreligion']);
	$patblood=$_POST['patblood'];
	$motname=ucwords($_POST['motname']);
	$motbirthday=$_POST['motbirthday'];
	$philmember=$_POST['philmember'];
	$philstatus=$_POST['philstatus'] == ($_POST['philmember'] == "No") ? "N/A" : $_POST['philstatus']; ;
	$patregion=$_POST['patregion'];
	$dswdmember=$_POST['dswdmember'];
	$bp=$_POST['bp'];
	$pr=$_POST['pr'];
	$temp=$_POST['temp'];
	$bpmeasurement=$_POST['bpmeasurement'];
	$intakemed=ucwords($_POST['intakemed'] == ($_POST['bpmeasurement'] == "Non Hypertensive") ? "N/A" : $_POST['intakemed']);
	$administered=$_POST['administered'];
	$medhis=ucwords($_POST['medhis']);


$sql=mysqli_query($con,"update tblpatient set PatientName='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientBirthday='$patbirthday',PatientBirthplace='$patbirthplace',PatientCivil='$patcivil',PatientReligion='$patreligion',PatientBlood='$patblood',MotherName='$motname',MotherBirthday='$motbirthday',PhilhealthMember='$philmember',PhilhealthStatus='$philstatus',PatientRegion='$patregion',DswdMember='$dswdmember',BloodPressure='$bp',PulseRate='$pr',DswdMember='$dswdmember',BodyTemperature='$temp',BpMeasurement='$bpmeasurement',IntakeMed='$intakemed',AdministeredBy='$administered' where ID='$eid'");
if($sql)
{
echo "<script>alert('Patient information has been updated successfully');</script>";
echo "<script>window.location.href ='manage-patient.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Duty Personnel | Edit Patient</title>
		<link rel="icon" type="image/x-icon" href="../images/logo.png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../vendor/themify-icons/themify-icons.min.css">
		<link href="../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	
	<style>
		input[type=text], textarea {
			text-transform: capitalize;
		}
	</style>

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
<h1 class="mainTitle">Duty Personnel | Edit Patient</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Duty Personnel</span>
</li>
<li class="active">
<span>Edit Patient</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="row margin-top-30">
<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Edit Patient</h5>
</div>
<div class="panel-body">
<form role="form" name="" method="post" autocomplete="off">
<?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblpatient where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<div class="form-group">
<label for="doctorname">
 Name
</label>
<input type="text" name="patname" class="form-control"  value="<?php  echo $row['PatientName'];?>" required="true">
</div>
<div class="form-group">
<label for="fess">
  Contact no
</label>
<input type="text" name="patcontact" class="form-control"  value="<?php  echo $row['PatientContno'];?>" required="true" maxlength="11">
</div>
<div class="form-group">
<label for="fess">
 Email
</label>
<input type="email" id="patemail" name="patemail" class="form-control"  value="<?php  echo $row['PatientEmail'];?>" readonly='true'>
<span id="email-availability-status"></span>
</div>
<div class="form-group">
	<label class="block">Gender: </label>
	<div class="clip-radio radio-primary">
	<?php  if($row['PatientGender']=="Female"){ ?>
	<input type="radio" name="gender" id="rg-male" value="Male"> 
	<label for="rg-male">
	Male
	</label>
	<input type="radio" name="gender" id="rg-female" value="Female" checked="true"> 
	<label for="rg-female">
	Female
	</label>
	<?php } else { ?>

	<input type="radio" name="gender" id="rg-male" value="Male" checked="true"> 
	<label for="rg-male">
	Male
	</label>
	<input type="radio" name="gender" id="rg-female" value="Female">
	<label for="rg-female">
	Female
	</label>

	<?php } ?>
	</div>
</div>
<div class="form-group">
<label for="address">
 Address
</label>
<textarea name="pataddress" class="form-control" required="true"><?php  echo $row['PatientAdd'];?></textarea>
</div>
<div class="form-group">
<label for="fess">
  Birth Date
</label>
<input type="date" name="patbirthday" class="form-control"  value="<?php  echo $row['PatientBirthday'];?>" required="true">
</div>
<div class="form-group">
<label for="fess">
  Birth Place
</label>
<input type="text" name="patbirthplace" class="form-control"  value="<?php  echo $row['PatientBirthplace'];?>" required="true">
</div>
<div class="form-group">
<label for="fess">
  Civil Status
</label>
<select name="patcivil" class="form-control" required="true">
	<option value="<?php  echo $row['PatientCivil'];?>"><?php  echo $row['PatientCivil'];?></option>
	<option value="Single">Single</option>
	<option value="Married">Married</option>
	<option value="Divorced">Divorced</option>
	<option value="Separated">Separated</option>
	<option value="Widowed">Widowed</option>	
</select>
</div>

<div class="form-group">
<label for="fess">
  Religion
</label>
<input type="text" name="patreligion" class="form-control"  value="<?php  echo $row['PatientReligion'];?>" required="true">
</div>

<div class="form-group">
<label for="fess">
  Blood Type
</label>
<select name="patblood" class="form-control" required="true">
	<option value="<?php  echo $row['PatientBlood'];?>"><?php  echo $row['PatientBlood'];?></option>
	<option value="A+">A+</option>
	<option value="A-">A-</option>
	<option value="B+">B+</option>
	<option value="B-">B-</option>
	<option value="AB+">AB+</option>
	<option value="AB-">AB-</option>
	<option value="O+">O+</option>
	<option value="O-">O-</option>
</select>
</div>

<div class="form-group">
<label for="fess">
 Mother Name (Maiden)
</label>
<input type="text" name="motname" class="form-control"  value="<?php  echo $row['MotherName'];?>" required="true">
</div>

<div class="form-group">
<label for="fess">
 Mother Birthdate
</label>
<input type="date" name="motbirthday" class="form-control"  value="<?php  echo $row['MotherBirthday'];?>" required="true">
</div>

<div class="form-group">
	<label class="block">Philhealth Member: </label>
	<div class="clip-radio radio-primary">
	<?php  if($row['PhilhealthMember']=="No"){ ?>
	<input type="radio" name="philmember" id="rg-yes" value="Yes">
	<label for="rg-yes">
Yes
</label>
	<input type="radio" name="philmember" id="rg-no" value="No" checked="true">
	<label for="rg-no">
No
</label>
	
	<?php } elseif($row['PhilhealthMember']=="Yes") { ?>
	<input type="radio" name="philmember" id="rg-yes" value="Yes" checked="true">
	<label for="rg-yes">
Yes
</label>
	<input type="radio" name="philmember" id="rg-no" value="No">
	<label for="rg-no">
No
</label>
	
	<?php } else { ?>
	<input type="radio" name="philmember" id="rg-yes" value="Yes">
	<label for="rg-yes">
Yes
</label>
	<input type="radio" name="philmember" id="rg-no" value="No">
	<label for="rg-no">
No
</label>

	<?php } ?>
	</div>
</div>

<div class="form-group">
	<label class="block">Philhealth Status Type: </label>
	<div class="clip-radio radio-primary">
	<?php  if($row['PhilhealthStatus']=="Dependent"){ ?>
	<input type="radio" name="philstatus" id="rg-member" value="Member">
	<label for="rg-member">
Member
</label>
	<input type="radio" name="philstatus" id="rg-dependent" value="Dependent" checked="true">
	<label for="rg-dependent">
Dependent
</label>
	
	<?php } elseif($row['PhilhealthStatus']=="Member") { ?>
	<input type="radio" name="philstatus" id="rg-member" value="Member" checked="true">
	<label for="rg-member">
Member
</label>
	<input type="radio" name="philstatus" id="rg-dependent" value="Dependent">
	<label for="rg-dependent">
Dependent
</label>
	
	<?php } else { ?>
	<input type="radio" name="philstatus" id="rg-member" value="Member">
	<label for="rg-member">
Member
</label>
	<input type="radio" name="philstatus" id="rg-dependent" value="Dependent">
	<label for="rg-dependent">
Dependent
</label>

	<?php } ?>
	</div>
</div>

<div class="form-group">
<label for="fess">
 Region
</label>
	<select name="patregion" class="form-control" required="true">
		<option value="<?php  echo $row['PatientRegion'];?>"><?php  echo $row['PatientRegion'];?></option>
		<option value="I - Ilocos Region">I - Ilocos Region</option>
		<option value="II - Cagayan Valley">II - Cagayan Valley</option>
		<option value="III - Central Luzon">III - Central Luzon</option>
		<option value="IV-A - CALABARZON">IV-A - CALABARZON</option>
		<option value="MIMAROPA Region">MIMAROPA Region</option>
		<option value="V - Bicol Region">V - Bicol Region</option>
		<option value="VI - Western Visayas">VI - Western Visayas</option>
		<option value="VII - Central Visayas">VII - Central Visayas</option>
		<option value="VIII - Eastern Visayas">VIII - Eastern Visayas</option>
		<option value="IX - Zamboanga Peninsula">IX - Zamboanga Peninsula</option>
		<option value="X - Northern Mindanao">X - Northern Mindanao</option>
		<option value="XI - Davao Region">XI - Davao Region</option>
		<option value="XII - SOCCSKSARGEN">XII - SOCCSKSARGEN</option>
		<option value="XIII - Caraga">XIII - Caraga</option>
		<option value="NCR - National Capital Region">NCR - National Capital Region</option>
		<option value="CAR - Cordillera Administrative Region">CAR - Cordillera Administrative Region</option>
		<option value="BARMM - Bangsamoro Autonomous Region in Muslim Mindanao">BARMM - Bangsamoro Autonomous Region in Muslim Mindanao</option>
	</select>
</div>

<div class="form-group">
	<label class="block">DWSD NHTS Member: </label>
	<div class="clip-radio radio-primary">
	<?php  if($row['DswdMember']=="No"){ ?>
	<input type="radio" name="dswdmember" id="rg-dswd-yes" value="Yes">
	<label for="rg-dswd-yes">
Yes
</label>
	<input type="radio" name="dswdmember" id="rg-dswd-no" value="No" checked="true">
	<label for="rg-dswd-no">
No
</label>
	
	<?php } elseif($row['DswdMember']=="Yes") { ?>
	<input type="radio" name="dswdmember" id="rg-dswd-yes" value="Yes" checked="true">
	<label for="rg-dswd-yes">
Yes
</label>
	<input type="radio" name="dswdmember" id="rg-dswd-no" value="No">
	<label for="rg-dswd-no">
No
</label>
	
	<?php } else { ?>
	<input type="radio" name="dswdmember" id="rg-dswd-yes" value="Yes">
	<label for="rg-dswd-yes">
Yes
</label>
	<input type="radio" name="dswdmember" id="rg-dswd-no" value="No">
	<label for="rg-dswd-no">
No
</label>

	<?php } ?>
	</div>
</div>

<div class="form-group">
<label for="fess">
 Medical History
</label>
<textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true"><?php  echo $row['PatientMedhis'];?></textarea>
</div>	
<div class="form-group">
<label for="fess">
 Creation Date
</label>
<input type="text" class="form-control"  value="<?php  echo $row['CreationDate'];?>" readonly='true'>
</div>

<br/>	
<fieldset>
<legend><h5 class="panel-title" style="text-align:left;color:#5b5b60;">Vital Signs</h5></legend>
<div class="form-group">
<label for="fess">
 Blood Pressure
</label>
<input type="text" name="bp" class="form-control"  value="<?php  echo $row['BloodPressure'];?>" required="true">
</div>

<div class="form-group">
<label for="fess">
 Pulse Rate
</label>
<input type="text" name="pr" class="form-control"  value="<?php  echo $row['PulseRate'];?>" required="true">
</div>

<div class="form-group">
<label for="fess">
 Body Temperature
</label>
<input type="text" name="temp" class="form-control"  value="<?php  echo $row['BodyTemperature'];?>" required="true">
</div>

<div class="form-group">
	<label class="block">BP Measurement Medicine: </label>
	<div class="clip-radio radio-primary">
	<?php  if($row['BpMeasurement']=="Non Hypertensive"){ ?>
	<input type="radio" name="bpmeasurement" id="rg-hypertension" value="Hypertension">
	<label for="rg-hypertension">
Hypertension
</label>
	<input type="radio" name="bpmeasurement" id="rg-hypertensive" value="Non Hypertensive" checked="true">
	<label for="rg-hypertensive">
Non Hypertensive
</label>
	<?php } else { ?>

	<input type="radio" name="bpmeasurement" id="rg-hypertension" value="Hypertension" checked="true">
	<label for="rg-hypertension">
Hypertension
</label>
	<input type="radio" name="bpmeasurement" id="rg-hypertensive" value="Non Hypertensive">
	<label for="rg-hypertensive">
Non Hypertensive
</label>

	<?php } ?>
	</div>
</div>

<div class="form-group">
<label for="fess">
 Intake of Hypertension Medicine
</label>
<textarea type="text" name="intakemed" class="form-control" required="true"><?php  echo $row['IntakeMed'];?></textarea>
</div>

<div class="form-group">
<label for="fess">
  Administered By
</label>
<select name="administered" class="form-control" required="true">
	<option value="<?php  echo $row['AdministeredBy'];?>"><?php  echo $row['AdministeredBy'];?></option>
	<option value="Abesamis, Marianne Grace H., RM">Abesamis, Marianne Grace H., RM</option>
	<option value="Argoso, Gerilyn T., RN">Argoso, Gerilyn T., RN</option>
	<option value="Arzadon, Mae Angela B., RN">Arzadon, Mae Angela B., RN</option>
	<option value="Baltazar, Raquel Anne A., RN">Baltazar, Raquel Anne A., RN</option>	
	<option value="Manimtim, Rica Blanca J., RN">Manimtim, Rica Blanca J., RN</option>	
	<option value="Menor, Maria Cristina A., RN">Menor, Maria Cristina A., RN</option>	
	<option value="Naag, Princess Ricamae V., RN">Naag, Princess Ricamae V.</option>	
	<option value="Ormilla, Ruth D., RN">Ormilla, Ruth D., RN</option>	
	<option value="Uy, Abbygail Cristy A., RN">Uy, Abbygail Cristy A., RN</option>	
	<option value="Vargas, Elienie Lucelle E., RN">Vargas, Elienie Lucelle E., RN</option>
	<option value="Villocillo, Mariel Celeste V.">Villocillo, Mariel Celeste V.</option>
	<option value="Yulip, Immi I., RN">Yulip, Immi I., RN</option>		
</select>
</div>
</fieldset>

<?php } ?>

<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Update
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
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
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../vendor/modernizr/modernizr.js"></script>
		<script src="../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="../vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="../vendor/autosize/autosize.min.js"></script>
		<script src="../vendor/selectFx/classie.js"></script>
		<script src="../vendor/selectFx/selectFx.js"></script>
		<script src="../vendor/select2/select2.min.js"></script>
		<script src="../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="../vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
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
