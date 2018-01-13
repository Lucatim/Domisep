<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 14/12/2017
 * Time: 19:10
 */

?>
<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <h2>Mes Résidences</h2>

            <div class="groupe_carre_image">
                <?php
                //Boucle affichage residence

                if (isset($_SESSION["listeResidence"])&& !empty($_SESSION["listeResidence"])){
                    //nombre image aléatoire
                    $i=0;
                    foreach ($_SESSION["listeResidence"] as $residence){
                        if($i==0){
                            ?>

                            <a href="index_mvc.php?target=utilisateur&function=residence&residence=<?php echo ($residence["id_residence"])?>" class="carre_image red">
                                <img src="view/assets/images/domicile-<?php echo(($i%4)+1) ?>.jpg" alt="unknown">
                                <div class="bandeau_bas red">
                                    <p><?php echo ($residence["name"])?></p>
                                </div>
                            </a>

                            <?php
                        }
                        else{
                            ?>
                            <a href="index_mvc.php?target=utilisateur&function=domicile&residence=<?php echo ($residence["id_residence"])?>" class="carre_image">
                                <img src="view/assets/images/domicile-<?php echo(($i%4)+1) ?>.jpg" alt="unknown">

                                <div class="bandeau_bas">
                                    <p><?php echo ($residence["name"])?></p>
                                </div>
                            </a>
                            <?php
                        }

                        $i+=1;
                    }
                }
                ?>


            </div>

            <div class="groupe_bouton_vert">
                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">add_circle</i>Ajouter</a>
                </div>

                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">delete</i>Supprimer</a>
                </div>
            </div>

        </div>
</section>
