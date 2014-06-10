<?php
	session_start();
	
	if(isset($_POST['hdnFlag1'])){
		//Data for Headers
		$_SESSION['firstname'] = $_POST['txtFirstName'];
		$_SESSION['lastname'] = $_POST['txtLastName'];
		$_SESSION['address'] = $_POST['txtAddress'];
		$_SESSION['city'] = $_POST['txtCity'];
		$_SESSION['state'] = $_POST['txtState'];
		$_SESSION['zip'] = $_POST['txtZip'];
		$_SESSION['phone'] = $_POST['txtPhone'];
		$_SESSION['cellphone'] = $_POST['txtCellPhone'];
		$_SESSION['email'] = $_POST['txtEmail'];

	}
	
	if(isset($_POST['skills'])){
		
		//Data for skills
		$_SESSION['skills'] = $_POST['skills'];	
		echo $_POST['skills'];
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
  <title>Skills</title>
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
  	#preview li:first-child{
		list-style-type: none;
		font-size: 14pt;
	}
	
	#preview li{
		line-height: 20px;
		padding: 0px 2px;	
	}

	#preview{
		height: 300px;
		background-color: #FFF;
		float: left;
		width: 50%;
		color: #000;
		border-radius: 10px;
		border: 1px solid #C0C0C0;
		min-height: 300px;
		height: auto;
	}
	
	#preview h2 {
		font-size: 31.5px;
		border-bottom: 1px solid rgba(144, 144, 144, 1);
		text-align: center;		
	}
	
	#skills form{
		margin: 0px 0px 20px;
		width: 500px;
		float: left;
	}

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
	
	#skills .myButton{
		margin-bottom: 45px;
	}

	
	#skills ul:hover span { font-weight: bold; }
	
	#skills ul img { display: none; }
	#skills ul:hover img { display: inline; float: right; margin-left:20px; }

  </style>
    
    <body>
      <!-- CALL HEADER -->
      <?php include_once("../php_includes/header.php"); ?>
    
      <section class="title">
        <div class="container">
          <div class="row-fluid">
            <div class="span6">
              <h1>Create Resume - What's your skills?</h1>
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
      <section id="skills" class="container">
    
        <!-- Start row fluid -->
        <div id="row-fluid"> 
        
           
        <form id="frmSkills" method="post" onSubmit="return false">
            <label for="txtSkillTitle">Skill title: </label><input type="text" name="txtSkillTitle" id="txtSkillTitle">
            <label for="txtSkill1Desc">Skill Description: </label><textarea rows="5" name="txtSkill1Desc" id="txtSkillDesc"></textarea> <br>
            <input type="button" class="myButton" id="btnAdd" value="Add more Skill">

            <input type="hidden" name="hdnFlag1" id="hdnFlag1" value="True">
            <input type="hidden" name="hdnFlag2" id="hdnFlag2" value="True"> <br>
            <input type="submit" class="myButton" id="btnNext" value="NEXT">
        </form>
        
        	<!-- Modal Edit Popup  -->
            <div id="modal-edit" class="modal hide fade">
                <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                <div class="modal-body">
                	<h2> Update Skill Info </h2>
                    <form id="frmEditSkills" method="post" onSubmit="return false">
                        <label for="txtEditSkillTitle">Skill title: </label><input type="text" name="txtEditSkillTitle" id="txtEditSkillTitle">
                        <label for="txtEditSkillDesc">Skill Description: </label><textarea rows="5" name="txtEditSkillDesc" id="txtEditSkillDesc"></textarea> <br>
                        <input type="button" class="myButton" id="btnUpdate" value="Save">
                        
                    </form>
                </div>
            </div>  
    	
        
       		<!-- Preview -->
        	<div id="preview">
            	<h2> Skills </h2>
            </div>
            <!-- End of Preview -->
        
         </div>
         <!-- End row fluid -->
         
         <p>&nbsp;</p>
        
        </section>
        <!-- /Career -->
        
        <!-- Call Footer -->
        <?php include_once("../php_includes/footer.php"); ?>
        
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

	<script src="../js/vendor/jquery-1.9.1.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/jquery-ui-1.10.4.min.js"></script>
    <script>
		$(document).ready(function() {
			var id = 0;
            $("#btnAdd").click(function(){
				var skilltitle = $("#txtSkillTitle").val();
				var skilldesc = $("#txtSkillDesc").val();
				var myid = id++;
				//Display
				$("#preview").append("<ul class='talent' id="+myid+"><li>"+skilltitle+"<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li> <li>"+skilldesc+"</li></ul>")
				
				//Store in array for resume template
				
			});
			
			$("#btnNext").click(function() {
				$('#preview h2').remove();
				var skills = $("#preview").html();
			    var content = skills.replace(/<img[^>]*>/gi,"");
				

				alert( content );
				var data = "skills="+content+"&hdnflag2=true";
				$.ajax({
					type: "POST",
					url: "skills.php",
					data: data,
					cache: false,
					success:  function(data){
						window.location = "http://dev.resume.kristenclosson.local/templates/1/build.php";
					}
				});
            });
			
			//Mouse over skills update and delete function
			
			$(document).on('mouseover','#preview ul',function(){
				$(this).css("background-color","#F2FF7A");
				
				var me = $(this).get(0).id;
				var del = "#"+me;
				//alert(me);
				
				$(del+" .delete_btn").click(function() {
					$(del).remove();
                });
				
				$(del+" .edit_btn").click(function() {
					var skillTitleVal = $("ul"+del+" li:first").text();
					var skillDescVal = $("ul"+del+" li:nth-child(2)").text();
					//alert(skillDescVal);
					
					//Insert val to form popup
					$("#txtEditSkillTitle").val(skillTitleVal);
					$("#txtEditSkillDesc").val(skillDescVal);
					
					$("#btnUpdate").click(function() {
						
						var title = $("#txtEditSkillTitle").val() + "<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li>";
						
						$("ul"+del+" li:first").html(title);
                        $("ul"+del+" li:nth-child(2)").text($("#txtEditSkillDesc").val());
						del = null;
                    });
                });

			});
			
			$(document).on('mouseleave','#preview ul',function(){
				$(this).css("background-color","#fff");
			});
			
        });
	
	</script>


    </body>
</html>