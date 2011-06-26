// JavaScript Document

/*******************************************************
*				ORDENAMIENTO PRODUCTOS				   *
********************************************************/
function cargaProductos(id_cat){
    $("#prod_rs").html("Cargando datos...");
    //ya con todo ordenadito.. si es mas grande eh.. bueno mejor! jajaja
    page = "product_list.php";//nos llamamos a si mismo
    $.ajax({
            url:page,
            data:"cat_selected="+id_cat,
            asynch: true,
            success: function(msg) {
                $('#prod_rs').hide();
                $("#prod_rs").html(msg)
                .fadeIn("slow");

            }

    });
}