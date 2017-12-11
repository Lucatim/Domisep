<?php
/**
 * Created by PhpStorm.
 * User: LaitNoisette
 * Date: 04/12/2017
 * Time: 11:10
 */
?>
<script src="js/submitFormButton.js"></script>
    <section id="content">
        <div id="bloc_content">
            <div id="container_connexion">
                <h2>Première connexion</h2>
                <h3>Toute notre équipe vous remercie d'avoir choisi<br> <span class="texte_orange">Dom</span><span class="texte_vert">isep</span> pour vous accompanger !</h3>
                <p>Veuillez renseigner votre numéro client afin de finaliser la création de votre profil</p>
                <div id="bloc_connexion">
                    <form id="form_connexion" method="post" action="index_mvc.php?target=connexion&function=verif_id_first">
                        <label>N° Client</label>
                        <input type="text" name="identifiant" class="label_input"/>

                        <div class="bouton_vert">
                            <a href="connexion_password.html"><i class="material-icons">navigate_next</i>Valider</a>
                        </div>

                        <input type="submit" hidden>
                    </form>
                </div>
            </div>
        </div>
    </section>

