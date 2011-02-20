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
*			VALIDAR FORMULARIO CONTACTO				   *
********************************************************/
$("#frmContact").validate({
	event: "blur",
	rules: {
	'data[Contact][name]': "required",
	'data[Contact][recipient]': { required: true, email: true },
	'data[Contact][message]': "required"
	},
	messages: {
	'data[Contact][name]': "Por favor ingrese su nombre",
	'data[Contact][recipient]': "Ingrese una dirección de e-mail válida",
	'data[Contact][message]': "Por favor, ingrese su mensaje o consulta"
	},
	
	debug: true,
	errorElement: "label",
	errorContainer: $("#errores"),
	submitHandler: function(form){
	
	$.ajax({
	
		type: "GET",
		url:"envio.php",
		contentType: "application/x-www-form-urlencoded",
		processData: false,
		data: "nombre="+$('#ContactName').val()+"&email="+$('#ContactRecipient').val()+"&telefono="+$('#ContactPhone').val()+"&comentario="+$('#ContactMessage').val(),
		success: function(msg){
		//if(msg==1){
		$("#mensaje").html("<strong>El mensaje se ha enviado correctamente!</strong>");
		$('#ContactName').val('');
		$('#ContactRecipient').val('');
		$('#ContactPhone').val('');
		$('#ContactMessage').val('');
		//}
		}
	});
	}
});
});
