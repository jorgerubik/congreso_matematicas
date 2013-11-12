$(document).ready(function(){
   

	// Oculto los submenus
	$("#menu ul ").css({display: "none"});
	// Defino que submenus deben estar visibles cuando se pasa el mouse por encima
	$(" #menu li").hover(function(){
	    $(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).slideDown(300);
	    },function(){
	        $(this).find('ul:first').slideUp(300);
    });
});