<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Doctor</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.color.js"></script>
<script type="text/javascript" charset="utf-8">
// <![CDATA[
$(document).ready(function(){
	$('div.port').hover(
	  function(){
		$(this).stop().animate({backgroundColor: "#f5f5f5"}, 300);
	  }, 
	  function(){
		$(this).stop().animate({backgroundColor: "#fff"}, 300);
	  });
});
// ]]>
</script>
</head>
<body>
<div class="main">
	<div class="header_resize">
		<div class="header">
			<div class="logo">
				<a href="index.php"><img src="images/logo.gif" width="280" height="62" border="0" alt="logo" /></a>
			</div>
      
		<div class="clr"></div>
		<div class="menu"> 
			<a href="#"><img src="images/linkedin.png" alt="picture" width="18" height="18" border="0" /></a> 
			<a href="#"><img src="images/facebook.png" alt="picture" width="18" height="18" border="0" /></a> 
			<a href="#"><img src="images/twitter.png" alt="picture" width="18" height="18" border="0" /></a>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="docdetails.php" class="active">Doctor</a></li>
				<!--<li><a href="hospital_info.php">Hospital</a></li>
				<li><a href="clinic_info.php">Clinic</a></li>-->
			</ul>
		</div>
		<div class="clr"></div>
		</div>
	</div>
	<div class="back_ground">
		<div class="clr"></div>
		<div class="body">
		<div class="body_resize">
			<h3> Search for Doctors by name
			<?php
				include("config1.php");
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$first_name=$_POST['doc_name'];
					echo $first_name;
				}
			?>
        </h3>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <table align="center" width="900px" height="auto" bgcolor="#FFF" bordercolor="#000" border="0" >
        
		<?php
	
			$sql1=mysqli_query($conn,"call searchDoctor('$first_name')") or die("Error1");
			$count=mysqli_num_rows($sql1);
			if($count==0)
			{
				echo "NO DOCTORS FOUND IN THE RECORD";
				echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
			}
			else
			{
				for($i=0;$i<$count;$i++)
				{
					$temp=$i+1;
					$namesmp=mysqli_fetch_array($sql1);
					$doc_id=$namesmp['doc_id'];
					$first_name=$namesmp['first_name'];
					$last_name=$namesmp['last_name'];
					$phone_no=$namesmp['phone_no'];
					$spec_id=$namesmp['spec_id'];
					$loc_id=$namesmp['loc_id'];
					$email=$namesmp['email'];
					$plot_no=$namesmp['plot_no'];
					$street=$namesmp['street'];
					$city=$namesmp['city'];
					$state=$namesmp['state'];
					$country=$namesmp['country'];
					$pin=$namesmp['pin'];
					$exp_start_date=$namesmp['exp_start_date'];
					
					mysqli_close($conn);					
					include("config1.php");
					
					$exp=mysqli_query($conn,"call experienceYear('$exp_start_date')");
					$e1=mysqli_fetch_array($exp);
					$yr=$e1['exp_year'];
					
					$specilization_from=$namesmp['specilization_from'];
					$qualification=$namesmp['qualification'];
			        mysqli_close($conn);
			/*$sql2=mysql_query("Select * from career where Did='$id' ")or die("erro2");
			$career=mysql_fetch_array($sql2);
			$Ratings=$career['Ratings'];
			$Exp=$career['Exp'];
			$Specilization_from=$career['Specilization_from'];
			$Qualification=$career['Qualification'];*/
			        include("config1.php");
					$query=mysqli_query($conn,"Select * from specilization where spec_id='$spec_id' ");
					$spe=mysqli_fetch_array($query);
					$spec_name=$spe['spec_name'];
			
					echo "<tr bgcolor='#ddd'> <td colspan='4' align='center'> Doctor $temp Details </td> </tr>"; 
					echo "<tr> 
							<td bgcolor='#CCCCFF' colspan='2' align='center'><label> Name </label></td> 
							<td bgcolor='#CCFFFF' colspan='2' align='center'> $first_name $last_name </td>
						</tr>";
					echo "<tr>
							<td bgcolor='#CCCCFF' colspan='2' align='center'> <label> Specilization </label></td> 
							<td bgcolor='#CCFFFF' colspan='2' align='center'>$spec_name </td>
						</tr>";
					echo "<tr>
							<td bgcolor='#CCCCFF' colspan='2' align='center'> <label> Qualification </label></td> 
							<td bgcolor='#CCFFFF' colspan='2' align='center'>$qualification</td>
						</tr>";
					echo " <tr>
							<td bgcolor='#CCCCFF' colspan='2' align='center'> <label> Experience years</label></td> 
							<td bgcolor='#CCFFFF' colspan='2' align='center'>$yr  </td>
						</tr>";
					echo " <tr>
							<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Specilization from </label></td> 
							<td bgcolor='#CCFFFF' colspan='2' align='center'> $specilization_from</td>
						</tr>";
					#echo "<td  bgcolor='#CCCCFF'> <label> Ratings </label></td> <td bgcolor='#CCFFFF'> $Ratings </td></tr>";
					echo "<tr> 
							<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Phone number </label></td> 
							<td bgcolor='#CCFFFF' colspan='2' align='center'> $phone_no </td>
						</tr>";
					echo "<tr>
							<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Address</label></td> 
							<td bgcolor='#CCFFFF' colspan='2' align='center'> #$plot_no, $street, $city,<br />$state, $country, $pin </td>
						</tr>";
		
					$sql3=mysqli_query($conn,"select * from visits where doc_id='$doc_id' ") or die("error3");
					$hos_count=mysqli_num_rows($sql3);
					for($j=0;$j<$hos_count;$j++)
					{
						$temph=$j+1;
						$visits=mysqli_fetch_array($sql3);
						$hosp_id=$visits['hosp_id'];
						$from_time=$visits['from_time'];
						$to_time=$visits['to_time'];
						$day=$visits['day'];
									
						$sql4=mysqli_query($conn,"Select * from hospital where hosp_id='$hosp_id' ")or die ("error4");
						$hospital=mysqli_fetch_array($sql4);
						$hosp_name=$hospital['hosp_name'];
						$ratings=$hospital['ratings'];
						$loc_id=$hospital['loc_id'];
						$website=$hospital['website'];
						$phone_number=$hospital['phone_number'];
						$total_doctors=$hospital['total_doctors'];
			
						$sql5=mysqli_query($conn,"Select * from location where loc_id='$loc_id' ") or die("erro1");
						$add_array1=mysqli_fetch_array($sql5);
						$plot_no=$add_array1['plot_no'];
						$street=$add_array1['street'];
						$city=$add_array1['city'];
						$state=$add_array1['state'];
						$country=$add_array1['country'];
						$pin=$add_array1['pin'];
			
			
						echo "<tr bgcolor='#ddd'> <td colspan='4' align='center'> Hospital $temph Details </td> </tr>";
						echo "<tr>
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Hospital Name </label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'>$hosp_name</td>
							</tr>";	
						#echo " <td  bgcolor='#CCCCFF'> <label> Ratings </label></td> <td bgcolor='#CCFFFF'> $ratings</td></tr>";
						echo "<tr>
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Visiting Hours </label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'>$from_time to $to_time</td>
							</tr>";
						echo "<tr>
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Visiting Days </label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'> $day</td>
							</tr>";
						echo "<tr>
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Website </label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'>$website</td>
							</tr>";
						echo "<tr>
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Phone Number </label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'>$phone_number</td>
							</tr>";
						echo "<tr> 
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Address</label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'> #$plot_no, $street, $city,<br />$state, $country, $pin </td>
							</tr>";
					}
			
					$sql6=mysqli_query($conn,"select * from clinic where doc_id='$doc_id' ") or die("error3");
					$clinic_count=mysqli_num_rows($sql6);
					for($k=0;$k<$clinic_count;$k++)
					{
						$tempc=$k+1;
						$clinic=mysqli_fetch_array($sql6);
						$clinic_name=$clinic['clinic_name'];
						$from_time=$clinic['from_time'];
						$to_time=$clinic['to_time'];
						$day=$clinic['day'];
						$phone_no=$clinic['phone_no'];
						$ratings=$clinic['ratings'];
						$loc_id=$clinic['loc_id'];
					
						$sql5=mysqli_query($conn,"Select * from location where loc_id='$loc_id' ") or die("erro1");
						$add_array1=mysqli_fetch_array($sql5);
						$plot_no=$add_array1['plot_no'];
						$street=$add_array1['street'];
						$city=$add_array1['city'];
						$state=$add_array1['state'];
						$country=$add_array1['country'];
						$pin=$add_array1['pin'];
			
						echo "<tr bgcolor='#ddd'> <td colspan='4' align='center'>Clinic $tempc Details </td> </tr>";
						echo "<tr>
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Clinic Name </label></td>
								<td bgcolor='#CCFFFF' colspan='2' align='center'>$clinic_name</td>
								</tr>";	
						echo "<tr>
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Ratings </label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'> $ratings</td>
							</tr>";
						echo "<tr>
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Visiting Hours </label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'>$from_time to $to_time</td>
							</tr>";
						echo "<tr> 
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Visiting Days </label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'> $day</td>
							</tr>";
						echo "<tr>
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Phone Number  </label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'>$phone_no</td>
							</tr>";
						echo "<tr> 
								<td  bgcolor='#CCCCFF' colspan='2' align='center'> <label>Address </label></td> 
								<td bgcolor='#CCFFFF' colspan='2' align='center'>#$plot_no, $street, $city,<br />$state, $country, $pin </td>
							</tr>";
					}
		
		/*$sql7=mysqli_query($conn,"Select * from prefer where id='$id' ") or die("error4");	
		$count=mysql_num_rows($sql7);
		
			
			for($i=0;$i<$count;$i++)
			{
			$prefer=mysql_fetch_array($sql7);
			$pid=$prefer['Pid'];
			$sql4=mysql_query("Select * from pharmacy where Pid='$pid' ")or die ("error4");
			$hospital=mysql_fetch_array($sql4);
			$hname=$hospital['Pname'];
			$hratings=$hospital['Ratings'];
			$Hlid=$hospital['Lid'];
			$Hpn=$hospital['phone_no'];
			
			$sql5=mysql_query("Select * from location where Lid='$Hlid' ") or die("erro1");
			$add_array1=mysql_fetch_array($sql5);
			$hplot=$add_array1['plot_no'];
			$hstreet=$add_array1['Street'];
			$hcity=$add_array1['City'];
			$hState=$add_array1['State'];
			$hCountry=$add_array1['Country'];
			$hpin=$add_array1['Pin'];		
		echo "<tr bgcolor='#00FFFF'> <td colspan='4' align='center'  >Prefered Pharmacy Details </td> </tr>";
		echo "<tr><td  bgcolor='#CCCCFF'> <label> Pharmacy Name </label></td> <td bgcolor='#CCFFFF'>$hname</td>";	
		echo " <td  bgcolor='#CCCCFF'> <label> Ratings </label></td> <td bgcolor='#CCFFFF'> $hratings</td></tr>";
		echo " <tr> <td  bgcolor='#CCCCFF'> <label> Phone Number </label></td> <td bgcolor='#CCFFFF'>$Hpn</td>";
		echo " <td  bgcolor='#CCCCFF'> <label> Address</label></td> <td bgcolor='#CCFFFF' colspan='3' > #$hplot, $hstreet street, $hcity,<br />
															$hState,$hCountry,$hpin </td></tr>";
		
			
			}*/
		
		
			
					echo "<tr> <td colspan='4' align='center' > </td></tr> ";
					echo "<tr> <td colspan='4' align='center' > **************************************</td></tr> ";
					echo "<tr> <td colspan='4' align='center' > </td></tr> ";
				}	
			}
		?>
        </table>
      
		<div class="clr"></div>
		</div>
		</div>
	</div>
	<div class="clr"></div>
	<div class="footer">
		<div class="footer_resize">
			<p class="leftt">Copyright &#169; Doc Info. All Rights Reserved<br />
			<a href="index.php">Home</a> | <a href="index.php">Contact</a> <!--| <a href="index.php">RSS</a>--></p>
			<div class="clr"></div>
		</div>
		<div class="clr"></div>
		<div class="clr"></div>
	</div>
</div>
</body>
</html>