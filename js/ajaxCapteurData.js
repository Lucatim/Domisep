$(document).ready(function () {
    debugger;
    console.log("coucou je suis dedans");
var request=$.ajax(
    {
        method: 'GET',
        url: 'control/requestAJAX.php?function=data_capteur',
        data:{ idCapteur: 1},
        dataType:"json",
        timeout:999999999
    });

    request.done(function(d) {
        debugger;
        console.log("coucou la requete est fini");
    });

request.fail(function (msg) {
    debugger;
    console.log("coucou ca marche pas");
})

    //Appel de la requete AJAX toute les 5 minutes
    /*
 setInterval(function () {
     $.ajax({
         type: 'POST',
         url: 'index_mvc.php?target=utilisateur&function=data_capteur',
         data:{ idCapteur: 1, date: null },
         dataType:"json"
 }).done(function(d) {
     debugger
     });
 },300000);*/
});
//index_mvc.php?target=utilisateur&function=data_capteur
//control/utilisateur.php?function=data_capteur