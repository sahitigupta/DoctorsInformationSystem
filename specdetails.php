<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Record Form</title>
</head>
<body>
<form action="" method="POST">
	<label>Specialization Name</label>
    <input type="text" name="spec_name" id="SName">
	<br><br>
		
	<input type="submit" name="button" value="Submit">
	<br><br>
	
</form>
</body>
</html>

<?php
include('config.php');

if(isset($_POST["button"]))
{	 
	 $spec_name = $_POST['spec_name'];
	 $sql = "INSERT INTO `specilization`(`spec_name`) VALUES ('$spec_name')";
	 if (mysql_query($sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "" . mysql_error($conn);
	 }
	 #mysqli_close($conn);
}
?>

