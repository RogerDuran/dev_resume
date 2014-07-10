<?php

	include_once("../php_includes/check_login_status.php");
	// Initialize any variables that the page might echo
	$u = "";
	$sex = "Male";
	$userlevel = "";
	$country = "";
	$joindate = "";
	$lastsession = "";
	// Make sure the _GET username is set, and sanitize it
	if(isset($_GET["u"])){
		$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
	} else {
		header("location: ../login.php");
		exit();	
	}
	
	// Select the member from the users table
	$sql = "SELECT * FROM users WHERE username='$u' AND activated='1' LIMIT 1";
	$user_query = mysqli_query($db_conx, $sql);
	// Now make sure that user exists in the table
	$numrows = mysqli_num_rows($user_query);
	if($numrows < 1){
	echo "That user does not exist or is not yet activated, press back";
		exit();	
	}
	// Check to see if the viewer is the account owner
	$isOwner = "no";
	if($u == $log_username && $user_ok == true){
		$isOwner = "yes";
	}
	// Fetch the user row from the query above
	while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
		$profile_id = $row["id"];
		$email = $row["email"];
		$password = $row["password"];
		$gender = $row["gender"];
		$country = $row["country"];
		$userlevel = $row["userlevel"];
		$signup = $row["signup"];
		$lastlogin = $row["lastlogin"];
		$joindate = strftime("%b %d, %Y", strtotime($signup));
		$lastsession = strftime("%b %d, %Y", strtotime($lastlogin));
		if($gender == "f"){
			$sex = "Female";
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
  <title>Settings</title>
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
  
  <link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.4.css">
    
    <style>
	
		.subscriptionbox{
			overflow:auto;
		}
		
		.lbox{
			width: 48%;
			float:left;	
			padding: 2px;
			margin: 0 5px;
		}
	
		label.error{
			display:block;
			color:red;	
		}
		
		input.error{
			border: 1px solid red;
		}
		
		.text-indent {
			text-indent:50px;
			margin: 2px 0px;
		}
		
		#newsletter{
			background: url('../images/newsletter.png') no-repeat 50% rgba(255, 255, 255, 0);
			height: 450px;
		}
		
		.input{
			background: none repeat scroll 0% 0% #FFF;
			color: rgba(0, 0, 0, 1);
			border-radius: 5px;
			width: 310px;
			padding: 8px;
			border: 1px solid #000;
		}
		
			#inputPlaceholder{
				margin: 0px auto;
				width: 330px;
				position: absolute;
				top: 250px;
				left: 410px;
			}
			
			#inputPlaceholder .btn {
				border-radius: 5px;
				font-family: Arial;
				color: #FFF;
				font-size: 20px;
				background: none repeat scroll 0% 0% #353535;
				padding: 5px;
				text-decoration: none;
				border: 1px solid #000;
				margin-top: 20px;
				width: 100%;
			}
			
				#inputPlaceholder .btn:hover {
					border-radius: 5px;
					font-family: Arial;
					color: #000;
					font-size: 20px;
					background: none repeat scroll 0% 0% #fff;
					padding: 5px;
					text-decoration: none;
					border: 1px solid #000;
					margin-top: 20px;
					width: 100%;
				}
				
				#inputPlaceholder input[type="text"], input[type="password"] {
					transition: all 0.3s ease-in-out 0s;
					outline: medium none;
				}
				
				#inputPlaceholder label.error{
					display:inline;
					color:red;
				}
				
	</style>    
    
    <body>
      <!-- CALL HEADER -->
      <?php include_once("../php_includes/header.php"); ?>
    
      <section class="title">
        <div class="container">
          <div class="row-fluid">
            <div class="span6">
              <h1>Hello, <?php echo $u ?></h1>
            </div>
            <div class="span6">
              <ul class="breadcrumb pull-right">
                <li><a href="../index.php">Home</a> <span class="divider">/</span></li>
                <li><a href="#">Account</a> <span class="divider">/</span></li>
                <li class="active">Settings</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- / .title -->       
    
      <!-- settings -->
      <section id="settings" class="container">
      
         <!-- Start row fluid -->
         <div class="row-fluid"> 
         
        <!------------------------------------ DIALOG BOX --------------------------------------->	
            <div style="display:none" id="success_dialog" title="Success!">
                <p>Successfully Updated!</p>
            </div>
            
            <div style="display:none" id="success_dialog_generic" title="Success!">
                <p id="success_dialog_placeholder"></p>
            </div>
        
            <div style="display:none" id="password_dialog" title="Change Password">
                <form id="frmPassword">
                    <div>New Password</div>
                    <input id="newPassword" name="newPassword" type="password" >
                    <div>Confirm Password</div>
                    <input id="new2Password" name="new2Password" type="password" >
                </form>
            </div>
            
            <div style="display:none" id="gender_dialog" title="Change Gender">
                <form id="frmGender">
                    <select id="frmOptGender" name="frmOptGender">>
                      <option value=""></option>
                      <option value="m">Male</option>
                      <option value="f">Female</option>
                    </select>
                </form>
            </div>
            
            <div style="display:none" id="email_dialog" title="Change Email">
                <form id="frmEmail">
                    <div>Email</div>
                    <input id="inpEmail" name="inpEmail" type="text" >
                </form>
            </div>
            
             <div style="display:none" id="country_dialog" title="Change Country">
                <form id="frmCountry">
                    <div>Country</div>
                    <select id="optCountry" name="inpCountry" >
                        <?php include_once("../php_includes/template_country_list.php"); ?>
                    </select>
                </form>
            </div>
           
            
            <div id="tabs">
                <ul>
                <li><a href="#tabs-1">Overview</a></li>
                <li><a href="#tabs-2">Subscription</a></li>
                <li><a href="#tabs-3">Newsletter</a></li>
                </ul>
                
                <div id="tabs-1">
                	<h3>Details</h3>
                    <table border="0" cellpadding="8">
                    <thead>
                        <th colspan="3"></th>   
                    </thead>
                    <tbody>
                        <tr>
                            <td>User ID:</td>
                            <td id="hdnPassword"><?php echo $profile_id ?> </td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td id="txtUsername"><?php echo $u ?> </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td id="txtEmail"><?php echo $email ?> </td>
                            <td><a id="btnEmail" href="#" ><?php if($isOwner == "yes") { echo "Edit"; } ?></a></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><a id="btnPassword" href="#" ><?php if($isOwner == "yes") { echo "Edit"; } ?></a></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td id="optGender"><?php echo $sex ?></td>
                            <td><a id="btnGender" href="#" ><?php if($isOwner == "yes") { echo "Edit"; } ?></a></td>
                        </tr>
                        <tr>
                            <td>Country:</td>
                            <td id="txtCountry"><?php echo $country ?></td>
                            <td><a id="btnCountry" href="#" ><?php if($isOwner == "yes") { echo "Edit"; } ?></a></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                
                <div id="tabs-2">
                    <h1>  Upgrade for Instant Access to All Features </h1>
                    <form id="frmSubmit" action="../subscription/checkout.php" method="post">
                    <div class="subscriptionbox">
                        <div class="lbox">
                            <div> <!-- Upper Radio -->
                                <input name="subscription" id="option1" type="radio" value="templates" checked="checked"></input><span>$12.99 - 15 templates</span>
                                <ul>
                                    <li>Get full access of 15 templates</li>
                                    <li>Cancel anytime</li>
                                </ul>
                            </div>
                            
                            <div> <!-- Middle Radio -->
                                <input name="subscription" id="option2" value="infographic" type="radio" ></input><span>$299.00 - Custom Infographic</span>
                                <ul>
                                    <li>Get a custom resume in an infographic stytle</li>
                                    <li>Stand out and be different to other resumes!</li>
                                </ul>
                            </div>
                            
                            <div> <!-- Lower Radio -->
                                <input name="subscription" id="option3" value="website" type="radio" ></input><span>$299.00 - Custom Web Page</span>
                                <ul>
                                    <li>Have a resume online!</li>
                                    <li>Try our modern online resume</li>
                                </ul>
                            </div>
                        </div>
                        
                        
                        <div class="lbox">
                            <span>Subscription Features</span><br>
                            <ul>
                                <li>Print your resumes and cover letters</li>
                                <li>Download & save in multiple formats (Word, PDF, .RTF, .TXT)</li>
                                <li>Customize and create multiple resumes and cover letters</li>
                                <li>Access your resume from anywhere--even your phone!</li>
                            </ul>
                        </div>
                        
                    </div>
        
                        <input id="btnContinue" type="submit" value="CONTINUE"></input>
                    </form>
            
                </div>
                
                
                <div id="tabs-3">
                    
                    <div id="emailPref">
                        <form id="frmNewsletter" onSubmit="return false" >
                            <div id="newsletter">
                                <div id="inputPlaceholder">
                                    <input class="input" id="txtEmailSubscribe" type="text" name="txtEmailSubscribe" >	 <br>
                                    <input class="myButton" type="submit" name="btnContinueEmailRef" id="btnContinueEmailRef" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>

         
         <!-- End row fluid -->
         <p>&nbsp;</p>
      
      </section>
      <!-- /settings -->

      
      <!-- Call Footer -->
      <?php include_once("../php_includes/footer.php"); ?>
      
      <!-- Call Login -->
      <?php include_once("../php_includes/login.php"); ?>
      

      <script src="../js/vendor/jquery-1.9.1.min.js"></script>
      <script src="../js/vendor/bootstrap.min.js"></script>
      <script src="../js/main.js"></script>
      <script src="../js/jquery.validate.min.js"></script>
      <script src="../js/jquery-ui-1.10.4.min.js"></script>
      <script src="../js/date.js"></script>
      <script src="../js/jquery.sortable.min.js"></script>
      <script src="../js/settings.js"></script>


    </body>
</html>