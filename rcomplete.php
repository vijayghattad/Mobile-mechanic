<?php
include "connection.php";
$status = $_POST["status"];
$sid = $_POST["sid"];
$rc = $_POST["rc"];

$sql = "update servicerequest set status='$status',rcompletedate='$rc' where sid='$sid'";
$result = mysqli_query($conn, $sql);
if ($result > 0) {
    ?>
    <script type="text/javascript">
    alert("Update Successful");
    window.location="mprofile.php"</script>
<?php

} else {
    ?>
    <script type="text/javascript">
    alert("Update Failed");
    window.location="mprofile.php"
    </script>
<?php

}
?>
