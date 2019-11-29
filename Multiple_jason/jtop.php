<?php
	$strjsondata = file_get_contents("C:/xampp/htdocs/itg/test.json");
	$array =json_decode($strjsondata , true);
	//var_dump($array);
	//var_dump($strjsondata);

	foreach ($array as $keys ) {
		//foreach ($keys as $key => $value2) {
		//echo "<pre>";
		$title 				= $keys['title'];
		$post_content 		= $keys['post_content']; 
		$status 			= $keys['status']; 
		$created_time 		= $keys['created_time']; 
		$update_time 		= $keys['update_time']; 
		$identifier 		= $keys['identifier']; 
		$user 				= $keys['user']; 
		$update_user 		= $keys['update_user']; 
		$meta_keywords 		= $keys['meta_keywords']; 
		$meta_description 	= $keys['meta_description']; 
		$comments 			= $keys['comments']; 
		$tags 				= $keys['tags']; 
		$short_content 		= $keys['short_content']; 

		
	
		//var_dump($keys);} 
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

				$sql = "INSERT INTO rokanthemes_blog_post (
				title,
				
				meta_keywords,
				meta_description,
				identifier,
				
				short_content,
				content,
				creation_time,
				update_time,
				


				)
				VALUES (
				'$title',
				
				'$meta_keywords',
				'$meta_description',
				'$identifier
				
				'$short_content',
				'$post_content',
				'$created_time',
				'$update_time'
				
				
				)";

				//'".$value2['thumbnailimage']."',
				//'".$value2 -> detailimage."';
				//$value[title];

				if (mysqli_query($conn, $sql)) {
    				echo "New record created successfully";
				} else {
    				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}

				mysqli_close($conn);
			//}
		//}
	}
				//publish_time,
				//is_active,
				//detailimage
				//content_heading,
				//thumbnailimage,
?>