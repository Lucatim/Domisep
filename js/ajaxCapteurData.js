$(document).ready(function () {
    debugger;
    var idCapteur=idCapteurPage;
    console.log("coucou je suis dedans");
var request=$.ajax(
    {
        method: 'GET',
        url: 'control/requestAJAX.php?function=data_capteur',
        data:{ idCapteur: idCapteur,date:null},
        dataType:"json",
        timeout:999999999
    });

    request.done(function(d) {
        debugger;
        console.log("coucou la requete est fini");
        var labels=[];
        var series=[];

        d.forEach(function (e) {
            debugger;
            labels.push(e.date_sensor);
            series.push(e.data);

        });
        var data = {
            // A labels array that can contain any sort of values
            labels: labels,
            // Our series array that contains series objects or in this case series data arrays
            series: [
                series
            ]
        };

// Create a new line chart object where as first parameter we pass in a selector
// that is resolving to our chart container element. The Second parameter
// is the actual data object.
        new Chartist.Line('.ct-chart', data);
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