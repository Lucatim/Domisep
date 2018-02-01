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

            <h2>Mes domiciles</h2>

            <div class="groupe_carre_image">
                <?php
                //Boucle affichage domicile
                //var_dump($_SESSION["listeDomicile"]);
                if (isset($_SESSION["listeDomicile"])&& !empty($_SESSION["listeDomicile"])){
                    //var_dump($_SESSION["listeDomicile"]);
                    //nombre image aléatoire
                    $i=0;
                    foreach ($_SESSION["listeDomicile"] as $domicile){
                        //var_dump($domicile);
                        //var_dump($domicile);
                        if($i==0){
                            ?>

                            <a href="index_mvc.php?target=utilisateur&function=domicile&home=<?php echo ($domicile["id_home"])?>" class="carre_image">
                                <img src="view/assets/images/domicile/domicile-<?php echo($domicile["id_home"]) ?>.jpg" alt="unknown">
                                <div class="bandeau_bas">
                                    <p><?php echo ($domicile["name"])?></p>
                                </div>
                            </a>

                            <?php
                        }
                        else{
                            ?>
                            <a href="index_mvc.php?target=utilisateur&function=domicile&home=<?php echo ($domicile["id_home"])?>" class="carre_image">
                                <img src="view/assets/images/domicile/domicile-<?php echo($domicile["id_home"]) ?>.jpg" alt="unknown">

                                <div class="bandeau_bas">
                                    <p><?php echo ($domicile["name"])?></p>
                                </div>
                            </a>
                            <?php
                        }

                        $i+=1;
                    }
                }
                ?>


            </div>
        </div>
</section>
