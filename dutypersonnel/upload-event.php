<?php
date_default_timezone_set('Asia/Manila');
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

	$eid=$_GET['editid'];
	$img = $_FILES["image"]["name"];
	$source = $_FILES["image"]["tmp_name"];
	$destination = "file_upload/".$_FILES["image"]["name"];
	$pass = move_uploaded_file($source, $destination);
 
	$date_of_event	= $_POST['date_of_event'];
	$event_title	= $_POST['event_title'];
	$content		= $_POST['content'];
	$author			= $_POST['author'];


if(isset($_POST['submit']))
{	
$sql=mysqli_query($con,"INSERT INTO `tblevents`(`image`, `date_of_event`, `event_title`, `content`, `author`) VALUES ('$img','$date_of_event','$event_title','$content','$author')");
if($sql)
{
echo "<script>alert('Event information has been added successfully');</script>";
echo "<script>window.location.href ='manage-events.php'</script>";

}
}

if(isset($_POST['update']))
{	
$sql=mysqli_query($con,"UPDATE `tblevents` SET `image`='$img',`date_of_event`='$date_of_event',`event_title`='$event_title',`content`='$content' WHERE ID = '$eid'");
if($sql)
{
echo "<script>alert('Event information has been Update successfully');</script>";
echo "<script>window.location.href ='manage-events.php'</script>";

}
}else{	
$sql=mysqli_query($con,"UPDATE `tblevents` SET `status`='3' WHERE ID = '$eid'");
if($sql)
{
echo "<script>alert('Event has been Delete successfully');</script>";
echo "<script>window.location.href ='manage-events.php'</script>";

}
}
?>