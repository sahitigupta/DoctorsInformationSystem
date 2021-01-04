<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visits details</title>
</head>
<body>
<form action="" method="POST">
	<label>Doctor ID</label>
    <input type="text" name="doc_id" id="doc">
	<br><br>
	
    <label>Hospital ID</label>
    <input type="text" name="hosp_id" id="hosp">
    <br><br>
	
    <label>Day</label>
    <input type="text" name="day" id="day">
	<br><br>
	
	<label>From time</label>
    <input type="text" name="from_time" id="fromtime">
	<br><br>
	
	<label>To time</label>
    <input type="text" name="to_time" id="totime">
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
	 $doc_id = $_POST['doc_id'];
	 $hosp_id = $_POST['hosp_id'];
	 $day = $_POST['day'];
	 $from_time = $_POST['from_time'];
	 $to_time = $_POST['to_time'];
	 $sql = "INSERT INTO `visits`(`doc_id`, `hosp_id`, `day`, `from_time`, `to_time`) VALUES ('$doc_id', '$hosp_id', '$day', '$from_time', '$to_time')";
	 if (mysql_query($sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "" . mysql_error($conn);
	 }
	 #mysqli_close($conn);
}
?>

