<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/12/2017
 * Time: 12:12
 */
?>

<section id="content">
    <div id="bloc_content">
        <div id="container_principal">
            <h2>Editer mon profil</h2>

                <form class="input_radio">
                    <div class="balise_form_flex_50">
                        <div class="form_flex_edit">
                            <label class="label_radio">Civilité </label>
                            <input title="gender" type="radio" name="gender" checked="checked"> <label>M.</label>
                            <input title="gender" type="radio" name="gender"> <label>Mme.</label>
                            <input title="gender" type="radio" name="gender"> <label>Autre</label>
                        </div>

                        <div class="form_flex_edit">
                            <label>Adresse </label>
                            <input title="address" type="text" name="Adresse" value="XX Avenue de France" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Prénom </label>
                            <input title="first_name" type="text" name="first_name" value="Jean" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Code postal </label>
                            <input title="postal_code" type="text" name="postal_code" value="75001" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Nom </label>
                            <input title="last_name" type="text" name="last_name" value="Dupont" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Ville </label>
                            <input title="city" type="text" name="city" value="Paris" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Date de naissance </label>
                            <input title="date_of_birth" type="date" name="date_of_birth" value="1984-02-06"
                                   class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Pays </label>
                            <input title="country" type="text" name="country" value="France" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Email </label>
                            <input title="email" type="email" name="email" value="jean.dupont@gmail.com" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                        <label>Numéro de téléphone </label>
                            <input title="telephone_number" type="tel" name="telephone_number" value="0605040302"
                                   class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Email de secours </label>
                            <input title="second_mail" type="email" name="second_mail" value="jdupnt@hotmail.fr"
                                   class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Fax </label>
                            <input title="Fax_number" type="tel" name="Fax_number" value="0102030405" class="label_input">
                        </div>
                    </div>
                </form>



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
