// JavaScript Document

$().ready(function(){
/*******************************************************
*					ALTO COLUMNA					   *
********************************************************/
if($("#lateral_izquierdo").height()>$("div.contenido").height())
{
	$("div.contenido").height($("#lateral_izquierdo").height());
}
});
