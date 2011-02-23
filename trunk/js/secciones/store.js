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
*					VISUALIZAR IMAGENES				   *
********************************************************/
	$("a.grupo_productos").fancybox({
	'transitionIn'	:	'elastic',
	'transitionOut'	:	'elastic',
	'speedIn'		:	600, 
	'speedOut'		:	300, 
	'overlayShow'	:	false
	});

});//end document

/*******************************************************
*				ORDENAMIENTO PRODUCTOS				   *
********************************************************/
$('#formOrdenar').submit(function(){return false}); //no se envía el form.
function loadData(id_cat,nro_pag,order){
        if(order<0){//es xq fue selecionado desde el select box
            order = $('#order').val();//value from element id=order
        }
        if(nro_pag<1){//por default 1
            nro_pag = 1;
        }
        if(id_cat < 1){
            id_cat = 1;
        }
        //alert('cat: '+id_cat+' order: '+order+' pag: '+nro_pag);
        $("#result").html("Cargando datos...");
        page = "lista_productos.php";//nos llamamos a si mismo
        $.ajax( {
                url:page,
                data:"ord="+ order+"&id_cat="+id_cat+"&pag="+nro_pag,
                asynch: true,
                success: function(msg) {
                    $('#result').hide();
                    $("#result").html(msg)
                    .fadeIn("slow");
                }
        } );
    }

