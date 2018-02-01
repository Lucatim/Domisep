
function validateForm()
{
    var formulaire = document.getElementById('myForm');
    var recipient = document.forms["myForm"]["recipient"].value;
    var subject = document.forms["myForm"]["subject"].value;
    var message = document.forms["myForm"]["mess"].value.toString();

    if (recipient == "" ) {
        alert("Le champ du destinataire est vide");
        return false;
    }

    if ( isNaN(recipient) ) {
        alert("Le champ du destinataire n'est pas un entier");
        return false;
    }


    if (subject == "") {
        alert("Le sujet est vide");
        return false;
    }

    if (message == "") {
        alert("Le message est vide");
        return false;
    }

    if(message.includes("query")||
        message.includes("prepare")||
        message.includes("SELECT")||
        message.includes("prepare")||
        message.includes("UPDATE")||
        message.includes("INSERT")||
        message.includes("INTO")){
        alert("Message invalide");

        return false;
    }


    formulaire.submit();

};
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

var btn_sending = document.getElementById("btn_sending");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

btn_sending.onclick = function(){
    validateForm();
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

