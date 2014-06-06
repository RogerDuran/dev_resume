<?php
$db_conx = mysqli_connect("localhost", "kristen_admin", "GX@dk24SEF7^", "kristen_resume");
//$db_conx = mysqli_connect("localhost", "admin", "B8Ur8WWj6um74VVU", "resume");
// Evaluate the connection
	if (mysqli_connect_errno()) {
		echo mysqli_connect_error();
		exit();
	} 
?>