<?php 
    require("config.php");
    if(!empty($_POST)) 
    {
		if (empty($_SESSION['user'])) {
			die("Permission denied.");
		}
		
		$query = "
		SELECT istadmin
		FROM permissions
		WHERE knr = '".$_SESSION['user']['knr']."'
		";
		
		$run = $db->query($query);
		$permission = $run->fetch();
		if($permission['istadmin'] == true) {
			// Überprüfen, ob Felder korrekt gefüllt sind
			if(empty($_POST['kunde'])){
				die("Bitte wählen Sie einen Kundentyp aus");
			}
			if(empty($_POST['knr'])){
				die("Bitte geben Sie eine 8-Stellige Kundennummer an");
			} else if(strlen($_POST['knr']) != 8){
				die("Bitte geben Sie eine 8-Stellige Kundennummer an");
			}
			if(empty($_POST['username'])) 
			{ die("Bitte geben Sie einen Username an."); } 
			if(empty($_POST['password'])) 
			{ die("Bitte geben Sie ein Passwort an."); } 
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
			{ die("Die Email-Adresse ist ungütig"); } 
			
			// Überprüfen, ob Kundennummer schon vergeben ist
			$query = " 
				SELECT 
					1 
				FROM users 
				WHERE 
					knr = :knr 
			"; 
			$query_params = array( ':knr' => $_POST['kunde'].$_POST['knr'] ); 
			try { 
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			} 
			catch(PDOException $ex){ die("Konnte Befehl nicht ausführen: " . $ex->getMessage()); } 
			$row = $stmt->fetch(); 
			if($row){ die("Diese Kombination aus Kundentyp und Kundennummer wurde bereits verwendet"); }
			
			// Überprüfen, ob Username unbenutzt ist
			$query = " 
				SELECT 
					1 
				FROM users 
				WHERE 
					username = :username 
			"; 
			$query_params = array( ':username' => $_POST['username'] ); 
			try { 
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			} 
			catch(PDOException $ex){ die("Konnte Befehl nicht ausführen: " . $ex->getMessage()); } 
			$row = $stmt->fetch(); 
			if($row){ die("Dieser Username ist bereits vergeben"); } 
			
			// Überprüfen, ob Email schon vergeben ist
			$query = " 
				SELECT 
					1 
				FROM users 
				WHERE 
					email = :email 
			"; 
			$query_params = array( 
				':email' => $_POST['email'] 
			); 
			try { 
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			} 
			catch(PDOException $ex){ die("Konnte Befehl nicht ausführen: " . $ex->getMessage());} 
			$row = $stmt->fetch(); 
			if($row){ die("Diese Email wird bereits verwendet"); } 
			  
			// Befehle für Datenbankeinträge festlegen		
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
			  
			// Passwortsicherheit / Hash
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
			catch(PDOException $ex){ die("Konnte Befehl nicht ausführen: " . $ex->getMessage()); } 
			
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
			catch(PDOException $ex){ die("Konnte Befehl nicht ausführen: " . $ex->getMessage()); }
			
			// Weiterleiten
			header("Location: adminpage.php"); 
			die("Redirecting to adminpage.php");
		} else {
			die("Permission denied");
		}		
    } 
?>