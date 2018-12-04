<button><a href="cappointment.php"><b><i>Cappointment</i></b></a></button>
<button><a href="logout.php"><b><i>Logout</b></i></a></button>
<?php
session_start();
if (isset($_SESSION['cemail'])) {
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mobile Mechanic </title>
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <script type="text/javascript" src="JS/bootstrap.js"></script>
<link rel="stylesheet" href="css/servicerequest.css">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<style>
  button{
      background-color:#ff9933;
      color: white;
      border-radius:30px;
      text-align:center;
      font-size:17px;
      margin-right:20px;
      font-family:Comic Sans MS;
  }    
</style>
</head>
<body>
    <h1><?php echo "Welcome, ".$_SESSION["cname"];?> <br/> <br/>Request For A Service </h1>
    <div class="agile-its">
	      <div class="w3layouts">
		        <div class="photos-upload-view">
              <form action="servicerequest.php" method="post">
                  <div class="agileinfo">
					        </div>
						      <div class="agileinfo-row">
							        <div class="ferry ferry-from" align='center'>
  	                    <label>Vehicle category</label>
                            <select required name="vcategory">
                            <option>Select</option>
                             <?php
                            include "connection.php";
                            $sql = "SELECT distinct(vcategory) FROM vehicledescription ";
                            $res = mysqli_query($conn, $sql);
                            while ($r = mysqli_fetch_array($res)) {
                            ?>
                            <option><?php echo $r[0];
                            } ?></option>
                            </select>
                      </div>
                      <br><br><br>
                  <div class="ferry ferry-from" align='center'>
                  <label>Vehicle Name</label>
                  <select required name="vname">
                  <option>Select</option>
                  <?php
                      include "connection.php";
                      $sql1 = "SELECT distinct(vname) FROM vehicledescription ";
                      $res1 = mysqli_query($conn, $sql1);
                      while ($r1 = mysqli_fetch_array($res1)) {
                  ?>
                  <option><?php echo $r1[0];
                  } ?></option>
                  </select>
                  </div>
                  <div class="ferry ferry-from" align='center'>
                    <br><br><br>
                      <label>Vehicle Number</label>
                      <input type="text" name="vnumber" placeholder="Vehicle Number" class="form-control" required>
                  </div>
                  <div class="ferry ferry-from" align='center'>
                    <label>Problem You found in your vehicle</label>
                    <input type="text" name="problem" placeholder="Problem you found in your vehicle" required> 	
                  </div>

                   <div class="clear"></div>
						       </div>
					        <div class="wthree-text"> 
						         <div class="wthreesubmitaits" align="center">
							          <input type="submit" name="submit" value="submit">
						         </div>  
					        </div>
              </div>
            </form>
        </div>
    </div>
  </div>
</body>
</html>
<?php

include "connection.php";
if (isset($_POST['submit'])) {
  $vcategory = $_POST['vcategory'];
  $vname = $_POST['vname'];
  $vnumber = $_POST['vnumber'];
  $problem = $_POST['problem'];
  $rand = rand(100, 200);
  $cdate = date("Y-m-d");
  $ctime = date("h:i:s");

  $dt = '0000-00-00 00:00:00';
  $cid = mysqli_fetch_array(mysqli_query($conn, "select cid from customer_reg where cemail='" . $_SESSION["cemail"] . "'"));
  $mid = mysqli_fetch_array(mysqli_query($conn, "select mid from vehicledescription where vname='$vname'"));


  $sql = " INSERT INTO `servicerequest` (`sid`, `cid`, `vcategory`, `vname`, `vnumber`, `problem`, `mid`, `status`, `rdate`, `rtime`, `rcompletedate`, `servicecode`, `srating`) VALUES(null, '$cid[0]', '$vcategory', '$vname', '$vnumber', '$problem', '$mid[0]', 'pending', '$cdate', '$ctime', '0000-00-00 00:00:00', '$rand', '0');
  ";

  $status = mysqli_query($conn, $sql);
  if ($status > 0) {
    ?>

<script type="text/javascript ">
  
  window.location="cprofile.php";
  alert(" Request Submitted Successfully ");
</script>
  <?php

} else {
  ?>
	<script type=" text / javascript ">
 alert(" request Not Submitted ");
</script>

<?php

}

}
}
?>