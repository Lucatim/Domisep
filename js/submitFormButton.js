$(document).ready(function () {
console.log("SUBMIT FORM");
    //Detection du click suivant
   $(".bouton_vert").click(function(e){
       //Annule action de base à savoir la redirection
       e.preventDefault();

       //Envoi du formulaire
       $("#form_connexion").submit();
   });
});