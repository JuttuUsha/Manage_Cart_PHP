<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>A simple quiz</title>
</head>
<body>

<p>Answer all of the questions on the quiz, then select the Score button to grade the quiz. </p>

<?php

echo "<form action=\"\" method=\"get\">";

$DBConnect = @mysqli_connect("mysql.ict.swin.edu.au", "yourusername","yourpassword", "your_db")
		Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";



$SQLstring = "select * from quiz";
$queryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die ("<p>Unable to query the inventory table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";

$row = mysqli_fetch_row($queryResult);
$i=1;
while ($row) {
		
		echo "<b>Question ".($i).":".$row[1]." </b><br/><br/>";
		echo "<input type=\"radio\" name=\"$i\" value=\"a\" />".$row[2]."<br />";
		echo "<input type=\"radio\" name=\"$i\" value=\"b\" />".$row[3]."<br />";
		echo "<input type=\"radio\" name=\"$i\" value=\"c\" />".$row[4]."<br />";
		echo "<input type=\"radio\" name=\"$i\" value=\"d\" />".$row[5]."<br />";
		
	
		if(isset($CorrectAnswers ))
		{
			$CorrectAnswers += array($i=> $row[6]);
		}
		else
		{
			$CorrectAnswers = array($i=> $row[6]);
		}
	
		$row = mysqli_fetch_row($queryResult);
		$i++;
}

$count=$i-1;

echo "<p><input type=\"submit\" value=\"Score\" /></p>
</form>";

if (count($_GET) == $count) {
	
	$TotalCorrect = 0;
	
	echo "<h1>Quiz Results</h1>";

	for($i=1;$i<$count+1;$i++)
	{
		
		rtrim($_GET[$i]);
		if(strncasecmp($_GET[$i],$CorrectAnswers[$i],1)==0)
		{
			echo "<p>Question ".($i).":".$_GET[$i]. "(Correct!)</p>";
			$TotalCorrect++;
		}
		else
		{
			echo "<p>Question ".($i).":".$_GET[$i]. "(Incorrect!)</p>";
		}
	}

			
	echo "<p><strong>You scored $TotalCorrect out of $count answers correctly!</strong></p>";
}
elseif(count($_GET==0))
{
	
}
else
{
	echo "You did not answer all the questions! Click your browser's Back button to return to the quiz.";
}
?>
</body>
</html>