<?php
	include_once("php_includes/check_login_status.php");
	// If user is already logged in, header that weenis away
	if($user_ok == true){
	header("location: ../account/user.php?u=".$_SESSION["username"]);
		exit();
	}
?><?php
	// AJAX CALLS THIS LOGIN CODE TO EXECUTE
	if(isset($_POST["e"])){
	// CONNECT TO THE DATABASE
	include_once("php_includes/db_conx.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
	$e = mysqli_real_escape_string($db_conx, $_POST['e']);
	$p = $_POST['p'];
	// GET USER IP ADDRESS
		$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// FORM DATA ERROR HANDLING
	if($e == "" || $p == ""){
	echo "login_failed";
			exit();
	} else {
	// END FORM DATA ERROR HANDLING
	$sql = "SELECT id, username, password FROM users WHERE email='$e' AND activated='1' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
			$row = mysqli_fetch_row($query);
	$db_id = $row[0];
	$db_username = $row[1];
	$db_pass_str = $row[2];
	
	$passpre = substr($db_pass_str,0,20);
	$passaft = substr($db_pass_str,-20,20);
	$pass= substr($db_pass_str,20,-20);
	$db_pass_str =$pass;
	
	if (crypt($p, $pass) != $pass) {
		//echo "login_failed";
		//echo "input: ".crypt($p). "db pass: ".$pass;
		echo "pass before: ".$passpre."pass after: ".$passaft;
		exit();
	} else {
	// CREATE THEIR SESSIONS AND COOKIES
	$_SESSION['passpre'] = $passpre;
	$_SESSION['passaft'] = $passaft;
	
	$_SESSION['userid'] = $db_id;
	$_SESSION['username'] = $db_username;
	$_SESSION['password'] = $db_pass_str;
	
	
	setcookie("passpre", $passpre, strtotime( '+30 days' ), "/", "", "", TRUE);
	setcookie("passaft", $passaft, strtotime( '+30 days' ), "/", "", "", TRUE);
	setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
	setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
	setcookie("pass", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE); 
	// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
	$sql = "UPDATE users SET ip='$ip', lastlogin=now() WHERE username='$db_username' LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
	echo $db_username;
	   exit();
	}
	}
	exit();
	}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <style type="text/css">
    #loginform{
    margin-top:24px;	
    }
    #loginform > div {
    margin-top: 12px;	
    }
    #loginform > input {
    width: 200px;
    padding: 3px;
    background: #F3F9DD;
    }
    #loginbtn {
    font-size:15px;
    padding: 10px;
    }
    </style>
    <script src="js/main.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    
    <script>
	
	$(document).ready(function() {
		validateForm();
        initialize();
    });
	
	function initialize(){
		$("#loginbtn").click( function()
			{
				if($("#loginform").valid()){
					login();	
				}
			}
		)
	}
	
	function validateForm(){
		$("#loginform").validate({
			rules:{
				email: {
					required: true,
					email: true,
					maxlength: 88,
				},
				password: {
					required: true,
					maxlength: 100,	
				}
			}
		});	
	}
	
    function login(){
		
        var e = _("email").value;
        var p = _("password").value;
				
		_("loginbtn").style.display = "none";
		_("status").innerHTML = 'please wait ...';
		
		var ajax = ajaxObj("POST", "login.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true) {
				if(ajax.responseText == "login_failed"){
					_("status").innerHTML = "Login unsuccessful, please try again.";
					_("loginbtn").style.display = "block";
				} else {
					alert(ajax.responseText);
					window.location = "../account/user.php?u="+ajax.responseText;
				}
			}
		}
		ajax.send("e="+e+"&p="+p);
		
    }
    </script>
    
    <style>
		label.error{
			display:block;
			color:#fbeec4;	
		}
		
		input.error{
			border: 1px solid red;
		}
	</style>
    </head>
<body>

<div id="pageMiddle">
  <h3>Log In Here</h3>
  <!-- LOGIN FORM -->
  <form id="loginform" onSubmit="return false;"  >
    <div>Email Address:</div>
    <input type="text" id="email" name="email">
    <div>Password:</div>
    <input type="password" id="password" name="password" >
    <br /><br />
    <button id="loginbtn" >Log In</button> 
    <p id="status"></p>
    <a href="forgot_pass.php">Forgot Your Password?</a>
  </form>
  
  <div>
  	Need an account?<a href="signup.php" > Sign up  for free</a> <br>
    Only for new users who have never created a resume on our site.
  </div>
  <!-- LOGIN FORM -->
</div>

</body>
</html>