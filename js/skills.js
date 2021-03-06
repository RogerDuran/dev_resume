$(document).ready(function() {
  $("#btnAdd").click(function(){
	  var skilltitle = $("#txtSkillTitle").val();
	  var skilldesc = $("#txtSkillDesc").val();
	  var myid = Math.floor( Math.random()*99999 );
	  
	  
	  //Validate Form first
	  $("#frmSkills").validate({
		rules:{
			txtSkillTitle:{
				required: true,
			},
			txtSkillDesc:{
				required: true,	
			}
		}
	  });
	  
	  if($("#frmSkills").valid()){
	  
		  //Display
		  $("#preview").append("<ul class='talent' id="+myid+"><li>"+skilltitle+"<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li> <li>"+skilldesc+"</li></ul>")
	  
	  }  // end of validation
	  
	  clearFields($(this));	//Clear fields -- Main.js function
	  
  });
  
  $("#btnNext").click(function() {
	  $('#preview h2').remove();
	  var skillData =  $("#preview").html();
	  var skills = $("#preview").html();
	  var content = skills.replace(/<img[^>]*>/gi,"");

	  //alert( content );
	  var data = "skills="+content+"&hdnflag2=true&skillData="+skillData;
	  $.ajax({
		  type: "POST",
		  url: "skills.php",
		  data: data,
		  cache: false,
		  success:  function(data){
			  // getServername() function from main.js
			  window.location = getServername() + "/build/experience.php";
		  }
	  });
  });
  
  $("#btnPrevious").click(function() {
		window.location = getServername() + "/build/create.php";
  });
  
  //Mouse over skills update and delete function
  
  $(document).on('mouseover','#preview ul',function(){
	  $(this).css("background-color","#F2FF7A");
	  
	  var me = $(this).get(0).id;
	  var del = "#"+me;
	  //alert(me);
	  
	  $(del+" .delete_btn").click(function() {
		  $(del).remove();
	  });
	  
	  $(del+" .edit_btn").click(function() {
		  var skillTitleVal = $("ul"+del+" li:first").text();
		  var skillDescVal = $("ul"+del+" li:nth-child(2)").text();
		  //alert(skillDescVal);
		  
		  //Insert val to form popup
		  $("#txtEditSkillTitle").val(skillTitleVal);
		  $("#txtEditSkillDesc").val(skillDescVal);
		  
		  $("#btnUpdate").click(function() {
			  
			  //Validate Form first
			  $("#frmEditSkills").validate({
				rules:{
					txtEditSkillTitle:{
						required: true,
					},
					txtEditSkillDesc:{
						required: true,	
					}
				}
			  });
			  
			  if($("#frmEditSkills").valid()){
			  
				  var title = $("#txtEditSkillTitle").val() + "<img class='delete_btn' src='../images/red_cross_mark.png'/><a data-toggle='modal' href='#modal-edit' ><img class='edit_btn' src='../images/edit.png'/></a></li>";
				  
				  $("ul"+del+" li:first").html(title);
				  $("ul"+del+" li:nth-child(2)").text($("#txtEditSkillDesc").val());

				  del = null;
				  $('#modal-edit').modal('hide');
			  
			  } // End of validation
		  });
	  });

  });
  
  $(document).on('mouseleave','#preview ul',function(){
	  $(this).css("background-color","#fff");
  });
  
});