<?php
include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Specialization Data</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
	<script src="ajax/spec-ajax.js"></script>
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
						<h2>Manage <b>Specializations</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Specialization</span></a>
						<!--<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>-->						
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
						<th>Spec ID</th>
                        <th>Specialization Name</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM specilization");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["spec_id"]; ?>">
				<td>
							<!--<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="< echo $row["spec_id"]; ?>">
								<label for="checkbox2"></label>
							</span>-->
						</td>
					<td><?php echo $row["spec_id"]; ?></td>
					<td><?php echo $row["spec_name"]; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["spec_id"]; ?>"
							data-spec_name="<?php echo $row["spec_name"]; ?>"

							title="Edit">&#xE254;</i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["spec_id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
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
						<h4 class="modal-title">Add Specialization</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Specialization Name</label>
							<input type="text" id="spec_name" name="spec_name" class="form-control" required>
						</div>	
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="S1" name="type">
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
						<h4 class="modal-title">Edit Specialization</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="spec_id" class="form-control" required>					
						<div class="form-group">
							<label>Specialization Name</label>
							<input type="text" id="spec_name_u" name="spec_name" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
					<input type="hidden" value="S2" name="type">
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
						<h4 class="modal-title">Delete Specialization</h4>
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

</body>
</html>                                		                            







