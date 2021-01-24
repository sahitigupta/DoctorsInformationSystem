<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
</head>
<style>
	.logo,.menu{
		background: black;
	}
</style>
<body>

	<div class="logo">
	  <!-- Brand -->
	  <a href="admin.php"><img src="images/logo.png"></a>
	</div>
	
	<div class="menu">
		<button type="button" class="btn btn-success" style="margin-left: 50px;">Menu</button>
		<a class="btn btn-success float-right" href="../../index.php" style="margin-right: 50px;" onclick="logout()">
		Logout
		</a>
		<script>
			function logout(){
				alert('Successfully logged out!');
			}
		</script>
		
	</div>
	<div class = "clr"></div>

	<div class = "pages">
		<h1 style="color:black;text-align:center;">ADMIN</h1> 
		<br><br><br>
		<a class="btn btn-success float-center " href="spec.php" style="margin-left: 630px"> 
		Specialization
		</a><br><br>
				
		<a class="btn btn-success" href="location.php" style="margin-left: 430px"> 
		Location
		</a>
				
		<a class="btn btn-success" href="doctor.php" style="margin-left: 330px"> 
		Doctor
		</a><br><br><br><br>
				
		<a class="btn btn-success" href="clinic.php" style="margin-left: 435px"> 
		Clinic
		</a>
				
		<a class="btn btn-success" href="visits.php" style="margin-left: 356px">
		Visits
		</a><br><br>

		<a class="btn btn-success" href="hospital.php" style="margin-left: 650px">
		Hospital
		</a>
	</div> 
	
</body>
</html>
