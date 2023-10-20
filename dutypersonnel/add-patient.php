<?php
date_default_timezone_set('Asia/Manila');
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	
	$dutyid=$_SESSION['id'];
	$PatientCode="PCode:".date("ymdHi");
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
	$philstatus=$_POST['philstatus'] == "" || ($_POST['philmember'] == "No") ? "N/A" : $_POST['philstatus'];
	$patregion=$_POST['patregion'];
	$dswdmember=$_POST['dswdmember'];
	$bp=$_POST['bp'];
	$pr=$_POST['pr'];
	$temp=$_POST['temp'];
	$bpmeasurement=$_POST['bpmeasurement'];
	$intakemed=ucwords($_POST['intakemed'] == "" || ($_POST['bpmeasurement'] == "Non Hypertensive") ? "N/A" : $_POST['intakemed']);
	$administered=$_POST['administered'];
	$medhis=ucwords($_POST['medhis']) ;


$sql=mysqli_query($con,"insert into tblpatient(Dutyid,PatientCode,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientBirthday,PatientBirthplace,PatientCivil,PatientReligion,PatientBlood,MotherName,MotherBirthday,PhilhealthMember,PhilhealthStatus,PatientRegion,DswdMember,BloodPressure,PulseRate,BodyTemperature,BpMeasurement,IntakeMed,AdministeredBy,PatientMedhis) values('$dutyid','$PatientCode','$patname','$patcontact','$patemail','$gender','$pataddress','$patbirthday','$patbirthplace','$patcivil','$patreligion','$patblood','$motname','$motbirthday','$philmember','$philstatus','$patregion','$dswdmember','$bp','$pr','$temp','$bpmeasurement','$intakemed','$administered','$medhis')");
if($sql)
{
echo "<script>alert('Patient information has been added successfully');</script>";
echo "<script>window.location.href ='manage-patient.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Duty Personnel | Add Patient</title>
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

	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#patemail").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>

<script type="text/javascript">
	function show1(){
	  document.getElementById('div1').style.display ='block';
	}
	function show2(){
	  document.getElementById('div1').style.display = 'none';
	}
</script>

<script type="text/javascript">
    function show3() {
        document.getElementById('div2').style.display ='block';
    }
	
	function show4() {
        document.getElementById('div2').style.display ='none';
    }
</script>

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
<h1 class="mainTitle">Patient | Add Patient</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Patient</span>
</li>
<li class="active">
<span>Add Patient</span>
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
<h5 class="panel-title">Add Patient</h5>
</div>
<div class="panel-body">
<form role="form" name="" method="post" autocomplete="off">

<div class="form-group">
<label for="doctorname">
Name
</label>
<input type="text" name="patname" class="form-control"  placeholder="Enter Fullname" required="true">
</div>
<div class="form-group">
<label for="fess">
Contact No
</label>
<input type="text" name="patcontact" class="form-control"  placeholder="Enter Patient Contact no" required="true" maxlength="11">
</div>
<div class="form-group">
<label for="fess">
Email
</label>
<input type="email" id="patemail" name="patemail" class="form-control"  placeholder="Enter Patient Email Address" required="true" onBlur="userAvailability()">
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
<div class="form-group">
<label class="block">
Gender
</label>
<div class="clip-radio radio-primary">
<input type="radio" id="rg-male" name="gender" value="Male" required="true">
<label for="rg-male">
Male
</label>
<input type="radio" id="rg-female" name="gender" value="Female" required="true">
<label for="rg-female">
Female
</label>
</div>
</div>
<div class="form-group">
<label for="address">
Address
</label>
<textarea name="pataddress" class="form-control"  placeholder="Enter Patient Address" required="true"></textarea>
</div>
<div class="form-group">
<label for="fess">
Birth Date
</label>
<input type="date" name="patbirthday" class="form-control"  placeholder="Enter Patient Birth Date" required="true">
</div>
<div class="form-group">
<label for="fess">
Birth Place
</label>
<input type="text" name="patbirthplace" class="form-control"  placeholder="Enter Patient Birth Place" required="true">
</div>
<div class="form-group">
	<label for="fess">
		Civil Status
	</label>
	<select name="patcivil" class="form-control" required="true">
		<option value="">Select Civil Status</option>
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
<input type="text" name="patreligion" class="form-control"  placeholder="Enter Patient Religion" required="true">
</div>
<div class="form-group">
	<label for="fess">
		Blood Type
	</label>
	<select name="patblood" class="form-control" required="true">
		<option value="">Select Blood Type</option>
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
<input type="text" name="motname" class="form-control"  placeholder="Enter Mother Name" required="true">
</div>

<div class="form-group">
<label for="fess">
Mother Birthdate
</label>
<input type="date" name="motbirthday" class="form-control"  placeholder="Enter Mother Birthdate" required="true">
</div>

<div class="form-group">
<label class="block">
Philhealth Member
</label>
<div class="clip-radio radio-primary">

<input type="radio" id="rg-yes" name="philmember" value="Yes" onclick="show1();" required="true">
<label for="rg-yes">
Yes
</label>

<input type="radio" id="rg-no" name="philmember" value="No" onclick="show2();" required="true">
<label for="rg-no">
No
</label>
</div>
</div>

<div class="form-group" id="div1" style="display: none">
<label class="block">
Philhealth Status Type
</label>
<div class="clip-radio radio-primary">
<input type="radio" id="rg-member" name="philstatus" value="Member">
<label for="rg-member">
Member
</label>
<input type="radio" id="rg-dependent" name="philstatus" value="Dependent" >
<label for="rg-dependent">
Dependent
</label>
</div>
</div>

<div class="form-group">
<label for="fess">
Region
</label>
	<select name="patregion" class="form-control" required="true">
		<option value="">Select Region</option>
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
<label class="block">
DWSD NHTS Member
</label>
<div class="clip-radio radio-primary">
<input type="radio" id="rg-dswd-yes" name="dswdmember" value="Yes" required="true">
<label for="rg-dswd-yes">
Yes
</label>
<input type="radio" id="rg-dswd-no" name="dswdmember" value="No" required="true">
<label for="rg-dswd-no">
No
</label>
</div>
</div>

<div class="form-group">
<label for="fess">
Medical History
</label>
<textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History (if any)" required="true"></textarea>
</div>

<br/>	
<fieldset>
<legend><h5 class="panel-title" style="text-align:left;color:#5b5b60;">Vital Signs</h5></legend>

<div class="form-group">
<label for="fess">
Blood Pressure
</label>
<input type="text" name="bp" class="form-control"  placeholder="Enter Blood Pressure" required="true">
</div>

<div class="form-group">
<label for="fess">
Pulse Rate
</label>
<input type="text" name="pr" class="form-control"  placeholder="Enter Pulse Rate" required="true">
</div>

<div class="form-group">
<label for="fess">
Body Temperature
</label>
<input type="text" name="temp" class="form-control"  placeholder="Enter Body Temperature" required="true">
</div>

<div class="form-group">
<label class="block">
BP Measurement Assessment
</label>
<div class="clip-radio radio-primary">

<input type="radio" id="rg-hypertension" name="bpmeasurement" value="Hypertension" onclick="show3();" required="true">
<label for="rg-hypertension">
	Hypertension
</label>

<input type="radio" id="rg-hypertensive" name="bpmeasurement" value="Non Hypertensive" onclick="show4();" required="true">
<label for="rg-hypertensive">
	Non Hypertensive
</label>

</div>
</div>

<div class="form-group" id="div2" style="display: none">
<label for="fess">
Intake of Hypertension Medicine
</label>
<textarea type="text" name="intakemed" class="form-control" placeholder="Enter Intake of Hypertension Medicine"></textarea>
</div>

<div class="form-group">
	<label for="fess">
		Administered By
	</label>
	<select name="administered" class="form-control" required="true">
		<option value="">Select Duty Personnel</option>
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
<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Add
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
