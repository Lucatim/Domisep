<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 14/12/2017
 * Time: 23:57
 */
?>
<?php
if (isset($_SESSION["domiSelect"]) && !empty($_SESSION["domiSelect"])) {
    //var_dump($_SESSION["domiSelect"]);

    $domi = $_SESSION["domiSelect"];
    /*var_dump($_SESSION["domiHasResidence"]);
    var_dump($_SESSION["residenceSelectUser"]);
    var_dump($_SESSION["idRes"]);*/


if (isset($_SESSION["residenceSelectUser"]) && !empty($_SESSION["residenceSelectUser"])) {
    $res = $_SESSION["residenceSelectUser"];
}
?>
<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <h2>Informations du domicile</h2>

            <div class="groupe_carre_image_texte_droite">
                <div class="grand_carre_image">
                    <div class="carre_image red">
                        <img src="view/assets/images/domicile/domicile-<?php echo($domi['id_home']) ?>.jpg" alt="unknown">

                        <div class="bandeau_bas red">
                            <p>
                                <?php
                                    echo ($domi['name']);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <?php if ($_SESSION["domiHasResidence"]==1) { // On affiche les coordonnées en fonction de la résidence
                    echo ('
                    <div class="texte_droite_cgi">
                        <p>Adresse : <span class="texte_gris">'.$res["addr"].' </span></p>
                        <p>Code postal : <span class="texte_gris">'.$res["post_code"].' </span></p>
                        <p>Ville : <span class="texte_gris">'.$res["town"].'</span></p>
                        <p>Pays : <span class="texte_gris">'.$res["country"]. '</span></p>
                        <p class="p_padding_top">Nombre de pièces : <span class="texte_gris">'.$domi["nbrPiece"].'</span></p>
                        <p>Nombre de capteurs : <span class="texte_gris">'.$domi["nbrCapteurs"].'</span></p>
                    </div>');
                }
                else { // On affiche les coordonnées en fonction de l'habitation (pas de coordonnées dans la résidence)
                    echo ('
                    <div class="texte_droite_cgi">
                        <p>Adresse : <span class="texte_gris">'.$domi["addr"].' </span></p>
                        <p>Code postal : <span class="texte_gris">'.$domi["post_code"].' </span></p>
                        <p>Ville : <span class="texte_gris">'.$domi["state"].'</span></p>
                        <p>Pays : <span class="texte_gris">'.$domi["country"]. '</span></p>
                        <p class="p_padding_top">Nombre de pièces : <span class="texte_gris">'.$domi["nbrPiece"].'</span></p>
                        <p>Nombre de capteurs : <span class="texte_gris">'.$domi["nbrCapteurs"].'</span></p>
                    </div>');
                }
                ?>
            </div>
<?php /*
            <div class="bouton_vert">
                <a href="#"><i class="material-icons">mode_edit</i>Editer</a>
            </div>
*/ ?>
            <hr>

            <h2>Mes pièces</h2>
            <div class="groupe_carre_image">
            <?php
            //var_dump($domi["pieces"]);
            foreach ($domi["pieces"] as $piece){
                //Condition changement cadre rouge si capteur defectueux
                //Gere lien direction piece
                echo ("<a href='index_mvc.php?target=utilisateur&function=piece&piece=".$piece["id_room"]."' class=\"carre_image\">
                    <img src=\"view/assets/images/pieces/".$piece["name"].".jpg\" alt=\"unknown\">

                    <div class=\"bandeau_bas\">
                        <p>".$piece["name"]."</p>
                    </div>
                </a>");
            }

            if ($domi["pieces"] == NULL)
                echo ('<p>Aucune pièce n\'est associée à votre compte.</p>');
            ?>
            </div>

            <?php
/* Exemple carré rouge/carré vert
            <div class="groupe_carre_image">
                <a href="view/base/utilisateur/gerer_mon_domicile/capteur.html" class="carre_image red">
                    <img src="view/assets/images/capteur_temperature.jpg" alt="unknown">

                    <div class="bandeau_bas red">
                        <p>Température</p>
                    </div>
                </a>

                <a href="#" class="carre_image">
                    <img src="view/assets/images/capteur_humidite.jpg" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Humidité</p>
                    </div>
                </a>
            </div>
*/
            ?>

            <hr>

            <h2>Mes capteurs</h2>
            <div class="groupe_carre_image">
            <?php
            /*foreach ($domi["pieces"] as $piece){
                $nomPiece=$piece["name"];
                foreach ($piece["capteurs"] as $capteur){
                    echo ('<a href="#" class="carre_image">
                    <img src="'.$capteur["pic"].'" alt="unknown">

                    <div class="bandeau_bas">
                        <p>'.$capteur["name"].' ('.$nomPiece.')</p>
                    </div>
                </a>');
                }
            }*/

            foreach ($domi["capteurs"] as $capteur){
                echo ('<a href="index_mvc.php?target=utilisateur&function=capteur&capteur='.$capteur["id_sensor_list"].'" class="carre_image">
                    <img src="'.$capteur["pic"].'" alt="unknown">

                    <div class="bandeau_bas">
                        <p>'.$capteur["name"].'</p>
                    </div>
                </a>');
            }

            if ($domi["capteurs"] == NULL)
                echo ('<p>Aucun capteur n\'est associé à votre compte.</p>');

            ?>
            </div>

            <hr>

            <h2>Ma consommation</h2>

            <div class="groupe_carre_image">
                <a href="#" class="carre_image">
                    <img src="view/assets/images/consommation/consommation-electricite.jpg" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Electricité</p>
                    </div>
                </a>

                <a href="#" class="carre_image">
                    <img src="view/assets/images/consommation/consommation-eau.jpg" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Eau</p>
                    </div>
                </a>

                <a href="#" class="carre_image">
                    <img src="view/assets/images/consommation/consommation-gaz.jpg" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Gaz</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
}
else{


}
?>