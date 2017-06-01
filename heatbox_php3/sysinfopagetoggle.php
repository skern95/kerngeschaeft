<?php	
	function toggleButton() {
		require("Config_Text.php");
		$query = "
		SELECT status
		FROM admin_rules
		WHERE rulename = 'showsysinfopage'
		";
		$status = $db->query($query);
		$status2 = $status->fetch();
		if($status2['status'] == '1') {
			echo '
			<input type="submit" name="hideSYS" value="Ausschalten" style="width:130px" />
			';
		} else if($status2['status'] == '0'){
			echo '
			<input type="submit" name="showSYS" value="Anschalten" style="width:130px" />
			';
		}
	}
	if(isset($_POST['hideSYS'])) {
		require("Config_Text.php");
		$query = "
		UPDATE admin_rules
		SET status='0'
		WHERE rulename = 'showsysinfopage'
		";
		$db->query($query);
		header("Location: adminpage.php"); 
		exit();
	}
	if(isset($_POST['showSYS'])) {
		require("Config_Text.php");
		$query = "
		UPDATE admin_rules
		SET status='1'
		WHERE rulename = 'showsysinfopage'
		";
		$db->query($query);
		header("Location: adminpage.php"); 
		exit();
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
	if(isset($_POST['updateDE'])) {
		require("Config_Text.php");
		$query = "
		UPDATE texte
		SET text='".$_POST['sysinfoDE']."'
		WHERE seitennr = '1'
		AND textnr = '1'
		AND sprachnr = '1'
		";
		$db->query($query);
		header("Location: adminpage.php"); 
		exit();
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
	if(isset($_POST['updateEN'])) {
		require("Config_Text.php");
		$query = "
		UPDATE texte
		SET text='".$_POST['sysinfoEN']."'
		WHERE seitennr = '1'
		AND textnr = '1'
		AND sprachnr = '2'
		";
		$db->query($query);
		header("Location: adminpage.php"); 
		exit();
	}
?>