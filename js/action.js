// JavaScript Document

         $(document).ready(function(){
  var alturaMax;
 
  //Obtiene la altura máxima de las 2 columnas y almacena el valor en AlturaMax
  AlturaMax = Math.max( $("#lateral_izquierdo").height(), $("div.contenido").height() );
 
  //Asigna la propiedad height con el valor de AlturaMax
  $("#lateral_izquierdo").height(AlturaMax);
 
  //Asigna la propiedad height con el valor de AlturaMax
  $("div.contenido").height(AlturaMax);
  
// Set up Sliders
// **************
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
		  

