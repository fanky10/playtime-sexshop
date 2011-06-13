<table border="0" width="100%" cellpadding="0" cellspacing="0" class="product-table">
    <tr>
        <th>Nombre</th>
        <th>Modificar</th>
    </tr>
<?php
    //dos acciones: actualizar y delete
    include_once '../init.php';
    
    include_once ROOT_DIR .'/datos/categorias.php';
    include_once ROOT_DIR .'/entidades/categoria.php';
    
    $dCateg = new DataCategorias();
    $catList = $dCateg->getCategoriasHabilitadas();
    $found = count($catList);
    for($index=0;$index < $found;$index++){
        $oCategoria = $catList[$index];
        echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">";//si es par: colorcito lindo
        echo "<td>".$oCategoria->getNombre()."</td>";
        echo "<td>";
            echo "<a href=\"categ_handler.php?action=del&id_categoria=".$oCategoria->getId_Categoria()."\" title=\"Borrar Categoria\" alt=\"Borrar Categoria\" class=\"tableIcon icn-delete\"></a>";
            echo "<a href=\"categ_am.php?action=upd&id_categoria=".$oCategoria->getId_Categoria()."\" title=\"Actualizar Cantidad\" alt=\"Actualizar Cantidad\" class=\"tableIcon icn-update\"></a>";
        echo "</td>";
    }
    //odio errores en el codigo x mas que sepa que no hay errores x)
    ?>
    </table>