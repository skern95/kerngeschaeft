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
	?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Geschichte | HeatBox</title>
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
	//$_SESSION['sprachnr'] = 1; // 1 = Deutsch, 2 = Englisch
	$query = '
		SELECT *
		FROM texte
		WHERE seitennr = "2" 
		AND sprachnr = "'.$_SESSION['sprachnr'].'"
	'; //seitennr = 2 --> header
	
	//Sprachbutton Funktionalität
		include('language.php');
		
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
	echo '<li><a href="hb_dl.php">'.$text["text"].'</a></li>'; // Überprüfung, ob User angemeldet ist für Downloads
}	
	echo '<li class="active"><a href="geschichte.php">';
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

	<div class="jumbotron" style="background-color:white;"> <!-- #232323-->
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
					<h2>Die Geschichte der HeatBox</h2>
				<div class="gap"></div>
					<p>Ein Heizkoffer mit HeatBox-Elektronik ist eine nachhaltige Investition mit praktiziertem Umweltschutz:</p>
					<p>Da temperierte Akkus eine deutlich höhere Belastbarkeit als kalte Akkus haben, verschleißen diese deutlich geringer – ein Neukauf ist i.d.R. erst nach der 2-3-fachen Zyklenzahl erforderlich. Dies bedeutet weniger Kosten für den Anwender für neue Akkus sowie eine deutliche Reduzierung von Akku-Schrott, der aufwändig gesammelt und recycelt bzw. umweltgerecht entsorgt werden muss.</p>
					<p>Derzeit gibt es in Deutschland rund 400.000 Modellbaupiloten, von denen ca. 150.000 in Vereinen organisiert sind. </p>
					<p>Bei einem Akku-Verbrauch von durchschnittlich 5 Stück zu je ca. 400 g ergibt dies eine Abfallbelastung von rund 800 Tonnen pro Jahr – die im Idealfall auf weniger als 250 Tonnen reduziert werden kann. </p>
					<p>800 Tonnen Akku-Müll entspräche ca. 40 Gefahrgut-Sattelzügen mit einer Gesamtlänge von 660 m – also über einen halben Kilometer Akku-Müll, auf einer Höhe von 2,5 m und einer Breite von 2,0 m verteilt – und das nur aus dem Gebrauch der registrierten Anwender, unabhängig von professionellen Einsatzgebieten, und nur für den Bereich innerhalb Deutschlands.</p>
				</div>
			</div>
		</div>
	</section>

	<section id="recent-works">
		<div class="container">
			<div class="center">
				<h3>Very First Developement</h3>
			</div>
			<div class="center"></div>
			<ul class="gallery col-2" style="margin: 0 auto;padding-left: 32.5%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<br>
						<br>
						<img alt=" " src="images/history/Alpha/vfd.JPG">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br><br>
						<h5>Very First Developement</h5>
						<p>Oben: Erste Versuche auf Lochrasterplatine (rechts) mit Arduino-Mini 328 neben Display</p>
						<p>Unten:  Darauf basierende Weiterentwicklung auf Lochrasterplatine</p>
						<p>mit externer CPU-Platine mit Atmel 328P (links). Daneben die Platine des ersten Beta-Prototyps (Auflage: 15 Stück)</p>
					</div>                
				</li>
				<!--/Item 1-->        
			</ul>
		</div>
	</section>
	
	
	
	<section class="main-info">
		<div class="container">
			<div class="center">
				<h3>HeatBox_v.09</h3>
			</div>
			<div class="row">
				<ul class="gallery col-2" style="margin: 0 auto;padding-left: 35%">
					<!--Item 2-->
					<li>
						<div class="preview">
							<br>
							<br>
							<img alt=" " src="images/history/beta/HBv0.9-beta.JPG">
							<div class="overlay">
							</div>
						</div>
						<div class="desc">
							<br><br>
							<h5>HeatBox_v0.9</h5>
							<p>Entwicklung der Beta-Platine v0.9, diese wurde als Bausatz geliefert, Kunden mussten noch einige Bauteile selber einlöten… </p>
							<div class="preview">
							<img alt=" " src="images/history/v10 _121/Mustereinbau_v1_2.jpg">
							<div class="overlay">
							</div>
						</div>
							<p>…und das Display von Hand verkabeln, das Flachbandkabel also selbst verlöten </p>
						</div>                
					</li>
					<!--/Item 2-->        
				</ul>
			</div>
			<div class="center">
				<div class="gap"></div>
				<h4>Größenvergleiche</h4>
				<br><br>
				<ul class="gallery col-4">
				<!--Item 1-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/GrVergleich_1.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>Größenvergleich 1</h5>
					</div>                
				</li>
				<!--/Item 1--> 

				<!--Item 2-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/GrVergleich_2.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>Größenvergleich 2</h5>
					</div>               
				</li>
				<!--/Item 2-->

				<!--Item 3-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/HBv09-beta1.JPG">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br>
						<h5>Größenvergleich HeatBox_v0.9</h5>
					</div>                 
				</li>
				<!--/Item 3--> 

				<!--Item 4-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/HBv09-beta2.JPG">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br>
						<h5>eingebaute Platine</h5>
					</div>
									
				</li>
				<!--/Item 4-->               
			</ul>

			</div>
		</div>
	</section>
	
	<section id="recent-works">
		<div class="container">
			<div class="row">
			<div class="center">
				<h3>Rote Platine HeatBox PCB-v1.0</h3>
			</div>  
			<div class="gap"></div>
			<div class="center"></div>
			<ul class="gallery col-2" style="margin: 0 auto;padding-left: 32.5%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<br>
						<br>
						<img alt=" " src="images/history/v10 _121/rotePlatine.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br><br>
						<h5>erste offizielle Version (v1.0)</h5>
						<p>Die Versionen 1.0 und 1.1 konnten durch eine Zusatzplatine für den "Extension-Port" erweitert werden, und zwar um eine Erkennung für externe Spannungsversorgung und deren Messung sowie einer Ansteuerung eines Zusatzlüfters für bessere Konvektion.</p>
					</div>                
				</li>
				<!--/Item 1-->        
			</ul>
			</div>
		</div>
	</section>
	
	
	
		<section class="main-info">
		<div class="container">
			<div class="row-fluid">
				<div class="center">
					<h3>HeatBox v1.21</h3>
				</div>
				<div class="center"></div>
				<ul class="gallery col-2" style="margin: 0 auto;padding-left: 32.5%">
					<!--Item 1-->
					<li>
						<div class="preview">
							<br>
							<br>
							<img alt=" " src="images/history/v10 _121/HB_v121.JPG">
							<div class="overlay">
							</div>
						</div>
						<div class="desc">
							<br><br>
							<p>Ab der Hardware-Revision v1.21 wurden die Komponenten des Extension-Ports mit auf der Hauptplatine untergebracht und bereits fester Bestandteil der Grundfunktionen. Die Platine wurde dabei etwas größer, zur Aufnahme der zusätzlichen Bauteile und Anschlüsse.</p>
						</div>                
					</li>
					<!--/Item 1-->        
				</ul>
		</div>
	</section>
	
	
		<section id="recent-works">
		<div class="container">
			<div class="row">
			<div class="center">
				<h3>HeatBox-NG</h3>
			</div>  
			</div>
			<div class="gap"></div>
			<div class="center">
				<ul class="gallery col-4" style="padding-left: 17.5%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/HB-NG_First_Beta_display.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br>
						<h5>HeatBox-NG First Beta(2015) mit Display</h5>
					</div>                
				</li>
				<!--/Item 1--> 

				<!--Item 2-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/HB-NG_Second_Beta.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br>
						<h5>HeatBox-NG Second Beta(2015)grüne Platine</h5>
					</div>               
				</li>
				<!--/Item 2-->   
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/HB-NG_Second_Beta_display.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br>
						<h5>HeatBox-NG Second Beta(2015)grüne Platine mit Display</h5>
					</div>               
				</li>
				<!--/Item 3-->          
			</ul>
		</div>
	</section>
	
	
	
	
	
		<section class="main-info">
		<div class="container">
			<div class="center">
				<h3>HeatBox  v1.50 compact</h3>
			</div>
			<div class="row">
				<ul class="gallery col-2" style="margin: 0 auto;padding-left: 35%">
					<!--Item 2-->
					<li>
						<div class="preview">
							<br>
							<br>
							<img alt=" " src="images/history/v150 _v151/HBv150_compact.JPG">
							<div class="overlay">
							</div>
						</div>
						<div class="desc">
							<br><br>
							<h5>HeatBox v1.50 compact</h5>
							<p>Danach wurde vor allem das Design optimiert, daraus entstand die v 1.50 "compact". Alles vor der v1.50 wird nun als "Legacy" geführt.<br>           
							Die "compact"-Serie zeichnet sich vor allem durch die geringe Größe der der Hauptplatine aus, die nicht größer ist als das Display ist - und zwar auch nicht, als das zweizeilige 2x16-Zeichen-Display.</p>
						</div>
					</li>
					<!--/Item 2-->        
				</ul>
			</div>
			<div class="row">
			<div class="center">
				<div class="gap"></div>
				<p></p>
				<h4>HeatBox-compact Adapter für v1.51</h4>
				<br><br>
				<ul class="gallery col-3" style="padding-left: 25%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/v150 _v151/hb_COMPACT_Adapter_v151.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>HB-compact Adapter für v 1.51 (1)</h5>
					</div>                
				</li>
				<!--/Item 1--> 

				<!--Item 2-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/v150 _v151/hb_COMPACT_Adapter_v151_2.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>HB-compact Adapter für v 1.51 (2)</h5>
					</div>               
				</li>
				</ul>
				<!--/Item 2-->
			</div>
			</div>

				<!--Item 3-->
				<div class="row">
			<div class="center">
				<ul class="gallery col-3" style="padding-left: 25%">
				<li>
					<div class="preview">
						<img alt=" " src="images/history/v150 _v151/hb_COMPACT_Adapter_v151_3.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>HB-compact Adapter für v 1.51 (3)</h5>
						<p>Für Kunden die das vierzeilige 4x16 LCD bevorzugten, wurde eine Adapterplatine angeboten, die es ermöglichte, genau wie mit dem 2x16 LCD, das Ganze als Sandwich-Bauweise mit minimalstem Kabelaufwand fertigzustellen.</p>
					</div>                 
				</li>
				<!--/Item 3--> 

				<!--Item 4-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/v150 _v151/HB_COMPACT_2x16_v151_c24.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>HB-compact Adapter für v 1.51 (4)</h5>
						<p>Ab der HeatBox 1.51 wurde erstmals eine optional erhältliche Version für den Betrieb mit 11-24 V eingeführt, die "c24". Alle davor erschienenen HeatBoxes waren nur für 11-14,9 V Versorgungsspannungen geeignet.</p>
					</div>
									
				</li>
				<!--/Item 4-->               
			</ul>

			</div>
		</div>
	</section>
	
	
	
		<section id="recent-works">
		<div class="container">
			
			<div class="center">
				<h3>HeatBox v1.60 12-24V</h3>
			</div>
			<div class="center"></div>
			<ul class="gallery col-2" style="margin: 0 auto;padding-left: 32.5%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<br>
						<br>
						<img alt=" " src="images/history/HeatBox_v1.60_12-24v.JPG">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br><br>
						<p>Ab der Version v1.60 wurde das gesamte Design so ausgelegt, dass die HeatBox mit Spannungen von 10,8-29 V betrieben werden kann. Außerdem war die v1.60 die erste HeatBox mit einer Platine im Format des 4x16 LCD. Durch Zuschnitt kann es auf die Größe des 2x16 LCD gebracht werden, um mit beiden Displays eine Sandwich-Bauweise zu ermöglichen.</p>
					</div>                
				</li>
				<!--/Item 1-->        
			</ul>
			
			
		</div>
	</section>
	
			<section class="main-info">
		<div class="container">
			<div class="center">
				<h3>HeatBox v1.70 mit Verpolungsschutz</h3>
			</div>
			<div class="center"></div>
			<ul class="gallery col-2" style="margin: 0 auto;padding-left: 32.5%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<br>
						<br>
						<img alt=" " src="images/history/HB_v170_mit_Verpolungsschutz.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br><br>
						<p>Mit der v1.70 wurde dann erstmals auf unveränderter Platinengröße zusätzlich ein Verpolungsschutz und eine leistungsfähigere Endstufe realisiert, dass selbst eine Verpolung der Versorgungsquelle keinen Schaden anrichten kann. </p>
						<p>In diesem Stadium der Entwicklung werden auch fertig konfektionierte Kabelsätze mit ausgeliefert, die den Montageaufwand für den Kunden auf ein Minimum reduzieren, dass selbst unterfahrene Elektroniklaien die HeatBox zur einem kompletten Heizkoffer zusammenbauen können.</p>
						<p>Seit 2016 gibt es die Möglichkeit, durch eine Kooperation mit der Firma ETLZ einen fertig funktionsfähigen Koffer zu erhalten. Für alle, denen der Aufwand, einen eigenen Koffer zu bauen zu groß ist oder, die sich es nicht zutrauen.</p>
					</div>                
				</li>
				<!--/Item 1-->        
			</ul>
		</div>
	</section>
	
	

	<!--Bottom-->
	<section id="bottom" class="main">
		<!--Container-->
		<div class="container">
			<!--row-fluids-->
			<div class="row-fluid">
				<!--Contact Form-->
				<div class="span3">
					<h4>ADDRESSE</h4>
					<ul class="unstyled address">
						<li>
							<i class="icon-home"></i>
							<strong>Strasse:</strong><br />
							Huettenstrasse 13
						</li>
						<li>
							<i class="icon-compass"></i>
							<strong>PLZ/Ort:</strong><br />
							35708 Haiger
						</li>
						<li>
							<i class="icon-flag-alt"></i>
							<strong>Land:</strong><br />
							Deutschland
					   </li>
					</ul>
				</div>
				<!--End Contact Form-->

				<!--Ansrpechpartner-->
				<div class="span3">
					<h4>ANSPRECHPARTNER</h4>
					<div>
						<ul class="unstyled address">
							<li>
								<i class="icon-male"></i>
								Christian Domes</li>
							<li>
								<i class="icon-globe"></i>
								<strong>Website:</strong> <a href="http://www.HaDi-RC.de">HaDi-RC.de</a>
							</li>
							<li>
								<i class="icon-envelope"></i>
								<strong>Email: </strong> Info@HaDi-RC.de
							</li>
							<li>
								<i class="icon-phone"></i>
								<strong>Telefon:</strong> +49 2773 912030
							</li>
							<li>
								<i class="icon-print"></i>
								<strong>Fax:</strong> +49 02773 912031
							</li>
						</ul>
					</div>  
				</div>
				
				<!--Important Links-->
				<!--Informationen-->
				<div class="span3">
					<h4>INFORMATIONEN</h4>
					<div>
						<ul class="unstyled address">
							<li>
								<i class="icon"><img src="images/ico/impr.png" style="height:14px" /></i>
								<a href="impressum.php">Impressum</a>
							</li>
							<li>
								<i class="icon-user"></i>
								<a href="kontakt.php">Kontakt</a>
							</li>
							<li>
								<i class="icon-shopping-cart"></i>
								<a href="http://www.hadi-rc.de" target="_blank">Shopseite</a>
							</li>
							<li>
								<i class="icon-facebook"></i>
								<a href="https://www.facebook.com/HaDiRC/" target="_blank">Facebook</a>
							</li>
							<li>
								<i class="icon-google-plus"></i>
								<a href="https://plus.google.com/117160856069921192058" target="_blank">Google</a>
							</li>
						</ul>
					</div>
				</div>
				<!--End Archives-->

				<div class="span3">
					<h4>SPENDEN</h4>
					<div>
						<ul class="unstyled address">
							<li>
								<i class="icon-euro"></i>
								<a href="spende.php">HeatBox</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--/row-fluid-->
		</div>
		<!--/container-->
	</section>
	<!--/bottom-->

	<!--Footer-->
	<footer id="footer">
		<div class="container">
			<div class="row-fluid">
				<div class="span5 cp">
					&copy; 2017 HaDi-RC. All Rights Reserved.
				</div>
				<!--/Copyright-->

				<div class="span6">
					<ul class="social pull-right">
						<li><a href="https://www.facebook.com/HaDiRC/" target="_blank"><i class="icon-facebook"></i></a></li>
						<li><a href="https://plus.google.com/117160856069921192058" target="_blank"><i class="icon-google-plus"></i></a></li>                    
					</ul>
				</div>

				<div class="span1">
					<a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
				</div>
				<!--/Goto Top-->
			</div>
		</div>
	</footer>
	<!--/Footer-->

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
				<input type="hidden" name="redirect" value="geschichte.php"></button>
				<button type="submit" class="btn btn-primary">Sign in</button>
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

				var $navArrows = $( '#nav-arrows' ),
				slitslider = $( '#slider' ).slitslider( {
					autoplay : true
				} ),

				init = function() {
					initEvents();
				},
				initEvents = function() {
					$navArrows.children( ':last' ).on( 'click', function() {
						slitslider.next();
						return false;
					});

					$navArrows.children( ':first' ).on( 'click', function() {
						slitslider.previous();
						return false;
					});
				};

				return { init : init };

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
