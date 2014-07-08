<?php
	include_once("../php_includes/check_login_status.php");
	$userid =  $_SESSION['userid'];
	$doc_id = $_GET["docid"];
	
	$sql = "SELECT * FROM document WHERE doc_id = $doc_id and userid = $userid";
	$result = mysqli_query($db_conx, $sql);
	
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
    <link rel="stylesheet" type="text/css" href="<?php echo $row["resume_style"]; ?>" media="all" />
</head>
<body>
    <div id="doc" class="yui-t7">
        <div id="inner">
        <section id="header">
        	<?php echo $row["header"]; ?>
        </section>
		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">
                
                	<section id="profile">
                		<?php echo $row["profile"]; ?>
                    </section>
                    
                    <section id="skills">
                    <?php echo $row["skills"]; ?>
                    </section>
                    
                    <section id="experience">
                    <?php echo $row["experience"]; ?>
                    </section>
                    
                    <section id="education">
                    <?php echo $row["education"]; ?>
        			</section>
        
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