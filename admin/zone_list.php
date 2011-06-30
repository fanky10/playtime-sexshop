<table border="0" width="100%" cellpadding="0" cellspacing="0" class="product-table">
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Modificar</th>
    </tr>
<?php
    //dos acciones: actualizar y delete
    include_once '../init.php';
    include_once ROOT_DIR .'/datos/zonas.php';

    include_once ROOT_DIR .'/entidades/zona.php';
    include_once ROOT_DIR .'/util/utilidades.php';
    
    $dZone = new DataZonas();
    $vZones = $dZone->getZonas(-1);
    //itero y muestro :)
    for($index=0;$index < count($vZones);$index++){
        $oZone = $vZones[$index];
        echo "<tr ".(($index&1) ? "class=\"alternate-row\"" : "").">";//si es par: colorcito lindo
        echo "<td>".$oZone->getNombre()."</td>";
        echo "<td> $ ".Utilidades::formatero_numero($oZone->getPrecio())."</td>";
        echo "<td>";
            echo "<a href=\"zone_handler.php?action=del&id_zona=".$oZone->getId()."\" title=\"Borrar Zona\" alt=\"Borrar Zona\" class=\"tableIcon icn-delete\"></a>";
            echo "<a href=\"zone_am.php?action=upd&id_zona=".$oZone->getId()."\" title=\"Actualizar Precio\" alt=\"Actualizar Precio\" class=\"tableIcon icn-update\"></a>";
        echo "</td>";
    }
    //odio errores en el codigo x mas que sepa que no hay errores x)
    ?>
    </table>