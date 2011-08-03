<?php
//multiple categories selection!
include_once '../init.php';
include_once ROOT_DIR .  '/datos/categorias.php';
$dCateg = new DataCategorias();
$vCat = $dCateg->getCategoriasHabilitadas();
$id_producto = $_GET["id_producto"];
if(isset ($id_producto)){
    $dCateg = new DataCategorias();
    $vCatProducto = $dCateg->getCategoriasProducto($id_producto);
}

echo "<label>Categoria:</label>";
   echo "<select id=\"ProductCat\"  name=\"data[Product][category][]\" validate=\"required:true\" size=\"9\" multiple=\"yes\">";
//echo "count: ".count($vCat);
for($index=0;$index < count($vCat);$index++){
    $oCat = $vCat[$index];
    $encontrado = false;
    //busco sino bueno
    if(isset($vCatProducto)){
        for($j=0;$j < count($vCatProducto);$j++){
            $ooCat = $vCatProducto[$j];
            if($ooCat->getId_Categoria() == $oCat->getId_Categoria()){
                $encontrado = true;
            }
        }
    }
    echo "<option value=\"".$oCat->getId_Categoria()."\" ".($encontrado?"selected":"")." >".$oCat->getNombre()." </option>\n";
}
?>
</select>

