<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 11/12/2017
 * Time: 10:30
 */

// Appel de la classe PDO perso pour connexion BDD
require_once 'model/PdoDomisep.php';

// Si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "mon_profil";
} else {
    $function = $_GET['function'];
}

switch ($function){
    case "mentions_legales":
        require_once ("view/base/mentions_legales.php");
        break;
    case "notre_equipe":
        require_once ("view/base/notre_equipe.php");
        break;
    case "nous_contacter":
        require_once ("view/base/nous_contacter.php");
        break;
}


?>