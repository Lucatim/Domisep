<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 15/01/2018
 * Time: 11:58
 */

if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "gerer_mon_domisep";
} else {
    $function = $_GET['function'];
}

switch ($function){
    case "gerer_mon_domisep":
        require_once ("view/base/admin/gerer_mon_domisep/gerer_mon_domisep.php");
        break;

    case "ajouter_utilisateur":
        var_dump($_POST);
        $data=$_POST;
        $_SESSION["ajouter_utilisateur"]=$_POST;

        //Verification que tous les champs soient remplis
    /*
        $nbChampRempli=0;
        foreach ($_POST as $champ){
            if (verifChampRempli($champ)){
                $nbChampRempli++;
            }
        }
        if($nbChampRempli==count($_POST)){

        }
    */
    if (
        verifChampRempli($_POST["gender"])&&
        verifChampRempli($_POST["address"])&&
        verifChampRempli($_POST["first_name"])&&
        verifChampRempli($_POST["postal_code"])&&
        verifChampRempli($_POST["last_name"])&&
        verifChampRempli($_POST["city"])&&
        verifChampRempli($_POST["date_of_birth"])&&
        verifChampRempli($_POST["country"])&&
        verifChampRempli($_POST["email"])&&
        verifChampRempli($_POST["telephone_number"])
    ){
        echo ("ajouter utilisateur");
    }
    else{

    }
        break;

    case "recherche_utilisateur":
        var_dump($_POST);
        break;
}


function verifChampRempli($champ){
    if(isset($champ) && !empty($champ)){
        return true;
    }
    return false;
}