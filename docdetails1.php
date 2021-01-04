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
      <div class="logo"><a href="index.php"><img src="images/logo.gif" width="280" height="62" border="0" alt="logo" /></a></div>
      
      <div class="clr"></div>
      <div class="menu"> <a href="#"><img src="images/linkedin.png" alt="picture" width="18" height="18" border="0" /></a> <a href="#"><img src="images/facebook.png" alt="picture" width="18" height="18" border="0" /></a> <a href="#"><img src="images/twitter.png" alt="picture" width="18" height="18" border="0" /></a>
        <ul>
          <ul>
           <li><a href="index.php" >Home</a></li>
          <li><a href="docdetails.php" class="active">Doctor</a></li>
          <!--<li><a href="hospital_info.php">Hospital</a></li>
          <li><a href="clinic_info.php">Clinic</a></li>-->
         
          </ul>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="back_ground">
    <div class="clr"></div>
    <div class="body">
      <div class="body_resize">
        <?php
		include("config1.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$spec_id=$_POST['spec_id'];
	$query=mysqli_query($conn, "Select * from specilization where spec_id=$spec_id");
	$spe=mysqli_fetch_array($query);


?>
        <h3>Doctors List For <?php echo $spe['spec_name']; ?></h3>
        <table align="center" width="900px" height="auto" bgcolor="#FFF" bordercolor="#000" border="0" >
          <?php
	$sql=mysqli_query($conn,"select * from doctor where spec_id='$spec_id' ") or die ("NO doctors found!!!");
		$count=mysqli_num_rows($sql);
		if($count==0)
			echo "NO DOCTORS FOUND IN THE RECORD";
		for($i=0;$i<$count;$i++)
		{
			$temp=$i+1;
		
		$namesmp=mysqli_fetch_array($sql);
		$doc_id=$namesmp['doc_id'];
		$first_name=$namesmp['first_name'];
		$last_name=$namesmp['last_name'];
		$specilization_from=$namesmp['specilization_from'];
		$qualification=$namesmp['qualification'];
		$exp_start_date=$namesmp['exp_start_date'];
		$phone_no=$namesmp['phone_no'];
		$email=$namesmp['email'];
		$loc_id=$namesmp['loc_id'];
		
		$sql1=mysqli_query($conn, "Select * from location where loc_id='$loc_id' ") or die("error1");
		$add_array=mysqli_fetch_array($sql1);
			$plot_no=$add_array['plot_no'];
			$street=$add_array['street'];
			$city=$add_array['city'];
			$state=$add_array['state'];
			$country=$add_array['country'];
			$pin=$add_array['pin'];
		/*$sql2=mysql_query("Select * from career where Did='$id' ")or die("erro2");
		$career=mysql_fetch_array($sql2);
		$Ratings=$career['Ratings'];
		$Exp=$career['Exp'];
		$Specilization_from=$career['Specilization_from'];
		$Qualification=$career['Qualification'];*/
		echo "<tr bgcolor='#ddd'> <td colspan='4' align='center' > Doctor $temp Details </td> </tr>"; 
		echo "<tr > <td bgcolor='#CCCCFF' colspan='2' align='center'> <label> Name </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'> $first_name $last_name </td></tr>";
		
		echo "<tr><td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Qualification </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'>$qualification</td></tr>";
		echo "<tr> <td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Experience </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'>$exp_start_date  </td></tr>";
		echo " <tr><td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Specialization from </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'> $specilization_from</td></tr>";
		#echo "<td  bgcolor='#CCCCFF'> <label> Ratings </label></td> <td bgcolor='#CCFFFF'> $ratings </td></tr>";
		echo " <tr> <td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Phone number</label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'> $phone_no </td></tr>";
		echo "<tr><td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Address</label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'> #$plot_no, $street street, $city,<br />$state, $country, $pin </td></tr>";
															
		$sql3=mysqli_query($conn, "select * from visits where doc_id='$doc_id' ") or die("error3");
		$hos_count=mysqli_num_rows($sql3);
		for($j=0;$j<$hos_count;$j++)
		{
			$temph=$j+1;
			$visits=mysqli_fetch_array($sql3);
			$hosp_id=$visits['hosp_id'];
			$from_time=$visits['from_time'];
			$to_time=$visits['to_time'];
			$day=$visits['day'];
			
			
			$sql4=mysqli_query($conn, "Select * from hospital where hosp_id='$hosp_id' ")or die ("error4");
			$hospital=mysqli_fetch_array($sql4);
			$hhosp_name=$hospital['hosp_name'];
			$hwebsite=$hospital['website'];
			$hratings=$hospital['ratings'];
			$hphone_number=$hospital['phone_number'];
			$hloc_id=$hospital['loc_id'];
			$htotal_doctors=$hospital['total_doctors'];
			
			
			$sql5=mysqli_query($conn, "Select * from location where loc_id='$hloc_id' ") or die("erro1");
			$add_array1=mysqli_fetch_array($sql5);
			$hplot_no=$add_array1['plot_no'];
			$hstreet=$add_array1['street'];
			$hcity=$add_array1['city'];
			$hstate=$add_array1['state'];
			$hcountry=$add_array1['country'];
			$hpin=$add_array1['pin'];
			
			
			
		echo "<tr bgcolor='#ddd'> <td colspan='4' align='center'  >  Hospital $temph Details </td> </tr>";
		echo "<tr><td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Hospital Name </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'>$hhosp_name</td></tr>";	
		echo "<tr> <td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Ratings </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'> $hratings</td></tr>";
		echo "<tr><td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Visiting Hours </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'>$from_time to $to_time</td></tr>";
		echo "<tr> <td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Visiting Days </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'> $day</td></tr>";
		echo "<tr><td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Website </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'>$hwebsite</td></tr>";
		echo "<tr> <td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Phone Number </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'>$hphone_number</td></tr>";
		echo "<tr> <td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Address</label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'> #$hplot_no, $hstreet street, $hcity,<br />$hstate, $hcountry, $hpin </td></tr>";
		
			
			
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
			$hstreet=$add_array1['street'];
			$hcity=$add_array1['city'];
			$hstate=$add_array1['state'];
			$hcountry=$add_array1['country'];
			$hpin=$add_array1['pin'];
			
			
			
		echo "<tr bgcolor='#ddd'> <td colspan='4' align='center'  >  Clinic $tempc Details </td> </tr>";
		echo "<tr><td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Clinic Name </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'>$clinic_name</td></tr>";	
		echo "<tr> <td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Ratings </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'> $ratings</td></tr>";
		echo "<tr><td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Visiting Hours </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'>$from_time to $to_time</td></tr>";
		echo "<tr> <td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Visiting Days </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'> $day</td></tr>";
		echo "<tr><td  bgcolor='#CCCCFF' colspan='2' align='center'> <label> Phone Number  </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'>$phone_no</td></tr>";
		echo "<tr> <td  bgcolor='#CCCCFF' colspan='2' align='center'> <label>Address </label></td> <td bgcolor='#CCFFFF' colspan='2' align='center'>#$plot_no, $hstreet street, $hcity,<br />$hstate, $hcountry, $hpin </td></tr>";
	
			
			
			
			}
			
			
			
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
      <p class="leftt">Copyroght &#169; Doc Info. All Rights Reserved<br />
        <a href="index.php">Home</a> | <a href="index.php">Contact</a> <!--| <a href="index.php">RSS</a>--></p>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <div class="clr"></div>
  </div>
</div>
</body>
</html>