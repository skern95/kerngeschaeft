<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
	<!--<![endif]-->
	<head>
		<!-- Titel und meta Informationen -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Adminseite | HeatBox</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<!--  Stylesheets -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/sl-slide.css">

		<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
		<?php session_start();
		require ("config.php");

		//Zurückschicken wenn nicht eingeloggt
		if (empty($_SESSION['user'])) {
			header("Location: index.php");
			die("Redirecting to index.php");
		}

		//Zurückschicken, wenn kein Admin
		$query = "
		SELECT istadmin
		FROM permissions
		WHERE knr = '" . $_SESSION['user']['knr'] . "'";
		$run = $db -> query($query);
		$permission = $run -> fetch();
		if ($permission['istadmin'] == false) {
			header("Location: index.php");
			die("Redirecting to index.php");
		}

		//Setzen der Standardsprache
		if (empty($_SESSION['sprachnr'])) {
			$_SESSION['sprachnr'] = 1;
			// 1 = Deutsch, 2 = Englisch
		}

		//Sprachbutton Funktionalität
		include ('language.php');
		?>
	</head>

	<body>
		<?php // config für die Datenbank lesen
		require ('config_text.php');

		// SQL Query (Abfrage): Alle Texte der "Seite 2" (header) und der aktuellen Sprache
		$query = '
	SELECT *
	FROM texte
	WHERE seitennr = "2" 
	AND sprachnr = "' . $_SESSION['sprachnr'] . '"';

		// Abfrage ausführen
		try {
			$abfrageheader = $db -> query($query);
		} catch(PDOException $ex) {
			die("Failed to connect to the database: " . $ex -> getMessage());
		}

		//HTML Header -> Navigation
		echo '' . '<!--Header-->
    <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="index.php"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li><a href="index.php">';
		// erstes Ergebnis der SQL Abfrage für die Navigation (Startseite)
		$text = $abfrageheader -> fetch();
		//Ausgabe des ersten Ergebnis
		echo '' . $text["text"] . '</a></li>
                        <li><a href="hb_allgemein.php">';

		// zweites Ergebnis der SQL Abfrage für die Navigation (Allgemeines)
		$text = $abfrageheader -> fetch();
		//Ausgabe des zweiten Ergebnis
		echo '' . $text["text"] . '</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">';

		// Heatbox Dropdown
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . ' <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            	<li class="nav-header"><a href="hb.php">';

		//Heatbox Reiter
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
                                <li><a href="hb_tec.php">';

		//Technische Daten
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
                                <li><a href="hb_anl.php">';

		//Anleitungen
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
                                <li class="divider"></li>
 								<li class="nav-header"><a href="hb_comp.php">';

		//Heatbox Compact
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
                                <li><a href="hb_comp_tec.php">';

		//Technische Daten
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
                                <li><a href="hb_comp_anl.php">';

		//Anleitungen
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
                                <li class="divider"></li>
                                <li class="nav-header"><a href="hb_eco.php">';

		//Heatbox Eco
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
                                <li><a href="hb_eco_tec.php">';

		//Technische Daten
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
                                <li><a href="hb_eco_anl.php">';

		//Anleitungen
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li> 
                                <li class="divider"></li>';

		//Downloads
		$text = $abfrageheader -> fetch();
		if (isset($_SESSION['user'])) {
			echo '<li><a href="hb_dl.php">' . $text["text"] . '</a></li>';
			// Überprüfung, ob User angemeldet ist für Downloads
		}
		echo '<li><a href="geschichte.php">';

		//Geschichte
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
	<li><a href="testberichte.php">';

		//Testberichte
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>  
                                <li><a href="faq.php">';

		//FAQ
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>  
                                <li><a href="spende.php">';

		//Spende
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>                        
                            </ul>
                        </li>
						<li><a href="kommentar.php">';

		//Kommentare
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
                        <li><a href="kontakt.php">';

		//Kontakt
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
                        <li><a href="impressum.php">';

		//Impressum
		$text = $abfrageheader -> fetch();
		echo '' . $text["text"] . '</a></li>
						';

		// Login Status (nicht angemeldet: Schloss-icon zum Anmelden | angemeldet: E-Mail Adresse anzeigen)
		include ('loginstatus.php');

		//Sprachflaggen
		echo '
						<li>
							<form method="post">';
		toggleLanguage();
		echo '
							</form>
						</li>
                    </ul>        
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <!-- /header -->';
	?>

		<section class="main-info">
			<div class="container">
				<div class="row-fluid">
					<!-- Sysinfo/Willkommensseite ein-/ausschalten und ändern -->
					<div class="span4">
						<h4>Wichtige Meldung</h4>
						<?php
						include 'sysinfopagetoggle.php';
						?>
						Hier kann ein Text vorgeschaltet werden, um wichtige Meldungen zu zeigen.
						<label style="margin-top: 15px;">Meldung umschalten:</label>
						<form action="sysinfopagetoggle.php" method="post">
							<?php toggleButton() ?>
						</form>
						<label>Deutsche Meldung:</label>
						<form action="sysinfopagetoggle.php" method="post">
							<textarea name="sysinfoDE" rows="4" style="width:300px; padding:5px 10px;"><?php showTextDE() ?></textarea>
							<input type="submit" name="updateDE" value="Aktualisieren" class="btn btn-transparent" style="width:130px" />
						</form>

						<label>Englische Meldung:</label>
						<form action="sysinfopagetoggle.php" method="post">
							<textarea name="sysinfoEN" rows="4" style="width:300px; padding:5px 10px;"><?php showTextEN() ?></textarea>
							<input type="submit" name="updateEN" value="Aktualisieren" class="btn btn-transparent" style="width:130px" />
						</form>
					</div>
					<!-- Ende Sysinfo/Willkommensseite ein-/ausschalten und ändern -->

					<!-- Benutzer anlegen -->
					<div class="span4">
						<h4>Benutzer anlegen</h4>
						<form method="post">
							<input type="radio" name="kunde" value="P" checked style="margin: 0px 0px 4px;">
							&nbsp;Privatkunde</input>
							<br>
							<input type="radio" name="kunde" value="R" style="margin: 0px 0px 4px;">
							&nbsp;Reseller</input>

							<label style="margin-top: 15px;">Kundennummer:</label>
							<input type="text" name="knr" value="" maxlength=8 style="min-height: 25px; width: 65px;"/>

							<label>Name:</label>
							<input type="text" name="username" value="" style="min-height: 25px; width: 300px;"/>

							<label>E-Mail:</label>
							<input type="text" name="email" value="" style="min-height: 25px; width: 300px;"/>

							<label>Passwort:</label>
							<input type="password" name="password" value="" style="min-height: 25px; width: 300px; margin-bottom: 15px;"/>
							<br>

							<input type="checkbox" name="istadmin" style="margin: 0px 0px 4px;">
							&nbsp;Admin</input>
							<br>

							<input type="checkbox" name="hatheatbox" style="margin: 0px 0px 4px;">
							&nbsp;Heatbox</input>
							<br>

							<input type="checkbox" name="hatcompact" style="margin: 0px 0px 4px;">
							&nbsp;Heatbox Compact</input>
							<br>

							<input type="checkbox" name="hateco" style="margin: 0px 0px 4px;">
							&nbsp;Heatbox Eco</input>
							<br>

							<input type="submit" name="register" value="Registrieren" class="btn btn-transparent" style="margin-top:10px;width:130px" />
						</form>
						<?php
						include 'register.php';
						?>
					</div>
					<!-- Ende Benutzer anlegen -->

					<!-- Kunden bearbeiten und löschen -->
					<div class="span4">
						<h4>Kundendaten bearbeiten</h4>
						<form method="post">
							<input type="radio" name="typ" value="P" style="margin: 0px 0px 4px;">
							&nbsp;Privatkunde</input>
							<br>
							<input type="radio" name="typ" value="R" style="margin: 0px 0px 4px;">
							&nbsp;Reseller</input>

							<label style="margin-top: 15px;">Kundennummer:</label>
							<input type="text" name="kundennummer" value="" maxlength=8 style="min-height: 25px; width: 65px;"/>
							<br>

							<input type="submit" name="showuser" value="Suchen" class="btn btn-transparent" style="margin-top:10px;width:130px" />
						</form>
						<?php
						include 'edituser.php';
						?>
					</div>
				</div>
				<!-- Ende Kunden bearbeiten und löschen -->

				<!-- Kundenliste anzeigen -->
				<div style="margin-top: 30px;">
					<h4>Kundenliste</h4>
					<input type="button" id="toggleList" value="Liste anzeigen" class="btn btn-transparent" onclick="showList()" style="width:130px" />
				</div>
				<div id="userlist" class="row-fluid">
					<?php
					include 'userausgeben.php';
					?>
				</div>
				<script>
					function showList() {
						document.getElementById("userlist").style.display = "block";
						document.getElementById("toggleList").setAttribute("onclick", "hideList();");
						document.getElementById("toggleList").setAttribute("value", "Liste ausblenden");
					}

					function hideList() {
						document.getElementById('userlist').style.display = "none";
						document.getElementById("toggleList").setAttribute("onclick", "showList();");
						document.getElementById("toggleList").setAttribute("value", "Liste anzeigen");
					}
				</script>
			</div>
			<!-- Ende Kundenliste anzeigen-->
		</section>

		<?php
		//Fußzeile
		include ('footer.php');
		?>

		<!-- JavaScript Dateien einbinden-->
		<script src="js/vendor/jquery-1.9.1.min.js"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
