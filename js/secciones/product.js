// JavaScript Document
$().ready(function(){
/*******************************************************
*			VALIDAR FORMULARIO PRODUCTO				   *
********************************************************/
	$("#formProducto").submit(function(){return false;});
});

function addProduct(){
    //TODO: mejorar muestra de validaciones
    var cantidad =($('#cantidad').val());
    var id_product = ($('#prod_id').val());
    if(cantidad <=0 || cantidad==""){
    	$("form#formProducto div.formField label.error").show();
    }
    else if(id_product <0){
    	$("form#formProducto div.formField label.error").html("invalid idProd!");
        $("form#formProducto div.formField label.error").show();
    }
    else{
//    $("#result").html("Actualizando datos..."+cantidad + " prod: "+id_product);
    var page = "cart_handler.php?action=add";
    var dataString =  "qty="+cantidad+"&prod_id="+id_product;
    $.ajax({
	type: "POST",
        url:page,
        data:dataString,
        async:true,
        success: function(msg){
            alert('session updated!');
        }
    });
    }
}
/*******************************************************
*			POPUP FACEBOOK	Y TWITTER				   *
********************************************************/
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1,scrollbars=0,location=1,statusbar=0,menubar=0,resizable=0,width=800,height=300,left = 200,top = 250');");
}