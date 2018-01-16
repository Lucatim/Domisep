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
                //fonction qui modifie une div
                $(document).ready(function(){$("#boiteReception").click(function(){$("#adapt_content").empty();})});//vider la div adapt_content
                $(document).ready(function(){$("#boiteReception").click(function(){$("#adapt_content").append(view/base/messagerie/messagerie.html);})});
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

