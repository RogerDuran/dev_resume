<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Beginner templates</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/sl-slide.css">

  <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

  <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="controller/images/ico/favicon.ico">
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
              <h1></h1>
            </div>

          </div>
        </div>
      </section>
      <!-- / .title -->   
      
            <section id="recent-works">
                <div class="container">
                    <div class="center">
                        <h2>Beginner Resume</h2>
                        <p class="lead">Look at some of the recent projects we have completed for our valuble clients</p>
                    </div>  
                    <div class="gap"></div>
                    <ul class="gallery col-4">
                        <!--Item 1-->
                        <li>
                            <div class="preview">
                                <img alt=" " src="../images/portfolio/thumb/item1.jpg">
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
                                    <img src="../images/portfolio/full/item1.jpg" alt=" " width="100%" style="max-height:400px">
                                </div>
                            </div>                 
                        </li>
                        <!--/Item 1--> 
                    </ul>
                </div>
            </section>    
         
         <p>&nbsp;</p>
        
        <!-- Call Footer -->
        <?php include_once("../php_includes/footer.php"); ?>
        
		<?php include_once("../php_includes/login.php"); ?>

	<script src="../js/vendor/jquery-1.9.1.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/jquery-ui-1.10.4.min.js"></script>
    <script src="../js/login.js"></script>

    </body>
</html>