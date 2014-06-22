  $(document).ready(function() {
	  //Date Picker
	  $("#chkCurrent").click(function() {
		  if($("#chkCurrent").is(':checked'))  { 	
			  $("#to").val("");
			  $("#to").attr("disabled", true);
		  }
		  else{
			  $("#to").attr("disabled", false);
		  }
	  });
	  
	   $( "#from" ).datepicker({
		  defaultDate: "+1w",
		  changeMonth: true,
		  changeYear: true,
		  numberOfMonths: 1,
		  onClose: function( selectedDate ) {
			  $( "#to" ).datepicker( "option", "minDate", selectedDate );
		  }
	  });
	  
	  $( "#to" ).datepicker({
		  defaultDate: "+1w",
		  changeMonth: true,
		  changeYear: true,
		  numberOfMonths: 1,
		  onClose: function( selectedDate ) {
			  $( "#from" ).datepicker( "option", "maxDate", selectedDate );
		  }
	  });
	  
	  $("#btnAdd").click(function(){
		  var employer = $("#txtEmployer").val();
		  var jobtitle = $("#txtJobTitle").val();
		  var jobdesc = $("#txtJobDesc").val();
		  var myid = Math.floor( Math.random()*99999 );
		  
		  //Validate Form first
		  $("#frmExperience").validate({
			rules:{
				txtEmployer:{
					required: true,
				},
				txtJobTitle:{
					required: true,	
				},
				txtJobDesc:{
					required: true,	
				},
				from:{
					required: true,	
				},
				to:{
					required: true,	
				}
			}
		  });
		  
		  if($("#frmExperience").valid()){
			  //Get Date
			  var obj1 = new Date($( "#from" ).val());
			  var obj2 = new Date($( "#to" ).val());
			  
			  var dateFrom = obj1.toString("MMMM yyyy");
			  if($("#chkCurrent").is(':checked'))  { 
				  var dateTo = "Current";
			  }else{
				  var dateTo = obj2.toString("MMMM yyyy");
			  }

			  
			  //Display
			  $("#preview ul.sortable-item").append("<li>  <ul class='sort-child' id="+myid+"><li>"+employer+"<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li><li> <h4>"+dateFrom +" - " + dateTo +" </h4> </li> <li>"+jobtitle+"</li>  <li> "+jobdesc+" </li></ul>  </li>")
		  
		  }//End of validation
		  
		  clearFields($(this));	//Clear fields -- Main.js function
		  
	  });
	  
	  $("#btnNext").click(function() {
		  $('#preview h2').remove();
		  var experienceData =  $("#preview").html();
		  
		  var experience = [];
		  
		  $("#preview ul.sortable-item ul").each(function() {
            var current = $(this);
			experience += "<ul>"+current.html()+"</ul>";
          });
		  
		  var content = experience.replace(/<img[^>]*>/gi,"");
		  var data = "experience="+content+"&hdnflag2=true&experienceData="+experienceData;
		  $.ajax({
			  type: "POST",
			  url: "experience.php",
			  data: data,
			  cache: false,
			  success:  function(data){
				  // getServername() function from main.js
				  window.location = getServername() + "/build/education.php";
			  }
		  });
	  });
	  
	  $("#btnPrevious").click(function() {
        	window.location = getServername() + "/build/skills.php";
      });
	  
	  //Mouse over skills update and delete function
	  
	  $(document).on('mouseover','#preview ul.sort-child',function(){
		  $(this).css("background-color","#F2FF7A");
		  
		  $( ".sortable-item" ).sortable();
		  
		  var me = $(this).get(0).id;
		  var del = "#"+me;
		  //alert(me);
		  
		  $(del+" .delete_btn").click(function() {
			  $(del).remove();
		  });
		  
		  $(del+" .edit_btn").click(function() {
			  
			  //Init Date Picker
			  
			  $("#chkEditCurrent").click(function() {
				  if($("#chkEditCurrent").is(':checked'))  { 	
					  $("#toEdit").val("");
					  $("#toEdit").attr("disabled", true);
				  }
				  else{
					  $("#toEdit").attr("disabled", false);
				  }
			  });
			  
			   $( "#fromEdit" ).datepicker({
				  defaultDate: "+1w",
				  changeMonth: true,
				  changeYear: true,
				  numberOfMonths: 1,
				  onClose: function( selectedDate ) {
					  $( "#toEdit" ).datepicker( "option", "minDate", selectedDate );
				  }
			  });
			  
			  $( "#toEdit" ).datepicker({
				  defaultDate: "+1w",
				  changeMonth: true,
				  changeYear: true,
				  numberOfMonths: 1,
				  onClose: function( selectedDate ) {
					  $( "#fromEdit" ).datepicker( "option", "maxDate", selectedDate );
				  }
			  });
			  
			  //Init variables
			  
			  var employerVal = $("ul"+del+" li:first-child").text();
			  var jobTitleVal = $("ul"+del+" li:nth-child(3)").text();
			  var jobDesc =  $("ul"+del+" li:nth-child(4)").text();
			  //alert(skillDescVal);
			  
			  //Insert val to form popup
			  $("#txtEditEmployer").val(employerVal);
			  $("#txtEditJobTitle").val(jobTitleVal);
			  $("#txtEditJobDesc").val(jobDesc);
			  
			  $("#btnUpdate").click(function() {
				  
			  //Validate Form first
			  $("#frmEditExperience").validate({
				rules:{
					txtEditEmployer:{
						required: true,
					},
					txtEditJobTitle:{
						required: true,	
					},
					txtEditJobDesc:{
						required: true,	
					},
					fromEdit:{
						required: true,	
					},
					toEdit:{
						required: true,	
					}
				}
			  });
			  
				  if($("#frmEditExperience").valid()){
				  
					  //Get Date
					  var obj1 = new Date($( "#fromEdit" ).val());
					  var obj2 = new Date($( "#toEdit" ).val());
					  
					  var dateFrom = obj1.toString("MMMM yyyy");
					  if($("#chkEditCurrent").is(':checked'))  { 
						  var dateTo = "Current";
					  }else{
						  var dateTo = obj2.toString("MMMM yyyy");
					  }
					  
					  var title = $("#txtEditEmployer").val() + "<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li>";
					  
					  $("ul"+del+" li:first").html(title);
					  $("ul"+del+" li:nth-child(2)").html("<h4>"+dateFrom+" - "+dateTo+"</h4>");	//Date Hired
					  $("ul"+del+" li:nth-child(3)").text($("#txtEditJobTitle").val());	//Job Title
					  $("ul"+del+" li:nth-child(4)").text($("#txtEditJobDesc").val());	//Job Desc
					  del = null;
					  
					  $('#modal-edit').modal('hide');
				  
				  }//End of validation
			  });
		  });

	  });
	  
	  $(document).on('mouseleave','#preview ul',function(){
		  $(this).css("background-color","#fff");
	  });
	  
  });