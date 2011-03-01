// JavaScript Document
/*******************************************************
*			ACTUALIZACIÓN DE PRODUCTOS				   *
********************************************************/
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