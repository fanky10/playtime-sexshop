<!--
v1.0
de la lista de productos con footer de paginas
-->




<div class="coleccionProductos">

    <?php
        include_once 'datos/productos.php';
        include_once 'datos/categorias.php';
        try{
            //limite por pagina
            $limit = 8; //TODO sacarlo de la configuracion
            // pagina pedida
            $pag = (int) $_GET["pag"];
            $id_categoria = (int) $_GET["id_cat"];
            if ($pag < 1)
            {
               $pag = 1;
            }
            if($id_categoria <1){
                $id_categoria = 1;
            }
            $dCateg = new DataCategorias();
            $oCat = $dCateg->getCategoria($id_categoria);
            echo "<div class=\"ruta\"><a href=\"?\">Inicio</a> / <a href=\"?\">Tienda</a> / ".ucwords(strtolower($oCat->getNombre()))."</div>";
            echo "<h1><span>".ucwords(strtolower($oCat->getNombre()))."</span></h1>";
			/*TODO: 
					*Cortar cantidad de palabras para ver el detalle. Fijarte en el estatico.
					*Agregar el escript de ordenamiento de los productos.
			*/
			
			?>
            <!--TODO implementar esto con un ordenador dentro del metodo getProductosImagen-->
	
            <form action="" method="" id="formOrdenar">
                <label>Ordenar por:</label>
                <select>
                    <option selected="selected">Seleccionar</option>
                    <option>Nombre</option>
                    <option>Precio</option>
                    <option>Fecha</option>
                    <option>SKU</option>
                </select>
            </form>
            <?php
            $offset = ($pag-1) * $limit;//donde empieza a mostrar
            $dProd = new DataProductos();
            $vProds = $dProd->getProductosImagen($offset,$limit,$id_categoria);//traigo los de prueba no mas
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
                echo "<img class=\"prodImagen\" src=\"$img_source\" alt=\"".$oProducto->getNombre()."\" height=\"90\" width=\"90\"/>";
                echo "<p class=\"prodInfo\">".$oProducto->getInformacion();//substr($oProducto->getInformacion(), 0, 100);;
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
            $links [] = "<li><a class=\"paginaSeleccionada\" href=\"?id_cat=$id_categoria&pag=$i\" title=\"\">$i</a></li>";
        }else{
            $links [] = "<li><a href=\"?id_cat=$id_categoria&pag=$i\" title=\"\">$i</a></li>";
        }
     }
     echo implode("", $links);
     echo "</ul>";


  ?>
</div>