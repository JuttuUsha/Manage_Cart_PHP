<html>
<body>



<?php 

$DBConnect = @mysqli_connect("mysql.ict.swin.edu.au", "yourusername","yourpassword", "your_db")
		Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

// set up the SQL query string - we will retrieve the whole
// record that matches the name

// get language names from db

$SQLstring = "select distinct make from inventory";
$queryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die ("<p>Unable to query the inventory table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";


echo "<form>Please select a make: <select name='make'><option>All</option>";
	
$row = mysqli_fetch_row($queryResult);
	
	while ($row) {
		echo "<option value='".$row[0]."'>".$row[0]."</option>";	
		$row = mysqli_fetch_row($queryResult);
	}


echo "</select><br/><input type='submit' value='Search'/></form>";


mysqli_close($DBConnect);



if(isset($_GET['make']) && $_GET['make']!="")
{

	$DBConnect = @mysqli_connect("mysql.ict.swin.edu.au", "yourusername","yourpassword", "your_db")
		Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

	if($_GET['make']=="All")
	{
		$SQLstring = "select * from inventory";
	}
	else
	{
		$SQLstring = "select * from inventory where make='".$_GET['make']."'";
	}
	
	$queryResult = @mysqli_query($DBConnect, $SQLstring)
			Or die ("<p>Unable to query the inventory table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";

	echo "<hr>";
	echo "<h1>content of inventory table</h1>";
	echo "<table width='100%' border='1'>";
	echo "<th>Make</th><th>Model</th><th>Price</th><th>Quantity</th>";
		$row = mysqli_fetch_row($queryResult);
		
		while ($row) {
			echo "<tr><td>{$row[1]}</td>";
			echo "<td>{$row[2]}</td>";
			echo "<td>{$row[3]}</td>";
			echo "<td>{$row[4]}</td></tr>";
			$row = mysqli_fetch_row($queryResult);
		}
	echo "</table>";


	mysqli_close($DBConnect);
}







?>


</body>
</html>