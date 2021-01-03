<!DOCTYPE html>
<html lang="en">
<head>
  <title>Logo menu</title>
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
</style>
<body>

	<div class="logo">
	  <!-- Brand -->
	  <a href="menu.php"><img src="images/logo.png"></a>
	</div>
	
	<div class="menu">
		<!--<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Menu </a>-->
		<div class="btn-group">
			<button type="button" class="btn btn-success">Menu</button>
			<button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Location</a>
				<a class="dropdown-item" href="#">Specialization</a>
				<a class="dropdown-item" href="#">Doctor</a>
				<a class="dropdown-item" href="#">Hospital</a>
				<a class="dropdown-item" href="#">Clinic</a>
				<a class="dropdown-item" href="#">Visits</a>
			</div>
			
		</div>
	</div>
	<div class = "clr"></div>

	<div class = "pages">
		<h1 style="color:black;text-align:center;">Admin page</h1> 
		<br><br><br>
		<div class="container h-100"> 
			<div class="d-flex h-100"> 
				<!--<div class="align-self-start mr-auto"> -->
					<button type="button" class="btn btn-danger"> 
					   Location
					</button> 
				<!--</div> 
				<!--<div class="align-self-center mx-auto"> -->
					<a class="btn btn-success" href="index.php"> 
					  Specialization
					</a> 
				<!--</div> -->
				<!--<div class="align-self-end ml-auto"> -->
					<button type="button" class="btn btn-success"> 
					  Doctor
					</button> 
				<!--</div> -->
				<!--<div class="align-self-start mr-auto"> -->
					<button type="button" class="btn btn-danger"> 
					  Hospital
					</button> 
				<!--</div> -->
				<!--<div class="align-self-center mx-auto"> -->
					<button type="button" class="btn btn-primary"> 
					  Clinic
					</button> 
				<!--</div> 
				<div class="align-self-end ml-auto"> -->
					<button type="button" class="btn btn-success"> 
					  Visits
					</button> 
				</div> 
			</div> 
		</div> 
	</div>
	
</body>
</html>
