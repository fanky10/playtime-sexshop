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
});
/*******************************************************
*						SLIDERS HOME				   *
********************************************************/
$().ready(function() {
$('#slider1').anythingSlider({
			startStopped    : false, // If autoPlay is on, this can force it to start stopped
			width           : 550,   
			height          : 200,   
			theme           : 'metallic',
			autoPlayLocked  : true,  // If true, user changing slides will not stop the slideshow
			resumeDelay     : 10000, // Resume slideshow after user interaction, only if autoplayLocked is true (in milliseconds).
			
			startPanel          : 1,         // This sets the initial panel
			hashTags            : true,      // Should links change the hashtag in the URL?
			
			startText           : "Comenzar",   // Start button text
			stopText            : "Frenar",    // Stop button text

			
			onSlideComplete : function(slider){
				// alert('Welcome to Slide #' + slider.currentPage);
			}
});
$('#slider2').anythingSlider({
			startStopped    : false, // If autoPlay is on, this can force it to start stopped
			width           : 550,   
			height          : 200,   
			theme           : 'metallic',
			autoPlayLocked  : true,  // If true, user changing slides will not stop the slideshow
			resumeDelay     : 10000, // Resume slideshow after user interaction, only if autoplayLocked is true (in milliseconds).
			
			startPanel          : 2,         // This sets the initial panel
			hashTags            : true,      // Should links change the hashtag in the URL?
			
			startText           : "Comenzar",   // Start button text
			stopText            : "Frenar",    // Stop button text

			
			onSlideComplete : function(slider){
				// alert('Welcome to Slide #' + slider.currentPage);
			}
});
});
/*******************************************************
*					VISUALIZAR IMAGENES				   *
********************************************************/
$().ready(function() {
				$("a.grupo_productos").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600, 
				'speedOut'		:	300, 
				'overlayShow'	:	false
				});
			});
/*******************************************************
*			VALIDAR FORMULARIO CONTACTO				   *
********************************************************/
$().ready(function() {
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
		//}
		}
	});
	}
});
});
/*******************************************************
*			VALIDAR FORMULARIO PRODUCTO				   *
********************************************************/
$().ready(function() {
	$("#formProducto").validate();
});//END DOCUMENT
		  

