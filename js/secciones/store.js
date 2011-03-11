// JavaScript Document
$().ready(function(){			   
/*******************************************************
*					VISUALIZAR IMAGENES				   *
********************************************************/
	$("a.grupo_productos").fancybox({
            'transitionIn'	:	'elastic',
            'transitionOut'	:	'elastic',
            'speedIn'		:	600,
            'speedOut'		:	200,
            'overlayShow'	:	false,
            'type' : 'image'
    });
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
        orderColumn();
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
                    //todo: ver si funciona correctamente
                    /*$("a.grupo_productos").fancybox({
                        'transitionIn'	:	'elastic',
                        'transitionOut'	:	'elastic',
                        'speedIn'		:	600,
                        'speedOut'		:	200,
                        'overlayShow'	:	false,
                        'type' : 'image'
                    });*/ 
                    
                }
        });
    }
//function orderColumn(){
    /*******************************************************
    *                                       ALTO COLUMNA                                       *
    ********************************************************/
    /*if($("#lateral_izquierdo").height()>$("div.contenido").height())
    {
            $("div.contenido").height($("#lateral_izquierdo").height());
    }*/
//}
