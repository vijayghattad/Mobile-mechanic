<?php
session_start();
if (isset($_SESSION['cemail'])) {
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer</title>
	<link rel="stylesheet" href="css/table_style.css">
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
<body background="images/car2.jpg">

<button><a href="servicerequest.php"><b><i>Service Request</i></b></a></button>
<button><a href="logout.php"><b><i>Logout</b></i></a></button>
<br><br>
<h1 align='center' style="color:red"><b>MY APPOINTMENTS</b></h1>

<table class="container" align="center">
                                   

<?php
include "connection.php";
$memail = $_SESSION['cemail'];
$cid = mysqli_fetch_array(mysqli_query($conn, "select cid from customer_reg where cemail='" . $_SESSION["cemail"] . "'"));
$sql = "SELECT * FROM mechanic_reg m JOIN servicerequest s ON m.mid = s.mid WHERE s.cid='$cid[0]'";
$res = mysqli_query($conn, $sql);

?>
                                    <thead>
                                        <tr align="center">
                                           <th>SERVICE CODE</th>
                                            <th>VEHICLE CATEGORY</th>
                                            <th>VEHICLE NAME</th>
                                            <th>VEHICLE NUMBER</th>
                                            <th>PROBLEM</th>
                                            <th>SERVICE STATUS</th>
                                            <th>COMPLETED TIME</th>
                                            <th>MECHANIC PH_NUMBER</th>
                                            <th>MECHANIC RATING</th>
                                        </tr>
                                    </thead>

<?php
while ($r = mysqli_fetch_array($res)) {

    ?>

                                    <tbody>
                                        <tr align="center">
                                            
                                            <td>
                                                <span><?php echo $r[21]; ?></span>
                                            </td>
                                            <td><?php echo $r[12]; ?></td>
                                            <td><?php echo $r[13]; ?></td>
                                            <td>
                                            	<?php
                                            echo $r[14];
                                            ?>

                                            </td>
                                            <td>
                                            	<?php
                                            echo $r[15];
                                            ?>

                                            </td>	
                                            <td>
                                                <?php
                                                echo $r[17];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $r[20];
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                echo $r[3];
                                                ?>
                                            </td>
                                            <td>
                                            <form method="post" action="rating.php">
                                            <input type="text" value="<?php echo $r[22] ?>" name="rate" size="8" style="font-size:17px; margin-right:17px; text-align:center; border-radius:20px; "required />
                                            <input type="hidden" name="sid" value="<?php echo $r[10] ?>" />
                                            <div class="wthree-text"> 
						                    <div class="wthreesubmitaits" align="center">
                                                <br>
                                            <input type="submit" value="Rate" style="border:1px solid black; background-color:#ff9933; border-radius:20px; font-size: 20px; font-family:Comic Sans MS"/>   
                                            </div>
                                            </div>
                                            </form>
                                            </td>
                                        </tr>
                                        <?php

                                    }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</body>
</html>
<?php

}
?>