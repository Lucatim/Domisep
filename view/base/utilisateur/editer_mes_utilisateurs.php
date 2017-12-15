<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/12/2017
 * Time: 12:25
 */
?>

<section id="content">
    <div id="bloc_content">
        <div id="container_principal">
            <h2>Editer mes utilisateurs</h2>

            <div class="groupe_rond_image_txt">
                <div class="rond_image_txt">
                    <div class="container_edit_image">
                        <div class="rond_image opacity_edit_image">
                            <img src="view/assets/images/gilbert.jpg" alt="unknown">
                        </div>

                        <div class="material-icons_edit">
                            <a href="#"><i class="material-icons">edit</i></a>
                        </div>
                    </div>

                    <form>
                        <input title="address" type="text" name="Adresse" value="Gigi" class="label_input">
                    </form>

                    <div class="div_select">
                        <select title="acces_utilisateur" name="acces_utilisateur">
                            <option value="" disabled selected>Accès total</option>
                        </select>
                    </div>
                </div>

                <div class="rond_image_txt">
                    <div class="container_edit_image">
                        <div class="rond_image opacity_edit_image">
                            <img src="view/assets/images/avatar_user_1.jpg" class="portrait" alt="unknown">
                        </div>

                        <div class="material-icons_edit">
                            <a href="#"><i class="material-icons">edit</i></a>
                        </div>
                    </div>

                    <form>
                        <input title="address" type="text" name="Adresse" value="Van-Kévin Suy" class="label_input">
                    </form>

                    <div class="div_select">
                        <select title="acces_utilisateur" name="acces_utilisateur">
                            <option value="" disabled selected>Accès</option>
                            <option value="total">Accès total</option>
                            <option value="limite">Accès limité</option>
                        </select>
                    </div>
                </div>

                <div class="rond_image_txt">
                    <div class="container_edit_image">
                        <div class="rond_image opacity_edit_image">
                            <img src="view/assets/images/lucas.jpg" class="portrait" alt="unknown">
                        </div>

                        <div class="material-icons_edit">
                            <a href="#"><i class="material-icons">edit</i></a>
                        </div>
                    </div>

                    <form>
                        <input title="address" type="text" name="Adresse" value="Lucas Quéant" class="label_input">
                    </form>

                    <div class="div_select">
                        <select title="acces_utilisateur" name="acces_utilisateur">
                            <option value="" disabled selected>Accès</option>
                            <option value="total">Accès total</option>
                            <option value="limite">Accès limité</option>
                        </select>
                    </div>
                </div>
            </div>

            <h2>Accès total</h2>

            <p>Il n'est pas possible d'éditer les droits d'un utilisateur avec un accès total.</p>

            <h2>Accès limité</h2>

            <p class="texte_gras">Mon profil</p>
            <div class="balise_form_flex_50">
                <form>
                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_voir_profil" class="checkbox">
                        <label for="item_voir_profil">Voir mon profil</label>
                    </div>

                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_editer_profil" class="checkbox">
                        <label for="item_editer_profil">Editer mon profil</label>
                    </div>
                </form>
            </div>

            <p class="texte_gras">Messagerie</p>
            <div class="balise_form_flex_50">
                <form>
                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_voir_messagerie" class="checkbox">
                        <label for="item_voir_messagerie">Voir ma messagerie</label>
                    </div>

                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_editer_messagerie" class="checkbox">
                        <label for="item_editer_messagerie">Gerer ma messagerie</label>
                    </div>
                </form>
            </div>

            <p class="texte_gras">Gérer mon domicile</p>
            <div class="balise_form_flex_50">
                <form>
                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_gerer_domicile_residence" class="checkbox">
                        <label for="item_gerer_domicile_residence">Gérer mes domiciles / résidences</label>
                    </div>

                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_gerer_capteur" class="checkbox">
                        <label for="item_gerer_capteur">Gérer mes capteurs</label>
                    </div>

                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_voir_consommation" class="checkbox">
                        <label for="item_voir_consommation">Voir ma consommation</label>
                    </div>
                </form>
            </div>

            <p class="texte_gras">Mes capteurs</p>
            <div class="balise_form_flex_50">
                <form>
                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_voir_temperature" class="checkbox">
                        <label for="item_voir_temperature">Voir ma température</label>
                    </div>

                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_gerer_temperature" class="checkbox">
                        <label for="item_gerer_temperature">Gérer ma température</label>
                    </div>
                </form>

                <form>
                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_voir_humidite" class="checkbox">
                        <label for="item_voir_humidite">Voir mon humidité</label>
                    </div>

                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_gerer_humidite" class="checkbox">
                        <label for="item_gerer_humidite">Gérer mon humidité</label>
                    </div>
                </form>

                <form>
                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_voir_pression" class="checkbox">
                        <label for="item_voir_pression">Voir ma pression</label>
                    </div>

                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_gerer_pression" class="checkbox">
                        <label for="item_gerer_pression">Gérer ma pression</label>
                    </div>
                </form>

                <form>
                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_voir_lumiere" class="checkbox">
                        <label for="item_voir_lumiere">Voir ma lumière</label>
                    </div>

                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_gerer_lumiere" class="checkbox">
                        <label for="item_gerer_lumiere">Gérer ma lumière</label>
                    </div>
                </form>

                <form>
                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_voir_fumee" class="checkbox">
                        <label for="item_voir_fumee">Voir mon détecteur de fumée</label>
                    </div>

                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_gerer_fumee" class="checkbox">
                        <label for="item_gerer_fumee">Gérer mon détecteur de fumée</label>
                    </div>
                </form>

                <form>
                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_voir_intrusions" class="checkbox">
                        <label for="item_voir_intrusions">Voir mes intrusions</label>
                    </div>

                    <div class="container_checkbox_label">
                        <input title="address" type="checkbox" id="item_gerer_intrusions" class="checkbox">
                        <label for="item_gerer_intrusions">Gérer mes intrusions</label>
                    </div>
                </form>
            </div>

            <div class="groupe_bouton_vert">
                <div class="bouton_vert">
                    <a href="index_mvc.php?target=profil"><i class="material-icons">save</i>Valider</a>
                </div>

                <div class="bouton_vert bouton_gris">
                    <a href="index_mvc.php?target=profil"><i class="material-icons">undo</i>Retour</a>
                </div>
            </div>

        </div>
    </div>
</section>
