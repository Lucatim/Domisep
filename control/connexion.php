<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 27/11/2017
 * Time: 11:01
 */

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}

?>