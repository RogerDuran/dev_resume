<?php
	include_once("../php_includes/check_login_status.php");
	
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
	
	if(isset($_POST['education']) && isset($_SESSION['doc_id'])){
		//Session experience Data for back button
		$_SESSION['educationData'] = $_POST['educationData'];
		
		//Data for skills
		$_SESSION['education'] = $_POST['education'];	
		
		
		//SAVE THE RESUME DATA ON THE DATABASE
		
		//GET THE No. of resume of the user
		$userid = $_SESSION["userid"];
		$sql = "SELECT doc_id from document where userid= $userid";
		$query = mysqli_query($db_conx, $sql); 
		
		$numrows = mysqli_num_rows($query);
		$numrows += 1;
		$name=$_SESSION['firstname']." ".$_SESSION['lastname']." Resume ".$numrows;
		$docid = $_SESSION['doc_id'];
		$resume_style= '<link rel="stylesheet" type="text/css" href="../templates/1/css/style.css" media="all" />';
		$sql = "INSERT INTO document(doc_id,resume_name,body,resume_style,userid,date_created,date_modified) values ($docid,'$name',null,'$resume_style',$userid,now(),now())";
		
		$query = mysqli_query($db_conx, $sql); 
		
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
  <title>Education</title>
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
  
  <link rel="stylesheet" href="../css/ui-lightness/jquery-ui.css">
  
  <style>
  
 	#preview ul.sortable-item{
		margin:0px;
		list-style-type:none;
	}
  
 	#preview ul.sort-child li:first-child{
		line-height: 20px;
		padding: 0px 2px;
		list-style-type: none;
		font-size: 16pt;
		font-weight: bold;
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
	
	#education form{
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
	
	#education .myButton{
		margin-bottom: 45px;
	}

	
	#education ul.sort-child:hover span { font-weight: bold; }
	
	#education ul.sort-child img { display: none; }
	#education ul.sort-child:hover img { display: inline; float: right; margin-left:20px; }
	
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
              <h1>Create Resume - Education</h1>
            </div>
            <div class="span6">
              <ul class="breadcrumb pull-right">
                <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                <li><a href="#">Pages</a> <span class="divider">/</span></li>
                <li class="active">Education</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- / .title -->       
    
      <!-- Career -->
      <section id="education" class="container">
    
        <!-- Start row fluid -->
        <div id="row-fluid"> 
        
           
        <form id="frmEducation" method="post" onSubmit="return false">
            <label for="txtSchoolName">School Name: </label><input type="text" name="txtSchoolName" id="txtSchoolName">
            <label for="txtSchoolLocation">School Location: </label><input type="text" name="txtSchoolLocation" id="txtSchoolLocation">
            
            <label for="txtDegree">Degree: </label>
            
            <select name="txtDegree" id="txtDegree">  
				<?php include_once("../template_degree_list.php"); ?>
            </select>
            
            <label for="txtStudyField">Field of Study: </label><input type="text" name="txtStudyField" id="txtStudyField">
            <br>
            <button id="btnAddDate" class="myButton">Add Date</button>
            <p id="hdnContent" style="width:400px">
                <label for="from">Start Date</label>
                <input type="text" id="from" name="from">
                <label for="to">End Date</label>
                <input type="text" id="to" name="to"> 
                
                <br>
          
            	<input type="checkbox" id="chkCurrent"><label for="chkCurrent" style="display: inline; padding: 10px;">I currently attend here</label>
            
            </p>
            
			<br>
            <input type="button" class="myButton" id="btnAdd" value="Add School">
            <input type="hidden" name="hdnTemplateLocation" id="hdnTemplateLocation" value="<?php echo $_SESSION["template_url"]; ?>"
            <input type="hidden" name="hdnFlag1" id="hdnFlag1" value="True">
            <input type="hidden" name="hdnFlag2" id="hdnFlag2" value="True"> <br>
            
        </form>
        
        	<!-- Modal Edit Popup  -->
            <div id="modal-edit" class="modal hide fade">
                <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                <div class="modal-body">
                	<h2> Update Education Info </h2>
                        <form id="frmEditEducation" method="post" onSubmit="return false">
                            <label for="txtEditSchoolName">School Name: </label><input type="text" name="txtEditSchoolName" id="txtEditSchoolName">
                            <label for="txtEditSchoolLocation">School Location: </label><input type="text" name="txtEditSchoolLocation" id="txtEditSchoolLocation">
                            
                            <label for="txtEditDegree">Degree: </label>
                            
                            <select name="txtEditDegree" id="txtEditDegree">  
                                <option value="-1">Select...</option>
                                <option value="High School Diploma">High School Diploma</option>
                                <option value="GED">GED</option>
                                <option value="0">------------------------------------------------</option>
                                <option value="Associate of Arts">Associate of Arts</option>
                                <option value="Associate of Science">Associate of Science</option>
                                <option value="Associate of Applied Science">Associate of Applied Science</option>
                                <option value="0">------------------------------------------------</option>
                                <option value="Bachelor of Arts">Bachelor of Arts</option>
                                <option value="Bachelor of Science">Bachelor of Science</option>
                                <option value="BBA">BBA</option>
                                <option value="0">------------------------------------------------</option>
                                <option value="Master of Arts">Master of Arts</option>
                                <option value="Master of Science">Master of Science</option>
                                <option value="MBA">MBA</option>
                                <option value="0">------------------------------------------------</option>
                                <option value="JD">J.D.</option>
                                <option value="MD">M.D.</option>
                                <option value="PHD">Ph.D.</option>
                                <option value="0">------------------------------------------------</option>
                                <option value="-3">Enter your degree</option>
                                <option value="0">------------------------------------------------</option>
                            </select>
                            
                            <label for="txtEditStudyField">Field of Study: </label><input type="text" name="txtEditStudyField" id="txtEditStudyField">
                            <br>
                            <button id="btnEditAddDate" class="myButton">Add Date</button>
							<p id="hdnEditContent" style="width:400px">
                                <label for="fromEdit">Start Date</label>
                                <input type="text" id="fromEdit" name="fromEdit">
                                <label for="toEdit">End Date</label>
                                <input type="text" id="toEdit" name="toEdit"> 
                            </p>
                        
                            <br>
                            <input type="checkbox" id="chkEditCurrent"><label for="chkEditCurrent" style="display: inline; padding: 10px;">I currently attend here</label>
                            
                            <br>
                            <br>
                            <input type="button" class="myButton" id="btnUpdate" value="Save">
                      	</form>
                </div>
            </div>  
            
       		<!-- Preview -->            
            <?php if(isset($_SESSION['educationData'])){ ?>
        		<div id="preview" class="previewWindow">
                	<h2> Education </h2><?php echo $_SESSION['educationData']?>
                </div>
			<?php }else{ ?>
				<div id="preview">
                	<h2> Education </h2>
                    <ul class="sortable-item">
                
                	</ul>
                </div>
			<?php } ?>
            <!-- End of Preview -->
             <div class="prevNextButton">
                <button id="btnPrevious">GO BACK</button>
                <button id="btnNext">SAVE & NEXT</button>
             </div>
         </div>
     
         <!-- End row fluid -->
         <p>&nbsp;</p>
        
        </section>
        <!-- /Career -->

        
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
    <script src="../js/education.js"></script>


    </body>
</html>