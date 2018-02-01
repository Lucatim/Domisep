<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 04/12/2017
 * Time: 11:50
 */

class PdoDomisep
{
    /* MOT DE PASSE DE CONNEXION A LA BASE DE DONNEES A MODIFIER SI BESOIN */
    /* MOT DE PASSE ACTUEL : VIDE */
    public static function pdoConnectDB(){
            return new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', '');
    }
}