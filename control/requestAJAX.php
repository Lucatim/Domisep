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

        case "data_messagerie"://sql pour recup les messages
            $numClient=$_GET["idUser"];

            $req=$bdd->prepare('SELECT mess FROM mail WHERE num_client=?');
            $req->execute(array($numClient));
            $val=$req->fetch();
            $req->closeCursor();

            header('Content-Type: application/json');
            echo json_encode($val);
            break;

        case "chauffage_position":
            $idResidence=$_GET["idResidence"];
            $chaufPos=$_GET["chaufPos"];

            $req=$bdd->prepare('UPDATE residence SET heat_on=:pos WHERE id_residence=:idR');
            //$req->bind_param('ii',$chaufPos,$idResidence);
            $req->bindParam(':pos',$chaufPos);
            $req->bindParam(':idR',$idResidence);
            $req->execute();
            $req->closeCursor();

            break;

        case "chauffage_temperature":
            $idResidence=$_GET["idResidence"];
            $chaufTemp=$_GET["chaufTemp"];

            $req=$bdd->prepare('UPDATE residence SET temp_max=:temp WHERE id_residence=:idR');
            //$req->bind_param('ii',$chaufPos,$idResidence);
            $req->bindParam(':temp',$chaufTemp);
            $req->bindParam(':idR',$idResidence);
            $req->execute();
            $req->closeCursor();
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

