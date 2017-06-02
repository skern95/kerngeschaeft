<?php
	function toggleLanguage() {
		if($_SESSION['sprachnr'] == 1) {
			echo '
			<button class="btn btn-transparent" style="border: none"  name="englisch" value="2"><i class="icon"><img src="images/ico/eng.png" style="width: 20px"/></i></button>
			';
		} else if($_SESSION['sprachnr'] == 2) {
			echo '
			<button class="btn btn-transparent" style="border: none"  name="deutsch" value="1"><i class="icon"><img src="images/ico/ger.png" style="width: 20px"/></i></button>
			';
		}
	}
	
	if (session_id() == "") {
		session_start();
	}
	
	if(isset($_POST['englisch'])) {
		$_SESSION['sprachnr'] = 2;
	}
	if(isset($_POST['deutsch'])) {
		$_SESSION['sprachnr'] = 1;
	}
?>