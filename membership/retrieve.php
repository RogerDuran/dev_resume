<?php
	include_once("../php_includes/check_login_status.php");
	// If user is already logged in, header that user away
	if($user_ok == true){
	header("location: ../account/user.php?u=".$_SESSION["username"]);
		exit();
}
?><?php
	// AJAX CALLS THIS CODE TO EXECUTE
	if(isset($_POST["e"])){
		$e = mysqli_real_escape_string($db_conx, $_POST['e']);
		$sql = "SELECT id, username FROM users WHERE email='$e' AND activated='1' LIMIT 1";
		$query = mysqli_query($db_conx, $sql);
		$numrows = mysqli_num_rows($query);
		if($numrows > 0){
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$id = $row["id"];
			$u = $row["username"];
			}
		$emailcut = substr($e, 0, 4);
		$randNum = rand(10000,99999);
		$tempPass = "$emailcut$randNum";
		
		
		$cryptpass = crypt($tempPass);
		include_once ("../php_includes/randStrGen.php");
		$p_hash = randStrGen(20)."$cryptpass".randStrGen(20);
		
		$hashTempPass = $p_hash;
		$sql = "UPDATE useroptions SET temp_pass='$hashTempPass' WHERE username='$u' LIMIT 1";
		$query = mysqli_query($db_conx, $sql);
		$to = "$e";
		$from = "auto_responder@Resume.Graphics.com";
		$headers ="From: $from\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
		$subject ="Resume.Graphics Temporary Password";
		$url = "dev.resume.kristenclosson.local/membership";
		$msg = '<h2>Hello '.$u.'</h2><p>This is an automated message from yoursite. If you did not recently initiate the Forgot Password process, please disregard this email.</p><p>You indicated that you forgot your login password. We can generate a temporary password for you to log in with, then once logged in you can change your password to anything you like.</p><p>After you click the link below your password to login will be:<br /><b>'.$tempPass.'</b></p><p><a href="'.$url.'/retrieve.php?u='.$u.'&p='.$hashTempPass.'">Click here now to apply the temporary password shown below to your account</a></p><p>If you do not click the link in this email, no changes will be made to your account. In order to set your login password to the temporary password you must click the link above.</p>';
		if(mail($to,$subject,$msg,$headers)) {
			echo "success";
			exit();
		} else {
			echo "email_send_failed";
			exit();
		}
		} else {
			echo "no_exist";
		}
			exit();
		}
?><?php
	// EMAIL LINK CLICK CALLS THIS CODE TO EXECUTE
	if(isset($_GET['u']) && isset($_GET['p'])){
		$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
		$temppasshash =  $_GET['p'];
		if(strlen($temppasshash) < 10){
			exit();
		}
		$sql = "SELECT id FROM useroptions WHERE username='$u' AND temp_pass='$temppasshash' LIMIT 1";
		$query = mysqli_query($db_conx, $sql);
		$numrows = mysqli_num_rows($query);
		if($numrows == 0){
		header("location: message.php?msg=There is no match for that username with that temporary password in the system. We cannot proceed.");
			exit();
		} else {
			$row = mysqli_fetch_row($query);
			$id = $row[0];
			$sql = "UPDATE users SET password='$temppasshash' WHERE id='$id' AND username='$u' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
			$sql = "UPDATE useroptions SET temp_pass='' WHERE username='$u' LIMIT 1";
			$query = mysqli_query($db_conx, $sql);
			header("location: ../login.php");
			exit();
		}
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
  <title>Forgot Password</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/sl-slide.css">

  <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

  <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
  
  <link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.4.min.css">
  
 <body class="edit-resume">
      <!-- CALL HEADER -->
      <?php include_once("../php_includes/header.php"); ?>
    
      <section class="title">
        <div class="container">
          <div class="row-fluid">
            <div class="span6">
              <h1>Forgot Password?</h1>
            </div>
            <div class="span6">
              <ul class="breadcrumb pull-right">
                <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                <li><a href="#">Pages</a> <span class="divider">/</span></li>
                <li class="active">Forgot Password</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- / .title -->   
      
      <!-- Forgot -->
      <section id="forgot" class="container">
      
         <!-- Start row fluid -->
         <div class="row-fluid">
         
            <div id="pageMiddle">
              <h3>Generate temporary login password</h3>
              <form id="forgotpassform" onsubmit="return false;">
                <div>Step 1: Enter Your Email Address</div>
                <input id="email" type="text" onfocus="_('status').innerHTML='';" maxlength="88">
                <br /><br />
                <button id="forgotpassbtn" class="myButton">Generate Temporary Log In Password</button> 
                <p id="status"></p>
              </form>
            </div>
         
		 </div>
         <!-- End row fluid -->
         
         <p>&nbsp;</p>
        
        </section>
        <!-- /Forgot -->
        
        <!-- Call Footer -->
        <?php include_once("../php_includes/footer.php"); ?>
        
        <!-- Call Login -->
		<?php include_once("../php_includes/login.php"); ?>

	<script src="../js/vendor/jquery-1.9.1.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/jquery-ui-1.10.4.min.js"></script>
    <script>
	$(document).ready(function() {
        $("#forgotpassbtn").click(function() {
            forgotpass();
        });
		
		$("#email").focus(function() {
            $("#forgotpassbtn").css("display","block");
			$(this).val("");
        });
    });
	
    function forgotpass(){
		var e = _("email").value;
		if(e == ""){
			_("status").innerHTML = "Type in your email address";
		} else {
			_("forgotpassbtn").style.display = "none";
			_("status").innerHTML = 'please wait ...';
			var ajax = ajaxObj("POST", "retrieve.php");
			ajax.onreadystatechange = function() {
				   if(ajaxReturn(ajax) == true) {
						var response = ajax.responseText;
						if(response == "success"){
							_("forgotpassform").innerHTML = '<h3>Step 2. Check your email inbox in a few minutes</h3><p>You can close this window or tab if you like.</p>';
							} else if (response == "no_exist"){
							_("status").innerHTML = "Sorry that email address is not in our system. Please try again";
							} else if(response == "email_send_failed"){
							_("status").innerHTML = "Mail function failed to execute";
							} else {
							_("status").innerHTML = "An unknown error occurred";
							}
				   }
			}
				ajax.send("e="+e);
		}
    }
    </script>

    </body>
</html>