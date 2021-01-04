<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Doctor details</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="style2.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.color.js"></script>
	<script type= "text/javascript" src="js/countries3.js"></script>
	<script type="text/javascript" charset="utf-8">
	// <![CDATA[
	$(document).ready(function(){
		$('div.port').hover(
		  function(){
			$(this).stop().animate({backgroundColor: "#f5f5f5"}, 300);
		  }, 
		  function(){
			$(this).stop().animate({backgroundColor: "#fff"}, 300);
		  });
	});
	// ]]>
	</script>
	</head>
	<style>
	table.table2 center {
		margin-left: auto; 
		margin-right: auto;
		/*border-collapse: collapse;*/
		
		/*color: #588c7e;*/
		
		font-size: 14px;
		text-align: center;
}
	table.table2 th {
		/*background-color: #588c7e;*/
		color: black;
}
	table.table2 tr:nth-child(even) {
		background-color: #f2f2f2;
	}
	table.table2 tr:last-child {
		background-color: #66FF66; /*green*/
	}
	</style>
	<body>
	<div class="main">
		<div class="header_resize">
			<div class="header">
			<div class="logo">
				<a href="index.php"><img src="images/logo.gif" width="280" height="62" border="0" alt="logo" /></a>
			</div>
			<div class="clr"></div>
			<div class="menu">
				<a href="#"><img src="images/linkedin.png" alt="picture" width="18" height="18" border="0" /></a> 
				<a href="#"><img src="images/facebook.png" alt="picture" width="18" height="18" border="0" /></a> 
				<a href="#"><img src="images/twitter.png" alt="picture" width="18" height="18" border="0" /></a>
				
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="doctor_info.php">Doctor</a></li>
					<li><a href="hospital_info.php">Hospital</a></li>
					<li><a href="clinic_info.php">Clinic</a></li> 
					<li><a href="docdetails.php" class="active">Admin</a></li> 
				</ul>
			</div>
			<div class="clr"></div>
			</div>
		</div>
		<div class="back_ground">
		<div class="clr"></div>
		<div class="body">
		<div class="body_resize">
			<h2>Doctor details</h2>
			<br>
			<form action="" method="POST">
				<table style="margin-top:10px; margin-left:10px;">
					<tr>
					<td><label>First Name</label></td>
					<td><input type="text" name="fname" id="firstName"></td>
					</tr>
					
					<tr>
					<td><label>Last Name</label></td>
					<td><input type="text" name="lname" id="lastName"></td>
					</tr>
					
					<tr>
					<td><label>Specialization</label></td>
					<td><input type="text" name="specname" id="SName"></td>
					</tr>
					
					<!--
					<label>Spec</label>
					<select name="spec" value="Specilization"></select>

					<
						include('config.php');
						
						if($_SERVER["REQUEST_METHOD"] == "POST")
						{
							$select='';
							if(isset($_POST['spec']))
								$select=$_POST['spec'];
							echo "$select";
						if($select=='Specilization')
							{
								echo "<form action='' method='post' >";
								echo "<table><tr><td> Specialization </td><td><select name='spec_id'>";
								$sql1=mysql_query("select * from specilization") or die ("nil");
								$count=mysql_num_rows($sql1);
								for($i=0;$i<$count;$i++)
								{
									$namesmp=mysql_fetch_array($sql1);
									$Sid=$namesmp['spec_id'];
									$S_name=$namesmp['spec_name'];
									echo "<option value='$spec_id'>$S_name</option>";		
								}
							}
						}
						echo "</td>";
						#mysql_close($conn);
					?>

					<br><br>
					-->
					<tr>
					<td><label>Specialization from</label></td>
					<td><input type="text" name="specilization_name" id="lastName"></td>
					</tr>
					
					<tr>
					<td><label>Start date of Experience</label></td>
					<td><input type="text" name="expdate" id="lastName"></td>
					</tr>
					
					<tr>
					<td><label>Qualification</label></td>
					<td><input type="text" name="qual" id="lastName"></td>
					</tr>
					
					<tr>
					<td><label>Phone number</label></td>
					<td><input type="text" name="phno" id="lastName"></td>
					</tr>
					
					<tr>
					<td><label>Email</label></td>
					<td><input type="text" name="email" id="lastName"></td>
					</tr>
					
					<tr>
					<td><label>Location</label></td>
					<td><input type="text" name="loc" id="emailAddress"></td>
					</tr>
					
					<tr><td></td>
					<td><input type="submit" name="button" value="Submit"></td></tr>
					
				</table>
				<br><br>
					
			</form>			

		<?php
			#include('config.php');
			$conn = mysql_connect('localhost','root','root') or die("Opps some thing went wrong1");
			mysql_select_db('test1', $conn) or die("Opps some thing went wrong");
			
			if(isset($_POST["button"]))
			{	 
				$firstname = $_POST['fname'];
				$lastname = $_POST['lname'];
				$spec = $_POST['specname'];
				$spcfrm = $_POST['specilization_name'];
				$expdate = $_POST['expdate'];
				$qual = $_POST['qual'];
				$phno = $_POST['phno'];
				$email = $_POST['email'];
				$loc = $_POST['loc'];
				
				$sql = "INSERT INTO `doctor`(`first_name`, `last_name`, `spec_id`, `specilization_from`, `exp_start_date`, `qualification`, `phone_no`, `email`, `loc_id`) VALUES ('$firstname','$lastname','$spec','$spcfrm','$expdate','$qual','$phno','$email','$loc')";
				if (mysql_query($sql)) {
					
					$sqldata = "SELECT * FROM doctor";
					$result = mysql_query($sqldata);
					
					echo "<table class='table2'>";

					echo "<tr> 
					<th colspan='10'><h2>Doctors Record</h2></th> 
					</tr>
						<th> ID </th> 
						<th> FName </th> 
						<th> LName </th>
						<th> Specialization ID </th>
						<th> Specialization from </th>
						<th> Exp_start_date </th>
						<th> Qualification </th>
						<th> Phone number </th>
						<th> Email </th>
						<th> Location ID </th>						  
					</tr>";
					#if ($result-> num_rows > 0) {
						// output data of each row
						while($rows = mysql_fetch_assoc($result)) {
							echo "<tr><td>" . $rows["doc_id"]. "</td><td>" . $rows["first_name"]. "</td><td>" . $rows["last_name"] . "</td><td>" . $rows["spec_id"]. "</td><td>" . $rows["specilization_from"]. "</td><td>" . $rows["exp_start_date"]. "</td><td>" . $rows["qualification"]. "</td><td>" . $rows["phone_no"]. "</td><td>" . $rows["email"]. "</td><td>" . $rows["loc_id"]. "</td></tr>";
						}
						echo "</table>";
				} else {
					echo "Error: " . $sql . "" . mysql_error($conn);
				}
			}
		?>
		<br><br><br>
		 
</div>
		<div class="clr"></div>
		</div>
	</div>
	</div>
	<div class="clr"></div>
		<div class="footer">
			<div class="footer_resize">
				<p class="leftt">Copyright © Doc Info. All Rights Reserved<br />
					<a href="index.php">Home</a> | <a href="index.php">Contact</a> <!--| <a href="index.php">RSS</a>-->
				</p>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
			<div class="clr"></div>
		</div>
	</body>
</html>
<!--
<
	
	#include("config.php");
	#echo "<form action='' method='post' >";
	
	echo "<table><tr><td> Select Specilization </td><td>
	<select name='spec_id'>";
	$sql=mysql_query("select * from specilization") or die ("nil");
	$count=mysql_num_rows($sql);
	for($i=0;$i<$count;$i++)
	{
		$namesmp=mysql_fetch_array($sql);
		$Sid=$namesmp['spec_id'];
		$S_name=$namesmp['spec_name'];
		echo "<option value='$Sid' >$S_name</option>";		
	}
	
	

?>
-->