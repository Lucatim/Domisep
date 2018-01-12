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

            <div id="adapt_content"></div>
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

            <!--  action="view/base/messagerie/envoi_message.php" -->

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Modal Header</h2>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the Modal Body</p>
                        <p>Some other text...</p>
                    </div>
                    <div class="modal-footer">
                        <h3>Modal Footer</h3>
                    </div>
                </div>

            </div>

            <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal
                btn.onclick = function() {
                    modal.style.display = "block";
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

                        <script>
                            function showUser(str)
                            {
                                if (str == "")
                                {
                                    document.getElementById("adapt_content").innerHTML = "";
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
                                        document.getElementById("adapt_content").innerHTML = xmlhttp.responseText;
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

    gvf gbygbbygbyg
</section>
