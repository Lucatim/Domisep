<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 08/01/2018
 * Time: 15:02
 */
//Script permettant de gerer l'affichage du graphique
//Le premier permet de recuperer id du capteur
//Le deuxieme recupere les donnees et gere l'affichage du graphique

if ((isset($_SESSION["domiSelect"])&& !empty($_SESSION["domiSelect"])) && (isset($_GET["piece"])&& !empty($_GET["piece"])) && (isset($_SESSION["pieceSelect"])&& !empty($_SESSION["pieceSelect"]))) {
    //$numCapteur=$_GET["capteur"];
    ini_set('xdebug.var_display_max_depth', 15);

    $piece=$_SESSION["pieceSelect"];
    var_dump($piece)
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
                            <img src="<?php //echo($capteur["pic"]); ?>" alt="unknown">

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
                    </div>
                </div>
                <?php
                //Initialisation variable permettant de stocker l'information des problèmes au niveau des capteurs sur une piece
                $defaut["defaut"]=false;
                $defaut["nbr"]=0;

                //Boucle permettant de connaitre le nombre de capteurs défectueux
                    foreach ($piece["capteurs"] as $c){
                        if ($c["sensor_on"]==0){
                            $defaut["defaut"]=true;
                            $defaut["nbr"]+=1;
                        }
                    }


                //Si il a y a un problème, on informe
                if ($defaut["defaut"]==true){
                    ?>

                    <div id="capteurs_deficients">
                        <p class="texte_rouge">Capteurs déficients : <?php echo ($defaut["nbr"]); ?></p>
                        <p class="texte_rouge">Domisep est actuellement en train de réparer la panne<br>
                            Nous nous excusons pour la gêne occasionnée.</p>
                    </div>

                <?php } ?>
                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">mode_edit</i>Editer mon capteur</a>
                </div>

                <hr>

                <h2>Mes capteurs</h2>

                <div class="balise_p_flex_33">
                    <?php

                        $pName=$piece["name"];
                        foreach ($piece["capteurs"] as $c){
                            if ($c["sensor_on"]==1){
                                echo ('<p>'.$c["name"].' : <span class="texte_gris">'.$c["data"].' '. $c["unite"].'</span></p>');
                            }
                            else{
                                if($c["sensor_on"]==0){
                                    echo ('<p class="texte_rouge">'.$pName.' : ERREUR</p>');
                                }
                            }
                        }

                    ?>
                </div>

                <div class="groupe_bouton_vert">
                    <div class="bouton_vert">
                        <a href="#"><i class="material-icons">alarm_add</i>Planifier</a>
                    </div>

                    <div class="bouton_vert">
                        <a href="#"><i class="material-icons">delete</i>Alerte</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php }                 //<div id="curve_chart" style="width: 100%; height: 500px"></div>?>