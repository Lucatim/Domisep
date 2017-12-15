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
        echo ($_POST["identifiant"]);
        if(!empty($_POST["identifiant"])&&isset($_POST["identifiant"])){
            $id=connexion::verifNumClient($_POST["identifiant"]);
            //echo ($id);
            var_dump($id);
            if($id){
                if(connexion::connexionFirst($id[0])){
                    require_once("view/base/connexion/connexion_first.php");
                    break;
                }
                $_SESSION["id"]=$id[0];
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
        echo ($_POST["identifiant"]);
        if(!empty($_POST["identifiant"])&&isset($_POST["identifiant"])){
            $id=connexion::verifNumClient($_POST["identifiant"]);
            //echo ($id);
            var_dump($id);
            if($id){
                //controle premiere connexion
                var_dump(connexion::connexionFirst($id[0]));
                $firstCon=connexion::connexionFirst($id[0]);
                if($firstCon[0]==true){
                    $_SESSION["id"]=$id[0];
                    $nomPrenom=connexion::getNomPrenom($_SESSION["id"]);
                    $_SESSION["nom"]=$nomPrenom["name"];
                    $_SESSION["prenom"]=$nomPrenom["surname"];
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
        if(!empty($_POST["identifiant"])&&isset($_POST["identifiant"])){

            $pass=connexion::verifPass($_SESSION["id"],$_POST["identifiant"]);

            if($pass){
                $_SESSION["pass"]=$pass[0];
                $conn=connexion::connexionFinal($_SESSION["id"],$_SESSION["pass"]);
                var_dump($conn);
                if($conn){
                    $_SESSION["role"]=$conn['manager'];
                    $_SESSION["admin"]=$conn['admin'];
                    var_dump($_SESSION);
                    //header("Refresh:0");
                    ?>
                    <script src="js/redirectToAccueil.js" ></script>
                    <?php
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


}

//$return=PdoDomisep->pdoConnectDB();

//var_dump($return);
$return=PdoDomisep::pdoConnectDB();
var_dump($return);
$pdo=new PdoDomisep();
var_dump($pdo->pdoConnectDB());
$pdo->pdoConnectDB();
?>