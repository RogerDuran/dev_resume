  $(document).ready(function() {
	  //Date variable
	  var dateFromString="";
	  var dateToString="";
	  
	  var hdnContent = ("#hdnContent");
	  $(hdnContent).hide();
	  
	  //Edit popup
	  var hdnEditContent = ("#hdnEditContent");
	  $(hdnEditContent).hide();
	  
	  var toggleEditFlag = 0;
	  
	  $( "#btnEditAddDate" ).click(function() {
		$( "#hdnEditContent" ).slideToggle( "slow" );
		$("#fromEdit").val("");
		$("#toEdit").val("");
		if(toggleEditFlag==0){
			toggleEditFlag = 1;
		}
		else{
			toggleEditFlag = 0;
		}
	  });
	  
	  //<------End of Popup date toggle
	  
	  
	  var toggleFlag = 0;
	  
	  $( "#btnAddDate" ).click(function() {
		$( "#hdnContent" ).slideToggle( "slow" );
		$("#from").val("");
		$("#to").val("");
		if(toggleFlag==0){
			toggleFlag = 1;
		}
		else{
			toggleFlag = 0;
		}
	  });
		  
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
		  var schoolName = $("#txtSchoolName").val();
		  var schoolLocation = $("#txtSchoolLocation").val();
		  var degree = $("#txtDegree").val();
		  var fieldStudy = $("#txtStudyField").val();
		  
		  //Auto generate element ID
		  var myid = Math.floor( Math.random()*99999 );
		  
		  //Validate Form first	  
		  $("#frmEducation").validate({
			rules:{
				txtSchoolName:{
					required: true,
				},
				txtSchoolLocation:{
					required: true,	
				},
				txtDegree:{
					required: true,	
				},
				txtStudyField:{
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
		  
		  if($("#frmEducation").valid()){
			  //Get Date
			  
			  //dateFromString = $( "#from" ).val();
			  //dateToString = $( "#to" ).val();
			  
			  var obj1 = new Date($( "#from" ).val());
			  var obj2 = new Date($( "#to" ).val());
			  
			  var dateFrom = obj1.toString("MMMM yyyy");
			  if($("#chkCurrent").is(':checked'))  { 
				  var dateTo = "Current";
			  }else{
				  var dateTo = obj2.toString("MMMM yyyy");
			  }
			  
			  //Display in div#preview 
			  if(toggleFlag == 1){	//with education date
			  	$("#preview ul.sortable-item").append("<li>  <ul class='sort-child' id="+myid+"><li>"+schoolName+"<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li><li><h4>"+dateFrom +" - " + dateTo +"</h4> </li><li>"+schoolLocation+"</li> <li>"+degree+"</li><li>"+fieldStudy+"</li> </ul>  </li>")
			  }
			  else{					//without education date
			  	$("#preview ul.sortable-item").append("<li>  <ul class='sort-child' id="+myid+"><li>"+schoolName+"<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li><li style='display:none;'><h4 style='display:none;'>"+dateFrom +" - " + dateTo +"</h4> </li><li>"+schoolLocation+"</li> <li>"+degree+"</li><li>"+fieldStudy+"</li> </ul>  </li>")	  
			  }
		  
		  }//End of validation
		  
		  
		   // <------------------ Reset Values

		   if(toggleFlag==1){
			   toggleFlag = 0;   
			   $(hdnContent).hide();	//Hide date
		   }
		   else{
			   $(hdnContent).hide();	//Hide date
		   }
		   
		   clearFields($(this));	//Clear fields -- Main.js function
		  
	  });
	  
	  $("#btnNext").click(function() {
			$('#preview h2').remove();
			var educationData = $("#preview").html(); 
			var education = [];
			
			$("#preview ul.sortable-item ul").each(function() {
			  var current = $(this);
			  education += "<ul>"+current.html()+"</ul>";
			});
			
			if(education != "")
				var content = education.replace(/<img[^>]*>/gi,"");
				
			var data = "education="+content+"&hdnflag2=true&educationData="+educationData;
			$.ajax({
				type: "POST",
				url: "education.php",
				data: data,
				cache: false,
				success:  function(data){
					// getServername() function from main.js
					window.location = getServername() + "/templates/1/build.php";
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
			  
			  var schoolName = $("ul"+del+" li:nth-child(1)").text();
			  var schoolLocation = $("ul"+del+" li:nth-child(3)").text();
			  var degree =  $("ul"+del+" li:nth-child(4)").text();
			  var studyField =  $("ul"+del+" li:nth-child(5)").text();
			  //alert(degree);
			  
			  //Insert val to form popup
			  $("#txtEditSchoolName").val(schoolName);
			  $("#txtEditSchoolLocation").val(schoolLocation);
			  $("#txtEditDegree option:contains("+degree+")").attr('selected', true);
			  $("#txtEditStudyField").val(studyField);
			  
			  /*
			  //Populate Date
			  $( "#fromEdit" ).val(dateFromString);
			  if($( "#toEdit" ).val() == ""){
				$("#chkEditCurrent").attr('checked','checked');
				$("#toEdit").attr("disabled", true);
			  }
			  else{
				  $("#toEdit").attr("disabled", false);
				  $("#toEdit").val(dateToString);
			  }
			  */
			  
			  $("#btnUpdate").click(function() {
				  //Validate Form first
				  $("#frmEditEducation").validate({
					rules:{
						txtEditSchoolName:{
							required: true,
						},
						txtEditSchoolLocation:{
							required: true,	
						},
						txtEditDegree:{
							required: true,	
						},
						txtEditStudyField:{
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
				  
				  if($("#frmEditEducation").valid()){
				  
					  //Get Date
					  var obj1 = new Date($( "#fromEdit" ).val());
					  var obj2 = new Date($( "#toEdit" ).val());
					  
					  var dateFrom = obj1.toString("MMMM yyyy");
					  if($("#chkEditCurrent").is(':checked'))  { 
						  var dateTo = "Current";
					  }else{
						  var dateTo = obj2.toString("MMMM yyyy");
					  }
					  
					  
					  if(toggleEditFlag==1){
						  var title = $("#txtEditSchoolName").val() + "<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li>";
						  
						  $("ul"+del+" li:nth-child(1)").html(title);
						  $("ul"+del+" li:nth-child(2)").css("display","");
						  $("ul"+del+" li:nth-child(2)").html("<h4>"+dateFrom+" - "+dateTo+"</h4>");	//
						  $("ul"+del+" li:nth-child(3)").text($("#txtEditSchoolLocation").val());	//
						  $("ul"+del+" li:nth-child(4)").text($("#txtEditDegree ").val());	//
						  $("ul"+del+" li:nth-child(5)").text($("#txtEditStudyField").val());
					  }
					  else{
						  var title = $("#txtEditSchoolName").val() + "<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li>";
						  
						  $("ul"+del+" li:nth-child(1)").html(title);
						  $("ul"+del+" li:nth-child(2)").css("display","none");
						  $("ul"+del+" li:nth-child(2)").html("<h4 style='display:none'>"+dateFrom+" - "+dateTo+"</h4>");	//
						  $("ul"+del+" li:nth-child(3)").text($("#txtEditSchoolLocation").val());	//
						  $("ul"+del+" li:nth-child(4)").text($("#txtEditDegree ").val());	//
						  $("ul"+del+" li:nth-child(5)").text($("#txtEditStudyField").val()); 
					  }
					  
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