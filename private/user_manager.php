<?php

//VAR_DUMP FOR DEBUGGING
//echo "VAR DUMP $_POST:<p />";
//var_dump($_POST);
//foreach($_FILES as $file) {
//    $n = $file['name'];
//    $s = $file['size'];
//    if (!$n) continue;
//    echo "File: $n ($s bytes)";
//}

$user = $_POST[data][User][name];
$pass = $_POST[data][User][pass];
if($user == "admin" && $pass == "admin"){
    echo "you are in bro!!";
}
//si es necesario redireccionar:
if(isset ($_GET["redirect"])){
    header( 'Location: '.$_GET["redirect"] ) ;
}
?>
