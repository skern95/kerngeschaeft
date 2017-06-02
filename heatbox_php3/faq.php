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
    <title>FAQ | HeatBox</title>
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
	echo '<li><a href="hb_dl.php">'.$text["text"].'</a></li>'; // Überprüfung, ob User angemeldet ist für Downloads
}	
	echo '<li><a href="geschichte.php">';
$text = $abfrageheader->fetch();
//Geschichte
	echo ''.$text["text"].'</a></li>
	<li><a href="testberichte.php">';
$text = $abfrageheader->fetch();
//Testberichte
	echo ''.$text["text"].'</a></li>  
                                <li class="active"><a href="faq.php">';
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
                    <h1>Frequently Asked Questions</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->       

    <section id="faqs" class="container">
        <ul class="faq">
			<h3>Allgemeine Fragen:</h3>
			<li>
				<span class="number">01</span>
				<div>
					<h4>Ich habe eine der ersten HeatBox-Platinen gekauft. Sind diese veraltet?</h4>
					<p>Bei den neueren Platinen sind wir auf einige Kundenwünsche eingegangen und haben außerdem das Layout der Platine verbessert. Bis auf wenige Features, die erst durch die neuen Platinen unterstützt werden können, sind diese technisch ähnlich den ersten Platinen. Bei der Software-Weiterentwicklung achten wir darauf, dass diese Kompatibel zu den früheren Platinen ist.</p>
				</div>
			</li>

			<li>
				<span class="number">02</span>
				<div>
					<h4>Soll ich ein 2- oder ein 4-Zeilen-Display bestellen?</h4>
					<p>Das hängt maßgeblich davon ab wie viel Platz Ihnen zur Verfügung steht. Bei der 4-Zeilen-Version können mehr Informationen zur selben Zeit angezeigt werden. Bei den 2-Zeilen-Versionen werden einige Informationen immer im Wechsel dargestellt.</p>
				</div>
			</li>

			<li>
				<span class="number">03</span>
				<div>
					<h4>Es gibt eine neue Software-Version. Muss ich ein Update vornehmen?</h4>
					<p>Wir empfehlen es zumindest. Keine Software ist perfekt und so unterliegt auch unsere Steuerung einer permanenten Verbesserung und Revision. Außerdem kommen regelmäßig neue Funktionen hinzu um die Wünsche der Kunden zu erfüllen.</p>
				</div>
			</li>

			<li>
				<span class="number">04</span>
				<div>
					<h4>Kann ich die HeatBox auch über meinen Zigarettenanzünder oder der Solaranlage der Vereinshütte betreiben?</h4>
					<p>Ja (bei den früheren HeatBox-Platinen ist ggf. eine Erweiterungsplatine notwendig). Die HeatBox ist dafür ausgelegt, sowohl über eine externe Speisung als auch über einen Akku versorgt zu werden. Bei entsprechender Verschaltung erkennt die HeatBox den Typ der Versorgung und deaktiviert ggf. einige unnötige Überwachungsfunktionen, die nur beim Betrieb über einen Akku sinnvoll sind. Näheres entnehmen sie bitte der Anleitung.</p>
				</div>
			</li>

			<li>
				<span class="number">05</span>
				<div>
					<h4>Wie sicher ist der Betrieb der HeatBox?</h4>
					<p>Was das Design ihres Heizkoffers betrifft können wir natürlich keine Aussagen treffen. Bei der Steuerung jedoch haben wir darauf geachtet, dass alle kritischen Fehler erkannt werden können (korrekt ausgeführtes Setup vorausgesetzt), so dass die Software darauf reagieren kann. So wird nicht nur die entnommene Kapazität aus dem Betriebsakku gemessen, sondern gleichzeitig die Gesamtspannung überwacht. Auch der Ausfall des Temepratursensors wird festgestellt und die Heizung wird deaktiviert.</p>
				</div>
			</li>
			<div class="gap">
			</div>
			<h3>Allgemeine Probleme:</h3>
			<li>
				<span class="number">06</span>
				<div>
					<h4>Beim Starten der HeatBox zeigt das Display nichts an, obwohl die Beleuchtung funktioniert und der Summer einen kurzen Ton ausgibt</h4>
					<p>Vermutlich ist der Kontrast des Displays nicht richtig eingestellt. Auf der Platine finden sie einen kleinen Potentiometer den Sie mit einem kleinen Schraubendreher verstellen können. Drehen Sie den Potentiometer langsam in eine Richtung bis das Display etwas anzeigt.</p>
				</div>
			</li>
			<div class="gap">
			</div>
			<h3>Update-Fehler:</h3>
			<li>
				<span class="number">07</span>
				<div>
					<h4>avrdude.exe: ser_send(): write error: Sorry no info avail</h4>
					<p>Dieser Fehler taucht auf, wenn der angegebene COM-Port nicht der Richtige ist (Falschen Port ausgewählt).</p>
				</div>
			</li>
		</ul>
		<div class="gap">
		</div>
	</section>
	
<?php
	//Fußzeile
	include('footer.php');
?>

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
				<input type="hidden" name="redirect" value="faq.php"></button>
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
