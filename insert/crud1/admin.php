<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
	.logo,.menu{
		background: black;
	}
	.nav-item dropdown{
		color: white;
	}
	.page{
		height: 200px;
	}
	/*.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}*/
	.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #ddd;
  color: white;
}

.topnav-right {
  float: right;
}
</style>
<body>

	<div class="logo">
	  <!-- Brand -->
	  <a href="admin.php"><img src="images/logo.png"></a>
	</div>
	
	<div class="menu">
		<!--<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Menu </a>-->
		<!--<div class="topnav">-->
			<button type="button" class="btn btn-success">Menu</button>
			<!--<button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Location</a>
				<a class="dropdown-item" href="#">Specialization</a>
				<a class="dropdown-item" href="#">Doctor</a>
				<a class="dropdown-item" href="#">Hospital</a>
				<a class="dropdown-item" href="#">Clinic</a>
				<a class="dropdown-item" href="#">Visits</a>
			</div>	-->
			<!--<div class="container h-100"> 
				<div class="d-flex h-100">
					<div class="align-self-end ml-auto"> -->
						<a class="btn btn-success float-right" href="../../index.php">
						Logout
						</a>
					<!--</div>		
				</div>
			</div>
			
			<div class="topnav-right">
				<a href="../../index.php">Logout</a>
			</div>
		</div>-->
	</div>
	<div class = "clr"></div>

	<div class = "pages">
		<h1 style="color:black;text-align:center;">Admin page</h1> 
		<br><br><br>
		<!--<div class="container h-100"> 
			<div class="d-flex h-100"> -->
				<!--<div class="align-self-start mr-auto"> -->
				<table class="table table-bordered">
				<tr>
					<a class="btn btn-success" href="location.php"> 
					  Location
					</a></tr> 
					<tr></tr>
				<!--</div> 
				<!--<div class="align-self-center mx-auto"> -->
					<tr><a class="btn btn-success" href="spec.php"> 
					  Specialization
					</a></tr>
					<tr>					</tr>
				<!--</div> -->
				<!--<div class="align-self-end ml-auto"> -->
					<tr><a class="btn btn-success" href="doctor.php"> 
					  Doctor
					</a></tr> 
				<!--</div> -->
				<!--<div class="align-self-start mr-auto"> -->
				
					<tr><a class="btn btn-success" href="clinic.php"> 
					 Clinic
					</a>  </tr>
					<tr></tr>
				<!--</div> -->
				<!--<div class="align-self-center mx-auto"> -->
					<tr><a class="btn btn-success" href="hospital.php">
					  Hospital
					</a></tr>
					<tr></tr>					
				<!--</div> 
				<div class="align-self-end ml-auto"> -->
					<tr><a class="btn btn-success" href="visits.php">
					  Visits
					</a></tr> 
				</table>
				</div> 
		
		
	
</body>
</html>
