<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 31/01/2018
 * Time: 19:06
 */
?>
<script src="js/submitFormButtonAjouterDomicile.js" ></script>
<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <hr>

            <h2>Ajouter un Domicile</h2>

            <form class="input_radio" id="form_ajouter_domicile" method="post" action="index_mvc.php?target=admin&function=ajouter_domicile_form">
                <div class="balise_form_flex_50">

                    <div class="form_flex_edit">
                        <label>Nom </label>
                        <input title="name" type="text" name="name" value="" class="label_input">
                    </div>

                    <div class="form_flex_edit">
                        <label>Adresse </label>
                        <input title="address" type="text" name="addr" value="" class="label_input">
                    </div>

                    <div class="form_flex_edit">
                        <label>Code postal </label>
                        <input title="postal_code" type="text" name="post_code" value="" class="label_input">
                    </div>

                    <div class="form_flex_edit">
                        <label>Ville </label>
                        <input title="city" type="text" name="town" value="" class="label_input">
                    </div>

                    <div class="form_flex_edit">
                        <label>Pays </label>
                        <input title="country" type="text" name="country" value="" class="label_input">
                    </div>

                </div>
                <input type="submit" hidden >
            </form>

            <div class="groupe_bouton_vert">
                <div class="bouton_vert" >
                    <a id="ajouter_domicile" href=""><i class="material-icons">save</i>Valider</a>
                </div>

                <div class="bouton_vert bouton_gris">
                    <a href="index_mvc.php?target=admin&function=recherche_utilisateur"><i class="material-icons">undo</i>Retour</a>
                </div>
            </div>

        </div>
    </div>
</section>
