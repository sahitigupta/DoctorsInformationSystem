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
          <li><a href="docdetails.php" class="active">Doctor</a></li>
          <!--<li><a href="hospital_info.php">Hospital</a></li>
          <li><a href="clinic_info.php">Clinic</a></li>-->
          
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
	<table style="margin-left:20px;">
    <tr>
    	<th> Search Doctor by <br /></th></tr>
        <tr><td> <br><input type="radio" name="op" value="Name"  />
        Name<br></td></tr>
        <tr><td>
        <input type="radio" name="op" value="Location" />
        Location<br>
        </td></tr>
        <tr><td>
        <input type="radio" name="op" value="Specilization" />
       Specialization<br>
        </td></tr>
      <tr>  
     <td><br> <input type="submit" value="Select" style="margin-left:5px;" />   </td></tr>
	</tr>
	</table>
    </form>
    <br>
 <?php
include("config1.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$select='';
	if(isset($_POST['op']))
	$select=$_POST['op'];
	if($select=='Specilization')
	{
		
		echo "<form action='docdetails1.php' method='post' >";
		echo "<table><tr><td> Select Specilization </td><td> <select name='spec_id'>";
		$sql=mysqli_query($conn,"select * from specilization") or die ("nil");
		$count=mysqli_num_rows($sql);
		echo "<option value='Select' >Select Specialization</option>";
		for($i=0;$i<$count;$i++)
		{                       
								$namesmp=mysqli_fetch_array($sql);
								$spec_id=$namesmp['spec_id'];
								$spec_name=$namesmp['spec_name'];
								echo "<option value='$spec_id' >$spec_name</option>";		
			}
			echo "</select></td><td cols='2'> <input type='submit' value='Proceed' ></td></tr> </table></form>";
		}
		
	
	else if($select=='Location')
	{
		echo "<form action='docdetails2.php' method='post' >";
		echo "<table> <tr><td> ";
		echo "Select Country:</td><td>   <select onchange=\"print_state('state',this.selectedIndex);\" id='country' name ='country'></select></td> </tr>
		<br />";
		echo "<tr><td>City/District/State: </td><td> <select name ='state' id ='state'></select></td></tr>" ;
		echo "<tr><td>Type Your City</td><td> <input type='text' name='city' id='city' /> </td></tr>";
		echo "<tr> <td colspan='2'> <input type='submit' value='Proceed' ></td></tr></table>";
		
		
		
		
		}
		elseif($select=='Name')
		{
			echo "<form action='docdetails3.php' method='post' >";
		echo "<table> <tr><td>Please enter the Name </td> ";
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
<br><br><br><br><br><br><br><br><br>

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