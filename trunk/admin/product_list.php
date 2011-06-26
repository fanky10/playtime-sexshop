<table border="0" width="100%" cellpadding="0" cellspacing="0" class="product-table">
    <tr>
        <th>Detalle</th>
        <th>SKU</th>
        <th>Precio</th>
        <th>Modificar</th>
    </tr>
<?php
    //dos acciones: actualizar y delete
    include_once '../init.php';
    include_once ROOT_DIR .'/datos/imagenes.php';
    include_once ROOT_DIR .'/datos/productos.php';
    include_once ROOT_DIR .'/datos/categorias.php';

    include_once ROOT_DIR .'/entidades/producto.php';
    include_once ROOT_DIR .'/util/utilidades.php';
    //me fijo si hay un filtro
    if(!isset ($cat_selected)){
        $cat_selected = $_GET["cat_selected"];
    }
    //datos new instance
    $dProd = new DataProductos();
    //obtengo el arreglo corresp.
    $vProds = $dProd->getProductosCateg($cat_selected);
    $prod_found = count($vProds);
    //itero y muestro :)
    for($index=0;$index < $prod_found;$index++){
        $oProducto = $vProds[$index];
        echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">";//si es par: colorcito lindo
        echo "<td>".$oProducto->getNombre()."</td>";
        echo "<td>".$oProducto->getCodigo()."</td>";
        echo "<td> $ ".Utilidades::formatero_numero($oProducto->getPrecio())."</td>";
        echo "<td>";
            echo "<a href=\"product_handler.php?action=del&id_producto=".$oProducto->getId_Producto()."\" title=\"Borrar Producto\" alt=\"Borrar Producto\" class=\"tableIcon icn-delete\"></a>";
            echo "<a href=\"product_am.php?action=upd&id_producto=".$oProducto->getId_Producto()."\" title=\"Actualizar Cantidad\" alt=\"Actualizar Cantidad\" class=\"tableIcon icn-update\"></a>";
        echo "</td>";
    }
    //odio errores en el codigo x mas que sepa que no hay errores x)
    ?>
    </table>