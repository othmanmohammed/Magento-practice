<?php
// Get the contents of the JSON file 
$strJsonFileContents = file_get_contents("C:/xampp/htdocs/itg/css-color-names.json");
//var_dump($strJsonFileContents); // show contents
//var_dump($array); // print array
$strJsonFileContents = file_get_contents("css-color-names.json");
// Convert to array 
$array = json_decode($strJsonFileContents, true);
//var_dump($array);

foreach ($array as $key => $value) {
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usman";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO data (Name,Code)
	VALUES ('$key','$value')";

	if (mysqli_query($conn, $sql)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
}
?>
