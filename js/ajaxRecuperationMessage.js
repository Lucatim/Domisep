$(document).ready(function () {
    debugger;
    var idUser=idUtilisateur;
    console.log("coucou je suis dedans");

    ajaxMSG();

    $("#boiteReception").click(function (e) {
        debugger;
        e.preventDefault();
        ajaxMSG();
    });

    function ajaxMSG() {
        var request=$.ajax(
            {
                method: 'GET',
                url: 'control/requestAJAX.php?function=data_messagerie',
                data:{ idUser: idUser},
                dataType:"json",
                timeout:999999999
            });

        request.done(function(d) {
            debugger;
            console.log("coucou la requete est fini");

            d.forEach(function (e) {
                 debugger;


                var sujet = e.subject;
                var surname = e.surname;
                var nom = e.nom;
                var picture = e.pic;
                var message = e.mess;
                var id_client = e.id_client;
                var recipient = e.recipient;
                var id_utilisateur_co = idUtilisateur;
                var id_mail = e.id_mail;
                var modifier = 0;
                
                if (recipient == id_utilisateur_co){
                    $(document).ready(function(){$("#boiteReception").one("click",function(){$(".adapt_content").append("<div id=\"container_principal\">\n" +
                        "                <div onclick=\"window.location='#';\" class=\"case_message nouveau_message\" >\n" +
                        "                    <div class=\"rond_image petit_rond\">\n" +
                        "                        <img id=\"pic\" src=\"../../assets/images/gilbert.jpg\" alt=\"unknown\">\n" +
                        "                    </div>\n" +
                        "\n" +
                        "                    <div class=\"informations_message\">\n" +
                        "                        <p id=\"nom_prenom\" class=\"texte_gras\">Prénom NOM</p>\n" +
                        "                        <p id=\"sujet\" class=\"texte_gras texte_gris\">Sujet</p>\n" +
                        "                        <p id=\"message\" class=\"messagerie_message texte_gris\">Lorem ipsum .</p>\n" +
                        "                    </div>\n" +
                        "\n" +
                        "                    <div class=\"informations_message_date_supprimer\">\n" +
                        "                        <p class=\"messagerie_date\">hh:mm</p>\n" +
                        "                        <div class=\"messagerie_delete\">\n" +
                        "                            <a href=\"#\"><i class=\"material-icons\">delete</i></a>\n" +
                        "                        </div>\n" +
                        "                    </div>\n" +
                        "                </div>") ;});});
                    
                    // $(document).ready(function(){$("#boiteReception").click(function(){$(".adapt_content").append(
                    //     "<div id=\"container_principal\">\n" +
                    //     "                <div onclick=\"window.location='#';\" class=\"case_message nouveau_message\" >\n" +
                    //     "                    <div class=\"rond_image petit_rond\">\n" +
                    //     "                        <img id=\"pic\" src=\"../../assets/images/gilbert.jpg\" alt=\"unknown\">\n" +
                    //     "                    </div>\n" +
                    //     "\n" +
                    //     "                    <div class=\"informations_message\">\n" +
                    //     "                        <p id=\"nom_prenom\" class=\"texte_gras\">Prénom NOM</p>\n" +
                    //     "                        <p id=\"sujet\" class=\"texte_gras texte_gris\">Sujet</p>\n" +
                    //     "                        <p id=\"message\" class=\"messagerie_message texte_gris\">Lorem ipsum .</p>\n" +
                    //     "                    </div>\n" +
                    //     "\n" +
                    //     "                    <div class=\"informations_message_date_supprimer\">\n" +
                    //     "                        <p class=\"messagerie_date\">hh:mm</p>\n" +
                    //     "                        <div class=\"messagerie_delete\">\n" +
                    //     "                            <a href=\"#\"><i class=\"material-icons\">delete</i></a>\n" +
                    //     "                        </div>\n" +
                    //     "                    </div>\n" +
                    //     "                </div>");})});


                    // $(document).ready(function(){$("#boiteReception").click(function(){$("#message").attr('id',id_mail);});});//remplacer l'id

                    // $(document).ready(function(){$("#boiteReception").click(function(){$("#message").text(message);});});//remplacer le message
                    // $(document).ready(function(){$("#boiteReception").click(function(){$("#sujet").text(sujet);});});//remplacer le sujet
                    // $(document).ready(function(){$("#boiteReception").click(function(){$("#nom_prenom").text(surname +" "+nom);});});//remplacer le nom et Prenom
                    // $(document).ready(function(){$("#boiteReception").click(function(){$("#pic").attr('src',picture);});});//remplacer l'image

                }




                    //$(document).ready(function(){$("#message").attr('id','rebebeberge'+ modifier++)});



            })
            });



        request.fail(function (msg) {
            debugger;
            console.log("coucou ca marche pas");
        });
    }
});
//index_mvc.php?target=utilisateur&function=data_capteur
//control/utilisateur.php?function=data_capteur

