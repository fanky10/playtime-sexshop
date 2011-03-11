<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of email
 * esta clase envia un email
 * @author fanky
 */
class Email {
    private $admin_mail = "fanky10@gmail.com";//"info@playtimesexshop.com";
    function enviarEmail(){
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

    //    $user_name = $oClient->getNombre();
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
//        echo $html_message;

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf8' . "\r\n";

        // Additional headers
        //$headers .= 'To: '.$user_name.' <'.$user_mail.'>' . "\r\n";
        $headers .= 'From: Info PlayTime <'.$this->admin_mail.'>' . "\r\n";
        $headers .= 'Cc: ' . "\r\n";
        $headers .= 'Bcc: '. $this->admin_mail . "\r\n";

    //  enviamos el email...
        $mail_sent = mail($user_mail, $subject, $html_message, $headers);
        return $mail_sent;
        //echo $mail_sent ? "Mail sent" : "Mail failed";
    }
}
?>
