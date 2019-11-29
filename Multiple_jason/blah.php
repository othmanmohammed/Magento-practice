<?php
	$strjsondata = file_get_contents("C:/xampp/htdocs/itg/test.json");
	$array =json_decode($strjsondata , true);
	//var_dump($array);
	//var_dump($strjsondata);
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

	foreach ($array as $value) {
		//foreach ($value as $key2 => $value2) {

				$sql = "INSERT INTO rokanthemes_blog_post (title,thumbnailimage,meta_keywords,meta_description,identifier,content_heading,short_content,content,creation_time,update_time,publish_time,is_active,detailimage)
				VALUES (
				'".addslashes($value['title'])."',
				'',
				'".addslashes($value['meta_keywords'])."',
				'".addslashes($value['meta_description'])."',
				'".addslashes($value['identifier'])."',
				'".addslashes($value['title'])."',
				'".addslashes($value['short_content'])."',
				'".addslashes($value['post_content'])."',
				'".$value['created_time']."',
				'".$value['update_time']."',
				'".$value['created_time']."',
				1,
				'')";

				if (mysqli_query($conn, $sql)) {
    				echo "New record created successfully";
				} else {
    				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
}

//editing Code below 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE rokanthemes_blog_post SET title='3rd time edited' WHERE post_id=2";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

//delteting code below 

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM rokanthemes_blog_post WHERE post_id=3";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


$conn = null;


//	mysqli_close($conn);

?>