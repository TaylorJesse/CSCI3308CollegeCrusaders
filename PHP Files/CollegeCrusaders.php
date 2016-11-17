<?php
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "ccrusaders";
$dbname = "College_Majors";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
* */

function getMajors($college) {
	$sql = "SELECT * FROM ".$college.";";
	$res = $conn->query($sql);
	
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function closeConnection() {
	$conn->close();
}
?>
