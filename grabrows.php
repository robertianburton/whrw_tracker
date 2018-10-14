<?php
	$ini_array = parse_ini_file("../../../../projectextras/whrw_tracker/config.ini.php");

	// Create connection
	$conn = new mysqli($ini_array["servername"], $ini_array["username"], $ini_array["password"], $ini_array["dbname"]);
	echo "<br>".$ini_array["username"]."<br>";
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	//$sql = "SELECT * FROM tracks ORDER BY id DESC LIMIT 2";
	$sql = "SELECT * FROM tracks WHERE ts >= now() - INTERVAL 1 DAY ORDER BY id DESC";
	$result = mysqli_query($conn,$sql);
	$result_copy = mysqli_query($conn,$sql);;

	$rows = array();

	while(($row = mysqli_fetch_array($result))) {
		$rows[] = $row;
	}

	$json_result = json_encode($rows);
	echo $json_result;
	
	mysqli_close($conn);
?>