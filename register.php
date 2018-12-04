<!DOCTYPE html>
<html>
<head>
	<title>Mobile Mechanic </title>
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CSS/w3.css">
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
	<script type="text/javascript" src="JS/bootstrap.js"></script>
	

</head>
<body background="images/3.jpg">
<font color="yellow">
 <div class="container">
  <div class="form-group pw3-bar" style="margin-top: 3%;" align="center">
  <a class="w3-bar-item w3-button tablink w3-red rounded" id="customerreg" onclick="usertype(event, 'customer');">Customer</a>  
  <a class="w3-bar-item w3-button tablink rounded" id="mechanicreg" onclick="usertype(event, 'mechanic');">Mechanic</a>  
  </div>
	<div align="center" id="customerhead">
		<h4>Customer Registration</h4>
  </div>
<form action="register.php" method="post">
	<div class="container border city" id="customer">
  <div class="form-group mx-sm-3">
  	<label>Name</label>
   <input type="text" name="cname" class="form-control " placeholder="Name" required>
  </div>
  <div class="form-group mx-sm-3">
    <label>Gender</label>
    <select class="form-control" name="gender" required>
      <option>Select</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
  </div>
  <div class="form-group mx-sm-3">
  <label>Phone</label>
  <input type="text" name="cphone" placeholder="Phone Number" class="form-control" maxlength="13" required>
  </div>
  <div class="form-group mx-sm-3">
  <label>Emergency Contact</label>
  <input type="text" name="cecontact" placeholder="Emergency Contact" class="form-control" required>
  </div>
  <div class="form-group mx-sm-3">
  	<label>Email-Id</label>
   <input type="email" name="cemail" placeholder="Email-Id" class="form-control" required>
  </div>
    <div class="form-group mx-sm-3">
    <label>Password</label>
   <input type="password" name="cpass" placeholder="Password" class="form-control" required>
  </div>
  <div class="form-group mx-sm-3">
  <label>Confirm Password</label>
  <input type="password" name="cconfirmpass" placeholder="Confirm Password" class="form-control" required>
  </div>
  <div class="form-group mx-sm-3">
    <label>City</label>
    <select class="form-control" name="ccity" required>
      <option>Select</option>
      <option value="Hubballi">Hubballi</option>
      <option value="Dharwad">Dharwad</option>
    </select>
  </div>
  <div class="form-group mx-sm-3">
    <label>Pincode</label>
    <input type="text" name="pincode" maxlength="6" class="form-control" placeholder="Pincode" required> 
  </div>
  <div class="form-group mx-sm-3" align="center">
  <button type="submit" name="submit" class="btn btn-primary" style="">Submit</button>
  </div>
</div>
</form>
<div align="center" id="mechanichead" style="display: none;">
		<h4>Mechanic Registration</h4>
	</div>
<form action="mregister.php" method="post">
	<div class="container w3-border city" style="display:none" id="mechanic">
  <div class="form-group mx-sm-3">
  	<label>Name</label>
   <input type="text" name="mname" class="form-control " placeholder="Name" required>
  </div>
    <div class="form-group mx-sm-3">
    <label>Gender</label>
    <select class="form-control" name="gender" required>
      <option>Select</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
  </div>
  <div class="form-group mx-sm-3">
    <label>Aadhar Number</label>
    <input type="text" name="maadhar" class="form-control" placeholder="Aadhar Number" maxlength="12">
  </div>
  <div class="form-group mx-sm-3">
  <label>PAN Number</label>
    <input type="text" name="mpan" class="form-control" placeholder="PAN Number" maxlength="10">
  </div>
  <div class="form-group mx-sm-3">
  <label>Phone</label>
  <input type="text" name="mphone" placeholder="Phone Number" class="form-control" maxlength="13" required>
  </div>
  <div class="form-group mx-sm-3">
    <label>Email-Id</label>
   <input type="email" name="memail" placeholder="Email-Id" class="form-control" required>
  </div>
    <div class="form-group mx-sm-3">
    <label>Password</label>
   <input type="password" name="mpass" placeholder="Password" class="form-control" required>
  </div>
  <div class="form-group mx-sm-3">
  <label>Confirm Password</label>
  <input type="password" name="mconfirmpass" placeholder="Confirm Password" class="form-control" required>
  </div>
  <div class="form-group mx-sm-3">
  <label>Shop Address</label>
  <input type="text" name="maddress" placeholder="Shop Address" class="form-control" required>
  </div>
    <div class="form-group mx-sm-3">
  <label>Driving Licence</label>
  <input type="text" name="dlicence" placeholder="Driving Licence Number" class="form-control" required>
  </div>
  <div class="form-group mx-sm-3" align="center">
  <button type="submit" name="submit" class="btn btn-primary" style="width: 35%">Submit</button>
  </div>

</div></form>
<script>
function usertype(evt, user) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  
  tablinks = document.getElementsByClassName("tablink");

  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
 
}
  document.getElementById(user).style.display = "block";

  evt.currentTarget.className += " w3-red";
}
</script>
<script type="text/javascript" src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="JS/popper.min.js"></script>
<script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

$("#customerreg").click(function(e){
        $("#customer").show();
        $("#mechanic").hide();
        $("#mechanichead").hide();
        $("#customerhead").show();
     });

        $("#mechanicreg").click(function(e){
        $("#mechanic").show();
        $("#customer").hide();
        $("#customerhead").hide();
        $("#mechanichead").show();
     });
});
</script>
</div>
</font>
</body>
</html>
<?php

include "connection.php";
if (isset($_POST['submit'])) {
  $cname = $_POST['cname'];
  $gender = $_POST['gender'];
  $email = $_POST['cemail'];
  $password = $_POST['cpass'];
  $cpassword = $_POST['cconfirmpass'];
  $phone = $_POST['cphone'];
  $city = $_POST['ccity'];
  $pincode = $_POST['pincode'];
  $emergencycontact = $_POST['cecontact'];


  $sql = "INSERT INTO  `mm`.`customer_reg` (`cid` ,`cname` ,`gender` ,`cemail` ,`cpassword` ,`cphone` ,`ccity` ,`pincode` ,`emergencycontact`)VALUES (NULL,  '$cname',  '$gender',  '$email',  MD5('" . $password . "'),  '$phone',  '$city',  '$pincode',  '$emergencycontact');";
  $echo = '<div class="alert alert-success"><strong> congrats registeration successful </strong> </div>';
  $status = mysqli_query($conn, $sql);
  if ($status > 0) {
    ?>

<script type="text/javascript">
  
  window.location="index.php";
  alert("Registration Successful");

</script>
  <?php

} else {
  ?>
	<script type="text/javascript">
 alert("Registration not done");
</script>
<?php

}

}