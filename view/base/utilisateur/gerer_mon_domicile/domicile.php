<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 14/12/2017
 * Time: 23:57
 */
?>
<?php if (isset($_SESSION["domiSelect"]) && !empty($_SESSION["domiSelect"])){
    //var_dump($_SESSION["domiSelect"]);

    $domi=$_SESSION["domiSelect"];
?>
<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <h2>Informations du domicile</h2>

            <div class="groupe_carre_image_texte_droite">
                <div class="grand_carre_image">
                    <div class="carre_image red">
                        <img src="view/assets/images/domicile-1.jpg" alt="unknown">

                        <div class="bandeau_bas red">
                            <p>
                                <?php
                                    echo ($domi['name']);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <?php echo ('
                    <div class="texte_droite_cgi">
                        <p>Adresse : <span class="texte_gris">'.$domi["addr"].' </span></p>
                        <p>Code postal : <span class="texte_gris">'.$domi["post_code"].' </span></p>
                        <p>Ville : <span class="texte_gris">'.$domi["state"].'</span></p>
                        <p>Pays : <span class="texte_gris">'.$domi["country"]. '</span></p>
                        <p class="p_padding_top">Nombre de pièces : <span class="texte_gris">XX</span></p>
                        <p>Nombre de capteurs : <span class="texte_gris">XX</span></p>
                    </div>');
                ?>
            </div>

            <div class="bouton_vert">
                <a href="#"><i class="material-icons">mode_edit</i>Editer</a>
            </div>

            <hr>

            <h2>Mes capteurs</h2>

            <div class="groupe_carre_image">
                <a href="capteur.html" class="carre_image red">
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

                <a href="#" class="carre_image">
                    <img src="view/assets/images/capteur_pression.jpg" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Pression</p>
                    </div>
                </a>

                <a href="#" class="carre_image">
                    <img src="view/assets/images/capteur_lumiere.jpg" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Lumière</p>
                    </div>
                </a>

                <a href="#" class="carre_image">
                    <img src="view/assets/images/capteur_fumee.jpg" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Fumée</p>
                    </div>
                </a>

                <a href="#" class="carre_image">
                    <img src="view/assets/images/capteur_intrusion.jpg" class="portrait" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Intrusion</p>
                    </div>
                </a>
            </div>

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
                    <img src="view/assets/images/consommation-electricite.jpg" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Electricité</p>
                    </div>
                </a>

                <a href="#" class="carre_image">
                    <img src="view/assets/images/consommation-eau.jpg" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Eau</p>
                    </div>
                </a>

                <a href="#" class="carre_image">
                    <img src="view/assets/images/consommation-gaz.jpg" alt="unknown">

                    <div class="bandeau_bas">
                        <p>Gaz</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<?php }?>