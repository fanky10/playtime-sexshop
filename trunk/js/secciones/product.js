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
*			VALIDAR FORMULARIO PRODUCTO				   *
********************************************************/
	$("#formProducto").validate();
				   });