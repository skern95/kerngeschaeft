// Sebastian Kern

//Validierung
$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // falsch ausgefülltes Formular
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // alles gut!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Variablen mit Formulardaten füllen
    var name = $("#name").val();
    var email = $("#email").val();
    var msg_subject = $("#msg_subject").val();
    var message = $("#message").val();

	// Übergabe der "geposteten" Inhalte an (form-proccess.)php mit Erfolg/Misserfolg 
    $.ajax({
        type: "POST",
        url: "assets/php/form-process.php",
        data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

//Nachricht versendet, Formular leeren, Erfolgsnachricht
function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "Message Submitted!")
}

//Fehlgeschlagen, Shake Animation als Fehler durch Klassenänderung
function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

//Erfolgs-/Fehlernachricht ausgeben
function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}