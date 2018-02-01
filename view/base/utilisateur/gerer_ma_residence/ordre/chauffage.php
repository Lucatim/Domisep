<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 13/01/2018
 * Time: 11:43
 */
?>

<?php if (isset($_SESSION["residenceSelect"]) && !empty($_SESSION["residenceSelect"])){
    var_dump($_SESSION["residenceSelect"]);

    $res=$_SESSION["residenceSelect"];
    ?>

    <script type='text/javascript'>
        var idResidencePage = "<?php echo $res["id_residence"] ?>"; //placer echo entre guillemet
    </script>
    <script src="js/ordreChauffage.js" ></script>

    <section id="content">
        <div id="bloc_content">
            <div id="container_principal">

                <h2>Mes ordres - Chauffage</h2>

                <div class="groupe_carre_image_texte_droite">
                    <div class="red_indice grand_carre_image <?php if ($res["heat_on"]==0){echo "red";}  ?>">
                        <div class="red_indice carre_image <?php if ($res["heat_on"]==0){echo "red";}  ?>">
                            <img src="view/assets/images/domicile-1.jpg" alt="unknown">

                            <div class="red_indice bandeau_bas <?php if ($res["heat_on"]==0){echo "red";}  ?>">
                                <p>
                                    <?php
                                    echo ($res['name']);
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="texte_droite_cgi">
                        <p class="p_padding_top">Résidence : <span class="texte_gris"><?php echo ($res["name"]) ?> </span></p>
                        <div class="groupe_bouton_vert">
                        <div id="chauffagePosition" class="<?php if($res["heat_on"]==1){ echo "bouton_vert"; }else{echo "bouton_rouge";} ?>">
                            <a href="#chauffagePosition"><i class="material-icons">cached</i><span id="textChauffagePosition"><?php if($res["heat_on"]==1){ echo "Chauffage Activé"; }else{echo "Chauffage Désactivé";}?></span></a>
                        </div>
                        </div>

                        <div id="ordre_chauf" class="<?php /* Si le chauffage est desactivé on cache les options */ if($res["heat_on"]==0){ echo "hide";}?>">
                        <div class="groupe_bouton_vert">
                        <div class="bouton_vert">
                            <a href="#"><i class="material-icons">whatshot</i>Température Maximum : <span id="temp_max"><?php echo $res["temp_max"]?> </span>°C</a>
                        </div>
                        </div>


                        <div class="groupe_bouton_vert">
                            <div id="minTemp" class="bouton_vert">
                                <a href="#temp_max"><i class="material-icons">remove</i>Diminuer</a>
                            </div>

                            <div id="plusTemp" class="bouton_vert">
                                <a href="#temp_max"><i class="material-icons">add</i>Augmenter</a>
                            </div>

                            <div id="resetTemp" class="bouton_vert">
                                <a href="#temp_max"><i class="material-icons">undo</i>Annuler</a>
                            </div>
                        </div>
                        </div>


                    </div>
                </div>
                <?php /*
            <div class="bouton_vert">
                <a href="#"><i class="material-icons">mode_edit</i>Editer</a>
            </div>
*/ ?>
                <hr>

                <div class="bouton_vert bouton_gris">
                    <a href="index_mvc.php?target=utilisateur&function=residence&residence=<?php echo $res['id_residence'] ?>"><i class="material-icons">undo</i>Retour</a>
                </div>

            </div>
        </div>
    </section>

    <?php
}
else{


}
?>