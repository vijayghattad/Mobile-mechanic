
<?php
include "servicerequest.php";
include "connection.php";
if (isset($_SESSION['cemail'])) {


	$cemail = $_SESSION['cemail'];
	$sql = "SELECT S.servicecode,S.vname,S.problem FROM servicerequest S where S.cid=(SELECT cid FROM customer_reg WHERE cemail=$cemail)";
	$res = mysqli_query($conn, $sql);
} else {
	?>
<script type="text/javascript">
	window.location="index.php";
</script>
<?php

}
?>
