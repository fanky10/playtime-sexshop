// JavaScript Document
$().ready(function(){			   
    fix_images();

}); //end document
/*******************************************************
*				ORDENAMIENTO PRODUCTOS				   *
********************************************************/
$('#formOrdenar').submit(function(){return false});//no se envía el form.
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
        //luego que se hizo pelota por el cargando datos...
        fix_columns();
        //ya con todo ordenadito.. si es mas grande eh.. bueno mejor! jajaja
        page = "lista_productos.php";//nos llamamos a si mismo
        $.ajax({
                url:page,
                data:"ord="+ order+"&id_cat="+id_cat+"&pag="+nro_pag,
                asynch: true,
                success: function(msg) {
                    $('#result').hide();
                    $("#result").html(msg)
                    .fadeIn("slow");
                    fix_columns();
                    fix_images();

                }
                
        });
    }

/*******************************************************
*					VISUALIZAR IMAGENES				   *
********************************************************/
/**
 * esta funcion hace un reload a el grupo de productos
 * para forzar a que el script de visualizacion de imagenes
 * tome el custom url como una imagen
 */
    function fix_images(){
	$("a.grupo_productos").fancybox({
            'transitionIn'	:	'elastic',
            'transitionOut'	:	'elastic',
            'speedIn'		:	600,
            'speedOut'		:	200,
            'overlayShow'	:	false,
            'type' : 'image'
        });
    }
    /**
     * esta funcion hace un fix de las columnas ya que cuando se vuelve a llamar con ajax
     * al ordenamiento / pagina se corrompe el alto de la columna
     * ya sea xq el div es mas grande o porque es mas chico y tiene que agrandarlo
     */
    function fix_columns(){
        var result_height = $("#result").height();
        var lateral_height = $("#lateral_izquierdo").height();
        if(lateral_height>result_height){
            $("div.contenido").height($("#lateral_izquierdo").height());
        }else{
            $("div.contenido").height(result_height);
        }
    }