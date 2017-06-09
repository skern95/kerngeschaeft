<?php
//Login Funktionalität und Modal "Pop Up" zum einloggen

//Texte für den Login abrufen
$query = '
		SELECT *
		FROM texte
		WHERE seitennr = "23" 
		AND sprachnr = "' . $_SESSION['sprachnr'] . '"
	';
//seitennr = 23 --> login.php
try {
	$abfragelogin = $db -> query($query);
} catch(PDOException $ex) {
	die("Failed to connect to the database: " . $ex -> getMessage());
}

// Login als Modal "Pop Up" (Optik
echo '
	<!--  Login form -->
		<div class="modal hide fade in" id="loginForm" aria-hidden="false">
			<div class="modal-header">
				<i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
				<h4>';
$text = $abfragelogin -> fetch();
//Anmeldung
echo '' . $text["text"] . '</h4>
			</div>
			<!--Modal Body-->
			<div class="modal-body">
				<form method="post" class="form-inline" id="form-login">
					<input type="text" class="input-small" placeholder="';
$text = $abfragelogin -> fetch();
//Mail
echo '' . $text["text"] . '" name="email" style="width:190px;">
					<input type="password" class="input-small" placeholder="';
$text = $abfragelogin -> fetch();
//Passwort
echo '' . $text["text"] . '" name="password" style="width:190px;">
					<button type="submit" name="login" class="btn btn-primary">';
$text = $abfragelogin -> fetch();
//Button
echo '' . $text["text"] . '</button>
				</form>
			</div>
			<!--/Modal Body-->
		</div>
	<!--  /Login form -->
	';

//DB Konfiguration laden
require ("config.php");
$submitted_username = '';

//Wenn alle Daten eingetragen wurden, dann überprüfen, ob richtige Anmeldung (DB Vergleich)
if (array_key_exists('login', $_POST)) {
	// SQL Abfrage: User mit der eingegeben E-Mail
	$query = " 
            SELECT 
                knr, 
                username, 
                password, 
                salt, 
                email 
            FROM users 
            WHERE 
                email = :email 
        ";
	//E-Mail Adresse wird an die Abfrage übergeben
	$query_params = array(':email' => $_POST['email']);
	// Versuchen SQL Abfrage auszuführen
	try {
		$stmt = $db -> prepare($query);
		$result = $stmt -> execute($query_params);
	// Bei Fehler abbrechen mit Meldung
	} catch(PDOException $ex) { die("Failed to run query: " . $ex -> getMessage());
	}
	// Vordefinierung
	$login_ok = false;
	// Abgefragten User übergeben
	$row = $stmt -> fetch();
	// Wenn ein User übergeben wurde, dann Passwort hashen und überprüfen/vergleichen
	if ($row) {
		$check_password = hash('sha256', $_POST['password'] . $row['salt']);
		// Hash Algorhythmus
		for ($round = 0; $round < 65536; $round++) {
			$check_password = hash('sha256', $check_password . $row['salt']);
		}
		// Richtiges Password = erfolgreicher login -> login_ok ist wahr
		if ($check_password === $row['password']) {
			$login_ok = true;
		}
	}

	// Wenn Passwort zur E-Mail gehört: richtige/erfolgreiche Anmeldung und kritische Daten verwerfen, damit nur relevante Daten an die SESSION übergeben werden
	if ($login_ok) {
		unset($row['salt']);
		unset($row['password']);
		$_SESSION['user'] = $row;
		// Wenn Login fehlgeschlagen: Error Message
	} else {
		$submitted_username = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
		$text = $abfragelogin -> fetch();
		$_SESSION['loginerror'] = "" . $text["text"];
	}
}
?>
