<?php
/**
 * este es el manejador del producto: alta,baja y modificacion
 * 
 */
include_once '../init.php';
include_once ROOT_DIR .'/datos/imagenes.php';
include_once ROOT_DIR .'/entidades/producto.php';
//la accion puede ser seteada de forma externa
if(!isset ($action)){
    $action = $_GET["action"];
}
//espero por post todos los datos necesarios
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
          
          //create the product object and add it!
          //ver de crear el producto con un solo metodo
          
          // Print results
//          $message = "Thank you, your file has been uploaded.";

    }
    else {
       $message = "No image selected/uploaded";
    }
    echo "and... $message";
    $nombre = $_POST["formAMProductoNombre"];
    $apellido = $_POST["formCheckoutApellido"];
    $email = $_POST["formCheckoutMail"];
    $telefono = $_POST["formCheckoutTel"];
    $direccion = $_POST["formCheckoutDireccion"];
    $ciudad = $_POST["formCheckoutCiudad"];
    $codigo_postal = $_POST["formCheckoutPostal"];
    echo 'echoing data..'.$nombre.'<br/>';
    echo 'echoing data..'.$apellido.'<br/>';
    echo 'echoing data..'.$email.'<br/>';
    echo 'echoing data..'.$telefono.'<br/>';
    echo 'echoing data.. SELECT'.$_POST["formCheckoutSelect"].'<br/>';
    $zona_envio = (int) $_POST["formCheckoutSelect"];
    //validamos entradas
    if($zona_envio<1){
        throw new Exception("Ivalid argument! zona_envio > 0 is needed");
    }
    //obtenemos el cliente
    $s = $_SESSION['client'];
    //lo transformamos en objeto
    $oClient = unserialize($s);
    //lo seteamos
    $oClient->setApellido($apellido);
    $oClient->setCiudad($ciudad);
    $oClient->setCodigoPostal($codigo_postal);
    $oClient->setDireccion($direccion);
    $oClient->setEmail($email);
    $oClient->setNombre($nombre);
    $oClient->setTelefono($telefono);
    $oClient->setZonaEnvio($zona_envio);
    //ahora en bytes y lo sobreescribimos
    $sClient = serialize($oClient);
    $_SESSION['client'] = $sClient;
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