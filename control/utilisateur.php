<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 14/12/2017
 * Time: 19:16
 */
//Appel de la classe PDO perso pour connexion BDD
require_once 'model/PdoDomisep.php';
require_once 'model/connexion.php';
require_once 'model/utilisateur.php';

//include_once ('view/base/header.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "gerer_mon_domicile";
} else {
    $function = $_GET['function'];
}

switch ($function){
    case "gerer_mon_domicile":
        if(isset($_SESSION["id"])&&!empty($_SESSION["id"])){
            $_SESSION["listeDomicile"]=utilisateur::getDomicileClient($_SESSION["id"]);
        }
        require_once ("view/base/utilisateur/gerer_mon_domicile/gerer_mon_domicile.php");
        break;

    case "domicile":
        //Ne pas oublier de verifier si l'appartement appartient bien a l'utilisateur
        if(isset($_GET["home"])&& !empty($_GET["home"])){
            //Recupere tous info domicile, pieces et capteurs
            $_SESSION["domiSelect"]= utilisateur::getDomicileComplet($_GET["home"]);
            ini_set('xdebug.var_display_max_depth', 15);
            var_dump($_SESSION["domiSelect"]);
            require_once ("view/base/utilisateur/gerer_mon_domicile/domicile.php");
        }
       //penser a la redirection vers les domiciles
        break;

    case "capteur":
        if (isset($_GET["capteur"])&& !empty($_GET["capteur"])){
            $_SESSION["capteurSelect"]=utilisateur::getCaracteristiqueCapteur($_GET["capteur"]);
            require_once ("view/base/utilisateur/gerer_mon_domicile/capteur.php");
        }

        break;

    case "data_capteur":
        //Verification des parametre passé a la methode de la classe
        if (isset($_POST["date"]) && !empty($_POST["date"])){
            $date=$_POST["date"];
            if (isset($_POST["idCapteur"]) && !empty($_POST["idCapteur"])){
                $idCapteur=$_POST["idCapteur"];
                $data=utilisateur::getDataCapteurs($idCapteur,$date);
                json_decode($data);
            }
        }
        else{
            if (isset($_POST["idCapteur"]) && !empty($_POST["idCapteur"])){
                $idCapteur=$_POST["idCapteur"];
                $data=utilisateur::getDataCapteurs($idCapteur,null);
                json_decode($data);
            }
        }

        break;

    case "piece":
        if (isset($_GET["piece"])&& !empty($_GET["piece"])){
            $_SESSION["pieceSelect"]=utilisateur::getCaracteristiquePiece($_GET["piece"]);
            $_SESSION["pieceSelect"]["capteurs"]=utilisateur::getCapteursPiece($_GET["piece"]);
            require_once ("view/base/utilisateur/gerer_mon_domicile/piece.php");
        }
        break;

}