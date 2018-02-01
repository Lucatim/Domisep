<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 14/12/2017
 * Time: 23:57
 */
?>
<?php if (isset($_SESSION["residenceSelect"]) && !empty($_SESSION["residenceSelect"])){
    var_dump($_SESSION["residenceSelect"]);

    $res=$_SESSION["residenceSelect"];
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

                <?php echo ('
                    <div class="texte_droite_cgi">
                        <p>Adresse : <span class="texte_gris"> </span></p>
                        <p>Code postal : <span class="texte_gris"> </span></p>
                        <p>Ville : <span class="texte_gris"></span></p>
                        <p>Pays : <span class="texte_gris"></span></p>
                        <p class="p_padding_top">Nombre d\'habitations : <span class="texte_gris">XX</span></p>
                    </div>');
                ?>
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

            <div class="groupe_bouton_vert">
                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">add_circle</i>Ajouter</a>
                </div>

                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">delete</i>Supprimer</a>
                </div>
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