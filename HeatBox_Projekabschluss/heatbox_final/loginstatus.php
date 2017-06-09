<?php
	// Konfiguration der DB laden
	require("config.php");
	
	// Wenn noch keine Sprache gesetzt wurde, deutsch als Standardsprache setzen
	if (empty($_SESSION['sprache'])) {
		$_SESSION['sprache'] = 1;
	}
	
	// Wenn ein Benutzer in der SESSION angemeldet ist, dann E-Mail statt Login-Schloss-Icon anzeigen mit Dropdown-Menü
	if (!empty($_SESSION['user'])){
		// SQL Abfrage nach dem istadmin Wert des Benutzers und speichern
		$query = "
		SELECT istadmin
		FROM permissions
		WHERE knr = '".$_SESSION['user']['knr']."'";
		$run = $db->query($query);
		$permission = $run->fetch();
		// Wenn der Benutzer ein Admin ist, dann Adminpage und Logout im Dropdown des angemeldeten anzeigen
		if($permission['istadmin'] == true) {
			echo '
			<li class="dropdown login"><a href="#" class="dropdown-toggle" data-toggle="dropdown">',$_SESSION['user']['email'],' <i class="icon-angle-down"></i></a>
				<ul class="dropdown-menu">
					<li><a href="adminpage.php">Adminseite</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
			';
		// Wenn nicht admin: nur logout anzeigen
		} else {
			echo '
			<li class="dropdown login"><a href="#" class="dropdown-toggle" data-toggle="dropdown">',$_SESSION['user']['email'],' <i class="icon-angle-down"></i></a>
				<ul class="dropdown-menu">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
			';
		}
		// Wenn nicht angemeldet, dann Schloss-icon zum Anmelden anzeigen
	} else {
		echo '
		<li class="login">
			<a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
		</li>
		';
	}
?>