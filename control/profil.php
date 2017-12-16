<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 11/12/2017
 * Time: 10:30
 */

// Appel de la classe PDO perso pour connexion BDD
require_once 'model/PdoDomisep.php';
require_once 'model/profil.php';

// Si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "mon_profil";
} else {
    $function = $_GET['function'];
}

switch ($function){
    case "mon_profil":
        require_once ("view/base/utilisateur/mon_profil.php");
        break;
    case "editer_mon_profil":
        require_once ("view/base/utilisateur/editer_mon_profil.php");
        break;
    case "facture":
        require_once ("view/base/utilisateur/facture.php");
        break;
    case "editer_mes_utilisateurs":
        require_once ("view/base/utilisateur/editer_mes_utilisateurs.php");
        break;
}

?>