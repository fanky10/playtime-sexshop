// JavaScript Document

$().ready(function(){
    data_valid();
});
function data_valid(){
 /*******************************************************
*			VALIDAR FORMULARIO CHECKOUT01				   *
********************************************************/
$("#formCheckout01").validate({
	event: "blur",
	rules: {
	'data[User][name]': "required",
        'data[User][surname]': "required",
        'data[User][email]': {required: true, email: true},
        'data[User][phone]': "required",
        'data[User][address]': "required",
        'data[User][city]': "required",
        'data[User][postalc]': "required",
        'data[User][sendzone]': "required",
        'data[User][agree]': "required"
	},
	messages: {
	'data[User][name]': "Por favor ingrese un nombre válido",
	'data[User][surname]': "Por favor ingrese un apellido válido",
        'data[User][email]': "Por favor ingrese un e-mail válido",
        'data[User][phone]': "Por favor ingrese un teléfono válido",
        'data[User][address]': "Por favor ingrese una dirección válida",
        'data[User][city]': "Por favor ingrese una ciudad válida",
        'data[User][postalc]': "Por favor ingrese un código postal válido",
        'data[User][sendzone]': "Por favor ingrese una zona de envío válida",
        'data[User][agree]': "Por favor acepte la política de privacidad"
	},

	debug: true,
	errorElement: "label",
	errorContainer: $("#errores"),
        submitHandler: function(form){

	$.ajax({
		type: "POST",
		url:"client_handler.php?action=add",
		data: "formCheckoutNombre="+$('#formCheckoutNombre').val()+
                    "&formCheckoutApellido="+$('#formCheckoutApellido').val()+
                    "&formCheckoutMail="+$('#formCheckoutMail').val()+
                    "&formCheckoutTel="+$('#formCheckoutTel').val()+
                    "&formCheckoutDireccion="+$('#formCheckoutDireccion').val()+
                    "&formCheckoutCiudad="+$('#formCheckoutCiudad').val()+
                    "&formCheckoutPostal="+$('#formCheckoutPostal').val()+
                    "&formCheckoutSelect="+$('#formCheckoutSelect').val(),
		success: function(msg){
                    location.href = 'checkout02.php';
		}
	});
	}
    });
}
