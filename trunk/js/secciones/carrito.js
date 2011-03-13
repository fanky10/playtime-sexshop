// JavaScript Document
/*******************************************************
*			ACTUALIZACIÓN DE PRODUCTOS				   *
********************************************************/
//recarga la lista del shopingcart segun se hayan modificado o adherido productos
//v1.0 reload result div
//v1.1 reload cart_status div
function reloadListShoppingCart(accion,id_prod,cant_name){
      
    cant =1;
    if(accion=="upd"){
        cant = $('#'+cant_name).val();//value from element id=cartCantidad
    }
//    alert('accion: '+accion+' id_prod: '+id_prod+" cantidad: "+cant);
    $("#result").html("Actualizando datos...");
    $("#cart_status").html("<li id=\"cart\">"+
        "<a href=\"#\">Modificando Datos</a>"+
        "</li>");
    $("#cartOverview").html("");
    page = "cart_handler.php";//nos llamamos a si mismo
    $.ajax( {
            url:page,
            data:"redirect=cart_list.php&action="+accion+"&prod_id="+id_prod+"&qty="+cant,
            asynch: true,
            success: function(msg) {
                $('#result').hide();
                $("#result").html(msg)
                .fadeIn("slow");
                //en cascade para que nos aseguremos que anda todo bien
                //al ser asincrono no se me ocurrio nada mejor x)
                reloadCartLink();
            }
    } );
    
}

function reloadCartLink(){
    $.ajax( {
            url:"cart_handler.php",//llamamos al handler
            data:"action=show_status",//le pedimos el status
            asynch: true,
            success: function(msg) {
                $('#cart_status').hide();
                $("#cart_status").html(msg)
                .fadeIn("slow");
                reloadCartPreview()

            }
    } );
}

function reloadCartPreview(){
    //si esta hidden que la muestre
    $.ajax( {
            url:"cart_preview.php",//llamamos al previewer
            data:"",
            asynch: true,
            success: function(msg) {
                $("#cartOverview").html(msg);
                $('#cartOverview').hide();
            }
    } );
}

