<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Doctor details</title>
</head>
<body>
<form action="" method="POST">
	
    <label>Clinic Name</label>
    <input type="text" name="clinicname" id="CName">
    <br><br>
	
	<label>Doctor</label>
    <input type="text" name="doc" id="Doctor">
    <br><br>
	
	<label>From time</label>
    <input type="text" name="fromtime" id="From">
    <br><br>

	<label>To time</label>
    <input type="text" name="totime" id="To">
    <br><br>
	
	<label>Day</label>
    <input type="text" name="day" id="Day">
    <br><br>
	
	<label>Phone number</label>
    <input type="text" name="phno" id="Phno">
    <br><br>
	
	<label>Ratings</label>
    <input type="text" name="ratings" id="Ratings">
    <br><br>
	
    <label>Location</label>
    <input type="text" name="loc" id="Location">
	<br>
	
	<input type="submit" name="button" value="Submit">
</form>
</body>
</html>

<?php
	include('config.php');
	if(isset($_POST["button"]))
	{	 
		echo "Hello";
		$clinicname = $_POST['clinicname'];
		$doc = $_POST['doc'];
		$fromtime = $_POST['fromtime'];
		$totime = $_POST['totime'];
		$day = $_POST['day'];
		$phno = $_POST['phno'];
		$ratings = $_POST['ratings'];
		$loc = $_POST['loc'];
		echo "$phno";
		$sql = "INSERT INTO `clinic`(`clinic_name`, `doc_id`, `from_time`, `to_time`, `day`, `phone_no`, `ratings`, `loc_id`) VALUES ('$clinicname', '$doc', '$fromtime', '$totime', '$day', '$phno', '$ratings','$loc')";
		if (mysql_query($sql)) {
			echo "New record created successfully !";
		} else {
			echo "Error: " . $sql . "" . mysql_error($conn);
		}
	}
?>

