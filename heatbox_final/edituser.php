<?php
// Kunden anzeigen
if (array_key_exists('showuser', $_POST)) {
	require ("config.php");
	$fehler = false;

	// Kundentyp felht -> Fehler
	if (empty($_POST['typ'])) {
		echo("Bitte wählen Sie einen Kundentyp aus.<br>");
		$fehler = true;
	}
	// Kundennummer ist nicht angegeben -> Fehler
	if (empty($_POST['kundennummer'])) {
		echo("Bitte geben Sie eine 8-stellige Kundennummer an.<br>");
		$fehler = true;
	}// oder Kundennummer ist nicht 8-stellig -> Fehler
	else if (strlen($_POST['kundennummer']) != 8) {
		echo("Bitte geben Sie eine 8-stellige Kundennummer an.");
		$fehler = true;
	}

	// Wenn fehlerfrei: DB Abfrage für den User mit der eingetragenen Kundennummer
	if ($fehler == false) {
		$query = "
			SELECT *
			FROM users
			WHERE knr = '" . $_POST['typ'] . $_POST['kundennummer'] . "'
			";

		try {
			$users = $db -> query($query);
			$userdata = $users -> fetch();
		} catch(PDOException $ex) {
			echo("Konnte Befehl nicht ausführen: " . $ex -> getMessage());
			$fehler = true;
		}

		// Permissions des Users abfragen
		if ($fehler == false) {
			$query2 = "
				SELECT *
				FROM permissions
				WHERE knr = '" . $_POST['typ'] . $_POST['kundennummer'] . "'
				";

			try {
				$perm = $db -> query($query2);
				$permissions = $perm -> fetch();
			} catch(PDOException $ex) {
				echo("Konnte Befehl nicht ausführen: " . $ex -> getMessage());
				$fehler = true;
			}

			// Benutzer existiert (fehlerfrei) -> Formular zum Editieren anzeigen/erstellen mit den Werten der Abfragen (Permissions)
			if ($fehler == false) {
				echo '
					<form method="post">
						<label>Name:</label>
						<input type="hidden" name="fullUserId" value="' . $userdata['knr'] . '" />
						
						<input type="text" name="username" value="' . $userdata['username'] . '" style="min-height: 25px; width: 300px;" />

						<label>E-Mail:</label>
						<input type="text" name="email" value="' . $userdata['email'] . '" style="min-height: 25px; width: 300px;" /><br>

						<input type="checkbox" name="istadmin" ';
				if ($permissions['istadmin'] == true) {
					echo "checked ";
				}
				echo 'style="margin: 0px 0px 4px;">&nbsp;Admin</input><br>

							<input type="checkbox" name="hatheatbox" ';
				if ($permissions['hatheatbox'] == true) {
					echo "checked ";
				}
				echo ' style="margin: 0px 0px 4px;">&nbsp;Heatbox</input><br>

							<input type="checkbox" name="hatcompact" ';
				if ($permissions['hatcompact'] == true) {
					echo "checked ";
				}
				echo ' style="margin: 0px 0px 4px;">&nbsp;Heatbox Compact</input><br>

							<input type="checkbox" name="hateco" ';
				if ($permissions['hateco'] == true) {
					echo "checked ";
				}
				echo ' style="margin: 0px 0px 4px;">&nbsp;Heatbox Eco</input><br>

						<input type="submit" name="editUser" value="Bearbeiten" class="btn btn-transparent" style="margin-top:10px; width:130px" />
						
						<input type="submit" name="delUser" value="Löschen" class="btn btn-transparent" style="margin-top:10px; width:130px" />
					</form>
					';
			}
		}
	}
}

// Kunden bearbeiten
if (array_key_exists('editUser', $_POST)) {
	require ("config.php");
	$fehler = false;

	// Überprüfen, ob Felder korrekt gefüllt sind

	//Kundentyp
	if (empty($_POST['fullUserId'])) {
		echo("Fehler beim Kundentyp. Bitte neu suchen.<br>");
		$fehler = true;
	}
	// Name
	if (empty($_POST['username'])) {
		echo("Bitte geben Sie einen Namen an.<br>");
		$fehler = true;
	}
	// Mail mit Validierung
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		echo("Die E-Mail-Adresse ist ungütig.");
		$fehler = true;
	}

	// Überprüfen, ob Username unbenutzt ist
	if ($fehler == false) {
		$query = " 
				SELECT 
					1 
				FROM users 
				WHERE 
					username = :username
				AND
					knr <> :knr
			";
		$query_params = array(':username' => $_POST['username'], ':knr' => $_POST['fullUserId']);
		try {
			$stmt = $db -> prepare($query);
			$result = $stmt -> execute($query_params);
		} catch(PDOException $ex) {
			echo("Konnte Befehl nicht ausführen: " . $ex -> getMessage() . "<br>");
			$fehler = true;
		}
		$row = $stmt -> fetch();
		if ($row) {
			echo("Dieser Name ist bereits vergeben.<br>");
			$fehler = true;
		}

		// Überprüfen, ob Email schon vergeben ist
		$query = " 
				SELECT 
					1 
				FROM users 
				WHERE 
					email = :email
				AND
					knr <> :knr
			";
		$query_params = array(':email' => $_POST['email'], ':knr' => $_POST['fullUserId']);
		try {
			$stmt = $db -> prepare($query);
			$result = $stmt -> execute($query_params);
		} catch(PDOException $ex) {
			echo("Konnte Befehl nicht ausführen: " . $ex -> getMessage() . "<br>");
			$fehler = true;
		}
		$row = $stmt -> fetch();
		if ($row) {
			echo("Diese E-Mail wird bereits verwendet.");
			$fehler = true;
		}

		// User in der Datenbank aktualisieren (Name, E-Mail)
		if ($fehler == false) {
			$query = "
				UPDATE users
				SET username='" . $_POST['username'] . "', email='" . $_POST['email'] . "' 
				WHERE knr = '" . $_POST['fullUserId'] . "'
				";

			try {
				$db -> query($query);
			} catch(PDOException $ex) {
				echo("Konnte Befehl nicht ausführen: " . $ex -> getMessage());
				$fehler = true;
			}

			// Wenn Datenbank Aktualisierung erfolgreich, angegebene Permissions aktualisieren
			if ($fehler == false) {
				if (empty($_POST['istadmin'])) {
					$istadmin = false;
				} else {
					$istadmin = true;
				}
				if (empty($_POST['hatheatbox'])) {
					$hatheatbox = false;
				} else {
					$hatheatbox = true;
				}
				if (empty($_POST['hatcompact'])) {
					$hatcompact = false;
				} else {
					$hatcompact = true;
				}
				if (empty($_POST['hateco'])) {
					$hateco = false;
				} else {
					$hateco = true;
				}

				$query2 = "
					UPDATE permissions
					SET istadmin='" . $istadmin . "', hatheatbox='" . $hatheatbox . "', hatcompact='" . $hatcompact . "', hateco='" . $hateco . "'
					WHERE knr = '" . $_POST['fullUserId'] . "'
					";

				try {
					$db -> query($query2);
				} catch(PDOException $ex) {
					echo("Konnte Befehl nicht ausführen: " . $ex -> getMessage());
					$fehler = true;
				}

				if ($fehler == false) {
					echo "Benutzer erfolreich bearbeitet.";
				}
			}
		}
	}
}

// Benutzer löschen
if (array_key_exists('delUser', $_POST)) {
	require ("config.php");
	$fehler = false;

	$query = "
		DELETE FROM users
		WHERE knr = '" . $_POST['fullUserId'] . "'
		";

	try {
		$db -> query($query);
	} catch(PDOException $ex) {
		echo("Konnte Befehl nicht ausführen: " . $ex -> getMessage());
		$fehler = true;
	}

	if ($fehler == false) {
		echo "Benutzer erfolgreich gelöscht.";
	}
}
?>