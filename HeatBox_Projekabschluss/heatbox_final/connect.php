<?php

/* Datenbank Konfiguration für die Kommentarseite */

$db_host = 'localhost';
// Host
$db_user = 'heatbox_textuser';
// DB Benutzer
$db_pass = 'heatbox';
// DB Passwort
$db_database = 'heatbox_text';
// DB Name

/* Ende Konfiguration */

// Verbinden
$link = @mysql_connect($db_host, $db_user, $db_pass) or die('Unable to establish a DB connection');

// Kodiereung
mysql_query("SET NAMES 'utf8'");

mysql_select_db($db_database, $link);
?>