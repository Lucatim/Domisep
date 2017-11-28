<?php
/**
 * Instauration de l'index du Model MVC, qui va servir de routeur.
 * V:1.0
 * User: Lait-Noisette
 * Date: 27/11/2017
 * Time: 10:48
 */


// On identifie le contrôleur à appeler dont le nom est contenu dans cible passé en GET
if(isset($_POST['cible']) && !empty($_POST['cible'])) {
    // Si la variable cible est passé en GET
    $url = $_POST['cible']; //user, sensor, etc.
    include ('control/'.$url.'php');

}
/*else {
    // Si aucun contrôleur défini en GET, on bascule sur utilisateurs
    $url = 'utilisateurs';
}*/




?>