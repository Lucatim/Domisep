<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 01/02/2018
 * Time: 12:26
 */

require_once 'model/helper.php';
if ((isset($_SESSION["utilisateur_selection"]["domicile_selection"]["piece_selection"])&& !empty($_SESSION["utilisateur_selection"]["domicile_selection"]["piece_selection"]))) {
    //$numCapteur=$_GET["capteur"];
    //ini_set('xdebug.var_display_max_depth', 15);
    //var_dump($_SESSION["utilisateur_selection"]["domicile_selection"]["piece_selection"]);

    $piece=$_SESSION["utilisateur_selection"]["domicile_selection"]["piece_selection"];

    //var_dump($piece);
    //var_dump($piece)
    ?>


    <section id="content">
        <div id="bloc_content">
            <div id="container_principal">

                <h2>Informations de la pièce</h2>
                <?php

                ?>
                <div class="groupe_carre_image_texte_droite">
                    <div class="grand_carre_image">
                        <div class="carre_image red">
                            <img src="view/assets/images/pieces/<?php echo(helper::remove_accents($piece["name"]))?>.jpg" alt="unknown">

                            <div class="bandeau_bas red">
                                <p><?php echo ($piece["name"]); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="texte_droite_cgi">
                        <p>Capteurs disponibles :</p>
                        <ul>
                            <?php
                            foreach ($piece["capteurs"] as $c){
                                echo ('<li class="texte_gris">'.$c["name"].'</li>');
                            }
                            ?>
                        </ul>

                        <p>Nombre de capteurs : <span class="texte_gris">XX</span></p>
                        <div class="groupe_bouton_vert">
                            <div class="bouton_vert">
                                <a href="index_mvc.php?target=admin&function=ajouter_capteur"><i class="material-icons">add_circle</i>Ajouter</a>
                            </div>

                            <div class="bouton_vert">
                                <a href="#"><i class="material-icons">delete</i>Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </section>

<?php }                 //<div id="curve_chart" style="width: 100%; height: 500px"></div>?>