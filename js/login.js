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
	  
	  var ajax = ajaxObj("POST", "../index.php");
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