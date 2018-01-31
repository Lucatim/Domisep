$(document).ready(function () {
    //debugger;
    var div1 = document.getElementsByClassName("icone_edit_circle").classList;

    //var div = document.getElementsByTagName("div");

    //div.style.visibility="hidden";
    //$(".icone_edit_circle").hide();

    var qs = (function(a) {
        if (a == "") return {};
        var b = {};
        for (var i = 0; i < a.length; ++i)
        {
            var p=a[i].split('=', 2);
            if (p.length == 1)
                b[p[0]] = "";
            else
                b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
        }
        return b;
    })(window.location.search.substr(1).split('&'));

    if (qs["function"] != 'editer_mon_profil')
    {
        $(".icone_edit_circle").hide();
        $(".opacity_edit_image").removeClass( "opacity_edit_image" );
    }
});

/*$(document).ready(function () {
    $( "#myform" ).validate({
        rules: {
            field: {
                required: true,
                extension: "png|jpg|jpeg"
            }
        }
    });
});*/

/*function GetFileSize() {
    var fi = document.getElementById('file'); // GET THE FILE INPUT.

    // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
    if (fi.files.length > 0) {
        // RUN A LOOP TO CHECK EACH SELECTED FILE.
        for (var i = 0; i <= fi.files.length - 1; i++) {

            var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
            if (fsize >= 2000)
                document.getElementById('fp').innerHTML = 'STOP';
            else
            {
                document.getElementById('fp').innerHTML =
                    document.getElementById('fp').innerHTML + '<br /> ' +
                    '<b>' + Math.round((fsize / 1024)) + '</b> KB';
            }

        }
    }
}*/

$(function(){
    //debugger;
    $('#file').change(function(){
        if($('#file').get(0).files.length === 0){
            alert('Veuillez choisir un fichier !');
        }
        else {
            var f=this.files[0]; // On récupère la taille du fichier
            if (f.size > 2000000) // Si le fichier est supérieur à 2 Mo
            {
                alert('Fichier trop lourd');
                document.getElementById('file').value = ""; // On vide le champ
                document.getElementById('fp').innerHTML = 'Fichier trop lourd !';
            }
            else
            {
                // On récupère le nom du fichier
                var files = fi.files;
                for (var i = 0; i < files.length; i++) {
                    var filename = files[i].name;
                }
                //alert(filename);

                openFile(filename); // On vérifie le bon format du fichier
            }
        }

    })
});

function openFile(file) {
    var extension = file.substr((file.lastIndexOf('.') + 1));
    switch (extension) {
        case 'jpg':
        case 'png':
        case 'jpeg':
            alert('Bon format');
            break;
        default:
            document.getElementById("file").value = "";
            alert('Mauvais format');
    }
}
