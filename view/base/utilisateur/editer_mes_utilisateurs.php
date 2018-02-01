<?php
if (isset($_SESSION["profilSelect"]) && !empty($_SESSION["profilSelect"]))
{
    $profil = $_SESSION["profilSelect"];
}
if (isset($_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire1']) && !empty($_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire1']))
{
    $utilisateur_sec1 = $_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire1'];
}
if (isset($_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire2']) && !empty($_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire2']))
{
    $utilisateur_sec2 = $_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire2'];
}
if (isset($_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire3']) && !empty($_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire3']))
{
    $utilisateur_sec3 = $_SESSION["utilisateurs_secondaires"]['utilisateur_secondaire3'];
}

?>

<script src="js/submitFormButton.js"></script>

<section id="content">
    <div id="bloc_content">
        <div id="container_principal">
            <form class="input_radio" id="form_fake_button" method="post" action="index_mvc.php?target=profil&function=editer_mes_utilisateurs">
                <h2>Editer mes utilisateurs</h2>

                <div class="groupe_rond_image_txt">
                    <?php if(isset($profil) && !empty($profil)) {
                        echo('
                        <div class="rond_image_txt">
                            <div class="rond_image">
                                <img src="' . $profil['pic'] . '" alt="unknown">
                            </div>
                                
                            <div class="titre_rond_image">
                                <p>' . $profil['surname'] . ' ' . $profil['name'] . '</p>
                            </div>
                            
                            <div class="div_select">
                            <select title="acces_utilisateur" name="acces_utilisateur">
                                <option value="" disabled selected>Accès total</option>
                            </select>
                            </div>
                        </div>');
                    }
                    ?>

                    <?php if(isset($utilisateur_sec1) && !empty($utilisateur_sec1)) {
                        echo('
                        <div class="rond_image_txt">
                            <div class="rond_image">
                                <img src="' . $utilisateur_sec1['pic'] . '" alt="unknown">
                            </div>
                            
                            <input title="name" type="text" name="full_name1" value="'. $utilisateur_sec1['surname'] . ' ' . $utilisateur_sec1['name'] .'" class="label_input">
                            <input type="text" name="id_client1" value="'.$utilisateur_sec1["id_client"].'" hidden>');
                        if($utilisateur_sec1["acces_client"] == 1)
                            echo('
                                    <div class="div_select">
                                        <select title="acces_utilisateur" name="acces_utilisateur1">
                                             <option value="1" selected>Accès total</option>
                                             <option value="0">Accès limité</option>
                                        </select>
                                    </div>
                                ');
                        else
                            echo('
                                    <div class="div_select">
                                        <select title="acces_utilisateur" name="acces_utilisateur1">
                                             <option value="1">Accès total</option>
                                             <option value="0" selected>Accès limité</option>
                                        </select>
                                    </div>
                                ');
                        echo('</div>');
                    }
                    ?>

                    <?php if(isset($utilisateur_sec2) && !empty($utilisateur_sec2)) {
                        echo('
                            <div class="rond_image_txt">
                                <div class="rond_image">
                                    <img src="' . $utilisateur_sec2['pic'] . '" alt="unknown">
                                </div>
            
                                    <input title="name" type="text" name="full_name2" value="'. $utilisateur_sec2['surname'] . ' ' . $utilisateur_sec2['name'] .'" class="label_input">
                                    <input type="text" name="id_client2" value="'.$utilisateur_sec2["id_client"].'" hidden>');
                        if($utilisateur_sec2["acces_client"] == 1)
                            echo('
                                    <div class="div_select">
                                        <select title="acces_utilisateur" name="acces_utilisateur2">
                                            <option value="1" selected>Accès total</option>
                                            <option value="0">Accès limité</option>
                                         </select>
                                    </div>
                                    ');
                        else
                            echo('
                                    <div class="div_select">
                                        <select title="acces_utilisateur" name="acces_utilisateur2">
                                            <option value="1">Accès total</option>
                                            <option value="0" selected>Accès limité</option>
                                        </select>
                                    </div>
                                    ');
                        echo('</div>');
                    }
                    ?>

                    <?php if(isset($utilisateur_sec3) && !empty($utilisateur_sec3)) {
                        echo('
                                <div class="rond_image_txt">
                                    <div class="rond_image">
                                        <img src="' . $utilisateur_sec3['pic'] . '" alt="unknown">
                                    </div>
                
                                        <input title="name" type="text" name="full_name3" value="'. $utilisateur_sec3['surname'] . ' ' . $utilisateur_sec3['name'] .'" class="label_input">
                                        <input type="text" name="id_client3" value="'.$utilisateur_sec3["id_client"].'" hidden>');

                        if($utilisateur_sec3["acces_client"] == 1)
                            echo('
                                    <div class="div_select">
                                        <select title="acces_utilisateur" name="acces_utilisateur3">
                                            <option value="1" selected>Accès total</option>
                                            <option value="0">Accès limité</option>
                                         </select>
                                    </div>
                                        ');
                        else
                            echo('
                                    <div class="div_select">
                                        <select title="acces_utilisateur" name="acces_utilisateur3">
                                            <option value="1">Accès total</option>
                                            <option value="0" selected>Accès limité</option>
                                        </select>
                                    </div>
                                        ');
                        echo('</div>');
                    }
                    ?>
                </div>
                <input type="submit" hidden>
            </form>
                <div class="groupe_bouton_vert">
                    <div class="bouton_vert">
                        <a id="bouton_vert_valider" href="index_mvc.php?target=profil&function=editer_mes_utilisateurs"><i class="material-icons">save</i>Valider</a>
                    </div>

                    <div class="bouton_vert bouton_gris">
                        <a href="index_mvc.php?target=profil"><i class="material-icons">undo</i>Retour</a>
                    </div>
                </div>

        </div>
    </div>
    </section>
