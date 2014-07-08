<!--Header-->
<header class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a id="logo" class="pull-left" href="index.php"></a>
      <div class="nav-collapse collapse pull-right">
        <ul class="nav">
          <li><a href="../index.php">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Resume Templates</a></li>
          <li><a href="#">Contact</a></li>
          <?php 
		  	if(!isset($_SESSION['logged'])){
          		echo '<li class="login"><a data-toggle="modal" href="#loginForm">Login</i></a></li>';
				echo '<li class="register"><a href="../membership/signup.php">REGISTER</a></li>';
		  	}
			
			if(isset($_SESSION['logged']) || isset($isOwner))
		  	{ 
				echo '<li class="login">  <a href="../account/user.php?u='.$_SESSION['logged'].'">Profile</a> </li>'; 
				echo '<li >  <a href="../logout.php">Logout</a> </li>';
			}  
		  
		  
		  ?>
        </ul>        
      </div><!--/.nav-collapse -->
    </div>
  </div>
</header>
<!-- /header -->