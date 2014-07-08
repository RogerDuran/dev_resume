jQuery(function($) {

	//Ajax contact
	var form = $('.contact-form');
		form.submit(function () {
			$this = $(this);
			$.post($(this).attr('action'), function(data) {
			$this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
		},'json');
		return false;
	});

	//Goto Top
	$('.gototop').click(function(event) {
		 event.preventDefault();
		 $('html, body').animate({
			 scrollTop: $("body").offset().top
		 }, 500);
	});	
	//End goto top		

});

function _(x){
	return document.getElementById(x);	
}

function ajaxObj( meth, url ) {
	var x = new XMLHttpRequest();
	x.open( meth, url, true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	return x;
}
function ajaxReturn(x){
	if(x.readyState == 4 && x.status== 200){
	   return true;	
	}
}

function clearFields(e){
	e.closest('form').find('input[type=text], textarea').val('');
}

function getServername(){
	var root = location.protocol + '//' + location.host;	
	return root;
}

/*
$(document).ready(function() {

	$(document)[0].oncontextmenu = function() { return false;}
	
			$(document).mousedown(function(e){
			  if( e.button == 2 ) {
				 alert('Sorry, this functionality is disabled');
				 return false;
			   } else {
				 return true;
			  }
	
			});
	});
	

*/

