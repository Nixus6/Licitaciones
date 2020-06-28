var esta=0;
$(document).ready(function(){
$('.Menu li:has(ul)').click(function(e){
e.preventDefault();

if ($(this).hasClass('Seleccionado'))
{
$(this).removeClass('Seleccionado');
$(this).children('ul').slideUp();
}else{
	$('.Menu li ul').slideUp();
	$('.Menu li').removeClass('Seleccionado');
	$(this).addClass('Seleccionado');
	$(this).children('ul').slideDown();
}
});

if ($(window).width() < 750) 
{
	$("#Registros").css('width:', '100%');
}

$('.Menu li ul li a').click(function(){
window.location.href = $(this).attr("href");
});

$('.btn-menu').click(function(){	
$('.contenedor').slideToggle();
$('.contenedor').addClass('scroll');

 if (esta == 0) {
	 $("#Registros").animate({width: '100%'});
	//$("#nav").animate({width: '100%'});	

	 esta ++;
}
else if (esta == 1){
	if ($(window).width() < 750) 
	{
	$("#Registros").css('width:', '100%');
	}
	else{
 	 $("#Registros").animate({width: '78%'});
 	// $("#nav").animate({width: '78%'});	
		}	 
 esta--;
}
});
});
