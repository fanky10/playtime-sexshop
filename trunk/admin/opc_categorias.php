<?php
//include_once '../init.php';
//include ROOT_DIR.'/datos/data.php';
//$d = new Data();
//echo "data instance created!";//everything went right!
//TODO: seleccionar categoria s/producto
?>
<label>Categoria:</label>
   <select id="ProductCat"  name="data[Product][category]" validate="required:true">
       <option selected="selected" value="">Seleccione Categoria</option>
<?php
include_once '../init.php';
include_once ROOT_DIR .  '/datos/categorias.php';
$dCateg = new DataCategorias();
$vCat = $dCateg->getCategoriasHabilitadas();
echo "count: ".count($vCat);
for($index=0;$index < count($vCat);$index++){
    $oCat = $vCat[$index];
    echo "<option value=\"".$oCat->getId_Categoria()."\">".$oCat->getNombre()."</option>";
}
?>
</select>

