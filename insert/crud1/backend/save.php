<?php

include 'config.php';

/******Location*******/

if(count($_POST)>0){
	if($_POST['type']=="L1"){
		$plot=$_POST['plot_no'];	
		$street=$_POST['street'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$country=$_POST['country'];
		$pin=$_POST['pin'];
		//if($plot==null &&)
		
		$sql = "INSERT INTO `location`(`plot_no`, `street`, `city`, `state`, `country`, `pin`)VALUES('$plot','$street', '$city','$state', '$country', '$pin')";
		#$sql = "INSERT INTO `student`(`fname`, `lname`, `email`) VALUES ('$plot', '$lname', '$email')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']=="L2"){
		$id=$_POST['id'];
		$plot=$_POST['plot'];	
		$street=$_POST['street'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$country=$_POST['country'];
		$pin=$_POST['pin'];
		$sql = "UPDATE `location` SET `plot_no`='$plot',`street`='$street',`city`='$city',`state`='$state',`country`='$country',`pin`='$pin' WHERE loc_id=$id";
		#$sql = "UPDATE `student` SET `fname`='$fname',`lname`='$lname',`email`='$email' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}


if(count($_POST)>0){
	if($_POST['type']=="L3"){
		$id=$_POST['id'];
		$sql = "DELETE FROM `location` WHERE loc_id=$id ";
		#$sql = "DELETE FROM `student` WHERE id =$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

/**********Specialization**********/

if(count($_POST)>0){
	if($_POST['type']=="S1"){
		$spec_name=$_POST['spec_name'];	
		$sql = "INSERT INTO `specilization`(`spec_name`) VALUES ('$spec_name')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']=="S2"){
		$spec_id=$_POST['spec_id'];
		$spec_name=$_POST['spec_name'];
		$sql = "UPDATE `specilization` SET `spec_name`='$spec_name' WHERE spec_id=$spec_id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']=="S3"){
		#print_r($_POST);
		$spec_id=$_POST['spec_id'];
		$sql = "DELETE FROM `specilization` WHERE spec_id =$spec_id ";
		#echo $sql;
		if (mysqli_query($conn, $sql)) {
			echo $spec_id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

/******Doctor*******/

if(count($_POST)>0){
	if($_POST['type']=="D1"){
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$spec_id=$_POST['spec_id'];
		$specilization_from=$_POST['specilization_from'];
		$exp_start_date=$_POST['exp_start_date'];
		$qualification=$_POST['qualification'];
		$phone_no=$_POST['phone_no'];
		$email=$_POST['email'];
		$loc_id=$_POST['loc_id'];
		
		$sql="INSERT INTO `doctor`(`first_name`, `last_name`, `spec_id`, `specilization_from`, `exp_start_date`, `qualification`, `phone_no`, `email`, `loc_id`) VALUES ('$first_name', '$last_name', '$spec_id', '$specilization_from', '$exp_start_date', '$qualification', '$phone_no', '$email', '$loc_id')";

		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']=="D2"){
		$id=$_POST['id'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$spec_id=$_POST['spec_id'];
		$specilization_from=$_POST['specilization_from'];
		$exp_start_date=$_POST['exp_start_date'];
		$qualification=$_POST['qualification'];
		$phone_no=$_POST['phone_no'];
		$email=$_POST['email'];
		$loc_id=$_POST['loc_id'];
		$sql= "UPDATE `doctor` SET `first_name`='$first_name',`last_name`='$last_name',`spec_id`='$spec_id',`specilization_from`='$specilization_from',`exp_start_date`='$exp_start_date',`qualification`='$qualification',`phone_no`='$phone_no',`email`='$email',`loc_id`='$loc_id' WHERE doc_id=$id";
		
		#$sql = "UPDATE `location` SET `plot_no`='$plot',`street`='$street',`city`='$city',`state`='$state',`country`='$country',`pin`='$pin' WHERE loc_id=$id";

		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}


if(count($_POST)>0){
	if($_POST['type']=="D3"){
		$id=$_POST['id'];
		/* 
		$result = mysqli_query($conn,"SELECT * FROM doctor");
		while($row = mysqli_fetch_array($result)) {
			$da = $row['exp_start_date'];
			echo $da;
			echo "\n";
			$sql2="CALL `experienceYear`('$da')";
			if ($res=mysqli_query($conn, "CALL `experienceYear`('$da')")) {
				
				echo json_encode(array("statusCode"=>200));
				echo "\n";
			
			$date=mysqli_fetch_array($res);
			print_r($date['exp_year']);
			echo "End \n";
			mysqli_free_result($res);
			} 
			else {
				echo "Error: " . mysqli_error($conn);
			}
			
			//print_r($res);
			
			
		} 
						
						
		
		$sqll = "select exp_start_date, CALL `experienceYear`('2000-01-01') as exp from doctor";
		$res1=mysqli_query($conn, $sqll);
		$date1=mysqli_fetch_array($res1);
		print_r($date); */
		$sql = "DELETE FROM `doctor` WHERE doc_id=$id ";
		#$sql = "DELETE FROM `location` WHERE loc_id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

/******Clinic*******/

if(count($_POST)>0){
	if($_POST['type']=="C1"){
		$clinic_name=$_POST['clinic_name'];	
		$doc_id=$_POST['doc_id'];
		$from_time=$_POST['from_time'];
		$to_time=$_POST['to_time'];
		$day=$_POST['day'];
		$phone_no=$_POST['phone_no'];
		$ratings=$_POST['ratings'];
		$loc_id=$_POST['loc_id'];
		$sql="INSERT INTO `clinic`(`clinic_name`, `doc_id`, `from_time`, `to_time`, `day`, `phone_no`, `ratings`, `loc_id`) VALUES ('$clinic_name','$doc_id','$from_time','$to_time','$day','$phone_no','$ratings','$loc_id')";
		#$sql = "INSERT INTO `location`(`plot_no`, `street`, `city`, `state`, `country`, `pin`)VALUES('$plot','$street', '$city','$state', '$country', '$pin')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']=="C2"){
		$id=$_POST['id'];
		$clinic_name=$_POST['clinic_name'];	
		$doc_id=$_POST['doc_id'];
		$from_time=$_POST['from_time'];
		$to_time=$_POST['to_time'];
		$day=$_POST['day'];
		$phone_no=$_POST['phone_no'];
		$ratings=$_POST['ratings'];
		$loc_id=$_POST['loc_id'];
		$sql="UPDATE `clinic` SET `clinic_name`='$clinic_name',`doc_id`='$doc_id',`from_time`='$from_time',`to_time`='$to_time',`day`='$day',`phone_no`='$phone_no',`ratings`='$ratings',`loc_id`='$loc_id' WHERE clinic_id=$id";
		#$sql = "UPDATE `location` SET `plot_no`='$plot',`street`='$street',`city`='$city',`state`='$state',`country`='$country',`pin`='$pin' WHERE loc_id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}


if(count($_POST)>0){
	if($_POST['type']=="C3"){
		$id=$_POST['id'];
		$sql = "DELETE FROM `clinic` WHERE clinic_id=$id ";
		#$sql = "DELETE FROM `location` WHERE loc_id=$id ";
		
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

/******Hospital*******/

if(count($_POST)>0){
	if($_POST['type']=="H1"){
		$hosp_name=$_POST['hosp_name'];	
		$phone_number=$_POST['phone_number'];
		$website=$_POST['website'];
		$ratings=$_POST['ratings'];
		$loc_id=$_POST['loc_id'];
		
		$sql = "INSERT INTO `hospital`(`hosp_name`, `phone_number`, `website`, `ratings`, `loc_id`)VALUES('$hosp_name','$phone_number', '$website','$ratings', '$loc_id')";
		#$sql = "INSERT INTO `student`(`fname`, `lname`, `email`) VALUES ('$plot', '$lname', '$email')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']=="H2"){
		$id=$_POST['id'];
		$hosp_name=$_POST['hosp_name'];	
		$phone_number=$_POST['phone_number'];
		$website=$_POST['website'];
		$ratings=$_POST['ratings'];
		$loc_id=$_POST['loc_id'];

		$sql = "UPDATE `hospital` SET `hosp_name`='$hosp_name',`phone_number`='$phone_number',`website`='$website',`ratings`='$ratings',`loc_id`='$loc_id' WHERE hosp_id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}


if(count($_POST)>0){
	if($_POST['type']=="H3"){
		$id=$_POST['id'];
		$sql = "DELETE FROM `hospital` WHERE hosp_id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}



/******Visits*******/

if(count($_POST)>0){
	if($_POST['type']=="V1"){
		$doc_id=$_POST['doc_id'];	
		$hosp_id=$_POST['hosp_id'];
		$day=$_POST['day'];
		$from_time=$_POST['from_time'];
		$to_time=$_POST['to_time'];
		
		$sql = "INSERT INTO `visits`(`doc_id`, `hosp_id`, `day`, `from_time`, `to_time`) VALUES ('$doc_id', '$hosp_id', '$day', '$from_time', '$to_time')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']=="V2"){
		$id=$_POST['id'];
		$doc_id=$_POST['doc_id'];	
		$hosp_id=$_POST['hosp_id'];
		$day=$_POST['day'];
		$from_time=$_POST['from_time'];
		$to_time=$_POST['to_time'];
		$sql = "UPDATE `visits` SET `doc_id`='$doc_id',`hosp_id`='$hosp_id',`day`='$day',`from_time`='$from_time',`to_time`='$to_time' WHERE visit_id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}


if(count($_POST)>0){
	if($_POST['type']=="V3"){
		$id=$_POST['id'];
		$sql = "DELETE FROM `visits` WHERE visit_id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}




if(count($_POST)>0){
	if($_POST['type']==1){
		$fname=$_POST['fname'];	
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		#$city=$_POST['city'];
		#$sql = "INSERT INTO `crud`( `name`, `email`,`phone`,`city`) VALUES ('$name','$email','$phone','$city')";
		$sql = "INSERT INTO `student`(`fname`, `lname`, `email`) VALUES ('$fname', '$lname', '$email')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		/*$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$city=$_POST['city'];
		$sql = "UPDATE `crud` SET `name`='$name',`email`='$email',`phone`='$phone',`city`='$city' WHERE id=$id";*/
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$sql = "UPDATE `student` SET `fname`='$fname',`lname`='$lname',`email`='$email' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}


if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		#$sql = "DELETE FROM `crud` WHERE id=$id ";
		$sql = "DELETE FROM `student` WHERE id =$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		#$sql = "DELETE FROM crud WHERE id in ($id)";
		$sql = "DELETE FROM student WHERE id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>