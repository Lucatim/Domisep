<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 17/12/2017
 * Time: 16:12
 */
?>

<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <h2>Informations du capteur</h2>

            <div class="groupe_carre_image_texte_droite">
                <div class="grand_carre_image">
                    <div class="carre_image red">
                        <img src="" alt="unknown">

                        <div class="bandeau_bas red">
                            <p>Température</p>
                        </div>
                    </div>
                </div>

                <div class="texte_droite_cgi">
                    <p>Position des capteurs :</p>
                    <ul>
                        <li class="texte_gris">Chambre 1</li>
                        <li class="texte_gris">Chambre 2</li>
                        <li class="texte_gris">Salon</li>
                        <li class="texte_gris">Toilettes</li>
                        <li class="texte_gris">Salle de bain</li>
                        <li class="texte_gris">Garage</li>
                    </ul>

                    <p>Nombre de capteurs : <span class="texte_gris">XX</span></p>
                </div>
            </div>

            <div id="capteurs_deficients">
                <p class="texte_rouge">Capteurs déficients : 1</p>
                <p class="texte_rouge">Domisep est actuellement en train de réparer la panne<br>
                    Nous nous excusons pour la gêne occasionnée.</p>
            </div>

            <div class="bouton_vert">
                <a href="#"><i class="material-icons">mode_edit</i>Editer mon capteur</a>
            </div>

            <hr>

            <h2>Mes températures</h2>

            <div class="balise_p_flex_33">
                <p class="texte_rouge">Chambre 1 : ERREUR</p>
                <p>Chambre 2 : <span class="texte_gris">25°C</span></p>
                <p>Salon : <span class="texte_gris">24°C</span></p>
                <p>Toilettes : <span class="texte_gris">22°C</span></p>
                <p>Salle de bain : <span class="texte_gris">21°C</span></p>
                <p>Garage : <span class="texte_gris">18°C</span></p>
            </div>

            <div class="groupe_bouton_vert">
                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">alarm_add</i>Planifier</a>
                </div>

                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">delete</i>Alerte</a>
                </div>
            </div>

            <hr>

            <h2>Mon historique</h2>

            <select name="periode">
                <option value="" disabled selected>Sélectionner la période</option>
                <option value="annee">Année</option>
                <option value="mois">Mois</option>
                <option value="journee">Jour</option>
            </select>

            <div class="groupe_select">
                <select name="valeur_periode">
                    <option value="" disabled selected>Jour</option>
                    <option value="date_1">1</option>
                    <option value="date_2">2</option>
                    <option value="date_3">3</option>
                    <option value="date_4">4</option>
                    <option value="date_5">5</option>
                    <option value="date_6">6</option>
                    <option value="date_7">7</option>
                    <option value="date_8">8</option>
                    <option value="date_9">9</option>
                    <option value="date_10">10</option>
                    <option value="date_12">11</option>
                    <option value="date_13">12</option>
                    <option value="date_13">13</option>
                    <option value="date_14">14</option>
                    <option value="date_15">15</option>
                    <option value="date_16">16</option>
                    <option value="date_17">17</option>
                    <option value="date_18">18</option>
                    <option value="date_19">19</option>
                    <option value="date_20">20</option>
                    <option value="date_21">21</option>
                    <option value="date_22">22</option>
                    <option value="date_23">23</option>
                    <option value="date_24">24</option>
                    <option value="date_25">25</option>
                    <option value="date_26">26</option>
                    <option value="date_27">27</option>
                    <option value="date_28">28</option>
                    <option value="date_29">29</option>
                    <option value="date_30">30</option>
                    <option value="date_31">31  </option>
                </select>

                <select name="valeur_periode">
                    <option value="" disabled selected>Mois</option>
                    <option value="janvier">Janvier</option>
                    <option value="fevrier">Fevrier</option>
                    <option value="mars">Mars</option>
                    <option value="avril">Avril</option>
                    <option value="mai">Mai</option>
                    <option value="huin">Juin</option>
                    <option value="juillet">Juillet</option>
                    <option value="août">Août</option>
                    <option value="septembre">Septembre</option>
                    <option value="octobre">Octobre</option>
                    <option value="novembre">Novembre</option>
                    <option value="decembre">Decembre</option>
                </select>

                <select name="valeur_periode">
                    <option value="" disabled selected>Année</option>
                    <option value="janvier">2016</option>
                    <option value="fevrier">2017</option>
                </select>
            </div>

            <div id="curve_chart" style="width: 100%; height: 500px"></div>

        </div>
    </div>
</section>
