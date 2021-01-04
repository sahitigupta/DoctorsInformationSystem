<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hospital details</title>
</head>
<body>
<form action="" method="POST">
	
    <label>Hospital Name</label>
    <input type="text" name="hosp_name" id="HName">
    <br><br>
	
	<label>Phone number</label>
    <input type="text" name="phone_number" id="Phno">
    <br><br>
	
	<label>Website</label>
    <input type="text" name="website" id="web">
    <br><br>
	
	<label>Ratings</label>
    <input type="text" name="ratings" id="Ratings">
    <br><br>
	
    <label>Location ID</label>
    <input type="text" name="loc_id" id="Location">
	<br><br>
	
	<input type="submit" name="button" value="Submit">
</form>
</body>
</html>

<?php
	include('config.php');
	if(isset($_POST["button"]))
	{	 
		$hosp_name = $_POST['hosp_name'];
		$phone_number = $_POST['phone_number'];
		$website = $_POST['website'];
		$ratings = $_POST['ratings'];
		$loc_id = $_POST['loc_id'];
		$sql = "INSERT INTO `hospital`(`hosp_name`, `phone_number`, `website`, `ratings`, `loc_id`) VALUES ('$hosp_name', '$phone_number', '$website', '$ratings', '$loc_id')";
		if (mysql_query($sql)) {
			echo "New record created successfully !";
		} else {
			echo "Error: " . $sql . "" . mysql_error($conn);
		}
	}
?>

