<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of utilidades
 *
 * @author fanky
 */
class Utilidades {
    public static function formatero_numero($numero) {
        return number_format($numero, 2, ',', '.');
    }
    public static function db_number($numero) {
        return number_format($numero, 2, '.', ',');
    }
    
    public static function db_adapta_string($str) {
        return "\"$str\"";
    }
    
}
?>
