$(document).ready(function () {
    // debugger;
    console.log("SUBMIT IMG");

    $("#dl_img").click(function(f){
        //Annule action de base à savoir la redirection
        f.preventDefault();

        //Envoi du formulaire
        $("#form_fake_button2").submit();
    });
});

// Permet de fake le boutton car on a des boutons personnalisés qui n'utilisent pas la balise submit