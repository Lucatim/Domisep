<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 14/12/2017
 * Time: 23:57
 */
?>
<?php if (isset($_SESSION["residenceSelect"]) && !empty($_SESSION["residenceSelect"])){
    //var_dump($_SESSION["residenceSelect"]);

    $res=$_SESSION["residenceSelect"];

    //var_dump($_SESSION["numberOfHome"]);
?>
<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <h2>Informations de la résidence</h2>

            <div class="groupe_carre_image_texte_droite">
                <div class="grand_carre_image">
                    <div class="carre_image <?php if($res['heat_on']==0){echo 'red';}?>">
                        <img src="view/assets/images/residence/residence-<?php echo($res['id_residence']) ?>.jpg" alt="unknown">

                        <div class="bandeau_bas <?php if($res['heat_on']==0){echo 'red';}?>">
                            <p>
                                <?php
                                    echo ($res['name']);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="texte_droite_cgi">
                    <p>Adresse : <span class="texte_gris"><?php echo $res["addr"] ?></span></p>
                    <p>Code postal : <span class="texte_gris"><?php echo $res["post_code"] ?></span></p>
                    <p>Ville : <span class="texte_gris"><?php echo $res["town"] ?></span></p>
                    <p>Pays : <span class="texte_gris"><?php echo $res["country"] ?></span></p>
                    <p class="p_padding_top">Nombre d'habitations : <span class="texte_gris"><?php echo $_SESSION["numberOfHome"] ?></span></p>
                </div>

            </div>

            <div class="bouton_vert bouton_gris">
                <a href="index_mvc.php?target=utilisateur&function=gerer_ma_residence"><i class="material-icons">undo</i>Retour</a>
            </div>
<?php /*
            <div class="bouton_vert">
                <a href="#"><i class="material-icons">mode_edit</i>Editer</a>
            </div>
*/ ?>
            <hr>

            <h2>Mes Ordres</h2>
            <div class="groupe_carre_image">


            <a href='index_mvc.php?target=utilisateur&function=residence_chauffage' class="carre_image <?php if($res['heat_on']==0){echo 'red';}?>">
                <img src="view/assets/images/capteurs/capteur_temperature.jpg" alt="unknown">
                <div class="bandeau_bas <?php if($res['heat_on']==0){echo 'red';}?> ">
                    <p>Chauffage</p>
                </div>
            </a>
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


            <h2>Consommation de ma résidence</h2>

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