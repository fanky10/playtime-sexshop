<!--
<label>Select:</label>
   <select id="formCheckoutSelect"  name="formCheckoutSelect">
        <option selected="selected" value="arg">Opcion 01</option>
        <option value="02">Opcion 02</option>
        <option value="03">Opcion 03</option>
    </select>
-->
<label>Select:</label>
   <select id="formCheckoutSelect"  name="formCheckoutSelect">
       <option selected="selected" value="-1">Seleccione Zona Envio</option>
<?php
include_once 'datos/zonas.php';
$dZonas = new DataZonas();
$vZonas = $dZonas->getZonas(-1);//con id_menor a 1 busco todas, de otro modo solo devuelve 1
for($index=0;$index < count($vZonas);$index++){
    $oZona = $vZonas[$index];
    echo "<option value=\"".$oZona->getId()."\">".$oZona->getNombre()."</option>";
}
?>
</select>