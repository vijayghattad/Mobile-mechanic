<?php
session_start();
if (!isset($_SESSION['cemail'])) {
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Mobile Mechanic</title>
	<link href="CSS/bootstrap.min.css" rel="stylesheet">
</head>
<body background="images/car4.jpg">
	<br><br><br><br>
<form action="login.php" method="post">
<font color="yellow">
    <div class="container">
	<div class="form-group mx-sm-3">
  	<label>Email</label>
    <input type="email" name="email" class="form-control " placeholder="Email" required="">
    </div>
    <div class="form-group mx-lg-3">
  	<label>Password</label>
    <input type="password" name="password" class="form-control " placeholder="Password" required="">
    </div>
    <div class="form-group mx-sm-3" required>
    <label><input type="radio" name="ltype" value="c">&nbsp;Customer</label>
    <label><input type="radio" name="ltype" value="m">&nbsp;Mechanic</label>
    <label><input type="radio" name="ltype" value="a">&nbsp;Admin</label>
    </div>
    <div class="form-group mx-sm-3">
     <input type="submit" name="submit" value="Login" class="btn btn-success"><br><br>
    	<a href="register.php">Register</a>
    	
    </div>
	</div>
</font>
</form>

</body>
</html>
<?php
include "connection.php";

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$password1 = md5($_POST['password']);
	$password2 = md5($_POST['password']);

	$ltype = $_POST['ltype'];
	if ($ltype = $_POST['ltype'] == 'c') {


		$result = mysqli_query($conn, "select * from customer_reg where cemail='$email' AND cpassword='$password'") or die(mysqli_error($conn));
		$count = mysqli_num_rows($result);
		$data = mysqli_fetch_array($result);
		if ($count > 0) {
			$_SESSION["ltype"] = $ltype;
			$_SESSION["cemail"] = $data[3];
			$_SESSION["cname"] = $data[1];

			?>


<script type="text/javascript">
	window.location="cprofile.php";
	alert("Login Success");


</script>
	<?php

} else {
	?>


<script type="text/javascript">
	alert("Invalid Email/Password")
	window.location="index.php";

</script>
<?php

}

} elseif ($ltype = $_POST['ltype'] == 'a') {

	$result = mysqli_query($conn, "select * from admin where aemail='$email' AND password='$password2'") or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);
	$data = mysqli_fetch_array($result);
	if ($count > 0) {
		$_SESSION["ltype"] = $_POST['ltype'];
		$_SESSION["cemail"] = $data[0];
		$_SESSION["cname"] = "admin";

		?>


<script type="text/javascript">
	window.location="admin.php";
	alert("Login Success");


</script>
	<?php

} else {
	?>


<script type="text/javascript">
	alert("Invalid Email/Password")
	window.location="index.php";

</script>
<?php

}
} else {

	$result = mysqli_query($conn, "select * from mechanic_reg where memail='$email' AND mpassword='$password1'") or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);
	$data = mysqli_fetch_array($result);
	if ($count > 0) {
		$_SESSION["ltype"] = $ltype;
		$_SESSION["memail"] = $data[4];
		$_SESSION["mname"] = $data[1];
		?>


<script type="text/javascript">
	window.location="mprofile.php";
	alert("Login Success")


</script>
	<?php

} else {
	?>


<script type="text/javascript">
	alert("Invalid Email/Password")
	window.location="index.php";

</script>
<?php

}
}
}
} else {
	if ($_SESSION["ltype"] == 'c') {
		?>


<script type="text/javascript">
	window.location="cprofile.php";

</script>
<?php

} elseif ($_SESSION["ltype"] == 'a') {
	?>


<script type="text/javascript">
	window.location="admin.php";

</script>
<?php

} else {
	?>


<script type="text/javascript">
	window.location="mprofile.php";

</script>
<?php	
}
}
?>