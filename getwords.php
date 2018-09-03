<?php
	$ini_array = parse_ini_file("../../../../projectextras/whrw_tracker/config.ini.php");

	// Create connection
	$conn = new mysqli($ini_array["servername"], $ini_array["username"], $ini_array["password"], $ini_array["dbname"]);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$gettrack = urldecode($_GET['track']);
	$getartist = urldecode($_GET['artist']);
	$getalbum = urldecode($_GET['album']);
	$getrecent = urldecode($_GET['recent']);

	$gettrack = $conn->real_escape_string($gettrack);
	$getartist = $conn->real_escape_string($getartist);
	$getalbum = $conn->real_escape_string($getalbum);
	$getrecent = $conn->real_escape_string($getrecent);

	$sql = "INSERT INTO tracks (id, track, artist, album, ts, recent) VALUES (default,'".$gettrack."', '".$getartist."', '".$getalbum."', default, ".$getrecent.")";
	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}


?>