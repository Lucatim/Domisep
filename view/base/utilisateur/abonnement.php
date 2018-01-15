<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 15/01/2018
 * Time: 14:44
 */

    $discount=$_SESSION["discount"]["discount"];
    if($discount==NULL){
        $discount=0;
    }
    $prix_final=$price_sub*(1-($discount/100));
?>

<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <h2>Mon abonnement</h2>


            <div class="balise_p_flex_50">
                <p>Type d'abonnement : <span class="texte_gris"><?php echo($name_sub)?></span></p>
                <p>Prix initial : <span class="texte_gris"><?php echo($price_sub)?> €</span></p>
                <p>Réduction : <span class="texte_gris"><?php echo($discount)?>%</span></p>
                <p>Prix final mensuel : <span class="texte_orange"><?php echo($prix_final)?>€</span></p>
            </div>

            <div class="bouton_vert bouton_gris">
                <a href="index_mvc.php?target=profil"><i class="material-icons">undo</i>Retour</a>
            </div>

        </div>
    </div>
</section>
