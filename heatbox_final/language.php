<?php
// Anzeigen der Länder-Sprach-Flaggen + Funktion für das Umschalten der Sprache 
function toggleLanguage() {
	// Wenn Sprache 1 (Deutsch), dann deutsche Flagge Highlighten(active)
	if ($_SESSION['sprachnr'] == 1) {
		echo '
			<button class="btn btn-transparent active" style="border: none"  name="sprache" value="1"><i class="icon"><img src="images/ico/ger.png" style="width: 20px"/></i></button>
			<button class="btn btn-transparent" style="border: none"  name="sprache" value="2"><i class="icon"><img src="images/ico/eng.png" style="width: 20px"/></i></button>
			';
	// Wenn Sprache 2 (Englisch), dann englische Flagge Highlighten(active)
	} else if ($_SESSION['sprachnr'] == 2) {
		echo '
			<button class="btn btn-transparent " style="border: none"  name="sprache" value="1"><i class="icon"><img src="images/ico/ger.png" style="width: 20px"/></i></button>
			<button class="btn btn-transparent active" style="border: none"  name="sprache" value="2"><i class="icon"><img src="images/ico/eng.png" style="width: 20px"/></i></button>
			';
	}
}

//Session starten, falls noch nicht gestartet
if (session_id() == "") {
	session_start();
}

//Beim Klick auf einen der Sprachbuttons: Wert wechseln für die aktuelle Sprache und dementsprechen Text Übersetzungen laden 
if (isset($_POST['sprache'])) {
	$_SESSION['sprachnr'] = $_POST['sprache'];
}

?>