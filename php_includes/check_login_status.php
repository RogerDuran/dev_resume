<?php
	session_start();
	include_once("db_conx.php");
	// Files that inculde this file at the very top would NOT require 
	// connection to database or session_start(), be careful.
	// Initialize some vars
	$user_ok = false;
	$log_id = "";
	$log_username = "";
	$log_password = "";
	// User Verify function
	function evalLoggedUser($conx,$id,$u,$p){
		$sql = "SELECT ip FROM users WHERE id='$id' AND username='$u' AND password='$p' AND activated='1' LIMIT 1";
			$query = mysqli_query($conx, $sql);
			$numrows = mysqli_num_rows($query);
		if($numrows > 0){
			return true;
		}
	}
	if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"]) && isset($_SESSION['passpre']) && isset($_SESSION['passaft'])) {
		$passpre = $_SESSION['passpre'];
		$passaft = $_SESSION['passaft'];
		$log_id = preg_replace('#[^0-9]#', '', $_SESSION['userid']);
		$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
		$log_password =  $_SESSION['password'];

		// Verify the user
		$realpass= $passpre.$log_password.$passaft;
		$user_ok = evalLoggedUser($db_conx,$log_id,$log_username,$realpass);
	} else if(isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"]) && isset($_COOKIE['passpre']) && isset($_COOKIE['passaft']) ){
		
		$_SESSION['passpre'] =  $_COOKIE['passpre'];
		$_SESSION['passaft'] =  $_COOKIE['passaft'];
		$_SESSION['userid'] = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
		$_SESSION['username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
		$_SESSION['password'] = $_COOKIE['pass'];
		$log_id = $_SESSION['userid'];
		$log_username = $_SESSION['username'];
		$log_password = $_SESSION['password'];
		
		$passpre = $_SESSION['passpre'];
		$passaft = $_SESSION['passaft'];
		// Verify the user
		$realpass= $passpre.$log_password.$passaft;
		$user_ok = evalLoggedUser($db_conx,$log_id,$log_username,$realpass);
		if($user_ok == true){
			// Update their lastlogin datetime field
			$sql = "UPDATE users SET lastlogin=now() WHERE id='$log_id' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
		}
	}
?>