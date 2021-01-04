<?php
include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Location Data</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax/loc-ajax.js"></script>
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
						<h2>Manage <b>Locations</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Location</span></a>
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
						<th>LOC ID</th>
                        <th>PLOT NO</th>
                        <th>STREET</th>
						<th>CITY</th>
                        <th>STATE</th>
						<th>COUNTRY</th>
						<th>PIN</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM location");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["loc_id"]; ?>">
				<td>
							<!--<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="< echo $row["id"]; ?>">
								<label for="checkbox2"></label>
							</span>-->
						</td>
					<td><?php echo $row["loc_id"]; ?></td>
					<td><?php echo $row["plot_no"]; ?></td>
					<td><?php echo $row["street"]; ?></td>
					<td><?php echo $row["city"]; ?></td>
					<td><?php echo $row["state"]; ?></td>
					<td><?php echo $row["country"]; ?></td>
					<td><?php echo $row["pin"]; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["loc_id"]; ?>"
							data-plot="><?php echo $row["plot_no"]; ?>"
							data-street="<?php echo $row["street"]; ?>"
							data-city="<?php echo $row["city"]; ?>"
							data-state="<?php echo $row["state"]; ?>"
							data-country="<?php echo $row["country"]; ?>"
							data-pin="<?php echo $row["pin"]; ?>"

							title="Edit">&#xE254;</i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["loc_id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
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
						<h4 class="modal-title">Add Location</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>PLOT NO</label>
							<input type="text" id="plot_no" name="plot_no" class="form-control" required>
						</div>
						<div class="form-group">
							<label>STREET</label>
							<input type="text" id="street" name="street" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CITY</label>
							<input type="city" id="city" name="city" class="form-control" required>
						</div>
						<div class="form-group">
							<label>STATE</label>
							<input type="state" id="state" name="state" class="form-control" required>
						</div>
						<div class="form-group">
							<label>COUNTRY</label>
							<input type="country" id="country" name="country" class="form-control" required>
						</div>
						<div class="form-group">
							<label>PIN</label>
							<input type="pin" id="pin" name="pin" class="form-control" required>
						</div>

					</div>
					<div class="modal-footer">
					    <input type="hidden" value="L1" name="type">
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
						<h4 class="modal-title">Edit Location</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>Plot no</label>
							<input type="text" id="plot_u" name="plot" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Street</label>
							<input type="text" id="street_u" name="street" class="form-control" required>
						</div>
						<div class="form-group">
							<label>City</label>
							<input type="city" id="city_u" name="city" class="form-control" required>
						</div>
						<div class="form-group">
							<label>State</label>
							<input type="text" id="state_u" name="state" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Country</label>
							<input type="country" id="country_u" name="country" class="form-control" required>
						</div>
						<div class="form-group">
							<label>pin</label>
							<input type="pin" id="pin_u" name="pin" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
					<input type="hidden" value="L2" name="type">
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

</body>
</html>                                		                            







