<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 27/11/2017
 * Time: 11:01
 */

//Appel de la classe PDO perso pour connexion BDD
require_once 'model/PdoDomisep.php';
require_once 'model/messagerie.php';
//include_once ('view/base/header.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "messagerie";
} else {
    $function = $_GET['function'];
}

switch ($function) {
    case "messagerie":
        require_once("view/base/messagerie/messagerie.php");
        break;

    case "Nouveau":
        var_dump($_POST);
        var_dump($_SESSION);
        $num_client =$_SESSION['id'];
        $sender = $_SESSION['id'];
        $mess = $_POST['mess'];
        $subject = $_POST['subject'];
        $recipient = $_POST['recipient'];
        $bin = "0";
        messagerie::insertMSG($recipient ,$bin ,$subject , $mess,$num_client, $sender);
        //messagerie::insertMSG();
        require_once("view/base/messagerie/messagerie.php");
        break;

    // case "reception":
    //     var_dump($_POST);
    //     var_dump($_SESSION);
    //     $recipient = $_POST['recipient'];
    //     messagerie::recupMSG($recipient);
    //     //messagerie::insertMSG();
    //     require_once("view/base/messagerie/messagerie.php");
    //     break;

}
?>

