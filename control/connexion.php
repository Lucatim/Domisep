<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 27/11/2017
 * Time: 11:01
 */

//include_once ('view/base/header.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "connexion";
} else {
    $function = $_GET['function'];
}

switch ($function){
    case "connexion":
        require_once ("view/base/connexion/connexion.php");
        break;
    case "prem":
        require_once ("view/base/connexion/connexion_first.php");
        break;
    case "id_oublie":
        require_once ("view/base/connexion/connexion_id_oublie.php");
        break;
}

//$return=PdoDomisep->pdoConnectDB();

//var_dump($return);
?>