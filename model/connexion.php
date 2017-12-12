<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 05/12/2017
 * Time: 00:08
 */

class connexion
{
    var $pdo;

    public function _construct(){
        
    }

    public static function verifNumClient($numClient){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT id_client FROM client WHERE id_client=?');
        $req->execute(array($numClient));
        $val=$req->fetch();
        $req->closeCursor();
        return $val;

    }

    public static function verifID ($ID){

    }

    public static function verifPass($numClient,$pass){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT pass FROM client WHERE id_client=? AND pass=? ');
        $req->execute(array($numClient,$pass));
        $val=$req->fetch();
        $req->closeCursor();
        return $val;
    }

    public static function connexionFinal($ID,$pass){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT id_client,pass FROM client WHERE id_client=? AND pass=? ');
        //$req=$bdd->prepare('SELECT')
        $req->execute(array($ID,$pass));
        $val=$req->fetchAll();
        $req->closeCursor();
        return $val;

    }

    public static function connexionFirst($numClient){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT first_log FROM client WHERE id_client=?');
        $req->execute(array($numClient));
        $val=$req->fetch();
        $req->closeCursor();
        return $val;
    }


}