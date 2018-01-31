$(document).ready(function () {

console.log("SUBMIT FORM");
    //Detection du click suivant
   $("#bouton_vert_valider").click(function(e){
       //debugger;
       //Annule action de base à savoir la redirection
       e.preventDefault();

       //Envoi du formulaire
       $("#form_fake_button").submit();
   });
});

// Permet de fake le boutton car on a des boutons personnalisés qui n'utilisent pas la balise submit