<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 27/11/2017
 * Time: 11:01
 */

//Appel de la classe PDO perso pour connexion BDD
require_once 'model/PdoDomisep.php';
require_once 'model/connexion.php';
require_once 'model/helper.php';
require_once 'model/utilisateur.php';

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

    case "verif_id":
        $error="";
        //echo ($_POST["identifiant"]);
        if(!empty($_POST["identifiant"])&&isset($_POST["identifiant"])){
            $id=connexion::verifNumClient($_POST["identifiant"]);
            //echo ($id);
            //var_dump($id);
            if($id){
                $firstCon=connexion::connexionFirst($id[0]);
                var_dump(connexion::connexionFirst($id[0]));
                if($firstCon[0]==true){
                    require_once("view/base/connexion/connexion_first.php");
                    break;
                }
                $_SESSION["id"]=$id[0];

                $nomPrenom=connexion::getNomPrenom($_SESSION["id"]);
                $_SESSION["nom"]=$nomPrenom["name"];
                $_SESSION["prenom"]=$nomPrenom["surname"];

                $_SESSION["img"]=connexion::getImage($_SESSION["id"]);

                //$_SESSION["profilSelect"] = profil::getProfilComplet($_SESSION["id"]);

                require_once ("view/base/connexion/connexion_password.php");
                break;
            }
            else{
                //identifie erreur pour afficher message correspondant
                $error="id";
                require_once ("view/base/connexion/connexion.php");
                break;
            }
        }
        else{
            $error="id_nul";
            require_once ("view/base/connexion/connexion.php");
            break;
        }
        break;

    //cas ou utilisateur se connecte pour la premiere fois
    case "verif_id_first":
        $error="";
        //echo ($_POST["identifiant"]);
        if(!empty($_POST["identifiant"])&&isset($_POST["identifiant"])){
            $id=connexion::verifNumClient($_POST["identifiant"]);
            //echo ($id);
            //var_dump($id);
            if($id){
                //controle premiere connexion
                //var_dump(connexion::connexionFirst($id[0]));
                $firstCon=connexion::connexionFirst($id[0]);
                if($firstCon[0]==true){
                    $_SESSION["id"]=$id[0];

                    $nomPrenom=connexion::getNomPrenom($_SESSION["id"]);
                    $_SESSION["nom"]=$nomPrenom["name"];
                    $_SESSION["prenom"]=$nomPrenom["surname"];

                    $_SESSION["img"]=connexion::getImage($_SESSION["id"]);

                    require_once ("view/base/connexion/connexion_password.php");
                    break;

                }
                else{
                    //Compte deja valide
                    $error="account_exist";
                    require_once("view/base/connexion/connexion.php");
                    break;
                }
            }
            else{
                //identifie erreur pour afficher message correspondant, ici id invalide
                $error="id";
                require_once ("view/base/connexion/connexion_first.php");
                break;
            }
        }
        else{
            //id formulaire non renseigne
            $error="id_nul";
            require_once ("view/base/connexion/connexion_first.php");
            break;
        }
        break;

    //verification du mot de passe
    case "verif_pass":
        var_dump($_SESSION);
        if(!empty($_POST["identifiant"])&&isset($_POST["identifiant"])){

            $pass=connexion::verifPass($_SESSION["id"],$_POST["identifiant"]);

            if($pass){
                $_SESSION["pass"]=$pass[0];
                $conn=connexion::connexionFinal($_SESSION["id"],$_SESSION["pass"]);
                //var_dump($conn);
                if($conn){
                    $_SESSION["role"]=$conn['manager'];
                    $_SESSION["admin"]=$conn['admin'];

                    $date_connexion = connexion::getDatetimeNow($_SESSION["id"]);

                    $infoSlide = connexion::getDateSlide($_SESSION["id"]);

                    $_SESSION["date_register"]=$infoSlide["date_reg"];
                    $_SESSION["date_logged"]=connexion::getDatetimeNow($_SESSION["id"]);

                    $_SESSION["date_register"] = helper::convertDate($_SESSION["date_register"]);
                    $_SESSION["date_logged"] = helper::convertDateTime($_SESSION["date_logged"]);
                    //$_SESSION["date"]=$date_connexion;
                    //var_dump($_SESSION);
                    //header("Refresh:0");
                    var_dump(connexion::connexionFirst($_SESSION["id"]));
                    $premConnexionOption=connexion::connexionFirst($_SESSION["id"])["first_log"];
                    if ($premConnexionOption==1){
                        echo 'test connexion first';
                        require_once ('view/base/connexion/connexion_modif_pass.php');
                    }
                    else{

                    ?>
                        <script src="js/redirectToAccueil.js" ></script>
                    <?php
                        //
                    }
                    //require_once ("view/base/accueil.php");
                    //header('Location: index_mvc.php');
                    //exit();
                }
            }
            else{
             $error="pass";
             require_once ("view/base/connexion/connexion_password.php");
            }

        }
        else{
            $error="pass_nul";
        }
        break;

    case "deconnexion":
        session_destroy();
        ?>
        <script src="js/redirectToAccueil.js" ></script>
        <?php
        //require_once("view/base/accueil.php");
        break;

    case "modif_pass":
        if(!empty($_POST["identifiant"])&&isset($_POST["identifiant"])){
            utilisateur::modifPass($_SESSION["id"],$_POST["identifiant"]);
            utilisateur::modifPremiereConnexion($_SESSION["id"]);
        }

        ?>
        <script src="js/redirectToAccueil.js" ></script>
        <?php
        break;

}

//$return=PdoDomisep->pdoConnectDB();

//var_dump($return);

?>