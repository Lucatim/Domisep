<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 31/01/2018
 * Time: 18:18
 */

?>
<section id="content">
    <div id="bloc_content">
        <?php if (isset($_SESSION["utilisateur_selection"])&&!empty($_SESSION["utilisateur_selection"])){
        $profil=$_SESSION["utilisateur_selection"]; ?>
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
                    <a href="index_mvc.php?target=profil&function=abonnement"><i class="material-icons">shopping_cart</i>Abonnement</a>
                </div>

                <div class="bouton_vert">
                    <a href="index_mvc.php?target=profil&function=facture"><i class="material-icons">insert_drive_file</i>Factures</a>
                </div>
            </div>

            <hr>

        </div>
        <?php } ?>
    </div>
    <div id="bloc_content">
        <div id="container_principal">

            <h2>Domiciles</h2>

            <div class="groupe_carre_image">
                <?php
                //Boucle affichage domicile
                //var_dump($_SESSION["listeDomicile"]);
                if (isset($_SESSION["utilisateur_selection"]["listeDomicile"])&& !empty($_SESSION["utilisateur_selection"]["listeDomicile"])){
                    //var_dump($_SESSION["listeDomicile"]);
                    //nombre image aléatoire
                    $i=0;
                    foreach ($_SESSION["utilisateur_selection"]["listeDomicile"] as $domicile){
                        //var_dump($domicile);
                        //var_dump($domicile);
                        if($i==0){
                            ?>

                            <a href="index_mvc.php?target=admin&function=gerer_domicile_utilisateur&home=<?php echo ($domicile["id_home"])?>" class="carre_image red">
                                <img src="view/assets/images/domicile-<?php echo(($i%4)+1) ?>.jpg" alt="unknown">
                                <div class="bandeau_bas red">
                                    <p><?php echo ($domicile["name"])?></p>
                                </div>
                            </a>

                            <?php
                        }
                        else{
                            ?>
                            <a href="index_mvc.php?target=admin&function=gerer_domicile_utilisateur&home=<?php echo ($domicile["id_home"])?>" class="carre_image">
                                <img src="view/assets/images/domicile-<?php echo(($i%4)+1) ?>.jpg" alt="unknown">

                                <div class="bandeau_bas">
                                    <p><?php echo ($domicile["name"])?></p>
                                </div>
                            </a>
                            <?php
                        }

                        $i+=1;
                    }
                }
                ?>


            </div>

            <div class="groupe_bouton_vert">
                <div class="bouton_vert">
                    <a href="index_mvc.php?target=admin&function=ajouter_domicile"><i class="material-icons">add_circle</i>Ajouter</a>
                </div>

                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">delete</i>Supprimer</a>
                </div>
            </div>

        </div>
</section>
