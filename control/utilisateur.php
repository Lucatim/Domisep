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

        break;

}