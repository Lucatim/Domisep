<?php
/**
 * Created by PhpStorm.
 * User: vanke
 * Date: 15/12/2017
 * Time: 12:42
 */
?>
<section id="content">
    <div id="bloc_content">
        <div id="container_principal">
            <script src="js/messagerie_select.js"></script>
            <form>
                <select name="users"  onchange="showUser(this.value)">
                    <option value="">Select a person:</option>
                    <option value="1">Marc Dupont</option>
                    <option value="2">Jean Martin</option>
                </select>
            </form>
            <br />
            <div id="txtHint"><b>Person info will be listed here.</b></div>
            <!-- <div id="adapt_content">
            </div>  -->
            <div class="groupe_bouton_vert">
                <div class="bouton_vert">
                   <a id="myBtn"><i class="material-icons">message</i>Nouveau message</a>
                </div>

                <div class="bouton_vert"  >
                    <a href="#" ><i class="material-icons">mail</i>Boîte de réception</a>
                </div>

                <div class="bouton_vert" >
                    <a href="#" ><i class="material-icons">send</i>Messages envoyés</a>
                </div>

                <div class="bouton_vert" >
                    <a href="view/base/utilisateur/facture.html"><i class="material-icons">delete</i>Corbeille</a>
                </div>


            </div>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>

                    <h2>Enter votre message</h2>

                    <form action="view/base/messagerie/envoi_message.php" name="myForm" method="post" id="myForm" >

                        <div class="form_flex form_element">
                            <label>Destinataire :</label>
                            <input type="text" name="recipient" class="label_input"><br>
                        </div>
                        <!-- <label>De : </label><input type="text" name="sender" class="messagerie_form"><br>
                        <label>Numéros client : </label><input type="text" name="num_client" class="messagerie_form" ><br> -->
                        <div class="form_flex form_element">
                            <label>Sujet : </label>
                            <input type="text" name="subject" class="label_input">
                        </div>

                        <div class="form_flex form_element">
                            <label id="the_message">Message :</label>
                            <textarea name="mess" class="textarea_input"></textarea>
                        </div>

                        <div class="bouton_vert form_element">
                            <a type="submit" name="envoi" id="btn_sending" ><i class="material-icons">send</i>Envoyer</a>
                        </div>

                        <script>
                            function showUser(str)
                            {
                                if (str == "")
                                {
                                    document.getElementById("txtHint").innerHTML = "";
                                    return;
                                }
                                if (window.XMLHttpRequest) {
                                    xmlhttp= new XMLHttpRequest();
                                } else {
                                    if (window.ActiveXObject)
                                        try {
                                            xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
                                        } catch (e) {
                                            try {
                                                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                                            } catch (e) {
                                                return NULL;
                                            }
                                        }
                                }

                                xmlhttp.onreadystatechange = function ()
                                {
                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                                    {
                                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                                    }
                                }
                                xmlhttp.open("GET", "view/base/messagerie/get_info.php?q=" + str, true);
                                xmlhttp.send();
                            }
                        </script>

                    <script src="js/nouveau_message.js"></script>
                </div>
            </div>

            </div>
        </div>
    </div>
</section>
