<!DOCTYPE html>
<html>
<body>
<center>
<?php
echo "My first PHP script!";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dei";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br/>";


$sql = "SELECT * FROM std";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
	echo "<table border=2><tr><th>name</th><th>dept</th> <th>Age</th>  </tr>";
    while($row = $result->fetch_assoc()) {
		
		echo "<tr><td>" .$row["name"]. "</td><td>" .$row["dept"]. "</td><td>" .$row["age"] ."</td></tr>";
		
        //echo "name: " . $row["name"]. "<br>";
		//echo "dept: " . $row["dept"]. "<br>";
		//echo "age: " . $row["age"]. "<br>";
    }
	
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();?>
</center>

</body>
</html>