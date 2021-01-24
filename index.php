<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Doctor Info</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style2.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<!--<script type="text/javascript">
$(document).ready(function(){
    $('#slideshow').cycle({
        fx:     'fade',
        speed:  'slow',
        timeout: 5000,
        pager:  '#slider_nav',
        pagerAnchorBuilder: function(idx, slide) {
            // return sel string for existing anchor
            return '#slider_nav li:eq(' + (idx) + ') a';
        }
    });
});
</script>-->
</head>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 10px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 400px; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 100px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

/* The message box is shown when the user clicks on the password field */
/*#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}
/* Add a green text color and a checkmark when the requirements are right 
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "?";
}

/* Add a red text color and an "x" when the requirements are wrong 
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "?";
}*/
</style>

<body>
<div class="main">
  <div class="header_resize">
    <div class="header">
      <div class="logo"><a href="index.php"><img src="images/logo.gif" width="280" height="62" border="0" alt="logo" /></a></div>
      <div class="clr"></div>
      <div class="menu">
		<a href="#"><img src="images/linkedin.png" alt="picture" width="18" height="18" border="0" /></a>
		<a href="#"><img src="images/facebook.png" alt="picture" width="18" height="18" border="0" /></a> 
		<a href="#"><img src="images/twitter.png" alt="picture" width="18" height="18" border="0" /></a>
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="docdetails.php">Doctor</a></li>
          <!--<li><a href="hospital_info.php">Hospital</a></li>
          <li><a href="clinic_info.php">Clinic</a></li>-->
		  <li><a href="#myModal" onclick="document.getElementById('id01').style.display='block'">Admin</a></li>
        </ul>
      </div>
	  

	  
      <div class="clr"></div>
    </div>
  </div>
  <div class="back_ground">
    <div class="header_blog">
      <div id="slider"> 
        <!-- start slideshow -->
        <div id="slideshow">
          <div class="slider-item"><a href="docdetails.php"><img src="images/simple_img_1.jpg" alt="icon" width="938" height="330" border="0" /></a></div>
          <!--<div class="slider-item"><a href="hospital_info.php"><img src="images/simple_img_2.jpg" alt="icon" width="938" height="330" border="0" /></a></div>
          <div class="slider-item"><a href="clinic_info.php"><img src="images/simple_img_3.jpg" alt="icon" width="938" height="330" border="0" /></a></div>-->
        </div>
        <div class="clr"></div>
        <!-- end #slideshow -->
        <div class="controls-center">
          <div id="slider_controls">
            <h2>DOC INFO<br />
              <span>Solution for your Medical needs</span></h2>
            <ul id="slider_nav">
              <!-- Slide 4 -->
              <li><a href="docdetails.php"><img src="images/tabs_2_1.gif" alt="picture" width="80" height="50" border="0" /></a></li> 
              <!-- Slide 3 -->
              <!--<li><a  href="docdetails.php"><img src="images/tabs_1_1.gif" alt="picture" width="80" height="50" border="0" /></a></li>
              <!-- Slide 2 --> 
              <!--<li><a  href="docdetails.php"><img src="images/tabs_3_1.gif" alt="picture" width="80" height="50" border="0" /></a></li>-->
            </ul>
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <div class="body">
      <div class="body_resize">
        <div class="left">
          <h2>Welcome to DOC INFO!</h2>
          <p><strong>Solution for your medical needs </strong><br />
            DOC INFO is a place where you can find doctors by name, specilization and location. This website just not shows you the doctors but will also display the information about Hospital and Clinic.</p>
          <!--<p>DOC INFO is a place where you can find doctors by name, specilization and location. This website just not shows you the doctors but it will do the same for Hospital and Clinic. DOC INFO is a place where you can find doctors by name, specilization and location. This website just not shows you the doctors but it will do the same for Hospital and Clinic.</p>-->
		  <p>The Doctors Information System provides the information of doctors with their main expertise and qualification. The detailed information about each doctor are available which includes their working hours, personal clinic location, etc. This website is a gateway for the users to reach the concerned doctors.</p>
        </div>
        <div class="right">
          <h2>About Us</h2>
          <p>The Doctors Information System provides the information of doctors with their main expertise and qualification.<br>DOC INFO is a place where you can find doctors by name, specilization and location. This website just not shows you the doctors but will also display the detailed information about Hospital and Clinic. </p>
        </div>
        <div class="bg"></div>
        <div class="right2">
          <h2>24x7 Online Support</h2>
          <img src="images/fbg_1.gif" alt="picture" width="57" height="57" class="floated2" />
          <p><strong>24x7 Solutions </strong><br />
            You will get the information you need <br />
            at any time and any place. </p>
        </div>
        <div class="right2">
          <h2>Location</h2>
          <img src="images/fbg_2.gif" alt="picture" width="57" height="57" class="floated2" />
          <p><strong>Address </strong><br />
            27th Cross, Banashankari Stage II, Bangalore-560070<br />
             91-80-26711781, 91-80-26711782 </p>
          <p></p>
        </div>
        <div class="right2">
          <h2>Contact Us</h2>
          <img src="images/fbg_3.gif" alt="picture" width="57" height="57" class="floated2" />
          <p><strong>Queries</strong><br />
            For any queries, reach out to us <br/>
			Email: support@docinfo.com</p>
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="footer">
    <div class="footer_resize">
      <p class="leftt">Copyright © Doc Info. All Rights Reserved<br/>                      <!--style="margin-left: 400px"-->
        <a href="#">Home</a> | <a href="#">Contact</a><!-- | <a href="#">RSS</a></p>-->
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
  </div>
</div>


<div id="id01" class="modal">


  
  <form class="modal-content animate" action="insert/crud1/admin.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <!--  <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>-->

    <div class="container">
      <!--<label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>-->

      <label for="psw"><b>Password</b></label>
      <!--<input type="password" placeholder="Enter Password" name="psw" required>-->
      <!--<input type="password" id="pswd" name="pswd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>-->
	  <input type="password" id="pswd" name="pswd" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onfocusout="pswdValid()" required>
	  <label id="pswd_label"></label>
        
      <!--<div id="message">
  <h2>Password must contain the following:</h2>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>  -->
        
      <button type="submit" >Login</button>
      <!--<label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>-->
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="margin-left: 10px;">Cancel</button>
      <!--<span class="psw">Forgot <a href="#">password?</a></span>-->
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function pswdValid(){
	if(document.getElementById('pswd').value != "Asdfghjkl4") {
		document.getElementById('pswd_label').style.color = 'red';
		document.getElementById('pswd_label').innerHTML = 'Password entered is wrong';
	//alert(document.getElementById('pswd').value);	
  }
}
</script>





</body>
</html>