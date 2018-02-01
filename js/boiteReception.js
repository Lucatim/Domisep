$(document).ready(function () {
    //debugger;
    var idUser=idUtilisateur;
    console.log("coucou je suis dedans");

    ajaxMSG();

    $("#boiteReception").click(function (e) {
        //debugger;
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
            //debugger;
            console.log("coucou la requete est fini");

            d.forEach(function (e) {
                //debugger;


                var sujet = e.subject;
                var surname = e.surname;
                var nom = e.name;
                var picture = e.pic;
                var message = e.mess;
                var id_client = e.id_client;
                var recipient = e.recipient;
                var sender = e.sender;
                var id_utilisateur_co = idUtilisateur;
                var id_mail = e.id_mail;
                var corbeille = e.bin;

                var new_id_container = "container_principal" +id_mail;
                var new_id_message = "message"+id_mail;
                var new_id_sujet = "sujet"+id_mail;
                var new_id_nom_prenom = "nom_prenom"+id_mail;
                var new_id_pic = "pic"+id_mail;
                var new_id_delete = "delete"+id_mail;
                var id_sender = "sender"+id_mail;




                if (recipient == id_utilisateur_co && id_client == id_utilisateur_co && corbeille == 0){
                    $(document).ready(function(){$("#corbeille").click(function(){$(".adapt_content").empty()})});
                    $(document).ready(function(){$("#boiteReception").click(function(){$(".adapt_content").append(
                        "<div id=\"container_principal\">\n" +
                        "                <div onclick=\"window.location='#';\" class=\"case_message\" >\n" +
                        "                    <div class=\"rond_image petit_rond\">\n" +
                        "                        <img id=\"pic\" src=\"../../assets/images/gilbert.jpg\" alt=\"unknown\">\n" +
                        "                    </div>\n" +
                        "\n" +
                        "                    <div class=\"informations_message\">\n" +
                        "                        <p id=\"nom_prenom\" class=\"texte_gras\">Prénom NOM</p>\n" +
                        "                        <p id=\"sujet\" class=\"texte_gras texte_gris\">Sujet</p>\n" +
                        "                        <p id=\"message\" class=\"messagerie_message texte_gris\">Lorem ipsum .</p>\n" +
                        "                        <p id=\"sender\" class=\"messagerie_message texte_gris\">Lorem ipsum .</p>\n" +
                        "                    </div>\n" +
                        "\n" +
                        "                    <div class=\"informations_message_date_supprimer\">\n" +
                        "                        <p class=\"messagerie_date\">hh:mm</p>\n" +
                        "                        <div class=\"messagerie_delete\">\n" +
                        "                            <a href=\"#\" id=\"delete\"><i class=\"material-icons\">delete</i></a>\n" +
                        "                        </div>\n" +
                        "                    </div>\n" +
                        "                </div>");})});

                    $(document).ready(function(){$("#boiteReception").click(function(){$("#container_principal").attr('id',new_id_container);});});//remplacer l'id
                    $(document).ready(function(){$("#boiteReception").click(function(){$("#message").attr('id',new_id_message);});});//remplacer l'id
                    $(document).ready(function(){$("#boiteReception").click(function(){$("#sujet").attr('id',new_id_sujet);});});//remplacer l'id
                    $(document).ready(function(){$("#boiteReception").click(function(){$("#sender").attr('id',id_sender);});});//remplacer l'id

                    $(document).ready(function(){$("#boiteReception").click(function(){$("#nom_prenom").attr('id',new_id_nom_prenom);});});//remplacer l'id
                    $(document).ready(function(){$("#boiteReception").click(function(){$("#pic").attr('id',new_id_pic);});});//remplacer l'id
                    $(document).ready(function(){$("#boiteReception").click(function(){$("#delete").attr('id',new_id_delete);});});//remplacer l'id



                    $(document).ready(function(){$("#boiteReception").click(function(){$("#"+new_id_message).text(message);});});//remplacer le message
                    $(document).ready(function(){$("#boiteReception").click(function(){$("#"+new_id_sujet).text(sujet);});});//remplacer le sujet
                    $(document).ready(function(){$("#boiteReception").click(function(){$("#"+id_sender).text('de  ' + sender);});});//remplacer le nom recipient
                    $(document).ready(function(){$("#boiteReception").click(function(){$("#"+new_id_nom_prenom).text(surname +" "+nom);});});//remplacer le nom et Prenom
                    $(document).ready(function(){$("#boiteReception").click(function(){$("#"+new_id_pic).attr('src',picture);});});//remplacer l'image

                }

                $(document).ready(function(){$("#messageEnvoye").click(function(){$(".adapt_content").empty()})});
                $(document).ready(function(){$("#corbeille").click(function(){$(".adapt_content").empty()})});

                 $(document).ready(function(){$("#"+new_id_delete).click(function(){$("#"+new_id_container).empty()})});  //location.href="index_mvc?target=messagerie&function=delete"
                $(document).ready(function(){$("#"+new_id_delete).click(function(){location.href="index_mvc?target=messagerie&function=delete&id_mail="+id_mail})}); //bin prend la valeur 1 dans la bdd


            })
        });


        request.fail(function (msg) {
            //debugger;
            console.log("coucou ca marche pas");
        });
    }
});