<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 08/01/2018
 * Time: 09:25
 */
//var_dump($_GET);
if (isset($_GET['function']) && !empty($_GET['function'])) {
    $function = $_GET['function'];

    $bdd = new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', '');

    //var_dump($_GET["idCapteur"]);
    switch ($function){
        case "data_capteur":
            //Verification des parametre passé a la methode de la classe
            /*
            if (isset($_GET["date"]) && !empty($_GET["date"])){
                $date=$_GET["date"];
                if (isset($_GET["idCapteur"]) && !empty($_GET["idCapteur"])){
                    $idCapteur=$_GET["idCapteur"];

                    $req = $bdd->prepare('SELECT * FROM sensor_data WHERE id_sensor=? and date_sensor>=?  ');
                    $req->execute(array($idCapteur,$date));

                    $val = $req->fetchAll();
                    $req->closeCursor();
                    json_decode($val);
                }
            }
            else{
                if (isset($_GET["idCapteur"]) && !empty($_GET["idCapteur"])){
                    $idCapteur=$_GET["idCapteur"];

                    $req = $bdd->prepare('SELECT * FROM sensor_data WHERE id_sensor=?');
                    $req->execute(array($idCapteur));

                    $req->closeCursor();
                    json_decode($data);
                }
            }
            */
            $idCapteur=$_GET["idCapteur"];
            //var_dump($idCapteur);

            $req = $bdd->prepare('SELECT * FROM sensor_data WHERE id_sensor=?');
            $req->execute(array($idCapteur));

            $val = $req->fetchAll();
            $req->closeCursor();
            //json_decode($val);
        header('Content-Type: application/json');
            echo json_encode($val);
            break;
    }

    /*
    switch ($function){
        case "data_capteur":
            //Verification des parametre passé a la methode de la classe
            if (isset($_POST["date"]) && !empty($_POST["date"])){
                $date=$_POST["date"];
                if (isset($_POST["idCapteur"]) && !empty($_POST["idCapteur"])){
                    $idCapteur=$_POST["idCapteur"];
                    $data=requestAJAX::getDataCapteurs($idCapteur,$date);
                    json_decode($data);
                }
            }
            else{
                if (isset($_POST["idCapteur"]) && !empty($_POST["idCapteur"])){
                    $idCapteur=$_POST["idCapteur"];
                    $data=requestAJAX::getDataCapteurs($idCapteur,null);
                    json_decode($data);
                }
            }
            break;
    }*/
}

