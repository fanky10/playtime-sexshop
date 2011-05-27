<?php
/**
 * este es el manejador del producto: alta,baja y modificacion
 * 
 */
include_once '../init.php';
include_once ROOT_DIR .'/datos/imagenes.php';
include_once ROOT_DIR .'/datos/productos.php';
include_once ROOT_DIR .'/datos/categorias.php';

include_once ROOT_DIR .'/entidades/producto.php';
//la accion puede ser seteada de forma externa
if(!isset ($action)){
    $action = $_GET["action"];
}

//creo el objeto 
//luego veo que accion tomar
$producto = new Producto();
$producto->setCodigo($_POST['data'][Product][codigo]);
$producto->setDescripcion($_POST['data'][Product][descrip]);
$producto->setImagen(-1);
$producto->setInformacion("");
$producto->setMarca(-1);
$producto->setNombre($_POST['data'][Product][name]);
$producto->setPrecio($_POST['data'][Product][price]);
$id_categoria = (int) $_POST['data'][Product][category];
//para hacer insert
if($action=="add"){
    //VAR_DUMP FOR DEBUGGING
//    echo "VAR DUMP $_POST:<p />";
//    var_dump($_POST);
//    foreach($_FILES as $file) {
//        $n = $file['name'];
//        $s = $file['size'];
//        if (!$n) continue;
//        echo "File: $n ($s bytes)";
//    }
    
    $attName = 'file';//nombre del attributo tipo file
    $message;//mensaje de error u ok
    if (isset($_FILES[$attName]) && $_FILES[$attName]['size'] > 0) { 

          // Temporary file name stored on the server
          $tmpName  = $_FILES[$attName]['tmp_name'];  

          // Read the file 
          $fp      = fopen($tmpName, 'r');
          $data = fread($fp, filesize($tmpName));
          $data = addslashes($data);
          fclose($fp);
          
          //insert the file
          $dImg = new DataImagenes();
          $dImg->insertImg($data);
          $id_img = $dImg->getUltimoID();
          
          //insert the product
          $producto->setImagen($id_img);
          $dProd = new DataProductos();
          $dProd->addProducto($producto);
          $id_producto = $dProd->getUltimoID();
          //insert the product-category
          $dCateg = new DataCategorias();
          $dCateg->addCategoriaProducto($id_categoria, $id_producto);

    }
    else {
        //lo maneja el jquery.validate pero por si las dudas... :P
       $message = "No image selected/uploaded";
    }
    if(isset ($message)){
        echo "<br/> $message";
    }
}else if($action=="upd"){
//    include 'client_data.php';
    
}else{
    echo "accion unknown! $action";
}

//si es necesario redireccionar:

if(isset ($_GET["redirect"])){
    header( 'Location: '.$_GET["redirect"] ) ;
}

?>