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

}