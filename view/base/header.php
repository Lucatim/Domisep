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
    <?php
    //Script+CSS select2
    ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <?php
    //Script+CSS Chartist.js
    ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

    <?php
        //Script jQuery
        ?>
        <script
                src="https://code.jquery.com/jquery-3.2.1.js"
                integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
                crossorigin="anonymous"></script>

        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- Definition of the viewport for a mobile screen -->
        <link rel="stylesheet" href="view/assets/css/style.css"/>
        <?php
        //Modification du CSS du header en fonction de la page
        //var_dump($_SESSION); // Permet d'afficher les variables de la session
        if (isset($_SESSION['role']) && (!empty($_SESSION['role']) || $_SESSION['role'] === "0")) {
            $role = $_SESSION["role"];
            //echo ("je suis rentré car la variable session contenant le role existe");
        }
        if (isset($_GET["target"]) && !empty($_GET["target"])) {
            $cible = $_GET["target"];
            if ($cible === "connexion") {
                echo('<link rel="stylesheet" href="view/assets/css/' . $cible . '.css" />');
            }

            if ($cible === "profil") {
                if (isset($_GET['function']) && !empty($_GET['function'])) {
                    $cible = $_GET['function'];

                    if ($cible === "facture") {
                        echo('<link rel="stylesheet" href="view/assets/css/' . $cible . '.css" />');
                    }

                }
            }

            if ($cible === "base") {
                if (isset($_GET['function']) && !empty($_GET['function'])) {
                    $cible = $_GET['function'];

                    if ($cible === "notre_equipe" || $cible === "nous_contacter") {
                        echo('<link rel="stylesheet" href="view/assets/css/' . $cible . '.css" />');
                    }

                }
            }


        }
        /*
        else{
            echo ('<link rel="stylesheet" href="view/assets/css/index.css" />');
        }*/

        ?>

    <link rel="stylesheet" href="view/assets/css/screen_large_desktop.css" media="(min-width: 992px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_desktop.css" media="(min-width: 768px) and (max-width: 992px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_tablet.css" media="(min-width: 480px) and (max-width: 768px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_phone.css" media="(max-width: 480px)"/>
    <link rel="stylesheet" href="view/assets/css/index.css" />
    <link rel="stylesheet" href="view/assets/css/screen_large_desktop.css" media="(min-width: 992px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_desktop.css" media="(min-width: 768px) and (max-width: 992px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_tablet.css" media="(min-width: 480px) and (max-width: 768px)"/>
    <link rel="stylesheet" href="view/assets/css/screen_phone.css" media="(max-width: 480px)"/>
    <link rel="stylesheet" href="view/assets/css/messagerie.css">

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="apple-touch-icon" sizes="57x57" href="view/assets/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="view/assets/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="view/assets/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="view/assets/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="view/assets/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="view/assets/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="view/assets/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="view/assets/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="view/assets/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="view/assets/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="view/assets/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="view/assets/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="view/assets/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="view/assets/images/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <title>Domisep - Accueil</title>
        <?php
        //Gerer le titre en fonction de la page
        //<title>Domisep - Connexion</title>
        ?>
    </head>
<?php
//Définition du header en fonction la connexion ou non

//Si l'utilisateur est connecté
if (isset($_SESSION['role']) && (!empty($_SESSION['role']) || $_SESSION['role'] === "0")) {
    //echo ($_SESSION["role"]);
    $role = $_SESSION["role"];
    //echo ($role);
    //Utilisateur n'est pas gestionnaire
    if ($role === "0") {
        ?>

        <header>
            <div id="bloc_header">
                <div id="div_logo_domisep">
                    <img src="view/assets/images/domisep_logo.png" alt="logo_domisep">
                </div>

                <ul id=nav_header>
                    <li><a href="index_mvc.php"><i class="material-icons">home</i><span class="nav_text">Accueil</span></a>
                    </li>
                    <li><a href="index_mvc.php?target=profil"><i class="material-icons">account_circle</i><span
                                    class="nav_text">Mon profil</span></a></li>
                    <li><a href="index_mvc.php?target=utilisateur"><i class="material-icons">domain</i><span
                                    class="nav_text">Gérer mon dom<span class="texte_vert">icile</span></span></a></li>
                    <li><a href="index_mvc.php?target=messagerie"><i class="material-icons">message</i><span
                                    class="nav_text">Messagerie</span></a></li>
                    <li><a href="index_mvc.php?target=connexion&function=deconnexion"><i class="material-icons">power_settings_new</i><span
                                    class="nav_text">Me déconnecter</span></a></li>
                </ul>
            </div>
        </header>
        <?php

    } //Utilisateur est gestionnaire
    else {
        if ($role === 1) {
            ?>

        <?php }
    }

    ?>
    <?php
} else {
    ?>
    <body>
    <div id="bloc_page">

        <header>
            <div id="bloc_header">
                <div id="div_logo_domisep">
                    <img src="view/assets/images/domisep_logo.png" alt="logo_domisep">
                </div>

                <ul id=nav_header>
                    <li><a href="index_mvc.php"><i class="material-icons">home</i><span class="nav_text">Accueil</span></a>
                    </li>
                    <li><a href="index_mvc.php#bloc_a_propos"><i class="material-icons">info</i><span class="nav_text">A propos</span></a>
                    </li>
                    <li><a href="index_mvc.php#bloc_pourquoi_domisep"><i class="material-icons">help</i><span
                                    class="nav_text">Pourquoi Dom<span class="texte_vert">isep ?</span></span></a></li>
                    <li><a href="index_mvc.php#bloc_nos_solutions"><i class="material-icons">lightbulb_outline</i><span
                                    class="nav_text">Nos solutions</span></a></li>
                    <li><a href="index_mvc.php?target=connexion"><i class="material-icons">power_settings_new</i><span
                                    class="nav_text">Me connecter</span></a></li>
                </ul>
            </div>
        </header>
    <?php
}
//Gestion de l'image sous le header / vignette image de profil
if (isset($_GET["target"]) && !empty($_GET["target"])) {
    $cible = $_GET["target"];

    switch ($cible) {
        case "connexion":
            echo('<div id="slide_accueil"><div id="slide_circle"><img src="view/assets/images/unknown.jpg" alt="unknown"></div></div>');
            break;

        case "profil":
            var_dump($_SESSION["img"]);
            var_dump($_SESSION["nom"]);
            var_dump($_SESSION["date_register"]);
            var_dump($_SESSION["date_logged"]);
            echo('
                <div id="slide_accueil">
                   <div id="slide_haut">
                        <div id="derniere_connexion">
                            <p>Dernière connexion : '. $_SESSION["date_logged"] .'</p>
                        </div>
            
                        <div id="date_inscription">
                            <p>Date d\'inscription : '. $_SESSION["date_register"] .'</p>
                        </div>
                    </div>
            
                    <div id="slide_circle">
                        <img src='.$_SESSION["img"]["pic"].' alt="image_slide">
                    </div>
            
                    <div id="slide_bas">
                        <div id="prenom_nom">
                            <p>'. $_SESSION["prenom"].'  '.$_SESSION["nom"].'</p>
                        </div>
            
                        <div id="numero_client">
                            <p>N° client : '. $_SESSION["id"] .'</p>
                        </div>
                    </div>
                </div>');
            break;

        default:
            echo('<div id="slide_accueil"></div>');
    }
} else {
    echo('<div id="slide_accueil"></div>');
}
?>