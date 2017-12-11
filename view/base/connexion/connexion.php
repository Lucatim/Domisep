<?php
/**
 * Created by PhpStorm.
 * User: LaitNoisette
 * Date: 04/12/2017
 * Time: 10:40
 */
if(isset($error)){
    echo ($error);
}
?>
<script src="js/submitFormButton.js"></script>
    <section id="content">
        <div id="bloc_content">
            <div id="container_connexion">
                <h2>Me connecter</h2>
                <div id="bloc_connexion">
                    <form id="form_connexion" method="post" action="index_mvc.php?target=connexion&function=verif_id">

                        <label>Identifiant</label>

                        <input type="text" name="identifiant" class="label_input"/>


                        <div class="bouton_vert">

                            <a href="connexion_password.html"><i class="material-icons">navigate_next</i>Suivant</a>

                        </div>

                        <input type="submit" hidden >
                    </form>
                    <div id="liens_connexion">
                        <div class="lien_vert">
                            <a href="index_mvc.php?target=connexion&function=id_oublie">Identifiant oublié ?</a>
                        </div>

                        <div class="lien_vert">
                            <a href="index_mvc.php?target=connexion&function=prem">Première connexion ?</a>
                        </div>
                    </div>

                    <div id="lien_noir_underline">
                        <a href="#">Je n'ai pas encore de compte</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
