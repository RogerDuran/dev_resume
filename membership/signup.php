<?php include_once("../membership/controller/signup.php"); ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration</title>
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

	<style>
		select.error{
			display:inline;
			border: 1px solid #F00;			
			margin-left: 10px;
		}
		
		label.error{
			display:inline;
			color:#F00;
			margin-left: 10px;
		}
		
		input.error{
			border: 1px solid #F00;
		}
	</style>
  
 <body class="edit-resume">
      <!-- CALL HEADER -->
      <?php include_once("../php_includes/header.php"); ?>
    
      <section class="title">
        <div class="container">
          <div class="row-fluid">
            <div class="span6">
              <h1>Registration</h1>
            </div>
            <div class="span6">
              <ul class="breadcrumb pull-right">
                <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                <li><a href="#">Pages</a> <span class="divider">/</span></li>
                <li class="active">Register</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- / .title -->   
      
      <!-- Signup -->
      <section id="signup" class="container">
      
         <!-- Start row fluid -->
         <div class="row-fluid"> 
         
         	<div class="span12">
              <form name="signupform" id="signupform" onsubmit="return false;" class="signup">
                <div class="email">Username: </div>
                <input id="username" name="username" type="text" placeholder="Enter Your Username">
                <span style="display:inline" id="unamestatus"></span>
                <div class="email">Email Address:</div>
                <input id="email" name="email" type="text" onfocus="emptyElement('status')" onkeyup="restrict('email')" placeholder="Enter Your Email Address">
                <div class="email">Create Password:</div>
                <input id="pass1" name="pass1" type="password" onfocus="emptyElement('status')"  placeholder="Enter Your Password">
                <div class="email">Confirm Password:</div>
                <input id="pass2" name="pass2" type="password" onfocus="emptyElement('status')"  placeholder="Confirm Your Password">
                <div class="email">Gender:</div>
                <select id="gender" name="gender" onfocus="emptyElement('status')" class="emailinputselect">
                  <option value=""></option>
                  <option value="m" selected>Male</option>
                  <option value="f">Female</option>
                </select>
                <div class="email">Country:</div>
                <select id="country" name="country" onfocus="emptyElement('status')" >
                  <?php include_once("../php_includes/template_country_list.php"); ?>
                </select>
                <div class="clear"></div>
                <div>
                   <div class="fpass"><a href="#" onclick="return false" onmousedown="openTerms()">
                    View the Terms Of Use</a></div>
                  </a>
                </div>
                <div id="terms" style="display:none;">
                  <h3>Resume.Graphics Terms Of Use</h3>
                  <p>1. Term 1.</p>
                  <p>2. Term 2.</p>
                  <p>3. Term 3.</p>
                </div>
                <br /><br />
                <div class="clear"></div>
                <button id="signupbtn" class="myButton">Create Account</button>
                <div class="clear"></div>
                <span id="status"></span>
              </form>
            </div>
         
	     </div>
         <!-- End row fluid -->
         
         <p>&nbsp;</p>
        
        </section>
        <!-- /Edit -->
        
        <!-- Call Footer -->
        <?php include_once("../php_includes/footer.php"); ?>
        
        <!-- Call Login -->
		<?php include_once("../php_includes/login.php"); ?>

	<script src="../js/vendor/jquery-1.9.1.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/signup.js"></script>

    </body>
</html>