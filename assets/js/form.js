$(document).ready(function(){
	
	$(".numero").keypress(function (e) {
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
           	return false;
   	});

   	$('form').submit(function(){
		
		$('.form-group.has-error').removeClass('has-error');

   		$.each($('form input'),function(index,value){
   			if($(this).val() == '')
   				$(this).parents('.form-group').addClass('has-error');
   		});

   		if($('.has-error').length > 0)
   			return false;
   	});

});