$(document).ready(function () {
    console.log("SUBMIT FORM");
    //Detection du click suivant
    $("#ajouter_piece").click(function (e) {
        e.preventDefault();

        $("#form_ajouter_piece").submit();
    });


    //Ajax liste piece select2

    var request=$.ajax(
        {
            method: 'GET',
            url: 'control/requestAJAX.php?function=liste_type_piece',
            //data:{ idCapteur: idCapteur,date:null},
            dataType:"json",
            timeout:999999999
        });

    request.done(function(d) {
        debugger;
        console.log("coucou la requete est fini");
        //var labels=[];
        //var series=[];

        var data=[];

        d.forEach(function (e) {
            debugger;
            var objectData={};
            objectData.id=e.id_room_list;
            objectData.text=e.name;
            data.push(objectData);
            //labels.push(e.date_sensor);
            //series.push(e.data);

        });
        $("#type_piece").select2({
            data:data,
            selectOnClose: true
        });
    });

    request.fail(function (msg) {
        debugger;
        console.log("coucou ca marche pas");
    });
});