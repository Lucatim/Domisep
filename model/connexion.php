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
        $req=$bdd->prepare('SELECT id_client,pass,manager,admin FROM client WHERE id_client=? AND pass=? ');
        //$req=$bdd->prepare('SELECT')
        $req->execute(array($ID,$pass));
        $val=$req->fetch();
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

    public static function getNomPrenom($numClient){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT surname,name FROM client WHERE id_client=?');
        $req->execute(array($numClient));
        //$val=$req->fetchAll();
        $val=$req->fetch();
        $req->closeCursor();
        return $val;

    }

    public static function getImage($numClient){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT pic FROM client WHERE id_client=?');
        $req->execute(array($numClient));
        $val=$req->fetch();
        $req->closeCursor();
        return $val;
    }

    public static function getDateSlide($numClient){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT date_reg,date_log FROM client WHERE id_client=?');
        $req->execute(array($numClient));
        $val=$req->fetch();
        $req->closeCursor();
        return $val;
    }

    public static function getDatetimeNow($id_client) {
        //$tz_object = new DateTimeZone('Europe/Paris');
        $dateTimeZoneParis = new DateTimeZone("Europe/Paris");
        $dateTimeParis = new DateTime("now", $dateTimeZoneParis);
        //$datetime = new DateTime();
        $result = $dateTimeParis->format('Y-m-d H:i:s');
        //$datetime->setTimezone($tz_object);
        //date_default_timezone_set('Australia/Melbourne');
        //$date = date('m/d/Y h:i:s', time());

        $bdd=PdoDomisep::pdoConnectDB(); // Connexion à la BDD
        $req=$bdd->prepare("UPDATE client SET date_log=:date WHERE id_client=:id"); // Préparation de la requête
        $req->bindParam("date",$result);
        $req->bindParam("id",$id_client);
        $req->execute(); // Exécution de la requête
        $req->closeCursor(); // Libération de la connexion au serveur

        return $result;
    }
}