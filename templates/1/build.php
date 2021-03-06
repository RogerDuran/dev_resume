<?php
	include_once("../../php_includes/check_login_status.php");
	
	$userid = $_SESSION["userid"];
	
	if(isset($_SESSION['skills']) &&  isset($_SESSION['experience']) && isset($_SESSION['education']) ){
		
		//Data for Headers
		$firstname = $_SESSION['firstname'];
		$lastname = $_SESSION['lastname'];
		$address = $_SESSION['address'];
		$city = $_SESSION['city'];
		$state = $_SESSION['state'];
		$zip = $_SESSION['zip'];
		$phone = $_SESSION['phone'];
		$cellphone = $_SESSION['cellphone'];
		$email = $_SESSION['email'];
		
		$txtProfile = $_SESSION['txtProfile'];
		$jobTitle = $_SESSION['jobTitle'];
		
		//Data for Skills
		$skills = $_SESSION['skills'];
		
		//Date for Experience
		$experience = $_SESSION['experience'];
		
		//Data for Education
		$education = $_SESSION['education'];
		
		$docid = $_SESSION["doc_id"];
		
		$log_username = $_SESSION['username'];
		
		if(isset($_POST["header"])
			&& isset($_POST["profile"])	
			&& isset($_POST["skills"])
			&& isset($_POST["experience"])
			&& isset($_POST["education"])
		){
			
			$header = $_POST["header"];
			$profile = $_POST["profile"];
			$skills = $_POST["skills"];
			$experience = $_POST["experience"];
			$education = $_POST["education"];
	
			//UPDATE DATABASE
			$sql = "UPDATE document SET header = '$header',
					 profile = '$profile',
					 skills = '$skills',
					 experience = '$experience',
					 education = '$education'
			       WHERE doc_id = $docid AND userid = $userid";
			$query = mysqli_query($db_conx, $sql); 
			
			exit();
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<script src="../../js/vendor/jquery-1.9.1.min.js"></script>
    <script src="../../js/main.js"></script>
	<script>
		$(document).ready(function() {
            sendHTML();
			
			function sendHTML(){
			  //var data = "resumeBody="+ $("body").html();
			  
			  var header = $("#header").html();
			  var profile = $("#profile").html();
			  var skills = $("#skills").html();
			  var experience = $("#experience").html();
			  var education = $("#education").html();
			  
			  var data = "header=" + header 
			            +"&profile=" + profile
						+"&skills=" + skills
						+"&experience=" + experience
						+"&education=" + education;
			  
			  $.ajax({
				  type: "POST",
				  url: "build.php",
				  data: data,
				  cache: false,
				  success:  function(data){
					  alert(experience);
					  //window.location = getServername() + "/account/user.php?u="+data;
				  }
			  });
			  
			}
        });
		
	</script>

	<title><?php echo $firstname." ".$lastname ?> | Web Designer, Director | <?php echo $email ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link id="resumeStyle" rel="stylesheet" type="text/css" href="css/style.css" media="all" />

</head>
<body>

<div id="doc" class="yui-t7">
	<div id="inner">
    
   		<!-- HEADER SECTION -->
		<section id="header">
            <div id="hd">
                <div class="yui-gc">
                    <div class="yui-u first">
                        <h1><?php echo $firstname.' '.$lastname ?></h1> <!-- Name -->
                        <h2><?php echo $jobTitle ?></h2> <!-- Title -->
                    </div>
    
                    <div class="yui-u">
                        <div class="contact-info">
                            <h3><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></h3> <!-- Email -->
                            <h3><?php echo $phone ?></h3> <!-- Phone Number -->
                            <h3><?php echo $address ?> </h3>
                            <h3><?php echo $city." ".$state ?> </h3>
                        </div><!--// .contact-info -->
                    </div>
                </div><!--// .yui-gc -->
            </div><!--// hd -->
        </section>
        <!-- //HEADER SECTION -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<!-- PROFILE SECTION -->
					<section id="profile">
                        <div class="yui-gf">
                            <div class="yui-u first">
                                <h2>Profile</h2>
                            </div>
                            <div class="yui-u">
                                <p class="enlarge">
                                    <?php echo $txtProfile; ?>
                                </p>
                            </div>
                        </div><!--// .yui-gf -->
                    </section>
                    <!-- //PROFILE SECTION -->
                    
                    <!-- SKILLS SECTION -->
					<section id="skills">
                        <div class="yui-gf">
                            <div class="yui-u first">
                                <h2>Skills</h2>
                            </div>
                            <div class="yui-u">
                                <!-- Skills -->
                                <?php echo $skills; ?>                                
                            </div>
                        </div><!--// .yui-gf -->
                    </section>
                    <!-- //SKILLS SECTION -->
                    
                    <!-- EXPERIENCE SECTION -->
					<section id="experience">
                        <div class="yui-gf">
                            <div class="yui-u first">
                                <h2>Experience</h2>
                            </div><!--// .yui-u -->
                                <div class="yui-u">
                                    <?php echo $experience; ?>
                                </div><!--// .yui-u -->
                        </div><!--// .yui-gf -->
					</section>
                    <!-- //EXPERIENCE SECTION -->

					<!-- EDUCATION SECTION -->
					<section id="education">
                        <div class="yui-gf last">
                            <div class="yui-u first">
                                <h2>Education</h2>
                            </div>
                            
                                <div class="yui-u">
                                    <?php echo $education ?>
                                </div>
                        </div><!--// .yui-gf -->
					</section>
                    <!-- //EDUCATION SECTION -->

				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p><?php echo $firstname." ".$lastname ?> &mdash; <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a> &mdash; <?php $phone ?></p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->


</body>
</html>

