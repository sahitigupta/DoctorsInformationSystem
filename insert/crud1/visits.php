<?php
include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Visits Data</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax/visits-ajax.js"></script>
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
						<h2>Manage <b>Visits</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New visit</span></a>
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
						<th>Doc ID</th>
                        <th>Hosp ID</th>
                        <th>Day</th>
						<th>From time</th>
                        <th>To time</th>
						<th>Actions</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM visits");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["visit_id"]; ?>">
				<td>
							<!--<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="< echo $row["id"]; ?>">
								<label for="checkbox2"></label>
							</span>-->
					<td><?php echo $row["doc_id"]; ?></td>
					<td><?php echo $row["hosp_id"]; ?></td>
					<td><?php echo $row["day"]; ?></td>
					<td><?php echo $row["from_time"]; ?></td>
					<td><?php echo $row["to_time"]; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["visit_id"]; ?>"
							data-doc_id="<?php echo $row["doc_id"]; ?>"
							data-hosp_id="<?php echo $row["hosp_id"]; ?>"
							data-day="<?php echo $row["day"]; ?>"
							data-from_time="<?php echo $row["from_time"]; ?>"
							data-to_time="<?php echo $row["to_time"]; ?>"

							title="Edit">&#xE254;</i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["visit_id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
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
							<label>Doc ID</label>
							<input type="text" id="doc_id" name="doc_id" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Hosp ID</label>
							<input type="text" id="hosp_id" name="hosp_id" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Day</label>
							<input type="day" id="day" name="day" class="form-control" required>
						</div>
						<div class="form-group">
							<label>From time</label>
							<input type="from_time" id="from_time" name="from_time" class="form-control" required>
						</div>
						<div class="form-group">
							<label>To time</label>
							<input type="to_time" id="to_time" name="to_time" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="V1" name="type">
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
						<h4 class="modal-title">Edit Visits</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>Doc ID</label>
							<input type="text" id="doc_id_u" name="doc_id" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Hosp ID</label>
							<input type="text" id="hosp_id_u" name="hosp_id" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Day</label>
							<input type="day" id="day_u" name="day" class="form-control" required>
						</div>
						<div class="form-group">
							<label>From time</label>
							<input type="from_time" id="from_time_u" name="from_time" class="form-control" required>
						</div>
						<div class="form-group">
							<label>To time</label>
							<input type="to_time" id="to_time_u" name="to_time" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
					<input type="hidden" value="V2" name="type">
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
						<h4 class="modal-title">Delete Visits</h4>
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







