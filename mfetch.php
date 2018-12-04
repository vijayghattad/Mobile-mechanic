<?php

//fetch.php

include("database_connection.php");

$query = "SELECT * FROM mechanic_reg";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = ' <h4>
<table class="table table-striped table-bordered">
	<tr align="center">
		<th>MECHANIC ID</th>
		<th>NAME</th>
		<th>PHONE NUMBER</th>
		<th>SHOP ADDRESS</th>
		<th>AADHAR NUMBER</th>
		<th>DRIVING LICENCE</th>
		<th>DELETE</th>
	</tr>
';
if ($total_row > 0) {
	foreach ($result as $row) {
		$output .= '
		<tr align="center">
			<td width="40%">' . $row["mid"] . '</td>
			<td width="40%">' . $row["mname"] . '</td>
			<td width="40%">' . $row["mphone"] . '</td>
			<td width="40%">' . $row["shopaddress"] . '</td>
			<td width="40%">' . $row["maadhar"] . '</td>
			<td width="40%">' . $row["drivinglicence"] . '</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["mid"] . '">Delete</button>
			</td>
		</tr>
		';
	}
} else {
	$output .= '
	<tr>
		<td colspan="4" align="center">Data not found</td>
	</tr>
	';
}
$output .= '</table> </h4>';
echo $output;
?>