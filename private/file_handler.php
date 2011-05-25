<?
//    $type = $_POST['mimetype'];
//    $xhr = $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    // return text var_dump for the html request
    
    include_once '../init.php';
    include_once ROOT_DIR .'/datos/imagenes.php';
    echo "VAR DUMP $_POST:<p />";
    var_dump($_POST);
    foreach($_FILES as $file) {
        $n = $file['name'];
        $s = $file['size'];
        if (!$n) continue;
        echo "File: $n ($s bytes)";
    }
    
    $attName = 'file';
    $message;
    if (isset($_FILES[$attName]) && $_FILES[$attName]['size'] > 0) { 

          // Temporary file name stored on the server
          $tmpName  = $_FILES[$attName]['tmp_name'];  

          // Read the file 
          $fp      = fopen($tmpName, 'r');
          $data = fread($fp, filesize($tmpName));
          $data = addslashes($data);
          fclose($fp);
          
          //insert
          $dImg = new DataImagenes();
          $dImg->insertImg($data);
          $id_img = $dImg->getUltimoID();
          

          // Print results
          $message = "Thank you, your file has been uploaded.";

    }
    else {
       $message = "No image selected/uploaded";
    }
    echo "and... $message";
?> 