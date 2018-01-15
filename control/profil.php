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
        //var_dump($_GET['client']);
        //var_dump($_SESSION);
        if(isset($_SESSION["id"])&& !empty($_SESSION["id"])){
            // Récupère toutes les informations du profil
            $_SESSION["profilSelect"] = profil::getProfilComplet($_SESSION["id"]);
            //var_dump($_SESSION["profilSelect"]);
            require_once ("view/base/utilisateur/mon_profil.php");
        }
        break;
    case "editer_mon_profil":
        require_once ("view/base/utilisateur/editer_mon_profil.php");
        break;
    case "facture":
        $_SESSION["date_inscription"]=profil::getDateInscription($_SESSION["id"]);
        $datereg=$_SESSION["date_inscription"];
        $datereg=$datereg["date_reg"];
        $datereg=date_parse($datereg);
        $moisreg=$datereg["month"];
        $jourreg=$datereg["day"];
        $anneereg=$datereg["year"];

        $jour=date('d');
        $mois=date('m');
        $annee=idate('Y');

        $tabl= array();
        $tabl[1][1]="Janvier";
        $tabl[1][2]="Fevrier";
        $tabl[1][3]="Mars";
        $tabl[1][4]="Avril";
        $tabl[2][1]="Mai";
        $tabl[2][2]="Juin";
        $tabl[2][3]="Juillet";
        $tabl[2][4]="Aout";
        $tabl[3][1]="Septembre";
        $tabl[3][2]="Octobre";
        $tabl[3][3]="Novembre";
        $tabl[3][4]="Decembre";

        $nbmois= array();
        $nbmois[1][1]="01";
        $nbmois[1][2]="02";
        $nbmois[1][3]="03";
        $nbmois[1][4]="04";
        $nbmois[2][1]="05";
        $nbmois[2][2]="06";
        $nbmois[2][3]="07";
        $nbmois[2][4]="08";
        $nbmois[3][1]="09";
        $nbmois[3][2]="10";
        $nbmois[3][3]="11";
        $nbmois[3][4]="12";

        $_SESSION["Path_PDF"]= array();

        for($i=1;$i<=$mois;$i++)
        {
            $val = profil::getpdfPath($_SESSION["id"], "$annee'-'$mois'-'01'");
            $_SESSION["Path_PDF"][$i]= $val["pdf"];
        }
        require_once ("view/base/utilisateur/facture.php");
        break;

    case "editer_mes_utilisateurs":
        require_once ("view/base/utilisateur/editer_mes_utilisateurs.php");
        break;

    case "abonnement":

        $_SESSION["discount"]=profil::getdiscount($_SESSION["id"]);
        $_SESSION["id_sub"]=profil::getIDsub($_SESSION["id"]);
        $_SESSION["infos_sub"]=profil::getsub($_SESSION["id_sub"]);

        require_once ("view/base/utilisateur/abonnement.php");
        break;
}

?>