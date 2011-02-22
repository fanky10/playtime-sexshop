<?php

/*
 * B Configuration information is stored here.
 * deally you should read these vaules from an
 * xternal properties file.
 */

class Configuracion {
    public static function init(){
        define('ROOT_PATH', '/home/user/public_html/folder/');
        define('PROJECT_DIR', '/folder/');
        define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT_DIR);

    }
    public function __construct() {
        $this->databaseURL = "localhost";
        $this->databaseUName = "playtime_root";
        $this->databasePWord = "root";
        $this->databaseName = "playtime_web";
    }
    private $databaseURL = "localhost";
    private $databaseUName = "playtime_root";
    private $databasePWord = "root";
    private $databaseName = "playtime_web";

    function get_databaseURL() {
        return $this->databaseURL;
    }

    function get_databaseUName() {
        return $this->databaseUName;
    }

    function get_databasePWord() {
        return $this->databasePWord;
    }

    function get_databaseName() {
        return $this->databaseName;
    }

}
?>