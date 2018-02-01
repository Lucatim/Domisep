<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/12/2017
 * Time: 12:12
 */
?>
<?php
    if (isset($_SESSION["profilSelect"]) && !empty($_SESSION["profilSelect"]))
    {
        $profil = $_SESSION["profilSelect"];

        //var_dump($_SESSION["birth_form"]);
        //var_dump($_SESSION["Test_form34"]);
        //var_dump($_SESSION["Test_form_2"]);
        //var_dump($_SESSION["req"]);

        //var_dump($_SERVER['REQUEST_URI']);

    }
?>
<script src="js/submitFormButton.js"></script>
<script src="js/subitUploadIMG.js"></script>
<script src="js/edit_icon.js"></script>
<script src="js/fake_select_file_button.js"></script>

<section id="content">
    <div id="bloc_content">
        <div id="container_principal">
            <h2>Editer mes informations personelles</h2>

                <form class="input_radio" id="form_fake_button" method="post" action="index_mvc.php?target=profil&function=editer_mon_profil">
                    <div class="balise_form_flex_50">
                        <div class="form_flex_edit">
                            <label class="label_radio">Civilité </label>
                            <!--<input title="gender" type="radio" name="gender" checked="checked"> <label>M.</label>-->
                            <input title="gender" type="radio" name="gender"> <label>Mme.</label>
                            <!--<input title="gender" type="radio" name="gender"> <label>Autre</label>-->
                        </div>

                        <div class="form_flex_edit">
                            <label>Adresse </label>
                            <input title="address" type="text" name="bill_addr" value="<?php echo(''.$profil["bill_addr"].'') ?>" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Prénom </label>
                            <input title="first_name" type="text" name="surname" value="<?php echo(''.$profil["surname"].'') ?>" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Code postal </label>
                            <input title="postal_code" type="text" name="bill_post_code" value="<?php echo(''.$profil["bill_post_code"].'') ?>" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Nom </label>
                            <input title="last_name" type="text" name="name" value="<?php echo(''.$profil["name"].'') ?>" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Ville </label>
                            <input title="city" type="text" name="bill_town" value="<?php echo(''.$profil["bill_town"].'') ?>" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Date de naissance </label>
                            <input title="date_of_birth" type="date" name="birth" value="<?php echo(''.$profil["birth"].'') ?>"
                                   class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Pays </label>
                            <input title="country" type="text" name="bill_country" value="<?php echo(''.$profil["bill_country"].'') ?>" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Email </label>
                            <input title="email" type="email" name="mail" value="<?php echo(''.$profil["mail"].'') ?>" class="label_input">
                        </div>

                        <div class="form_flex_edit">
                        <label>Numéro de téléphone </label>
                            <input title="telephone_number" type="tel" name="phone" value="<?php echo(''.$profil["phone"].'') ?>"
                                   class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Email de secours </label>
                            <input title="second_mail" type="email" name="mail_security" value="<?php echo(''.$profil["mail_security"].'') ?>"
                                   class="label_input">
                        </div>

                        <div class="form_flex_edit">
                            <label>Fax </label>
                            <input title="Fax_number" type="tel" name="fax" value="<?php echo(''.$profil["fax"].'') ?>" class="label_input">
                        </div>
                    </div>
                    <input type="submit" hidden >
                </form>

            <div class="groupe_bouton_vert">
                <div class="bouton_vert" >
                    <a id="bouton_vert_valider" href="index_mvc.php?target=profil&function=editer_mon_profil"><i class="material-icons">save</i>Valider</a>
                </div>

                <div class="bouton_vert bouton_gris">
                    <a href="index_mvc.php?target=profil"><i class="material-icons">undo</i>Retour</a>
                </div>
            </div>

        </div>
    </div>
</section>
