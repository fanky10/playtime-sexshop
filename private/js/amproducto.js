// JavaScript Document
$().ready(function(){				   
$("#mensaje").hide();
/*******************************************************
*			VALIDAR FORMULARIO CONTACTO				   *
********************************************************/
$("#frmAMProducto").validate({
	event: "blur",
	rules: {
	'data[Product][name]': "required"
        //,'data[Product][recipient]': { required: true, email: true }
        //,'data[Contact][message]': "required"
	},
	messages: {
	'data[Product][name]': "Por favor ingrese un nombre valido"
	//,'data[Contact][recipient]': "Ingrese una dirección de e-mail válida"
	//,'data[Contact][message]': "Por favor, ingrese su mensaje o consulta"
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
		$("#mensaje").fadeIn('slow');
		$('#ContactName').val('');
		$('#ContactRecipient').val('');
		$('#ContactPhone').val('');
		$('#ContactMessage').val('');
		$('#frmContact').fadeOut('slow');
		//}
		}
	});
	}
});
});
