$(document).ready(function () {
    debugger
    console.log("chargement OK");
    var saveTempDefaultText=$("#temp_max").text();
    var saveTempDefaultInt=parseInt(saveTempDefaultText);

    //Affichage option Chauffage
    $("#chauffagePosition").click(function () {
        var tempPos=$("#chauffagePosition").hasClass("bouton_vert");
        tempPosChange(tempPos);
    });

    //Detection Event Diminuer Temp
    $("#minTemp").click(function () {
        gestionTemp(-1);
    });

    //Detection Event Augmenter Temp
    $("#plusTemp").click(function () {
        gestionTemp(1);
    });

    //Detection Event Reset Temp
    $("#resetTemp").click(function () {
        gestionTemp(0);
    });


    function gestionTemp($ordre) {
        var tempValue=parseInt($("#temp_max").text());

        //Diminue la temp
        if($ordre==-1){
            if (tempValue>10){
                tempValue-=1;
            }
        }

        //Reset de la temperature a la valeur au moment du chargement de la page
        if ($ordre==0){
            tempValue=saveTempDefaultInt;
        }

        //Augmente la temp
        if ($ordre==1){
            if (tempValue<35){
                tempValue+=1;
            }
        }
        if (tempValue !=parseInt($("#temp_max").text())){
            var request=$.ajax(
                {
                    method: 'GET',
                    url: 'control/requestAJAX.php?function=chauffage_temperature',
                    data:{ idResidence: idResidencePage ,chaufTemp:tempValue},
                    dataType:"json",
                    timeout:999999999
                });
            request.always(function (d) {
                $("#temp_max").text(tempValue);

            });
        }

    }

    function tempPosChange(pos) {
        debugger
        var textChaufPos=$("#textChauffagePosition");
        var paramChauf=$("#ordre_chauf");
        if (pos==true){

            var request=$.ajax(
                {
                    method: 'GET',
                    url: 'control/requestAJAX.php?function=chauffage_position',
                    data:{ idResidence: idResidencePage ,chaufPos:0},
                    dataType:"json",
                    timeout:999999999
                });
            request.always(function (d) {
                debugger
                //Désactive le chauffage
                $("#chauffagePosition").removeClass("bouton_vert");
                $("#chauffagePosition").addClass("bouton_rouge");

                textChaufPos.text("Chauffage Désactivé");

                //paramChauf.removeClass("hide");
                paramChauf.hide();

                $(".red_indice").addClass("red");
            });
            request.fail(function (msg) {
                debugger;
                console.log("coucou ca marche pas");
            })
        }
        else {
            //AJAX modication bdd position chauffage
            var request=$.ajax(
                {
                    method: 'GET',
                    url: 'control/requestAJAX.php?function=chauffage_position',
                    data:{ idResidence: idResidencePage ,chaufPos:1},
                    dataType:"json",
                    timeout:999999999
                });
            request.always(function(d) {
                debugger
                //Active le chauffage
                $("#chauffagePosition").removeClass("bouton_rouge");
                $("#chauffagePosition").addClass("bouton_vert");

                textChaufPos.text("Chauffage Activé");

                //paramChauf.addClass("hide");

                paramChauf.show();


                $(".red_indice").removeClass("red");
            });
            request.fail(function (msg) {
                debugger;
                console.log("coucou ca marche pas");
            })
        }

    }

});