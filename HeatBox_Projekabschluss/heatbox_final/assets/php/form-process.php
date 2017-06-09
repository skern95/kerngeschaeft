<?php
//Sebastian Kern

//Fehlernachricht als leeren "" String definieren
$errorMSG = "";

// NAME (fehlt/übergeben)
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL (fehlt/übergeben)
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// BETREFF (fehlt/übergeben)
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Subject is required ";
} else {
    $msg_subject = $_POST["msg_subject"];
}


// TEXT (fehlt/übergeben)
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}

//An und Betreff
$EmailTo = "sample@ma.il";
$Subject = "HeatBox Kontakt";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $msg_subject;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// email sende
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// Erfolg ausgeben, wenn es funktioniert, wenn nicht, 
// aber kein Fehler ausgegeben wurde "Something went wrong", 
// Fehlerausgabe
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "\n Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>