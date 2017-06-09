<?php 
//Registration für die Admin-Seite
	//Wenn der Registrieren Button geklickt wurde
	if(array_key_exists('register',$_POST)){
		//Config laden
		require("config.php");
		//kein fehler vordefinieren
		$fehler = false;

	// Überprüfen, ob Felder korrekt gefüllt sind, bei Fehler Meldung ausgeben und $fehler wahre setzen (gibt einen Fehler)
		//Kundentyp gewählt überprüfen
		if(empty($_POST['kunde'])){
			echo("Bitte wählen Sie einen Kundentyp aus.<br>");
			$fehler = true;
		}
		//Kundennummer eingetragen prüfen
		if(empty($_POST['knr'])){
			echo("Bitte geben Sie eine 8-stellige Kundennummer an.<br>");
			$fehler = true;
		//Kundennummer auf 8 Stellen prüfen
		} else if(strlen($_POST['knr']) != 8){
			echo("Bitte geben Sie eine 8-stellige Kundennummer an.<br>");
			$fehler = true;
		}
		//Benutzername eingetragen prüfen
		if(empty($_POST['username'])) {
			echo("Bitte geben Sie einen Namen an.<br>");
			$fehler = true;
		} 
		//Passwort eingetragen prüfen
		if(empty($_POST['password'])) {
			echo("Bitte geben Sie ein Passwort an.<br>");
			$fehler = true;
		} 
		//E-Mail mit vorgefertigter E-Mail Validierung prüfen
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo("Die E-Mail-Adresse ist ungütig.");
			$fehler = true;
		} 
		// Wenn kein Fehler passiert ist:		
		if($fehler == false) {
		// Überprüfen, ob Kundennummer schon vergeben ist
			// SQL Abfrage für den Benutzer mit der eingegebenen Kundennummer
			$query = " 
				SELECT 
					1 
				FROM users 
				WHERE 
					knr = :knr 
			"; 
			//Kundennummer wird an die Abfrage übergeben
			$query_params = array( ':knr' => $_POST['kunde'].$_POST['knr'] ); 
			// Versuchen SQL Abfrage auszuführen
			try { 
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			} 
			//Bei Fehler abbrechen mit Meldung 
			catch(PDOException $ex) {
				echo("Konnte Befehl nicht ausführen: ".$ex->getMessage()."<br>");
				$fehler = true;
			} 
			//Abgefragte Kundennummer übergeben
			$row = $stmt->fetch(); 
			//Wenn eine Kundennummer übergeben wurde(schon vorhanden), dann Fehler true(es gibt einen) setzen und Fehlermeldung ausgeben 
			if($row){
				echo("Diese Kombination aus Kundentyp und Kundennummer wurde bereits verwendet.<br>");
				$fehler = true;
			}
			
		// Überprüfen, ob Username schon vergeben ist
			// SQL Abfrage für den Benutzer mit dem eingegebenen Username
			$query = " 
				SELECT 
					1 
				FROM users 
				WHERE 
					username = :username 
			"; 
			//Username wird an die Abfrage übergeben
			$query_params = array( ':username' => $_POST['username'] ); 
			// Versuchen SQL Abfrage auszuführen
			try { 
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			} 
			//Bei Fehler abbrechen mit Meldung
			catch(PDOException $ex){
				echo("Konnte Befehl nicht ausführen: ".$ex->getMessage()."<br>");
				$fehler = true;
			} 
			//Abgefragten Usernamen übergeben
			$row = $stmt->fetch(); 
			//Wenn ein Username übergeben wurde(schon vorhanden), dann Fehler true(es gibt einen) setzen und Fehlermeldung ausgeben 
			if($row){
				echo("Dieser Name ist bereits vergeben.<br>");
				$fehler = true;
			} 
			
		// Überprüfen, ob Email schon vergeben ist
			// SQL Abfrage für den Benutzer mit der eingegebenen E-Mail
			$query = " 
				SELECT 
					1 
				FROM users 
				WHERE 
					email = :email 
			"; 
			//E-Mail wird an die Abfrage übergeben
			$query_params = array( 
				':email' => $_POST['email'] 
			); 
			// Versuchen SQL Abfrage auszuführen
			try { 
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			} 
			//Bei Fehler abbrechen mit Meldung
			catch(PDOException $ex){
				echo("Konnte Befehl nicht ausführen: ".$ex->getMessage()."<br>");
				$fehler = true;
			} 
			//Abgefragte E-Mail übergeben
			$row = $stmt->fetch(); 
			//Wenn eine E-Mail übergeben wurde(schon vorhanden), dann Fehler true(es gibt einen) setzen und Fehlermeldung ausgeben 
			if($row){
				echo("Diese E-Mail wird bereits verwendet.");
				$fehler = true;
			} 
			
			// Befehle für Datenbankeinträge festlegen, wenn kein Fehler passiert ist
			if($fehler == false) {
				$query1 = " 
					INSERT INTO users ( 
						knr,
						username, 
						password, 
						salt, 
						email 
					) VALUES ( 
						:knr,
						:username, 
						:password, 
						:salt, 
						:email 
					) 
				"; 
				$query2 = " 
					INSERT INTO permissions (
						knr, 
						istadmin, 
						hatheatbox, 
						hatcompact,
						hateco
					) VALUES ( 
						:knr, 
						:istadmin, 
						:hatheatbox, 
						:hatcompact,
						:hateco
					) 
				"; 
				  
				// Passwortsicherheit / Hashen
				$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
				$password = hash('sha256', $_POST['password'] . $salt); 
				for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); }
				
				// Werte für Users sammeln
				$query1_params = array( 
					':knr' => $_POST['kunde'].$_POST['knr'],
					':username' => $_POST['username'], 
					':password' => $password, 
					':salt' => $salt, 
					':email' => $_POST['email'] 
				); 

				// Users absetzen
				try {  
					$stmt = $db->prepare($query1); 
					$result = $stmt->execute($query1_params); 
				}
				catch(PDOException $ex){
					echo("Konnte Befehl nicht ausführen: ".$ex->getMessage()."<br>");
					$fehler = true;
				}
				
				if($fehler == false) {
				// Werte für Permissions sammeln
					if(empty($_POST['istadmin'])){
						$istadmin = false;
					} else {
						$istadmin = true;
					}
					if(empty($_POST['hatheatbox'])){
						$hatheatbox = false;
					} else {
						$hatheatbox = true;
					}
					if(empty($_POST['hatcompact'])){
						$hatcompact = false;
					} else {
						$hatcompact = true;
					}
					if(empty($_POST['hateco'])){
						$hateco = false;
					} else {
						$hateco = true;
					}
					$query2_params = array( 
						':knr' => $_POST['kunde'].$_POST['knr'],
						':istadmin' => $istadmin, 
						':hatheatbox' => $hatheatbox, 
						':hatcompact' => $hatcompact, 
						':hateco' => $hateco 
					); 	
					
					// Permissions absetzen
					try {  
						$stmt = $db->prepare($query2); 
						$result = $stmt->execute($query2_params); 
					} 
					catch(PDOException $ex){
						echo("Konnte Befehl nicht ausführen: ".$ex->getMessage()."<br>");
						$fehler = true;
					}
				}
			}
		}
	}
?>