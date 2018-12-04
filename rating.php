<?php
include "connection.php";
$rate = $_POST["rate"];
$sid = $_POST["sid"];
if ($rate > 0 && $rate <= 5) {
    $sql = "update servicerequest set srating='$rate' where sid='$sid'";
    $status = mysqli_query($conn, $sql);
    if ($status > 0) {
        ?>
    <script type="text/javascript">
    alert("Rating <?php echo $rate; ?> out of 5");
    window.location="cappointment.php";
    </script>
<?php

} else {
    ?>
    <script type = "text/javascript" >
        alert("Rating Failed");
        window.location="cappointment.php";
    </script>
<?php

}
} else {
    ?>
    <script type = "text/javascript" >
        alert("Enter Ratings between 0-5");
        window.location="cappointment.php";
    </script>
<?php

}
?>
