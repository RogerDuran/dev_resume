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
			display:block;
			border: 1px solid #F00;			
			margin-left: 10px;
		}
		
		label.error{
			display:block;
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
                <li><a href="../index.php">Home</a> <span class="divider">/</span></li>
                <li><a href="#">Pages</a> <span class="divider">/</span></li>
                <li class="active">Register</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- / .title -->   
      
      
      <section id="registration-page" class="container">
        <form class="center" name="signupform" id="signupform" onsubmit="return false;"  method="POST">
          <fieldset class="registration-form">
         
                <div class="control-group" style="position: relative;">
                  <!-- Username -->
                  <div class="controls">
                     <div class="text-left">Username:</div>
                    <input type="text" id="username" name="username" placeholder="Username" class="input-xlarge">
                    <span style="display:none" id="unamestatus"></span>
                    <img id="statusOk" src="../images/valid.png" style="display:none;position: absolute; right: 15px; top: 40px;">
                    <img id="statusNot" src="../images/red_cross_mark.png" style="display:none;position: absolute; right: 15px; top: 40px;">
                  </div>
                </div>   
   
             <!-- <form name="signupform" id="signupform" onsubmit="return false;" class="signup"> -->
             	
                <!--
                <div class="email">Username: </div>
                <input id="username" name="username" type="text" placeholder="Enter Your Username">
                <span style="display:inline" id="unamestatus"></span>
                -->
                

                <div class="control-group" style="position: relative;">
                  <!-- E-mail -->
                  <div class="controls">
                    <div class="text-left">Email:</div>
                    <input type="text" id="email" name="email" onfocus="emptyElement('status')" onkeyup="restrict('email')" placeholder="Enter Your Email Address" class="input-xlarge">
                    <img id="statusEmailOk" src="../images/valid.png" style="display:none;position: absolute; right: 15px; top: 40px;">
                    <img id="statusEmailNot" src="../images/red_cross_mark.png" style="display:none;position: absolute; right: 15px; top: 40px;">
                  </div>
                </div>
                
                <!--
                <div class="email">Email Address:</div>
                <input id="email" name="email" type="text" onfocus="emptyElement('status')" onkeyup="restrict('email')" placeholder="Enter Your Email Address">
                -->
                
                <div class="control-group">
                  <!-- Password-->
                  <div class="controls">
	                <div class="text-left">Password:</div>
                    <input type="password" id="pass1" name="pass1" placeholder="Password" class="input-xlarge" onfocus="emptyElement('status')">
                  </div>
                </div>
                
                <!--
                <div class="email">Create Password:</div>
                <input id="pass1" name="pass1" type="password" onfocus="emptyElement('status')"  placeholder="Enter Your Password">
                -->
                
                
                <div class="control-group">
                  <!-- Password-->
                  <div class="controls">
	                <div class="text-left">Confirm Password:</div>
                    <input type="password" id="pass2" name="pass2" placeholder="Confirm Password" class="input-xlarge" onfocus="emptyElement('status')">
                  </div>
                </div> 
                
                <!--
                <div class="email">Confirm Password:</div>
                <input id="pass2" name="pass2" type="password" onfocus="emptyElement('status')"  placeholder="Confirm Your Password">
                -->
                
                <div class="control-group">
                  <!-- Gender-->
                  <div class="controls">
                  	<div class="email">Gender:</div>
                    <select id="gender" name="gender" onfocus="emptyElement('status')" class="emailinputselect">
                      <option value=""></option>
                      <option value="m" selected>Male</option>
                      <option value="f">Female</option>
                    </select>
                  </div>
                </div>
                
                
                <div class="control-group">
                  <!-- Country-->
                  <div class="controls">      
                    <div class="email">Country:</div>
                    <select id="country" name="country" onfocus="emptyElement('status')" >
                      <?php include_once("../php_includes/template_country_list.php"); ?>
                    </select>
                  </div>
                </div>
                
                
                <div class="clear"></div>
                <div>
                   <div class="fpass"><a  data-toggle="modal" href="#terms" onclick="return false" onmousedown="openTerms()">
                    View the Terms Of Use</a></div>
     
                </div>
                
                <!-- Duplicate Modal-->
                <div class="modal hide fade in" id="terms" aria-hidden="false">
                  <div class="modal-header">
                    <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
                    <h2> Terms of use</h2>
                  </div>
                  
                   <div class="modal-body">
                          <p ><h5> Term1 </h5>  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer justo mi, volutpat vitae enim vitae, posuere porta augue. Fusce fringilla augue ut ligula fermentum eleifend. Integer ut purus eu nibh tincidunt auctor. Nam ornare mattis quam, ac dictum neque accumsan et. Maecenas suscipit neque quis risus vehicula vehicula. Integer eleifend ipsum sed mauris dignissim cursus. Ut risus magna, lacinia vitae faucibus in, aliquam id leo. Sed quis orci ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce laoreet risus molestie augue scelerisque, et posuere quam mollis. Nulla ultrices dapibus risus, quis mattis nisi varius et. Praesent vel nisl mattis, blandit quam nec, egestas nibh. Vestibulum a orci orci. </p>
                          <p> <h5> Term2 </h5>Proin tempus facilisis nulla, nec sagittis purus aliquet eu. Morbi iaculis sem enim, quis laoreet lectus eleifend ac. Ut semper rhoncus metus. Curabitur ultricies lacinia ligula, ornare suscipit enim congue et. Nullam eget faucibus augue, sit amet ornare diam. Sed mattis dolor magna, vitae lacinia eros vestibulum eget. Sed vulputate a magna sed sollicitudin. </p>
                          <p> <h5> Term3 </h5> Nam auctor odio risus, ut vestibulum magna venenatis sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque at consequat dui, et ullamcorper turpis. Vestibulum tristique adipiscing eleifend. Nam mollis vitae lacus sed porta. Nunc ut dui sit amet justo egestas fermentum. Aenean ipsum libero, sagittis ac condimentum eu, dapibus ac mi. Nulla pellentesque porta ipsum. Vestibulum iaculis a eros in feugiat. Ut ac metus quis nibh consequat convallis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam sit amet nisi lectus. Integer dictum blandit urna, ac consequat justo hendrerit quis. </p>
                          
                   <div class="row">
                   	<button id="termsAgree" class="myButton"> AGREE </button>
                   	<button id="termsDisagree" class="myButton"> DISAGREE </button>       
                   </div>
                   
                   <br>
                          
                   </div>
                   <!--/Duplicate Body-->
                </div>    
                <!--  /Duplicate Modal -->   
                
                <!--
                <div id="terms" style="display:none;">
                  <h3>Resume.Graphics Terms Of Use</h3>
                  <p>1. Term 1.</p>
                  <p>2. Term 2.</p>
                  <p>3. Term 3.</p>
                </div>
                -->
                
                <br /><br />
                <div class="clear"></div>
                <button id="signupbtn" class="myButton">Create Account</button>
                <div class="clear"></div>
                <span id="status"></span>
   

         
          </fieldset>
        </form>
      </section>
      <!-- /#registration-page -->
         

        
        <!-- Call Footer -->
        <?php include_once("../php_includes/footer.php"); ?>
        
        <!-- Call Login -->
		<?php include_once("../php_includes/login.php"); ?>

	<script src="../js/vendor/jquery-1.9.1.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/jquery-ui-1.10.4.min.js"></script>
    <script src='js/signup.js'></script>

    </body>
</html>