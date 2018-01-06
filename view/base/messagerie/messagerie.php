<?php
/**
 * Created by PhpStorm.
 * User: vanke
 * Date: 15/12/2017
 * Time: 12:42
 */
?>
<script src="js/nouveau_message.js"></script>
<section id="content">
    <div id="bloc_content">
        <div id="container_principal">

            <h2>Boîte de réception</h2>

            <div onclick="window.location='#';" class="case_message nouveau_message" >
                <div class="rond_image petit_rond">
                    <img src="view/assets/images/gilbert.jpg" alt="unknown">
                </div>

                <div class="informations_message">
                    <p class="texte_gras">Prénom NOM</p>
                    <p class="texte_gras texte_gris">Sujet</p>
                    <p class="messagerie_message texte_gris">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        SedLorem ipsum dolor sit amet, consectetur adipiscing elit. SedLorem ipsum dolor sit amet,
                        consectetur adipiscing elit. SedLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                    </p>
                </div>

                <div class="informations_message_date_supprimer">
                    <p class="messagerie_date">hh:mm</p>
                    <div class="messagerie_delete">
                        <a href="#"><i class="material-icons">delete</i></a>
                    </div>
                </div>
            </div>

            <div onclick="window.location='#';" class="case_message">
                <div class="rond_image petit_rond">
                    <img src="view/assets/images/lucas.jpg" alt="unknown" class="portrait">
                </div>

                <div class="informations_message">
                    <p class="texte_gras">Prénom NOM</p>
                    <p class="texte_gras texte_gris">Sujet</p>
                    <p class="messagerie_message texte_gris">Lorem ipsum dolor sit amet, consectetur adipiscing elit. SedLorem ipsum dolor sit amet, consectetur adipiscing elit. SedLorem ipsum dolor sit amet, consectetur adipiscing elit. SedLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed</p>
                </div>

                <div class="informations_message_date_supprimer">
                    <p class="messagerie_date">hh:mm</p>
                    <div class="messagerie_delete">
                        <a href="#"><i class="material-icons">delete</i></a>
                    </div>
                </div>
            </div>

            <div onclick="window.location='#';" class="case_message">
                <div class="rond_image petit_rond">
                    <img src="view/assets/images/avatar_user_1.jpg" alt="unknown">
                </div>

                <div class="informations_message">
                    <p class="texte_gras">Prénom NOM</p>
                    <p class="texte_gras texte_gris">Sujet</p>
                    <p class="messagerie_message texte_gris">Lorem ipsum dolor sit amet, consectetur adipiscing elit. SedLorem ipsum dolor sit amet, consectetur adipiscing elit. SedLorem ipsum dolor sit amet, consectetur adipiscing elit. SedLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed</p>
                </div>

                <div class="informations_message_date_supprimer">
                    <p class="messagerie_date">hh:mm</p>
                    <div class="messagerie_delete">
                        <a href="#"><i class="material-icons">delete</i></a>
                    </div>
                </div>
            </div>

            <div onclick="window.location='#';" class="case_message">
                <div class="rond_image petit_rond">
                    <img src="view/assets/images/gilbert.jpg" alt="unknown">
                </div>

                <div class="informations_message">
                    <p class="texte_gras">Prénom NOM</p>
                    <p class="texte_gras texte_gris">Sujet</p>
                    <p class="messagerie_message texte_gris">Lorem ipsum dolor sit amet, consectetur adipiscing elit. SedLorem ipsum dolor sit amet, consectetur adipiscing elit. SedLorem ipsum dolor sit amet, consectetur adipiscing elit. SedLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed</p>
                </div>

                <div class="informations_message_date_supprimer">
                    <p class="messagerie_date">hh:mm</p>
                    <div class="messagerie_delete">
                        <a href="#"><i class="material-icons">delete</i></a>
                    </div>
                </div>
            </div>



            <div class="groupe_bouton_vert">
                <div class="bouton_vert">
                   <a id="myBtn"><i class="material-icons">message</i>Nouveau message</a>
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>

                            <h2>Enter votre message</h2>

                            <form action="view/base/messagerie/envoi_message.php" name="myForm" method="post" id="myForm" >
                                
                                <label>Envoyer à :</label> <input type="text" name="recipient" class="messagerie_form" ><br>
                                <label>De : </label><input type="text" name="sender" class="messagerie_form"><br>
                                <label>Numéros client : </label><input type="text" name="num_client" class="messagerie_form" ><br>
                                <label>Sujet : </label><input type="text" name="subject" class="messagerie_form"><br>
                                <label>Message :</label><textarea name="mess"></textarea><br>
                                
                            <div class="groupe_bouton_vert">
                               <a type="submit" name="envoi" id="btn_sending" ><i class="material-icons">send</i>Envoyer</a>
                            </div>                              
                            </form>
                        </div>
                    </div>
                </div>


                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">mail</i>Boîte de réception</a>
                </div>

                <div class="bouton_vert">
                    <a href="#"><i class="material-icons">send</i>Messages envoyés</a>
                </div>

                <div class="bouton_vert">
                    <a href="view/base/utilisateur/facture.html"><i class="material-icons">delete</i>Corbeille</a>
                </div>
<script>
     function validateForm() 
{
    var formuaire = document.getElementById('myForm');
    var recipient = document.forms["myForm"]["recipient"].value;
    var sender = document.forms["myForm"]["sender"].value;
    var num_client = document.forms["myForm"]["num_client"].value;
    var subject = document.forms["myForm"]["subject"].value;
    var message = document.forms["myForm"]["mess"].value;
    
    if (recipient == "" ) {
    alert("Le champ du destinataire est vide ou pas un entier");
    return false;
    }

    if (sender == "") {
    alert("Le champs nom est vide ou pas un entier");
    return false;
    }

    if (num_client == "" ) {
    alert("Le numéros client est vide ou pas un entier");
    return false;
    }

    if (subject == "") {
    alert("Le sujet est vide");
    return false;
    }

    if (message == "") {
    alert("Le message est vide");
    return false;
    }

    
    
    formuaire.submit();
    alert("message envoyé");
    
};
 // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                var btn_sending = document.getElementById("btn_sending");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal
                btn.onclick = function() {
                    modal.style.display = "block";
                }

                btn_sending.onclick = function(){
                    validateForm();
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }


</script>

            </div>
        </div>
    </div>
</section>
