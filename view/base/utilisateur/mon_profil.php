<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/12/2017
 * Time: 12:01
 */
?>

<?php
    //var_dump($_SESSION["date"]);
    if (isset($_SESSION["profilSelect"]) && !empty($_SESSION["profilSelect"]))
    {
        //var_dump($_SESSION["profilSelect"]);
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

<section id="content">
    <div id="bloc_content">
        <div id="container_principal">


            <h2>Identité de l'utilisateur principal</h2>
            <?php echo ('
                <div class="balise_p_flex">
                    <p>Civilité : <span class="texte_gris">M.</span></p>
                    <p>Prénom : <span class="texte_gris">'.$profil["surname"].'</span></p>
                    <p>Nom : <span class="texte_gris">'.$profil["name"].'</span></p>
                    <p>Date de naissance : <span class="texte_gris">'.$_SESSION["birth_form"].'</span></p>
                </div>

            <h2>Adresse de facturation</h2>

            <div class="balise_p_flex_50">
                <p>Adresse : <span class="texte_gris">'.$profil["bill_addr"].'</span></p>
                <p>Ville : <span class="texte_gris">'.$profil["bill_town"].'</span></p>
                <p>Code Postal : <span class="texte_gris">'.$profil["bill_post_code"].'</span></p>
                <p>Pays : <span class="texte_gris">'.$profil["bill_country"].'</span></p>
            </div>

            <h2>Contact</h2>

            <div class="balise_p_flex_50">
                <p>Email : <span class="texte_gris">'.$profil["mail"].'</span></p>
                <p>Email de secours : <span class="texte_gris">'.$profil["mail_security"].'</span></p>
                <p>Téléphone portable : <span class="texte_gris">'.$profil["phone"].'</span></p>
                <p>Fax : <span class="texte_gris">'.$profil["fax"].'</span></p>
            </div>');
            ?>

            <div class="groupe_bouton_vert">
                <div class="bouton_vert">
                    <a href="index_mvc.php?target=profil&function=editer_mon_profil"><i class="material-icons">perm_identity</i>Editer</a>
                </div>

                <div class="bouton_vert">
                    <a href="index_mvc.php?target=profil&function=abonnement"><i class="material-icons">shopping_cart</i>Mon abonnement</a>
                </div>

                <div class="bouton_vert">
                    <a href="index_mvc.php?target=profil&function=facture"><i class="material-icons">insert_drive_file</i>Mes factures</a>
                </div>
            </div>

            <hr>

            <h2>Mes utilisateurs</h2>


            <div class="groupe_rond_image_txt">
                <?php if(isset($profil) && !empty($profil)) {
                    echo('
                    <div class="rond_image_txt">
                        <div class="rond_image">
                            <img src="' . $profil['pic'] . '" alt="unknown">
                        </div>
    
                        <div class="titre_rond_image">
                            <p>' . $profil['surname'] . ' ' . $profil['name'] . '</p>
                        </div>');
                    if($profil["acces_client"] == 1)
                        echo('
                                <div class="texte_gris mes_utilisateurs">
                                    <p>Accès total</p>
                                </div>
                            ');
                    else
                        echo('
                                <div class="texte_gris mes_utilisateurs">
                                    <p>Accès limité</p>
                                </div>
                            ');
                    echo('</div>');
                }
                ?>

                <?php if(isset($utilisateur_sec1) && !empty($utilisateur_sec1)) {
                    echo('
                    <div class="rond_image_txt">
                        <div class="rond_image">
                            <img src="' . $utilisateur_sec1['pic'] . '" alt="unknown">
                        </div>
    
                        <div class="titre_rond_image">
                            <p>' . $utilisateur_sec1['surname'] . ' ' . $utilisateur_sec1['name'] . '</p>
                        </div>');
                    if($utilisateur_sec1["acces_client"] == 1)
                        echo('
                                <div class="texte_gris mes_utilisateurs">
                                    <p>Accès total</p>
                                </div>
                            ');
                    else
                        echo('
                                <div class="texte_gris mes_utilisateurs">
                                    <p>Accès limité</p>
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
        
                            <div class="titre_rond_image">
                                <p>' . $utilisateur_sec2['surname'] . ' ' . $utilisateur_sec2['name'] . '</p>
                            </div>');
                    if($utilisateur_sec2["acces_client"] == 1)
                        echo('
                                    <div class="texte_gris mes_utilisateurs">
                                        <p>Accès total</p>
                                    </div>
                                ');
                    else
                        echo('
                                    <div class="texte_gris mes_utilisateurs">
                                        <p>Accès limité</p>
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
            
                                <div class="titre_rond_image">
                                    <p>' . $utilisateur_sec3['surname'] . ' ' . $utilisateur_sec3['name'] . '</p>
                                </div>');
                    if($utilisateur_sec3["acces_client"] == 1)
                        echo('
                                        <div class="texte_gris mes_utilisateurs">
                                            <p>Accès total</p>
                                        </div>
                                    ');
                    else
                        echo('
                                        <div class="texte_gris mes_utilisateurs">
                                            <p>Accès limité</p>
                                        </div>
                                    ');
                    echo('</div>');
                }
                ?>
            </div>

            <div class="bouton_vert">
                <a href="index_mvc.php?target=profil&function=editer_mes_utilisateurs"><i class="material-icons">supervisor_account</i>Editer</a>
            </div>

            <hr>

            <h2>Mes coordonnées bancaires</h2>

            <div class="balise_p_flex_50">
                <p>Titulaire du compte : <span class="texte_gris">M. Prénom Nom</span></p>
                <p>Numéro de carte : <span class="texte_gris">**** **** **** 4758</span></p>
                <p>Cryptogramme : <span class="texte_gris">***</span></p>
                <p>Date d'expiration : <span class="texte_gris">**/**</span></p>
                <p>IBAN : <span class="texte_gris">FR76 **** **** **** **** **52 236</span></p>
            </div>

            <div class="bouton_vert">
                <a href="#"><i class="material-icons">credit_card</i>Editer</a>
            </div>
        </div>
    </div>
</section>

