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
//recarga la lista del shopingcart segun se hayan modificado o adherido productos
function reloadListShoppingCart(accion,id_prod,cant_name){
      
    cant =1;
    if(accion=="upd"){
        cant = $('#'+cant_name).val();//value from element id=cartCantidad
    }
//    alert('accion: '+accion+' id_prod: '+id_prod+" cantidad: "+cant);
    $("#result").html("Actualizando datos...");
    page = "cart_handler.php";//nos llamamos a si mismo
    $.ajax( {
            url:page,
            data:"redirect=cart_list.php&action="+accion+"&prod_id="+id_prod+"&qty="+cant,
            asynch: true,
            success: function(msg) {
                $('#result').hide();
                $("#result").html(msg)
                .fadeIn("slow");
            }
    } );
}

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

