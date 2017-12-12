<?php
/**
 * Instauration de l'index du Model MVC, qui va servir de routeur.
 * V:1.0
 * User: Lait-Noisette
 * Date: 27/11/2017
 * Time: 10:48
 */
/*
if(session_status()===PHP_SESSION_DISABLED){
    session_start();
}*/

session_start();
include_once('view/base/header.php');

// On identifie le contrôleur à appeler dont le nom est contenu dans cible passé en GET
if(isset($_GET['target']) && !empty($_GET['target'])) {
    // Si la variable cible est passé en GET
    $url = $_GET['target']; //user, sensor, etc.
    require_once('control/'.$url.'.php');

}
/*else {
    // Si aucun contrôleur défini en GET, on bascule sur utilisateurs
    $url = 'utilisateurs';
}*/
else{

    include_once ('view/base/accueil.php');


}

include_once ('view/base/footer.php');

?>