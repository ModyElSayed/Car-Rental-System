<?php
	include("config_database.php");
	$brand = mysqli_real_escape_string($con, $_GET['brand']);
	$model = mysqli_real_escape_string($con, $_GET['model']);
	$year = mysqli_real_escape_string($con, $_GET['year']);
	$pricea = mysqli_real_escape_string($con, $_GET['pricea']);
	$priceb = mysqli_real_escape_string($con, $_GET['priceb']);
	
	$year = (int) $year;
	$pricea = (int) $pricea;
	$priceb = (int) $priceb;
	
	$sql_query = "SELECT plate_id, brand, model, year, price FROM Car WHERE brand = '".$brand."' AND model = '".$model."' AND year >= '".$year."' AND price > '".$pricea."' AND price < '".$priceb."' AND car_status = 'Active';";
	$result = mysqli_query($con,$sql_query);
	
	echo "<table>
			<tr>
				<th>Car Plate No.</th>
				<th>Car Brand</th>
				<th>Car Model</th>
				<th>Car Year</th>
				<th>Car Price</th>
				<th>Select</th>";
	while($res = mysqli_fetch_row($result))
	{   
		echo "<tr>";
		echo "<td align=center>$res[0]</td>";
		echo "<td align=center>$res[1]</td>";
		echo "<td align=center>$res[2]</td>";
		echo "<td align=center>$res[3]</td>";
		echo "<td align=center>$res[4]</td>";
		echo "<td align=center><input type=\"radio\" value =\"res[0]\" id=\"res[0]\" name=\"res_sel\"></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<input type=\"submit\" class=\"submitIn\" value=\"Reserve\" style=\"float:left\" id=\"reservebutton\" onClick=\"window.location.href='home.php';\">";
	echo "<label>".$_POST['name="res_sel"']."</>";
	// $_SESSION['reservedcar'] = $_GET['reservebutton'];
	
?>