<?php

class ShowImg {
    private $img_bytes;
    public function __construct() {

    }
    private function setImg($id_imagen){
        if(! isset($_SESSION['databaseURL'])){
            include("../conf/conf.php");
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



            $connection = mysql_connect($databaseURL,$databaseUName,$databasePWord)
                 or die ("Error while connecting to localhost");
            $db = mysql_select_db($databaseName,$connection)
                or die ("Error while connecting to database");

            mysql_close($connection);
        }
        $databaseURL = $_SESSION['databaseURL'];
        $databaseUName = $_SESSION['databaseUName'];
        $databasePWord = $_SESSION['databasePWord'];
        $databaseName = $_SESSION['databaseName'];
      
        $connection = mysql_connect($databaseURL,$databaseUName,$databasePWord)
            or die ("Error while connecting to host");
        $db = mysql_select_db($databaseName,$connection)
            or die ("Error while connecting to database");
        ////hardcoded
//        $connection = mysql_connect("localhost","playtime_root","root");
//        $db = mysql_select_db("playtime_web",$connection);
        $gotten = mysql_query("select id_imagen, imagen as imgdata from imagen where id_imagen='".$id_imagen."'");
        if ($row = @mysql_fetch_assoc($gotten)) {
                $this->img_bytes = $row[imgdata];
        } else {
            throw new Exception("i need images to work!");
        }
    }
    public function getImg($id_imagen){
        $this->setImg($id_imagen);
        return $this->img_bytes;
    }

}


// If this is a valid image request, send out the image

if ($_REQUEST[id_img] >0) {
    $id_img = ($_REQUEST[id_img]);
    header("Content-type: image/jpeg");
    $shower = new ShowImg();
    $bytes = $shower->getImg($id_img);
    print $bytes;
    exit ();
}
?>