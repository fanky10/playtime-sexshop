// JavaScript Document
$().ready(function(){
/*******************************************************
*					ALTO COLUMNA					   *
********************************************************/
if($("#lateral_izquierdo").height()>$("div.contenido").height())
{
	$("div.contenido").height($("#lateral_izquierdo").height());
}
/*******************************************************
*			VALIDAR FORMULARIO PRODUCTO				   *
********************************************************/
	$("#formProducto").validate();
				   });

/*******************************************************
*			POPUP FACEBOOK	Y TWITTER				   *
********************************************************/
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1,scrollbars=0,location=1,statusbar=0,menubar=0,resizable=0,width=800,height=300,left = 200,top = 250');");
}


$('.carOverview').hide();	
$('#comprar').click(function() {
  $('.carOverview').show();
});

