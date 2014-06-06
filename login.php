<?php
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
		echo "login_failed";
		//echo "input: ".crypt($p). "db pass: ".$pass;
		//echo "pass before: ".$passpre."pass after: ".$passaft;
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
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/sl-slide.css">

  <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

  <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
  
  <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.4.min.css">
    
    <body>
      <!-- CALL HEADER -->
      <?php include_once("php_includes/header.php"); ?>
    
      <section class="title">
        <div class="container">
          <div class="row-fluid">
            <div class="span6">
              <h1>Login</h1>
            </div>
            <div class="span6">
              <ul class="breadcrumb pull-right">
                <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                <li><a href="#">Pages</a> <span class="divider">/</span></li>
                <li class="active">Career</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- / .title -->       
    
      <!-- Career -->
      <section id="career" class="container">
    
        <!-- Start row fluid -->
        <div class="row-fluid"> 

            <form class="form-inline" id="loginpageform" onSubmit="return false;">
                <input type="text" id="email" name="email" class="input-small" placeholder="Email"> <br>
                <input type="password" id="password" name="password" class="input-small" placeholder="Password"> <br>
                <label class="checkbox">
                    <input type="checkbox"> Remember me
                </label>
                <button type="submit" id="loginbtn" class="btn btn-primary">Sign in</button>
                <p id="status"></p>
            </form>
            <a href="#">Forgot your password?</a>

         </div>
         <!-- End row fluid -->
         
         <p>&nbsp;</p>
        
        </section>
        <!-- /Career -->
        
        <!-- Call Footer -->
        <?php include_once("php_includes/footer.php"); ?>
        
        <!--  Login form -->
        <div class="modal hide fade in" id="loginForm" aria-hidden="false">
          <div class="modal-header">
            <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
            <h4>Login Form</h4>
          </div>
          <!--Modal Body-->
          <div class="modal-body">
            <form class="form-inline" action="index.html" method="post" id="form-login">
              <input type="text" class="input-small" placeholder="Email">
              <input type="password" class="input-small" placeholder="Password">
              <label class="checkbox">
                <input type="checkbox"> Remember me
              </label>
              <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
            <a href="#">Forgot your password?</a>
          </div>
          <!--/Modal Body-->
        </div>
        <!--  /Login form -->

	<script src="js/vendor/jquery-1.9.1.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery-ui-1.10.4.min.js"></script>

    <script>
	
	$(document).ready(function() {
		
		validateForm();
        initialize();
    });
	
	function initialize(){
		$("#loginbtn").click( function()
			{
				if($("#loginpageform").valid()){
					login();	
				}
			}
		)
	}
	
	function validateForm(){
		$("#loginpageform").validate({
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
					//alert(ajax.responseText);
					window.location = "../account/user.php?u="+ajax.responseText;
				}
			}
		}
		ajax.send("e="+e+"&p="+p);
		
    }
    </script>
    </body>
</html>