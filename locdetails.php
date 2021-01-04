<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Location details</title>
</head>
<body>
<form action="" method="POST">
	<label>Plot number</label>
    <input type="text" name="plot_no" id="plot">
	<br><br>
	
    <label>Street</label>
    <input type="text" name="street" id="street">
    <br><br>
	
    <label>City</label>
    <input type="text" name="city" id="city">
	<br><br>
	
	<label>State</label>
    <input type="text" name="state" id="state">
	<br><br>
	
	<label>Country</label>
    <input type="text" name="country" id="country">
	<br><br>
	
	<label>Pincode</label>
    <input type="text" name="pin" id="pincode">
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
	 $plot_no = $_POST['plot_no'];
	 $street = $_POST['street'];
	 $city = $_POST['city'];
	 $state = $_POST['state'];
	 $country = $_POST['country'];
	 $pin = $_POST['pin'];
	 $sql = "INSERT INTO `location`(`plot_no`, `street`, `city`, `state`, `country`, `pin`) VALUES ('$plot_no','$street', '$city', '$state', '$country', '$pin')";
	 if (mysql_query($sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "" . mysql_error($conn);
	 }
	 #mysqli_close($conn);
}
?>

