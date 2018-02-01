<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 31/01/2018
 * Time: 12:52
 */
?>
<script src="js/submitFormButton.js"></script>
    <section id="content">
        <div id="bloc_content">
            <div id="container_connexion">
                <h2>Première connexion</h2>
                <h3>Toute notre équipe vous remercie d'avoir choisi<br> <span class="texte_orange">Dom</span><span class="texte_vert">isep</span> pour vous accompagner !</h3>
                <p>Veuillez saisir votre nouveau mot de passe afin de remplacer le mot de passe provisoire</p>
                <div id="bloc_connexion">
                    <form id="form_fake_button" method="post" action="index_mvc.php?target=connexion&function=modif_pass">
                        <label>Saisissez votre nouveau mot de passe</label>
                        <input type="text" name="identifiant" class="label_input"/>

                        <div class="bouton_vert" id="bouton_vert_valider">
                            <a href="#"><i class="material-icons">navigate_next</i>Valider</a>
                        </div>

                        <input type="submit" hidden>
                    </form>
                </div>
            </div>
        </div>
    </section>