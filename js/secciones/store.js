// JavaScript Document
$().ready(function(){
/*******************************************************
*					ANCHO COLUMNA					   *
********************************************************/
var alturaMax;
//Obtiene la altura máxima de las 2 columnas y almacena el valor en AlturaMax
AlturaMax = Math.max( $("#lateral_izquierdo").height(), $("div.contenido").height() );
//Asigna la propiedad height con el valor de AlturaMax
$("#lateral_izquierdo").height(AlturaMax);
//Asigna la propiedad height con el valor de AlturaMax
$("div.contenido").height(AlturaMax);
/*******************************************************
*					VISUALIZAR IMAGENES				   *
********************************************************/
	$("a.grupo_productos").fancybox({
	'transitionIn'	:	'elastic',
	'transitionOut'	:	'elastic',
	'speedIn'		:	600, 
	'speedOut'		:	300, 
	'overlayShow'	:	false
	});
/*******************************************************
*					VISUALIZAR IMAGENES				   *
********************************************************/
$("select").change(function () {
		alert($( 'select#order option:selected' ).val());
		$('#formOrdenar').submit(); //ACA TE ARREGLAS VOS PARA VER COMO ENVIAS EL VALUE
							 });
});