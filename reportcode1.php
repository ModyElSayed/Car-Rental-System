<?php
	include("config_database.php");
	$var = $_POST["datemin"];
	$var1 = $_POST["datemax"];
	$var2 = $_POST["plateid"];
	$sql_query = "SELECT Reserve_Id, Plate_Id, Model, Brand, Car.Year, Price, DATE_FORMAT(Reservation_Date, '%Y-%m-%d') AS Reservation_Date FROM Reservation NATURAL JOIN Customer NATURAL JOIN Car NATURAL JOIN Cus_Address NATURAL JOIN Address WHERE Reservation_Date >='".$var."' AND Reservation_Date <= '".$var1."' AND plate_id = '".$var2."' ";
	
	$result = mysqli_query($con,$sql_query);
	echo "<table>
			<tr>
				<th>Reservation ID</th>
				<th>Car Plate No.</th>
				<th>Car Model</th>
				<th>Car Brand</th>
				<th>Car Year</th>
				<th>Car Price</th>
				<th>Reservation Date</th>";
	while($res = mysqli_fetch_row($result))
	{   
		echo "<tr>";
		echo "<td align=center>$res[0]</td>";
		echo "<td align=center>$res[1]</td>";
		echo "<td align=center>$res[2]</td>";
		echo "<td align=center>$res[3]</td>";
		echo "<td align=center>$res[4]</td>";
		echo "<td align=center>$res[5]</td>";
		echo "<td align=center>$res[6]</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<input type=\"submit\" class=\"submitIn\" value=\"Back\" style=\"float:left\" onClick=\"window.location.href='reports1.php';\">";
?>