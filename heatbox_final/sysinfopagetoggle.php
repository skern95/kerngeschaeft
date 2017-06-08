<?php	
// Funktionen der vorschaltbaren Informationsseiten für die Registration
	//Überprüfen, ob Info-Seite vorgeschaltet ist oder nicht, bei ja "Aussschalten" | bei nein "Einschalten"
	function toggleButton() {
		//DB Config laden
		require("Config_Text.php");
		//SQL Abfrage: ist die Infoseite vorgeschaltet
		$query = "
		SELECT status
		FROM admin_rules
		WHERE rulename = 'showsysinfopage'
		";
		$status = $db->query($query);
		$status2 = $status->fetch();
		//wenn ja: ausschalten
		if($status2['status'] == '1') {
			echo '
			<input type="submit" name="hideSYS" value="Ausschalten" class="btn btn-transparent" style="width:130px" />
			';
		} 
		//wenn nein: einschalten
		else if($status2['status'] == '0'){
			echo '
			<input type="submit" name="showSYS" value="Anschalten" class="btn btn-transparent" style="width:130px" />
			';
		}
	}
	
	//Wenn Ausschalten geklickt wurde, Wert in der Datenbank dazu setzen
	if(isset($_POST['hideSYS'])) {
		require("Config_Text.php");
		$query = "
		UPDATE admin_rules
		SET status= '0'
		WHERE rulename = 'showsysinfopage'
		";
		$db->query($query);
		header("Location: adminpage.php"); 
		exit();
	}
	//Wenn Einschalten geklickt wurde, Wert in der Datenbank dazu setzen
	if(isset($_POST['showSYS'])) {
		require("Config_Text.php");
		$query = "
		UPDATE admin_rules
		SET status= '1'
		WHERE rulename = 'showsysinfopage'
		";
		$db->query($query);
		header("Location: adminpage.php"); 
		exit();
	}

	//Deutschen Text aus der Datenbank ziehen und ausgeben
	function showTextDE() {
		require("Config_Text.php");
		$query = "
		SELECT text
		FROM texte
		WHERE seitennr = 1
		AND textnr = 1
		AND sprachnr = 1
		";
		$text = $db->query($query);
		$text2 = $text->fetch();
		echo "".$text2["text"];
	}
	//Wenn Aktualisieren bei der deutschen Meldung geklickt wurde, den eingegebenen Text in der Datenbank speichern
	if(isset($_POST['updateDE'])) {
		require("Config_Text.php");
		$query = '
		UPDATE texte
		SET text= "'.$_POST['sysinfoDE'].'"
		WHERE seitennr = 1
		AND textnr = 1
		AND sprachnr = 1
		';
		$db->query($query);
		header("Location: adminpage.php"); 
		exit();
	}
	//Englischen Text aus der Datenbank ziehen und ausgeben
	function showTextEN() {
		require("Config_Text.php");
		$query = "
		SELECT text
		FROM texte
		WHERE seitennr = 1
		AND textnr = 1
		AND sprachnr = 2
		";
		$text = $db->query($query);
		$text2 = $text->fetch();
		echo "".$text2["text"];
	}
	//Wenn Aktualisieren bei der englischen Meldung geklickt wurde, den eingegebenen Text in der Datenbank speichern
	if(isset($_POST['updateEN'])) {
		require("Config_Text.php");
		$query = '
		UPDATE texte
		SET text= "'.$_POST['sysinfoEN'].'"
		WHERE seitennr = 1
		AND textnr = 1
		AND sprachnr = 2
		';
		$db->query($query);
		header("Location: adminpage.php"); 
		exit();
	}
?>