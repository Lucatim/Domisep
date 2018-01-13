<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 13/01/2018
 * Time: 11:43
 */
?>

<?php if (isset($_SESSION["residenceSelect"]) && !empty($_SESSION["residenceSelect"])){
    //var_dump($_SESSION["residenceSelect"]);

    $res=$_SESSION["residenceSelect"];
    ?>
    <section id="content">
        <div id="bloc_content">
            <div id="container_principal">

                <h2>Instructions chauffage de la résidence</h2>

                <div class="groupe_carre_image_texte_droite">
                    <div class="grand_carre_image">
                        <div class="carre_image red">
                            <img src="view/assets/images/domicile-1.jpg" alt="unknown">

                            <div class="bandeau_bas red">
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
                        <div class="bouton_vert">
                            <a href="#"><i class="material-icons">cached</i>Chauffage Activé</a>
                        </div>

                        
                        <div class="groupe_bouton_vert">
                            <div class="bouton_vert">
                                <a href="#"><i class="material-icons">add_circle</i>Ajouter</a>
                            </div>

                            <div class="bouton_vert">
                                <a href="#"><i class="material-icons">delete</i>Supprimer</a>
                            </div>
                        </div>

                        <p>Chauffage Activé :

                        <div class="bouton_vert">
                            <i class="material-icons">add_circle</i>Chauffage Activé
                        </div>
                        </p>
                        <form>
                            <p><label>Chauffage Activé :</label>
                                <span class="texte_gris">
                                    <input type="range" min="0" max="1" step="1" list="legende">
                                    <datalist id="legende">
                                        <option value="0" label="0">
                                        <option value="1" label="1">
                                    </datalist>
                                </span></p>
                            <p><label>Température Maximum :</label> <span class="texte_gris"><input type="number" min="10" max="35"> °C</span></p>
                            <p>Ville : <span class="texte_gris"></span></p>
                        </form>


                        <p>Pays : <span class="texte_gris"></span></p>

                    </div>
                </div>
                <?php /*
            <div class="bouton_vert">
                <a href="#"><i class="material-icons">mode_edit</i>Editer</a>
            </div>
*/ ?>

                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">cached</i>Ajouter</a>
                </div>
                <hr>
                <div class="bouton_vert bouton_gris">
                    <a href="index_mvc.php?target=utilisateur&function=residence&residence=<?php echo $res['id_residence'] ?>"><i class="material-icons">undo</i>Retour</a>
                </div>

                <hr>

            </div>
        </div>
    </section>

    <?php
}
else{


}
?>