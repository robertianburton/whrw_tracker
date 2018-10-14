<?php
	if(file_exists("../../../../projectextras/whrw_tracker/config.ini.php")) {
		echo "File exists.<br>";
	} else {
		exit("File doesn't exist. Exiting");
	}
	exit();
?>