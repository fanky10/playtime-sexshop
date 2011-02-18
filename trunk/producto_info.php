<?php
    include_once 'datos/productos.php';
    include_once 'datos/categorias.php';
    try{
        $id_producto = (int) $_GET["id_prod"];//id_producto jaja
        if($id_producto <1){
            $id_producto = 1;
        }
        $dProd = new DataProductos();
        $oProd = $dProd->getProducto($id_producto);

        echo "<div class=\"ruta\"><a href=\"index.php\">Inicio</a> / <a href=\"tienda.php\">Tienda</a> / ".$oProd->getNombre()."</div>";
        echo "<h1 class=\"categoria\"><span> ".$oProd->getNombre()." </span></h1>";
        $img_id = $oProd->getImagen();
        $img_source="images/productos/lubricantes/lubricante1.jpg";
        if($img_id>0){
            $img_source="scripts/image_script.php?id_img=$img_id";
        }
        echo "<div class=\"producto detalleProducto\">
		<img class=\"prodImagen\" src=\"$img_source\" title=\"".$oProd->getNombre()."\" height=\"270\" width=\"270\"/>
			</div>";
        echo"<p class=\"prodInfo\">".$oProd->getDescription()."</p>";
		?>
        <form action="" method="" id="formProducto">
            <div class="formField">
                <label>Precio:</label>
                <?php
                	echo"<p class=\"prodPrecio\">".$oProd->getPrecio()."</p>";
				?>
            </div>
            <div class="formField">
                <label>Cantidad:</label>
                <input id="cantidad" name="cantidad" class="inputData required number" maxlength="3" value="1"/>
            </div>
            <div class="formButton">
                <input id="comprar" class="formButton" type="submit" name="comprar" value="comprar" />
            </div>
        </form>
        <p class="social">
            <span>Compartir:</span>
            <a href="#" class="socialFacebook">Facebook</a>
            <a href="#" class="socialTwitter">Twitter</a>
            <a href="#" class="socialFeed">RSS</a>
        </p>
<?php
    }catch(Exception $ex){
        echo 'Ha ocurrido una exception: '.$ex->getMessage();

    }
 ?>       
                        
                        		
                        		
                        		
        	           