<?php
	include("config_database.php");

	$sql_query = "SELECT Reserve_Id, Plate_Id, Model, Brand, Car.Year, Price, Customer.First, Customer.Last, SSN, Email, DOB, Zip, Area, City, Country, Payment_Type, Pickup_Location, Reservation_Date FROM Reservation NATURAL JOIN Customer NATURAL JOIN Car NATURAL JOIN Cus_Address NATURAL JOIN Address";
	$result = mysqli_query($con,$sql_query);

	echo "<table>
			<tr>
				<th>Reservation ID</th>
				<th>Car Plate No.</th>
				<th>Car Model</th>
				<th>Car Brand</th>
				<th>Car Year</th>
				<th>Car Price</th>
				<th>Customer First Name</th>
				<th>Customer Last Name</th>
				<th>Customer SSN</th>
				<th>Customer Email</th>
				<th>Customer DoB</th>
				<th>Customer Zip Code</th>
				<th>Customer Area</th>
				<th>Customer City</th>
				<th>Customer Country</th>
				<th>Payment Type</th>			
				<th>Pickup Location</th>	
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
		echo "<td align=center>$res[7]</td>";
		echo "<td align=center>$res[8]</td>";
		echo "<td align=center>$res[9]</td>";
		echo "<td align=center>$res[10]</td>";
		echo "<td align=center>$res[11]</td>";
		echo "<td align=center>$res[12]</td>";
		echo "<td align=center>$res[13]</td>";
		echo "<td align=center>$res[14]</td>";
		echo "<td align=center>$res[15]</td>";
		echo "<td align=center>$res[16]</td>";
		echo "<td align=center>$res[17]</td>";
		echo "</tr>";
	}
	echo "</table>";
?>