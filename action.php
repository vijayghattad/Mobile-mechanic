<?php

//action.php

include('database_connection.php');

if (isset($_POST["action"])) {
	if ($_POST["action"] == "insert") {
		$query = "
		INSERT INTO vehicledescription (spid,vcategory,vtype,vname,mid ) VALUES (NULL,'" . $_POST["vcat"] . "', '" . $_POST["vtype"] . "','" . $_POST["vname"] . "','" . $_POST["mid"] . "')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if ($_POST["action"] == "fetch_single") {
		$query = "
		SELECT * FROM vehicledescription WHERE spid = '" . $_POST["id"] . "'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$output['vcat'] = $row['vcategory'];
			$output['vtype'] = $row['vtype'];
			$output['vname'] = $row['vname'];
			$output['mid'] = $row['mid'];
		}
		echo json_encode($output);
	}
	if ($_POST["action"] == "update") {
		$query = "
		UPDATE vehicledescription 
		SET vcategory = '" . $_POST["vcat"] . "', 
		vtype = '" . $_POST["vtype"] . "',vname = '" . $_POST["vname"] . "',mid = '" . $_POST["mid"] . "' 
		WHERE spid = '" . $_POST["hidden_id"] . "'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if ($_POST["action"] == "delete") {
		$query = "DELETE FROM vehicledescription WHERE spid = '" . $_POST["id"] . "'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>