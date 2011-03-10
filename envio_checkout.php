<?php

@session_start();
include_once 'entidades/cliente.php';

//si la encontramos sin nada la creamos al toke
if(!session_is_registered('client')){//si no esta registrado lo registramos
    echo "client unreg!";
    $oClient = new Cliente();
    $sClient = serialize($oClient);
    $_SESSION['client'] = $sClient;
}
$s = $_SESSION['client'];
$oClient = unserialize($s);

// The message
$admin_mail = "info@playtimesexshop.com";
$user_mail = $oClient->getEmail();
$subject="Compra Efectuada en PlayTimeSexShop";
ob_start(); # start buffer
echo "Sr/a Cliente usted ha hecho una compra con los datos:<br>";
include_once 'client_mail.php';
echo "La compra efectuada: <br><br>";
include_once 'cart_mail.php';
echo "<br><br>Un representante se contactara con usted via telefonica o email a la brevedad.<br>";
echo "<br><br>Saluda Atte,<br>";
echo "Administracion PlayTimeSexShop";
# we pass the output to a variable
$html_message = ob_get_contents();
ob_end_clean(); # end buffer
# and here's our variable filled up with the html
echo $html_message;

    $headers  = "From: $admin_mail\r\n";
    $headers .= "Content-type: text/html\r\n";//asi acepta html

//  enviamos el email...
    $mail_sent = mail($user_mail, $subject, $html_message, $headers);
    echo $mail_sent ? "Mail sent" : "Mail failed";
//$mail = 'info@playtimesexshop.com';
//$subject= 'Formulario de Contacto desde la Web';
//$msg="
//Nombre: $_GET[nombre]
//E-mail: $_GET[email]
//Telefono: $_GET[telefono]
//
//Mensaje:
//$_GET[comentario]";
//
//mail($mail, $subject, $msg, "From: $_GET[email]");

// In case any of our lines are larger than 70 characters, we should use wordwrap()
//$message = wordwrap($message, 70);
//
//// Send
//
// if (mail('fanky10@gmail.com', 'My Subject', $message)) {
//   echo("<p>Success!</p>");
//  } else {
//   echo("<p>Something went wrong xD</p>");
//  }
 ?>
<?php
#@session_start();
#session_unset();
//TODO el codigo de envio de formulario
//tanto al cliente como al vendedor
//
    //change this to your email.
//    $to = "fanky10@gmail.com";
//    $from = "m2@maaking.com";
//    $subject = "Hello! This is HTML email";
//
//    //begin of HTML message
//    $message = "
//<html>
//  <body >
//    <center>
//        <b>HtmlMail</b> <br>
//
//    </center>
//      <br><br>*** Now you Can send HTML Email <br> Regards<br>MOhammed Ahmed - Palestine
//  </body>
//</html>";
//   //end of message
//    $headers  = "From: $from\r\n";
//    $headers .= "Content-type: text/html\r\n";
//
//    //options to send to cc+bcc
//    //$headers .= "Cc: [email]maa@p-i-s.cXom[/email]";
//    //$headers .= "Bcc: [email]email@maaking.cXom[/email]";
//
//    // now lets send the email.
//    $mail_sent = mail($to, $subject, $message, $headers);
//    echo $mail_sent ? "Mail sent" : "Mail failed";
//    echo "Message has been sent....!";
?>
