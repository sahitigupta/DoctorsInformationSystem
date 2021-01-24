<?php
include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hospital Data</title>
	<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="css/googleapisfont.css">
	<link rel="stylesheet" href="css/googleapisMaterialicons.css">
	<link rel="stylesheet" href="bootstrap/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
	<script src="googleapis/js/jquery.min.js"></script>
	<script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="ajax/hospital-ajax.js"></script>
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

		<div class="dropdown">
			<button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" style="margin-left: 50px;">Menu
			<span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li><a href="location.php">Location</a></li>
				<li><a href="spec.php">Specialization</a></li>
				<li><a href="doctor.php">Doctor</a></li>
				<li><a href="hospital.php">Hospital</a></li>
				<li><a href="clinic.php">Clinic</a></li>
				<li><a href="visits.php">Visits</a></li>
				<li class="divider"></li>
				<li><a href="../../index.php" onclick="logout()">Logout</a></li>
			</ul>
		</div>	
	</div>
			
	</div>
	<div class = "clr"></div>
	



    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Hospitals</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" onclick="addValid()"><i class="material-icons">&#xE147;</i> <span>Add New Hospital</span></a>
						<!--<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						-->
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<!--<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>-->
						</th>
						<th>Hosp ID</th>
                        <th>Hospital Name</th>
                        <th>Phone</th>
						<th>Website</th>
                        <th>Ratings</th>
						<th>Loc ID</th>
						<th>Total doctors</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM hospital");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["hosp_id"]; ?>">
				<td>
							<!--<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="< echo $row["id"]; ?>">
								<label for="checkbox2"></label>
							</span>-->
						</td>
					<td><?php echo $row["hosp_id"]; ?></td>
					<td><?php echo $row["hosp_name"]; ?></td>
					<td><?php echo $row["phone_number"]; ?></td>
					<td><?php echo $row["website"]; ?></td>
					<td><?php echo $row["ratings"]; ?></td>
					<td><?php echo $row["loc_id"]; ?></td>
					<td><?php echo $row["total_doctors"]; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["hosp_id"]; ?>"
							data-hosp_name="<?php echo $row["hosp_name"]; ?>"
							data-phone_number="<?php echo $row["phone_number"]; ?>"
							data-website="<?php echo $row["website"]; ?>"
							data-ratings="<?php echo $row["ratings"]; ?>"
							data-loc_id="<?php echo $row["loc_id"]; ?>"
							data-total_doctors="<?php echo $row["total_doctors"]; ?>"

							title="Edit">&#xE254;</i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["hosp_id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete">&#xE872;</i></a>
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
					<div class="modal-header">						
						<h4 class="modal-title">Add Doctor</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					

						<div class="form-group">
							<label>Hospital Name</label>
							<input type="text" id="hosp_name" name="hosp_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="phone_number" id="phone_number" name="phone_number" class="form-control" onfocusout="phoneValid()" required>
							<label id="ph_label"></label>
						</div>
						<div class="form-group">
							<label>Website</label>
							<input type="website" id="website" name="website" class="form-control" onfocusout="websiteValid()" required>
							<label id="web_label"></label>
						</div>
						<div class="form-group">
							<label>Ratings</label>
							<input type="ratings" id="ratings" name="ratings" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Loc ID</label>
							<input type="loc_id" id="loc_id" name="loc_id" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="H1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add" onclick="addValid1()">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Hospital</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>Hospital Name</label>
							<input type="text" id="hosp_name_u" name="hosp_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="phone_number" id="phone_number_u" name="phone_number" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Website</label>
							<input type="website" id="website_u" name="website" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Ratings</label>
							<input type="ratings" id="ratings_u" name="ratings" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Loc ID</label>
							<input type="loc_id" id="loc_id_u" name="loc_id" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
					<input type="hidden" value="H2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete Hospital</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete this record?</p>

					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<script>
	function logout(){
		alert('Successfully logged out!');
	}
	function phoneValid() {
		var x = document.getElementById("phone_number").value;
		if(x.length != 10) {
			document.getElementById('ph_label').style.color = 'red';
			document.getElementById("ph_label").innerHTML = "Invalid phone number";
		}
		else {
			document.getElementById('ph_label').style.color = 'green';
			document.getElementById("ph_label").innerHTML = "Valid phone number";
		}
	}
	function websiteValid() {
		var userInput = document.getElementById("website").value;
		var res = userInput.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
		if(res == null) {
			document.getElementById('web_label').style.color = 'red';
			document.getElementById("web_label").innerHTML = "Invalid website";
		}
		else{
			document.getElementById('web_label').style.color = 'green';
			document.getElementById("web_label").innerHTML = "Valid website";
		}
	}
	function addValid(){
		document.getElementById("btn-add").disabled = false;
	}
	function addValid1(){
		var ip1 = document.getElementById("hosp_name").value;
		var ip2 = document.getElementById("phone_number").value;
		var ip3 = document.getElementById("website").value;
		if(ip1==""||ip2==""||ip3==""){
			alert("Please fill the form with valid details");
			document.getElementById("btn-add").disabled = true;
		}
	}
</script>

</body>
</html>                                		                            







