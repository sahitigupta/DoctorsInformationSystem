<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Doctor Info</title>
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
      <div class="menu"> <a href="#"><img src="images/rss_1.gif" alt="picture" width="18" height="18" border="0" /></a> <a href="#"><img src="images/rss_2.gif" alt="picture" width="18" height="18" border="0" /></a> <a href="#"><img src="images/twitter.png" alt="picture" width="18" height="18" border="0" /></a>
        <ul>
          <ul>
              <li><a href="index.php" >Home</a></li>
          <li><a href="doctor_info.php">Doctor</a></li>
          <li><a href="hospital_info.php" >Hospital</a></li>
          <li><a href="clinic_info.php" class="active">Clinic</a></li>
         
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
        <h3> Search for Doctors by name
          <?php
		include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$Cname=$_POST['Cname'];

	echo $Cname;
}

?>
        </h3>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <table align="center" width="900px" height="auto" bgcolor="#FFF" bordercolor="#000" border="0" >
          <?php
	
		$sql6=mysql_query("select * from clinic where C_name='$Cname' ") or die("error3");
		$clinic_count=mysql_num_rows($sql6);
		if($clinic_count==0)
		{
			echo "NO Clinic FOUND IN THE DATABASE";
			echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
		}
		else
		{
		
		for($k=0;$k<$clinic_count;$k++)
		{
			$clinic=mysql_fetch_array($sql6);
			
			$cname=$clinic['C_name'];
			$Did=$clinic['Did'];
			$time_from=$clinic['From_time'];
			$time_to=$clinic['To_time'];
			$days=$clinic['Day'];
			$c_ph=$clinic['Phone_no'];
			$cratings=$clinic['Ratings'];
			$Clid=$clinic['Lid'];
		
			
			$sql5=mysql_query("Select * from location where Lid='$Clid' ") or die("erro1");
			$add_array1=mysql_fetch_array($sql5);
			$hplot=$add_array1['plot_no'];
			$hstreet=$add_array1['Street'];
			$hcity=$add_array1['City'];
			$hState=$add_array1['State'];
			$hCountry=$add_array1['Country'];
			$hpin=$add_array1['Pin'];
			
			
			
		echo "<tr bgcolor='#00FFFF'> <td colspan='4' align='center'  > Doctor's Clinic Details </td> </tr>";
		echo "<tr><td  bgcolor='#CCCCFF'> <label> Clinic Name </label></td> <td bgcolor='#CCFFFF'>$cname</td>";	
		echo " <td  bgcolor='#CCCCFF'> <label> Ratings </label></td> <td bgcolor='#CCFFFF'> $cratings</td></tr>";
		echo "<tr><td  bgcolor='#CCCCFF'> <label> Visiting Hours </label></td> <td bgcolor='#CCFFFF'>$time_from to $time_to</td>";
		echo " <td  bgcolor='#CCCCFF'> <label> Visiting Days </label></td> <td bgcolor='#CCFFFF'> $days</td></tr>";
		echo "<tr><td  bgcolor='#CCCCFF'> <label> Phone Number  </label></td> <td bgcolor='#CCFFFF'>$c_ph</td>";
		echo " <td  bgcolor='#CCCCFF'> <label>Address </label></td> <td bgcolor='#CCFFFF'>#$hplot, $hstreet street, $hcity,<br />
															$hState,$hCountry,$hpin </td></tr>";
	
			
			
			
			
			$sql1=mysql_query("SELECT * FROM doctor d, location l WHERE d.lid = l.lid and Did='$Did' ")or die("Error1");
		$count=mysql_num_rows($sql1);
			for($i=0;$i<$count;$i++)
			{
				$temp=$i+1;
			$namesmp=mysql_fetch_array($sql1);
			$id=$namesmp['Did'];
			$name=$namesmp['Fname'];
			$lname=$namesmp['Lname'];
			$Phone_no=$namesmp['Phone_no'];
			$Sid=$namesmp['Sid'];
			$lid=$namesmp['Lid'];
			$email=$namesmp['Email'];
			$plot=$namesmp['plot_no'];
			$street=$namesmp['Street'];
			$city=$namesmp['City'];
			$State=$namesmp['State'];
			$Country=$namesmp['Country'];
			$pin=$namesmp['Pin'];
			$sql2=mysql_query("Select * from career where Did='$id' ")or die("erro2");
			$career=mysql_fetch_array($sql2);
			$Ratings=$career['Ratings'];
			$Exp=$career['Exp'];
			$Specilization_from=$career['Specilization_from'];
			$Qualification=$career['Qualification'];
			$query=mysql_query("Select * from specilization where Sid='$Sid' ");
			$spe=mysql_fetch_array($query);
			$Specilization=$spe['S_name'];
			
			echo "<tr bgcolor='#00FFFF'> <td colspan='4'  > Clinic's Doctor $temp Details </td> </tr>"; 
		echo "<tr > <td  bgcolor='#CCCCFF'> <label> Name </label></td> <td bgcolor='#CCFFFF' > $name $lname </td>";
		echo " <td  bgcolor='#CCCCFF'> <label> Specilization </label></td> <td bgcolor='#CCFFFF'>$Specilization </td></tr>";
		echo "<tr><td  bgcolor='#CCCCFF'> <label> Qualification </label></td> <td bgcolor='#CCFFFF'>$Qualification</td>";
		echo " <td  bgcolor='#CCCCFF'> <label> Expirence </label></td> <td bgcolor='#CCFFFF'>$Exp  </td></tr>";
		echo " <tr><td  bgcolor='#CCCCFF'> <label> Specilization_from </label></td> <td bgcolor='#CCFFFF'> $Specilization_from</td>";
		echo "<td  bgcolor='#CCCCFF'> <label> Ratings </label></td> <td bgcolor='#CCFFFF'> $Ratings </td></tr>";
		echo " <tr> <td  bgcolor='#CCCCFF'> <label> PH no </label></td> <td bgcolor='#CCFFFF'> $Phone_no </td>";
		echo "<td  bgcolor='#CCCCFF'> <label> Address</label></td> <td bgcolor='#CCFFFF'> #$plot, $street street, $city,<br />
															$State,$Country,$pin </td></tr>";
									
			
		echo "<tr> <td colspan='4' align='center' > </td></tr> ";
		echo "<tr> <td colspan='4' align='center' > **************************************</td></tr> ";
		echo "<tr> <td colspan='4' align='center' > </td></tr> ";
		
				
				}
				
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
      <p class="leftt">Copyright © Doc Info. All Rights Reserved<br />
        <a href="#">Home</a> | <a href="#">Contact</a> <!--| <a href="#">RSS</a></p>-->
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <div class="clr"></div>
  </div>
</div>
</body>
</html>