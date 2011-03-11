// JavaScript Document

$().ready(function(){
/*******************************************************
*					ANCHO COLUMNA					   *
********************************************************/
if($("#lateral_izquierdo").height()>$("div.contenido").height())
{
	$("div.contenido").height($("#lateral_izquierdo").height());
}
});
