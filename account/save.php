<?php
	session_start();
	include_once("../php_includes/db_conx.php");
	
	if(isset($_POST["username"]) && isset($_POST["newpass"])){
		
		$username = $_POST['username'];
		$newpass =  $_POST['newpass'];
		
		$cryptpass = crypt($newpass);
		include_once ("../php_includes/randStrGen.php");
		$p_hash = randStrGen(20)."$cryptpass".randStrGen(20);
		
		$p = $p_hash;
	
		$sql = "UPDATE users SET password = '$p' WHERE username='$username' LIMIT 1";
		mysqli_query($db_conx, $sql);
		
		//Change the session
		
		$passpre = substr($p,0,20);
		$passaft = substr($p,-20,20);
		$pass= substr($p,20,-20);

		$_SESSION['passpre'] =  $passpre;
		$_SESSION['passaft'] =  $passaft;
		$_SESSION["password"] = $pass;
		
		setcookie("passpre", $passpre, strtotime( '+30 days' ), "/", "", "", TRUE);
		setcookie("passaft", $passaft, strtotime( '+30 days' ), "/", "", "", TRUE);
		setcookie("pass", $pass, strtotime( '+30 days' ), "/", "", "", TRUE);


	}

	if(isset($_POST["username"]) && isset($_POST["gender"]) ){
		$gender = $_POST["gender"];
		$username = $_POST["username"];
		
		$sql = "UPDATE users SET gender = '$gender' WHERE username='$username' LIMIT 1";
		mysqli_query($db_conx, $sql);
		
		echo "success";
	}
	
	if(isset($_POST["username"]) && isset($_POST["email"]) ){
		$username = $_POST["username"];
		$email = $_POST["email"];
		
		$sql = "SELECT email FROM users WHERE email = '$email' ";
		$result = mysqli_query($db_conx, $sql);
		$rowcount=mysqli_num_rows($result);
		
		if($rowcount > 0){
			echo "failed";
		}	
		else{
			echo "success";
			$sql = "UPDATE users SET email = '$email' WHERE username='$username' LIMIT 1";
			mysqli_query($db_conx, $sql);
		}

	}
	
	if(isset($_POST["username"]) && isset($_POST["country"]) ){
		$username = $_POST["username"];
		$country = $_POST["country"];
		
		$sql = "UPDATE users SET country = '$country' WHERE username='$username' LIMIT 1";
		mysqli_query($db_conx, $sql);
		
		echo "success";
		
	}
	
	if(isset($_POST["username"]) && isset($_POST['emailAdd'])){
		$email = $_POST['emailAdd'];
		$username = $_POST['username'];
		
		//Look if already subscribe
		
		$sql = "SELECT subscriber FROM news_subscription WHERE subscriber = '$email'";
		$result = mysqli_query($db_conx, $sql);
		$count = mysqli_num_rows($result);
		
		
		//If no record
		if($count < 1){		
			//Save to database
			$sql = "INSERT INTO news_subscription(subscriber,username,date_subscribe) values 
					('$email','$username',now()) ";	
			$query = mysqli_query($db_conx, $sql);
			
			echo "You successfully Subscribed in our Newsletter";
		}
		else{
			echo "You are already Subscribed in our Newsletter";	
		}
		
	}
	
?>