<html>
<body>


<?php 

$DBConnect = @mysqli_connect("mysql.ict.swin.edu.au", "yourusername","yourpassword", "your_db")
		Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

// set up the SQL query string - we will retrieve the whole
// record that matches the name




echo "<h1>Insert a new row:</h1>
<form>
<table>
<tr><td>Make</td><td><input type='text' name='make'/></td></tr>
<tr><td>Model</td><td><input type='text' name='model'/></td></tr>
<tr><td>price</td><td><input type='text' name='price'/></td></tr>
<tr><td>quantity</td><td><input type='text' name='quantity'/></td></tr>
<tr><td><input type='submit' value='add'/></td><td></td></tr>
</table>
</form>
";

if(isset($_GET['make']) && isset($_GET['model']) && isset($_GET['price']) && isset($_GET['quantity']))
{
	$SQLstring = "insert into inventory (make,model,price,quantity) values ('".$_GET['make']."','".$_GET['model']."',".$_GET['price'].",".$_GET['quantity'].")";
	$queryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die ("<p>Unable to insert data into the inventory table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
	echo "<p>Successfully inserted data into inventory table</p>";
}


$SQLstring = "select * from inventory";
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

?>


</body>
</html>