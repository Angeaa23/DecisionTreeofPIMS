<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

date_default_timezone_set('Asia/Manila');
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$val=mysqli_query($con,"select * from settings where id = 1");
while ($row_val=mysqli_fetch_array($val)) {
	$name = $row_val['HealthCenter'];
	$address = $row_val['Address'];
	$no = $row_val['ContactNo'];
	$email = $row_val['EmailAdd'];
	$hour = $row_val['OpeningHour'];
	$doctor = $row_val['Doctor'];
	$about = $row_val['About'];
	$map = $row_val['Map'];
}

$status=$_GET['status'];
$eid=$_GET['editid'];
if($status==2)
{
$sql=mysqli_query($con,"UPDATE `appointment` SET `status`='2' WHERE id=$eid");
if($sql)
{
echo "<script>alert('Appointment Declined');</script>";
echo "<script>window.location.href ='manage-appointment.php?status=2'</script>";

}
}
if(isset($_POST['update']))
{
$appointment_date	=	$_POST['appointment_date'];
$dutypersonnel		=	$_POST['dutypersonnel'];
$remarks			=	$_POST['remarks'];
$name_app			=	$_POST['name_app'];
$app_gmail			=	$_POST['app_gmail'];

	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'agdanganrhupims@gmail.com'; // Your gmail
	$mail->Password = 'onxvpoimhnfncmww'; // Your gmail app password
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;

	$mail->setFrom('agdanganrhupims@gmail.com'); // Your gmail

	$mail->addAddress($app_gmail);

	$mail->isHTML(true);

	$mail->Subject = "APPROVAL LETTER";
	$mail->Body = 
date('F d , Y')."<br><br>
".$name."<br>
".$address."<br><br>

Subject: Your Appointment Is Confirmed<br><br>

Dear ".$name_app.",<br><br>

Your Consultation appointment is on ".date("[ l ] F d, Y h:i A",strtotime($appointment_date)).", please ask ".$dutypersonnel." for details.
<br><br>
Please contact us if there should be any changes or if you have any questions.
<br><br>
For further information, please call : ".$no.".
<br><br>
Remarks : ".$remarks."
<br><br>
Thanks and Stay Safe.
	";

	$mail->send();
  
$sql=mysqli_query($con,"UPDATE `appointment` SET `appointment_date`='$appointment_date',`dutypersonnels`='$dutypersonnel',`remarks`='$remarks',`status`='1' WHERE id=$eid");
if($sql)
{
echo "<script>window.location.href ='manage-appointment.php?status=1'</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Duty Personnel | Create Appointment</title>
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
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  pEditing: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  pEditing: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  pEditing: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  pEditing: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}
.col-20 {
  float: left;
  width: 20%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
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
<h1 class="mainTitle">Appointment | Create Appointment</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Appointment</span>
</li>
<li class="active">
<span>Create Appointment</span>
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
<h5 class="panel-title">Create Appointment</h5>
</div>
<div class="panel-body">

<div class="container">
  <form id="regForm" method='post' action='' enctype='multipart/form-data'>
  <?php
	$ret=mysqli_query($con,"select * from appointment where id='$eid'");
	while ($row=mysqli_fetch_array($ret)) {
?>
    <div class="row">
      <div class="col-25">
        <label for="appointment_date">Appointment Date</label>
      </div>
      <div class="col-75">
		<input type="hidden" name="name_app" class="form-control form-control-border" value="<?php echo $row['firstname']." ".$row['lastname']; ?>">
		<input type="hidden" name="app_gmail" class="form-control form-control-border" value="<?php echo $row['email'];?>">
		<input type="datetime-local" name="appointment_date" class="form-control form-control-border" value="<?= isset($row['appointment_date']) && strtotime($row['appointment_date']) > 0 ? date("Y-m-d H:i",strtotime($row['appointment_date'])) : "" ?>" required="true">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="event_title">Assign a Personnel</label>
      </div>
      <div class="col-75">
		<select name="dutypersonnel" required="true">
				<option value="<?php echo $row['dutypersonnels'];?>"><?php echo $row['dutypersonnels'];?></option>
			<?php
				$dutypersonnel=mysqli_query($con,"SELECT * FROM `dutypersonnel` WHERE 1");
				$num=mysqli_num_rows($dutypersonnel);
				while ($dutypersonnels=mysqli_fetch_array($dutypersonnel)) {?>
					<option value="<?php echo $dutypersonnels['dutyName']." - [". $dutypersonnels['specialization']."]";?>"><?php echo $dutypersonnels['dutyName']." - [". $dutypersonnels['specialization']."]";?></option>
				<?php }?>
		</select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="remarks">Remarks</label>
      </div>
      <div class="col-75">
        <textarea name="remarks" value="<?php echo $row['remarks'];?>" style="height:200px" required="true"><?php echo $row['remarks'];?></textarea>
      </div>
    </div>
<?php } ?>
    <div class="row">
      <button type="submit" name="update" id="update" class="btn btn-o btn-primary">Update</button>
    </div>
  </form>
</div>

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
		<!-- start: JavaScript Appointment Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Appointment Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
