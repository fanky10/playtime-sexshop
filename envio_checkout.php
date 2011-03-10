<?php
// The message
$message = "Line 1\nLine 2\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);

// Send

 if (mail('fanky10@gmail.com', 'My Subject', $message)) {
   echo("<p>Success!</p>");
  } else {
   echo("<p>Something went wrong xD</p>");
  }
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
