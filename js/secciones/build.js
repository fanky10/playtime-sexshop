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
	});
/*******************************************************
*			VALIDAR FORMULARIO PRODUCTO				   *
********************************************************/
	$("#formProducto").submit(function(){return false;});	
	
/*******************************************************
*						RECARGAR PAGINA						   *	
********************************************************/
	$('#aceptar').click(function() {
            // Recargo la p�gina
            location.reload();
        });
});//end DOCUMENT





