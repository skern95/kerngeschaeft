<?php
//Vorschaltbare Informationsseite 
	//Konfigurierung für die Datenbank
	require("Config_Text.php");

	//Versuchen SQL Abfragen auszuführen(1. ist die Seite/Info vorgeschaltet; 2. Texte in beiden Sprache laden)
	try{
		$query1 = "
		SELECT status
		FROM admin_rules
		WHERE rulename = 'showsysinfopage'
		";
		
		$query2 = "
		SELECT text
		FROM texte
		WHERE textnr = '1'
		AND seitennr = '1'		
		";
	
		$showsysinfopage = $db->query($query1);
		$showsysinfopage2 = $showsysinfopage->fetch();
		$text = $db->query($query2);
		$textDE = $text->fetch();
		$textEN = $text->fetch();
		
    } 
    //Fehlerausgabe, wenn die Abfragen scheitern
    catch(PDOException $ex) {
		die("Failed to run query: " . $ex->getMessage());
	} 
	//Vorschaltbare Seite anzeigen, wenn die option ausgewählt ist und man das erste mal auf die Seite geht (via SESSION)
	//Seite auch per Modal "Pop Up"
	//Info in beiden Sprachen
	if ($showsysinfopage2["status"] == true && empty($_SESSION["siteseen"])) {
		echo '
		<!-- SysInfoPage -->
		<div class="modal hide fade in" id="sysinfopage" aria-hidden="false">
			<div class="modal-header center">
				<h2>Willkommen</h2>
			</div>
			<div id="syscontent">
				<!-- Deutscher Text -->
				';
				echo "".$textDE["text"];
				echo '
				<!-- /Deutscher Text -->
			</div>
			<div class="modal-header center">
				<h2>Welcome</h2>
			</div>
			<div id="syscontent">
				<!-- Englischer Text -->
				';
				echo "".$textEN["text"];
				echo '
				<!-- /Engliscer Text -->
			</div>
		</div>
		<!-- SysInfoPage -->
		
		<script type="text/javascript">
			$("#sysinfopage").modal();
		</script>
		';
		
		//Infoseite gesehen in der akutellen SESSION
		$_SESSION["siteseen"] = true;
	}
?>