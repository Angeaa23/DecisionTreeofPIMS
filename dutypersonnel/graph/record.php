<?php
$con  = mysqli_connect("localhost","root","","epiz_31027381_rhu");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT * FROM `tblpatient`";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) {
            $total_patient[] = $row['total_ill'];
            $month[] = $row['illness'];
        }
 
 }
 
 
?>