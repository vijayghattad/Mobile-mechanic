<?php
session_start();
if (isset($_SESSION['memail'])) {
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/table_style.css">
	<title>Mechanic</title>
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
<body background="images/bg1.jpg">

<button><a href="logout.php">Logout</a></button>
<br> <br> <br>
<h1 align="center" ><b>Your Orders</b></h1>
<table class="container">
                                   
<?php
include "connection.php";
$memail = $_SESSION['memail'];
$mid = mysqli_fetch_array(mysqli_query($conn, "select mid from mechanic_reg where memail='" . $_SESSION["memail"] . "'"));
$sql = "SELECT * FROM customer_reg c JOIN servicerequest s ON c.cid = s.cid WHERE s.mid = '$mid[0]'";
$res = mysqli_query($conn, $sql);

?>
    <thead>
        <tr align="center">
            <th>CUSTOMER NAME</th>
            <th>MOBILE NUMBER</th>
            <th>VEHICLE NAME</th>
            <th>VEHICLE NUMBER</th>
            <th>PROBLEM</th>
            <th>SERVICE CODE</th>
            <th>REQUEST STATUS</th>
            <th>SERVICE COMPLETE DATE AND TIME</th>
            </tr>
    </thead>

<?php
while ($r = mysqli_fetch_array($res)) {

    ?>

    <tbody>
        <tr align="center">                                 
            <td>
                <span><?php echo $r[1]; ?></span>
            </td>
            <td><?php echo $r[5]; ?></td>
            <td><?php echo $r[12]; ?></td>
            <td>
            	<?php
                    echo $r[13];
                ?>

                </td>
            <td>
               	<?php
                    echo $r[14];
                ?>
            </td>	
            <td>
                <?php
                    echo $r[20];
                ?>
            </td>
            <td>
                <form method="post" action="rcomplete.php">
                <input type="text" value="<?php echo $r[16]; ?>" name="status" size="8" style="text-align:center; border-radius:20px; margin-right:15px; border:2px solid brown; font-size:15px" required />
                <input type="hidden" name="sid" value="<?php echo $r[9]; ?>"/>
            </td>

            <td>
               <input type="datetime-local" value="<?php echo $r[19]; ?>" name="rc" style="border-radius:15px; margin-right:25px; border:2px solid brown;"required/>
               <br>
               <p align="center"><input type="submit" value="Update" style="border:1px solid black; border-radius:20px; background-color:#ff9933; font-size: 20px; font-family:Comic Sans MS"/>
               </p>   
            </form>
            </td>
        </tr>
            <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>
<?php

}
?>