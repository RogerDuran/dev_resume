$(document).ready(function() {		
		clearFields();
		initialize();
		validateForm();
		//checkusername();
		//checkemail();
    });
	
	var agreement = false;
	
	function clearFields(){
		 $("#signupform").trigger('reset');
	}
	
	function initialize(){
		$("#signupbtn").click( function()
			{
				if($("#signupform").valid()){
					signup();
				}
			}
		)
	
		
		$("#username").keyup( function()
			{
				restrict('username');
			}
		)
		
		$("#username").blur( function()
			{
				checkusername();
			}
		)
		
		$("#email").blur( function()
			{
				checkemail();
			}
		)
		
		$("#termsAgree").click(function() {
            agreement = true;
			$("#terms").modal("hide");
        });
		
		$("#termsDisagree").click(function() {
            agreement = false;
			$("#terms").modal("hide");
        });
	}
	
	function validateForm(){
		$("#signupform").validate({
			rules:{
				username: {
					required: true,
					maxlength:16,	
					required: function(){
						if($("#username").val() == ""){
							$("#unamestatus").hide();	
						}else{
							$("#unamestatus").show();
						}
						
					}
				},
				email: {
					required: true,
					maxlength:88,
					email: true
				},
				pass1:{
					required: true,
					maxlength:16,
				},				
				pass2:{
					required: true,
					maxlength:16,
					equalTo: "#pass1"
				},
				gender:{
					required: true,
				},
				country:{
					required: true,
				}
			}
		});
		
	}
	
	
    function restrict(elem){
		var tf = _(elem);
		var rx = new RegExp;
		if(elem == "email"){
			rx = /[' "]/gi;
		} else if(elem == "username"){
			rx = /[^a-z0-9]/gi;
		}
		tf.value = tf.value.replace(rx, "");
    }
    function emptyElement(x){
        _(x).innerHTML = "";
    }
	
    function checkusername(){
        var u = _("username").value;
        if(u != ""){
        //_("unamestatus").innerHTML = 'checking ...';
            var ajax = ajaxObj("POST", "signup.php");
            ajax.onreadystatechange = function() {
            if(ajaxReturn(ajax) == true) {
                //_("unamestatus").innerHTML = ajax.responseText;
				if(ajax.responseText == "available"){
					$("#statusNot").css("display","none");
					$("#statusOk").css("display","inline");
				}
				else if(ajax.responseText == "taken"){
					$("#statusOk").css("display","none");
					$("#statusNot").css("display","inline");
				}
              }
            }
            ajax.send("usernamecheck="+u);
        }
		else{
			$("#statusOk").css("display","none");
			$("#statusNot").css("display","none");
		}
    }
	
	function checkemail(){
	  var e = $("#email").val();
	  
	  if(e != ""){
		  var data = "emailcheck="+e;
		  $.ajax({
			  type: "POST",
			  url: "signup.php",
			  data: data,
			  cache: false,
			  success:  function(data){
				if(data == "available"){
					$("#statusEmailNot").css("display","none");
					$("#statusEmailOk").css("display","inline");					
				}
				else if(data == "taken"){
					$("#statusEmailOk").css("display","none");
					$("#statusEmailNot").css("display","inline");
				}
				else if (data == "notEmail"){
					$("#statusEmailOk").css("display","none");
					$("#statusEmailNot").css("display","inline");
				}
			  }
		  });
	  }
	  else{
		  $("#statusEmailNot").css("display","none");
		  $("#statusEmailOk").css("display","none");
	  }
	}
    
    function signup(){
        var u = _("username").value;
        var e = _("email").value;
        var p1 = _("pass1").value;
        var p2 = _("pass2").value;
        var c = _("country").value;
        var g = _("gender").value;
        var status = _("status");
        if(u == "" || e == "" || p1 == "" || p2 == "" || c == "" || g == ""){
            status.innerHTML = "Fill out all of the form data";
        } else if(p1 != p2){
            status.innerHTML = "Your password fields do not match";
        } else if(agreement == false){
            status.innerHTML = "Please view the terms of use";
        } else {
            _("signupbtn").style.display = "none";
            status.innerHTML = 'please wait ...';
            var ajax = ajaxObj("POST", "signup.php");
            ajax.onreadystatechange = function() {
               if(ajaxReturn(ajax) == true) {
                   if(ajax.responseText != "signup_success"){
                        status.innerHTML = ajax.responseText;
                        _("signupbtn").style.display = "block";
                    } else {
                        window.scrollTo(0,0);
                    _("signupform").innerHTML = "Hi "+u+", check your email inbox and junk mail box at <u>"+e+"</u> in a moment to complete the sign up process by activating your account. You will not be able to do anything on the site until you successfully activate your account.";
                    }
               }
            }
                    ajax.send("u="+u+"&e="+e+"&p="+p1+"&c="+c+"&g="+g);
        }
    }
    
    function openTerms(){
        	//_("terms").style.display = "block";
            emptyElement("status");
    }
    
    /* function addEvents(){
    _("elemID").addEventListener("click", func, false);
    }
    window.onload = addEvents; */