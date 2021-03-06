<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Technische Daten | HeatBox</title>
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
	<!--Header-->
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
                        <li><a href="index.php">Startseite</a></li>
                        <li><a href="hb_allgemein.php">Allgemeines</a></li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">HeatBox <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            	<li class="nav-header"><a href="hb.php">HeatBox</a></li>
                                <li><a href="hb_tec.php">Technische Daten</a></li>
                                <li><a href="hb_anl.php">Anleitungen</a></li>
                                <li class="divider"></li>
 								<li class="nav-header"><a href="hb_comp.php">HeatBox Compact</a></li>
                                <li class="active"><a href="hb_comp_tec.php">Technische Daten</a></li>
                                <li><a href="hb_comp_anl.php">Anleitungen</a></li>
                                <li class="divider"></li>
                                <li class="nav-header"><a href="hb_eco.php">HeatBox Eco</a></li>
                                <li><a href="hb_eco_tec.php">Technische Daten</a></li>
                                <li><a href="hb_eco_anl.php">Anleitungen</a></li> 
                                <li class="divider"></li>
                                
                                <li><a href="hb_dl.php">Downloads</a></li>
                                <li><a href="testberichte.php">Testberichte</a></li>  
                                <li><a href="faq.php">FAQ</a></li>  
                                <li><a href="spende.php">Spende</a></li>                        
                            </ul>
                        </li>
                        
                        <li><a href="kontakt.php">Kontakt</a></li> <!-- SEITE SCHREIBEN -->
                        <li><a href="impressum.php">Impressum</a></li>
                        <?php
						include 'loginstatus.php';
						?>
                    </ul>        
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <!-- /header -->
    
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
					<h1>HeatBox Compact 12V/24V</h1>
					<br>
					<h2>Technische Daten</h2>
					</div>
					<div class="left">
						<ul style="padding-left: 32%">
							<li>
								&nbsp; Betriebsspannung: 10,5V … 15,0 V DC oder bis 24,0V DC 
								<br> &nbsp; (entsprechende Bestellung)
							</li>
							<li>
								&nbsp; max. Schaltleistung ohne Zusatzkühlung: 75 W (6A)
							</li>
							<li>
								&nbsp; max. Schaltleistung mit Zusatzkühlung: 350 W (28A)
							</li>
							<li>
								&nbsp; Eigenstromaufnahme (Standby): ca 25mA
							</li>
							<li>
								&nbsp; Eigenstromaufnahme (Aktiv): ca 45mA
							</li>
							<li>
								&nbsp; Mikroprozessor: ATMega 328 , 16 Mhz, TQFP-Case
							</li>
						</ul>
					</div>
	           </div>
	        </div>
	    </div>
	</section>	

	<section id="recent-works">
		<div class="container">
			<div class="row-fluid">
				<div class="center">
				   <h2>Features</h2>
			    </div>
			    <div class="left">
					<ul style="padding-left: 32%">
						<li>
							&nbsp; DoubleLayer-Hauptplatine in Industriequalität (RoHS, HAL, LF)
						</li>
						<li>
							&nbsp; hochpräziser, digitaler Temperatursensor DS-18B20 , Auflösung besser 0,5°C
						</li>
						<li>
							&nbsp; leistungslos angesteuerte Hex-FET Endstufe, keine Relaiskontakte
						</li>
						<li>
							&nbsp; Frei wählbare Zieltemperatur von 20°C bis 50° C
						</li>
						<li>
							&nbsp; Frei einstellbare Hysterese (Temp.-Abfall bis Nachheizen)
						</li>
						<li>
							&nbsp; frei einstellbare Konvektionspause zur gravitativen Konvektion (selbsttätige
							<br>
							&nbsp; Umlüftung durch Wärmeaustausch der Luftmasse ) für erhöhte Effizienz
						</li>
						<li>
							&nbsp; Einstellbare Kapazität des Versorgungsakkus (autarker Betrieb)
						</li>
						<li>
							&nbsp; Präzise elektronische Strommessung mit µHall-Chip ACS 712
						</li>
						<li>
							&nbsp; Einstellbare Warnschwelle für verbrauchte Kapazität (abschaltbar)
						</li>
						<li>
							&nbsp; Abspeichern der entnommenen Kapazität beim ausschalten
							<br>
							&nbsp; (wird beim nächsten Start weiter gezählt), abschaltbar
						</li>
						<li>
							&nbsp; Einstellbare Zwangsabschaltung nach Kapazität ( Tiefentladeschutz )
						</li>
						<li>
							&nbsp; Integrierte Spannungsüberwachung des Versorgungsakkus mit automatischer
							<br>
							&nbsp; Zwangsabschaltung bei Unterspannung
						</li>
						<li>
							&nbsp; Einstellung durch digitalen Dreh-Encoder
						</li>
						<li>
							&nbsp; Automatisches Abspeichern aller eingestellten Werte in internem Speicher
						</li>
						<li>
							&nbsp; Laden der Werkseinstellungen auf Knopfdruck möglich
						</li>
						<li>
							&nbsp; 2×16 Zeichen-Display, beleuchtet, einstellbarer Kontrast
						</li>
						<li>
							&nbsp; Anschluss für Signalgeber ( Warn-Summer separat erhältlich )
						</li>
						<li>
							&nbsp; Anzeige von aktueller Temperatur, Ziel-Temperatur, Systemstatus,
							<br>
							&nbsp; verbrauchter Kapazität in mAh sowie prozentuale Restkapazität des Versorgungs-Akku
							<br>
							&nbsp; ( autarker Betrieb, netzunabhängig, Anzeigen abhängig von der Art der Versorgung
						</li>
						<li>
							&nbsp; Schutzfunktionen bei externer Speisung außer Funktion )
						</li>
						<li>
							&nbsp; Update- und Upgrade-Fähig
							<br>
							&nbsp; (Hardware und Software-Erweiterungen / FTDI-Port und Extension-Port)
						</li>
						<li>
							&nbsp; Erkennung „interner Akku“ oder „Externe Speisung“
						</li>
						<li>
							&nbsp; Anschluss von Zusatzlüftern bis 350 mA Stromaufnahme,
							<br>
							&nbsp; Einschaltdauer und Laufzeit frei einstellbar
						</li>
						<li>
							&nbsp; Timer zum verzögerten Einschalten der Heizung, einstellbar bis 24h
						</li>
					</ul>
				</div>
			</div>
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
								<strong>Website:</strong> <a href="http://www.hadi-rc.de" target="_blank" title="http://www.hadi-rc.de">hadi-rc.de</a>
							</li>
							<li>
								<i class="icon-envelope"></i>
								<strong>Email: </strong> info@hadi-rc.de
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
				<label class="checkbox">
					<input type="checkbox"> Remember me
				</label>
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
</body>
</html>
