<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Doctor</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.color.js"></script>
<script type= "text/javascript" src="js/countries3.js"></script>
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
               <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="doctor_info.php" class="active">Doctor</a></li>
          <li><a href="hospital_info.php">Hospital</a></li>
          <li><a href="clinic_info.php">Clinic</a></li>
          
        </ul>

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
        <h3>Doctor's search</h3>
      <br />
     <form action="" method="post" >
	<table >
    <tr>
    	<th> Select Doctor By <br /></th>
        <td> <input type="radio" name="op" value="Name"  />
        Name<br></td>
        <td>
        <input type="radio" name="op" value="Location" />
        Location<br>
        </td>
         <td>
        <input type="radio" name="op" value="Specilization" />
       Specilization<br>
        </td>
        
     <td> <input type="submit" value="Select"  />   </td>
	</tr>
	</table>
    </form>
    
 <?php
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$select='';
	if(isset($_POST['op']))
	$select=$_POST['op'];
	if($select=='Specilization')
	{
		
		echo "<form action='doctor_info1.php' method='post' >";
		echo "<table><tr><td> Select Specilization </td><td> <select name='Sid'>";
		$sql=mysql_query("select * from specilization") or die ("nil");
		$count=mysql_num_rows($sql);
		for($i=0;$i<$count;$i++)
		{
								$namesmp=mysql_fetch_array($sql);
								$Sid=$namesmp['Sid'];
								$S_name=$namesmp['S_name'];
								echo "<option value='$Sid' >$S_name</option>";		
			}
			echo "</select></td><td cols='2'> <input type='submit' value='Proceed' ></td></tr> </table></form>";
		}
		
	
	else if($select=='Location')
	{
		echo "<form action='doctor_info2.php' method='post' >";
		echo "<table> <tr><td> ";
		echo "Select Country:</td><td>   <select onchange=\"print_state('state',this.selectedIndex);\" id='country' name ='country'></select></td> </tr>
		<br />";
		echo "<tr><td>City/District/State: </td><td> <select name ='state' id ='state'></select></td></tr>" ;
		echo "<tr><td>Type Your City</td><td> <input type='text' name='city' id='city' /> </td></tr>";
		echo "<tr> <td colspan='2'> <input type='submit' value='Proceed' ></td></tr></table>";
		
		
		
		
		}
		elseif($select=='Name')
		{
			echo "<form action='doctor_info3.php' method='post' >";
		echo "<table> <tr><td>Please enter the First Name </td> ";
		echo "<td><input type='text' name='doc_name' ></td>";
		echo " <td colspan='2' align='center'> <input type='submit' value='Proceed' ></td></tr></table>";
			
			
			}
		else
			echo "Please Select one option";
}

?>

		<script language="javascript">print_country("country");</script>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />


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
    <div class="clr"></div>
  </div>
</div>
</body>
</html>