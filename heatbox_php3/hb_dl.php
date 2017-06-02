<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<?php
		session_start();
		require('config_text.php');
		
		//Setzen der Standardsprache
		if (empty($_SESSION['sprachnr'])){
		$_SESSION['sprachnr'] = 1; // 1 = Deutsch, 2 = Englisch
		}
		
		//Sprachbutton Funktionalität
		include('language.php');
	?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Downloads | HeatBox</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

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
</head>

<body>
	<?php
    require('config_text.php');
// 1 = Deutsch, 2 = Englisch
$query = '
	SELECT *
	FROM texte
	WHERE seitennr = "2" 
	AND sprachnr = "'.$_SESSION['sprachnr'].'"
'; //seitennr = 2 --> header
try{
	$abfrageheader = $db->query($query);
} catch(PDOException $ex){
		die("Failed to connect to the database: " . $ex->getMessage());
	} 
	
echo ''.'<!--Header-->
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
$text = $abfrageheader->fetch();
//Startseite
	echo ''.$text["text"].'</a></li>
                        <li><a href="hb_allgemein.php">';
$text = $abfrageheader->fetch();
//Allgemeines
	echo ''.$text["text"].'</a></li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">';
$text = $abfrageheader->fetch();
//Heatbox
	echo ''.$text["text"].' <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            	<li class="nav-header"><a href="hb.php">';
$text = $abfrageheader->fetch();
//Heatbox
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_tec.php">';
$text = $abfrageheader->fetch();
//Technische Daten
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_anl.php">';
$text = $abfrageheader->fetch();
//Anleitungen
	echo ''.$text["text"].'</a></li>
                                <li class="divider"></li>
 								<li class="nav-header"><a href="hb_comp.php">';
$text = $abfrageheader->fetch();
//Heatbox Compact
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_comp_tec.php">';
$text = $abfrageheader->fetch();
//Technische Daten
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_comp_anl.php">';
$text = $abfrageheader->fetch();
//Anleitungen
	echo ''.$text["text"].'</a></li>
                                <li class="divider"></li>
                                <li class="nav-header"><a href="hb_eco.php">';
$text = $abfrageheader->fetch();
//Heatbox Eco
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_eco_tec.php">';
$text = $abfrageheader->fetch();
//Technische Daten
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_eco_anl.php">';
$text = $abfrageheader->fetch();
//Anleitungen
	echo ''.$text["text"].'</a></li> 
                                <li class="divider"></li>';                                
$text = $abfrageheader->fetch();
//Downloads
if (isset($_SESSION['user'])){	
	echo '<li class="active"><a href="hb_dl.php">'.$text["text"].'</a></li>'; // Überprüfung, ob User angemeldet ist für Downloads
}	
	echo '<li><a href="geschichte.php">';
$text = $abfrageheader->fetch();
//Geschichte
	echo ''.$text["text"].'</a></li>
	<li><a href="testberichte.php">';
$text = $abfrageheader->fetch();
//Testberichte
	echo ''.$text["text"].'</a></li>  
                                <li><a href="faq.php">';
$text = $abfrageheader->fetch();
//FAQ
	echo ''.$text["text"].'</a></li>  
                                <li><a href="spende.php">';
$text = $abfrageheader->fetch();
//Spende
	echo ''.$text["text"].'</a></li>                        
                            </ul>
                        </li>
						<li><a href="kommentar.php">';
$text = $abfrageheader->fetch();
//Kommentare
	echo ''.$text["text"].'</a></li>
                        <li><a href="kontakt.php">';
$text = $abfrageheader->fetch();
//Kontakt
	echo ''.$text["text"].'</a></li>
                        <li><a href="impressum.php">';
$text = $abfrageheader->fetch();
//Impressum
	echo ''.$text["text"].'</a></li>
						';			
include('loginstatus.php');
//Sprachbutton
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

	<div class="jumbotron" style="background-color:white;">
		<!-- #232323-->
		<div class="container image-center heatboxlogo" align="center">
			<img src="images/HeatBox-Logo.png" class="img-responsive" alt="header-logo">
			<div class="overlay">
			</div>
		</div>
	</div>

	<section class="main-info">
		<div class="container">
			<div class="row-fluid">
				<div class="center">
					<h1>Firmwares</h1>
					<p>
						<i class="icon-info-sign"></i> Aktuellste Version: 2.1.99.13 BETA
					</p>
				</div>
			</div>
		</div>
	</section>

	<section id="recent-works">
		<div class="container">
			<div class="row-fluid">
				<div class="center">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Version</th>
								<th>Beschreibung</th>
								<th>ChangeLog</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>V2.1.99.13 BETA</td>
								<td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:multiuploader_win_2.1.99.13.zip">Alle Geräte</a> (433,18 KiB)
								<br>
								<b>Dieses Update wird ihre bisherigen Einstellungen zurücksetzen.</b>
								<br />
								BETA-Version. Vermutlich stabil. Bitte gefundene Fehler melden oder den Release der Version 2.20 abwarten.
								<br />
								Die Compact beim Update mit zusätzlicher Spannungsquelle (Akku, Netzteil) versorgen! </td>
								<td><a data-toggle="modal" href="#log1">ChangeLog</a></td>
							</tr>
							<tr>
								<td>V2.1.1</td>
								<td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:multiuploader_win_211.zip">Alle Geräte</a> (693,05 KiB)
								<br>
								Die Compact beim Update mit zusätzlicher Spannungsquelle (Akku, Netzteil) versorgen!</td>
								<td><a data-toggle="modal" href="#log2">ChangeLog</a></td>
							</tr>
							<tr>
								<td>V2.0.5</td>
								<td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:multiuploader_win_205.zip">Alle Geräte</a> (656,34 KiB)
								<br>
								Die Compact beim Update mit zusätzlicher Spannungsquelle (Akku, Netzteil) versorgen! </td>
								<td><a data-toggle="modal" href="#log3">ChangeLog</a></td>
							</tr>
							<tr>
								<td>V2.0.3</td>
								<td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:multiuploader_win_203.zip">Alle Geräte</a> (656,82 KiB)
								<br>
								Die Compact beim Update mit zusätzlicher Spannungsquelle (Akku, Netzteil) versorgen!</td>
								<td><a data-toggle="modal" href="#log4">ChangeLog</a></td>
							</tr>
							<tr>
								<td>V2.0.2</td>
								<td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:multiuploader_win_202.zip">Alle Geräte</a> (682,64 KiB)
								<br>
								Die Compact beim Update mit zusätzlicher Spannungsquelle (Akku, Netzteil) versorgen!</td>
								<td><a data-toggle="modal" href="#log5">ChangeLog</a></td>
							</tr>
							<tr>
								<td>V2.0.0</td>
								<td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:multiuploader_win_200.zip">Alle Geräte</a> (672,74 KiB)
								<br>
								<i class="icon"><img src="images/ico/pdf.jpg" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=heatboxlegacy:heatbox_v2-whatsnew.pdf" target="_blank">What's New und Updateanleitung</a> (56.73 KiB)
								<br>
								Die Compact beim Update mit zusätzlicher Spannungsquelle (Akku, Netzteil) versorgen!</td>
								<td><a data-toggle="modal" href="#log6">ChangeLog(1)</a><br><a data-toggle="modal" href="#log66">ChangeLog(2)</a></td>
							</tr>
							<tr>
								<td>V1.5.1</td>
								<td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:multiuploader_win_151.zip">Alle Geräte</a> (660,54 KiB)
								<br>
								Die Compact beim Update mit zusätzlicher Spannungsquelle (Akku, Netzteil) versorgen!</td>
								<td><a data-toggle="modal" href="#log7">ChangeLog</a></td>
							</tr>
							<tr>
								<td>V1.4.2</td>
								<td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:multiuploader_win_142.zip">Alle Geräte</a> (637,68 KiB)
								<br>
								Die Compact beim Update mit zusätzlicher Spannungsquelle (Akku, Netzteil) versorgen!</td>
								<td><a data-toggle="modal" href="#log8">ChangeLog</a></td>
							</tr>
							<tr>
								<td>V1.3.0</td>
								<td>
								<table border="0">
									<tr>
										<td width="325"><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:1.3.0_uploader_win_2zeilen.zip">2 Zeilen </a> (241,27 KiB) </td><td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:1.3.0_uploader_win_4zeilen.zip">4 Zeilen </a> (241,27 KiB)</td>
									</tr>
								</table></td>
								<td><a data-toggle="modal" href="#log9">ChangeLog</a></td>
							</tr>
							<tr>
								<td>V1.2.0</td>
								<td><table border="0">
									<tr>
										<td width="325"><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:heatbox_up_v1.2.0-2x16.zip">2 Zeilen </a> (229,9 KiB) </td><td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:heatbox_up_v1.2.0-4x16.zip">4 Zeilen </a> (230,58 KiB)</td>
									</tr>
								</table></td>
								<td><a data-toggle="modal" href="#log10">ChangeLog</a></td>
							</tr>
							<tr>
								<td>V1.1.0</td>
								<td>-</td>
								<td>Kompatibilität zu weiteren Temp-Sensoren</td>
							</tr>
							<tr>
								<td>V1.0.1</td>
								<td><table border="0">
									<tr>
										<td width="325"><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:uploader_win_1.0.1_2zeilen.zip">2 Zeilen </a> (229,14 KiB) </td><td><i class="icon"><img src="images/ico/zipicon.png" style="height:20px" /></i><a href="http://www.ha-di.de/lib/exe/fetch.php?media=updates:uploader_win_1.0.1_4zeilen.zip">4 Zeilen </a> (229,61 KiB)</td>
									</tr>
								</table></td>
								<td><a data-toggle="modal" href="#log11">ChangeLog</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

<?php
	//Fußzeile
	include('footer.php');
?>

	<!--  Changelog 1 -->
	<div class="modal hide fade in" id="log1" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			&nbsp;&nbsp; Änderungen gegenüber 2.1.1:
		</p>
		<ul>
			<li>
				<b>Es können jetzt bis zu drei verschiedene Betriebsakku-Sätze angelegt werden.</b>
				<br />
				<p>
					<i>Sinnvoll für diejenigen, die ihre HeatBox mit verschiedenen Akkus als Stromquelle betreiben. Jetzt muss man nicht mehr alle Werte im Setup umstellen, sondern wählt aus einem der drei Anlegbaren Sätze den passenden aus. </i>
				</p>
				<p>
					<i>Dieses nützliche Feature wurde von einem unserer kunden gewünscht.</i>
				</p>
			</li>
			<li>
				<b> Maximaltemperatur für den Normalbetrieb reduziert </b>
				(60° war zu viel, jetzt maximal 50° möglich)
			</li>
			<li>
				<b> Minimal-/Maximaltemperatur im Warmhaltebetrieb während des Timers angepasst </b>
				auf sinnvollere Werte
			</li>
			<li>
				<b> Maximal-/Miniimaltemperatur für Heizungs-/Lüfter Lauf- und Pausezeiten angepasst </b>
				auf sinnvollere Werte
			</li>
		</ul>
		<br>
		<p>
			&nbsp;&nbsp; Update von Beta 2.1.99.9 auf Beta 2.1.99.13
		</p>
		<ul>
			<li>
				Fehlerbehebungen und Verbesserungen
			</li>
			<li>
				NiXX-Akkus wurden entfernt. Statistisch gesehen nutzt diese keiner mehr.
				<br>
				Die freigewordenen Ressourcen sind für zukünftige Updates.
			</li>
		</ul>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 1 -->

	<!--  Changelog 2 -->
	<div class="modal hide fade in" id="log2" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			&nbsp;&nbsp; Seit 2.0.5:
		</p>
		<ul>
			<li>
				Fehler beim Timer OHNE Heizung behoben (Heizung lief trotz gegenteiliger Auswahl) 
			</li>
			<li>
				weitere interne Modifikation ohne Auswirkung auf den Benutzer
			</li>
		</ul>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 2 -->
		
	<!--  Changelog 3 -->
	<div class="modal hide fade in" id="log3" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			&nbsp;&nbsp; Änderungen zur Version 2.0.3:
		</p>
		<ul>
			<li>
				BugFix beim Speichern des letzten Kapazitätstandes des Betriebsakku, der unter Umständen auftreten konnte, wenn zwischendurch per externer Speisung neugestartet wurde. 
			</li>
			<li>
				BugFix im Menü, welcher bei bestimmten Kombinationen von Menüauswahlen dazu führte, dass wirre ASCII-Zeichen (oft als „Hieroglypen“ bezeichnet) dargestellt wurden.
			</li>
		</ul>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 3 -->
		
	<!--  Changelog 4 -->
	<div class="modal hide fade in" id="log4" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			&nbsp; Verbesserungen gegenüber 2.0.2:
		</p>
		<ul>
			<li>
				interne Optimierung des Codes
			</li>
			<li>
				potentieller Fehler behoben, der zum Lesen falscher Kapazitätsspeicherwerte führen konnte
			</li>
		</ul>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 4 -->
		
	<!--  Changelog 5 -->
	<div class="modal hide fade in" id="log5" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			&nbsp; Änderungen gegenüber 2.0.0:
		</p>
		<ul>
			<li>
				Anpassung der Spannungsregelung der Lüfter
			</li>
			<li>
				Im Timer-Betrieb ist nun eine Warmhalte-Funktion verfügbar. Diese soll das Auskühlen und die Bildung von Kondenzwasser verhindern (bei längerer Lagerung, z.B. Auto, bei kalten Außentemperaturen)
			</li>
		</ul>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 5 -->
		
	<!--  Changelog 6 -->
	<div class="modal hide fade in" id="log6" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			<b>
				&nbsp; Die Heatbox 2.0 Software - Was ist neu:
			</b>
		</p>
		<ul>
			<li>
				Von Grund auf neu entwickelte Software
			</li>
			<li>
				neue Menüstruktur mit zielgeführter Navigation
			</li>
			<li>
				neue Anzeigenaufteilung
			</li>
			<li>
				effizientere Heizungssteuerung bei > 12V durch PWM (Pulsweitenmodulation)
			</li>
			<li>
				detailiertere Überwachung und Erkennung von Systemfehlern mit Klartext-Anzeige <br />
				&nbsp; (z.B. Wackelkontakte des Temp-Sensors, Kurzschluss der Heizfolien usw.)
			</li>
			<li>
				einstellbare Helligkeit (Dimmung) der LCD-Beleuchtung
			</li>
			<li>
				Kalibrierung der Spannungsanzeige zur Akkuspannung
			</li>
			<li>
				Alarmtöne deaktivierbar
			</li>
			<li>
				verbessere Reaktion des Encoders (Dreh-/Tastknopfes)
			</li>
		</ul>
		
		<p>
			<b>
				&nbsp; Features:
			</b>
		</p>
		<p>
			&nbsp; Schutz des Versogungsakkus (mobiler Betrieb)
		</p>
		
		<ul>
			<li>
				Schutz und Überwachung des Betriebsakkus
			</li>
			<li>
				Vorwarnung bei Erreichen einer einstellbaren Kapazitätsgrenze
			</li>
			<li>
				Abschalten der Heizung und Warnung bei Erreichen der eingestellten max. Entladetiefe
			</li>
			<li>
				Abschalten der Heizung und Warnung bei zu niedriger Akkuspannung (Tiefentladeschutz)
			</li>
		</ul>
		<p>
			&nbsp; Schutz der Schaltung
		</p>
		
		<ul>
			<li>
				Abschalten der Heizung und Warnung bei zu hoher Spannung
			</li>
			<li>
				Abschalten der Heizung und Warnung bei möglichem Kurzschluss am Ausgang
			</li>
			<li>
				Abschalten der Heizung und Warnung bei defekter Endstufe
			</li>
			<li>
				Abschalten der Heizung und Warnung bei Ausfall des Temperatursensors
			</li>
		</ul>
		
		<p>
			&nbsp; Heizung
		</p>
		
		<ul>
			<li>
				Zieltemperatur jetzt einstellbar von 20°-60°
			</li>
			<li>
				Hysterese (erlaubter Abfall unter die Zieltemperatur) einstellbar von 1°-10°
			</li>
			<li>
				Heizdauer und Konvektionspause einstellbar (15-60sek Heizen gefolgt von 0-20sek Pause)
			</li>
			<li>
				Erhöhung der Heizleistung über den Normalwert („PWMBoost“) bei Versorgungsspannungen » 12V , Typ. ab 14,8 V (4s Lipo) um bis zu 20% einstellbar
			</li>
		</ul>
		
		<!--/Modal Body-->
	</div>
	<!--  Changelog 6 -->
	
	
	
	
	<!--  Changelog 66 -->
	<div class="modal hide fade in" id="log66" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			<b>
				&nbsp; Features:
			</b>
		</p>
		<p>
			&nbsp; Ventilator
		</p>
		
		<ul>
			<li>
				Lauf- und Pausen-Dauer einstellbar (10-60Sekunden Laufzeit gefolgt von 10-60sek Pause)
			</li>
		</ul>
		
		<p>
			&nbsp; Batterie
		</p>
		<ul>
			<li>
				Verbrauch kann automatisch gespeichert werden - späteres Fortfahren mit Betriebsakku möglich
			</li>
			<li>
				Spannunganzeige bei Bedarf kalibrierbar (Kompensation von Leitungsverlusten)
			</li>
		</ul>
		
		<p>
			&nbsp; Informationen
		</p>
		<ul>
			<li>
				Aussagefähige Fehlermeldungen
			</li>
			<li>
				Softwareversion und Gerätetyp (HeatBox Schaltungstyp) im Infomenü abrufbar
			</li>
		</ul>
		
		
		<p>
			&nbsp; CountDown-Timer
		</p>
		<ul>
			<li>
				Jetzt mit laufender Sekunden-Anzeige und Statusanzeige der Versorgungsquelle
			</li>
		</ul>
		
		<p>
			&nbsp; Kompatibilität
		</p>
		<ul>
			<li>
				ListenpunktVerfügbar für alle bisher erschienenen Plattformen (HeatBox, HeatBox Compact, HeatBox Compact24, HeatBox Compact24 V1.60) sowohl mit 2×16 wie auch 4×16 Display.
			</li>
			<li>
				Ausnahme : HeatBox ECO (nicht updatefähig !)
			</li>
		</ul>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 66 -->
	
	
	
	
	<!--  Changelog 7 -->
	<div class="modal hide fade in" id="log7" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			&nbsp; Änderungen gegenüber 1.4.2:
		</p>
		<ul>
			<li>
				Fehler im Temperatursensor-Code behoben
			</li>
			<p>
				Dieses Update muss nicht eingespielt werden wenn Ihre HeatBox ohne Probleme funktioniert. Sollten Sie im Betrieb jedoch Probleme mit dem Temperatursensor (Meldung dass Sensor entfernt wurde oder 85,0°C bzw 127,5°C in der Anzeige) sollten Sie dieses Update installieren.
			</p>
		</ul>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 7 -->
	
	
	
	
	<!--  Changelog 8 -->
	<div class="modal hide fade in" id="log8" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			&nbsp; Änderungen gegenüber 1.3.0:
		</p>
		<ul>
			<li>
				Unterstützung für HeatBox Compact
			</li>
			<li>
				Unterstützung für 24V-Speisung für entsprechende HeatBox Compact
			</li>
			<li>
				bei 24V-Speisung kann weiterhin eine 12V Heizfolie und ein 12V Lüfter verwendet werden
			</li>
			<li>
				Boost-Funktion für 24V-Version (geringfügige Anhebung der Heizspannung im Setup wählbar)
			</li>
			<li>
				Überspannungsschutz für HeatBox Compact 12V-Version
			</li>
			<li>
				Max-Temp und Min-Temp wurden ersetzt durch Ziel-Temperatur und Hysteresebereich (Abweichung von der Ziel-Temperatur nach Unten bevor wieder geheizt wird)
			</li>
			<li>
				Interne Optimierungen
			</li>
		</ul>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 8 -->
	
	
	
	
	<!--  Changelog 9 -->
	<div class="modal hide fade in" id="log9" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			&nbsp; Änderungen gegenüber 1.2.0:
		</p>
		<ul>
			<li>
				Verbesserung der Encoder-Genauigkeit
			</li>
			<li>
				Lüfter-Steuerung optimiert, wahlweise 1-120 Sekunden für Pause und Laufzeit, 0 = AUS
			</li>
			<li>
				Speichern der entnommenen Akku-Kapazität (optional im Setup aktivierbar) → bei Wiedereinschalten fortzählen
			</li>
			<li>
				Automatische Deaktivierung der Akku-Schutzfunktionen bei externer Speisung ( bei Verwendung des v120 Erweiterungssatzes)
			</li>
		</ul>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 9 -->
	
	
	
	<!--  Changelog 10 -->
	<div class="modal hide fade in" id="log10" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			&nbsp; Änderungen gegenüber 1.1.0:
		</p>
		
		<p><b>Intern/Extern-Kennung</b></p>
		<br>
		<p>
			Mit geringer zusätzlicher Beschaltung am Extension-Port erkennt die HeatBox nun automatisch ob vom internen Koffer-Akku oder von einer externen Quelle ( KFZ-Batt., Netzgerät ) versorgt wird. Bei externer Ver- sorgung werden die Überwachungseinrichtungen außer Funktion gesetzt, so das weder Alarmierung noch Abschaltung nach den Werten für den eingebauten Akku erfolgen und ein Dauerbetrieb möglich ist, ohne das hierfür Akkuparameter geändert werden müßten. Unterstützung von Zusatzlüftern
		</p>
		<br>
		<p><b>Lüftersteuerung</b></p>
		<p>
			Am Extensionport kann mit geringer Zusatzbeschaltung nun ein oder mehrere Zusatz-Lüfter zur Verbesserung der Konvektion angeschlossen werden. Diese werden unabhängig gesteuert, die Laufzeit und Pausen- dauer kann im Setup frei eingestellt werden. Die Lüfter dürfen auf KEINEN FALL direkt am Extension Port angeschlossen werden sondern nur mit separater OC-Treiberstufe. Einen entsprechenden Bauteilesatz bieten wir im Shop an. → <i class="icon-globe"></i><a href="http://www.hadi-rc.de/epages/es125123.sf/de_DE/?ObjectPath=/Shops/es125123_FAIR/Products/%22HeatBox%20v120%20TS%22#RemoteViewAction">v120 Erweiterung</a>

		</p>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 10 -->
	
	
	
	<!--  Changelog 11 -->
	<div class="modal hide fade in" id="log11" aria-hidden="false">
		<div class="modal-header">
			<h4>ChangeLog</h4>
		</div>
		<!--Modal Body-->
		<br />
		<p>
			&nbsp; Änderungen gegenüber 1.0:
		</p>
		
		<p><b>Fehler bei zu großen Versorgungsakkus</b></p>
		<br>
		<p>
			In einigen wenigen Fällen wurde beim Einsatz von Versorgungsakkus mit hoher Kapazität ( 10 ́000 mAh und höher ) falsche Alarmwerte ausgelöst bzw. waren nicht wie gewünscht einstellbar, es erfolgte eine Alarmierung obwohl die gewählten Grenzwerte nicht erreicht waren. Dieser Fehler wurde mit diesem Update behoben
		</p>
		<!--/Modal Body-->
	</div>
	<!--  Changelog 11 -->
	
	
	

	<!--  Login form -->
	<div class="modal hide fade in" id="loginForm" aria-hidden="false">
		<div class="modal-header">
			<i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
			<h4>Login Form</h4>
		</div>
		<!--Modal Body-->
		<div class="modal-body">
			<form class="form-inline" action="login.php" method="post" id="form-login">
				<input type="text" class="input-small" placeholder="Email" name="email">
				<input type="password" class="input-small" placeholder="Password" name="password">
				<input type="hidden" name="redirect" value="hb_dl.php"></button>
				<button type="submit" class="btn btn-primary">
					Sign in
				</button>
			</form>
			<a href="#">Forgot your password?</a>
		</div>
		<!--/Modal Body-->
	</div>
	<!--  /Login form -->

	<script src="js/vendor/jquery-1.9.1.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<!-- Required javascript files for Slider -->
	<script src="js/jquery.ba-cond.min.js"></script>
	<script src="js/jquery.slitslider.js"></script>
	<!-- /Required javascript files for Slider -->

	<!-- SL Slider -->
	<script type="text/javascript">
		$(function() {
			var Page = (function() {

				var $navArrows = $('#nav-arrows'),
					slitslider = $('#slider').slitslider({
					autoplay : true
				}),

					init = function() {
					initEvents();
				},
					initEvents = function() {
					$navArrows.children(':last').on('click', function() {
						slitslider.next();
						return false;
					});

					$navArrows.children(':first').on('click', function() {
						slitslider.previous();
						return false;
					});
				};

				return {
					init : init
				};

			})();

			Page.init();
		});
	</script>
	<!-- /SL Slider -->
	<?php
		include 'sysinfopage.php';
	?>
</body>
</html>