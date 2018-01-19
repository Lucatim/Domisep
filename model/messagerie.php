<?php
/**
 * Created by PhpStorm.
 * User: vanke
 * Date: 15/12/2017
 * Time: 12:53
 */

class messagerie
{
    public static function verifNumClient($numClient){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT * FROM mail,client WHERE num_client=?');
        $req->execute(array($numClient));
        $val=$req->fetch();
        $req->closeCursor();
        return $val;

    }
}