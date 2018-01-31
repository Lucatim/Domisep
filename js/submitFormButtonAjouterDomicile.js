$(document).ready(function () {
    console.log("SUBMIT FORM");
    //Detection du click suivant
    $("#ajouter_domicile").click(function (e) {
        e.preventDefault();

        $("#form_ajouter_domicile").submit();
    });
});