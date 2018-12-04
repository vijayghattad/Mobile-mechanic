<?php

include "connection.php";
if (isset($_POST['submit'])) {
  $mname = $_POST['mname'];
  $gender = $_POST['gender'];
  $mphone = $_POST['mphone'];
  $memail = $_POST['memail'];
  $password = md5($_POST['mpass']);
  $mpassword = $_POST['mconfirmpass'];
  $shopaddress = $_POST['maddress'];
  $maadhar = $_POST['maadhar'];
  $mpan = $_POST['mpan'];
  $dlicence = $_POST['dlicence'];


  $sql = "INSERT INTO mechanic_reg values (NULL, '$mname', '$gender', '$mphone', '$memail', '$password', '$shopaddress', '$maadhar', '$mpan', '$dlicence');";
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
    window.location="register.php";
 alert("Registration not done");
</script>
<?php

}

}
?>