// JavaScript Document

$().ready(function(){
/*******************************************************
*					ALTO COLUMNA					   *
********************************************************/
	if($("#lateral_izquierdo").height()>$("div.contenido").height())
	{
		$("div.contenido").height($("#lateral_izquierdo").height());
	};
/*******************************************************
*					VISUALIZAR CART					   *
********************************************************/
	$('.carOverview').hide();	
	$('#cart_status').click(function() {		
		$('.carOverview').toggle('slow', function() {
		// Animation complete.
		});
		setTimeout("$('.carOverview').fadeOut('slow');", 5000);
	});
});//end DOCUMENT





