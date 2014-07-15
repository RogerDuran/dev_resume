<?php
	include_once("../php_includes/check_login_status.php");
	$userid =  $_SESSION['userid'];
	
	/* GET RESUME */
	if(isset($_POST["resumeFlag"])){
	  $rows = array();	

	  $sql = "SELECT * FROM document WHERE userid = $userid ";
	  $result = mysqli_query($db_conx, $sql);
	  
	  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		  $rows[] = $row["resume_name"];
	  }
	  echo json_encode($rows);
	  
	  exit();

	}
	
	if(isset($_POST["selectedData"])){
		$resume_name = $_POST["selectedData"];
		$sql = "SELECT * FROM document WHERE resume_name ='$resume_name' and userid = $userid ";
		$result = mysqli_query($db_conx, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		$doc_id = $row["doc_id"];
		echo $doc_id;
		
		exit();
	}
	
	if(isset($_POST["selectedDataDel"])){
		$resume_name = $_POST["selectedDataDel"];
		
		$sql = "DELETE FROM document WHERE resume_name ='$resume_name' and userid = $userid ";
		$result = mysqli_query($db_conx, $sql);

		exit();
	}
	
	if(isset($_POST["selectedDataRename"]) && isset($_POST["newResumeName"])){
		$resume_name = $_POST["selectedDataRename"];
		$newName =  $_POST["newResumeName"];
		$isExist =false;

		$sql = "SELECT * FROM document WHERE resume_name ='$newName' and userid = $userid ";
		$result = mysqli_query($db_conx, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		if($row_cnt >0)
			$isExist = true;
		else
			$isExist = false;
			
		//If exist
		if($isExist){
			echo "exist";
			exit();
		}
		else{
			
			//GET document ID first
			$sql = "SELECT * FROM document WHERE resume_name ='$resume_name' and userid = $userid ";
		    $result = mysqli_query($db_conx, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$docid = $row["doc_id"];
			
			//Update Resume
			
			$sql = "UPDATE document SET resume_name ='$newName' WHERE doc_id = $docid AND userid = $userid ";
			$result = mysqli_query($db_conx, $sql);
			exit();
		}

		
	}
	
	if(isset($_POST["selectedDataDuplicate"]) && isset($_POST["newDuplicateResumeName"])){
		$resume_name = $_POST["selectedDataDuplicate"];
		$newName =  $_POST["newDuplicateResumeName"];
		$isExist =false;
		
		$sql = "SELECT * FROM document WHERE resume_name ='$newName' and userid = $userid ";
		$result = mysqli_query($db_conx, $sql);
		$row_cnt = mysqli_num_rows($result);
		
		if($row_cnt >0)
			$isExist = true;
		else
			$isExist = false;
			
		//If exist
		if($isExist){
			echo "exist";
			exit();
		}
		else{
			//GET document ID first
			$sql = "SELECT * FROM document WHERE resume_name ='$resume_name' and userid = $userid ";
		    $result = mysqli_query($db_conx, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			
			//Get each column
			$docid = $row["doc_id"];
			$body = $row["body"];
			$resume_style = $row["resume_style"];
			
			
			//Duplicate Resume
			$sql = "INSERT INTO document(resume_name,body,resume_style,userid,date_created,date_modified) values( '$newName','$body','$resume_style',$userid,now(),now() )";
			$result = mysqli_query($db_conx, $sql);
			
			//Update Resume Name after duplicate
			//$sql = "UPDATE document SET resume_name = '$newName' WHERE  doc_id = $docid AND userid = $userid";
			//$result = mysqli_query($db_conx, $sql);
			
			exit();
		}
		
	}
	
	// Initialize any variables that the page might echo
	$u = "";
	$sex = "Male";
	$userlevel = "";
	$country = "";
	$joindate = "";
	$lastsession = "";
	// Make sure the _GET username is set, and sanitize it
	if(isset($_GET["u"]) && isset($_SESSION['username']) ){
		$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
		$_SESSION['logged'] = $u;
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
  <title>Profile</title>
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
   section#profile select{
		width: 200px;	   
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
                <li class="active">User</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- / .title -->       
    
      <!-- Career -->
      <section id="profile" class="container">
    
         <!-- Start row fluid -->
         <div class="row-fluid"> 
            <h3>Resume</h3>
         	<div id="resumePreview">    
                <select id="optResume">
                </select> 
                
                <div id="resumePreviewWindow">
                
                </div>
            </div>
            <div id="resumeButton">
            	<h4>FULL Access - Upgrade for instant access to these features </h4>
                <button class="myButton">Download</button>
                <button class="myButton">Print</button>
                <button class="myButton">Email</button>
                <br>
                
                <h4>FREE Access</h4>
                <button id="preview" class="myButton">Preview</button>
                <button class="myButton">Edit</button>
                <button id="create" class="myButton">Create New Resume</button>
                <button class="myButton">Create Cover Letter</button>
                <br>
                <button id="duplicate" class="myButton">Duplicate</button>
                <button id="delete" class="myButton">Delete</button>
                <button id="rename" class="myButton">Rename Resume</button>
                <button class="myButton">Share</button>
            </div>

         </div>
         <!-- End row fluid -->
         
         <p>&nbsp;</p>
        
        </section>
        <!-- /Career -->
        
        <!-- Call Footer -->
        <?php include_once("../php_includes/footer.php"); ?>
        
        <!-- Delete Modal-->
        <div class="modal hide fade in" id="deleteForm" aria-hidden="false">
          <div class="modal-header">
            <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
            <h3>Do you really want to delete the the selected Resume?</h3>
          </div>
          
           <div class="modal-body">
           		<button id="deleteResume" class="myButton">YES</button>
                <button id="cancelDelete" class="myButton">NO</button>
           </div>
           <!--/Modal Body-->
        </div>    
        <!--  /Delete Modal -->  
        
        <!-- Rename Modal-->
        <div class="modal hide fade in" id="renameForm" aria-hidden="false">
          <div class="modal-header">
            <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
            <h3>Rename Resume</h3>
          </div>
          
           <div class="modal-body">
           		<input id="txtResumeName" type="text">
                <div id="resumeRenameError" style="display:none;color:red"><p>The resume name already exist</p><br></div>
           		<button id="renameResume" class="myButton">Save</button>
                <button id="cancelRename" class="myButton">Cancel</button>
           </div>
           <!--/Rename Body-->
        </div>    
        <!--  /Rename Modal -->   
        
        <!-- Duplicate Modal-->
        <div class="modal hide fade in" id="duplicateForm" aria-hidden="false">
          <div class="modal-header">
            <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
            <h3> What do you want to name your duplicate resume? </h3>
          </div>
          
           <div class="modal-body">
           		<input id="txtResumeDuplicateName" type="text">
                <div id="resumeDuplicateError" style="display:none;color:red"><p>The resume name already exist</p><br></div>
           		<button id="renameDuplicate" class="myButton">Save</button>
                <button id="cancelDuplicate" class="myButton">Cancel</button>
           </div>
           <!--/Duplicate Body-->
        </div>    
        <!--  /Duplicate Modal -->   
        
        <!-- Call Login -->
		<?php include_once("../php_includes/login.php"); ?>

	<script src="../js/vendor/jquery-1.9.1.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/jquery-ui-1.10.4.min.js"></script>
    <script>
		$(document).ready(function() {
            initialize();
			
			var selectedItem = "";
			var data = "";
			
			//When preview button was clicked
			$("#preview").click(function() {
			  selectedItem = $( "#optResume option:selected" ).text();
			  data = "selectedData="+selectedItem;
			  $.ajax({
				  type: "POST",
				  url: "user.php",
				  data: data,
				  cache: false,
				  success:  function(data){
					  // getServername() function from main.js
					  window.location = getServername() + "/templates/view.php?docid="+data;
				  }
			  }); 
			});
			
			//When Create resume button was clicked
			$("#create").click(function() {
				window.location = getServername() + "/templates/choose.php";
			});
			
			//When Delete button was clicked
			$("#delete").click(function() {
				$("#deleteForm").modal("show");

				$("#deleteResume").click(function() {
					selectedItem = $( "#optResume option:selected" ).text();
				    data = "selectedDataDel="+selectedItem;
					$.ajax({
						type: "POST",
						url: "user.php",
						data: data,
						cache: false,
						success:  function(data){
							$("#deleteForm").modal("hide");
							getResumes();
						}
					}); 
                });
				
				$("#cancelDelete").click(function() {
                    $("#deleteForm").modal("hide");
                });
				
			});
			
			//When Rename button was clicked
			$("#rename").click(function() {
				$("#resumeRenameError").css("display","none");	
                $("#renameForm").modal("show");
				
				selectedItem = $( "#optResume option:selected" ).text();
				$("#txtResumeName").val(selectedItem);
				
				$("#renameResume").click(function() {
					var newResumeName = $("#txtResumeName").val();
				    data = "selectedDataRename="+selectedItem+"&newResumeName="+newResumeName;
					$.ajax({
						type: "POST",
						url: "user.php",
						data: data,
						cache: false,
						success:  function(data){
							if(data == "exist"){
								$("#resumeRenameError").css("display","inline");	
							}
							else{
								$("#renameForm").modal("hide");
								window.location.reload();
							}
						}
					}); 
                });
				
				$("#cancelRename").click(function() {
                    $("#renameForm").modal("hide");
                });
            });
			
			//When Duplicate button was clicked
			$("#duplicate").click(function() {
			  $("#resumeDuplicateError").css("display","none");	
			  selectedItem = $( "#optResume option:selected" ).text();
			  var selectedItemDisplay = "Copy of " + $( "#optResume option:selected" ).text();
			  
			  $("#txtResumeDuplicateName").val(selectedItemDisplay);
			  
			  var newDuplicateResumeName = $("#txtResumeDuplicateName").val();
			  data = "selectedDataDuplicate="+selectedItem+"&newDuplicateResumeName="+newDuplicateResumeName;
			  
			  $("#duplicateForm").modal("show");
			  
			  
			  $("#renameDuplicate").click(function() {
				  $.ajax({
					  type: "POST",
					  url: "user.php",
					  data: data,
					  cache: false,
					  success:  function(data){
						  if(data == "exist"){
							  $("#resumeDuplicateError").css("display","inline");	
						  }
						  else{
							  $("#duplicateForm").modal("hide");
							  window.location.reload();
						  }
					  }
				  });  
			  });	  
			  
			  $("#cancelDuplicate").click(function() {
				  $("#duplicateForm").modal("hide");
			  });
			  
            });
			
        }); //<-------------- End of document ready
		
		function initialize(){
			getResumes();
		}
		
		function getResumes(){
		  var data = "resumeFlag=true";
		  $.ajax({
			  type: "POST",
			  url: "user.php",
			  data: data,
			  cache: false,
			  success:  function(data){
				//Populate select tag
				var response=JSON.parse(data);

				var select= '<select>';
				var option = '';
				$.each(response, function(index, value) {
					option += '<option>' + value + '</option>';
				});
				select = select+option+'</select>';
				$('#optResume').html(select);

			  }
		  });
		}
	</script>


    </body>
</html>


