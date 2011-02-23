<!--
v1.0
lista de productos con footer de paginas
v1.1 hice el ordenamiento (medio choto)
v1.2 me cope mal con ajax x)
-->


<script>
    //este script se ejecuta cuando alguien selecciona un tipo distinto de orden
    function getOrden(id_cat){
        //var id_categoria = 1;
        var order = $('#order').val();//value from element id=order
        //alert('cat: '+id_cat+' order: '+order);
        $("#result").html("Cargando datos...");
        page = "lista_productos.php";//nos llamamos a si mismo
        $.ajax( {//necesito saberlo justo desp. de saber que categoria eligio
                url:page,
                data:"ord="+ order+"&id_cat="+id_cat,
                asynch: true,
                success: function(msg) {
                    $('#result').hide();
                    $("#result").html(msg)
                    .fadeIn("slow");
                }
        } );
    }
    
    //esta funcion se ejecuta cuando alguien hace click en alguna pagina (para no cargar todo nuevamente)
    function loadData(id_cat,nro_pag,order){
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
</script>
<div id="result">
<div class="coleccionProductos">
    <script src="js/jquery-1.5.js" type="text/javascript"></script>
    <script src="js/secciones/store.js" type="text/javascript"></script>

    <?php
        include_once 'datos/productos.php';
        include_once 'datos/categorias.php';
        try{
            //limite por pagina
            $limit = 8; //TODO sacarlo de la configuracion
            // pagina pedida
            $pag = (int) $_GET["pag"];
            
            if ($pag < 1)
            {
               $pag = 1;
            }
            $id_categoria = (int) $_GET["id_cat"];
            if($id_categoria <1){
                $id_categoria = 1;
            }
            $order = (int) $_GET["ord"];
            if($order <0){
                $order = 1;
            }
            //aqui abajo iba el script
            ?>
            
            <?php
            $dCateg = new DataCategorias();
            $oCat = $dCateg->getCategoria($id_categoria);
            echo "<div class=\"ruta\"><a href=\"index.php\">Inicio</a> / <a href=\"tienda.php\">Tienda</a> / ".ucwords(strtolower($oCat->getNombre()))."</div>";
            echo "<h1><span>".ucwords(strtolower($oCat->getNombre()))."</span></h1>";
            ?>
            <?php
            echo "<form action=\"?id_cat=$id_categoria&pag=1\" method=\"GET\" id=\"formOrdenar\">";
            ?>
                <label>Ordenar por:</label>
                <select name="ordenamiento" id="order" onchange="getOrden(<?php echo $id_categoria;?>);">
                    <option selected="selected" value="-1">Seleccionar</option>
                    <option value="0">Nombre</option>
                    <option value="1">Precio</option>
                </select>
            <?php
            echo "</form>";
            ?>
            <?php
            
            //echo "categoria: $id_categoria order: $order <br>";
            $offset = ($pag-1) * $limit;//donde empieza a mostrar
            $dProd = new DataProductos();
            $vProds = $dProd->getProductosImagen($offset,$limit,$id_categoria, $order);//traigo los de prueba no mas
            $total = $dProd->getCountProducts();//el total tiene que 'venir' de la db
            $dProd->closeDB();
            $prod_found = count($vProds);
            for($index=0;$index < $prod_found;$index++){
                $oProducto = $vProds[$index];
                echo "<div class=\"producto\">";//no me importan los ids (??)
                echo "<h4 class=\"prodTitulo\">".$oProducto->getNombre()."</h4>";
                //chequear que el id imagen sea mayor a 0 de otro modo imagen por defecto
                $img_id = $oProducto->getImagen();
                $img_source="images/img_unavailable.jpg";
                if($img_id>0){
                    $img_source="scripts/image_script.php?id_img=$img_id";
                }
                echo "<a class=\"grupo_productos\" rel=\"grupoP\" href=\"$img_source\"><img class=\"prodImagen\" src=\"$img_source\" alt=\"".$oProducto->getNombre()."\" height=\"90\" width=\"90\"/></a>";
                echo "<p class=\"prodInfo\">".$oProducto->getInformacion()." [...]";//substr($oProducto->getInformacion(), 0, 100);;
                echo "<span class=\"prodPrecio\">$".$oProducto->getPrecio()."<a href=\"producto.php?id_prod=".$oProducto->getId_Producto()."\">Ver Detalles</a></span>";
                echo "</p>";
                echo "</div>\n";
            }
        }catch(Exception $ex){
            echo 'Ha ocurrido una exception: '.$ex->getMessage();

        }
     ?>

</div><!--end coleccionProductos-->
<!-- Aqui va el foot de paginacion -->
<div class="paginacion">
 <?php

     $totalPag = ceil($total/$limit);//saco el total de las paginas
     echo "<p class=\"resultado\">Resultados ".($offset+1)." - ".($offset + $prod_found)." de $total</p>";
     echo "<ul>";
     $links = array();
     for( $i=1; $i<=$totalPag ; $i++)//muestro c/una de las paginas
     {
        if($i== $pag){
            //no tendria que hacer nada la pag. seleccionada xD
            //$links [] = "<li><a class=\"paginaSeleccionada\" href=\"?id_cat=$id_categoria&pag=$i&ord=$order\" title=\"\">$i</a></li>";
            $links [] = "<li><a class=\"paginaSeleccionada\" title=\"\">$i</a></li>";
        }else{
            //$links [] = "<li><a href=\"?id_cat=$id_categoria&pag=$i&ord=$order\" title=\"\">$i</a></li>";
            $links [] = "<li><a onclick=\"loadData($id_categoria,$i,$order);\" title=\"\">$i</a></li>";
        }
     }
     echo implode("", $links);
     echo "</ul>";


  ?>
</div>
</div><!-- end of result div-->