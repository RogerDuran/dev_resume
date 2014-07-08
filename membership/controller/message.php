<?php
	$message = "";
	$msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
	if($msg == "activation_failure"){
	$message = '<h2>Activation Error</h2> Sorry there seems to have been an issue activating your account at this time. We have already 	  notified ourselves of this issue and we will contact you via email when we have identified the issue.';
	} else if($msg == "activation_success"){
	$url ="http://dev.resume.kristenclosson.local";
	$message = '<h2>Activation Success</h2> Your account is now activated. <a href="'.$url.'">Create your Resume now!</a>';
	} else {
	$message = $msg;
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
  <title>Message</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
  <link rel="stylesheet" href="../../css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/main.css">
  <link rel="stylesheet" href="../../css/sl-slide.css">

  <script src="../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

  <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../../images/ico/apple-touch-icon-57-precomposed.png">
  
  <link rel="stylesheet" href="../../css/ui-lightness/jquery-ui-1.10.4.min.css">
  
 <body class="edit-resume">
      <!-- CALL HEADER -->
      <?php include_once("../../php_includes/header.php"); ?>  
      
      <section class="title">
        <div class="container">
          <div class="row-fluid">
            <div class="span6">
              <h1>Message</h1>
            </div>

          </div>
        </div>
      </section>
      <!-- / .title -->   
      
      <!-- Message -->
      <section id="message" class="container">
      
         <!-- Start row fluid -->
         <div class="row-fluid"> 

			<div><?php echo $message; ?></div>
            
 		  </div>
         <!-- End row fluid -->
         
         <p>&nbsp;</p>
        
        </section>
        <!-- /Message -->
        
        <!-- Call Footer -->
        <?php include_once("../../php_includes/footer.php"); ?>
        
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

	<script src="../../js/vendor/jquery-1.9.1.min.js"></script>
    <script src="../../js/vendor/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/jquery.validate.min.js"></script>
    <script src="../../js/jquery-ui-1.10.4.min.js"></script>

    </body>
</html>