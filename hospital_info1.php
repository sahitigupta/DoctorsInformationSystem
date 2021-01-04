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
         
            <li><a href="index.php" >Home</a></li>
          <li><a href="doctor_info.php">Doctor</a></li>
          <li><a href="hospital_info.php" class="active">Hospital</a></li>
          <li><a href="clinic_info.php">Clinic</a></li>
         
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="back_ground">
    <div class="clr"></div>
    <div class="body">
      <div class="body_resize">
        <h3> Search results for
         <?php
		include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$hid=$_POST['Hid'];
	$query=mysql_query("Select * from hospital where Hid=$hid");
	$spe=mysql_fetch_array($query);
	$hname=$spe['Hname'];
	echo $hname;

?>

        </h3>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <table align="center" width="900px" height="auto" bgcolor="#FFF" bordercolor="#000" border="0" >
          <?php
	
		
		$count=mysql_num_rows($query);
		if($count==0)
		{
			echo "NO HOSPITALS FOUND IN THE DATABASE";
			echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
		}
		else
		{
			
			$sql4=mysql_query("Select * from hospital where Hname='$hname' ")or die ("error4");
			$count=mysql_num_rows($sql4);
			for($i=0;$i<$count;$i++)
			{
			$hospital=mysql_fetch_array($sql4);
			$hname=$hospital['Hname'];
			$hratings=$hospital['Ratings'];
			$Hlid=$hospital['Lid'];
			$Hwebsite=$hospital['website'];
			$Hpn=$hospital['Phone_number'];
			
			$sql5=mysql_query("Select * from location where Lid='$Hlid' ") or die("erro1");
			$add_array1=mysql_fetch_array($sql5);
			$hplot=$add_array1['plot_no'];
			$hstreet=$add_array1['Street'];
			$hcity=$add_array1['City'];
			$hState=$add_array1['State'];
			$hCountry=$add_array1['Country'];
			$hpin=$add_array1['Pin'];
			
			
			
		echo "<tr bgcolor='#00FFFF'> <td colspan='4' align='center'  > Hospital Details </td> </tr>";
		echo "<tr><td  bgcolor='#CCCCFF'> <label> Hospital Name </label></td> <td bgcolor='#CCFFFF'>$hname</td>";	
		echo " <td  bgcolor='#CCCCFF'> <label> Ratings </label></td> <td bgcolor='#CCFFFF'> $hratings</td></tr>";
	
		echo "<tr><td  bgcolor='#CCCCFF'> <label> Website </label></td> <td bgcolor='#CCFFFF'>$Hwebsite</td>";
		echo " <td  bgcolor='#CCCCFF'> <label> Phone Number </label></td> <td bgcolor='#CCFFFF'>$Hpn</td></tr>";
		echo "<tr> <td  bgcolor='#CCCCFF'> <label> Address</label></td> <td bgcolor='#CCFFFF' colspan='3' > #$hplot, $hstreet street, $hcity,<br />
															$hState,$hCountry,$hpin </td></tr>";
		
		echo "<tr> <td colspan='4' align='center' > </td></tr> ";
		echo "<tr> <td colspan='4' align='center' > **************************************</td></tr> ";
		echo "<tr> <td colspan='4' align='center' > </td></tr> ";
			
			}
			}
			
		
			
		
	
}
	?>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p><p>&nbsp;</p>
        <p>&nbsp;</p><p>&nbsp;</p>
        
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="footer">
    <div class="footer_resize">
      <p class="leftt">Copyright © Doc Info. All Rights Reserved<br />
        <a href="index.php">Home</a> | <a href="index.php">Contact</a> <!--| <a href="index.php">RSS</a>--></p>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
  </div>
</div>
</body>
</html>