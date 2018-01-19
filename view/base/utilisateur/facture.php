<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/12/2017
 * Time: 12:17
 */

?>

<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <h2>Relevé des factures mensuelles</h2>
            <h3>Année <?php echo($annee); ?></h3>

            <table id="facture">
            <?php
            for ($i = 1; $i <= 3; $i++) {
                echo('<tr class="row_table">');

                for ($j = 1; $j <= 4; $j++) {

                    echo('<td class="cell_table"><p>' . $tabl[$i][$j] . '</p>');
                     if($anneereg==$annee) {
                         if ($nbmois[$i][$j] > $moisreg & $nbmois[$i][$j]<=$mois) {
                             if ($nbmois[$i][$j] == $moisreg & $jourreg < 3) {
                                 ;
                             } else {
                                 $index=intval($nbmois[$i][$j]);
                                 echo('<div class="image_tableau"><a href='.$_SESSION["Path_PDF"][$index].'><img src="view/assets/images/pdf.png"></a></div></td>');
                             }
                         }
                     }
                     else {
                         if ($nbmois[$i][$j] <= $mois) {
                             if ($nbmois[$i][$j] == $mois & $jour < 3) {
                                 ;
                             } else {
                                 $index=intval($nbmois[$i][$j]);
                                 echo('<div class="image_tableau"><a href="'.$_SESSION["Path_PDF"][$index].'"><img src="view/assets/images/pdf.png"></a></div></td>');
                             }
                         }
                     }
                }
                echo('</tr>');
            }
            ?>
            </table>

            <div id="bloc_date_prelevement">
                <p id="titre_prelevement"> Date du prochain prélevement</p>
                <?php

                if($mois==12)
                {
                    $mois=1;
                    $annee=$annee+1;
                }
                else {
                    if ($jour > 3) {
                        $mois = $mois + 1;
                    }
                }

                if($mois<10)
                {
                    $mois="0$mois";
                }

                    echo('<p id="date_prelevement">03/'.$mois.'/'.$annee.'</p>');
                ?>
            </div>

            <div class="bouton_vert bouton_gris">
                <a href="index_mvc.php?target=profil"><i class="material-icons">undo</i>Retour</a>
            </div>

        </div>
    </div>
</section>










