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
*						SLIDERS HOME				   *
********************************************************/

$('#slider1').anythingSlider({
			startStopped    : false,      // If autoPlay is on, this can force it to start stopped
			width           : 550,        
			height          : 200,        
			theme           : 'metallic', 
			autoPlayLocked  : true,       // If true, user changing slides will not stop the slideshow
			resumeDelay     : 10000,      // Resume slideshow after user interaction, only if autoplayLocked is true (in milliseconds).
			delay           : 5000,      // How long between slideshow transitions in AutoPlay mode (in milliseconds)
			                              
			startPanel      : 1,          // This sets the initial panel
			hashTags        : true,       // Should links change the hashtag in the URL?
			buildArrows     : false,      // If true, builds the forwards and backwards buttons
			                              
			startText       : "", // Start button text
			stopText        : "",   // Stop button text
			
			onSlideComplete : function(slider){
				// alert('Welcome to Slide #' + slider.currentPage);
			}
});
});//end document