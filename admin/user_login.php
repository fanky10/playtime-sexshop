<html>
    <head>
        <script src="../js/jquery-1.5.js" type="text/javascript"></script>
        <script src="../js/jquery.metadata.js" type="text/javascript" ></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script><!--VALIDATION-->
        
        <script src="js/login.js" type="text/javascript"></script><!--VALIDA DATOS DE ENTRADA-->
        <?php
            @session_start();
            $wellcome = $_SESSION['login_wc'];
            $user_roll = $_SESSION['page_roll'];//el roll que necesita la pagina para redireccionarse
            $redirect = $_SESSION['login_req'];
            //armo los argumentos para el user_manager.php
            $args = "?";
            if(isset ($user_roll)){
                $args.= "valid_roll=$user_roll";
                //cuando el login de ok se unsetea
//                unset($_SESSION['page_roll']); //ya lo usamos ya fue
            }
            if(isset ($redirect)){
                $args.= "&redirect=$redirect";
                
            }
        ?>
    </head>
    <body>
        <div id="bg">
            <div id="page">
		<div id="content">
                    <div class="post">
                        
			<h1 align="center">
                            <?php
                                //si no esta seteado el mensaje de bienvenida le damos el de default
                                if(!isset ($wellcome)){
                                    echo "<h1 align=\"center\">Bienvenido, Identifiquese por favor</h1>";
                                    
                                }else{
                                    echo "<h1 align=\"center\">$wellcome</h1>";
                                    //cuando el login de ok se unsetea
//                                    unset($_SESSION['login_wc']); //ya lo usamos ya fue
                                }
                            ?>
                        </h1>
                        
                        <form id="loginForm"action="user_manager.php<?php echo $args;?>" method="POST" align="center">
                            <table class="tbl-contacto" align="center">              
                                <tr>
                                    <td> <label for="user">Usuario:</label></td>
                                    <td> <input id="user" name="data[User][name]" size=15 type="text"/> </td>
                                </tr>
                                <tr>
                                    <td> <label for="pass">Contraseña:</label></td>
                                    <td> <input id="pass" type="password" name="data[User][pass]" size=15 type="text" /> </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left">
                                        <input type="submit" value="login" id="boton"/>
                                    </td>
                                    <td><div id="result" align="center"></div></td>
                                </tr>
                            </table>
                            <p id="mensaje"><strong>Aqui el mensaje de resultado!</strong></p>
                        </form>     
                        
                    </div>
		</div>
		<!-- end #content -->
	</div>
	<!-- end #page -->
        </div>
    </body>
</html>