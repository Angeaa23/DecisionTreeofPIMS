<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$name="";
$no="";
$email="";
$hour="";
$doctor="";
$about="";
$map="";

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
if(isset($_POST['submit']))
{	

	$healthcenter=ucwords($_POST['healthcenter']);
	$address=ucwords($_POST['address']);
	$contactno=$_POST['contactno'];
	$emailadd=$_POST['emailadd'];
	$openhour=ucwords($_POST['openhour']);
	$doctor=ucwords($_POST['doctor']);
	$about=$_POST['about'];
	$map=$_POST['map'];

$sql=mysqli_query($con,"update settings set HealthCenter='$healthcenter',Address='$address',ContactNo='$contactno',EmailAdd='$emailadd',OpeningHour='$openhour',Doctor='$doctor',About='$about',Map='$map'");
if($sql)
{
echo "<script>alert('Health Center details has been change successfully');</script>";
echo "<script>window.location.href ='setting.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Settings</title>
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
	<style>
		input[type=text] {
			text-transform: capitalize;
		}
	</style>
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
		
				</header>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Settings</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Settings</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Change Health Center Details</h5>
												</div>
												
												<div class="panel-body">
												
													<form action="" role="form" name="" method="post" autocomplete="off">
														<div class="form-group">
															<label for="hc-name">
																Health Center Name
															</label>
															<input type="text" name="healthcenter" class="form-control" value="<?php  echo $name;?>" required="true">
														</div>
														
														<div class="form-group">
															<label for="hc-address">
																Address
															</label>
															<input type="text" name="address" class="form-control" value="<?php  echo $address;?>" required="true">
														</div>
												
														<div class="form-group">
															<label for="hc-contactno">
																Contact Number
															</label>
															<input type="text" name="contactno" class="form-control" value="<?php  echo $no;?>" required="true" maxlength="12">
														</div>
														
														<div class="form-group">
															<label for="hc-email">
																Email Address
															</label>
															<input type="email" name="emailadd" class="form-control" value="<?php  echo $email;?>" required="true">
														</div>
														
														<div class="form-group">
															<label for="hc-openhr">
																Opening Hours
															</label>
															<input type="text" name="openhour" class="form-control"  value="<?php  echo $hour;?>" required="true">
														</div>
														
														<div class="form-group">
															<label for="hc-doctor">
																Doctor
															</label>
															<input type="text" name="doctor" class="form-control"  value="<?php  echo $doctor;?>" required="true">
														</div>
														
														<div class="form-group">
															<label for="hc-about">
																About
															</label>
															<textarea type="text" name="about" class="form-control" required="true"><?php  echo $about;?></textarea>
														</div>
														
														<div class="form-group">
															<label for="hc-map">
																Embed a Map
															</label>
															<textarea type="text" name="map" class="form-control" rows="5" required="true"><?php  echo $map;?></textarea>
														</div>
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
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
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
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