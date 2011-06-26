<?php
/**
 * para el uso de este script se debe incluir el script: lst_producto.js v0.1
 */
//se incluye todo lo referido a categorias
//la categoria puede ser seteada de forma externa
if(!isset ($cat_selected)){
    $cat_selected = $_GET["cat_selected"];
}
@include_once '../init.php';

@include_once ROOT_DIR .'/datos/categorias.php';
@include_once ROOT_DIR .'/entidades/categoria.php';

?>

<label>Filtrar Producto por:</label>
<!-- TODO: hacer dinamico el onchange.. o algo asi jeje-->
<select name="ordenamiento" id="order" onchange="cargaProductos(this.value);">
<?php
//muestro lo seleccionable
$dCateg = new DataCategorias();
$catList = $dCateg->getCategoriasHabilitadas();
$found = count($catList);
$arrCats = Array();

$hay_seleccionado = 0;
for($index=0;$index < $found;$index++){
    $oCategoria = $catList[$index];
    $arrCats[$index]['id'] = $oCategoria->getId_Categoria();
    $arrCats[$index]['desc'] = $oCategoria->getNombre();
    $arrCats[$index]['sel'] = 0;
    if(isset($cat_selected) && $oCategoria->getId_Categoria() == $cat_selected){
        $arrCats[$index]['sel'] = 1;
    }
}
if(!$hay_seleccionado==1){
    echo "\t<option selected=\"selected\" value=\"-1\">Todas las Categorias</option>\n";
}else{
    echo "\t<option value=\"-1\">Seleccionar</option>\n";
}
for($idx = 0;$idx < count($arrCats);$idx++){
    echo "\t<option ".($arrCats[$idx]['sel']==1?"selected=\"selected\" ":" ")."value=\"".$arrCats[$idx]['id']."\">".$arrCats[$idx]['desc']."</option>\n";
}
?>
</select>