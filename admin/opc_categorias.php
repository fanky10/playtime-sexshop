<?php
//multiple categories selection!
include_once '../init.php';
include_once ROOT_DIR .  '/datos/categorias.php';
$dCateg = new DataCategorias();
$vCat = $dCateg->getCategoriasHabilitadas();
echo "<label>Categoria:</label>";
   echo "<select id=\"ProductCat\"  name=\"data[Product][category][]\" validate=\"required:true\" size=\"".(count($vCat)/2)."\" multiple=\"yes\">";
//echo "count: ".count($vCat);
for($index=0;$index < count($vCat);$index++){
    $oCat = $vCat[$index];
    echo "<option value=\"".$oCat->getId_Categoria()."\">".$oCat->getNombre()."</option>";
}
?>
</select>

