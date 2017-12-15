<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/12/2017
 * Time: 12:01
 */
?>

<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <h2>Identité de l'utilisateur principal</h2>

            <div class="balise_p_flex">
                <p>Civilité : <span class="texte_gris">M.</span></p>
                <p>Prénom : <span class="texte_gris">Prénom</span></p>
                <p>Nom : <span class="texte_gris">Nom</span></p>
                <p>Date de naissance : <span class="texte_gris">JJ/MM/AAAA</span></p>
            </div>

            <h2>Adresse de facturation</h2>

            <div class="balise_p_flex_50">
                <p>Adresse : <span class="texte_gris">XX Avenue de France</span></p>
                <p>Ville : <span class="texte_gris">Ville</span></p>
                <p>Code Postal : <span class="texte_gris">XXXXX</span></p>
                <p>Pays : <span class="texte_gris">France</span></p>
            </div>

            <h2>Contact</h2>

            <div class="balise_p_flex_50">
                <p>Email : <span class="texte_gris">prenom.nom@mail.com</span></p>
                <p>Email de secours : <span class="texte_gris">prenom.nom@mail.com</span></p>
                <p>Téléphone portable : <span class="texte_gris">0102030405</span></p>
                <p>Fax : <span class="texte_gris">0102030405</span></p>
            </div>

            <div class="groupe_bouton_vert">
                <div class="bouton_vert">
                    <a href="index_mvc.php?target=profil&function=editer_mon_profil"><i class="material-icons">perm_identity</i>Editer</a>
                </div>

                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">shopping_cart</i>Mon abonnement</a>
                </div>

                <div class="bouton_vert">
                    <a href="index_mvc.php?target=profil&function=facture"><i class="material-icons">insert_drive_file</i>Mes factures</a>
                </div>
            </div>

            <hr>

            <h2>Mes utilisateurs</h2>

            <div class="groupe_rond_image_txt">
                <div class="rond_image_txt">
                    <div class="rond_image">
                        <img src="view/assets/images/gilbert.jpg" alt="unknown">
                    </div>

                    <div class="titre_rond_image">
                        <p>Gigi</p>
                    </div>

                    <div class="texte_gris">
                        <p>Accès total</p>
                    </div>
                </div>

                <div class="rond_image_txt">
                    <div class="rond_image">
                        <img src="view/assets/images/avatar_user_1.jpg" alt="unknown">
                    </div>

                    <div class="titre_rond_image">
                        <p>Van-Kévin Suy</p>
                    </div>

                    <div class="texte_gris">
                        <p>Accès total</p>
                    </div>
                </div>

                <div class="rond_image_txt">
                    <div class="rond_image">
                        <img src="view/assets/images/lucas.jpg" class="portrait" alt="unknown">
                    </div>

                    <div class="titre_rond_image">
                        <p>Lucas Quéant</p>
                    </div>

                    <div class="texte_gris">
                        <p>Accès limité</p>
                    </div>
                </div>
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