$(document).ready(function () {
    console.log("SUBMIT FORM");
    //Detection du click suivant
    $("#ajouter_utilisateur").click(function(e){
        //Annule action de base à savoir la redirection
        e.preventDefault();

        //Envoi du formulaire
        $("#form_ajouter_utilisateur").submit();
    });

    $("#ajouter_residence").click(function(e){
        //Annule action de base à savoir la redirection
        e.preventDefault();

        //Envoi du formulaire
        $("#form_connexion").submit();
    });

    $("#ajouter_domicile").click(function (e) {
       e.preventDefault();

       $("#form_ajouter_domicile").submit();
    });
});