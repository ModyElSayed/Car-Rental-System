<?php
	include("config_database.php");
	$plateid = mysqli_real_escape_string($con, $_POST['plateid']);

	$sql_query = "SELECT COUNT(*) as no_of_plate FROM Car WHERE plate_id='{$plateid}'";
	$result = mysqli_query($con,$sql_query);
	$row = mysqli_fetch_array($result);

	$count = $row['no_of_plate'];

	if($count == 0) {
		$brand = mysqli_real_escape_string($con, $_POST['brand']);
		$model = mysqli_real_escape_string($con, $_POST['model']);
		$year = mysqli_real_escape_string($con, $_POST['year']);
		$price = mysqli_real_escape_string($con, $_POST['price']);
		$status = mysqli_real_escape_string($con, $_POST['status']);
		$sql_query = "INSERT INTO car(Brand, Model, Year, Plate_Id, Price, Car_Status) VALUES ('".$brand."', '".$model."', '".$year."', '".$plateid."','".$price."','".$status."')";
		$result = mysqli_query($con, $sql_query);
		echo 1;
	} else {
		echo 0;
	}
?>