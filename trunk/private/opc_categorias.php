<?php
//include_once '../init.php';
//echo "including...root-dir".ROOT_DIR."</br>";
//echo "including...root-url".ROOT_URL."</br>";
//
//include ROOT_DIR.'/datos/data.php';
//$d = new Data();
//echo "data instance created!";//everything went right!
?>
<label>Categoria:</label>
   <select id="formCheckoutSelect"  name="data[User][sendzone]" validate="required:true">
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

