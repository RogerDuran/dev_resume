  $(document).ready(function() {
	  var id = 0;	
		  
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
		  numberOfMonths: 3,
		  onClose: function( selectedDate ) {
			  $( "#to" ).datepicker( "option", "minDate", selectedDate );
		  }
	  });
	  
	  $( "#to" ).datepicker({
		  defaultDate: "+1w",
		  changeMonth: true,
		  changeYear: true,
		  numberOfMonths: 3,
		  onClose: function( selectedDate ) {
			  $( "#from" ).datepicker( "option", "maxDate", selectedDate );
		  }
	  });
	  
	  $("#btnAdd").click(function(){
		  var schoolName = $("#txtSchoolName").val();
		  var schoolLocation = $("#txtSchoolLocation").val();
		  var degree = $("#txtDegree").val();
		  var fieldStudy = $("#txtStudyField").val();
		  
		  //Auto generate element ID
		  var myid = id++;
		  
		  //Validate Form first
		  /*
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
		  */
		  //if($("#frmExperience").valid()){
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
			  $("#preview ul.sortable-item").append("<li>  <ul class='sort-child' id="+myid+"><li>"+schoolName+"<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li> <li>"+schoolLocation+"</li> <li>"+degree+"</li> <li>"+fieldStudy+"</li> <li>"+dateFrom +" - " + dateTo +" </li> </ul>  </li>")
		  
		  //}//End of validation
		  
	  });
	  
	  $("#btnNext").click(function() {
		  $('#preview h2').remove();
		  var education = [];
		  
		  $("#preview ul.sortable-item ul").each(function() {
            var current = $(this);
			education += "<ul>"+current.html()+"</ul>";
          });
		  
		  
		  var content = education.replace(/<img[^>]*>/gi,"");
		  
		  var data = "education="+content+"&hdnflag2=true";
		  $.ajax({
			  type: "POST",
			  url: "education.php",
			  data: data,
			  cache: false,
			  success:  function(data){
				  window.location = "http://dev.resume.kristenclosson.local/templates/1/build.php";
			  }
		  });
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
				  numberOfMonths: 3,
				  onClose: function( selectedDate ) {
					  $( "#toEdit" ).datepicker( "option", "minDate", selectedDate );
				  }
			  });
			  
			  $( "#toEdit" ).datepicker({
				  defaultDate: "+1w",
				  changeMonth: true,
				  changeYear: true,
				  numberOfMonths: 3,
				  onClose: function( selectedDate ) {
					  $( "#fromEdit" ).datepicker( "option", "maxDate", selectedDate );
				  }
			  });
			  
			  //Init variables
			  
			  var schoolName = $("ul"+del+" li:nth-child(1)").text();
			  var schoolLocation = $("ul"+del+" li:nth-child(2)").text();
			  var degree =  $("ul"+del+" li:nth-child(3)").text();
			  var studyField =  $("ul"+del+" li:nth-child(4)").text();
			  //alert(degree);
			  
			  //Insert val to form popup
			  $("#txtEditSchoolName").val(schoolName);
			  $("#txtEditSchoolLocation").val(schoolLocation);
			  $("#txtEditDegree option:contains("+degree+")").attr('selected', true);
			  $("#txtEditStudyField").val(studyField);
			  
			  $("#btnUpdate").click(function() {
				  
			  //Validate Form first
			  /*$("#frmEditEducation").validate({
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
			  }); */
			  
				  //if($("#frmEditExperience").valid()){
				  
					  //Get Date
					  var obj1 = new Date($( "#fromEdit" ).val());
					  var obj2 = new Date($( "#toEdit" ).val());
					  
					  var dateFrom = obj1.toString("MMMM yyyy");
					  if($("#chkEditCurrent").is(':checked'))  { 
						  var dateTo = "Current";
					  }else{
						  var dateTo = obj2.toString("MMMM yyyy");
					  }
					  
					  var title = $("#txtEditSchoolName").val() + "<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li>";
					  
					  $("ul"+del+" li:nth-child(1)").html(title);
					  $("ul"+del+" li:nth-child(2)").text($("#txtEditSchoolLocation").val());	//
					  $("ul"+del+" li:nth-child(3)").text($("#txtEditDegree ").val());	//
					  $("ul"+del+" li:nth-child(4)").text($("#txtEditStudyField").val());
					  $("ul"+del+" li:nth-child(5)").text(dateFrom+" - "+dateTo);	//
					  del = null;
					  
					  $('#modal-edit').modal('hide');
				  
				  //}//End of validation
			  });
		  });

	  });
	  
	  $(document).on('mouseleave','#preview ul',function(){
		  $(this).css("background-color","#fff");
	  });
	  
  });