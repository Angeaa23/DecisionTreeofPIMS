<?php
include('../include/config.php');
$val=mysqli_query($con,"select * from settings where id = 1");
while ($row_val=mysqli_fetch_array($val)) {
	$name = $row_val['HealthCenter'];
	$no = $row_val['ContactNo'];
	$email = $row_val['EmailAdd'];
	$hour = $row_val['OpeningHour'];
	$doctor = $row_val['Doctor'];
	$about = $row_val['About'];
	$map = $row_val['Map'];
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $name;?></title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link rel="icon" type="image/x-icon" href="../images/logo.png">
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<link rel="stylesheet" href="css/tooplate-style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		 <link rel="stylesheet" href="css/font-awesome.min.css">
		 <link rel="stylesheet" href="css/animate.css">
		 <link rel="stylesheet" href="css/owl.carousel.css">
		 <link rel="stylesheet" href="css/owl.theme.default.min.css">
	 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default row" style="padding : 10px;">
		<div class="container-fluid  col-sm-6">
			<h3 class="text-primary">Search Patient Details</h3>
		</div>
		<div class="container-fluid col-sm-6">
			<h3 style="float : right;"><span><a href="../index.php">Back</a></span></h3>
		</div>
	</nav>
	<div class="col-md-1"></div>
	<div class="col-md-10 well">
		<h3 class="text-primary">Patient Details</h3>
		<hr style="border-top:1px dotted #000;"/>
		<form class="form-inline" method="POST" action="">
			<label>Patient ID Code : </label>
			<input type="text" class="form-control" placeholder="Start"  name="PatientCode"/>
			<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button> <a href="index.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
		</form>
		<br /><br />
		<div class="table-responsive">	
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th colspan="4" >Patient Details</th>
					</tr>
				</thead>
				<tbody>
					<?php include'range.php'?>	
				</tbody>
			</table>
		</div>	
	</div>
</body>
</html>