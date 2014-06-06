  $(document).ready(function() {
	  clearFields();
	  initialize();
  });
  
  function clearFields(){
	  $("#newPassword").val("");
	  $("#new2Password").val("");	
  }
  
  function initialize(){
	  $(function() {
		  $( "#tabs" ).tabs();
		  $( "#tabs" ).tabs().css({'min-height':'600px'});
	  });		
	  
  //---------------------------------------- TAB 1 CODE -----------------------------------	
	  
  //Success Dialog
  function successDialog(e){
	  $("#success_dialog").dialog({
		  buttons:{ 
			  "Okay" : function(){
				  $(this).dialog("close");	
				  $(e).dialog("close");
				  location.reload();
			  }
		  },
		  modal: true,
		  resizable:false,
		  position: "center",
	  });
  }
  
  //Generic Success Dialog
  function genericSuccessDialog(data){
	  $("#success_dialog_placeholder").text(data);
	  $("#success_dialog_generic").dialog({		  
		  buttons:{ 
			  "Okay" : function(){
				  $(this).dialog("close");	
				  location.reload();
			  }
		  },
		  modal: true,
		  resizable:false,
		  position: "center",
	  });
  }

  $("#btnPassword").click(function(){
	  //Validate Form first
	  $("#frmPassword").validate({
		  rules:{
			  newPassword:{
				  required: true,
				  maxlength:16,
			  },
			  new2Password:{
				  required: true,
				  maxlength:16,
				  equalTo: "#newPassword",	
			  }
		  }
	  });
	  $("#password_dialog").dialog({
			buttons:{ 
				"Save" : function(){									 
					var data = "username="+$("#txtUsername").text()+"&newpass="+$("#newPassword").val();
					var that = this;
					
					//If form is valid
					if($("#frmPassword").valid()){
						$.ajax({
							type: "POST",
							url: "save.php",
							data: data,
							cache: false,
							success:  function(data){
							   successDialog(that);
							   clearFields()
							}
						});
					}
				},
				"Cancel" : function(){	
					$(this).dialog("close");
					clearFields();
				}
			},
			closeOnEscape: true,
			modal: true,
			resizable:false,
	  }); // <--------------------------------------- end of password dialog code
  }); 
	  
	  $("#btnGender").click(function(){
		  var gender = $("#optGender").text();
		  $("#frmOptGender option:contains('"+gender+"')").attr('selected', true);		//Set gender on popup
		  
		  //Validate Form first
		  $("#frmGender").validate({
			  rules:{
				  frmOptGender:{
					  required: true,
				  }
			  }
		  });
		  $("#gender_dialog").dialog({
			  buttons:{
				  "Save": function(){
					  var gender = $("#frmOptGender").val();
					  var data = "username="+$("#txtUsername").text()+"&gender="+gender;
					  var that = this;
					  //If form is valid
					  if($("#frmGender").valid()){
						$.ajax({
							type: "POST",
							url: "save.php",
							data: data,
							cache: false,
							success:  function(data){
							   successDialog(that);
							}
						});
					  }
				  },
				  "Cancel": function(){
					  $(this).dialog("close");
				  }
			  },
			closeOnEscape: true,
			modal: true,
			resizable:false,
		  }); // <--------------------------------------- end of gender dialog code
	  });
	  
	  $("#btnEmail").click(function(){
		  var email= $.trim($("#txtEmail").text());
		  $("#inpEmail").val(email);
		  
		  //Validate Form first
		  $("#frmEmail").validate({
			  rules:{
				  inpEmail:{
					  required: true,
					  email: true,
				  }
			  }
		  });
		  $("#email_dialog").dialog({
			  buttons:{
				  "Save": function(){
					  var data = "username="+$("#txtUsername").text()+"&email="+$("#inpEmail").val();
					  var that = this;
					  //If form is valid
					  if($("#frmEmail").valid()){
						$.ajax({
							type: "POST",
							url: "save.php",
							data: data,
							cache: false,
							success:  function(data){
							   //alert(data);
							   successDialog(that);
							}
						});
					  }
				  },
				  "Cancel": function(){
					  $(this).dialog("close");
				  }
			  },
			closeOnEscape: true,
			modal: true,
			resizable:false,
		  }); // <--------------------------------------- end of email dialog code
	  });
	  
	  $("#btnCountry").click(function(){
		  var country = $("#txtCountry").text();
		  $("#optCountry option:contains('"+country+"')").attr('selected', true);		//Set country on popup
		  
		  //Validate Form first
		  $("#frmCountry").validate({
			  rules:{
				  optCountry:{
					  required: true,
				  }
			  }
		  });
		  
		  $("#country_dialog").dialog({
			  buttons:{
				  "Save":function(){
					  var country = $("#optCountry").val();
					  var data = "username="+$("#txtUsername").text()+"&country="+country;
					  var that = this;
					  //If form is valid
					  if($("#frmCountry").valid()){
						$.ajax({
							type: "POST",
							url: "save.php",
							data: data,
							cache: false,
							success:  function(data){
							   //alert(data);
							   successDialog(that);
							}
						});
					  }
				  },
				  "Cancel":function(){
					  $(this).dialog("close");
				  }
			  },
			closeOnEscape: true,
			modal: true,
			resizable:false,
		  });
	  });
	  
  //---------------------------------------- TAB 2 CODE -----------------------------------	
  
	  $("#btnContinueEmailRef").click(function(){

		  var email = $("#txtEmailSubscribe").val();
		  var data = "username="+$("#txtUsername").text()+"&emailAdd="+email;
			
		  //Validate Form first
		  $("#frmNewsletter").validate({
			  rules:{
				  txtEmailSubscribe:{
					  required: true,
					  email: true
				  }
			  }
		  });
		  
		  if($("#frmNewsletter").valid()){
			  $.ajax({
				  type: "POST",
				  url: "../profile/save.php",
				  data: data,
				  cache: false,
				  success:  function(data){
						//alert(data);
						genericSuccessDialog(data);
				  }
			  });
		  }
			
	  });
	  
  }