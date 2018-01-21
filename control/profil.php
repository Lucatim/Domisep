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
require_once 'model/helper.php';
require_once 'model/connexion.php';

// Si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "mon_profil";
} else {
    $function = $_GET['function'];
}

switch ($function){
    case "mon_profil":
        if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
            // Récupère toutes les informations du profil
            $profil = profil::getProfilComplet($_SESSION["id"]); // $_SESSION["profilSelect"]
            $_SESSION["profilSelect"] = $profil;

            $_SESSION["birth_form"] = $profil["birth"];
            $_SESSION["birth_form"] = helper::convertDate($_SESSION["birth_form"]);

            // Récupère les utilisateurs secondaires
            $IDutilisateurs_seondaires = profil::getUtilisateursSecondairesID($_SESSION["id"]);
            $_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire1'] = profil::getUtilisateurSecondaireInfo($IDutilisateurs_seondaires['id_second_client_1']);
            $_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire2'] = profil::getUtilisateurSecondaireInfo($IDutilisateurs_seondaires['id_second_client_2']);
            $_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire3'] = profil::getUtilisateurSecondaireInfo($IDutilisateurs_seondaires['id_second_client_3']);

            require_once ("view/base/utilisateur/mon_profil.php");
        }
        break;
    case "editer_mon_profil":
        if( isset($_POST['upload']) )
        {
            $content_dir = 'view/assets/images/client/'; // Dossier où sera déplacé le fichier
            //$taille_max = 2000000; // 2 Mo
            $tmp_file = $_FILES['fichier']['tmp_name'];

            if( !is_uploaded_file($tmp_file) )
            {
                exit("Le fichier $tmp_file est introuvable");
            }

            /*// Vérification de la taille
            $taille_fichier = filesize($_FILES['fichier']['tmp_name']);
            echo $taille_fichier;

            if ($taille_fichier > $taille_max) {
                exit("Vous avez dépassé la taille de fichier autorisée");
            }*/

            /*// Vérification de l'extension
            $type_file = $_FILES['fichier']['type'];

            if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'png') )
            {
                exit("Le fichier n'est pas une image");
            }*/

            // Copie du fichier dans le dossier de destination
            $name_file = pathinfo($_FILES['fichier']['name']);
            $name_file = $_SESSION["profilSelect"]["id_client"] . '_' . $_SESSION["profilSelect"]["surname"] . '_' . $_SESSION["profilSelect"]["name"] . '.' . $name_file['extension'];

            if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
            {
                exit("Impossible de copier le fichier $name_file dans $content_dir");
            }

            echo "Le fichier $name_file a bien été uploadé";

            $tmp_name = $content_dir . $name_file;

            profil::UploadImage($_SESSION["id"], $tmp_name);
            $_SESSION["img"]=connexion::getImage($_SESSION["id"]);
        }

        /* CONTROLE VALEURS FORM */
        $_SESSION["Test_form"] = '__';
        $_SESSION["Test_form_2"] = 'Pas encore de valeur';
        foreach($_POST as $k=>$value) { // $k Couple les valeurs avec l'indice
            //var_dump($value);
            //var_dump($_SESSION["profilSelect"][$k]);
            if (helper::verifyForm($value) ==  TRUE) {
                $_SESSION["Test_form"] = 'Ok';
                //var_dump($_SESSION["profilSelect"][$k]);
                //var_dump($value);
                if ($_SESSION["profilSelect"][$k] !== $value)
                {
                    $_SESSION["req"] = profil::UpdateProfilInfo($_SESSION["id"], $value, $k);
                    $_SESSION["Test_form34"] = $k;
                    $_SESSION["Test_form_2"] = 'Valeur differente';
                }
            }
            else {
                unset($value);
                $_SESSION["Test_form"] = 'Pas Ok';
                break;
            }
        }
        unset($value);

        /* CONTROLE UPLOAD IMAGE */
        /*$target_dir = "view/images/client";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }*/

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