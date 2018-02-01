<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 01/02/2018
 * Time: 15:02
 */
?>

<script src="js/adminAjouterCapteur.js" ></script>
<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <hr>

            <h2>Ajouter un capteur</h2>

            <form class="input_radio" id="form_ajouter_capteur" method="post" action="index_mvc.php?target=admin&function=ajouter_capteur_form">
                <div class="balise_form_flex_50">

                    <div class="form_flex_edit">
                        <label>Type de capteur</label>
                        <select name="id_type_capteur" id="type_capteur" class="label_input"></select>
                    </div>

                </div>
                <input type="submit" hidden >
            </form>

            <div class="groupe_bouton_vert">
                <div class="bouton_vert" >
                    <a id="ajouter_capteur" href=""><i class="material-icons">save</i>Valider</a>
                </div>

                <div class="bouton_vert bouton_gris">
                    <a href="index_mvc.php?target=admin&function=recherche_utilisateur"><i class="material-icons">undo</i>Retour</a>
                </div>
            </div>

        </div>
    </div>
</section>
