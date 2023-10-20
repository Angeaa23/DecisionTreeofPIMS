<?php
	if(ISSET($_POST['search'])){
		$PatientCode = $_POST['PatientCode'];
		$query=mysqli_query($con, "SELECT * FROM `tblpatient` WHERE PatientCode = '$PatientCode'") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	
		  <tr>
			<th scope>Name</th>
			<td><?php  echo $fetch['PatientName'];?></td>
			<th scope>Email</th>
			<td><?php  echo $fetch['PatientEmail'];?></td>
		  </tr>
		  <tr>
			<th scope>Mobile Number</th>
			<td><?php  echo $fetch['PatientContno'];?></td>
			<th>Address</th>
			<td><?php  echo $fetch['PatientAdd'];?></td>
		  </tr>
			<tr>
			<th>Gender</th>
			<td><?php  echo $fetch['PatientGender'];?></td>
			<th>Birth Date</th>
			<td><?php  echo date('F j, Y', strtotime($fetch['PatientBirthday']));?></td>
		  </tr>
		  
		  <tr>
			<th>Birth Place</th>
			<td><?php  echo $fetch['PatientBirthplace'];?></td>
			 <th>Civil Status</th>
			<td><?php  echo $fetch['PatientCivil'];?></td>
		  </tr>
		  
		   <tr>
			<th>Religion</th>
			<td><?php  echo $fetch['PatientReligion'];?></td>
			 <th>Blood Type</th>
			<td><?php  echo $fetch['PatientBlood'];?></td>
		  </tr>
		  
		  <tr>
			<th>Mother Name (maiden)</th>
			<td><?php  echo $fetch['MotherName'];?></td>
			 <th>Mother Birthdate</th>
			<td><?php  echo date('F j, Y', strtotime($fetch['MotherBirthday']));?></td>
		  </tr>
		  
		  <tr>
			<th>Region</th>
			<td><?php  echo $fetch['PatientRegion'];?></td>
			 <th>DWSD NHTS Member</th>
			<td><?php  echo $fetch['DswdMember'];?></td>
		  </tr>
		  
		  <tr>
			<th>Philhealth Member</th>
			<td><?php  echo $fetch['PhilhealthMember'];?></td>
			 <th>Philhealth Status Type</th>
			<td><?php  echo $fetch['PhilhealthStatus'];?></td>
		  </tr>

		  <tr>	
			<th>Medical History (if any)</th>
			<td><?php  echo $fetch['PatientMedhis'];?></td>
			 <th>Reg Date</th>
			<td><?php  echo date('F j, Y, g:i a', strtotime($fetch['CreationDate']));?></td>
		  </tr>
		  
		  <tr class="alert-info">
		   <th colspan="12" >Vital Signs</th> 
		  </tr>
		  
		  <tr>
			<th scope>Blood Pressure</th>
			<td><?php  echo $fetch['BloodPressure'];?></td>
			<th scope>BP Measurement Assessment</th>
			<td><?php  echo $fetch['BpMeasurement'];?></td>
		  </tr>
		  
		  <tr>
			<th scope>Body Temperature</th>
			<td><?php  echo $fetch['BodyTemperature'];?></td>
			<th scope>Intake of Hypertension Medicine</th>
			<td><?php  echo $fetch['IntakeMed'];?></td>
		  </tr>
		  
		  <tr>
		    <th scope>Pulse Rate</th>
			<td><?php  echo $fetch['PulseRate'];?></td>
			<th scope>Administered By</th>
			<td><?php  echo $fetch['AdministeredBy'];?></td>
		  </tr>
		  
		<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		  <tr class="alert-info">
		   <th colspan="12" >Consultation History</th> 
		  </tr>
		  <tr style="font-size : 10px;">
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
		  
		  <?php  
		$ret=mysqli_query($con, "select * from tblmedicalhistory  where PatientID=".$fetch['ID']." ORDER BY CreationDate DESC") or die(mysqli_error());
		$num=mysqli_num_rows($ret);
		if($num>0){
		$cnt=1;
		while ($fetch1=mysqli_fetch_array($ret)) { 
		  ?>
		<tr>
		  <td><?php echo $cnt;?></td>
		  <td><?php  echo date('M j, Y, g:i a', strtotime($fetch1['CreationDate']));?></td>
		  <td><?php  echo $fetch1['PatientAge'];?></td>
		  <td><?php  echo $fetch1['Weight'];?></td>
		  <td><?php  echo $fetch1['Height'];?></td>
		  <td><?php  echo $fetch1['BirthWeight'];?></td>
		  <td><?php  echo $fetch1['BirthLength'];?></td>
		  <td><?php  echo $fetch1['Bmi'];?></td>
		  <td><?php  echo $fetch1['BmiCategory'];?></td>
		  <td><?php  echo $fetch1['WaistCircum'];?></td>
		  <td><?php  echo $fetch1['MedHistory'];?></td>
		  <td><?php  echo $fetch1['MedicalPres'];?></td> 
		</tr>
		<?php 
$cnt=$cnt+1;
} }else{
			echo'
			<tr>
				<td colspan = "12"><center>Record Not Found</center></td>
			</tr>';
		} ?>
		  
	</table>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	}else{
			echo'
			<tr>
				<td colspan = "4"><center>Search....</center></td>
			</tr>';
		}
?>
