<?php
	session_start();
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
    <title>Home | Resume.Graphics</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">
	
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
   
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>

    <!-- CALL HEADER -->
    <?php include_once("php_includes/header.php"); ?>

    <!--Slider-->
    <section id="slide-show">
     <div id="slider" class="sl-slider-wrapper">

        <!--Slider Items-->    
        <div class="sl-slider">
            <!--Slider Item1-->
            <div class="sl-slide item1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="container">
                        <img class="pull-right" src="images/sample/slider/img1.png" alt="" />
                        <h2>Creative Ideas</h2>
                        <h3 class="gap">Tincidunt condimentum eros</h3>
                        <a class="btn btn-large btn-transparent" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <!--/Slider Item1-->

            <!--Slider Item2-->
            <div class="sl-slide item2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="container">
                        <img class="pull-right" src="images/sample/slider/img2.png" alt="" />
                        <h2>Planning &amp; Analysis</h2>
                        <h3 class="gap">Aenean ultricies mi vitast</h3>
                        <a class="btn btn-large btn-transparent" href="#">Learn More</a>
                    </div>
                </div>
            </div>
            <!--Slider Item2-->

            <!--Slider Item3-->
            <div class="sl-slide item3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                   <div class="container">
                    <img class="pull-right" src="images/sample/slider/img3.png" alt="" />
                    <h2>Unique Solutions</h2>
                    <h3 class="gap">Breatures who have been utterly</h3>
                    <a class="btn btn-large btn-transparent" href="#">Learn More</a>
                </div>
            </div>
        </div>
        <!--Slider Item3-->

    </div>
    <!--/Slider Items-->

    <!--Slider Next Prev button-->
    <nav id="nav-arrows" class="nav-arrows">
        <span class="nav-arrow-prev"><i class="icon-angle-left"></i></span>
        <span class="nav-arrow-next"><i class="icon-angle-right"></i></span> 
    </nav>
    <!--/Slider Next Prev button-->

</div>
<!-- /slider-wrapper -->           
</section>
<!--/Slider-->

<section class="main-info">
    <div class="container">
        <div class="row-fluid">
            <div class="span9">
                <h4>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</h4>
                <p class="no-margin">Tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet</p>
            </div>
            <div class="span3">
                <a class="btn btn-success btn-large pull-right" href="http://shapebootstrap.net">Free Download Nova</a>
            </div>
        </div>
    </div>
</section>

<!--Services-->
<section id="services">
    <div class="container">
        <div class="center gap">
            <h3>What We Offer</h3>
            <p class="lead">Look at some of the recent projects we have completed for our valuble clients</p>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Web Design</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-thumbs-up-alt icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Graphic Design</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-leaf icon-medium icon-rounded"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Email Marketing</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="gap"></div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-shopping-cart icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Ecommerce Solution</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">SEO &amp; Solution</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                </div>
            </div>            

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-globe icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Bootstrap</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--/Services-->

<section id="recent-works">
    <div class="container">
        <div class="center">
            <h3>Our Recent Works</h3>
            <p class="lead">Look at some of the recent projects we have completed for our valuble clients</p>
        </div>  
        <div class="gap"></div>
        <ul class="gallery col-4">
            <!--Item 1-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/portfolio/thumb/item1.jpg">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-1"><i class="icon-eye-open"></i></a><a href="#"><i class="icon-link"></i></a>                          
                    </div>
                </div>
                <div class="desc">
                    <h5>Lorem ipsum dolor sit amet</h5>
                </div>
                <div id="modal-1" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/portfolio/full/item1.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>                 
            </li>
            <!--/Item 1--> 

            <!--Item 2-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/portfolio/thumb/item2.jpg">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-1"><i class="icon-eye-open"></i></a><a href="#"><i class="icon-link"></i></a>                                
                    </div>
                </div>
                <div class="desc">
                    <h5>Lorem ipsum dolor sit amet</h5>
                </div>
                <div id="modal-1" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/portfolio/full/item2.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>                 
            </li>
            <!--/Item 2-->

            <!--Item 3-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/portfolio/thumb/item3.jpg">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-3"><i class="icon-eye-open"></i></a><a href="#"><i class="icon-link"></i></a>                                
                    </div>
                </div>
                <div class="desc">
                    <h5>Lorem ipsum dolor sit amet</h5>
                </div>
                <div id="modal-3" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/portfolio/full/item3.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>                 
            </li>
            <!--/Item 3--> 

            <!--Item 4-->
            <li>
                <div class="preview">
                    <img alt=" " src="images/portfolio/thumb/item4.jpg">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-4"><i class="icon-eye-open"></i></a><a href="#"><i class="icon-link"></i></a>                                
                    </div>
                </div>
                <div class="desc">
                    <h5>Lorem ipsum dolor sit amet</h5>
                </div>
                <div id="modal-4" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/portfolio/full/item4.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>                 
            </li>
            <!--/Item 4-->               

        </ul>
    </div>

</section>

<section id="clients" class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="span2">
                <div class="clearfix">
                    <h4 class="pull-left">OUR PARTNERS</h4>
                    <div class="pull-right">
                        <a class="prev" href="#myCarousel" data-slide="prev"><i class="icon-angle-left icon-large"></i></a> <a class="next" href="#myCarousel" data-slide="next"><i class="icon-angle-right icon-large"></i></a>
                    </div>
                </div>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            </div>
            <div class="span10">
                <div id="myCarousel" class="carousel slide clients">
                  <!-- Carousel items -->
                  <div class="carousel-inner">
                    <div class="active item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                                <li class="span3"><a href="#"><img src="images/sample/clients/client1.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client2.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client3.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client4.png"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                                <li class="span3"><a href="#"><img src="images/sample/clients/client4.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client3.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client2.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client1.png"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                                <li class="span3"><a href="#"><img src="images/sample/clients/client1.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client2.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client3.png"></a></li>
                                <li class="span3"><a href="#"><img src="images/sample/clients/client4.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Carousel items -->

            </div>
        </div>
    </div>
</div>
</section>

<!-- Call Footer -->
<?php include_once("php_includes/footer.php"); ?>

<!-- Call Login -->
<?php include_once("php_includes/login.php"); ?>


<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- Required javascript files for Slider -->
<script src="js/jquery.ba-cond.min.js"></script>
<script src="js/jquery.slitslider.js"></script>
<!-- /Required javascript files for Slider -->

<!-- SL Slider -->
<script type="text/javascript"> 
$(function() {
    var Page = (function() {

        var $navArrows = $( '#nav-arrows' ),
        slitslider = $( '#slider' ).slitslider( {
            autoplay : true
        } ),

        init = function() {
            initEvents();
        },
        initEvents = function() {
            $navArrows.children( ':last' ).on( 'click', function() {
                slitslider.next();
                return false;
            });

            $navArrows.children( ':first' ).on( 'click', function() {
                slitslider.previous();
                return false;
            });
        };

        return { init : init };

    })();

    Page.init();
});
</script>
<!-- /SL Slider -->

    <script src="js/ajax.js"></script>
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
		
		var ajax = ajaxObj("POST", "index.php");
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