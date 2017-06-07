<?php
    // Variablen für die Verbindung zur Datenbank
    $username = "heatbox_loginuser"; 
    $password = "heatbox"; 
    $host = "localhost"; 
    $dbname = "heatbox_login"; 
     
	// Array, welches Optionen für die Verbindung festlegt.
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
	
	// Verbindung zur Datenbank 'heatbox_text' wird mit oben angegebenen Variablen hergestellt
    try { 
		$db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); 
	} 
    catch(PDOException $ex){
		die("Failed to connect to the database: " . $ex->getMessage());
	} 
	
	// Regel setzen, dass bei Fehlern eine Exception geworfen wird, sprich ein Abbruch mit Fehlermeldung
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	
	// Regel setzen, Standard-fetch mode Assoc, sprich beim auslesen von Daten aus einer Abfrage wird ein Array zurückgegeben
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	
	// Session starten, falls dies noch nicht erfolgt ist
	if (session_id() == "") {
		session_start();
	}
?>