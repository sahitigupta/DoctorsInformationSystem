<?php
include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor Data</title>
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
	<script src="ajax/doc-ajax.js"></script>
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
				<script>
					function logout(){
						alert('Successfully logged out!');
					}
				</script>
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
						<h2>Manage <b>Doctors</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Doctor</span></a>
						<!--<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						-->
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<!--<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>-->
						<th>DOC ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
						<th>Spec ID</th>
                        <th>Spec from</th>
						<th>Exp startdate</th>
						<th>Qualification</th>
                        <th>Phone</th>
						<th>Email</th>
						<th>Loc ID</th>
						<th>Actions</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM doctor");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["doc_id"]; ?>">
				<!--<td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="< echo $row["id"]; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>-->
					<td><?php echo $row["doc_id"]; ?></td>
					<td><?php echo $row["first_name"]; ?></td>
					<td><?php echo $row["last_name"]; ?></td>
					<td><?php echo $row["spec_id"]; ?></td>
					<td><?php echo $row["specilization_from"]; ?></td>
					<td><?php echo $row["exp_start_date"]; ?></td>
					<td><?php echo $row["qualification"]; ?></td>
					<td><?php echo $row["phone_no"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["loc_id"]; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["doc_id"]; ?>"
							data-first_name="<?php echo $row["first_name"]; ?>"
							data-last_name="<?php echo $row["last_name"]; ?>"
							data-spec_id="<?php echo $row["spec_id"]; ?>"
							data-specilization_from="<?php echo $row["specilization_from"]; ?>"
							data-exp_start_date="<?php echo $row["exp_start_date"]; ?>"
							data-qualification="<?php echo $row["qualification"]; ?>"
							data-phone_no="<?php echo $row["phone_no"]; ?>"
							data-email="<?php echo $row["email"]; ?>"
							data-loc_id="<?php echo $row["loc_id"]; ?>"

							title="Edit">&#xE254;</i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["doc_id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
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
							<label>First Name</label>
							<input type="text" id="first_name" name="first_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" id="last_name" name="last_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Spec ID</label>
							<input type="spec_id" id="spec_id" name="spec_id" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Specialization from</label>
							<input type="specilization_from" id="specilization_from" name="specilization_from" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Exp startdate</label>
							<input type="exp_start_date" id="exp_start_date" name="exp_start_date" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Qualification</label>
							<input type="qualification" id="qualification" name="qualification" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="phone" id="phone_no" name="phone_no" class="form-control" onfocusOut="phoneValid()" required>
							<label id="ph_label"></label>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email" name="email" class="form-control" onfocusOut="emailValid()" required>
							<label id="email_label"></label>
						</div>
						<div class="form-group">
							<label>Loc ID</label>
							<input type="loc_id" id="loc_id" name="loc_id" class="form-control" required>
						</div>

					</div>
					<div class="modal-footer">
					    <input type="hidden" value="D1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Add</button>
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
						<h4 class="modal-title">Edit Doctor</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>First Name</label>
							<input type="text" id="first_name_u" name="first_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" id="last_name_u" name="last_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Spec ID</label>
							<input type="spec_id" id="spec_id_u" name="spec_id" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Specialization from</label>
							<input type="specilization_from" id="specilization_from_u" name="specilization_from" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Exp startdate</label>
							<input type="exp_start_date" id="exp_start_date_u" name="exp_start_date" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Qualification</label>
							<input type="qualification" id="qualification_u" name="qualification" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="phone" id="phone_no_u" name="phone_no" class="form-control" onfocusout="phoneValid()" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email_u" name="email" class="form-control" onfocusout="emailValid()" required>
						</div>
						<div class="form-group">
							<label>Loc ID</label>
							<input type="loc_id" id="loc_id_u" name="loc_id" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
					<input type="hidden" value="D2" name="type">
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
						<h4 class="modal-title">Delete Location</h4>
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
function phoneValid() {
	var x = document.getElementById("phone_no").value;
	if(x.length != 10) {
		document.getElementById('ph_label').style.color = 'red';
		document.getElementById("ph_label").innerHTML = "Invalid phone number";
  }
  else {
		document.getElementById('ph_label').style.color = 'green';
		document.getElementById("ph_label").innerHTML = "Valid phone number";
  }
}
function emailValid() {
	var userInput = document.getElementById("email").value;
	var res = userInput.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
    if(res == null) {
	    document.getElementById('email_label').style.color = 'red';
        document.getElementById("email_label").innerHTML = "Invalid email";
	}
	else{
		document.getElementById('email_label').style.color = 'green';
        document.getElementById("email_label").innerHTML = "Valid email";
	}
}
</script>

</body>
</html>                                		                            







