<?php
	include("config_database.php");
	$yeara = mysqli_real_escape_string($con, $_POST['yeara']);
	$yearb = mysqli_real_escape_string($con, $_POST['yearb']);
	
	$_SESSION['yeara'] = $yeara;
	$_SESSION['yearb'] = $yearb;
	
	
?>