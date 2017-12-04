<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 04/12/2017
 * Time: 11:50
 */

class PdoDomisep
{
    public static function pdoConnectDB(){
        return new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', '');
    }

}