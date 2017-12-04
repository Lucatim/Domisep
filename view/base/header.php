<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 27/11/2017
 * Time: 10:19
 */

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Definition of the viewport for a mobile screen -->
    <link rel="stylesheet" href="view/assets/css/style.css" />
    <?php
    //Modification du CSS du header en fonction de la page
    if(isset($_SESSION["role"])&& !empty($_SESSION["role"])) {
        $role=$_SESSION["role"];
        if (isset($_POST["cible"]) && !empty($_POST["cible"])) {
            $cible = $_POST["cible"];
            echo('<link rel="stylesheet" href="view/assets/css/' . $cible . '.css" />');
        }
    }
    else{
<<<<<<< HEAD
        echo ('<link rel="stylesheet" href="view/assets/css/index.css" />');
=======
        echo ('<link rel="stylesheet" href="../assets/css/index.css" />');
>>>>>>> origin/master
    }

    ?>

<<<<<<< HEAD
    <link rel="stylesheet" href="view/assets/css/screen_large_desktop.css" media="(min-width: 992px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_desktop.css" media="(min-width: 768px) and (max-width: 992px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_tablet.css" media="(min-width: 480px) and (max-width: 768px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_phone.css" media="(max-width: 480px)"/>
    <link rel="stylesheet" href="view/assets/css/index.css" />
    <link rel="stylesheet" href="view/assets/css/screen_large_desktop.css" media="(min-width: 992px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_desktop.css" media="(min-width: 768px) and (max-width: 992px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_tablet.css" media="(min-width: 480px) and (max-width: 768px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_phone.css" media="(max-width: 480px)"/>
=======
    <link rel="stylesheet" href="../assets/css/screen_large_desktop.css" media="(min-width: 992px)"/>
    <link rel="stylesheet" href="../assets/css/screen_desktop.css" media="(min-width: 768px) and (max-width: 992px)"/>
    <link rel="stylesheet" href="../assets/css/screen_tablet.css" media="(min-width: 480px) and (max-width: 768px)"/>
    <link rel="stylesheet" href="../assets/css/screen_phone.css" media="(max-width: 480px)"/>
>>>>>>> origin/master

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="../../view/assets/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../../view/assets/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../view/assets/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../view/assets/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../view/assets/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../view/assets/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../../view/assets/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../view/assets/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../view/assets/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../../view/assets/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../view/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../../view/assets/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../view/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../view/assets/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>Domisep - Accueil</title>
</head>

<?php
//Définition du header en fonction la connexion ou non

//Si l'utilisateur est connecté
if(isset($_SESSION["role"]) && !empty($_SESSION["role"])) {
    $role=$_SESSION["role"];
    //Utilisateur n'est pas gestionnaire
    if($role===false){


    }
    //Utilisateur est gestionnaire
    else{
        if($role===true){

        }
    }

    ?>
    <div id="slide_accueil">
        <div id="slide_circle">
            <img src="view/assets/images/unknown.jpg" alt="unknown">
        </div>
    </div>
<?php
}
else{
    ?>
<body>
<div id="bloc_page">

    <header>
        <div id="bloc_header">
            <div id="div_logo_domisep">
                <img src="view/assets/images/domisep_logo.png" alt="logo_domisep">
            </div>

            <ul id=nav_header>
                <li><a href="index_mvc.php"><i class="material-icons">home</i><span class="nav_text">Accueil</span></a></li>
                <li><a href="index_mvc.php#bloc_a_propos"><i class="material-icons">info</i><span class="nav_text">A propos</span></a></li>
                <li><a href="index_mvc.php#bloc_pourquoi_domisep"><i class="material-icons">help</i><span class="nav_text">Pourquoi Dom<span class="texte_vert" >isep ?</span></span></a></li>
                <li><a href="index_mvc.php#bloc_nos_solutions"><i class="material-icons">lightbulb_outline</i><span class="nav_text">Nos solutions</span></a></li>
                <li><a href="connexion/connexion.html"><i class="material-icons">power_settings_new</i><span class="nav_text">Me connecter</span></a></li>
            </ul>
        </div>
    </header>
<?php
}

?>

<<<<<<< HEAD


=======
<div id="slide_accueil">
    <div id="slide_circle">
        <img src="../assets/images/unknown.jpg" alt="unknown">
    </div>
</div>
>>>>>>> origin/master
