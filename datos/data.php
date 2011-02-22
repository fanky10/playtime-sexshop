<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Data
 * ver como se va a manejar si hacer el initDB en la contruccion
 * y el closeDB publico con un finally
 * obviamente la conexion va a ser un atributo protegido por Data
 *
 * @author fanky
 *
 */
class Data {
    protected $connection;
    public function __construct() {
        //para que este dentro del standar :)
        $this->connection = $this->initDB();
    }
    /*
    DB Initialization method.
    Returns the connection variable.
    */
    protected function initDB(){
        //setea en la session la database
        if(! isset($_SESSION['databaseURL'])){
                include("./conf/conf.php");
                $dbConf = new Configuracion();
                $databaseURL = $dbConf->get_databaseURL();
                $databaseUName = $dbConf->get_databaseUName();
                $databasePWord = $dbConf->get_databasePWord();
                $databaseName = $dbConf->get_databaseName();

                    //Set DB Info. in-session
                $_SESSION['databaseURL']=$databaseURL;
                $_SESSION['databaseUName']=$databaseUName;
                $_SESSION['databasePWord']=$databasePWord;
                $_SESSION['databaseName']=$databaseName;

                //si lo dejamos asi SE CONECTA DOS VECES
                //la primera vez :P

//                $connection = mysql_connect($databaseURL,$databaseUName,$databasePWord)
//                     or die ("Error while connecting to localhost");
//                $db = mysql_select_db($databaseName,$connection)
//                    or die ("Error while connecting to database");
//
//                mysql_close($connection);
            }
        $databaseURL = $_SESSION['databaseURL'];
        $databaseUName = $_SESSION['databaseUName'];
        $databasePWord = $_SESSION['databasePWord'];
        $databaseName = $_SESSION['databaseName'];

        $connection = mysql_connect($databaseURL,$databaseUName,$databasePWord)
                or die ("Error while connecting to host");
        $db = mysql_select_db($databaseName,$connection)
                or die ("Error while connecting to database");
        return $connection;
    }

    /*
    DB Closing method.
    Pass the connection variable
    obtained through initDB().
    */
    public function closeDB(){
        mysql_close($this->connection);
    }
}
?>

