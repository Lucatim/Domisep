<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 15/01/2018
 * Time: 11:58
 */

require_once 'model/PdoDomisep.php';
require_once 'model/profil.php';
require_once 'model/utilisateur.php';
require_once 'model/admin.php';

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

        //var_dump($_POST);
        if(isset($_POST)&&!empty($_POST)) {
            $data = $_POST;
            $_SESSION["ajouter_utilisateur"] = $_POST;
            //var_dump($data);


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
                verifChampRempli($_POST["gender"]) &&
                verifChampRempli($_POST["address"]) &&
                verifChampRempli($_POST["first_name"]) &&
                verifChampRempli($_POST["postal_code"]) &&
                verifChampRempli($_POST["last_name"]) &&
                verifChampRempli($_POST["city"]) &&
                verifChampRempli($_POST["date_of_birth"]) &&
                verifChampRempli($_POST["country"]) &&
                verifChampRempli($_POST["email"]) &&
                verifChampRempli($_POST["telephone_number"])
            ) {
                //echo("ajouter utilisateur");
                admin::ajouterUtilisateur($_POST);
            }
        }
        break;

    case "recherche_utilisateur":
        //var_dump($_POST);
        if (isset($_POST["id_utilisateur"])&&!empty($_POST["id_utilisateur"])){
            $idUtilisateur=$_POST["id_utilisateur"];
            $_SESSION["utilisateur_selection"]=profil::getProfilComplet($idUtilisateur);
            $_SESSION["utilisateur_selection"]["listeDomicile"]=utilisateur::getDomicileClient($idUtilisateur);
            require_once 'view/base/admin/gerer_mon_domisep/gerer_utilisateur.php';
        }
        else{
            if(isset($_SESSION["utilisateur_selection"]) && !empty($_SESSION["utilisateur_selection"])){
                require_once 'view/base/admin/gerer_mon_domisep/gerer_utilisateur.php';
            }
        }

        break;

    case "ajouter_domicile":
        require_once 'view/base/admin/gerer_mon_domisep/ajouter_domicile.php';
        break;

    case "ajouter_domicile_form":
        //var_dump($_SESSION["utilisateur_selection"]);
        //var_dump($_POST);
        if (isset($_POST)&&!empty($_POST)){
        //var_dump($_SESSION["utilisateur_selection"]);
        //var_dump($_POST);
        admin::ajouterDomicile($_SESSION["utilisateur_selection"]["id_client"],$_POST);
        }
        require_once 'view/base/admin/gerer_mon_domisep/gerer_utilisateur.php';
        break;

    case "gerer_domicile_utilisateur":
        if (isset($_GET["home"])&&!empty($_GET["home"])){
            $_SESSION["utilisateur_selection"]["domicile_selection"]=utilisateur::getDomicileComplet($_GET["home"]);
            require_once 'view/base/admin/gerer_mon_domisep/gerer_domicile_utilisateur.php';
        }
        break;

    case "ajouter_piece":
        require_once 'view/base/admin/gerer_mon_domisep/ajouter_piece.php';
        break;

    case "ajouter_piece_form":
        //var_dump($_SESSION["utilisateur_selection"]);
        //var_dump($_POST);
        if (isset($_POST)&&!empty($_POST)){
            //var_dump($_SESSION["utilisateur_selection"]["domicile_selection"]);
            //var_dump($_POST);
            admin::ajouterPiece($_SESSION["utilisateur_selection"]["domicile_selection"]["id_home"],$_POST["id_type_piece"]);
            //var_dump($_SESSION["utilisateur_selection"]);
            //var_dump($_POST);
            //admin::ajouterDomicile($_SESSION["utilisateur_selection"]["id_client"],$_POST);
        }
        require_once 'view/base/admin/gerer_mon_domisep/gerer_utilisateur.php';
        break;

    case "gerer_piece_utilisateur":
        if(isset($_GET["piece"]) && !empty($_GET["piece"])){
            /*
            $_SESSION["pieceSelect"]=
            $_SESSION["pieceSelect"]["capteurs"]=utilisateur::getCapteursPiece($_GET["piece"]);
            */
            $idPiece=$_GET["piece"];
            $_SESSION["utilisateur_selection"]["domicile_selection"]["piece_selection"]=utilisateur::getCaracteristiquePiece($_GET["piece"]);
            $_SESSION["utilisateur_selection"]["domicile_selection"]["piece_selection"]["capteurs"]=utilisateur::getCapteursPiece($_GET["piece"]);
            //$_SESSION["utilisateur_selection"]["domicile_selection"]["piece_selection"]+=$idPiece;
            $_SESSION["utilisateur_selection"]["domicile_selection"]["piece_selection"]["idPiece"]=$idPiece;

            require_once 'view/base/admin/gerer_mon_domisep/gerer_piece_utilisateur.php';
        }

        break;

    case "ajouter_capteur":
        require_once 'view/base/admin/gerer_mon_domisep/ajouter_capteur.php';
        break;

    case "ajouter_capteur_form":
        if(isset($_POST)&&!empty($_POST)){
            //var_dump($_POST);
            //var_dump($_SESSION["utilisateur_selection"]["domicile_selection"]["piece_selection"]);
            //$_POST["id_type_capteur"];
            $piece=$_SESSION["utilisateur_selection"]["domicile_selection"]["piece_selection"];
            admin::ajouterCapteur($piece["idPiece"],$_POST["id_type_capteur"]);
            //admin::ajouterCapteur();
        }
        require_once 'view/base/admin/gerer_mon_domisep/gerer_utilisateur.php';
        break;
}


function verifChampRempli($champ){
    if(isset($champ) && !empty($champ)){
        return true;
    }
    return false;
}