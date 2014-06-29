<?php
	include_once("../php_includes/check_login_status.php");
	$userid =  $_SESSION['userid'];
	$doc_id = $_GET["docid"];
	
	$sql = "SELECT * FROM document WHERE doc_id = $doc_id and userid = $userid";
	$result = mysqli_query($db_conx, $sql);
	
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
    <?php echo $row["resume_style"]; ?>
</head>
	<?php echo $row["body"]; ?>
</html>