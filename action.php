<!DOCTYPE html>
<html lang="en">
<head>
<style>
*,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.bg-image {
  /* The image used */
  background-image: url("images/abt-bg.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text p{
    font-size: 14px;
    text-align: justify;
    margin: 20px 0;
    line-height: 25px;
}
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 25%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 30%;
  padding: 20px;
  text-align: center;
}
a{
    display: block;
    width: 150px;
    position: relative;
    margin: 10px auto;
	font-weight : bold;
    text-align: center;
    background-color: #0f72e5;
    color: #ffffff;
    text-decoration: none;
    padding: 5px 0;
	border-radius : 10px;
	float : right;
}
a:hover{
    background-color: red;
    color: #fff;
}
</style>
</head>
<link rel="shortcut icon" href="images/Logo.jpg" type="image/x-icon">
<body>
<?php

include('include/config.php');
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

		 if(ISSET($_POST['Submit'])){
			$email		= $_POST['email'];
			$firstname	= $_POST['firstname'];
			$lastname	= $_POST['lastname'];
			$concern	= $_POST['concern'];
			
			$query=mysqli_query($con, "INSERT INTO `appointment`(`created_date`, `email`, `firstname`, `lastname`, `concern`) VALUES (Now(),'$email','$firstname','$lastname','$concern')") or die(mysqli_error());
			
				echo"	<div class='bg-image'></div>

						<div class='bg-text'>
							<br>".$name."<br>
							<p>Hello, <u>".$firstname." ".$lastname."</u></p>
							<p style='text-indent: 50px;text-align: justify;'>The administrator will check your Appointment, we will send you an email for your Appointment Status and Details.</p>
							<br>
							<a href='index.php'>Close</a>
						</div>";
		
  }    
?>

</body>
</html>