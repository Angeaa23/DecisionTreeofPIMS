<?php
function check_login()
{
if(strlen($_SESSION['dlogin'])==0)
	{	
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="./login.php";
		$_SESSION["dlogin"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>