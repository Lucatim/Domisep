<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 04/12/2017
 * Time: 11:29
 */
?>
<section id="content">
        <div id="bloc_content">
            <div id="container_connexion">
                <h2>Bienvenue Prénom NOM</h2>
                <div id="bloc_connexion">

                    <script src="js/submitFormButton.js"></script>
                    <form id="form_connexion" method="post" action="index_mvc.php?target=connexion&function=verif_pass">

                        <label>Saisissez votre mot de passe</label>
                        <input type="password" name="identifiant" class="label_input"/>

                        <div class="bouton_vert">
                            <a href="../../../index_logged.html"><i class="material-icons">navigate_next</i>Valider</a>
                        </div>

                        <input type="submit" hidden>
                    </form>

                    <div id="liens_connexion">
                        <div class="lien_vert">
                            <a href="#">Mot de passe oublié ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>