<?php
$mail = 'info@playtimesexshop.com';
$subject= 'Formulario de Contacto desde la Web';
$msg="
Nombre: $_GET[nombre]
E-mail: $_GET[email]
Telefono: $_GET[telefono]

Mensaje:
$_GET[comentario]";

mail($mail, $subject, $msg, "From: $_GET[email]");
?>
