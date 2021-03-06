$(document).ready(function () {
    //debugger;
    //Ajax liste utilisateur
    var request=$.ajax(
        {
            method: 'GET',
            url: 'control/requestAJAX.php?function=rechercher_utilisateur',
            //data:{ idCapteur: idCapteur,date:null},
            dataType:"json",
            timeout:999999999
        });

    request.done(function(d) {
        //debugger;
        console.log("coucou la requete est fini");
        //var labels=[];
        //var series=[];

        var data=[];

        d.forEach(function (e) {
            //debugger;
            var objectData={};
            objectData.id=e.id_client;
            objectData.text=e.name;
            data.push(objectData);
            //labels.push(e.date_sensor);
            //series.push(e.data);

        });
        $("#rechercher_utilisateur").select2({
            data:data,
            selectOnClose: true
        });
    });

    request.fail(function (msg) {
        //debugger;
        console.log("coucou ca marche pas");
    });

    //Ajax de la residence
    var requestResidence=$.ajax(
        {
            method: 'GET',
            url: 'control/requestAJAX.php?function=rechercher_residence',
            //data:{ idCapteur: idCapteur,date:null},
            dataType:"json",
            timeout:999999999
        });

    requestResidence.done(function(d) {
        //debugger;
        //console.log("coucou la requete est fini");
        //var labels=[];
        //var series=[];

        var data=[];

        d.forEach(function (e) {
            //debugger;
            var objectData={};
            objectData.id=e.id_residence;
            objectData.text=e.name;
            data.push(objectData);
            //labels.push(e.date_sensor);
            //series.push(e.data);

        });
        $("#rechercher_residence").select2({
            data:data,
            selectOnClose: true
        });
    });

    requestResidence.fail(function (msg) {
        //debugger;
        console.log("coucou ca marche pas");
    });

    /*
    $("#rechercher_utilisateur").select2({
        ajax: {
            url: "control/requestAJAX.php?function=rechercher_utilisateur",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                debugger
                return {
                    q: params.term // search term
                    //page: params.page
                };
            },
            processResults: function (data, params) {
                debugger
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used

                //params.page = params.page || 1;

                //Recupere ce qui est passe dans l'input et le convertie sous differente forme afin de le comparer avec la liste de nom
                var paramTest=[];
                paramTest["onlyMin"]= params.term.toLowerCase();
                paramTest["onlyMaj"]=params.term.toUpperCase();
                var capitalLetter=params.term.slice(0,1).toUpperCase();
                var minLetters=params.term.slice(1).toLowerCase();
                paramTest["majMin"]=capitalLetter.concat(minLetters);

                var dataFilter=[];
                data.forEach(function (v) {
                    debugger;
                    if (v.name.includes(paramTest["onlyMin"])|| v.name.includes(paramTest["onlyMaj"]) || v.name.includes(paramTest["majMin"]) ){
                        debugger;
                        dataFilter.push(v);
                    }

                });

                return {
                    results: dataFilter,
                    pagination: {
                        more: true;
                        //(params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },

        placeholder:'Rechercher un utilisateur',
        escapeMarkup: function (markup) { debugger; return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo
        //templateSelection: formatRepoSelection //formatRepoSelection
    });




    function formatRepo (repo) {
        debugger;
        if (repo.loading) {
            return repo.text;
        }


        var markup = "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" + repo.name + "</div>";

        var markup ="<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__title'>" + repo.name + "</div></div>";

        if (repo.description) {
            markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
        }

        markup += "<div class='select2-result-repository__statistics'>" +
            "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
            "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
            "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
            "</div>" +
            "</div></div>";


        return markup;
    }

    function formatRepoSelection (repo) {
        debugger;
        return repo.text;
        //return repo.name;
        //return repo.full_name || repo.text;
    }
*/

});