<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 08/01/2018
 * Time: 09:21
 */

class requestAJAX
{
//Fonction recuperant tout les donnees historise du capteur, utilise notamment pour les requete AJAX de Chartist.js
    public static function getDataCapteurs($idCapteur,$date){
        $bdd = PdoDomisep::pdoConnectDB();
        //Test des parametre de la requete
        if ($date ==null){
            $req = $bdd->prepare('SELECT * FROM sensor_data WHERE id_sensor=?');
            $req->execute(array($idCapteur));
        }
        else{
            $req = $bdd->prepare('SELECT * FROM sensor_data WHERE id_sensor=? and date_sensor>=?  ');
            $req->execute(array($idCapteur,$date));
        }
        $val = $req->fetchAll();
        $req->closeCursor();
        return $val;
    }


}

class PdoDomisep
{
    public static function pdoConnectDB(){
        return new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', '');
        /*try{
            return new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }*/

    }

}


if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = $_GET['function'];

    switch ($function){
        case "data_capteur":
            //Verification des parametre passé a la methode de la classe
            if (isset($_GET["date"]) && !empty($_GET["date"])){
                $date=$_GET["date"];
                if (isset($_GET["idCapteur"]) && !empty($_GET["idCapteur"])){
                    $idCapteur=$_GET["idCapteur"];
                    $data=requestAJAX::getDataCapteurs($idCapteur,$date);
                    json_decode($data);
                }
            }
            else{
                if (isset($_GET["idCapteur"]) && !empty($_GET["idCapteur"])){
                    $idCapteur=$_GET["idCapteur"];
                    $data=requestAJAX::getDataCapteurs($idCapteur,null);
                    json_decode($data);
                }
            }
            break;
    }
}
?>