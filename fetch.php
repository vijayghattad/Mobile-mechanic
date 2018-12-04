<?php

//fetch.php

include("database_connection.php");

$query = "SELECT * FROM vehicledescription";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr align="center"> 
		<th>VEHICLE CATEGORY</th>
		<th>VEHICLE TYPE</th>
		<th>VEHICLE NAME</th>
		<th>MECHANIC ID</th>
		<th>EDIT</th>
		<th>DELETE</th>
	</tr>
';
if ($total_row > 0) {
	foreach ($result as $row) {
		$output .= '
		<tr align="center">
			<td width="40%">' . $row["vcategory"] . '</td>
			<td width="40%">' . $row["vtype"] . '</td>
			<td width="40%">' . $row["vname"] . '</td>
			<td width="40%">' . $row["mid"] . '</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="' . $row["spid"] . '">Edit</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["spid"] . '">Delete</button>
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
$output .= '</table>';
echo $output;
?>