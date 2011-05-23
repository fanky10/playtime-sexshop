<label>Categoria:</label>
   <select id="formCheckoutSelect"  name="data[User][sendzone]" validate="required:true">
       <option selected="selected" value="">Seleccione Categoria</option>
<?php
include_once '../init.php';
//echo "including...".ROOT_DIR;
include_once ROOT_DIR .  '/datos/categorias.php';
$dCateg = new DataCategorias();
$vCat = $dCateg->getCategoriasHabilitadas();
for($index=0;$index < count($vCat);$index++){
    $oCat = $vCat[$index];
    echo "<option value=\"".$oCat->getId()."\">".$oCat->getNombre()."</option>";
}
?>
</select>