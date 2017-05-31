<?php
	require("Config_Text.php");

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
		";
	
		$showsysinfopage = $db->query($query1);
		$showsysinfopage2 = $showsysinfopage->fetch();
		$text = $db->query($query2);
		$text2 = $text->fetch();
		
    } catch(PDOException $ex) {
		die("Failed to run query: " . $ex->getMessage());
	} 
	
	if ($showsysinfopage2["status"] == true && empty($_SESSION["siteseen"])) {
		echo '
		<!-- SysInfoPage -->
		<div class="modal hide fade in" id="sysinfopage" aria-hidden="false">
			<div class="modal-header center">
				<h2>Willkommen</h2>
			</div>
			<div id="syscontent">
				<!-- Veränderbarer Text -->
		';
		echo "".$text2["text"];
		echo '
				<!-- /Veränderbarer Text -->
			</div>
		</div>
		<!-- SysInfoPage -->
		
		<script type="text/javascript">
			$("#sysinfopage").modal();
		</script>
		';
		
		$_SESSION["siteseen"] = true;
	}
?>