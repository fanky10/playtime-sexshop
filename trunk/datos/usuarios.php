<?php
include_once 'data.php';

include_once '../init.php';
include_once ROOT_DIR .'/entidades/roll.php';
include_once ROOT_DIR .'/entidades/usuario.php';

/**
 * Description of usuarios
 *
 * @author fanky10<fanky@gmail.com>
 */
class DataUsuarios extends Data {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     *
     * @param type $myusername
     * @param type $mypassword 
     * @return type boolean
     */
    public function isUsuarioHabilitado($myusername,$mypassword){
        // To protect MySQL injection (more detail about MySQL injection)
        $myusername = stripslashes($myusername);
        $mypassword = stripslashes($mypassword);
        $myusername = mysql_real_escape_string($myusername);
        $mypassword = mysql_real_escape_string($mypassword);
        //esta query es de 1 a muchos, por ahora se prueba con uno solo :P
        $sql="SELECT u.id id_usuario, u.user nombre, u.pass password, r.id id_roll, r.descripcion FROM usuario u
            INNER JOIN roll r ON u.id_roll=r.id
            WHERE user='$myusername' and pass='$mypassword'";
        $result=mysql_query($sql)
            or die ("getUsuario Query Failed <br/> ".mysql_error());
        while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            
            $oRoll = new Roll();
            $oRoll->setId($row['id_roll']);
            $oRoll->setDescripcion($row['descripcion']);
            
            $oUser = new Usuario();
            $oUser->setId($row['id_usuario']);
            $oUser->setNombre($row['nombre']);
            $oUser->setPassword($row['password']);
            
            
            $oUser->setRoll($roll);
            
            $sUser = serialize($oUser);
            $_SESSION['user'] = $sUser;
            //si salio todo bien
            return true;
        }
        return false;
        // Mysql_num_row is counting table row
//        $count=mysql_num_rows($result);
//        // If result matched $myusername and $mypassword, table row must be 1 row
//        if($count==1){
//            //Register the User Object
//            
//            return true;
//        }
//        else {
//            
////        echo "Wrong Username or Password";
//        }
    }
}

?>
