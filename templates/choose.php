<?php
	include_once("../php_includes/check_login_status.php");
	
	$sql = "SELECT * FROM templates";
	$result = mysqli_query($db_conx, $sql);
	
	if(isset($_POST["docidFlag"])){
		
		$sql = "SELECT doc_id from document order by doc_id desc limit 1";
		$result = mysqli_query($db_conx, $sql); 
		$numrows = mysqli_num_rows($result);
		
		if($numrows>0){
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$id = $row["doc_id"];
			$id++;
		}else{
			$id = 1;
		}
		
		echo $id;
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
  <title>Choose Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/sl-slide.css">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">

  <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

  <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
  
  <link rel="stylesheet" href="../css/ui-lightness/jquery-ui.css">
  
  <style>

	.myButton {
		-moz-box-shadow: 0px 1px 0px 0px #f0f7fa;
		-webkit-box-shadow: 0px 1px 0px 0px #f0f7fa;
		box-shadow: 0px 1px 0px 0px #f0f7fa;
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
		background:-moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
		background:-webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
		background:-o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
		background:-ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
		background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#33bdef', endColorstr='#019ad2',GradientType=0);
		background-color:#33bdef;
		-moz-border-radius:6px;
		-webkit-border-radius:6px;
		border-radius:6px;
		border:1px solid #057fd0;
		display:inline-block;
		cursor:pointer;
		color:#ffffff;
		font-family:arial;
		font-size:15px;
		font-weight:bold;
		padding:6px 24px;
		text-decoration:none;
		text-shadow:0px -1px 0px #5b6178;
	}
	.myButton:hover {
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #019ad2), color-stop(1, #33bdef));
		background:-moz-linear-gradient(top, #019ad2 5%, #33bdef 100%);
		background:-webkit-linear-gradient(top, #019ad2 5%, #33bdef 100%);
		background:-o-linear-gradient(top, #019ad2 5%, #33bdef 100%);
		background:-ms-linear-gradient(top, #019ad2 5%, #33bdef 100%);
		background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#019ad2', endColorstr='#33bdef',GradientType=0);
		background-color:#019ad2;
	}
	.myButton:active {
		position:relative;
		top:1px;
	}
	
	#education .myButton{
		margin-bottom: 45px;
	}

	
	label.error{
		display:block;
		color:red;	
	}
	
	input.error{
		border: 1px solid red;
	}

  </style>
    
    <body>
      <!-- CALL HEADER -->
      <?php include_once("../php_includes/header.php"); ?>
    
      <section class="title">
        <div class="container">
          <div class="row-fluid">
            <div class="span6">
              <h1>Choose Template</h1>
            </div>
            <div class="span6">
              <ul class="breadcrumb pull-right">
                <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                <li><a href="#">Pages</a> <span class="divider">/</span></li>
                <li class="active">Templates</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- / .title -->       
    
          <!-- Career -->
        <section id="templates" class="container">
    
            <!-- Start row fluid -->
            <div id="row-fluid"> 
                <ul class="bxslider">
                  <?php
				    $id = 0;
				  	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					  echo "<li class='templates'><a id='".$id++."' data='".$row["template_code"]."' href='#'><img src='".$row["thumbnail"]."' title='".$row["template_name"]."' /></a></li>";
				  	}
                  
                  ?>
                  <!--
                  <li><a href="#"><img src="../images/templates/template1.png" title="Template 2"  /></a></li>
                  <li><a href="#"><img src="../images/templates/template1.png" title="Template 3" /></a></li>
                  <li><a href="#"><img src="../images/templates/template1.png" title="Template 4" /></a></li>
                  <li><a href="#"><img src="../images/templates/template1.png" title="Template 5" /></a></li>
                  <li><a href="#"><img src="../images/templates/template1.png" title="Template 6" /></a></li>
                  -->
                </ul>
                
             <div class="prevNextButton">
                <button id="btnNext">PROCEED</button>
             </div>
                
            </div>
            <!-- End row fluid -->
        <p>&nbsp;</p>
        
        </section>
        <!-- /templates -->

        
        <!-- Call Footer -->
        <?php include_once("../php_includes/footer.php"); ?>
        
        <!-- Call Login -->
        <?php include_once("../php_includes/login.php"); ?>
        

	<script src="../js/vendor/jquery-1.9.1.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/jquery.sortable.min.js"></script>
    <script src="../js/jquery.bxslider.min.js"></script>
	<script>
		$(document).ready(function(){
			  var template_code = "";
			  $('.bxslider').bxSlider({
				  minSlides: 1,
				  slideWidth: 300,
				  slideMargin: 25,
				  captions: true
			  });
		  
		  
		 	 $(".bx-wrapper li").click(function() {
				$(".templates").css("border","");
            	$(this).css("border","#FBA400 solid 5px");
				
       		 });
			 
			 $(".bx-wrapper li a").click(function() {
				template_code = $(this).attr("data");
			 });
			 
			 $("#btnNext").click(function() {
				if(template_code==""){
					alert("Please select a template");
				}else{
					var data = "docidFlag=true";
					$.ajax({
						type: "POST",
						url: "choose.php",
						data: data,
						cache: false,
						success:  function(data){
							var doc_id = data;
						   window.location = getServername() + "/build/create.php?tc="+template_code+"&docid="+doc_id;
						}
					});
					
				}
             });
		});
	</script>

    </body>
</html>