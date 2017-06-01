<?php
	function updateDE() {
		echo "Beispielfunktion.\n";
	}
	
	function showTextDE() {
		require("Config_Text.php");
		$query = "
		SELECT text
		FROM texte
		WHERE seitennr = '1'
		AND textnr = '1'
		AND sprachnr = '1'		
		";
		$text = $db->query($query);
		$text2 = $text->fetch();
		echo "".$text2["text"];
	}
	
	function showTextEN() {
		require("Config_Text.php");
		$query = "
		SELECT text
		FROM texte
		WHERE seitennr = '1'
		AND textnr = '1'
		AND sprachnr = '2'		
		";
		$text = $db->query($query);
		$text2 = $text->fetch();
		echo "".$text2["text"];
	}
?>