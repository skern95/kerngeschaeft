<?php 
//Log-out
	//Konfiguration laden
    require("config.php"); 
	//Benutzer in der SESSION verwerfen
    unset($_SESSION['user']);
	//Redirect auf die Index Seite(wegen Download/Admin, damit man nicht uneingeloggt darauf bleiben kann )
    header("Location: index.php"); 
    die("Redirecting to: index.php");
?>