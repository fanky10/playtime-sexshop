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